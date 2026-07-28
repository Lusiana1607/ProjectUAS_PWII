<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\OwnerRequest;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $categories = Category::orderBy('name')->get();

        return view('auth.register', compact('categories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],

            'role' => [
                'required',
                'in:customer,owner',
            ],

            'business_name' => [
                'required_if:role,owner',
                'nullable',
                'string',
                'max:255',
            ],

            'category_id' => [
                'required_if:role,owner',
                'nullable',
                'exists:categories,id',
            ],

            'address' => [
                'required_if:role,owner',
                'nullable',
                'string',
            ],

            'phone' => [
                'required_if:role,owner',
                'nullable',
                'string',
                'max:20',
            ],

            'operating_hours' => [
                'required_if:role,owner',
                'nullable',
                'string',
                'max:255',
            ],

            'photo' => [
                'nullable',
                'image',
                'max:2048',
            ],
        ]);

        // Fix 1: Set role_id berdasarkan pilihan form (Owner = 2, Customer = 3)
        $roleId = ($request->role === 'owner') ? 2 : 3;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $roleId,
        ]);

        if ($request->role === 'owner') {
            OwnerRequest::create([
                'user_id' => $user->id,
                'category_id' => $request->category_id,
                'business_name' => $request->business_name,
                'address' => $request->address,
                'phone' => $request->phone,
                'operating_hours' => $request->operating_hours,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        // Fix 2: Redirect sesuai role_id
        if ($user->role_id === 2) {
            // Arahkan ke route dashboard/halaman tempat owner
            // (Sesuaikan nama route jika di timmu memakai nama lain, misal 'owner.dashboard' atau 'places.index')
            return redirect()->route('owner.dashboard');
        }

        return redirect()->route('customer.explore');
    }
}