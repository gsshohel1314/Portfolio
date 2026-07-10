<template>
<div class="flex min-h-screen items-center justify-center bg-zinc-50/50 dark:bg-zinc-950 px-4 py-8">
  <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:max-w-sm">

    <!-- Header text -->
    <div class="flex flex-col space-y-2 text-center">
      <h1 class="text-2xl font-semibold tracking-tight">
        Account Login
      </h1>
      <p class="text-sm text-zinc-500 dark:text-zinc-400">
        Enter your details to access your dashboard
      </p>
    </div>

    <!-- Main form block -->
    <div class="grid gap-6">
      <form @submit.prevent="submit">
        <div class="grid gap-4">
          
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
              auto-complete="current-password"
              v-model="form.password"
              required
            />
            <span v-if="form.errors.password" class="text-xs text-red-500 font-medium">
              {{ form.errors.password }}
            </span>
          </div>

          <!-- Remember Me and Security Warning -->
          <div class="space-y-1 my-1">
            <div class="flex items-center space-x-2">
              <input 
                type="checkbox" 
                id="remember" 
                v-model="form.remember"
                class="h-4 w-4 rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900 cursor-pointer"
              />
              <label for="remember" class="text-sm font-medium text-zinc-700 dark:text-zinc-300 select-none cursor-pointer">
                Remember me for 30 days
              </label>
            </div>
            
            <!-- Public computer warning text -->
            <p class="text-xs text-zinc-400 dark:text-zinc-500 pl-6">
              * Don't check this on public computers.
            </p>
          </div>

          <!-- Submit button -->
          <Button :disabled="form.processing" class="w-full">
            <span v-if="form.processing">Signing In...</span>
            <span v-else>Sign In with Email</span>
          </Button>

        </div>
      </form>
    </div>

    <!-- Footer or Terms and Conditions -->
    <p class="px-8 text-center text-xs text-zinc-500 dark:text-zinc-400">
      By clicking continue, you agree to our 
      
      <Dialog>
        <DialogTrigger as-child>
          <button class="underline underline-offset-4 hover:text-primary cursor-pointer font-medium bg-transparent border-0 p-0">
            Terms & Privacy Policy
          </button>
        </DialogTrigger>

        <DialogContent class=" sm:max-w-md">
          <DialogHeader>
            <DialogTitle>Terms & Privacy Policy</DialogTitle>
            <DialogDescription>
              Please read our system terms of service and privacy policy below.
            </DialogDescription>
          </DialogHeader>
          
          <div class="grid gap-6 py-4 max-h-[60vh] overflow-y-auto text-sm text-zinc-600 dark:text-zinc-400 pr-2">
            
            <div class="space-y-2">
              <h3 class="font-semibold text-zinc-900 dark:text-zinc-50 border-b pb-1">1. Terms of Service</h3>
              <p><strong>1.1 User Responsibility:</strong> It is your responsibility to keep your dashboard access credentials completely secure. Please notify us immediately if you notice any unauthorized access.</p>
              <p><strong>1.2 System Security:</strong> Sending any malicious scripts or unauthorized requests is strictly prohibited in order to protect the system's data management.</p>
              <p><strong>1.3 Policy Changes:</strong> The authority reserves the right to modify or amend these terms and conditions at any time.</p>
            </div>
            
            <div class="space-y-2">
              <h3 class="font-semibold text-zinc-900 dark:text-zinc-50 border-b pb-1">2. Privacy Policy</h3>
              <p><strong>2.1 Data Collection:</strong> We store necessary cookies and IP data to monitor account activity, last login time, and to maintain session security.</p>
              <p><strong>2.2 Data Sharing:</strong> We do not sell, trade, or share your personal data or any tracking information with third parties.</p>
              <p><strong>2.3 Account Security:</strong> Passwords are encrypted and saved securely as hashes in the database, making them impossible to breach.</p>
            </div>

          </div>
        </DialogContent>
      </Dialog>
      .
    </p>
  </div>
</div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/components/ui/dialog'

// Inertia Form Helper
const form = useForm({
  email: '',
  password: '',
  remember: false,
})

const submit = () => {
  form.post('/login', {
    onFinish: () => form.reset('password'),
  })
}
</script>