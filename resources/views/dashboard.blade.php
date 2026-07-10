<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <div class="mt-4 p-4 bg-light border rounded shadow-sm">
                        <h4 class="fw-bold">Selamat Datang di ReservHub!</h4>
                        <p class="text-muted">Mau nongkrong atau kerja kelompok di mana hari ini?</p>
                        <!-- Tombol jembatan menuju fitur Cari Tempat milikmu -->
                        <a href="{{ route('customer.explore') }}" class="btn btn-success fw-bold">
                            🔍 Cari & Reservasi Tempat Sekarang
                        </a>
                        <a href="{{ route('customer.booking.history') }}" class="btn btn-outline-primary fw-bold ms-2">
                            📋 Lihat Riwayat Reservasi
                        </a>
                        <a href="{{ route('customer.favorite.list') }}" class="btn btn-outline-danger fw-bold ms-2">
                            ❤️ Tempat Favorit Saya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
