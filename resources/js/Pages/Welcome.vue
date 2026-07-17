<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import {
    Search, ShoppingCart, Heart, User, ChevronRight,
    Truck, ShieldCheck, CreditCard, BadgeCheck,
    Star, Store, ArrowRight, Menu, X, Check,
    Shirt, Laptop, Home, Leaf, Dumbbell, ShoppingBag,
    Plus, Minus, Trash2
} from '@lucide/vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

// ── State ──────────────────────────────────────────────
const mobileMenuOpen   = ref(false);
const activeCategory   = ref('All');
const searchQuery      = ref('');
const visibleCount     = ref(8);
const wishlist         = ref(new Set());
const cartItems        = ref([]);
const cartOpen         = ref(false);
const cartNotification = ref(null); // { name, qty } for toast-like pop-up

const categories = [
    { name: 'All',            icon: null         },
    { name: 'Fashion',        icon: Shirt        },
    { name: 'Electronics',    icon: Laptop       },
    { name: 'Home & Living',  icon: Home         },
    { name: 'Health & Beauty',icon: Leaf         },
    { name: 'Sports',         icon: Dumbbell     },
    { name: 'Grocery',        icon: ShoppingBag  },
];

const allProducts = [
    { id: 1, name: "Linen Tote Bag",          seller: "Thread & Co.",  price: 450,  originalPrice: 699,   rating: 4.9, sold: "3.1k",  badge: "Best Seller", category: "Fashion",         image: "https://images.unsplash.com/photo-1591561954557-26941169b49e?w=600&auto=format&fit=crop&q=80" },
    { id: 2, name: "Sony WH-1000XM5",         seller: "TechNest PH",   price: 8200, originalPrice: 11000, rating: 4.7, sold: "1.2k",  badge: "Sale",        category: "Electronics",     image: "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=600&auto=format&fit=crop&q=80" },
    { id: 3, name: "Rattan Accent Chair",      seller: "Casa Verde",    price: 5500, originalPrice: 7200,  rating: 4.8, sold: "892",   badge: "New",         category: "Home & Living",   image: "https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?w=600&auto=format&fit=crop&q=80" },
    { id: 4, name: "Keychron K2 Keyboard",    seller: "TechNest PH",   price: 3800, originalPrice: null,  rating: 5.0, sold: "2.4k",  badge: "Top Rated",   category: "Electronics",     image: "https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=600&auto=format&fit=crop&q=80" },
    { id: 5, name: "Matcha Gift Set",          seller: "Harvest Roots", price: 380,  originalPrice: 520,   rating: 4.6, sold: "5.7k",  badge: "Sale",        category: "Grocery",         image: "https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=600&auto=format&fit=crop&q=80" },
    { id: 6, name: "Premium Yoga Mat",         seller: "ActiveLife PH", price: 950,  originalPrice: 1300,  rating: 4.9, sold: "1.8k",  badge: "Best Seller", category: "Sports",          image: "https://images.unsplash.com/photo-1601925228842-a52a7c27d33f?w=600&auto=format&fit=crop&q=80" },
    { id: 7, name: "Glow Skincare Kit",        seller: "SkinLab PH",   price: 1200, originalPrice: 1800,  rating: 4.8, sold: "4.2k",  badge: "Hot",         category: "Health & Beauty", image: "https://images.unsplash.com/photo-1556228578-0d85b1a4d571?w=600&auto=format&fit=crop&q=80" },
    { id: 8, name: "Crossbody Leather Bag",   seller: "Thread & Co.",  price: 680,  originalPrice: null,  rating: 4.7, sold: "990",   badge: "New",         category: "Fashion",         image: "https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=600&auto=format&fit=crop&q=80" },
    { id: 9, name: "Bamboo Desk Organiser",   seller: "Casa Verde",    price: 620,  originalPrice: 850,   rating: 4.5, sold: "1.3k",  badge: "Sale",        category: "Home & Living",   image: "https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?w=600&auto=format&fit=crop&q=80" },
    { id:10, name: "Wireless Earbuds Pro",     seller: "TechNest PH",   price: 2200, originalPrice: 2999,  rating: 4.6, sold: "3.9k",  badge: "Sale",        category: "Electronics",     image: "https://images.unsplash.com/photo-1590658268037-6bf12165a8df?w=600&auto=format&fit=crop&q=80" },
    { id:11, name: "Resistance Band Set",      seller: "ActiveLife PH", price: 480,  originalPrice: 650,   rating: 4.7, sold: "2.1k",  badge: "Best Seller", category: "Sports",          image: "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=600&auto=format&fit=crop&q=80" },
    { id:12, name: "Vitamin C Serum",          seller: "SkinLab PH",   price: 750,  originalPrice: null,  rating: 4.9, sold: "6.2k",  badge: "Top Rated",   category: "Health & Beauty", image: "https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=600&auto=format&fit=crop&q=80" },
];

