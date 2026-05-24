<?php

use Livewire\Component;

new class extends Component {};
?>

<footer class="bg-gray-50 border-t border-gray-200 pt-12 pb-28 lg:pb-12 px-5 sm:px-8 text-xs sm:text-sm text-gray-500">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">

        <div>
            <span class="font-display font-bold text-lg text-teal-600 tracking-tight block mb-4">Exponit Labs</span>
            <p class="leading-relaxed text-gray-400">Mumbai, Maharashtra, India</p>
        </div>

        <div>
            <span class="font-semibold text-gray-900 block mb-4 text-xs tracking-wider uppercase">Navigation</span>
            <div class="grid grid-cols-2 gap-2">
                <a href="/" class="hover:text-teal-600 transition-colors">Home</a>
                <a href="/about" class="hover:text-teal-600 transition-colors">About Us</a>
                <a href="/products" class="hover:text-teal-600 transition-colors">Products</a>
                <a href="/contact" class="hover:text-teal-600 transition-colors">Contact</a>
            </div>
        </div>

        <div>
            <span class="font-semibold text-gray-900 block mb-4 text-xs tracking-wider uppercase">Regulatory
                Links</span>
            <div class="flex flex-col gap-2">
                <a href="/privacy-policy" class="hover:text-teal-600 transition-colors">Privacy Policy (DPDP
                    Compliant)</a>
                <a href="/terms" class="hover:text-teal-600 transition-colors">Terms & Conditions</a>
            </div>
        </div>

    </div>

    <div class="max-w-6xl mx-auto border-t border-gray-200 pt-6 text-center text-gray-400 text-xs leading-relaxed">
        <p class="max-w-3xl mx-auto mb-4">
            IMPORTANT: This website is intended for healthcare professionals and general information only. Products
            mentioned are prescription medicines and should only be used under medical supervision. Not intended as
            medical advice.
        </p>
        <p>&copy; 2026 Exponit Labs. All rights reserved. Confidential — Internal Use Only.</p>
        <p>v{{ config('version.number') }}</p>
    </div>
</footer>
