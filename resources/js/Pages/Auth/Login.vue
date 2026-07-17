<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Eye, EyeOff, Lock, Mail, ShoppingBag } from '@lucide/vue';
import { ref } from 'vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const showPassword = ref(false);

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <div class="min-h-screen bg-gray-50 flex" style="font-family:'Inter',sans-serif;">

        <!-- Left: Branding Panel -->
        <div class="hidden lg:flex lg:w-1/2 bg-gray-950 flex-col justify-between p-12">
            <!-- Logo -->
            <Link href="/">
                <span class="text-2xl font-black tracking-tight">
                    <span class="text-cyan-400">Sari</span><span class="text-white">Sari</span><span class="text-gray-500">.ph</span>
                </span>
            </Link>

            <!-- Center content -->
            <div>
                <div class="w-16 h-16 bg-cyan-600/20 rounded-2xl flex items-center justify-center mb-8 border border-cyan-600/30">
                    <ShoppingBag class="h-8 w-8 text-cyan-400" />
                </div>
                <h2 class="text-4xl font-extrabold text-white leading-tight mb-4">
                    Welcome back<br />to the marketplace.
                </h2>
                <p class="text-gray-400 text-base leading-relaxed max-w-sm">
                    Sign in to continue shopping from thousands of independent Filipino sellers.
                </p>

                <!-- Trust indicators -->
                <div class="mt-12 grid grid-cols-3 gap-6">
                    <div v-for="stat in [['50K+','Sellers'],['2M+','Customers'],['4.9★','Rating']]" :key="stat[1]">
                        <p class="text-2xl font-black text-white">{{ stat[0] }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">{{ stat[1] }}</p>
                    </div>
                </div>
            </div>

            <!-- Footer quote -->
            <p class="text-xs text-gray-600">
                &copy; 2026 SariSari.ph &nbsp;·&nbsp; Made in the Philippines
            </p>
        </div>

        <!-- Right: Form Panel -->
        <div class="flex-1 flex items-center justify-center px-6 py-12">
            <div class="w-full max-w-md">

                <!-- Mobile logo -->
                <Link href="/" class="lg:hidden flex items-center gap-2 mb-8">
                    <span class="text-xl font-black">
                        <span class="text-cyan-600">Sari</span><span class="text-gray-900">Sari</span><span class="text-gray-300">.ph</span>
                    </span>
                </Link>

                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-900">Sign in to your account</h1>
                    <p class="text-sm text-gray-500 mt-1">
                        Don't have one?
                        <Link :href="route('register')" class="text-cyan-600 font-semibold hover:underline">
                            Create an account
                        </Link>
                    </p>
                </div>

                <!-- Status message -->
                <div v-if="status" class="mb-5 bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3 rounded-lg">
                    {{ status }}
                </div>

                <form @submit.prevent="submit" class="space-y-5">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">
                            Email address
                        </label>
                        <div class="relative">
                            <Mail class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" />
                            <input
                                id="email"
                                v-model="form.email"
                                type="email"
                                autocomplete="email"
                                placeholder="you@example.com"
                                class="w-full h-11 bg-white border border-gray-200 rounded-lg pl-10 pr-4 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all"
                                :class="{ 'border-red-400 focus:ring-red-400': form.errors.email }"
                            />
                        </div>
                        <p v-if="form.errors.email" class="text-xs text-red-600 mt-1.5">{{ form.errors.email }}</p>
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <Link v-if="canResetPassword" :href="route('password.request')"
                                  class="text-xs text-cyan-600 font-medium hover:underline">
                                Forgot password?
                            </Link>
                        </div>
                        <div class="relative">
                            <Lock class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" />
                            <input
                                id="password"
                                v-model="form.password"
                                :type="showPassword ? 'text' : 'password'"
                                autocomplete="current-password"
                                placeholder="••••••••"
                                class="w-full h-11 bg-white border border-gray-200 rounded-lg pl-10 pr-10 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all"
                                :class="{ 'border-red-400 focus:ring-red-400': form.errors.password }"
                            />
                            <button type="button" @click="showPassword = !showPassword"
                                    class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <component :is="showPassword ? EyeOff : Eye" class="h-4 w-4" />
                            </button>
                        </div>
                        <p v-if="form.errors.password" class="text-xs text-red-600 mt-1.5">{{ form.errors.password }}</p>
                    </div>

                    <!-- Remember me -->
                    <div class="flex items-center">
                        <input id="remember" v-model="form.remember" type="checkbox"
                               class="h-4 w-4 text-cyan-600 border-gray-300 rounded focus:ring-cyan-500 cursor-pointer" />
                        <label for="remember" class="ml-2.5 text-sm text-gray-600 cursor-pointer">
                            Keep me signed in
                        </label>
                    </div>

                    <!-- Submit -->
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full h-11 bg-cyan-600 hover:bg-cyan-700 disabled:opacity-60 disabled:cursor-not-allowed text-white font-semibold rounded-lg transition-colors flex items-center justify-center gap-2"
                    >
                        <svg v-if="form.processing" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        {{ form.processing ? 'Signing in...' : 'Sign in' }}
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="bg-gray-50 px-3 text-xs text-gray-400">New to SariSari.ph?</span>
                    </div>
                </div>

                <!-- Prominent Sign Up Button -->
                <Link :href="route('register')" class="w-full h-11 border-2 border-cyan-600 text-cyan-600 hover:bg-cyan-50 font-bold text-sm rounded-lg flex items-center justify-center transition-colors">
                    Create an account
                </Link>

                <div class="mt-4 text-center">
                    <Link href="/" class="text-xs text-gray-400 hover:text-gray-600 transition-colors">
                        Continue as Guest
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>