// ── Computed ────────────────────────────────────────────
const filteredProducts = computed(() => {
    let list = allProducts;
    if (activeCategory.value !== 'All') {
        list = list.filter(p => p.category === activeCategory.value);
    }
    if (searchQuery.value.trim()) {
        const q = searchQuery.value.toLowerCase();
        list = list.filter(p =>
            p.name.toLowerCase().includes(q) ||
            p.seller.toLowerCase().includes(q) ||
            p.category.toLowerCase().includes(q)
        );
    }
    return list;
});

const visibleProducts = computed(() => filteredProducts.value.slice(0, visibleCount.value));
const hasMore         = computed(() => visibleCount.value < filteredProducts.value.length);

const cartCount = computed(() => cartItems.value.reduce((sum, i) => sum + i.qty, 0));
const cartTotal = computed(() => cartItems.value.reduce((sum, i) => sum + i.price * i.qty, 0));

// ── Actions ─────────────────────────────────────────────
const setCategory = (name) => {
    activeCategory.value = name;
    visibleCount.value = 8;
};

const loadMore = () => { visibleCount.value += 4; };

const toggleWishlist = (id) => {
    const w = new Set(wishlist.value);
    w.has(id) ? w.delete(id) : w.add(id);
    wishlist.value = w;
};

const addToCart = (product) => {
    const existing = cartItems.value.find(i => i.id === product.id);
    if (existing) {
        existing.qty++;
    } else {
        cartItems.value.push({ ...product, qty: 1 });
    }
    // Show notification
    cartNotification.value = product.name;
    setTimeout(() => { cartNotification.value = null; }, 2500);
};

const removeFromCart = (id) => {
    cartItems.value = cartItems.value.filter(i => i.id !== id);
};

const updateQty = (id, delta) => {
    const item = cartItems.value.find(i => i.id === id);
    if (!item) return;
    item.qty += delta;
    if (item.qty <= 0) removeFromCart(id);
};

// ── Helpers ─────────────────────────────────────────────
const fmt = (n) => `₱${n.toLocaleString()}`;

const badgeVariant = (badge) => ({
    'Best Seller': 'bg-amber-50 text-amber-700 border border-amber-200',
    'Sale':        'bg-red-50 text-red-700 border border-red-200',
    'New':         'bg-cyan-50 text-cyan-700 border border-cyan-200',
    'Top Rated':   'bg-violet-50 text-violet-700 border border-violet-200',
    'Hot':         'bg-orange-50 text-orange-700 border border-orange-200',
}[badge] || 'bg-gray-100 text-gray-600');

const vendors = [
    { name: "Thread & Co.",  category: "Fashion & Apparel",    products: 234, rating: 4.9, image: "https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=600&auto=format&fit=crop&q=80" },
    { name: "TechNest PH",   category: "Gadgets & Electronics", products: 189, rating: 4.8, image: "https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=600&auto=format&fit=crop&q=80" },
    { name: "Casa Verde",    category: "Home & Interior",       products: 312, rating: 4.9, image: "https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=600&auto=format&fit=crop&q=80" },
];

const trustFeatures = [
    { icon: Truck,       title: 'Next-Day Delivery',  desc: 'Metro Manila in 24 hours' },
    { icon: ShieldCheck, title: 'Buyer Protection',   desc: 'Full refund if not received' },
    { icon: CreditCard,  title: 'Secure Checkout',    desc: 'GCash, Maya, all major cards' },
    { icon: BadgeCheck,  title: 'Verified Sellers',   desc: 'Every store manually reviewed' },
];
</script>

