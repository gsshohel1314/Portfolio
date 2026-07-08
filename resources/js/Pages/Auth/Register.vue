<template>
    <div class="flex min-h-screen items-center justify-center bg-slate-100 p-6">
        <div class="w-full max-w-md rounded-xl bg-white p-8 shadow-md">
            <h2 class="text-2xl font-bold text-center text-slate-800 mb-6">Create an Account</h2>
            
            <form @submit.prevent="submit">
                <!-- Name -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700">Name</label>
                    <input type="text" v-model="form.name" class="mt-1 block w-full rounded-md border border-slate-300 p-2 shadow-sm focus:border-indigo-500 focus:outline-none" />
                    <span v-if="form.errors.name" class="text-xs text-red-500">{{ form.errors.name }}</span>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700">Email</label>
                    <input type="email" v-model="form.email" class="mt-1 block w-full rounded-md border border-slate-300 p-2 shadow-sm focus:border-indigo-500 focus:outline-none" />
                    <span v-if="form.errors.email" class="text-xs text-red-500">{{ form.errors.email }}</span>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700">Password</label>
                    <input type="password" v-model="form.password" class="mt-1 block w-full rounded-md border border-slate-300 p-2 shadow-sm focus:border-indigo-500 focus:outline-none" />
                    <span v-if="form.errors.password" class="text-xs text-red-500">{{ form.errors.password }}</span>
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-slate-700">Confirm Password</label>
                    <input type="password" v-model="form.password_confirmation" class="mt-1 block w-full rounded-md border border-slate-300 p-2 shadow-sm focus:border-indigo-500 focus:outline-none" />
                </div>

                <button type="submit" :disabled="form.processing" class="w-full rounded-md bg-indigo-600 py-2 text-white font-medium hover:bg-indigo-700 disabled:bg-indigo-400">
                    Register
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
})

const submit = () => {
    form.post('/register', {
        onFinish: () => form.reset('password', 'password_confirmation'),
    })
}
</script>