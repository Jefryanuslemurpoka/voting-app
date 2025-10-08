{{-- resources/views/dashboard/candidate/create.blade.php --}}
<x-admin-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-4xl mx-auto px-6 py-12">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full mb-4">
                    <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">
                    Tambah Calon Baru
                </h1>
                <p class="text-gray-600 dark:text-gray-400 text-lg">
                    Lengkapi informasi calon dengan detail yang akurat
                </p>
            </div>

            {{-- Alert Messages --}}
            @if (session('success'))
                <div class="mb-8 p-4 rounded-xl bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-400 dark:from-green-900/20 dark:to-emerald-900/20">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-green-800 dark:text-green-200 font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-8 p-4 rounded-xl bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-400 dark:from-red-900/20 dark:to-pink-900/20">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-red-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-red-800 dark:text-red-200 font-medium">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-8 p-6 rounded-xl bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-400 dark:from-red-900/20 dark:to-pink-900/20">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-red-400 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h3 class="text-red-800 dark:text-red-200 font-medium mb-2">Terdapat kesalahan:</h3>
                            <ul class="list-disc pl-5 space-y-1 text-red-700 dark:text-red-300">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Main Form Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <!-- Personal Information Section -->
                        <div class="space-y-6">
                            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Informasi Personal
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Masukkan informasi dasar calon</p>
                            </div>

                            <!-- Nama Calon -->
                            <div class="group">
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Nama Calon <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text" name="name" id="name" required value="{{ old('name') }}"
                                           class="block w-full pl-4 pr-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl 
                                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                                  focus:ring-2 focus:ring-blue-500 focus:border-transparent
                                                  transition-all duration-200 ease-in-out
                                                  placeholder-gray-400 dark:placeholder-gray-500"
                                           placeholder="Masukkan nama lengkap calon">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Foto -->
                            <div class="group">
                                <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Foto Calon
                                </label>
                                <div class="relative">
                                    <div class="flex items-center justify-center w-full">
                                        <label for="photo" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-600 transition-all duration-200">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-2 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                </svg>
                                                <p class="mb-1 text-sm text-gray-500 dark:text-gray-400 font-medium">Klik untuk upload foto</p>
                                                <p class="text-xs text-gray-400 dark:text-gray-500">PNG, JPG, JPEG (Max. 2MB)</p>
                                            </div>
                                            <input type="file" name="photo" id="photo" class="hidden" accept="image/*">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Vision & Mission Section -->
                        <div class="space-y-6">
                            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                    Visi & Misi
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Jelaskan visi dan misi calon dengan detail</p>
                            </div>

                            <!-- Visi -->
                            <div class="group">
                                <label for="visi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Visi <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <textarea name="visi" id="visi" rows="4" required
                                              class="block w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl 
                                                     bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                                     focus:ring-2 focus:ring-blue-500 focus:border-transparent
                                                     transition-all duration-200 ease-in-out resize-none
                                                     placeholder-gray-400 dark:placeholder-gray-500"
                                              placeholder="Tuliskan visi yang ingin dicapai oleh calon...">{{ old('visi') }}</textarea>
                                    <div class="absolute top-3 right-3 pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Misi -->
                            <div class="group">
                                <label for="misi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Misi <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <textarea name="misi" id="misi" rows="6" required
                                              class="block w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl 
                                                     bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                                     focus:ring-2 focus:ring-blue-500 focus:border-transparent
                                                     transition-all duration-200 ease-in-out resize-none
                                                     placeholder-gray-400 dark:placeholder-gray-500"
                                              placeholder="Tuliskan misi-misi yang akan dijalankan untuk mencapai visi...">{{ old('misi') }}</textarea>
                                    <div class="absolute top-3 right-3 pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h6a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row sm:justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('admin.dashboard') }}"
                               class="inline-flex items-center justify-center px-6 py-3 border-2 border-gray-300 dark:border-gray-600 
                                      text-gray-700 dark:text-gray-300 font-medium rounded-xl
                                      hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-400 dark:hover:border-gray-500
                                      focus:ring-2 focus:ring-gray-500 focus:border-transparent
                                      transition-all duration-200 ease-in-out">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali
                            </a>
                            <button type="submit"
                                    class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 
                                           text-white font-medium rounded-xl shadow-lg
                                           hover:from-blue-700 hover:to-indigo-700 hover:shadow-xl
                                           focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800
                                           transform hover:-translate-y-0.5
                                           transition-all duration-200 ease-in-out">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Simpan Calon
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Additional Info Card -->
            <div class="mt-8 bg-blue-50 dark:bg-blue-900/20 rounded-xl p-6 border border-blue-200 dark:border-blue-800">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="text-blue-900 dark:text-blue-100 font-medium mb-1">Tips Pengisian Form</h3>
                        <p class="text-blue-800 dark:text-blue-200 text-sm leading-relaxed">
                            Pastikan informasi yang diisi akurat dan lengkap. Visi harus menggambarkan tujuan jangka panjang, 
                            sedangkan misi berisi langkah-langkah konkret untuk mencapai visi tersebut.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>