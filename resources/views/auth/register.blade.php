<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Pilihan Pendaftaran -->
<div class="mt-6">

    <x-input-label
        for="role"
        :value="__('Daftar Sebagai')"
    />

    <div class="mt-3 space-y-3">

        <label class="flex items-center gap-3 border rounded-lg p-4 cursor-pointer hover:border-green-500">

            <input
    type="radio"
    name="role"
    value="customer"
    checked
    onclick="toggleOwnerFields()"
>

            <div>

                <p class="font-semibold">
                    Customer
                </p>

                <p class="text-sm text-gray-500">
                    Reservasi tempat, favorit, dan review.
                </p>

            </div>

        </label>

        <label class="flex items-center gap-3 border rounded-lg p-4 cursor-pointer hover:border-green-500">

            <input
                type="radio"
                name="role"
                value="owner"
                onclick="toggleOwnerFields()"
            >

            <div>

                <p class="font-semibold">
                    Owner
                </p>

                <p class="text-sm text-gray-500">
                    Daftarkan usahamu dan kelola reservasi pelanggan.
                </p>

            </div>

        </label>

    </div>

</div>

        <!-- Data Owner -->
<div id="owner-fields" class="mt-6 hidden">

    <h3 class="text-lg font-semibold text-gray-800 mb-4">
        Informasi Usaha
    </h3>

    <!-- Nama Usaha -->
    <div class="mb-4">
        <x-input-label for="business_name" value="Nama Usaha" />

        <x-text-input
            id="business_name"
            class="block mt-1 w-full"
            type="text"
            name="business_name"
            :value="old('business_name')"
        />

        <x-input-error :messages="$errors->get('business_name')" class="mt-2" />
    </div>

    <!-- Kategori -->
    <div class="mb-4">

        <x-input-label for="category_id" value="Kategori" />

        <select
            id="category_id"
            name="category_id"
            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
        >

            <option value="">
                -- Pilih Kategori --
            </option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>

            @endforeach

        </select>

        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />

    </div>

    <div class="mb-4">

    <x-input-label for="address" value="Alamat Lengkap" />

    <textarea
        id="address"
        name="address"
        rows="3"
        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
    >{{ old('address') }}</textarea>

    <x-input-error :messages="$errors->get('address')" class="mt-2" />

</div>

<div class="mb-4">

    <x-input-label for="phone" value="Nomor HP" />

    <x-text-input
        id="phone"
        class="block mt-1 w-full"
        type="text"
        name="phone"
        :value="old('phone')"
    />

    <x-input-error :messages="$errors->get('phone')" class="mt-2" />

</div>

<div class="mb-4">

    <x-input-label
        for="operating_hours"
        value="Jam Operasional"
    />

    <x-text-input
        id="operating_hours"
        class="block mt-1 w-full"
        type="text"
        name="operating_hours"
        :value="old('operating_hours')"
        placeholder="Contoh: 08.00 - 22.00"
    />

    <x-input-error :messages="$errors->get('operating_hours')" class="mt-2" />

</div>

</div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>

function toggleOwnerFields() {

    const owner = document.querySelector('input[value="owner"]');

    const ownerFields = document.getElementById('owner-fields');

    if(owner.checked){

        ownerFields.classList.remove('hidden');

    }else{

        ownerFields.classList.add('hidden');

    }

}

window.onload = toggleOwnerFields;

</script>

</x-guest-layout>
