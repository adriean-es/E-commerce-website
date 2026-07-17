<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Mail, ArrowLeft } from '@lucide/vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Forgot password" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <div class="min-h-screen bg-gray-50 flex items-center justify-center px-6 py-12" style="font-family:'Inter',sans-serif;">
        <div class="w-full max-w-md">

            <!-- Logo -->
            <Link href="/" class="flex items-center gap-2 mb-10">
                <span class="text-xl font-black">
                    <span class="text-cyan-600">Sari</span><span class="text-gray-900">Sari</span><span class="text-gray-300">.ph</span>
                </span>
            </Link>

            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Reset your password</h1>
                <p class="text-sm text-gray-500 mt-2 leading-relaxed">
                    Enter the email address linked to your account and we'll send you a link to reset your password.
                </p>
            </div>

            <!-- Status -->
            <div v-if="status" class="mb-5 bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3 rounded-lg">
                {{ status }}
            </div>

            <form @submit.prevent="submit" class="space-y-5">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email address</label>
                    <div class="relative">
                        <Mail class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" />
                        <input
                            id="email"
                            v-model="form.email"
                            type="email"
                            autocomplete="email"
                            autofocus
                            placeholder="you@example.com"
                            class="w-full h-11 bg-white border border-gray-200 rounded-lg pl-10 pr-4 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all"
                            :class="{ 'border-red-400': form.errors.email }"
                        />
                    </div>
                    <p v-if="form.errors.email" class="text-xs text-red-600 mt-1.5">{{ form.errors.email }}</p>
                </div>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full h-11 bg-cyan-600 hover:bg-cyan-700 disabled:opacity-60 disabled:cursor-not-allowed text-white font-semibold rounded-lg transition-colors flex items-center justify-center gap-2"
                >
                    <svg v-if="form.processing" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    {{ form.processing ? 'Sending...' : 'Send reset link' }}
                </button>
            </form>

            <div class="mt-6 text-center">
                <Link :href="route('login')" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-cyan-600 font-medium transition-colors">
                    <ArrowLeft class="h-4 w-4" /> Back to sign in
                </Link>
            </div>
        </div>
    </div>
</template>
