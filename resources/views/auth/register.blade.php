<x-guest-layout>

    <div class="w-full max-w-2xl mx-auto">

    <div class="bg-white rounded-2xl shadow-xl border border-green-100 p-8">

        <div class="text-center mb-8">

            <h1 class="text-4xl font-bold text-green-700">
                ReservHub
            </h1>

            <p class="text-gray-500 mt-2">
                Buat akun baru dan mulai gunakan ReservHub.
            </p>

        </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input
    id="name"
    class="block mt-2 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
    type="text"
    name="name"
    :value="old('name')"
    required
    autofocus
    autocomplete="name"
/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-2 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-2 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-2 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
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

        <label class="flex items-start gap-4 border border-gray-200 rounded-xl p-4 cursor-pointer transition duration-200 hover:border-green-500 hover:bg-green-50">

           <input
    type="radio"
    name="role"
    value="customer"
    checked
    onclick="toggleOwnerFields()"
    class="mt-1 text-green-600 focus:ring-green-500"
>

            <div>

                <p class="font-semibold text-gray-800">
                    Customer
                </p>

                <p class="text-sm text-gray-500">
                    Reservasi tempat, favorit, dan review.
                </p>

            </div>

        </label>

        <label class="flex items-start gap-4 border border-gray-200 rounded-xl p-4 cursor-pointer transition duration-200 hover:border-green-500 hover:bg-green-50">

            <input
    type="radio"
    name="role"
    value="owner"
    onclick="toggleOwnerFields()"
    class="mt-1 text-green-600 focus:ring-green-500"
>

            <div>

                <p class="font-semibold text-gray-800">
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
<div id="owner-fields" class="mt-8 hidden">

    <div class="bg-green-50 border border-green-200 rounded-xl p-6">

    <h3 class="text-xl font-bold text-green-700 mb-2">

        Informasi Usaha

    </h3>

    <p class="text-sm text-gray-600 mb-6">

        Lengkapi data usaha Anda untuk mengajukan akun sebagai Owner.

    </p>

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

</div>

        <div class="mt-8">

    <button
        type="submit"
        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition duration-200">

        Daftar

    </button>

    <div class="text-center mt-5">

        <span class="text-gray-600">
            Sudah punya akun?
        </span>

        <a
            href="{{ route('login') }}"
            class="text-green-600 font-semibold hover:underline">

            Masuk

        </a>

    </div>

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

    </div>

</div>

</x-guest-layout>
