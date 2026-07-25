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

$user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'role_id' => 3,
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

        return redirect(route('dashboard', absolute: false));
    }
}
