<script setup>
import { ref } from 'vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Button } from '@/Components/ui/button';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';
import { Input } from '@/Components/ui/input';
import { Textarea } from '@/Components/ui/textarea';
import { Plus, Trash2, Save, ArrowLeft } from 'lucide-vue-next';
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from '@/Components/ui/table';

const props = defineProps({
  categories: Array
});

const form = useForm({
  name: '',
  category_id: '',
  description: '',
  variants: [
    { sku: '', price: 0 } // Start with at least one variant row
  ]
});

const addVariant = () => {
  form.variants.push({ sku: '', price: 0 });
};

const removeVariant = (index) => {
  if (form.variants.length > 1) {
    form.variants.splice(index, 1);
  }
};

const submit = () => {
  form.post(route('seller.products.store'), {
    preserveScroll: true
  });
};
</script>

<template>
  <AppLayout title="Add New Product">
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Add New Product
        </h2>
        <Link :href="route('seller.products.index')">
          <Button variant="outline">
            <ArrowLeft class="w-4 h-4 mr-2" /> Back to Catalog
          </Button>
        </Link>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Main Form -->
        <form @submit.prevent="submit" class="space-y-6">
          
          <!-- Basic Info Card -->
          <Card>
            <CardHeader>
              <CardTitle>Basic Information</CardTitle>
            </CardHeader>
            <CardContent class="space-y-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                <Input v-model="form.name" type="text" placeholder="e.g., Premium Cotton T-Shirt" required />
                <div v-if="form.errors.name" class="text-sm text-red-600 mt-1">{{ form.errors.name }}</div>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select 
                  v-model="form.category_id" 
                  class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  required
                >
                  <option value="" disabled>Select a category...</option>
                  <option v-for="category in categories" :key="category.id" :value="category.id">
                    {{ category.name }}
                  </option>
                </select>
                <div v-if="form.errors.category_id" class="text-sm text-red-600 mt-1">{{ form.errors.category_id }}</div>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <Textarea v-model="form.description" rows="4" placeholder="Describe the product..." required />
                <div v-if="form.errors.description" class="text-sm text-red-600 mt-1">{{ form.errors.description }}</div>
              </div>
            </CardContent>
          </Card>

          <!-- Variants Card -->
          <Card>
            <CardHeader class="flex flex-row justify-between items-center">
              <CardTitle>Pricing & Variants (SKUs)</CardTitle>
              <Button type="button" variant="outline" size="sm" @click="addVariant">
                <Plus class="w-4 h-4 mr-1" /> Add SKU
              </Button>
            </CardHeader>
            <CardContent>
              <p class="text-sm text-gray-500 mb-4">Note: Stock quantities will be managed securely via the Supplier/PO Inventory Module.</p>
              
              <div class="rounded-md border">
                <Table>
                  <TableHeader>
                    <TableRow>
                      <TableHead>SKU (Stock Keeping Unit)</TableHead>
                      <TableHead>Selling Price (PHP)</TableHead>
                      <TableHead class="w-[80px]"></TableHead>
                    </TableRow>
                  </TableHeader>
                  <TableBody>
                    <TableRow v-for="(variant, index) in form.variants" :key="index">
                      <TableCell>
                        <Input v-model="variant.sku" type="text" placeholder="e.g., TSHIRT-RED-XL" required />
                      </TableCell>
                      <TableCell>
                        <Input v-model="variant.price" type="number" step="0.01" min="0" placeholder="0.00" required />
                      </TableCell>
                      <TableCell class="text-right">
                        <Button 
                          type="button" 
                          variant="ghost" 
                          size="icon" 
                          class="text-red-500 hover:text-red-700"
                          @click="removeVariant(index)"
                          :disabled="form.variants.length === 1"
                        >
                          <Trash2 class="w-4 h-4" />
                        </Button>
                      </TableCell>
                    </TableRow>
                  </TableBody>
                </Table>
              </div>
            </CardContent>
          </Card>

          <!-- Submit Button -->
          <div class="flex justify-end">
            <Button type="submit" :disabled="form.processing">
              <Save class="w-4 h-4 mr-2" />
              Save & Submit for Review
            </Button>
          </div>

        </form>
      </div>
    </div>
  </AppLayout>
</template>
