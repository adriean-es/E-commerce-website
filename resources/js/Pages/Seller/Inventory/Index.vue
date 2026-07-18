<script setup>
import { ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Button } from '@/Components/ui/button';
import { Input } from '@/Components/ui/input';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';

const props = defineProps({
  inventories: Array,
  pendingAdjustments: Array,
});

// Adjustment modal state
const showAdjustModal = ref(false);
const adjustForm = useForm({
  inventory_id: '',
  adjustment_type: 'SHORTAGE',
  quantity_to_adjust: -1,
  reason: '',
});

const openAdjustModal = (inventoryId) => {
  adjustForm.inventory_id = inventoryId;
  adjustForm.reset('adjustment_type', 'quantity_to_adjust', 'reason');
  adjustForm.adjustment_type = 'SHORTAGE';
  adjustForm.quantity_to_adjust = -1;
  showAdjustModal.value = true;
};

const submitAdjustment = () => {
  adjustForm.post(route('seller.inventory.adjustments.store'), {
    preserveScroll: true,
    onSuccess: () => { showAdjustModal.value = false; },
  });
};

const approveAdj = (adjId) => {
  useForm({}).post(route('seller.inventory.adjustments.approve', adjId), { preserveScroll: true });
};

const rejectAdj = (adjId) => {
  useForm({}).post(route('seller.inventory.adjustments.reject', adjId), { preserveScroll: true });
};

const getStockClass = (inv) => {
  if (inv.quantity_available <= 0) return 'text-red-600 font-black';
  if (inv.reorder_point && inv.quantity_available <= inv.reorder_point) return 'text-amber-600 font-bold';
  return 'text-green-600 font-bold';
};
</script>

