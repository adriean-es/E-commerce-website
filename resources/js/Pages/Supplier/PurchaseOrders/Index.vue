<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Card, CardContent } from '@/Components/ui/card';

defineProps({
  purchaseOrders: Array
});

const getStatusColor = (status) => {
  const map = {
    'sent': 'bg-blue-100 text-blue-800 border-blue-200',
    'acknowledged': 'bg-purple-100 text-purple-800 border-purple-200',
    'approved': 'bg-green-100 text-green-800 border-green-200',
    'partially_received': 'bg-amber-100 text-amber-800 border-amber-200',
    'fully_received': 'bg-emerald-100 text-emerald-800 border-emerald-200',
    'cancelled': 'bg-red-100 text-red-800 border-red-200',
  };
  return map[status] || 'bg-gray-100 text-gray-800 border-gray-200';
};
</script>

<template>
  <AppLayout title="Incoming Purchase Orders">
    <template #header>
      <h2 class="font-bold text-2xl text-gray-800 leading-tight">
        Incoming Purchase Orders
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <Card class="shadow-sm border border-gray-200/60 bg-white">
          <CardContent class="p-0">
            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">PO Number</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Seller / Shop</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Date Received</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Total Amount</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 w-10"></th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                  <tr v-if="purchaseOrders.length === 0">
                    <td colspan="6" class="px-6 py-16 text-center">
                      <p class="text-gray-500 text-lg font-medium">No Purchase Orders received yet.</p>
                    </td>
                  </tr>
                  <tr v-for="po in purchaseOrders" :key="po.id" class="hover:bg-gray-50/50 transition-colors group">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="font-bold text-cyan-600">{{ po.po_number }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm font-semibold text-gray-900">{{ po.shop?.name }}</div>
                      <div class="text-xs text-gray-500">Requested by {{ po.creator?.name }}</div>
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
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <Link :href="route('supplier.purchase-orders.show', po.id)" class="text-cyan-700 hover:text-cyan-900 font-bold bg-cyan-50 px-3 py-1.5 rounded-lg hover:bg-cyan-100 transition-colors border border-cyan-100">
                        Review &rarr;
                      </Link>
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
