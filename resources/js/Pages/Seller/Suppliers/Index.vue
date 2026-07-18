<script setup>
import { ref } from 'vue';
import { useForm, Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Button } from '@/Components/ui/button';
import { Input } from '@/Components/ui/input';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';

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
  <AppLayout title="My Suppliers">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Supplier Management
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        
        <!-- Invite Supplier Section -->
        <Card class="border-t-4 border-indigo-500 shadow-lg">
          <CardHeader>
            <CardTitle class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-600">
              Invite a New Supplier
            </CardTitle>
          </CardHeader>
          <CardContent>
            <form @submit.prevent="submitInvite" class="flex flex-col md:flex-row gap-4 items-end">
              <div class="w-full max-w-md">
                <label class="block text-sm font-medium text-gray-700 mb-1">Supplier Email Address</label>
                <Input v-model="form.email" type="email" placeholder="vendor@example.com" required />
                <p v-if="form.errors.email" class="text-sm text-red-600 mt-1">{{ form.errors.email }}</p>
              </div>
              <Button type="submit" :disabled="form.processing" class="w-full md:w-auto bg-indigo-600 hover:bg-indigo-700 text-white transition-all transform hover:scale-105 shadow-md">
                Send Invitation
              </Button>
            </form>
          </CardContent>
        </Card>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Active Suppliers -->
          <Card class="shadow-md border-0 bg-white/50 backdrop-blur-xl">
            <CardHeader>
              <CardTitle class="flex items-center gap-2 text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                Active Suppliers
              </CardTitle>
            </CardHeader>
            <CardContent>
              <div v-if="suppliers.length === 0" class="text-gray-500 italic text-center py-4">
                No active suppliers yet.
              </div>
              <ul v-else class="space-y-3">
                <li v-for="supplier in suppliers" :key="supplier.id" class="p-4 bg-white rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:bg-indigo-50 transition-colors">
                  <div>
                    <h4 class="font-bold text-gray-900">{{ supplier.company_name }}</h4>
                    <p class="text-sm text-gray-500">{{ supplier.contact_person }} - {{ supplier.phone }}</p>
                  </div>
                  <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full border border-green-200">ACTIVE</span>
                </li>
              </ul>
            </CardContent>
          </Card>

          <!-- Pending Invitations -->
          <Card class="shadow-md border-0 bg-white/50 backdrop-blur-xl">
            <CardHeader>
              <CardTitle class="flex items-center gap-2 text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                Pending Invitations
              </CardTitle>
            </CardHeader>
            <CardContent>
              <div v-if="invitations.length === 0" class="text-gray-500 italic text-center py-4">
                No pending invitations.
              </div>
              <ul v-else class="space-y-3">
                <li v-for="inv in invitations" :key="inv.id" class="p-4 bg-white rounded-xl shadow-sm border border-gray-100 flex justify-between items-center">
                  <div>
                    <h4 class="font-medium text-gray-800">{{ inv.invited_email }}</h4>
                    <p class="text-xs text-gray-400 mt-1">Sent {{ new Date(inv.created_at).toLocaleDateString() }}</p>
                  </div>
                  <div class="flex flex-col items-end gap-2">
                    <span class="px-2 py-1 bg-amber-100 text-amber-800 text-[10px] font-bold rounded-md">PENDING</span>
                    <a :href="`/supplier/register?token=${inv.token}`" target="_blank" class="text-[11px] font-medium text-indigo-500 hover:text-indigo-700 underline decoration-indigo-300 decoration-wavy underline-offset-2">Simulation Link</a>
                  </div>
                </li>
              </ul>
            </CardContent>
          </Card>
        </div>

      </div>
    </div>
  </AppLayout>
</template>
