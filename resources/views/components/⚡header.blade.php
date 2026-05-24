<?php

use Livewire\Component;

new class extends Component {
    public string $currentRoute = '';

    public function mount(): void
    {
        // Dynamically capture the current route name on initialization [cite: 191]
        $this->currentRoute = Route::currentRouteName() ?? 'home';
    }
};
?>

<div class="w-full">
    <header
        class="hidden lg:flex sticky top-0 z-40 bg-white border-b border-teal-100 h-16 items-center px-8 justify-between">
        <div class="flex items-center gap-2">
            <a href="/" class="font-display font-bold text-xl text-teal-600 tracking-tight">
                Exponit <span class="text-gray-900">Labs</span>
            </a>
        </div>

        <nav class="flex gap-8 h-full items-center">
            <a href="/"
                class="relative text-sm font-medium transition-colors py-5 {{ $currentRoute === 'home' ? 'text-teal-600 font-semibold after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-teal-600' : 'text-gray-700 hover:text-teal-600' }}">
                Home
            </a>
            <a href="/"
                class="relative text-sm font-medium transition-colors py-5 {{ $currentRoute === 'about' ? 'text-teal-600 font-semibold after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-teal-600' : 'text-gray-700 hover:text-teal-600' }}">
                About Us
            </a>
            <a href="/"
                class="relative text-sm font-medium transition-colors py-5 {{ $currentRoute === 'products' ? 'text-teal-600 font-semibold after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-teal-600' : 'text-gray-700 hover:text-teal-600' }}">
                Products
            </a>
            <a href="/"
                class="relative text-sm font-medium transition-colors py-5 {{ $currentRoute === 'contact' ? 'text-teal-600 font-semibold after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-teal-600' : 'text-gray-700 hover:text-teal-600' }}">
                Contact
            </a>
        </nav>

        <div>
            <a href="/contact"
                class="bg-teal-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-teal-700 transition-all text-sm shadow-sm min-h-[44px] flex items-center">
                Contact Us
            </a>
        </div>
    </header>

    <div
        class="lg:hidden fixed bottom-4 left-1/2 -translate-x-1/2 z-50 bg-white/80 backdrop-blur-md border border-teal-200 rounded-full px-6 py-3 shadow-xl flex gap-6 w-[calc(100%-2rem)] max-w-[400px] justify-between items-center">

        <a href="/"
            class="flex flex-col items-center justify-center min-w-[44px] min-h-[44px] transition-colors {{ $currentRoute === 'home' ? 'text-teal-600 font-semibold' : 'text-gray-400 hover:text-teal-600' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span class="text-[10px] mt-0.5">Home</span>
        </a>

        <a href="/"
            class="flex flex-col items-center justify-center min-w-[44px] min-h-[44px] transition-colors {{ $currentRoute === 'products' ? 'text-teal-600 font-semibold' : 'text-gray-400 hover:text-teal-600' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                </path>
            </svg>
            <span class="text-[10px] mt-0.5">Products</span>
        </a>

        <a href="/"
            class="flex flex-col items-center justify-center min-w-[44px] min-h-[44px] transition-colors {{ $currentRoute === 'about' ? 'text-teal-600 font-semibold' : 'text-gray-400 hover:text-teal-600' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                </path>
            </svg>
            <span class="text-[10px] mt-0.5">About</span>
        </a>

        <a href="/"
            class="flex flex-col items-center justify-center min-w-[44px] min-h-[44px] transition-colors {{ $currentRoute === 'contact' ? 'text-teal-600 font-semibold' : 'text-gray-400 hover:text-teal-600' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                </path>
            </svg>
            <span class="text-[10px] mt-0.5">Contact</span>
        </a>
    </div>
</div>
