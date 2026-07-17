<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { MailCheck, ArrowLeft } from '@lucide/vue';

defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};
</script>

<template>
    <Head title="Verify email" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <div class="min-h-screen bg-gray-50 flex items-center justify-center px-6 py-12" style="font-family:'Inter',sans-serif;">
        <div class="w-full max-w-md text-center">

            <Link href="/" class="inline-flex items-center gap-2 mb-10">
                <span class="text-xl font-black">
                    <span class="text-cyan-600">Sari</span><span class="text-gray-900">Sari</span><span class="text-gray-300">.ph</span>
                </span>
            </Link>

            <!-- Icon -->
            <div class="w-16 h-16 bg-cyan-50 rounded-2xl flex items-center justify-center mx-auto mb-6 border border-cyan-100">
                <MailCheck class="h-8 w-8 text-cyan-600" />
            </div>

            <h1 class="text-2xl font-bold text-gray-900 mb-3">Check your email</h1>
            <p class="text-sm text-gray-500 leading-relaxed max-w-sm mx-auto">
                We've sent a verification link to your email address. Please click the link to verify your account before continuing.
            </p>

            <!-- Status -->
            <div v-if="status === 'verification-link-sent'"
                 class="mt-5 bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3 rounded-lg">
                A new verification link has been sent to your email address.
            </div>

            <form @submit.prevent="submit" class="mt-8">
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full h-11 bg-cyan-600 hover:bg-cyan-700 disabled:opacity-60 disabled:cursor-not-allowed text-white font-semibold rounded-lg transition-colors flex items-center justify-center gap-2"
                >
                    <svg v-if="form.processing" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    {{ form.processing ? 'Sending...' : 'Resend verification email' }}
                </button>
            </form>

            <div class="mt-6">
                <Link :href="route('logout')" method="post" as="button"
                      class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-cyan-600 font-medium transition-colors">
                    <ArrowLeft class="h-4 w-4" /> Sign out and go back
                </Link>
            </div>
        </div>
    </div>
</template>
