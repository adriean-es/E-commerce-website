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

  <div class="min-h-screen bg-gradient-to-br from-indigo-50 to-purple-50 flex items-center justify-center p-4">
    <div class="max-w-md w-full">
      
      <div class="text-center mb-8">
        <h1 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
          Sari-Sari Connect
        </h1>
        <p class="text-gray-500 mt-2">Supplier Portal Registration</p>
      </div>

      <Card class="shadow-2xl border-0 bg-white/90 backdrop-blur-xl rounded-2xl overflow-hidden">
        <CardHeader class="bg-indigo-600 text-white p-6 text-center">
          <CardTitle class="text-xl font-bold">You've been invited!</CardTitle>
          <p class="text-indigo-100 text-sm mt-1">Register to start receiving Purchase Orders.</p>
        </CardHeader>
        
        <CardContent class="p-8">
          
          <div v-if="userExists" class="bg-amber-50 border border-amber-200 text-amber-800 p-4 rounded-lg text-sm mb-6">
            <strong>Note:</strong> We noticed an account already exists for <b>{{ email }}</b>. For this demo, please enter a password to overwrite and register as a Supplier.
          </div>

          <form @submit.prevent="submit" class="space-y-5">
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

            <Button type="submit" :disabled="form.processing" class="w-full mt-4 bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg transition-transform transform hover:scale-105 h-11 text-lg rounded-xl">
              Create Supplier Account
            </Button>
          </form>
          
        </CardContent>
      </Card>
      
    </div>
  </div>
</template>
