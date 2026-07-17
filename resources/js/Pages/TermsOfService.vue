<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { FileText, ArrowLeft, ShoppingBag } from '@lucide/vue';

defineProps({
    terms: String,
});
</script>

<template>
    <Head title="Terms of Service" />
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
                    <FileText class="h-6 w-6 text-cyan-600" />
                </div>
                <h1 class="text-3xl font-bold text-gray-900">Terms of Service</h1>
                <p class="text-sm text-gray-500 mt-2">Last updated: July 2026</p>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-xl border border-gray-200 p-8 sm:p-10">
                <div v-if="terms" class="prose prose-gray max-w-none prose-headings:text-gray-900 prose-a:text-cyan-600 prose-strong:text-gray-900" v-html="terms" />
                <div v-else class="prose prose-gray max-w-none">
                    <p class="text-gray-600 leading-relaxed">
                        Welcome to SariSari.ph. By accessing and using our marketplace platform, you agree to be bound by the following terms and conditions.
                    </p>
                    <h2 class="text-lg font-semibold text-gray-900 mt-8">Account Responsibilities</h2>
                    <p class="text-gray-600 leading-relaxed">You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</p>
                    <h2 class="text-lg font-semibold text-gray-900 mt-8">Marketplace Conduct</h2>
                    <p class="text-gray-600 leading-relaxed">Users must not engage in fraudulent transactions, sell prohibited items, or misrepresent products. Violations may result in account suspension.</p>
                    <h2 class="text-lg font-semibold text-gray-900 mt-8">Payments and Refunds</h2>
                    <p class="text-gray-600 leading-relaxed">All transactions are processed securely. Refund policies are governed by individual seller terms, with buyer protection provided by SariSari.ph for qualifying orders.</p>
                </div>
            </div>
        </div>
    </div>
</template>
