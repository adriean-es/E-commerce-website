<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import { KeyRound, ArrowLeft } from '@lucide/vue';
import { ref, nextTick } from 'vue';

const recovery = ref(false);

const form = useForm({
    code: '',
    recovery_code: '',
});

const recoveryCodeInput = ref(null);
const codeInput = ref(null);

const toggleRecovery = async () => {
    recovery.value ^= true;
    await nextTick();
    if (recovery.value) {
        recoveryCodeInput.value?.focus();
        form.code = '';
    } else {
        codeInput.value?.focus();
        form.recovery_code = '';
    }
};

const submit = () => {
    form.post(route('two-factor.login'));
};
</script>

<template>
    <Head title="Two-factor authentication" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <div class="min-h-screen bg-gray-50 flex items-center justify-center px-6 py-12" style="font-family:'Inter',sans-serif;">
        <div class="w-full max-w-md">

            <span class="text-xl font-black inline-block mb-10">
                <span class="text-cyan-600">Sari</span><span class="text-gray-900">Sari</span><span class="text-gray-300">.ph</span>
            </span>

            <!-- Icon -->
            <div class="w-16 h-16 bg-cyan-50 rounded-2xl flex items-center justify-center mb-6 border border-cyan-100">
                <KeyRound class="h-8 w-8 text-cyan-600" />
            </div>

            <h1 class="text-2xl font-bold text-gray-900 mb-3">Two-factor authentication</h1>

            <p v-if="!recovery" class="text-sm text-gray-500 leading-relaxed mb-6">
                Please enter the authentication code from your authenticator app to continue.
            </p>
            <p v-else class="text-sm text-gray-500 leading-relaxed mb-6">
                Please enter one of your emergency recovery codes to continue.
            </p>

            <form @submit.prevent="submit" class="space-y-5">
                <!-- OTP Code -->
                <div v-if="!recovery">
                    <label for="code" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Authentication code
                    </label>
                    <input
                        id="code"
                        ref="codeInput"
                        v-model="form.code"
                        type="text"
                        inputmode="numeric"
                        autofocus
                        autocomplete="one-time-code"
                        placeholder="000000"
                        class="w-full h-11 bg-white border border-gray-200 rounded-lg px-4 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all tracking-widest text-center text-lg font-mono"
                        :class="{ 'border-red-400': form.errors.code }"
                    />
                    <p v-if="form.errors.code" class="text-xs text-red-600 mt-1.5">{{ form.errors.code }}</p>
                </div>

                <!-- Recovery Code -->
                <div v-else>
                    <label for="recovery_code" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Recovery code
                    </label>
                    <input
                        id="recovery_code"
                        ref="recoveryCodeInput"
                        v-model="form.recovery_code"
                        type="text"
                        autocomplete="one-time-code"
                        placeholder="xxxxx-xxxxx"
                        class="w-full h-11 bg-white border border-gray-200 rounded-lg px-4 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all font-mono"
                        :class="{ 'border-red-400': form.errors.recovery_code }"
                    />
                    <p v-if="form.errors.recovery_code" class="text-xs text-red-600 mt-1.5">{{ form.errors.recovery_code }}</p>
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
                    {{ form.processing ? 'Verifying...' : 'Verify' }}
                </button>
            </form>

            <div class="mt-6 text-center">
                <button @click="toggleRecovery"
                        class="text-sm text-gray-500 hover:text-cyan-600 font-medium transition-colors">
                    {{ recovery ? 'Use authentication code instead' : 'Use a recovery code instead' }}
                </button>
            </div>
        </div>
    </div>
</template>
