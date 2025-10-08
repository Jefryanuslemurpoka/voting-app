{{-- resources/views/dashboard/votes/index.blade.php --}}
<x-admin-layout>
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-indigo-900">
        <div class="max-w-7xl mx-auto px-6 py-12">
            
            <!-- Back Button -->
            <div class="mb-8">
                <a href="{{ route('admin.dashboard') }}" 
                   class="inline-flex items-center px-6 py-3 bg-white dark:bg-gray-800/50 backdrop-blur-xl rounded-2xl shadow-lg border border-gray-200/50 dark:border-gray-700/50 hover:shadow-xl hover:scale-105 transition-all duration-300 group">
                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-300 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors mr-3" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span class="text-gray-700 dark:text-gray-300 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 font-medium transition-colors">
                        Kembali ke Dashboard
                    </span>
                </a>
            </div>
            
            <!-- Header Section -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h1 class="text-5xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-4">
                    Hasil Pemungutan Suara
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Dashboard real-time untuk melihat perolehan suara setiap kandidat
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto mt-6 rounded-full"></div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white dark:bg-gray-800/50 backdrop-blur-xl rounded-3xl p-6 shadow-lg border border-gray-200/50 dark:border-gray-700/50">
                    <div class="flex items-center">
                        <div class="p-3 rounded-2xl bg-gradient-to-r from-blue-500 to-blue-600 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Total Kandidat</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ count($candidates) }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800/50 backdrop-blur-xl rounded-3xl p-6 shadow-lg border border-gray-200/50 dark:border-gray-700/50">
                    <div class="flex items-center">
                        <div class="p-3 rounded-2xl bg-gradient-to-r from-emerald-500 to-emerald-600 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Total Suara</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $candidates->sum('votes_count') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800/50 backdrop-blur-xl rounded-3xl p-6 shadow-lg border border-gray-200/50 dark:border-gray-700/50">
                    <div class="flex items-center">
                        <div class="p-3 rounded-2xl bg-gradient-to-r from-purple-500 to-purple-600 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">Live</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Candidates Grid -->
            <div class="flex flex-wrap justify-center items-start gap-8 max-w-6xl mx-auto">
                @foreach ($candidates->sortByDesc('votes_count') as $index => $candidate)
                    <div class="group relative">
                        <!-- Ranking Badge -->
                        @if($index < 3)
                            <div class="absolute -top-4 -right-4 z-10">
                                @if($index == 0)
                                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center shadow-lg border-4 border-white dark:border-gray-800">
                                        <span class="text-white font-bold text-lg">🏆</span>
                                    </div>
                                @elseif($index == 1)
                                    <div class="w-12 h-12 bg-gradient-to-r from-gray-400 to-gray-500 rounded-full flex items-center justify-center shadow-lg border-4 border-white dark:border-gray-800">
                                        <span class="text-white font-bold text-lg">🥈</span>
                                    </div>
                                @else
                                    <div class="w-12 h-12 bg-gradient-to-r from-amber-600 to-amber-700 rounded-full flex items-center justify-center shadow-lg border-4 border-white dark:border-gray-800">
                                        <span class="text-white font-bold text-lg">🥉</span>
                                    </div>
                                @endif
                            </div>
                        @endif

                        <div class="bg-white dark:bg-gray-800/50 backdrop-blur-xl rounded-3xl p-8 shadow-xl border border-gray-200/50 dark:border-gray-700/50 hover:shadow-2xl hover:scale-105 transition-all duration-500 group-hover:border-indigo-200 dark:group-hover:border-indigo-700">
                            
                            <!-- Photo Section -->
                            <div class="flex justify-center mb-6">
                                @if ($candidate->photo)
                                    <div class="relative">
                                        <img src="{{ asset('storage/' . $candidate->photo) }}" 
                                             alt="Foto {{ $candidate->name }}" 
                                             class="w-32 h-32 rounded-full object-cover shadow-xl ring-4 ring-indigo-100 dark:ring-indigo-900 group-hover:ring-indigo-200 dark:group-hover:ring-indigo-800 transition-all duration-300">
                                        <div class="absolute inset-0 rounded-full bg-gradient-to-t from-black/20 to-transparent"></div>
                                    </div>
                                @else
                                    <div class="w-32 h-32 flex items-center justify-center rounded-full bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 shadow-xl ring-4 ring-indigo-100 dark:ring-indigo-900">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Name -->
                            <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-white mb-6 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                                {{ $candidate->name }}
                            </h2>

                            <!-- Vision & Mission -->
                            <div class="space-y-4 mb-6">
                                <div class="p-4 rounded-2xl bg-indigo-50 dark:bg-indigo-900/30 border border-indigo-100 dark:border-indigo-800">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-indigo-100 dark:bg-indigo-800 flex items-center justify-center mt-0.5">
                                            <svg class="w-3 h-3 text-indigo-600 dark:text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-xs font-semibold text-indigo-700 dark:text-indigo-300 uppercase tracking-wider mb-1">Visi</p>
                                            <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">{{ $candidate->visi }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4 rounded-2xl bg-purple-50 dark:bg-purple-900/30 border border-purple-100 dark:border-purple-800">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-purple-100 dark:bg-purple-800 flex items-center justify-center mt-0.5">
                                            <svg class="w-3 h-3 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-xs font-semibold text-purple-700 dark:text-purple-300 uppercase tracking-wider mb-1">Misi</p>
                                            <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">{{ $candidate->misi }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Vote Count -->
                            <div class="text-center">
                                <div class="relative inline-block">
                                    <div class="px-8 py-4 rounded-2xl bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg hover:shadow-xl transition-shadow duration-300">
                                        <div class="flex items-center justify-center space-x-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                            <span class="text-2xl font-bold">{{ number_format($candidate->votes_count) }}</span>
                                            <span class="text-sm opacity-90">suara</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Percentage -->
                                    @if($candidates->sum('votes_count') > 0)
                                        <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2">
                                            <div class="px-3 py-1 bg-white dark:bg-gray-800 rounded-full shadow-md border border-gray-200 dark:border-gray-700">
                                                <span class="text-xs font-semibold text-gray-600 dark:text-gray-400">
                                                    {{ number_format(($candidate->votes_count / $candidates->sum('votes_count')) * 100, 1) }}%
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            @if($candidates->sum('votes_count') > 0)
                                <div class="mt-6">
                                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 overflow-hidden">
                                        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2 rounded-full transition-all duration-1000 ease-out" 
                                             style="width: {{ ($candidate->votes_count / $candidates->sum('votes_count')) * 100 }}%"></div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Footer -->
            <div class="text-center mt-16 pt-8 border-t border-gray-200 dark:border-gray-700">
                <p class="text-gray-500 dark:text-gray-400">
                    Data diperbarui secara real-time • 
                    <span class="inline-flex items-center">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse mr-2"></span>
                        Live
                    </span>
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>