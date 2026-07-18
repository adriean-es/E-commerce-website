<script setup>
import { ref, computed } from 'vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Button } from '@/Components/ui/button';
import { Input } from '@/Components/ui/input';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';

const props = defineProps({
  approvedPOs: Array,
});

const selectedPO = ref(null);
const form = useForm({
  purchase_order_id: '',
  items: [],
  notes: '',
});

const selectPO = (po) => {
  selectedPO.value = po;
  form.purchase_order_id = po.id;
  form.items = po.items.map(item => ({
    po_item_id: item.id,
    product_name: item.product_variant?.product?.name || 'Unknown',
    sku: item.product_variant?.sku || '',
    quantity_ordered: item.quantity_ordered,
    quantity_already_received: item.quantity_received,
    quantity_remaining: item.quantity_ordered - item.quantity_received,
    good_qty: item.quantity_ordered - item.quantity_received, // Default to remaining
    damaged_qty: 0,
    notes: '',
  }));
};

const submitReceipt = () => {
  form.post(route('seller.inventory.receive.store'));
};
</script>

<template>
  <AppLayout title="Receive Stock">
    <template #header>
      <div class="flex items-center gap-4">
        <Link :href="route('seller.inventory.index')" class="text-gray-400 hover:text-emerald-600 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </Link>
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">Receive Stock from Purchase Order</h2>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

        <!-- Step 1: Select PO -->
        <Card v-if="!selectedPO" class="shadow-sm border border-gray-200/60 bg-white overflow-hidden">
          <div class="h-1 w-full bg-cyan-600"></div>
          <CardHeader class="pt-5">
            <CardTitle class="text-lg text-gray-800">Step 1: Select an Approved Purchase Order</CardTitle>
          </CardHeader>
          <CardContent>
            <div v-if="approvedPOs.length === 0" class="text-center py-10 text-gray-500">
              <p class="text-lg font-medium">No approved Purchase Orders available.</p>
              <p class="text-sm mt-1">A PO must be approved by the supplier before you can receive stock.</p>
            </div>
            <div v-else class="space-y-3">
              <button v-for="po in approvedPOs" :key="po.id" @click="selectPO(po)"
                class="w-full p-4 bg-white rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:border-cyan-300 hover:bg-cyan-50/30 transition-all text-left group">
                <div>
                  <h4 class="font-bold text-gray-900 group-hover:text-cyan-700 transition-colors">{{ po.po_number }}</h4>
                  <p class="text-sm text-gray-500">{{ po.supplier?.user?.name }} — ₱{{ parseFloat(po.total_amount).toFixed(2) }}</p>
                  <p class="text-xs text-gray-400">{{ po.items.length }} line items</p>
                </div>
                <span class="px-3 py-1 text-xs font-bold rounded-md border"
                  :class="po.status === 'approved' ? 'bg-green-50 text-green-700 border-green-200' : 'bg-amber-50 text-amber-700 border-amber-200'">
                  {{ po.status.toUpperCase() }}
                </span>
              </button>
            </div>
          </CardContent>
        </Card>

        <!-- Step 2: Enter Quantities -->
        <form v-if="selectedPO" @submit.prevent="submitReceipt">
          <Card class="shadow-sm border border-gray-200/60 bg-white overflow-hidden">
            <div class="h-1 w-full bg-cyan-600"></div>
            <CardHeader class="border-b border-gray-100 bg-gray-50/50 flex flex-row justify-between items-center pt-5">
              <CardTitle class="text-lg text-gray-800">
                Receiving: <span class="text-cyan-600">{{ selectedPO.po_number }}</span>
              </CardTitle>
              <button type="button" @click="selectedPO = null" class="text-sm text-gray-400 hover:text-gray-600 transition-colors">← Change PO</button>
            </CardHeader>
            <CardContent class="p-0">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Product (SKU)</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Ordered</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Already Rcvd</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Remaining</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider w-24">Good Qty</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider w-24">Damaged</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                  <tr v-for="(item, idx) in form.items" :key="idx" class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4">
                      <div class="font-medium text-gray-900">{{ item.product_name }}</div>
                      <div class="text-xs text-gray-400">{{ item.sku }}</div>
                    </td>
                    <td class="px-6 py-4 text-center font-bold text-gray-700">{{ item.quantity_ordered }}</td>
                    <td class="px-6 py-4 text-center text-gray-500">{{ item.quantity_already_received }}</td>
                    <td class="px-6 py-4 text-center font-bold text-cyan-600">{{ item.quantity_remaining }}</td>
                    <td class="px-6 py-4 text-center">
                      <Input v-model.number="item.good_qty" type="number" min="0" :max="item.quantity_remaining" class="w-20 text-center text-sm h-9 mx-auto focus-visible:ring-cyan-500" />
                    </td>
                    <td class="px-6 py-4 text-center">
                      <Input v-model.number="item.damaged_qty" type="number" min="0" class="w-20 text-center text-sm h-9 mx-auto focus-visible:ring-cyan-500" />
                    </td>
                  </tr>
                </tbody>
              </table>
            </CardContent>
          </Card>

          <div class="mt-6 flex justify-end">
            <Button type="submit" :disabled="form.processing" class="bg-cyan-600 hover:bg-cyan-700 text-white shadow-sm px-8 h-11 text-sm font-medium transition-all">
              Confirm & Record Receipt
            </Button>
          </div>
        </form>

      </div>
    </div>
  </AppLayout>
</template>
