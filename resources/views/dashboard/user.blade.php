<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 dark:from-gray-900 dark:via-blue-950 dark:to-indigo-950 relative">
        <!-- Subtle Background Effects -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-20 w-72 h-72 bg-blue-200/20 dark:bg-blue-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-80 h-80 bg-indigo-200/20 dark:bg-indigo-500/10 rounded-full blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_120%,rgba(120,119,198,0.1),rgba(255,255,255,0))]"></div>
        </div>

        <div class="relative max-w-6xl mx-auto px-6 py-12">
            <!-- Clean Professional Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4 tracking-tight">
                    Sistem Pemilihan Digital
                </h1>
                
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">
                    Selamat datang, <span class="font-semibold text-blue-600 dark:text-blue-400">{{ auth()->user()->name }}</span>
                </p>
                
                <div class="inline-flex items-center px-4 py-2 bg-green-50 dark:bg-green-950/50 text-green-700 dark:text-green-400 rounded-full text-sm font-medium border border-green-200 dark:border-green-800">
                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                    Sistem Aktif
                </div>
            </div>

            <!-- Clean Info Panel -->
            <div class="mb-12 max-w-4xl mx-auto">
                <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-2xl p-8 shadow-lg border border-gray-200/50 dark:border-gray-700/50">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-amber-100 dark:bg-amber-900/30 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                                Panduan Pemilihan
                            </h3>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                Pilihlah kandidat yang paling sesuai dengan aspirasi dan nilai-nilai yang Anda dukung. 
                                <span class="font-medium">Pertimbangkan dengan matang</span> visi dan misi setiap kandidat, karena suara Anda berkontribusi dalam menentukan arah kemajuan di masa mendatang.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Professional Kandidat Cards -->
            <div class="flex flex-wrap justify-center gap-8">
                @forelse ($candidates as $candidate)
                    <div class="group w-full max-w-sm">
                        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden transform group-hover:scale-[1.02] transition-all duration-300 group-hover:shadow-2xl">
                            
                            <!-- Header Section -->
                            <div class="h-24 bg-gradient-to-r from-blue-500 to-indigo-600 relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-black/10 to-transparent"></div>
                            </div>

                            <!-- Content Section -->
                            <div class="px-8 pb-8">
                                <!-- Photo Section -->
                                <div class="relative -mt-12 mb-6">
                                    <div class="w-24 h-24 mx-auto rounded-full overflow-hidden border-4 border-white dark:border-gray-800 shadow-lg bg-white">
                                        <img src="{{ $candidate->photo ? asset('storage/' . $candidate->photo) : asset('images/default-avatar.png') }}"
                                             alt="{{ $candidate->name }}"
                                             class="w-full h-full object-cover">
                                    </div>
                                    
                                    <!-- Verification Badge -->
                                    <div class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 translate-x-8 w-7 h-7 bg-green-500 rounded-full flex items-center justify-center border-2 border-white dark:border-gray-800">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Name -->
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center mb-6">
                                    {{ $candidate->name }}
                                </h2>

                                <!-- Visi & Misi -->
                                <div class="space-y-4 mb-8">
                                    <!-- Visi -->
                                    <div class="bg-blue-50 dark:bg-blue-950/50 rounded-xl p-4 border border-blue-100 dark:border-blue-800/50">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-6 h-6 bg-blue-100 dark:bg-blue-900/50 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                                <svg class="w-3 h-3 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-blue-900 dark:text-blue-300 text-sm mb-1">VISI</h4>
                                                <p class="text-sm text-blue-800 dark:text-blue-200 leading-relaxed">{{ $candidate->visi }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Misi -->
                                    <div class="bg-emerald-50 dark:bg-emerald-950/50 rounded-xl p-4 border border-emerald-100 dark:border-emerald-800/50">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-6 h-6 bg-emerald-100 dark:bg-emerald-900/50 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                                <svg class="w-3 h-3 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-emerald-900 dark:text-emerald-300 text-sm mb-1">MISI</h4>
                                                <p class="text-sm text-emerald-800 dark:text-emerald-200 leading-relaxed">{{ $candidate->misi }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Vote Button -->
                                <form action="{{ route('user.vote', $candidate->id) }}" method="POST" class="w-full">
                                    @csrf
                                    <button type="submit"
                                        class="w-full py-4 rounded-xl font-semibold text-white transition-all duration-300 shadow-lg
                                        {{ auth()->user()->hasVoted() 
                                            ? 'bg-gradient-to-r from-gray-400 to-gray-500 cursor-not-allowed pointer-events-none opacity-70' 
                                            : 'bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 transform hover:scale-105 active:scale-95 hover:shadow-xl' }}"
                                        {{ auth()->user()->hasVoted() ? 'disabled' : '' }}>
                                        
                                        <div class="flex items-center justify-center space-x-2">
                                            @if(auth()->user()->hasVoted())
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span>SUDAH MEMILIH</span>
                                            @else
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span>PILIH KANDIDAT</span>
                                            @endif
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-16 w-full">
                        <div class="w-20 h-20 bg-gray-100 dark:bg-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-600 dark:text-gray-400 mb-2">Belum Ada Kandidat</h3>
                        <p class="text-gray-500 dark:text-gray-500">Kandidat akan ditampilkan ketika sudah tersedia</p>
                    </div>
                @endforelse
            </div>

            <!-- Clean Footer -->
            <div class="mt-16 text-center">
                <div class="inline-flex items-center px-6 py-3 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-full border border-gray-200/50 dark:border-gray-700/50 shadow-lg">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Sistem Pemilihan Aman & Terpercaya</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Notification - Fixed Positioning -->
    <div id="successNotification" class="fixed top-8 right-8 transform translate-x-full opacity-0 transition-all duration-300 ease-out z-[9999]" style="display: none;">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-green-200 dark:border-green-800 p-4 min-w-[300px] max-w-[400px]">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-900 dark:text-white text-sm">Berhasil Memilih!</h4>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Pilihan Anda telah tersimpan</p>
                </div>
                <button onclick="hideSuccessNotification()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        // Global notification functions
        function showSuccessNotification() {
            const notification = document.getElementById('successNotification');
            
            // Reset all classes first
            notification.style.display = 'block';
            notification.classList.remove('translate-x-full', 'opacity-0');
            
            // Small delay then show
            requestAnimationFrame(() => {
                notification.classList.add('translate-x-0', 'opacity-100');
            });
            
            // Auto hide after 3 seconds
            setTimeout(() => {
                hideSuccessNotification();
            }, 3000);
        }

        function hideSuccessNotification() {
            const notification = document.getElementById('successNotification');
            
            // Hide with animation
            notification.classList.remove('translate-x-0', 'opacity-100');
            notification.classList.add('translate-x-full', 'opacity-0');
            
            // Completely hide after animation
            setTimeout(() => {
                notification.style.display = 'none';
            }, 300);
        }

        // Show notification on page load if vote success
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                setTimeout(() => {
                    showSuccessNotification();
                }, 200);
            @endif

            // Handle vote button clicks
            document.querySelectorAll('form[action*="vote"]').forEach(form => {
                const button = form.querySelector('button[type="submit"]');
                const span = button.querySelector('span');
                
                if (button && span && !button.disabled) {
                    form.addEventListener('submit', function(e) {
                        // Show loading state
                        span.textContent = 'MEMPROSES...';
                        button.disabled = true;
                        button.classList.add('opacity-75');
                        button.classList.remove('hover:scale-105', 'hover:shadow-xl');
                    });
                }
            });
        });
    </script>
</x-app-layout>