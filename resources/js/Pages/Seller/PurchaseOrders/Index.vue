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
import { Plus } from 'lucide-vue-next';

defineProps({
  purchaseOrders: Array
});

const getStatusColor = (status) => {
  const map = {
    'draft': 'bg-gray-100 text-gray-800',
    'sent': 'bg-blue-100 text-blue-800',
    'acknowledged': 'bg-purple-100 text-purple-800',
    'approved': 'bg-green-100 text-green-800',
    'partially_received': 'bg-yellow-100 text-yellow-800',
    'fully_received': 'bg-emerald-100 text-emerald-800',
    'cancelled': 'bg-red-100 text-red-800',
  };
  return map[status] || 'bg-gray-100 text-gray-800';
};
</script>

<template>
  <AppLayout title="Purchase Orders">
    <template #header>
      <div class="flex justify-between items-center w-full">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Purchase Orders
        </h2>
        <Link :href="route('seller.purchase-orders.create')">
          <Button>
            <Plus class="w-4 h-4 mr-2" /> Create New PO
          </Button>
        </Link>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <Card>
          <CardHeader>
            <CardTitle>Purchase Orders</CardTitle>
          </CardHeader>
          <CardContent>
            <div class="rounded-md border">
              <Table>
                <TableHeader>
                  <TableRow>
                    <TableHead>PO Number</TableHead>
                    <TableHead>Supplier</TableHead>
                    <TableHead>Date</TableHead>
                    <TableHead>Total</TableHead>
                    <TableHead class="text-right">Status</TableHead>
                  </TableRow>
                </TableHeader>
                <TableBody>
                  <TableRow v-for="po in purchaseOrders" :key="po.id" class="cursor-pointer">
                    <TableCell class="font-medium text-indigo-600">{{ po.po_number }}</TableCell>
                    <TableCell>
                      <div class="font-medium text-gray-900">{{ po.supplier?.company_name }}</div>
                      <div class="text-xs text-gray-500">{{ po.supplier?.contact_person }}</div>
                    </TableCell>
                    <TableCell>{{ new Date(po.created_at).toLocaleDateString() }}</TableCell>
                    <TableCell>₱{{ parseFloat(po.total_amount).toFixed(2) }}</TableCell>
                    <TableCell class="text-right">
                      <span :class="['px-2 inline-flex text-xs leading-5 font-semibold rounded-full', getStatusColor(po.status)]">
                        {{ po.status.toUpperCase() }}
                      </span>
                    </TableCell>
                  </TableRow>
                  <TableRow v-if="purchaseOrders.length === 0">
                    <TableCell colspan="5" class="h-24 text-center text-gray-500">
                      No Purchase Orders found. Start ordering inventory from your suppliers.
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
