<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import { Shield, User, Lock, Smartphone, Monitor, Trash2 } from '@lucide/vue';

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});

const page = usePage();
const userRoles = computed(() => page.props.userRoles || []);
const isAdmin = computed(() => userRoles.value.includes('admin'));
</script>

<template>
    <AppLayout title="Profile">
        <template #header>
            <div class="flex items-center gap-3">
                <h2 class="text-xl font-bold text-gray-900">Profile Settings</h2>
                <span v-if="isAdmin" class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-full bg-red-50 text-red-600 border border-red-200 uppercase">
                    <Shield class="h-3 w-3" /> Admin
                </span>
            </div>
        </template>

        <div class="max-w-4xl mx-auto space-y-8">
            <!-- Profile Information -->
            <div v-if="$page.props.jetstream.canUpdateProfileInformation" class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-3">
                    <div class="h-8 w-8 bg-cyan-50 rounded-lg flex items-center justify-center">
                        <User class="h-4 w-4 text-cyan-600" />
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900">Profile Information</h3>
                </div>
                <div class="p-6">
                    <UpdateProfileInformationForm :user="$page.props.auth.user" />
                </div>
            </div>

            <!-- Update Password -->
            <div v-if="$page.props.jetstream.canUpdatePassword" class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-3">
                    <div class="h-8 w-8 bg-amber-50 rounded-lg flex items-center justify-center">
                        <Lock class="h-4 w-4 text-amber-600" />
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900">Update Password</h3>
                </div>
                <div class="p-6">
                    <UpdatePasswordForm />
                </div>
            </div>

            <!-- Two Factor Authentication -->
            <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication" class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-3">
                    <div class="h-8 w-8 bg-green-50 rounded-lg flex items-center justify-center">
                        <Smartphone class="h-4 w-4 text-green-600" />
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900">Two-Factor Authentication</h3>
                </div>
                <div class="p-6">
                    <TwoFactorAuthenticationForm
                        :requires-confirmation="confirmsTwoFactorAuthentication"
                    />
                </div>
            </div>

            <!-- Browser Sessions -->
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-3">
                    <div class="h-8 w-8 bg-blue-50 rounded-lg flex items-center justify-center">
                        <Monitor class="h-4 w-4 text-blue-600" />
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900">Browser Sessions</h3>
                </div>
                <div class="p-6">
                    <LogoutOtherBrowserSessionsForm :sessions="sessions" />
                </div>
            </div>

            <!-- Delete Account -->
            <div v-if="$page.props.jetstream.hasAccountDeletionFeatures" class="bg-white rounded-xl border border-red-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-red-100 flex items-center gap-3">
                    <div class="h-8 w-8 bg-red-50 rounded-lg flex items-center justify-center">
                        <Trash2 class="h-4 w-4 text-red-600" />
                    </div>
                    <h3 class="text-sm font-semibold text-red-700">Delete Account</h3>
                </div>
                <div class="p-6">
                    <DeleteUserForm />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
