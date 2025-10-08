{{-- resources/views/dashboard/admin.blade.php --}}
<x-admin-layout>
    <div class="max-w-7xl mx-auto px-6 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Admin Dashboard</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
                Selamat datang, 
                <span class="font-semibold text-gray-900 dark:text-white">
                    {{ auth()->user()->name }}
                </span> 👋
            </p>
        </div>

        <!-- Card Info -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
            <!-- Card: Daftarkan User Baru -->
            <a href="{{ route('register') }}" 
               class="group bg-white dark:bg-gray-800 shadow-sm hover:shadow-md rounded-2xl p-6 border border-gray-200 dark:border-gray-700 transition">
                <div class="flex items-center space-x-4">
                    <div class="p-3 rounded-xl bg-blue-100 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Daftarkan User Baru</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Tambah akun pengguna baru ke sistem</p>
                    </div>
                </div>
            </a>

            <!-- Card: Lihat Jumlah Vote -->
            <a href="{{ route('admin.votes.index') }}" 
               class="group bg-white dark:bg-gray-800 shadow-sm hover:shadow-md rounded-2xl p-6 border border-gray-200 dark:border-gray-700 transition">
                <div class="flex items-center space-x-4">
                    <div class="p-3 rounded-xl bg-green-100 text-green-600 group-hover:bg-green-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 
                                     00-2 2v6a2 2 0 002 2h2a2 2 0 
                                     002-2zm0 0V9a2 2 0 012-2h2a2 2 0 
                                     012 2v10m-6 0a2 2 0 002 2h2a2 2 0 
                                     002-2m0 0V5a2 2 0 012-2h2a2 2 0 
                                     012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Lihat Jumlah Vote</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Pantau hasil voting yang masuk</p>
                    </div>
                </div>
            </a>

            <!-- Card: Lihat Daftar Pengguna -->
            <a href="{{ route('admin.users.index') }}" 
               class="group bg-white dark:bg-gray-800 shadow-sm hover:shadow-md rounded-2xl p-6 border border-gray-200 dark:border-gray-700 transition">
                <div class="flex items-center space-x-4">
                    <div class="p-3 rounded-xl bg-purple-100 text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 
                                     0112 0v1zm0 0h6v-1a6 6 0 
                                     00-9-5.197m13.5-9a2.5 2.5 0 
                                     11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Lihat Daftar Pengguna</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Kelola dan lihat semua user terdaftar</p>
                    </div>
                </div>
            </a>

            <!-- Card: Tambah Calon -->
            <a href="{{ route('admin.candidates.create') }}" 
               class="group bg-white dark:bg-gray-800 shadow-sm hover:shadow-md rounded-2xl p-6 border border-gray-200 dark:border-gray-700 transition">
                <div class="flex items-center space-x-4">
                    <div class="p-3 rounded-xl bg-red-100 text-red-600 group-hover:bg-red-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Tambah Calon</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Daftarkan calon yang bisa dipilih user</p>
                    </div>
                </div>
            </a>

            <!-- Card: Lihat Daftar Calon -->
            <a href="{{ route('admin.candidates.index') }}" 
               class="group bg-white dark:bg-gray-800 shadow-sm hover:shadow-md rounded-2xl p-6 border border-gray-200 dark:border-gray-700 transition">
                <div class="flex items-center space-x-4">
                    <div class="p-3 rounded-xl bg-yellow-100 text-yellow-600 group-hover:bg-yellow-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Lihat Daftar Calon</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Kelola dan lihat semua calon terdaftar</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</x-admin-layout>
