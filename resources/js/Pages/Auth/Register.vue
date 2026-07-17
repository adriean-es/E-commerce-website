<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Eye, EyeOff, Lock, Mail, User, ShoppingBag, CheckCircle } from '@lucide/vue';
import { ref } from 'vue';

const showPassword = ref(false);
const showConfirm  = ref(false);

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const perks = [
    'Access 50,000+ verified local sellers',
    'Buyer protection on every order',
    'Exclusive deals and flash sales',
    'Free shipping on ₱999+ orders',
];
</script>

<template>
    <Head title="Create account" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <div class="min-h-screen bg-gray-50 flex" style="font-family:'Inter',sans-serif;">

        <!-- Left: Branding Panel -->
        <div class="hidden lg:flex lg:w-1/2 bg-gray-950 flex-col justify-between p-12">
            <Link href="/">
                <span class="text-2xl font-black tracking-tight">
                    <span class="text-cyan-400">Sari</span><span class="text-white">Sari</span><span class="text-gray-500">.ph</span>
                </span>
            </Link>

            <div>
                <div class="w-16 h-16 bg-cyan-600/20 rounded-2xl flex items-center justify-center mb-8 border border-cyan-600/30">
                    <ShoppingBag class="h-8 w-8 text-cyan-400" />
                </div>
                <h2 class="text-4xl font-extrabold text-white leading-tight mb-4">
                    Join the biggest<br />Filipino marketplace.
                </h2>
                <p class="text-gray-400 text-base mb-10">
                    Create your free account and start shopping or selling today.
                </p>

                <ul class="space-y-4">
                    <li v-for="perk in perks" :key="perk" class="flex items-center gap-3">
                        <CheckCircle class="h-5 w-5 text-cyan-400 shrink-0" />
                        <span class="text-sm text-gray-300">{{ perk }}</span>
                    </li>
                </ul>
            </div>

            <p class="text-xs text-gray-600">
                &copy; 2026 SariSari.ph &nbsp;·&nbsp; Made in the Philippines
            </p>
        </div>

        <!-- Right: Form Panel -->
        <div class="flex-1 flex items-center justify-center px-6 py-12 overflow-y-auto">
            <div class="w-full max-w-md">

                <Link href="/" class="lg:hidden flex items-center gap-2 mb-8">
                    <span class="text-xl font-black">
                        <span class="text-cyan-600">Sari</span><span class="text-gray-900">Sari</span><span class="text-gray-300">.ph</span>
                    </span>
                </Link>

                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-900">Create your account</h1>
                    <p class="text-sm text-gray-500 mt-1">
                        Already have one?
                        <Link :href="route('login')" class="text-cyan-600 font-semibold hover:underline">Sign in</Link>
                    </p>
                </div>

                <form @submit.prevent="submit" class="space-y-4">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Full name</label>
                        <div class="relative">
                            <User class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" />
                            <input
                                id="name"
                                v-model="form.name"
                                type="text"
                                autocomplete="name"
                                placeholder="Juan dela Cruz"
                                class="w-full h-11 bg-white border border-gray-200 rounded-lg pl-10 pr-4 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all"
                                :class="{ 'border-red-400': form.errors.name }"
                            />
                        </div>
                        <p v-if="form.errors.name" class="text-xs text-red-600 mt-1.5">{{ form.errors.name }}</p>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email address</label>
                        <div class="relative">
                            <Mail class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" />
                            <input
                                id="email"
                                v-model="form.email"
                                type="email"
                                autocomplete="email"
                                placeholder="you@example.com"
                                class="w-full h-11 bg-white border border-gray-200 rounded-lg pl-10 pr-4 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all"
                                :class="{ 'border-red-400': form.errors.email }"
                            />
                        </div>
                        <p v-if="form.errors.email" class="text-xs text-red-600 mt-1.5">{{ form.errors.email }}</p>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                        <div class="relative">
                            <Lock class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" />
                            <input
                                id="password"
                                v-model="form.password"
                                :type="showPassword ? 'text' : 'password'"
                                autocomplete="new-password"
                                placeholder="Min. 8 characters"
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

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5">
                            Confirm password
                        </label>
                        <div class="relative">
                            <Lock class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" />
                            <input
                                id="password_confirmation"
                                v-model="form.password_confirmation"
                                :type="showConfirm ? 'text' : 'password'"
                                autocomplete="new-password"
                                placeholder="Repeat your password"
                                class="w-full h-11 bg-white border border-gray-200 rounded-lg pl-10 pr-10 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all"
                            />
                            <button type="button" @click="showConfirm = !showConfirm"
                                    class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <component :is="showConfirm ? EyeOff : Eye" class="h-4 w-4" />
                            </button>
                        </div>
                    </div>

                    <!-- Terms (if applicable) -->
                    <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="flex items-start gap-2.5 pt-1">
                        <input id="terms" v-model="form.terms" type="checkbox"
                               class="mt-0.5 h-4 w-4 text-cyan-600 border-gray-300 rounded focus:ring-cyan-500 cursor-pointer" />
                        <label for="terms" class="text-sm text-gray-500 cursor-pointer leading-relaxed">
                            I agree to the
                            <a :href="route('terms.show')" class="text-cyan-600 font-medium hover:underline" target="_blank">Terms of Service</a>
                            and
                            <a :href="route('policy.show')" class="text-cyan-600 font-medium hover:underline" target="_blank">Privacy Policy</a>
                        </label>
                    </div>
                    <p v-if="form.errors.terms" class="text-xs text-red-600">{{ form.errors.terms }}</p>

                    <!-- Submit -->
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full h-11 bg-cyan-600 hover:bg-cyan-700 disabled:opacity-60 disabled:cursor-not-allowed text-white font-semibold rounded-lg transition-colors flex items-center justify-center gap-2 mt-2"
                    >
                        <svg v-if="form.processing" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        {{ form.processing ? 'Creating account...' : 'Create account' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