<template>
    <Head title="SariSari.ph — Shop Everything Filipino" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <div class="min-h-screen bg-white text-gray-900" style="font-family:'Inter',sans-serif;">

        <!-- ── CART PANEL ─────────────────────────────────── -->
        <!-- Overlay -->
        <div v-if="cartOpen" @click="cartOpen = false"
             class="fixed inset-0 bg-black/40 z-40 transition-opacity" />

        <!-- Slide-in panel -->
        <aside :class="cartOpen ? 'translate-x-0' : 'translate-x-full'"
               class="fixed right-0 top-0 h-full w-full max-w-sm bg-white z-50 shadow-2xl flex flex-col transition-transform duration-300">
            <!-- Header -->
            <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                <h2 class="font-bold text-gray-900 text-base flex items-center gap-2">
                    <ShoppingCart class="h-5 w-5" /> Your Cart
                    <span class="ml-1 text-xs bg-cyan-600 text-white rounded-full px-2 py-0.5">{{ cartCount }}</span>
                </h2>
                <button @click="cartOpen = false" class="text-gray-400 hover:text-gray-700">
                    <X class="h-5 w-5" />
                </button>
            </div>

            <!-- Items -->
            <div class="flex-1 overflow-y-auto px-5 py-4 space-y-4">
                <p v-if="cartItems.length === 0" class="text-sm text-gray-400 text-center py-16">
                    Your cart is empty.<br/>Start adding products!
                </p>
                <div v-for="item in cartItems" :key="item.id"
                     class="flex items-center gap-3 border border-gray-100 rounded-xl p-3">
                    <img :src="item.image" class="w-16 h-16 object-cover rounded-lg" />
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-800 truncate">{{ item.name }}</p>
                        <p class="text-xs text-gray-400">{{ item.seller }}</p>
                        <p class="text-sm font-bold text-cyan-600 mt-1">{{ fmt(item.price) }}</p>
                    </div>
                    <div class="flex flex-col items-end gap-2">
                        <button @click="removeFromCart(item.id)" class="text-gray-300 hover:text-red-500 transition-colors">
                            <Trash2 class="h-4 w-4" />
                        </button>
                        <div class="flex items-center gap-1.5">
                            <button @click="updateQty(item.id, -1)"
                                    class="w-6 h-6 rounded border border-gray-200 flex items-center justify-center hover:bg-gray-100">
                                <Minus class="h-3 w-3" />
                            </button>
                            <span class="text-sm font-medium w-4 text-center">{{ item.qty }}</span>
                            <button @click="updateQty(item.id, +1)"
                                    class="w-6 h-6 rounded border border-gray-200 flex items-center justify-center hover:bg-gray-100">
                                <Plus class="h-3 w-3" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div v-if="cartItems.length > 0" class="border-t border-gray-100 px-5 py-4">
                <div class="flex justify-between mb-4">
                    <span class="text-sm text-gray-500">Subtotal</span>
                    <span class="font-bold text-gray-900">{{ fmt(cartTotal) }}</span>
                </div>
                <button class="w-full bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-3 rounded-xl transition-colors">
                    Proceed to Checkout
                </button>
            </div>
        </aside>

        <!-- ── CART NOTIFICATION ───────────────────────────── -->
        <Transition enter-from-class="translate-y-4 opacity-0" enter-active-class="transition duration-300"
                    leave-to-class="translate-y-4 opacity-0" leave-active-class="transition duration-200">
            <div v-if="cartNotification"
                 class="fixed bottom-6 right-6 z-50 bg-gray-900 text-white text-sm px-4 py-3 rounded-xl shadow-xl flex items-center gap-3 max-w-xs">
                <span class="w-6 h-6 bg-cyan-500 rounded-full flex items-center justify-center shrink-0">
                    <Check class="h-3.5 w-3.5" />
                </span>
                <span><strong class="font-semibold">Added to cart!</strong><br class="sm:hidden"/>
                    <span class="text-gray-400 text-xs block truncate">{{ cartNotification }}</span>
                </span>
            </div>
        </Transition>

        <!-- ── HEADER / NAV ────────────────────────────────── -->
        <header class="sticky top-0 z-30">
            <div class="bg-gray-900 text-white text-xs text-center py-2 px-4 tracking-wide">
                Free shipping on orders ₱999 and above &nbsp;·&nbsp; Code:
                <span class="font-bold text-cyan-400">FREESHIP</span>
            </div>
            <nav class="bg-white border-b border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16 gap-4">

                        <!-- Logo -->
                        <span class="text-xl font-black tracking-tight shrink-0">
                            <span class="text-cyan-600">Sari</span><span class="text-gray-900">Sari</span><span class="text-gray-300 font-medium">.ph</span>
                        </span>

                        <!-- Search -->
                        <div class="hidden md:flex flex-1 max-w-lg">
                            <div class="relative w-full">
                                <Search class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" />
                                <input
                                    v-model="searchQuery"
                                    type="text"
                                    placeholder="Search products, stores, brands..."
                                    class="w-full h-10 bg-gray-50 border border-gray-200 rounded-lg pl-10 pr-4 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all"
                                />
                                <button v-if="searchQuery" @click="searchQuery = ''"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-700">
                                    <X class="h-4 w-4" />
                                </button>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="hidden md:flex items-center gap-4">
                            <button class="relative text-gray-500 hover:text-red-500 transition-colors"
                                    title="Wishlist">
                                <Heart class="h-5 w-5" :class="wishlist.size > 0 ? 'fill-red-500 text-red-500' : ''" />
                                <span v-if="wishlist.size > 0"
                                      class="absolute -top-1.5 -right-1.5 bg-red-500 text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">
                                    {{ wishlist.size }}
                                </span>
                            </button>

                            <button @click="cartOpen = true"
                                    class="relative text-gray-500 hover:text-cyan-600 transition-colors"
                                    title="Cart">
                                <ShoppingCart class="h-5 w-5" />
                                <span v-if="cartCount > 0"
                                      class="absolute -top-1.5 -right-1.5 bg-cyan-600 text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">
                                    {{ cartCount }}
                                </span>
                            </button>

                            <div v-if="canLogin" class="flex items-center gap-3 pl-4 border-l border-gray-200">
                                <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                                      class="flex items-center gap-1.5 text-sm font-medium text-gray-700 hover:text-cyan-600 transition-colors">
                                    <User class="h-4 w-4" /> My Account
                                </Link>
                                <template v-else>
                                    <Link :href="route('login')"
                                          class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">
                                        Log in
                                    </Link>
                                    <Link v-if="canRegister" :href="route('register')"
                                          class="text-sm font-semibold bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded-lg transition-colors">
                                        Sign up
                                    </Link>
                                </template>
                            </div>
                        </div>

                        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-500">
                            <component :is="mobileMenuOpen ? X : Menu" class="h-6 w-6" />
                        </button>
                    </div>
                </div>

                <!-- Category strip -->
                <div class="border-t border-gray-100 overflow-x-auto">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-1">
                        <button
                            v-for="cat in categories"
                            :key="cat.name"
                            @click="setCategory(cat.name)"
                            :class="activeCategory === cat.name
                                ? 'text-cyan-600 border-b-2 border-cyan-600 font-semibold'
                                : 'text-gray-500 hover:text-gray-900 border-b-2 border-transparent'"
                            class="flex items-center gap-1.5 text-sm whitespace-nowrap px-3 py-3 transition-colors"
                        >
                            <component :is="cat.icon" v-if="cat.icon" class="h-3.5 w-3.5" />
                            {{ cat.name }}
                        </button>
                    </div>
                </div>
            </nav>
        </header>

        <!-- ── HERO ────────────────────────────────────────── -->
        <section class="bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-5 gap-8 items-center min-h-[500px] py-12 lg:py-0">
                    <div class="lg:col-span-2 py-8 lg:py-16">
                        <div class="inline-flex items-center gap-2 bg-cyan-50 text-cyan-700 text-xs font-semibold px-3 py-1.5 rounded-full mb-6 border border-cyan-100">
                            <span class="w-1.5 h-1.5 bg-cyan-500 rounded-full animate-pulse"></span>
                            50,000+ local sellers now live
                        </div>
                        <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 leading-[1.15] tracking-tight mb-5">
                            Shop Local.<br />
                            <span class="text-cyan-600">Ship Anywhere.</span>
                        </h1>
                        <p class="text-base text-gray-500 leading-relaxed mb-8 max-w-sm">
                            Discover unique products from independent Filipino sellers — handcrafted goods to the latest tech.
                        </p>
                        <div class="flex items-center gap-3 flex-wrap">
                            <button
                                @click="document.getElementById('products-section').scrollIntoView({ behavior: 'smooth' })"
                                class="inline-flex items-center gap-2 bg-cyan-600 hover:bg-cyan-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors shadow-sm">
                                Shop Now <ArrowRight class="h-4 w-4" />
                            </button>
                            <button class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gray-700 font-semibold px-6 py-3 rounded-lg border border-gray-200 transition-colors">
                                <Store class="h-4 w-4" /> Sell with Us
                            </button>
                        </div>
                        <div class="flex items-center gap-6 mt-10 pt-8 border-t border-gray-100">
                            <div><p class="text-2xl font-black text-gray-900">50K+</p><p class="text-xs text-gray-400 mt-0.5">Sellers</p></div>
                            <div class="w-px h-8 bg-gray-200"></div>
                            <div><p class="text-2xl font-black text-gray-900">2M+</p><p class="text-xs text-gray-400 mt-0.5">Customers</p></div>
                            <div class="w-px h-8 bg-gray-200"></div>
                            <div><p class="text-2xl font-black text-gray-900">4.9</p><p class="text-xs text-gray-400 mt-0.5">App Rating</p></div>
                        </div>
                    </div>
                    <div class="hidden lg:grid lg:col-span-3 grid-cols-3 gap-3 py-8">
                        <div class="col-span-2">
                            <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?w=700&auto=format&fit=crop&q=80"
                                 class="w-full object-cover rounded-2xl" style="height:440px;" />
                        </div>
                        <div class="flex flex-col gap-3">
                            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&auto=format&fit=crop&q=80"
                                 class="w-full object-cover rounded-2xl flex-1" style="height:212px;" />
                            <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=400&auto=format&fit=crop&q=80"
                                 class="w-full object-cover rounded-2xl flex-1" style="height:212px;" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── PROMO BANNER ───────────────────────────────── -->
        <section class="bg-gray-950 py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="text-center md:text-left">
                        <p class="text-cyan-400 text-xs font-semibold uppercase tracking-widest mb-1">Flash Sale · Ends Soon</p>
                        <h2 class="text-3xl font-black text-white tracking-tight">Up to 70% Off</h2>
                        <p class="text-gray-400 text-sm mt-1">Selected items only. While supplies last.</p>
                    </div>
                    <div class="flex gap-3">
                        <div v-for="[n, label] in [['12','hrs'],['45','min'],['30','sec']]" :key="label"
                             class="bg-gray-800 rounded-xl px-5 py-3 text-center min-w-[58px]">
                            <p class="text-2xl font-black text-white tabular-nums">{{ n }}</p>
                            <p class="text-gray-500 text-xs mt-0.5">{{ label }}</p>
                        </div>
                    </div>
                    <button class="inline-flex items-center gap-2 bg-cyan-500 hover:bg-cyan-400 text-gray-950 font-bold px-6 py-3 rounded-lg transition-colors whitespace-nowrap">
                        View All Deals <ChevronRight class="h-4 w-4" />
                    </button>
                </div>
            </div>
        </section>

        <!-- ── PRODUCTS ───────────────────────────────────── -->
        <section id="products-section" class="bg-gray-50 py-14">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header row -->
                <div class="flex items-end justify-between mb-8 gap-4">
                    <div>
                        <p class="text-xs font-semibold text-cyan-600 uppercase tracking-wider mb-1">Curated For You</p>
                        <h2 class="text-2xl font-bold text-gray-900 tracking-tight">
                            {{ activeCategory === 'All' ? 'All Products' : activeCategory }}
                            <span class="text-sm font-normal text-gray-400 ml-2">
                                ({{ filteredProducts.length }} {{ filteredProducts.length === 1 ? 'item' : 'items' }})
                            </span>
                        </h2>
                    </div>

                    <!-- Mobile search -->
                    <div class="flex md:hidden flex-1 max-w-xs">
                        <div class="relative w-full">
                            <Search class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" />
                            <input v-model="searchQuery" type="text" placeholder="Search..."
                                   class="w-full h-9 bg-white border border-gray-200 rounded-lg pl-9 pr-3 text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500" />
                        </div>
                    </div>

                    <select class="hidden sm:block text-sm border border-gray-200 rounded-lg px-3 py-1.5 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                        <option>Popular</option>
                        <option>Newest First</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                    </select>
                </div>

                <!-- Active search chip -->
                <div v-if="searchQuery" class="flex items-center gap-2 mb-5">
                    <span class="text-sm text-gray-500">Showing results for:</span>
                    <span class="inline-flex items-center gap-1.5 bg-cyan-50 border border-cyan-200 text-cyan-700 text-xs font-semibold px-3 py-1 rounded-full">
                        "{{ searchQuery }}"
                        <button @click="searchQuery = ''"><X class="h-3 w-3" /></button>
                    </span>
                </div>

                <!-- Empty state -->
                <div v-if="filteredProducts.length === 0" class="text-center py-24">
                    <Search class="h-10 w-10 text-gray-300 mx-auto mb-3" />
                    <p class="font-semibold text-gray-700">No products found</p>
                    <p class="text-sm text-gray-400 mt-1">Try a different keyword or category</p>
                    <button @click="searchQuery = ''; activeCategory = 'All'"
                            class="mt-4 text-sm text-cyan-600 font-semibold hover:underline">
                        Clear filters
                    </button>
                </div>

                <!-- Grid -->
                <div v-else class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    <div v-for="product in visibleProducts" :key="product.id"
                         class="bg-white rounded-xl border border-gray-200 overflow-hidden group cursor-pointer hover:shadow-md hover:border-gray-300 transition-all duration-200 flex flex-col">

                        <!-- Image -->
                        <div class="relative h-52 bg-gray-100 overflow-hidden">
                            <img :src="product.image" :alt="product.name"
                                 class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-500" />
                            <span :class="badgeVariant(product.badge)"
                                  class="absolute top-2.5 left-2.5 text-[11px] font-semibold px-2 py-0.5 rounded-md">
                                {{ product.badge }}
                            </span>
                            <!-- Wishlist toggle -->
                            <button
                                @click.stop="toggleWishlist(product.id)"
                                class="absolute top-2.5 right-2.5 w-7 h-7 bg-white rounded-full shadow-sm flex items-center justify-center transition-all hover:scale-110"
                                :class="wishlist.has(product.id) ? 'text-red-500' : 'text-gray-400 opacity-0 group-hover:opacity-100'"
                            >
                                <Heart class="h-3.5 w-3.5" :class="wishlist.has(product.id) ? 'fill-red-500' : ''" />
                            </button>
                        </div>

                        <!-- Info -->
                        <div class="p-3.5 flex flex-col flex-grow">
                            <p class="text-[11px] text-gray-400 mb-1">{{ product.seller }}</p>
                            <h3 class="text-sm font-semibold text-gray-800 leading-snug mb-3 line-clamp-2">{{ product.name }}</h3>
                            <div class="mt-auto space-y-2">
                                <div class="flex items-baseline gap-1.5">
                                    <span class="text-base font-bold text-gray-900">{{ fmt(product.price) }}</span>
                                    <span v-if="product.originalPrice" class="text-xs text-gray-400 line-through">{{ fmt(product.originalPrice) }}</span>
                                </div>
                                <div class="flex items-center justify-between text-[11px] text-gray-400">
                                    <div class="flex items-center gap-1">
                                        <Star class="h-3 w-3 fill-amber-400 text-amber-400" />
                                        <span class="font-medium text-gray-600">{{ product.rating }}</span>
                                    </div>
                                    <span>{{ product.sold }} sold</span>
                                </div>
                            </div>
                        </div>

                        <!-- Add to Cart -->
                        <div class="px-3.5 pb-3.5">
                            <button
                                @click="addToCart(product)"
                                class="w-full text-sm font-medium py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-cyan-600 hover:text-white hover:border-cyan-600 transition-all duration-150 flex items-center justify-center gap-2">
                                <ShoppingCart class="h-3.5 w-3.5" /> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Load More -->
                <div v-if="hasMore" class="text-center mt-10">
                    <button @click="loadMore"
                            class="inline-flex items-center gap-2 text-sm font-semibold text-gray-700 hover:text-cyan-600 border border-gray-200 hover:border-cyan-300 bg-white px-6 py-2.5 rounded-lg transition-all">
                        Load more products <ChevronRight class="h-4 w-4" />
                    </button>
                </div>
                <p v-else-if="filteredProducts.length > 0" class="text-center text-xs text-gray-400 mt-8">
                    You've seen all {{ filteredProducts.length }} products.
                </p>
            </div>
        </section>

        <!-- ── VENDORS ─────────────────────────────────────── -->
        <section class="bg-white py-14">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <p class="text-xs font-semibold text-cyan-600 uppercase tracking-wider mb-1">Top Performers</p>
                        <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Featured Stores</h2>
                    </div>
                    <button class="hidden sm:inline-flex items-center gap-1 text-sm text-cyan-600 font-semibold hover:underline">
                        See All <ChevronRight class="h-4 w-4" />
                    </button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div v-for="vendor in vendors" :key="vendor.name"
                         class="group border border-gray-200 rounded-xl overflow-hidden hover:shadow-md hover:border-gray-300 transition-all cursor-pointer">
                        <div class="h-40 overflow-hidden bg-gray-100">
                            <img :src="vendor.image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                        </div>
                        <div class="p-4">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="font-semibold text-gray-900 text-sm">{{ vendor.name }}</h3>
                                    <p class="text-xs text-gray-400 mt-0.5">{{ vendor.category }}</p>
                                </div>
                                <div class="flex items-center gap-1">
                                    <Star class="h-3 w-3 fill-amber-400 text-amber-400" />
                                    <span class="text-xs font-semibold text-gray-700">{{ vendor.rating }}</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <span class="text-xs text-gray-400">{{ vendor.products }} products</span>
                                <button class="text-xs font-semibold text-cyan-600 hover:text-cyan-700 flex items-center gap-1">
                                    Visit Store <ChevronRight class="h-3 w-3" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── TRUST STRIP ────────────────────────────────── -->
        <section class="bg-gray-50 border-t border-b border-gray-200 py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div v-for="f in trustFeatures" :key="f.title" class="flex items-start gap-4">
                        <div class="shrink-0 w-10 h-10 bg-cyan-50 rounded-lg flex items-center justify-center text-cyan-600 border border-cyan-100">
                            <component :is="f.icon" class="h-5 w-5" />
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">{{ f.title }}</p>
                            <p class="text-xs text-gray-400 mt-0.5 leading-relaxed">{{ f.desc }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── FOOTER ─────────────────────────────────────── -->
        <footer class="bg-gray-950 text-gray-500 pt-14 pb-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-5 gap-10 mb-12">
                    <div class="col-span-2">
                        <span class="text-lg font-black">
                            <span class="text-cyan-400">Sari</span><span class="text-white">Sari</span><span class="text-gray-600">.ph</span>
                        </span>
                        <p class="text-sm mt-3 leading-relaxed max-w-xs">
                            The largest multi-vendor marketplace for Filipino products.
                        </p>
                    </div>
                    <div>
                        <p class="text-white text-sm font-semibold mb-4">Shop</p>
                        <ul class="space-y-2.5 text-sm">
                            <li><a href="#" class="hover:text-white transition-colors">All Products</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">New Arrivals</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Best Sellers</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">On Sale</a></li>
                        </ul>
                    </div>
                    <div>
                        <p class="text-white text-sm font-semibold mb-4">Sell</p>
                        <ul class="space-y-2.5 text-sm">
                            <li><a href="#" class="hover:text-white transition-colors">Start Selling</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Seller Dashboard</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Seller Guide</a></li>
                        </ul>
                    </div>
                    <div>
                        <p class="text-white text-sm font-semibold mb-4">Support</p>
                        <ul class="space-y-2.5 text-sm">
                            <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Shipping Policy</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-800 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-gray-600">
                    <span>&copy; 2026 SariSari.ph. All rights reserved.</span>
                    <span>Made in the Philippines · Built with Laravel & Vue</span>
                </div>
            </div>
        </footer>
    </div>
</template>
