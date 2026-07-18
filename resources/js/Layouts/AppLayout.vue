<script setup>
import { ref, computed } from 'vue';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import Banner from '@/Components/Banner.vue';
import {
    LayoutDashboard,
    User,
    ShoppingBag,
    Package,
    Settings,
    LogOut,
    Menu,
    X,
    ChevronDown,
    Shield,
    Store,
    Users,
    BarChart3,
    FileText,
    Home,
    Bell,
} from '@lucide/vue';

defineProps({
    title: String,
});

const page = usePage();

const sidebarOpen = ref(false);

const userRoles = computed(() => page.props.userRoles || []);
const isAdmin = computed(() => userRoles.value.includes('admin'));
const isVendor = computed(() => userRoles.value.includes('seller'));
const userName = computed(() => page.props.auth?.user?.name || 'User');
const userEmail = computed(() => page.props.auth?.user?.email || '');
const userPhoto = computed(() => page.props.auth?.user?.profile_photo_url || null);

const primaryRole = computed(() => {
    if (isAdmin.value) return { label: 'Admin', color: 'bg-red-100 text-red-700 border-red-200' };
    if (isVendor.value) return { label: 'Vendor', color: 'bg-amber-100 text-amber-700 border-amber-200' };
    return { label: 'Customer', color: 'bg-cyan-100 text-cyan-700 border-cyan-200' };
});

