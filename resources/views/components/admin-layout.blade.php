{{-- resources/views/components/admin-layout.blade.php --}}
<x-app-layout>
    {{-- Page Heading --}}
    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- Page Content --}}
    <main class="p-6">
        {{ $slot }}
    </main>
</x-app-layout>
