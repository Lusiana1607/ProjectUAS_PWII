<!-- CDN Font Awesome & Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ url('/explore/' . $place->id) }}" class="w-9 h-9 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 flex items-center justify-center transition-all shadow-sm">
                    <i class="fa-solid fa-arrow-left text-sm"></i>
                </a>
                <div>
                    <h2 class="font-extrabold text-xl text-slate-900 tracking-tight">Formulir Reservasi Tempat</h2>
                    <p class="text-xs text-slate-500">Lengkapi detail pemesanan tempat Anda</p>
                </div>
            </div>
            <a href="{{ url('/explore/' . $place->id) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-600 text-xs font-semibold transition-all border border-rose-200/60">
                <i class="fa-solid fa-xmark"></i>
                Batal
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-[#F8FAFC] min-h-[calc(100vh-4rem)]">
        <div class="max-w-2xl mx-auto px-4 sm:px-6">

            <!-- Card Utama Form Reservasi -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                
                <!-- Header Banner Card -->
                <div class="bg-slate-900 p-6 sm:p-8 text-white relative overflow-hidden">
                    <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl"></div>
                    <div class="relative z-10 flex items-center justify-between">
                        <div>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-400 text-[11px] font-bold uppercase tracking-wider mb-2 border border-emerald-500/30">
                                <i class="fa-solid fa-store text-xs"></i>
                                Tempat yang Dipilih
                            </span>
                            <h1 class="text-2xl sm:text-3xl font-black text-white tracking-tight">{{ $place->name }}</h1>
                            @if(isset($place->address))
                                <p class="text-xs text-slate-400 mt-1 flex items-center gap-1.5">
                                    <i class="fa-solid fa-location-dot text-emerald-400"></i>
                                    {{ $place->address }}
                                </p>
                            @endif
                        </div>
                        <div class="hidden sm:flex w-12 h-12 rounded-2xl bg-white/10 backdrop-blur-md items-center justify-center text-emerald-400 text-xl border border-white/10">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                    </div>
                </div>

                <!-- Form Inputs -->
                <form action="{{ route('customer.booking.store', $place->id) }}" method="POST" class="p-6 sm:p-8 space-y-6">
                    @csrf

                    <!-- Alert Pesan Error Validasi -->
                    @if ($errors->any())
                        <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-700 text-xs space-y-1">
                            <div class="font-bold flex items-center gap-1.5">
                                <i class="fa-solid fa-triangle-exclamation text-rose-500"></i>
                                Harap periksa kembali inputan Anda:
                            </div>
                            <ul class="list-disc list-inside pl-1 space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Tanggal Reservasi -->
                    <div class="space-y-2">
                        <label for="booking_date" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            Tanggal Reservasi <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-regular fa-calendar text-sm"></i>
                            </div>
                            <input type="date" name="booking_date" id="booking_date" value="{{ old('booking_date') }}" class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 text-slate-800 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none bg-slate-50/50 transition-all font-medium" required>
                        </div>
                    </div>

                    <!-- Jam Mulai & Jam Selesai -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="start_time" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Jam Mulai <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <i class="fa-regular fa-clock text-sm"></i>
                                </div>
                                <input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}" class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 text-slate-800 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none bg-slate-50/50 transition-all font-medium" required>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="end_time" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Jam Selesai <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <i class="fa-regular fa-clock text-sm"></i>
                                </div>
                                <input type="time" name="end_time" id="end_time" value="{{ old('end_time') }}" class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 text-slate-800 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none bg-slate-50/50 transition-all font-medium" required>
                            </div>
                        </div>
                    </div>

                    <!-- Jumlah Orang / Pax (Disesuaikan ke total_guests) -->
                    <div class="space-y-2">
                        <label for="total_guests" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            Jumlah Orang / Pax <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-solid fa-users text-sm"></i>
                            </div>
                            <input type="number" name="total_guests" id="total_guests" min="1" placeholder="Contoh: 4" value="{{ old('total_guests') }}" class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 text-slate-800 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none bg-slate-50/50 transition-all font-medium" required>
                        </div>
                    </div>

                    <!-- Catatan Khusus (Opsional) -->
                    <div class="space-y-2">
                        <label for="notes" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            Catatan Khusus <span class="text-slate-400 font-normal">(Opsional)</span>
                        </label>
                        <textarea name="notes" id="notes" rows="3" placeholder="Contoh: Request meja indoor dekat AC / colokan listrik..." class="w-full px-4 py-3 rounded-xl border border-slate-200 text-slate-800 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none bg-slate-50/50 transition-all font-normal">{{ old('notes') }}</textarea>
                    </div>

                    <hr class="border-slate-100 my-4">

                    <!-- Tombol Konfirmasi -->
                    <div class="pt-2">
                        <button type="submit" class="w-full py-4 bg-emerald-600 hover:bg-emerald-500 active:scale-[0.99] text-white font-bold text-sm rounded-2xl shadow-lg shadow-emerald-600/25 transition-all duration-200 flex items-center justify-center gap-2 cursor-pointer">
                            <i class="fa-solid fa-paper-plane"></i>
                            Konfirmasi & Ajukan Booking
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>