<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kafe Favorit Saya') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm fw-bold">
                ⬅️ Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($favorites->isEmpty())
                    <div class="alert alert-info text-center py-5">
                        <p class="fs-5 mb-3">Belum ada tempat yang kamu favoritkan.</p>
                        <a href="{{ route('customer.explore') }}" class="btn btn-primary fw-bold">🔍 Cari Reservasi Tempat Sekarang</a>
                    </div>
                @else
                    <div class="row">
                        @foreach($favorites as $place)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $place->name }}</h5>
                                        <p class="card-text text-muted small">{{ $place->address ?? 'Alamat tidak tersedia' }}</p>
                                        
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <a href="{{ route('customer.show', $place->id) }}" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                                            
                                            <!-- Tombol untuk hapus dari favorit -->
                                            <form action="{{ route('customer.favorite.toggle', $place->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">💔 Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>