<script setup>
import { ref, computed } from 'vue';
import { useForm, Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Button } from '@/Components/ui/button';
import { Input } from '@/Components/ui/input';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';

const props = defineProps({
  suppliers: Array,
  variants: Array,
});

const form = useForm({
  supplier_id: '',
  delivery_address: '',
  expected_delivery_date: '',
  items: [
    { variant_id: '', quantity: 1, unit_cost: 0 }
  ]
});

const addItem = () => {
  form.items.push({ variant_id: '', quantity: 1, unit_cost: 0 });
};

const removeItem = (index) => {
  if (form.items.length > 1) {
    form.items.splice(index, 1);
  }
};

const subtotal = computed(() => {
  return form.items.reduce((total, item) => total + (item.quantity * item.unit_cost), 0);
});

const minDate = computed(() => {
  const today = new Date();
  const yyyy = today.getFullYear();
  const mm = String(today.getMonth() + 1).padStart(2, '0');
  const dd = String(today.getDate()).padStart(2, '0');
  return `${yyyy}-${mm}-${dd}`;
});

const submitPO = () => {
  form.post(route('seller.purchase-orders.store'));
};
</script>

<template>
  <AppLayout title="Create PO">
    <template #header>
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        Create Purchase Order
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <form @submit.prevent="submitPO">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Column: Details & Items -->
            <div class="lg:col-span-2 space-y-6">
              <Card class="shadow-sm border border-gray-200/60 bg-white">
                <CardHeader class="border-b border-gray-100 bg-gray-50/50">
                  <CardTitle class="text-lg text-gray-800">PO Details</CardTitle>
                </CardHeader>
                <CardContent class="p-6 space-y-4">
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-1">Select Supplier <span class="text-red-500">*</span></label>
                      <select v-model="form.supplier_id" class="w-full border-gray-300 focus:border-cyan-500 focus:ring-cyan-500 rounded-md shadow-sm text-sm" required>
                        <option value="" disabled>Select a supplier...</option>
                        <option v-for="sup in suppliers" :key="sup.id" :value="sup.id">
                          {{ sup.company_name }}
                        </option>
                      </select>
                      <p v-if="form.errors.supplier_id" class="text-sm text-red-600 mt-1">{{ form.errors.supplier_id }}</p>
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-1">Expected Delivery Date <span class="text-red-500">*</span></label>
                      <Input v-model="form.expected_delivery_date" type="date" :min="minDate" @change="if(form.expected_delivery_date < minDate) form.expected_delivery_date = minDate" class="focus-visible:ring-cyan-500" required />
                      <p v-if="form.errors.expected_delivery_date" class="text-sm text-red-600 mt-1">{{ form.errors.expected_delivery_date }}</p>
                    </div>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Delivery Address <span class="text-red-500">*</span></label>
                    <textarea v-model="form.delivery_address" rows="2" class="w-full border-gray-300 focus:border-cyan-500 focus:ring-cyan-500 rounded-md shadow-sm text-sm" required placeholder="Warehouse address..."></textarea>
                    <p v-if="form.errors.delivery_address" class="text-sm text-red-600 mt-1">{{ form.errors.delivery_address }}</p>
                  </div>
                </CardContent>
              </Card>

              <Card class="shadow-sm border border-gray-200/60 bg-white">
                <CardHeader class="border-b border-gray-100 bg-gray-50/50 flex flex-row justify-between items-center py-4">
                  <CardTitle class="text-lg text-gray-800">Line Items</CardTitle>
                  <Button type="button" @click="addItem" variant="outline" class="text-cyan-700 border-cyan-200 hover:bg-cyan-50 text-xs h-8">
                    + Add Item
                  </Button>
                </CardHeader>
                <CardContent class="p-0">
                  <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Product Variant</th>
                          <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-24">Qty</th>
                          <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-32">Unit Cost</th>
                          <th class="px-4 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider w-32">Total</th>
                          <th class="px-4 py-3 w-10"></th>
                        </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-100 bg-white">
                        <tr v-for="(item, index) in form.items" :key="index" class="hover:bg-gray-50/50 transition-colors">
                          <td class="px-4 py-3">
                            <select v-model="item.variant_id" class="w-full text-sm border-gray-300 focus:border-cyan-500 focus:ring-cyan-500 rounded-md shadow-sm" required>
                              <option value="" disabled>Select...</option>
                              <option v-for="v in variants" :key="v.id" :value="v.id">
                                {{ v.product?.name }} ({{ v.sku }})
                              </option>
                            </select>
                          </td>
                          <td class="px-4 py-3">
                            <Input v-model.number="item.quantity" type="number" min="1" @input="if(item.quantity < 1) item.quantity = 1" class="w-full text-sm h-9 focus-visible:ring-cyan-500" required />
                          </td>
                          <td class="px-4 py-3">
                            <Input v-model.number="item.unit_cost" type="number" step="0.01" min="0" @input="if(item.unit_cost < 0) item.unit_cost = 0" class="w-full text-sm h-9 focus-visible:ring-cyan-500" required />
                          </td>
                          <td class="px-4 py-3 text-right font-medium text-gray-900">
                            ₱{{ (item.quantity * item.unit_cost).toFixed(2) }}
                          </td>
                          <td class="px-4 py-3 text-right">
                            <button type="button" @click="removeItem(index)" class="text-red-400 hover:text-red-600 transition-colors rounded-full p-1 hover:bg-red-50" :disabled="form.items.length === 1">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </CardContent>
              </Card>
            </div>

            <!-- Right Column: Summary -->
            <div class="space-y-6">
              <Card class="shadow-sm border border-gray-200/60 bg-white overflow-hidden">
                <div class="h-1 w-full bg-cyan-600"></div>
                <CardHeader class="pt-5">
                  <CardTitle class="text-lg text-gray-800">Order Summary</CardTitle>
                </CardHeader>
                <CardContent class="p-6">
                  <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-500">Items ({{ form.items.length }})</span>
                    <span class="font-medium text-gray-900">₱{{ subtotal.toFixed(2) }}</span>
                  </div>
                  <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-500">Shipping</span>
                    <span class="font-medium text-gray-400 text-sm italic">Calculated later</span>
                  </div>
                  <div class="flex justify-between items-center py-4 mt-2">
                    <span class="text-base font-bold text-gray-900">Total</span>
                    <span class="text-2xl font-black text-cyan-600 tracking-tight">₱{{ subtotal.toFixed(2) }}</span>
                  </div>
                  
                  <Button type="submit" :disabled="form.processing" class="w-full mt-6 bg-cyan-600 hover:bg-cyan-700 text-white shadow-sm transition-all h-11 text-sm font-medium">
                    Send to Supplier
                  </Button>
                </CardContent>
              </Card>
            </div>

          </div>
        </form>

      </div>
    </div>
  </AppLayout>
</template>
