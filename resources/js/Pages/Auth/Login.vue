<template>
    <AuthLayout>
        <div class="flex flex-col space-y-2 text-center">
            <h1
                class="text-2xl leading-tight font-bold tracking-tight text-zinc-900 dark:text-white"
            >
                Welcome back
            </h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">
                Enter your details to access your dashboard
            </p>
        </div>

        <form class="space-y-5" @submit.prevent="submit">
            <!-- Email -->
            <div>
                <label
                    for="email"
                    class="mb-1.5 block text-sm font-medium text-zinc-900 dark:text-zinc-200"
                >
                    Email Address
                </label>
                <input
                    type="email"
                    id="email"
                    v-model="form.email"
                    autocomplete="email"
                    :class="[
                        'block w-full rounded-lg border p-2.5 text-sm transition-colors',
                        'bg-white dark:bg-zinc-800/50',
                        'text-zinc-900 dark:text-white',
                        'placeholder-zinc-400 dark:placeholder-zinc-500',
                        'focus:ring-primary-500/30 focus:border-primary-500 focus:ring-2 focus:outline-none',
                        form.errors.email
                            ? 'border-red-400 dark:border-red-500'
                            : 'border-zinc-200 dark:border-zinc-700',
                    ]"
                    placeholder="name@example.com"
                    required
                />
                <p v-if="form.errors.email" class="mt-1.5 text-xs font-medium text-red-500">
                    {{ form.errors.email }}
                </p>
            </div>

            <!-- Password -->
            <div>
                <div class="mb-1.5 flex items-center justify-between">
                    <label
                        for="password"
                        class="text-sm font-medium text-zinc-900 dark:text-zinc-200"
                    >
                        Password
                    </label>
                    <Link
                        href="/forgot-password"
                        class="text-primary-600 hover:text-primary-700 dark:text-primary-500 dark:hover:text-primary-400 text-sm font-medium transition-colors hover:underline"
                    >
                        Forgot password?
                    </Link>
                </div>

                <div class="relative">
                    <input
                        :type="showPassword ? 'text' : 'password'"
                        id="password"
                        v-model="form.password"
                        autocomplete="current-password"
                        :class="[
                            'block w-full rounded-lg border p-2.5 pr-10 text-sm transition-colors',
                            'bg-white dark:bg-zinc-800/50',
                            'text-zinc-900 dark:text-white',
                            'placeholder-zinc-400 dark:placeholder-zinc-500',
                            'focus:ring-primary-500/30 focus:border-primary-500 focus:ring-2 focus:outline-none',
                            form.errors.password
                                ? 'border-red-400 dark:border-red-500'
                                : 'border-zinc-200 dark:border-zinc-700',
                        ]"
                        placeholder="••••••••"
                        required
                    />
                    <button
                        type="button"
                        @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 flex cursor-pointer items-center pr-3 text-zinc-400 transition-colors hover:text-zinc-600 dark:hover:text-zinc-300"
                        tabindex="-1"
                    >
                        <svg
                            v-if="showPassword"
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"
                            />
                        </svg>
                        <svg
                            v-else
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                            />
                        </svg>
                    </button>
                </div>
                <p v-if="form.errors.password" class="mt-1.5 text-xs font-medium text-red-500">
                    {{ form.errors.password }}
                </p>
            </div>

            <!-- Remember me -->
            <div class="flex items-start">
                <div class="flex h-5 items-center">
                    <input
                        id="remember"
                        type="checkbox"
                        v-model="form.remember"
                        class="text-primary-600 focus:ring-primary-500/30 h-4 w-4 cursor-pointer rounded border-zinc-300 bg-zinc-50 focus:ring-2 dark:border-zinc-600 dark:bg-zinc-800"
                    />
                </div>
                <div class="ml-2.5 text-sm">
                    <label
                        for="remember"
                        class="cursor-pointer font-medium text-zinc-600 select-none dark:text-zinc-300"
                    >
                        Remember me for 30 days
                    </label>
                    <p class="text-xs text-zinc-400 dark:text-zinc-500">
                        Don't check this on public computers.
                    </p>
                </div>
            </div>

            <!-- Submit -->
            <button
                type="submit"
                :disabled="form.processing"
                class="bg-primary-600 hover:bg-primary-700 focus:ring-primary-300 dark:focus:ring-primary-800 flex w-full cursor-pointer items-center justify-center gap-2 rounded-lg px-5 py-2.5 text-center text-sm font-medium text-white transition-colors focus:ring-4 focus:outline-none disabled:cursor-not-allowed disabled:opacity-60"
            >
                <svg
                    v-if="form.processing"
                    class="h-4 w-4 animate-spin"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                >
                    <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="10"
                        stroke="currentColor"
                        stroke-width="4"
                    ></circle>
                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"
                    ></path>
                </svg>
                <span>{{ form.processing ? "Signing in..." : "Sign In" }}</span>
            </button>
        </form>

        <p class="mt-6 px-4 text-center text-xs text-zinc-400 dark:text-zinc-500">
            By continuing, you agree to our
            <button
                type="button"
                @click="activeModal = 'terms'"
                class="cursor-pointer underline underline-offset-2 hover:text-zinc-600 dark:hover:text-zinc-300"
            >
                Terms
            </button>
            &
            <button
                type="button"
                @click="activeModal = 'privacy'"
                class="cursor-pointer underline underline-offset-2 hover:text-zinc-600 dark:hover:text-zinc-300"
            >
                Privacy Policy</button
            >.
        </p>

        <!-- Terms Modal -->
        <Modal :show="activeModal === 'terms'" title="Terms of Service" @close="activeModal = null">
            <p>
                <strong>User Responsibility:</strong> It is your responsibility to keep your
                dashboard access credentials completely secure. Please notify us immediately if you
                notice any unauthorized access.
            </p>
            <p>
                <strong>System Security:</strong> Sending any malicious scripts or unauthorized
                requests is strictly prohibited in order to protect the system's data management.
            </p>
            <p>
                <strong>Policy Changes:</strong> The authority reserves the right to modify or amend
                these terms and conditions at any time.
            </p>

            <template #footer>
                <button
                    type="button"
                    @click="activeModal = null"
                    class="bg-primary-600 hover:bg-primary-700 w-full cursor-pointer rounded-lg px-4 py-2.5 text-sm font-medium text-white transition-colors"
                >
                    I understand
                </button>
            </template>
        </Modal>

        <!-- Privacy Modal -->
        <Modal :show="activeModal === 'privacy'" title="Privacy Policy" @close="activeModal = null">
            <p>
                <strong>Data Collection:</strong> We store necessary cookies and IP data to monitor
                account activity, last login time, and to maintain session security.
            </p>
            <p>
                <strong>Data Sharing:</strong> We do not sell, trade, or share your personal data or
                any tracking information with third parties.
            </p>
            <p>
                <strong>Account Security:</strong> Passwords are encrypted and saved securely as
                hashes in the database, making them impossible to breach.
            </p>

            <template #footer>
                <button
                    type="button"
                    @click="activeModal = null"
                    class="bg-primary-600 hover:bg-primary-700 w-full cursor-pointer rounded-lg px-4 py-2.5 text-sm font-medium text-white transition-colors"
                >
                    I understand
                </button>
            </template>
        </Modal>
    </AuthLayout>
</template>

<script setup>
import { ref } from "vue";
import { useForm, Link } from "@inertiajs/vue3";
import AuthLayout from "@/Layouts/AuthLayout.vue";
import Modal from "@/Components/Modal.vue";

const activeModal = ref(null);

const showPassword = ref(false);

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post("/login", {
        onFinish: () => form.reset("password"),
    });
};
</script>
