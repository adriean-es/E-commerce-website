<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Button } from '@/Components/ui/button';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';

const props = defineProps({
  purchaseOrder: Object
});

const form = useForm({
  status: props.purchaseOrder.status,
  supplier_notes: props.purchaseOrder.supplier_notes || '',
});

const updateStatus = (newStatus) => {
  form.status = newStatus;
  form.put(route('supplier.purchase-orders.update', props.purchaseOrder.id), {
    preserveScroll: true,
  });
};

const getStatusColor = (status) => {
  const map = {
    'sent': 'bg-blue-100 text-blue-800 border-blue-200',
    'acknowledged': 'bg-purple-100 text-purple-800 border-purple-200',
    'approved': 'bg-green-100 text-green-800 border-green-200',
    'cancelled': 'bg-red-100 text-red-800 border-red-200',
  };
  return map[status] || 'bg-gray-100 text-gray-800';
};
</script>

<template>
  <AppLayout :title="`PO ${purchaseOrder.po_number}`">
    <template #header>
      <div class="flex items-center gap-4">
        <Link :href="route('supplier.purchase-orders.index')" class="text-gray-400 hover:text-indigo-600 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        </Link>
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
          Review Purchase Order: <span class="text-indigo-600">{{ purchaseOrder.po_number }}</span>
        </h2>
        <span class="px-3 py-1 text-xs font-bold rounded-md border ml-auto" :class="getStatusColor(purchaseOrder.status)">
          {{ purchaseOrder.status.toUpperCase() }}
        </span>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
          
          <!-- Left Column: Details & Items -->
          <div class="lg:col-span-2 space-y-6">
            
            <Card class="shadow-sm border border-gray-200/60 bg-white">
              <CardHeader class="border-b border-gray-100 bg-gray-50/50">
                <CardTitle class="text-lg text-gray-800">Order Information</CardTitle>
              </CardHeader>
              <CardContent class="p-6">
                <div class="grid grid-cols-2 gap-6">
                  <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Buyer / Seller Shop</p>
                    <p class="font-medium text-gray-900">{{ purchaseOrder.shop.name }}</p>
                    <p class="text-sm text-gray-500 mt-1">Requested by {{ purchaseOrder.creator.name }}</p>
                  </div>
                  <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Expected Delivery</p>
                    <p class="font-medium text-gray-900">{{ purchaseOrder.expected_delivery_date ? new Date(purchaseOrder.expected_delivery_date).toLocaleDateString() : 'Not specified' }}</p>
                  </div>
                  <div class="col-span-2">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Delivery Address</p>
                    <p class="font-medium text-gray-900 bg-gray-50 p-3 rounded-lg border border-gray-100">{{ purchaseOrder.delivery_address }}</p>
                  </div>
                </div>
              </CardContent>
            </Card>

            <Card class="shadow-sm border border-gray-200/60 bg-white">
              <CardHeader class="border-b border-gray-100 bg-gray-50/50">
                <CardTitle class="text-lg text-gray-800">Requested Items</CardTitle>
              </CardHeader>
              <CardContent class="p-0">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                    <tr>
                      <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Product (SKU)</th>
                      <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Qty</th>
                      <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Unit Cost</th>
                      <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Total</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-100">
                    <tr v-for="item in purchaseOrder.items" :key="item.id" class="hover:bg-gray-50/50 transition-colors">
                      <td class="px-6 py-4 text-sm font-medium text-gray-900">
                        {{ item.product_variant?.product?.name }} <span class="text-gray-400 ml-1">({{ item.product_variant?.sku }})</span>
                      </td>
                      <td class="px-6 py-4 text-sm text-gray-900 text-center font-bold">{{ item.quantity_ordered }}</td>
                      <td class="px-6 py-4 text-sm text-gray-500 text-right">₱{{ parseFloat(item.unit_cost).toFixed(2) }}</td>
                      <td class="px-6 py-4 text-sm font-bold text-cyan-600 text-right">₱{{ parseFloat(item.total_cost).toFixed(2) }}</td>
                    </tr>
                  </tbody>
                </table>
              </CardContent>
            </Card>

            <Card class="shadow-sm border border-gray-200/60 bg-white">
              <CardHeader class="border-b border-gray-100 bg-gray-50/50">
                <CardTitle class="text-lg text-gray-800">Audit Trail</CardTitle>
              </CardHeader>
              <CardContent class="p-6">
                <ul class="space-y-4">
                  <li v-for="log in purchaseOrder.status_logs" :key="log.id" class="flex gap-4">
                    <div class="mt-1">
                      <div class="h-2 w-2 rounded-full bg-cyan-500"></div>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-900">Status changed from <b class="capitalize">{{ log.from_status }}</b> to <b class="capitalize">{{ log.to_status }}</b></p>
                      <p class="text-xs text-gray-500">{{ new Date(log.created_at).toLocaleString() }} by {{ log.changer?.name }}</p>
                      <p v-if="log.notes" class="text-sm text-gray-600 mt-1 italic">"{{ log.notes }}"</p>
                    </div>
                  </li>
                </ul>
              </CardContent>
            </Card>

          </div>

          <!-- Right Column: Action Box -->
          <div class="space-y-6">
            <Card class="shadow-sm border border-gray-200/60 bg-white overflow-hidden sticky top-6">
              <div class="h-1 w-full bg-cyan-600"></div>
              <CardHeader class="pt-5">
                <CardTitle class="text-lg text-gray-800">Supplier Actions</CardTitle>
              </CardHeader>
              <CardContent class="p-6 space-y-6">
                
                <div class="flex justify-between items-center pb-4 border-b border-gray-100">
                  <span class="text-lg font-bold text-gray-900">Total Value</span>
                  <span class="text-2xl font-black text-cyan-600 tracking-tight">₱{{ parseFloat(purchaseOrder.total_amount).toFixed(2) }}</span>
                </div>

                <div v-if="['sent', 'acknowledged'].includes(purchaseOrder.status)">
                  <label class="block text-sm font-medium text-gray-700 mb-2">Notes to Seller (Optional)</label>
                  <textarea v-model="form.supplier_notes" rows="3" class="w-full border-gray-300 focus:border-cyan-500 focus:ring-cyan-500 rounded-md shadow-sm text-sm mb-4" placeholder="E.g., We can deliver this by next Tuesday..."></textarea>
                  
                  <div class="space-y-3">
                    <Button v-if="purchaseOrder.status === 'sent'" @click="updateStatus('acknowledged')" :disabled="form.processing" variant="outline" class="w-full border-cyan-200 text-cyan-700 hover:bg-cyan-50 h-11 transition-colors">
                      Acknowledge PO
                    </Button>
                    
                    <Button @click="updateStatus('approved')" :disabled="form.processing" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white shadow-sm transition-all h-11 text-sm font-medium">
                      Approve & Prepare Goods
                    </Button>
                    
                    <Button @click="updateStatus('cancelled')" :disabled="form.processing" variant="ghost" class="w-full text-red-500 hover:text-red-700 hover:bg-red-50 h-11 transition-colors">
                      Reject / Cancel PO
                    </Button>
                  </div>
                </div>
                
                <div v-else class="text-center p-4 bg-gray-50 rounded-lg border border-gray-100">
                  <p class="text-sm font-medium text-gray-600">No further actions available for this PO.</p>
                </div>

              </CardContent>
            </Card>
          </div>

        </div>

      </div>
    </div>
  </AppLayout>
</template>
