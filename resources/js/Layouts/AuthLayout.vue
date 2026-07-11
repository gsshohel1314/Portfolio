<template>
    <section
        class="relative mx-auto flex min-h-screen flex-col items-center justify-center bg-zinc-50 px-6 py-8 transition-colors duration-200 dark:bg-zinc-950"
    >
        <div class="absolute top-4 right-4">
            <button
                @click="toggleTheme"
                type="button"
                class="text-md inline-flex h-10 w-10 cursor-pointer items-center justify-center rounded-full text-zinc-900 transition-colors hover:bg-zinc-100 dark:text-zinc-50 dark:hover:bg-zinc-800/50"
            >
                <span v-if="theme === 'light'">🌙</span>
                <span v-else>☀️</span>
            </button>
        </div>

        <div class="w-full sm:max-w-md md:mt-0 xl:p-0">
            <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
                <slot />
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from "vue";

const theme = ref("light");

onMounted(() => {
    if (localStorage.getItem("theme") === "dark") {
        theme.value = "dark";
        document.documentElement.classList.add("dark");
    } else {
        theme.value = "light";
        document.documentElement.classList.remove("dark");
    }
});

const toggleTheme = () => {
    if (theme.value === "light") {
        document.documentElement.classList.add("dark");
        localStorage.setItem("theme", "dark");
        theme.value = "dark";
    } else {
        document.documentElement.classList.remove("dark");
        localStorage.setItem("theme", "light");
        theme.value = "light";
    }
};
</script>
