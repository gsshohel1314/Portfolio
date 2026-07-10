<template>
  <div class="flex min-h-screen items-center justify-center bg-zinc-50/50 dark:bg-zinc-950 px-4 py-8">
    
    <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:max-w-sm">
      
        <!-- Header text -->
      <div class="flex flex-col space-y-2 text-center">
        <h1 class="text-2xl font-semibold tracking-tight">
          Create an Account
        </h1>
        <p class="text-sm text-zinc-500 dark:text-zinc-400">
          Create a new account with your details
        </p>
      </div>

      <!-- Main form block -->
      <div class="grid gap-6">
        <form @submit.prevent="submit">
          <div class="grid gap-4">
            
            <!-- Name field -->
            <div class="grid gap-1.5">
              <Label for="name">Full Name</Label>
              <Input
                id="name"
                placeholder="John Doe"
                type="text"
                auto-capitalize="words"
                auto-complete="name"
                auto-correct="off"
                v-model="form.name"
                required
              />
              <span v-if="form.errors.name" class="text-xs text-red-500 font-medium">
                {{ form.errors.name }}
              </span>
            </div>
            
            <!-- Email field -->
            <div class="grid gap-1.5">
              <Label for="email">Email Address</Label>
              <Input
                id="email"
                placeholder="name@example.com"
                type="email"
                auto-capitalize="none"
                auto-complete="email"
                auto-correct="off"
                v-model="form.email"
                required
              />
              <span v-if="form.errors.email" class="text-xs text-red-500 font-medium">
                {{ form.errors.email }}
              </span>
            </div>
            
            <!-- Password field -->
            <div class="grid gap-1.5">
              <Label for="password">Password</Label>
              <Input
                id="password"
                placeholder="••••••••"
                type="password"
                auto-complete="new-password"
                v-model="form.password"
                required
              />
              <span v-if="form.errors.password" class="text-xs text-red-500 font-medium">
                {{ form.errors.password }}
              </span>
            </div>

            <!-- Confirm password field -->
            <div class="grid gap-1.5">
              <Label for="password_confirmation">Confirm Password</Label>
              <Input
                id="password_confirmation"
                placeholder="••••••••"
                type="password"
                auto-complete="new-password"
                v-model="form.password_confirmation"
                required
              />
            </div>

            <!-- Submit button -->
            <Button :disabled="form.processing" class="w-full mt-2">
              <span v-if="form.processing">Registering...</span>
              <span v-else>Register Account</span>
            </Button>

          </div>
        </form>
      </div>

      <!-- Footer -->
      <p class="px-4 text-center text-sm text-zinc-500 dark:text-zinc-400">
        Already have an account? 
        <Link href="/login" class="underline underline-offset-4 hover:text-primary font-medium text-zinc-900 dark:text-zinc-50">
          Sign In
        </Link>
      </p>

    </div>
  </div>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/vue3'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'

// Inertia Form Helper
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