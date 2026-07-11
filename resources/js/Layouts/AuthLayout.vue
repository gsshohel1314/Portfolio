<template>
  <section class="bg-zinc-50 dark:bg-zinc-950 min-h-screen flex flex-col items-center justify-center px-6 py-8 mx-auto relative transition-colors duration-200">
      <div class="absolute top-4 right-4">
        <button 
          @click="toggleTheme" 
          type="button"
          class="inline-flex items-center justify-center w-10 h-10 rounded-full text-zinc-900 dark:text-zinc-50 text-md cursor-pointer hover:bg-zinc-100 dark:hover:bg-zinc-800/50 transition-colors"
        >
          <span v-if="theme === 'light'">🌙</span>
          <span v-else>☀️</span>
        </button>
      </div>

      <div class="w-full md:mt-0 sm:max-w-md xl:p-0">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <slot />
          </div>
      </div>
  </section>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const theme = ref('light')

onMounted(() => {
  if (localStorage.getItem('theme') === 'dark') {
    theme.value = 'dark'
    document.documentElement.classList.add('dark')
  } else {
    theme.value = 'light'
    document.documentElement.classList.remove('dark')
  }
})

const toggleTheme = () => {
  if (theme.value === 'light') {
    document.documentElement.classList.add('dark')
    localStorage.setItem('theme', 'dark')
    theme.value = 'dark'
  } else {
    document.documentElement.classList.remove('dark')
    localStorage.setItem('theme', 'light')
    theme.value = 'light'
  }
}
</script>