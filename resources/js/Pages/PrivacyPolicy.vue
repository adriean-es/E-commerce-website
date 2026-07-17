<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ShieldCheck, ArrowLeft, ShoppingBag } from '@lucide/vue';

defineProps({
    policy: String,
});
</script>

<template>
    <Head title="Privacy Policy" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <div class="min-h-screen bg-gray-50" style="font-family:'Inter',sans-serif;">
        <!-- Top bar -->
        <nav class="bg-white border-b border-gray-200 sticky top-0 z-10">
            <div class="max-w-4xl mx-auto px-6 h-16 flex items-center justify-between">
                <Link href="/" class="flex items-center gap-2">
                    <ShoppingBag class="h-6 w-6 text-cyan-600" />
                    <span class="text-lg font-black tracking-tight">
                        <span class="text-cyan-600">Sari</span><span class="text-gray-900">Sari</span><span class="text-gray-300">.ph</span>
                    </span>
                </Link>
                <Link href="/" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-cyan-600 font-medium transition-colors">
                    <ArrowLeft class="h-4 w-4" /> Back
                </Link>
            </div>
        </nav>

        <div class="max-w-4xl mx-auto px-6 py-12">
            <!-- Header -->
            <div class="mb-10">
                <div class="w-12 h-12 bg-cyan-50 rounded-xl flex items-center justify-center mb-4 border border-cyan-100">
                    <ShieldCheck class="h-6 w-6 text-cyan-600" />
                </div>
                <h1 class="text-3xl font-bold text-gray-900">Privacy Policy</h1>
                <p class="text-sm text-gray-500 mt-2">Last updated: July 2026</p>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-xl border border-gray-200 p-8 sm:p-10">
                <div v-if="policy" class="prose prose-gray max-w-none prose-headings:text-gray-900 prose-a:text-cyan-600 prose-strong:text-gray-900" v-html="policy" />
                <div v-else class="prose prose-gray max-w-none">
                    <p class="text-gray-600 leading-relaxed">
                        At SariSari.ph, we take your privacy seriously. This policy outlines how we collect, use, and protect your personal information when you use our marketplace platform.
                    </p>
                    <h2 class="text-lg font-semibold text-gray-900 mt-8">Information We Collect</h2>
                    <p class="text-gray-600 leading-relaxed">We collect information you provide when creating an account, placing orders, and communicating with sellers — including your name, email address, shipping address, and payment details.</p>
                    <h2 class="text-lg font-semibold text-gray-900 mt-8">How We Use Your Information</h2>
                    <p class="text-gray-600 leading-relaxed">Your information is used to process orders, improve our platform, send important notifications, and provide customer support. We never sell your personal data to third parties.</p>
                    <h2 class="text-lg font-semibold text-gray-900 mt-8">Data Security</h2>
                    <p class="text-gray-600 leading-relaxed">We implement industry-standard security measures including encryption, secure servers, and regular audits to protect your data.</p>
                </div>
            </div>
        </div>
    </div>
</template>
