<script setup>
import { Head, Link } from '@inertiajs/vue3';
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
import { Plus, Clock, CheckCircle, XCircle } from 'lucide-vue-next';

const props = defineProps({
  products: Object
});

const getStatusColor = (status) => {
  switch (status) {
    case 'approved': return 'bg-green-100 text-green-800';
    case 'pending_review': return 'bg-yellow-100 text-yellow-800';
    case 'rejected': return 'bg-red-100 text-red-800';
    default: return 'bg-gray-100 text-gray-800';
  }
};
</script>

<template>
  <AppLayout title="My Products">
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Product Catalog
        </h2>
        <Link :href="route('seller.products.create')">
          <Button>
            <Plus class="w-4 h-4 mr-2" /> Add Product
          </Button>
        </Link>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <Card>
          <CardHeader>
            <CardTitle>My Products</CardTitle>
          </CardHeader>
          <CardContent>
            <div class="rounded-md border">
              <Table>
                <TableHeader>
                  <TableRow>
                    <TableHead>Name</TableHead>
                    <TableHead>Category</TableHead>
                    <TableHead>Status</TableHead>
                    <TableHead class="text-right">Variants</TableHead>
                  </TableRow>
                </TableHeader>
                <TableBody>
                  <TableRow v-for="product in products.data" :key="product.id">
                    <TableCell class="font-medium">{{ product.name }}</TableCell>
                    <TableCell>{{ product.category?.name }}</TableCell>
                    <TableCell>
                      <span :class="['px-2 inline-flex text-xs leading-5 font-semibold rounded-full', getStatusColor(product.status)]">
                        {{ product.status.replace('_', ' ').toUpperCase() }}
                      </span>
                      <div v-if="product.status === 'rejected'" class="text-xs text-red-600 mt-1">
                        {{ product.rejection_reason }}
                      </div>
                    </TableCell>
                    <TableCell class="text-right">{{ product.variants?.length }} SKUs</TableCell>
                  </TableRow>
                  <TableRow v-if="products.data.length === 0">
                    <TableCell colspan="4" class="h-24 text-center text-gray-500">
                      You haven't added any products yet.
                    </TableCell>
                  </TableRow>
                </TableBody>
              </Table>
            </div>
          </CardContent>
        </Card>
      </div>
    </div>
  </AppLayout>
</template>
