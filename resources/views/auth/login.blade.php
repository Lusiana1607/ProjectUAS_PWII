<x-guest-layout>

    <div class="w-full max-w-md mx-auto">

        <div class="bg-white rounded-2xl shadow-xl p-8 border border-green-100">

            <div class="text-center mb-8">

                <h1 class="text-4xl font-bold text-green-700">
                    ReservHub
                </h1>

                <p class="text-gray-500 mt-2">
                    Temukan dan reservasi tempat rental favoritmu.
                </p>

            </div>

            <x-auth-session-status
                class="mb-4"
                :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div>

                    <x-input-label
                        for="email"
                        :value="'Email'" />

                    <x-text-input
                        id="email"
                        class="block mt-2 w-full rounded-lg"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus />

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2" />

                </div>

                <div class="mt-5">

                    <x-input-label
                        for="password"
                        :value="'Password'" />

                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-lg"
                        type="password"
                        name="password"
                        required />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2" />

                </div>

                <div class="flex items-center justify-between mt-5">

                    <label class="inline-flex items-center">

                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300 text-green-600 focus:ring-green-500">

                        <span class="ml-2 text-sm text-gray-600">

                            Ingat Saya

                        </span>

                    </label>

                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="text-sm text-green-600 hover:underline">

                            Lupa Password?

                        </a>

                    @endif

                </div>

                <button
                    type="submit"
                    class="w-full mt-6 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition">

                    Masuk

                </button>

                <div class="text-center mt-6">

                    <span class="text-gray-600">

                        Belum punya akun?

                    </span>

                    <a
                        href="{{ route('register') }}"
                        class="text-green-600 font-semibold hover:underline">

                        Daftar

                    </a>

                </div>

            </form>

        </div>

    </div>

</x-guest-layout>