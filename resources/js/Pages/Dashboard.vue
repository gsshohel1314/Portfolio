<template>
    <div class="flex min-h-screen flex-col bg-slate-50">
        <!-- Navbar -->
        <nav class="flex items-center justify-between bg-white px-8 py-4 shadow-sm">
            <h1 class="text-xl font-bold text-slate-800">My Dashboard</h1>
            <button @click="logout" class="rounded-md bg-red-500 px-4 py-2 text-sm font-medium text-white hover:bg-red-600">
                Logout
            </button>
        </nav>

        <!-- Main Content -->
        <div class="flex flex-1 items-center justify-center">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-slate-900">Welcome Back!</h2>
                <p class="mt-2 text-slate-600">{{ name }}, আপনি সফলভাবে লগইন অবস্থায় আছেন।</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'

defineProps({
    name: String
})

const logout = () => {    
    router.post('/logout')
}
</script>