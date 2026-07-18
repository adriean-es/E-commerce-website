<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';

const props = defineProps({
  inventory: Object,
});

const getTypeColor = (type) => {
  const map = {
    'PURCHASE_RECEIPT': 'bg-green-100 text-green-800',
    'SALE_DEDUCTION': 'bg-red-100 text-red-800',
    'SALE_RETURN': 'bg-blue-100 text-blue-800',
    'ADJUSTMENT_INCREASE': 'bg-emerald-100 text-emerald-800',
    'ADJUSTMENT_DECREASE': 'bg-orange-100 text-orange-800',
    'OPENING_STOCK': 'bg-purple-100 text-purple-800',
  };
  return map[type] || 'bg-gray-100 text-gray-800';
};
</script>

<template>
  <AppLayout :title="`Transaction Log — ${inventory.product_variant?.product?.name}`">
    <template #header>
      <div class="flex items-center gap-4">
        <Link :href="route('seller.inventory.index')" class="text-gray-400 hover:text-indigo-600 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </Link>
        <div>
          <h2 class="font-bold text-2xl text-gray-800 leading-tight">Transaction Ledger</h2>
          <p class="text-sm text-gray-500">{{ inventory.product_variant?.product?.name }} — SKU: {{ inventory.product_variant?.sku }}</p>
        </div>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <Card class="bg-white border border-gray-200/60 shadow-sm">
            <CardContent class="p-6 text-center">
              <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">On Hand</p>
              <p class="text-4xl font-black mt-1 text-gray-900">{{ inventory.quantity_on_hand }}</p>
            </CardContent>
          </Card>
          <Card class="bg-white border border-gray-200/60 shadow-sm">
            <CardContent class="p-6 text-center">
              <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Reserved</p>
              <p class="text-4xl font-black mt-1 text-gray-900">{{ inventory.quantity_reserved }}</p>
            </CardContent>
          </Card>
          <Card class="bg-white border border-gray-200/60 shadow-sm relative overflow-hidden">
            <div class="absolute bottom-0 left-0 w-full h-1 bg-cyan-600"></div>
            <CardContent class="p-6 text-center">
              <p class="text-cyan-700 text-xs font-bold uppercase tracking-wider">Available</p>
              <p class="text-4xl font-black mt-1 text-cyan-600">{{ inventory.quantity_available }}</p>
            </CardContent>
          </Card>
        </div>

        <!-- Transaction History Table -->
        <Card class="shadow-sm border border-gray-200/60 bg-white">
          <CardHeader class="border-b border-gray-100 bg-gray-50/50">
            <CardTitle class="text-lg text-gray-800">Full Transaction History (Immutable Ledger)</CardTitle>
          </CardHeader>
          <CardContent class="p-0">
            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Change</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Before</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">After</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Performed By</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Notes</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                  <tr v-if="!inventory.transactions || inventory.transactions.length === 0">
                    <td colspan="7" class="px-6 py-12 text-center text-gray-400 italic">No transactions recorded yet.</td>
                  </tr>
                  <tr v-for="tx in inventory.transactions" :key="tx.id" class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ new Date(tx.created_at).toLocaleString() }}</td>
                    <td class="px-6 py-4">
                      <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full border" :class="getTypeColor(tx.transaction_type)">
                        {{ tx.transaction_type }}
                      </span>
                    </td>
                    <td class="px-6 py-4 text-center font-bold" :class="tx.quantity_change > 0 ? 'text-green-600' : 'text-red-600'">
                      {{ tx.quantity_change > 0 ? '+' : '' }}{{ tx.quantity_change }}
                    </td>
                    <td class="px-6 py-4 text-center text-gray-500">{{ tx.quantity_before }}</td>
                    <td class="px-6 py-4 text-center font-bold text-gray-900">{{ tx.quantity_after }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ tx.performer?.name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">{{ tx.notes || '—' }}</td>
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
