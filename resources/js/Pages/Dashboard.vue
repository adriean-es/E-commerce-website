<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import {
    LayoutDashboard,
    ShoppingBag,
    Package,
    Users,
    TrendingUp,
    DollarSign,
    Eye,
    ArrowUpRight,
    Shield,
    Star,
    Clock,
    AlertCircle,
} from '@lucide/vue';

const page = usePage();

const userRoles = computed(() => page.props.userRoles || []);
const isAdmin = computed(() => userRoles.value.includes('admin'));
const isVendor = computed(() => userRoles.value.includes('vendor'));
const userName = computed(() => page.props.auth?.user?.name || 'User');

// Mock stats for demonstration
const adminStats = [
    { label: 'Total Users', value: '2,847', change: '+12.5%', icon: Users, color: 'bg-blue-50 text-blue-600' },
    { label: 'Total Products', value: '15,234', change: '+8.3%', icon: Package, color: 'bg-purple-50 text-purple-600' },
    { label: 'Revenue', value: '₱1.2M', change: '+23.1%', icon: DollarSign, color: 'bg-green-50 text-green-600' },
    { label: 'Active Orders', value: '384', change: '+5.7%', icon: ShoppingBag, color: 'bg-amber-50 text-amber-600' },
];

const vendorStats = [
    { label: 'My Products', value: '48', change: '+3', icon: Package, color: 'bg-purple-50 text-purple-600' },
    { label: 'Total Sales', value: '₱128K', change: '+18.2%', icon: DollarSign, color: 'bg-green-50 text-green-600' },
    { label: 'Pending Orders', value: '12', change: '', icon: Clock, color: 'bg-amber-50 text-amber-600' },
    { label: 'Shop Rating', value: '4.8', change: '', icon: Star, color: 'bg-cyan-50 text-cyan-600' },
];

const customerStats = [
    { label: 'My Orders', value: '7', change: '', icon: ShoppingBag, color: 'bg-cyan-50 text-cyan-600' },
    { label: 'Wishlist Items', value: '23', change: '', icon: Star, color: 'bg-pink-50 text-pink-600' },
    { label: 'Total Spent', value: '₱4,250', change: '', icon: DollarSign, color: 'bg-green-50 text-green-600' },
    { label: 'Reviews Given', value: '5', change: '', icon: Eye, color: 'bg-purple-50 text-purple-600' },
];

const stats = computed(() => {
    if (isAdmin.value) return adminStats;
    if (isVendor.value) return vendorStats;
    return customerStats;
});

const recentActivity = [
    { title: 'New order placed', desc: 'Order #1234 — ₱2,450.00', time: '2 minutes ago', type: 'order' },
    { title: 'Product review received', desc: 'Wireless Earbuds — 5 stars', time: '15 minutes ago', type: 'review' },
    { title: 'Payment processed', desc: '₱1,200.00 deposited', time: '1 hour ago', type: 'payment' },
    { title: 'New user registered', desc: 'Juan dela Cruz joined', time: '3 hours ago', type: 'user' },
];
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="text-xl font-bold text-gray-900">Dashboard</h2>
        </template>

        <div class="max-w-7xl mx-auto space-y-6">

            <!-- Welcome banner -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 sm:p-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">
                            Welcome back, {{ userName.split(' ')[0] }}
                        </h1>
                        <p class="text-sm text-gray-500 mt-1">Here's what's happening with your account today.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span v-if="isAdmin" class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-full bg-red-50 text-red-600 border border-red-200">
                            <Shield class="h-3.5 w-3.5" />
                            Admin Access
                        </span>
                        <span v-else-if="isVendor" class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-full bg-amber-50 text-amber-600 border border-amber-200">
                            <Shield class="h-3.5 w-3.5" />
                            Vendor Account
                        </span>
                        <span v-else class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-full bg-cyan-50 text-cyan-600 border border-cyan-200">
                            <Shield class="h-3.5 w-3.5" />
                            Customer
                        </span>
                    </div>
                </div>
            </div>

            <!-- Stats grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div
                    v-for="stat in stats"
                    :key="stat.label"
                    class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md transition-shadow"
                >
                    <div class="flex items-center justify-between">
                        <div :class="stat.color" class="h-10 w-10 rounded-lg flex items-center justify-center">
                            <component :is="stat.icon" class="h-5 w-5" />
                        </div>
                        <span v-if="stat.change" class="text-xs font-semibold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">
                            {{ stat.change }}
                        </span>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 mt-3">{{ stat.value }}</p>
                    <p class="text-sm text-gray-500 mt-0.5">{{ stat.label }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent activity -->
                <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                        <h3 class="text-sm font-semibold text-gray-900">Recent Activity</h3>
                        <button class="text-xs text-cyan-600 font-medium hover:underline">View all</button>
                    </div>
                    <div class="divide-y divide-gray-100">
                        <div v-for="(activity, i) in recentActivity" :key="i" class="px-6 py-4 flex items-center gap-4 hover:bg-gray-50 transition-colors">
                            <div :class="{
                                'bg-cyan-50 text-cyan-600': activity.type === 'order',
                                'bg-amber-50 text-amber-600': activity.type === 'review',
                                'bg-green-50 text-green-600': activity.type === 'payment',
                                'bg-blue-50 text-blue-600': activity.type === 'user',
                            }" class="h-9 w-9 rounded-lg flex items-center justify-center shrink-0">
                                <ShoppingBag v-if="activity.type === 'order'" class="h-4 w-4" />
                                <Star v-else-if="activity.type === 'review'" class="h-4 w-4" />
                                <DollarSign v-else-if="activity.type === 'payment'" class="h-4 w-4" />
                                <Users v-else class="h-4 w-4" />
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900">{{ activity.title }}</p>
                                <p class="text-xs text-gray-400 mt-0.5">{{ activity.desc }}</p>
                            </div>
                            <span class="text-xs text-gray-400 whitespace-nowrap">{{ activity.time }}</span>
                        </div>
                    </div>
                </div>

                <!-- Quick actions -->
                <div class="bg-white rounded-xl border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-900">Quick Actions</h3>
                    </div>
                    <div class="p-4 space-y-2">
                        <Link :href="route('profile.show')" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors group">
                            <div class="h-8 w-8 bg-cyan-50 rounded-lg flex items-center justify-center">
                                <Users class="h-4 w-4 text-cyan-600" />
                            </div>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Edit Profile</span>
                            <ArrowUpRight class="h-4 w-4 text-gray-300 ml-auto group-hover:text-cyan-600 transition-colors" />
                        </Link>
                        <Link href="/" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors group">
                            <div class="h-8 w-8 bg-green-50 rounded-lg flex items-center justify-center">
                                <ShoppingBag class="h-4 w-4 text-green-600" />
                            </div>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Browse Products</span>
                            <ArrowUpRight class="h-4 w-4 text-gray-300 ml-auto group-hover:text-cyan-600 transition-colors" />
                        </Link>

                        <template v-if="isAdmin">
                            <div class="border-t border-gray-100 pt-2 mt-2">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider px-4 mb-2">Admin</p>
                            </div>
                            <button class="w-full flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-red-50 transition-colors group">
                                <div class="h-8 w-8 bg-red-50 rounded-lg flex items-center justify-center">
                                    <Shield class="h-4 w-4 text-red-600" />
                                </div>
                                <span class="text-sm font-medium text-gray-700 group-hover:text-red-700">Admin Panel</span>
                                <ArrowUpRight class="h-4 w-4 text-gray-300 ml-auto group-hover:text-red-600 transition-colors" />
                            </button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>