<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Button } from '@/Components/ui/button';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';

defineProps({
  purchaseOrders: Array
});

const getStatusColor = (status) => {
  const map = {
    'draft': 'bg-gray-100 text-gray-800 border-gray-200',
    'sent': 'bg-blue-50 text-blue-700 border-blue-200',
    'acknowledged': 'bg-purple-50 text-purple-700 border-purple-200',
    'approved': 'bg-green-50 text-green-700 border-green-200',
    'partially_received': 'bg-amber-50 text-amber-700 border-amber-200',
    'fully_received': 'bg-emerald-50 text-emerald-700 border-emerald-200',
    'cancelled': 'bg-red-50 text-red-700 border-red-200',
  };
  return map[status] || 'bg-gray-100 text-gray-800 border-gray-200';
};
</script>

<template>
  <AppLayout title="Purchase Orders">
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
          Purchase Orders
        </h2>
        <Link :href="route('seller.purchase-orders.create')">
          <Button class="bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg transition-all transform hover:scale-105 hover:shadow-indigo-500/30">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
            Create New PO
          </Button>
        </Link>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <Card class="shadow-xl rounded-2xl overflow-hidden border-0 bg-white/80 backdrop-blur-xl">
          <CardContent class="p-0">
            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100/50">
                  <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">PO Number</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Supplier</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                  <tr v-if="purchaseOrders.length === 0">
                    <td colspan="5" class="px-6 py-16 text-center">
                      <div class="flex flex-col items-center justify-center space-y-3">
                        <div class="p-4 bg-indigo-50 rounded-full">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                        </div>
                        <p class="text-gray-500 text-lg font-medium">No Purchase Orders found.</p>
                        <p class="text-gray-400 text-sm">Start ordering inventory from your suppliers.</p>
                      </div>
                    </td>
                  </tr>
                  <tr v-for="po in purchaseOrders" :key="po.id" class="hover:bg-indigo-50/40 transition-colors cursor-pointer group">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="font-bold text-indigo-600 group-hover:text-indigo-800 transition-colors">{{ po.po_number }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm font-semibold text-gray-900">{{ po.supplier?.company_name }}</div>
                      <div class="text-xs text-gray-500">{{ po.supplier?.contact_person }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ new Date(po.created_at).toLocaleDateString() }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="font-bold text-gray-900">₱{{ parseFloat(po.total_amount).toFixed(2) }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-md border" :class="getStatusColor(po.status)">
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
