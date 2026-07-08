<template>
    <div class="flex min-h-screen items-center justify-center bg-slate-100">
        <div class="rounded-xl bg-white p-8 shadow-md text-center">
            <h1 class="text-2xl font-bold text-indigo-600">Inertia 3 + Vue 3 + Tailwind 4</h1>
            <p class="mt-2 text-red-600">সাফল্যের সাথে সেটআপ সম্পন্ন হয়েছে, {{ name }}!</p>
        </div>
    </div>
</template>

<script setup>
defineProps({
    name: String
})
</script>