<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/Components/ui/button';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';
import AppLayout from '@/Layouts/AppLayout.vue'; // We'll just reuse the main AppLayout for simplicity in this demo

defineProps({
  stats: Object,
  recentPOs: Array,
});

const getStatusColor = (status) => {
  const map = {
    'sent': 'bg-blue-100 text-blue-800',
    'acknowledged': 'bg-purple-100 text-purple-800',
    'approved': 'bg-green-100 text-green-800',
  };
  return map[status] || 'bg-gray-100 text-gray-800';
};
</script>

<template>
  <AppLayout title="Supplier Dashboard">
    <template #header>
      <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
          Supplier Portal
        </h2>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
        
        <!-- Stats Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <Card class="bg-gradient-to-br from-indigo-500 to-purple-600 border-0 shadow-lg text-white transform transition-transform hover:scale-105">
            <CardContent class="p-6">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-indigo-100 text-sm font-semibold uppercase tracking-wider">Pending Orders</p>
                  <p class="text-5xl font-black mt-2">{{ stats.pending }}</p>
                </div>
                <div class="p-4 bg-white/20 rounded-full backdrop-blur-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
              </div>
            </CardContent>
          </Card>

          <Card class="bg-gradient-to-br from-emerald-400 to-teal-500 border-0 shadow-lg text-white transform transition-transform hover:scale-105">
            <CardContent class="p-6">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-teal-100 text-sm font-semibold uppercase tracking-wider">Approved Orders</p>
                  <p class="text-5xl font-black mt-2">{{ stats.approved }}</p>
                </div>
                <div class="p-4 bg-white/20 rounded-full backdrop-blur-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                </div>
              </div>
            </CardContent>
          </Card>
        </div>

        <!-- Recent POs -->
        <Card class="shadow-xl rounded-2xl overflow-hidden border-0 bg-white/80 backdrop-blur-xl">
          <CardHeader class="border-b border-gray-100 bg-gray-50/50 flex flex-row justify-between items-center">
            <CardTitle class="text-lg font-bold text-gray-800">Recent Purchase Orders</CardTitle>
            <Link :href="route('supplier.purchase-orders.index')">
              <Button variant="outline" class="text-indigo-600 border-indigo-200 hover:bg-indigo-50">View All</Button>
            </Link>
          </CardHeader>
          <CardContent class="p-0">
            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                  <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase">PO Number</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase">Seller / Shop</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase">Total</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase">Status</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                  <tr v-if="recentPOs.length === 0">
                    <td colspan="4" class="px-6 py-12 text-center text-gray-400 italic">No purchase orders received yet.</td>
                  </tr>
                  <tr v-for="po in recentPOs" :key="po.id" class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 font-bold text-indigo-600">
                      <Link :href="route('supplier.purchase-orders.show', po.id)">{{ po.po_number }}</Link>
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ po.shop?.name }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900">₱{{ parseFloat(po.total_amount).toFixed(2) }}</td>
                    <td class="px-6 py-4">
                      <span class="px-3 py-1 text-xs font-bold rounded-full" :class="getStatusColor(po.status)">
                        {{ po.status.toUpperCase() }}
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </CardContent>
        </Card>

      </div>
    </div>
  </AppLayout>
</template>
