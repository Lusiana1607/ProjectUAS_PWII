<!-- CDN Font Awesome & Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center font-bold">
                    <i class="fa-solid fa-user-gear text-lg"></i>
                </div>
                <div>
                    <h2 class="font-extrabold text-xl text-slate-900 tracking-tight">Pengaturan Profil</h2>
                    <p class="text-xs text-slate-500">Kelola informasi akun dan keamanan kata sandi Anda</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-[#F8FAFC] min-h-[calc(100vh-4rem)]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 space-y-8">

            <!-- Card 1: Informasi Profil -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="p-6 sm:p-8 border-b border-slate-100 bg-slate-900 text-white flex items-center justify-between">
                    <div>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-400 text-[11px] font-bold uppercase tracking-wider mb-2 border border-emerald-500/30">
                            <i class="fa-solid fa-id-card text-xs"></i>
                            Informasi Akun
                        </span>
                        <h3 class="text-xl font-bold">Informasi Profil</h3>
                        <p class="text-xs text-slate-400 mt-1">Perbarui nama dan alamat email akun Anda.</p>
                    </div>
                    <div class="hidden sm:flex w-12 h-12 rounded-2xl bg-white/10 backdrop-blur-md items-center justify-center text-emerald-400 text-xl border border-white/10">
                        <i class="fa-solid fa-user-pen"></i>
                    </div>
                </div>

                <div class="p-6 sm:p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Card 2: Perbarui Password -->
            <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="p-6 sm:p-8 border-b border-slate-100 bg-slate-900 text-white flex items-center justify-between">
                    <div>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-400 text-[11px] font-bold uppercase tracking-wider mb-2 border border-emerald-500/30">
                            <i class="fa-solid fa-shield-halved text-xs"></i>
                            Keamanan
                        </span>
                        <h3 class="text-xl font-bold">Ubah Kata Sandi</h3>
                        <p class="text-xs text-slate-400 mt-1">Pastikan akun Anda menggunakan kata sandi yang kuat dan aman.</p>
                    </div>
                    <div class="hidden sm:flex w-12 h-12 rounded-2xl bg-white/10 backdrop-blur-md items-center justify-center text-emerald-400 text-xl border border-white/10">
                        <i class="fa-solid fa-key"></i>
                    </div>
                </div>

                <div class="p-6 sm:p-8">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Card 3: Hapus Akun -->
            <div class="bg-white rounded-3xl border border-rose-200/80 shadow-sm overflow-hidden">
                <div class="p-6 sm:p-8 border-b border-rose-100 bg-rose-500/10 flex items-center justify-between">
                    <div>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-100 text-rose-600 text-[11px] font-bold uppercase tracking-wider mb-1 border border-rose-200">
                            <i class="fa-solid fa-triangle-exclamation text-xs"></i>
                            Zona Bahaya
                        </span>
                        <h3 class="text-xl font-bold text-rose-900">Hapus Akun</h3>
                        <p class="text-xs text-rose-600/80 mt-1">Setelah akun Anda dihapus, semua data dan sumber daya akan dihapus secara permanen.</p>
                    </div>
                </div>

                <div class="p-6 sm:p-8">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>