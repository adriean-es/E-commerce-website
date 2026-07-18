<script setup>
import { ref } from 'vue';
import { useForm, Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Button } from '@/Components/ui/button';
import { Input } from '@/Components/ui/input';
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

const props = defineProps({
  suppliers: Array,
  invitations: Array,
});

const form = useForm({
  email: '',
});

const submitInvite = () => {
  form.post(route('seller.suppliers.store'), {
    preserveScroll: true,
    onSuccess: () => form.reset('email'),
  });
};
</script>

<template>
  <AppLayout title="Supplier Management">
    <template #header>
      <div class="flex justify-between items-center w-full">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Supplier Management
        </h2>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
        
        <!-- Invite Supplier Section -->
        <Card>
          <CardHeader>
            <CardTitle>Invite a New Supplier</CardTitle>
          </CardHeader>
          <CardContent>
            <form @submit.prevent="submitInvite" class="flex flex-col md:flex-row gap-4 items-end">
              <div class="w-full max-w-md">
                <label class="block text-sm font-medium text-gray-700 mb-1">Supplier Email Address</label>
                <Input v-model="form.email" type="email" placeholder="vendor@example.com" required />
                <p v-if="form.errors.email" class="text-sm text-red-600 mt-1">{{ form.errors.email }}</p>
              </div>
              <Button type="submit" :disabled="form.processing" class="w-full md:w-auto">
                <Plus class="w-4 h-4 mr-2" /> Send Invitation
              </Button>
            </form>
          </CardContent>
        </Card>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
          <!-- Active Suppliers -->
          <Card>
            <CardHeader>
              <CardTitle>Active Suppliers</CardTitle>
            </CardHeader>
            <CardContent>
              <div class="rounded-md border">
                <Table>
                  <TableHeader>
                    <TableRow>
                      <TableHead>Company</TableHead>
                      <TableHead>Contact</TableHead>
                      <TableHead class="text-right">Status</TableHead>
                    </TableRow>
                  </TableHeader>
                  <TableBody>
                    <TableRow v-for="supplier in suppliers" :key="supplier.id">
                      <TableCell class="font-medium">{{ supplier.company_name }}</TableCell>
                      <TableCell>{{ supplier.contact_person }}</TableCell>
                      <TableCell class="text-right">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                          ACTIVE
                        </span>
                      </TableCell>
                    </TableRow>
                    <TableRow v-if="suppliers.length === 0">
                      <TableCell colspan="3" class="h-24 text-center text-gray-500">
                        No active suppliers yet.
                      </TableCell>
                    </TableRow>
                  </TableBody>
                </Table>
              </div>
            </CardContent>
          </Card>

          <!-- Pending Invitations -->
          <Card>
            <CardHeader>
              <CardTitle>Pending Invitations</CardTitle>
            </CardHeader>
            <CardContent>
              <div class="rounded-md border">
                <Table>
                  <TableHeader>
                    <TableRow>
                      <TableHead>Email</TableHead>
                      <TableHead>Sent On</TableHead>
                      <TableHead class="text-right">Status</TableHead>
                    </TableRow>
                  </TableHeader>
                  <TableBody>
                    <TableRow v-for="inv in invitations" :key="inv.id">
                      <TableCell class="font-medium">
                        {{ inv.invited_email }}
                        <div class="mt-1">
                          <a :href="`/supplier/register?token=${inv.token}`" target="_blank" class="text-xs text-indigo-600 hover:text-indigo-800 hover:underline">
                            Open Registration Link ↗
                          </a>
                        </div>
                      </TableCell>
                      <TableCell>{{ new Date(inv.created_at).toLocaleDateString() }}</TableCell>
                      <TableCell class="text-right">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                          PENDING
                        </span>
                      </TableCell>
                    </TableRow>
                    <TableRow v-if="invitations.length === 0">
                      <TableCell colspan="3" class="h-24 text-center text-gray-500">
                        No pending invitations.
                      </TableCell>
                    </TableRow>
                  </TableBody>
                </Table>
              </div>
            </CardContent>
          </Card>
        </div>

      </div>
    </div>
  </AppLayout>
</template>
