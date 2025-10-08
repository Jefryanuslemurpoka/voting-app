{{-- resources/views/dashboard/candidate/index.blade.php --}}
<x-admin-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <!-- Header Section dengan Glassmorphism -->
            <div class="mb-8 backdrop-blur-lg bg-white/30 dark:bg-gray-800/30 rounded-3xl p-6 border border-white/20 shadow-xl">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-800 to-blue-600 dark:from-gray-100 dark:to-blue-400 bg-clip-text text-transparent">
                                Daftar Calon
                            </h1>
                            <p class="mt-2 text-gray-600 dark:text-gray-300 text-lg">
                                Kelola dan pantau semua calon yang terdaftar dalam sistem
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.candidates.create') }}"
   class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center gap-2">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
    </svg>
    Tambah Calon
</a>

                        <a href="{{ route('admin.dashboard') }}"
                           class="px-6 py-3 bg-white/80 hover:bg-white dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            <!-- Notifikasi dengan animasi -->
            @if(session('success'))
                <div class="mb-6 p-4 rounded-2xl bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 border border-green-200 dark:border-green-800 animate-pulse">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-green-500 rounded-full">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <p class="text-green-800 dark:text-green-200 font-semibold">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 rounded-2xl bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/20 dark:to-rose-900/20 border border-red-200 dark:border-red-800 animate-pulse">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-red-500 rounded-full">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <p class="text-red-800 dark:text-red-200 font-semibold">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm font-medium">Total Calon</p>
                            <p class="text-3xl font-bold">{{ $candidates->total() }}</p>
                        </div>
                        <div class="p-3 bg-white/20 rounded-xl">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-emerald-100 text-sm font-medium">Aktif</p>
                            <p class="text-3xl font-bold">{{ $candidates->count() }}</p>
                        </div>
                        <div class="p-3 bg-white/20 rounded-xl">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-100 text-sm font-medium">Halaman</p>
                            <p class="text-3xl font-bold">{{ $candidates->currentPage() }} / {{ $candidates->lastPage() }}</p>
                        </div>
                        <div class="p-3 bg-white/20 rounded-xl">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 00-2-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cards Grid untuk Calon -->
            @forelse ($candidates as $candidate)
                <div class="mb-6 backdrop-blur-lg bg-white/60 dark:bg-gray-800/60 rounded-3xl border border-white/20 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                    <div class="p-8">
                        <div class="flex flex-col lg:flex-row gap-8">
                            <!-- Photo Section -->
                            <div class="flex-shrink-0">
                                <div class="relative group">
                                    @if($candidate->photo)
                                        <div class="w-32 h-32 rounded-2xl overflow-hidden shadow-lg bg-gradient-to-br from-gray-200 to-gray-300">
                                            <img src="{{ asset('storage/' . $candidate->photo) }}" 
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                                 alt="{{ $candidate->name }}">
                                        </div>
                                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    @else
                                        <div class="w-32 h-32 rounded-2xl bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 flex items-center justify-center shadow-lg">
                                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center shadow-lg">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Content Section -->
                            <div class="flex-1 min-w-0">
                                <!-- Header -->
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6">
                                    <div class="flex items-center gap-4 mb-4 sm:mb-0">
                                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl text-white font-bold text-lg">
                                            {{ $loop->iteration }}
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $candidate->name }}</h3>
                                            <p class="text-gray-500 dark:text-gray-400 text-sm">Calon Kandidat</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Action Buttons -->
                                    <div class="flex gap-3">
                                        <a href="{{ route('candidates.edit', $candidate->id) }}"
                                           class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Edit
                                        </a>

                                        <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" 
                                              onsubmit="return confirm('Yakin ingin menghapus calon ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center gap-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Visi Misi Content -->
                                <div class="grid md:grid-cols-2 gap-6">
                                    <!-- Visi -->
                                    <div class="space-y-3">
                                        <div class="flex items-center gap-2">
                                            <div class="p-2 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </div>
                                            <h4 class="text-lg font-bold text-gray-800 dark:text-gray-100">Visi</h4>
                                        </div>
                                        <div class="p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-xl border border-green-200 dark:border-green-800">
                                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $candidate->visi }}</p>
                                        </div>
                                    </div>

                                    <!-- Misi -->
                                    <div class="space-y-3">
                                        <div class="flex items-center gap-2">
                                            <div class="p-2 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v11a2 2 0 002 2h2l3-3h9a2 2 0 002-2V7a2 2 0 00-2-2H9z"></path>
                                                </svg>
                                            </div>
                                            <h4 class="text-lg font-bold text-gray-800 dark:text-gray-100">Misi</h4>
                                        </div>
                                        <div class="p-4 bg-gradient-to-r from-purple-50 to-purple-50 dark:from-purple-900/20 dark:to-purple-900/20 rounded-xl border border-purple-200 dark:border-purple-800">
                                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $candidate->misi }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-16">
                    <div class="max-w-md mx-auto">
                        <div class="w-32 h-32 mx-auto mb-8 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 rounded-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-600 dark:text-gray-400 mb-4">Belum Ada Calon</h3>
                        <p class="text-gray-500 dark:text-gray-500 mb-8">
                            Belum ada calon yang terdaftar dalam sistem. Mulai dengan menambahkan calon baru.
                        </p>
                    </div>
                </div>
            @endforelse

            <!-- Pagination dengan styling modern -->
            @if($candidates->hasPages())
                <div class="mt-12 flex justify-center">
                    <div class="backdrop-blur-lg bg-white/60 dark:bg-gray-800/60 rounded-2xl p-4 border border-white/20 shadow-lg">
                        {{ $candidates->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>
        /* Custom styles for pagination */
        .pagination {
            @apply flex items-center gap-2;
        }
        
        .pagination a,
        .pagination span {
            @apply px-4 py-2 rounded-xl font-semibold transition-all duration-200;
        }
        
        .pagination a {
            @apply bg-white/80 dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-blue-500 hover:text-white shadow-md hover:shadow-lg transform hover:-translate-y-0.5;
        }
        
        .pagination .active span {
            @apply bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg;
        }
        
        .pagination .disabled span {
            @apply bg-gray-100 dark:bg-gray-800 text-gray-400 cursor-not-allowed;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            @apply bg-gray-100 dark:bg-gray-800 rounded-full;
        }
        
        ::-webkit-scrollbar-thumb {
            @apply bg-gradient-to-b from-blue-500 to-purple-600 rounded-full;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            @apply from-blue-600 to-purple-700;
        }
    </style>
</x-admin-layout>