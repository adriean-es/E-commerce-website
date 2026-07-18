<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import { Button } from '@/Components/ui/button';
import { Input } from '@/Components/ui/input';
import { Card, CardHeader, CardTitle, CardContent } from '@/Components/ui/card';

const props = defineProps({
  email: String,
  token: String,
  userExists: Boolean,
});

const form = useForm({
  token: props.token,
  name: '',
  company_name: '',
  password: '',
  password_confirmation: '',
});

const submit = () => {
  form.post('/supplier/register');
};
</script>

<template>
  <Head title="Supplier Registration" />

  <div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center p-4">
    <div class="mb-8 text-center">
      <h1 class="text-2xl font-bold text-gray-900">Sari-Sari Connect</h1>
      <p class="text-sm text-gray-500 mt-1">Supplier Portal Registration</p>
    </div>

    <Card class="w-full max-w-md">
      <CardHeader>
        <CardTitle class="text-lg">You've been invited!</CardTitle>
        <p class="text-sm text-gray-500">Register to start receiving Purchase Orders.</p>
      </CardHeader>
      
      <CardContent>
        <div v-if="userExists" class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-4 rounded-md text-sm mb-6">
          <strong>Note:</strong> An account already exists for <b>{{ email }}</b>. Please enter a password to overwrite and register as a Supplier.
        </div>

        <form @submit.prevent="submit" class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email (Locked)</label>
            <Input type="email" :value="email" disabled class="bg-gray-100 text-gray-500" />
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
            <Input v-model="form.name" type="text" required autofocus placeholder="Juan Dela Cruz" />
            <p v-if="form.errors.name" class="text-xs text-red-600 mt-1">{{ form.errors.name }}</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
            <Input v-model="form.company_name" type="text" required placeholder="ABC Distributors Inc." />
            <p v-if="form.errors.company_name" class="text-xs text-red-600 mt-1">{{ form.errors.company_name }}</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <Input v-model="form.password" type="password" required />
            <p v-if="form.errors.password" class="text-xs text-red-600 mt-1">{{ form.errors.password }}</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
            <Input v-model="form.password_confirmation" type="password" required />
          </div>

          <Button type="submit" :disabled="form.processing" class="w-full mt-2">
            Create Supplier Account
          </Button>
        </form>
      </CardContent>
    </Card>
  </div>
</template>
