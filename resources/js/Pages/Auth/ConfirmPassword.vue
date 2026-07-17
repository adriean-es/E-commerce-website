<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import { Eye, EyeOff, Lock, ShieldAlert } from '@lucide/vue';
import { ref } from 'vue';

const showPassword = ref(false);

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Confirm password" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <div class="min-h-screen bg-gray-50 flex items-center justify-center px-6 py-12" style="font-family:'Inter',sans-serif;">
        <div class="w-full max-w-md">

            <span class="text-xl font-black inline-block mb-10">
                <span class="text-cyan-600">Sari</span><span class="text-gray-900">Sari</span><span class="text-gray-300">.ph</span>
            </span>

            <!-- Icon -->
            <div class="w-16 h-16 bg-amber-50 rounded-2xl flex items-center justify-center mb-6 border border-amber-100">
                <ShieldAlert class="h-8 w-8 text-amber-600" />
            </div>

            <h1 class="text-2xl font-bold text-gray-900 mb-3">Confirm your password</h1>
            <p class="text-sm text-gray-500 leading-relaxed mb-6">
                This is a secure area of the application. Please confirm your password before continuing.
            </p>

            <form @submit.prevent="submit" class="space-y-5">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                    <div class="relative">
                        <Lock class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" />
                        <input
                            id="password"
                            v-model="form.password"
                            :type="showPassword ? 'text' : 'password'"
                            autocomplete="current-password"
                            autofocus
                            placeholder="Enter your current password"
                            class="w-full h-11 bg-white border border-gray-200 rounded-lg pl-10 pr-10 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all"
                            :class="{ 'border-red-400': form.errors.password }"
                        />
                        <button type="button" @click="showPassword = !showPassword"
                                class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <component :is="showPassword ? EyeOff : Eye" class="h-4 w-4" />
                        </button>
                    </div>
                    <p v-if="form.errors.password" class="text-xs text-red-600 mt-1.5">{{ form.errors.password }}</p>
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
                    {{ form.processing ? 'Confirming...' : 'Confirm' }}
                </button>
            </form>
        </div>
    </div>
</template>