<template>
  <AppLayout title="Inventory">
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">Inventory Dashboard</h2>
        <Link :href="route('seller.inventory.receive')">
          <Button class="bg-cyan-600 hover:bg-cyan-700 text-white shadow-sm transition-all h-10 text-sm font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            Receive Stock
          </Button>
        </Link>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

        <!-- Pending Adjustments -->
        <Card v-if="pendingAdjustments.length > 0" class="border-l-4 border-amber-500 shadow-md bg-white">
          <CardHeader>
            <CardTitle class="text-lg flex items-center gap-2 text-amber-700">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
              Pending Adjustment Requests ({{ pendingAdjustments.length }})
            </CardTitle>
          </CardHeader>
          <CardContent class="p-0">
            <div class="divide-y divide-gray-100">
              <div v-for="adj in pendingAdjustments" :key="adj.id" class="px-6 py-4 flex items-center justify-between hover:bg-amber-50/30 transition-colors">
                <div>
                  <p class="font-semibold text-gray-900">{{ adj.inventory?.product_variant?.product?.name }} — {{ adj.adjustment_type }}</p>
                  <p class="text-sm text-gray-500">{{ adj.reason }}</p>
                  <p class="text-xs text-gray-400 mt-1">Requested by {{ adj.requester?.name }}</p>
                </div>
                <div class="flex items-center gap-3">
                  <span class="font-bold text-lg" :class="adj.quantity_to_adjust < 0 ? 'text-red-600' : 'text-green-600'">
                    {{ adj.quantity_to_adjust > 0 ? '+' : '' }}{{ adj.quantity_to_adjust }}
                  </span>
                  <Button @click="approveAdj(adj.id)" size="sm" class="bg-green-600 hover:bg-green-700 text-white text-xs">Approve</Button>
                  <Button @click="rejectAdj(adj.id)" size="sm" variant="outline" class="text-red-600 border-red-200 hover:bg-red-50 text-xs">Reject</Button>
                </div>
              </div>
            </div>
          </CardContent>
        </Card>

        <!-- Stock Levels Table -->
        <Card class="shadow-sm border border-gray-200/60 bg-white">
          <CardContent class="p-0">
            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Product / Variant</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">On Hand</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Reserved</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Available</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Reorder Point</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Actions</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                  <tr v-if="inventories.length === 0">
                    <td colspan="7" class="px-6 py-16 text-center">
                      <div class="flex flex-col items-center space-y-3">
                        <div class="p-4 bg-cyan-50 rounded-full">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                        <p class="text-gray-500 text-lg font-medium">No inventory records yet.</p>
                        <p class="text-gray-400 text-sm">Receive stock from an approved PO to start tracking.</p>
                      </div>
                    </td>
                  </tr>
                  <tr v-for="inv in inventories" :key="inv.id" class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4">
                      <div class="font-semibold text-gray-900">{{ inv.product_variant?.product?.name }}</div>
                      <div class="text-xs text-gray-400">SKU: {{ inv.product_variant?.sku }}</div>
                    </td>
                    <td class="px-6 py-4 text-center font-bold text-gray-900">{{ inv.quantity_on_hand }}</td>
                    <td class="px-6 py-4 text-center text-gray-500">{{ inv.quantity_reserved }}</td>
                    <td class="px-6 py-4 text-center" :class="getStockClass(inv)">{{ inv.quantity_available }}</td>
                    <td class="px-6 py-4 text-center text-sm text-gray-500">{{ inv.reorder_point ?? '—' }}</td>
                    <td class="px-6 py-4 text-center text-sm text-gray-500">{{ inv.warehouse_location || '—' }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                      <Link :href="route('seller.inventory.transactions', inv.id)" class="text-xs font-medium text-cyan-700 hover:text-cyan-900 bg-cyan-50 border border-cyan-100 px-2.5 py-1 rounded-md transition-colors">
                        Ledger
                      </Link>
                      <button @click="openAdjustModal(inv.id)" class="text-xs font-medium text-amber-600 hover:text-amber-800 bg-amber-50 border border-amber-100 px-2.5 py-1 rounded-md transition-colors">
                        Adjust
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </CardContent>
        </Card>

      </div>
    </div>

    <!-- Adjustment Modal -->
    <Teleport to="body">
      <div v-if="showAdjustModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm" @click.self="showAdjustModal = false">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 overflow-hidden">
          <div class="bg-gradient-to-r from-amber-500 to-orange-500 p-6 text-white">
            <h3 class="text-xl font-bold">Request Manual Adjustment</h3>
            <p class="text-amber-100 text-sm mt-1">This will require approval before stock is modified.</p>
          </div>
          <form @submit.prevent="submitAdjustment" class="p-6 space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Adjustment Type</label>
              <select v-model="adjustForm.adjustment_type" class="w-full border-gray-300 rounded-md">
                <option value="SHORTAGE">Shortage</option>
                <option value="DAMAGE">Damage</option>
                <option value="EXPIRY">Expiry</option>
                <option value="COUNT_CORRECTION">Count Correction</option>
                <option value="SUPPLIER_RETURN">Supplier Return</option>
                <option value="OTHER">Other</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Quantity Change (use negative to decrease)</label>
              <Input v-model.number="adjustForm.quantity_to_adjust" type="number" required />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Reason (min 10 characters)</label>
              <textarea v-model="adjustForm.reason" rows="3" class="w-full border-gray-300 rounded-md text-sm" required minlength="10" placeholder="Explain why this adjustment is needed..."></textarea>
              <p v-if="adjustForm.errors.reason" class="text-xs text-red-600 mt-1">{{ adjustForm.errors.reason }}</p>
            </div>
            <div class="flex gap-3 pt-2">
              <Button type="submit" :disabled="adjustForm.processing" class="flex-1 bg-amber-600 hover:bg-amber-700 text-white">Submit Request</Button>
              <Button type="button" @click="showAdjustModal = false" variant="outline" class="flex-1">Cancel</Button>
            </div>
          </form>
        </div>
      </div>
    </Teleport>
  </AppLayout>
</template>