const navItems = computed(() => {
    const items = [
        { label: 'Dashboard', icon: LayoutDashboard, route: 'dashboard', active: route().current('dashboard') },
        { label: 'Profile', icon: User, route: 'profile.show', active: route().current('profile.show') },
    ];

        if (isAdmin.value) {
        items.push(
            { label: 'Manage Users', icon: Users, route: 'dashboard', active: false, badge: 'Admin' },
            // ---> NEW: Admin Approval Route
            { label: 'Catalog Approvals', icon: Package, route: 'admin.catalog.approvals', active: route().current('admin.catalog.approvals'), badge: 'Admin' },
            { label: 'Analytics', icon: BarChart3, route: 'dashboard', active: false, badge: 'Admin' },
        );
    }

    if (isVendor.value) {
        items.push(
            { label: 'My Store', icon: Store, route: 'dashboard', active: false, badge: 'Vendor' },
            // ---> NEW: Seller Products Route
            { label: 'My Products', icon: Package, route: 'seller.products.index', active: route().current('seller.products.*'), badge: 'Vendor' },
            { label: 'Orders', icon: ShoppingBag, route: 'dashboard', active: false, badge: 'Vendor' },
        );
    }

    return items;
});

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div>
        <Head :title="title" />
        <Banner />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

        <div class="min-h-screen bg-gray-50 flex" style="font-family:'Inter',sans-serif;">

            <!-- ═══════════════════════════════════════ -->
            <!-- SIDEBAR (Desktop)                       -->
            <!-- ═══════════════════════════════════════ -->
            <aside class="hidden lg:flex lg:flex-col lg:w-64 bg-white border-r border-gray-200 fixed inset-y-0 left-0 z-30">
                <!-- Logo -->
                <div class="h-16 flex items-center px-6 border-b border-gray-100">
                    <Link href="/" class="flex items-center gap-2">
                        <ShoppingBag class="h-7 w-7 text-cyan-600" />
                        <span class="text-lg font-black tracking-tight">
                            <span class="text-cyan-600">Sari</span><span class="text-gray-900">Sari</span><span class="text-gray-300">.ph</span>
                        </span>
                    </Link>
                </div>

                <!-- User card -->
                <div class="px-4 py-4 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <img
                            v-if="$page.props.jetstream?.managesProfilePhotos && userPhoto"
                            :src="userPhoto" :alt="userName"
                            class="h-10 w-10 rounded-full object-cover ring-2 ring-gray-100"
                        />
                        <div v-else class="h-10 w-10 rounded-full bg-cyan-50 flex items-center justify-center ring-2 ring-gray-100">
                            <User class="h-5 w-5 text-cyan-600" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-900 truncate">{{ userName }}</p>
                            <p class="text-xs text-gray-400 truncate">{{ userEmail }}</p>
                        </div>
                    </div>
                    <!-- Role badge -->
                    <div class="mt-3 flex items-center gap-2">
                        <span :class="primaryRole.color" class="inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-0.5 rounded-full border">
                            <Shield class="h-3 w-3" />
                            {{ primaryRole.label }}
                        </span>
                        <span v-for="role in userRoles.filter(r => r !== primaryRole.label.toLowerCase())" :key="role"
                              class="text-xs text-gray-400 bg-gray-100 px-2 py-0.5 rounded-full capitalize">
                            {{ role }}
                        </span>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
                    <Link
                        v-for="item in navItems"
                        :key="item.label"
                        :href="route(item.route)"
                        :class="[
                            item.active
                                ? 'bg-cyan-50 text-cyan-700 border-cyan-200'
                                : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 border-transparent',
                            'group flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg border transition-all'
                        ]"
                    >
                        <component :is="item.icon" :class="[item.active ? 'text-cyan-600' : 'text-gray-400 group-hover:text-gray-600']" class="h-5 w-5 shrink-0 transition-colors" />
                        <span class="flex-1">{{ item.label }}</span>
                        <span v-if="item.badge" class="text-[10px] font-bold px-1.5 py-0.5 rounded bg-gray-100 text-gray-400 uppercase">
                            {{ item.badge }}
                        </span>
                    </Link>
                </nav>

                <!-- Bottom: Home + Logout -->
                <div class="px-3 py-4 border-t border-gray-100 space-y-1">
                    <Link href="/"
                          class="group flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-all">
                        <Home class="h-5 w-5 text-gray-400 group-hover:text-gray-600 transition-colors" />
                        Back to Store
                    </Link>
                    <button @click="logout"
                            class="w-full group flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-red-50 hover:text-red-600 rounded-lg transition-all">
                        <LogOut class="h-5 w-5 text-gray-400 group-hover:text-red-500 transition-colors" />
                        Sign Out
                    </button>
                </div>
            </aside>

            <!-- ═══════════════════════════════════════ -->
            <!-- MOBILE SIDEBAR OVERLAY                  -->
            <!-- ═══════════════════════════════════════ -->
            <Teleport to="body">
                <Transition name="fade">
                    <div v-if="sidebarOpen" class="fixed inset-0 bg-black/40 z-40 lg:hidden" @click="sidebarOpen = false"></div>
                </Transition>
                <Transition name="slide">
                    <aside v-if="sidebarOpen" class="fixed inset-y-0 left-0 w-72 bg-white z-50 lg:hidden shadow-2xl flex flex-col">
                        <!-- Close -->
                        <div class="h-16 flex items-center justify-between px-5 border-b border-gray-100">
                            <Link href="/" class="flex items-center gap-2">
                                <ShoppingBag class="h-6 w-6 text-cyan-600" />
                                <span class="text-lg font-black tracking-tight">
                                    <span class="text-cyan-600">Sari</span><span class="text-gray-900">Sari</span><span class="text-gray-300">.ph</span>
                                </span>
                            </Link>
                            <button @click="sidebarOpen = false" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-400">
                                <X class="h-5 w-5" />
                            </button>
                        </div>

                        <!-- User card mobile -->
                        <div class="px-4 py-4 border-b border-gray-100">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-cyan-50 flex items-center justify-center">
                                    <User class="h-5 w-5 text-cyan-600" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-gray-900 truncate">{{ userName }}</p>
                                    <span :class="primaryRole.color" class="inline-flex items-center gap-1 text-[10px] font-semibold px-2 py-0.5 rounded-full border mt-0.5">
                                        <Shield class="h-2.5 w-2.5" />
                                        {{ primaryRole.label }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile nav -->
                        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
                            <Link
                                v-for="item in navItems"
                                :key="item.label"
                                :href="route(item.route)"
                                @click="sidebarOpen = false"
                                :class="[
                                    item.active
                                        ? 'bg-cyan-50 text-cyan-700'
                                        : 'text-gray-600 hover:bg-gray-50',
                                    'flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg transition-all'
                                ]"
                            >
                                <component :is="item.icon" :class="item.active ? 'text-cyan-600' : 'text-gray-400'" class="h-5 w-5 shrink-0" />
                                {{ item.label }}
                            </Link>
                        </nav>

                        <div class="px-3 py-4 border-t border-gray-100 space-y-1">
                            <Link href="/" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg">
                                <Home class="h-5 w-5 text-gray-400" /> Back to Store
                            </Link>
                            <button @click="logout" class="w-full flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-red-50 hover:text-red-600 rounded-lg">
                                <LogOut class="h-5 w-5 text-gray-400" /> Sign Out
                            </button>
                        </div>
                    </aside>
                </Transition>
            </Teleport>

            <!-- ═══════════════════════════════════════ -->
            <!-- MAIN CONTENT AREA                       -->
            <!-- ═══════════════════════════════════════ -->
            <div class="flex-1 lg:ml-64 flex flex-col min-h-screen">
                <!-- Top bar -->
                <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-4 sm:px-6 sticky top-0 z-20">
                    <div class="flex items-center gap-3">
                        <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 text-gray-500">
                            <Menu class="h-5 w-5" />
                        </button>
                        <div v-if="$slots.header">
                            <slot name="header" />
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <!-- Notification placeholder -->
                        <button class="p-2 rounded-lg hover:bg-gray-100 text-gray-400 relative">
                            <Bell class="h-5 w-5" />
                            <span v-if="isAdmin" class="absolute top-1.5 right-1.5 h-2 w-2 bg-red-500 rounded-full"></span>
                        </button>

                        <!-- Admin indicator in topbar -->
                        <span v-if="isAdmin" class="hidden sm:inline-flex items-center gap-1 text-xs font-bold px-2.5 py-1 rounded-full bg-red-50 text-red-600 border border-red-200">
                            <Shield class="h-3.5 w-3.5" />
                            Admin Mode
                        </span>

                        <!-- User avatar dropdown (mobile-friendly) -->
                        <Link :href="route('profile.show')" class="flex items-center gap-2 p-1 rounded-lg hover:bg-gray-50">
                            <img
                                v-if="$page.props.jetstream?.managesProfilePhotos && userPhoto"
                                :src="userPhoto" :alt="userName"
                                class="h-8 w-8 rounded-full object-cover"
                            />
                            <div v-else class="h-8 w-8 rounded-full bg-cyan-50 flex items-center justify-center">
                                <User class="h-4 w-4 text-cyan-600" />
                            </div>
                        </Link>
                    </div>
                </header>

                <!-- Page content -->
                <main class="flex-1 p-4 sm:p-6 lg:p-8">
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>

<style scoped>
.fade-enter-active, .fade-leave-active { transition: opacity 0.2s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }
.slide-enter-active, .slide-leave-active { transition: transform 0.25s ease; }
.slide-enter-from, .slide-leave-to { transform: translateX(-100%); }
</style>
