<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Button } from '@/Components/ui/button';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';
import { Badge } from '@/Components/ui/badge';
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from '@/Components/ui/table';
import { Check, X, AlertCircle } from 'lucide-vue-next';

const props = defineProps({
  products: Object
});

const approveForm = useForm({});
const rejectForm = useForm({
  reason: ''
});

const selectedProduct = ref(null);
const isRejecting = ref(false);

const approveProduct = (id) => {
  approveForm.post(route('admin.catalog.approve', id), {
    preserveScroll: true
  });
};

const rejectProduct = (id) => {
  rejectForm.post(route('admin.catalog.reject', id), {
    preserveScroll: true,
    onSuccess: () => {
      isRejecting.value = false;
      rejectForm.reset();
    }
  });
};
</script>

<template>
  <AppLayout title="Catalog Approvals">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Pending Catalog Approvals
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <Card>
          <CardHeader>
            <CardTitle>Products Awaiting Review</CardTitle>
          </CardHeader>
          <CardContent>
            <div class="rounded-md border">
              <Table>
                <TableHeader>
                  <TableRow>
                    <TableHead>Product Name</TableHead>
                    <TableHead>Store</TableHead>
                    <TableHead>Category</TableHead>
                    <TableHead>Variants</TableHead>
                    <TableHead class="text-right">Actions</TableHead>
                  </TableRow>
                </TableHeader>
                <TableBody>
                  <TableRow v-for="product in products.data" :key="product.id">
                    <TableCell class="font-medium">{{ product.name }}</TableCell>
                    <TableCell>{{ product.shop?.name }}</TableCell>
                    <TableCell>{{ product.category?.name }}</TableCell>
                    <TableCell>{{ product.variants?.length }} SKUs</TableCell>
                    <TableCell class="text-right space-x-2">
                      <Button variant="outline" class="text-green-600 border-green-600" @click="approveProduct(product.id)">
                        <Check class="w-4 h-4 mr-1" /> Approve
                      </Button>
                      
                      <Button variant="destructive" @click="selectedProduct = product; isRejecting = true">
                        <X class="w-4 h-4 mr-1" /> Reject
                      </Button>
                    </TableCell>
                  </TableRow>
                  <TableRow v-if="products.data.length === 0">
                    <TableCell colspan="5" class="h-24 text-center text-gray-500">
                      No pending products found.
                    </TableCell>
                  </TableRow>
                </TableBody>
              </Table>
            </div>
            
            <!-- Simple Rejection Form Area -->
            <div v-if="isRejecting && selectedProduct" class="mt-6 p-4 border border-red-200 bg-red-50 rounded-md">
              <h3 class="font-bold text-red-800 mb-2 flex items-center">
                <AlertCircle class="w-5 h-5 mr-2" />
                Rejecting: {{ selectedProduct.name }}
              </h3>
              <textarea 
                v-model="rejectForm.reason" 
                class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 mb-3" 
                rows="3" 
                placeholder="Provide a reason for rejection so the seller can fix it..."
                required
              ></textarea>
              <div class="flex justify-end space-x-2">
                <Button variant="outline" @click="isRejecting = false">Cancel</Button>
                <Button variant="destructive" @click="rejectProduct(selectedProduct.id)" :disabled="rejectForm.processing">
                  Submit Rejection
                </Button>
              </div>
            </div>
          </CardContent>
        </Card>
      </div>
    </div>
  </AppLayout>
</template>
