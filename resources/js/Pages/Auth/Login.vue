<template>
    <div class="flex min-h-screen items-center justify-center bg-slate-100 p-6">
        <div class="w-full max-w-md rounded-xl bg-white p-8 shadow-md">
            <h2 class="text-2xl font-bold text-center text-slate-800 mb-6">Login to Account</h2>
            
            <form @submit.prevent="submit">
                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700">Email</label>
                    <input type="email" v-model="form.email" class="mt-1 block w-full rounded-md border border-slate-300 p-2 shadow-sm focus:border-indigo-500 focus:outline-none" />
                    <span v-if="form.errors.email" class="text-xs text-red-500">{{ form.errors.email }}</span>
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-slate-700">Password</label>
                    <input type="password" v-model="form.password" class="mt-1 block w-full rounded-md border border-slate-300 p-2 shadow-sm focus:border-indigo-500 focus:outline-none" />
                    <span v-if="form.errors.password" class="text-xs text-red-500">{{ form.errors.password }}</span>
                </div>

                <button type="submit" :disabled="form.processing" class="w-full rounded-md bg-indigo-600 py-2 text-white font-medium hover:bg-indigo-700 disabled:bg-indigo-400">
                    Login
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    email: '',
    password: '',
})

const submit = () => {
    form.post('/login', {
        onFinish: () => form.reset('password'),
    })
}
</script>