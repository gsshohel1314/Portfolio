<template>
    <AuthLayout>
        <div class="flex flex-col space-y-2 text-center">
            <h1
                class="text-2xl font-bold leading-tight tracking-tight text-zinc-900 dark:text-white"
            >
                Create an account
            </h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">
                Create a new account with your details
            </p>
        </div>

        <form class="space-y-5" @submit.prevent="submit">
            <!-- Full Name -->
            <div>
                <label
                    for="name"
                    class="block mb-1.5 text-sm font-medium text-zinc-900 dark:text-zinc-200"
                >
                    Full Name
                </label>
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    autocomplete="name"
                    autocapitalize="words"
                    autocorrect="off"
                    :class="[
                        'block w-full rounded-lg border p-2.5 text-sm transition-colors',
                        'bg-white dark:bg-zinc-800/50',
                        'text-zinc-900 dark:text-white',
                        'placeholder-zinc-400 dark:placeholder-zinc-500',
                        'focus:outline-none focus:ring-2 focus:ring-primary-500/30 focus:border-primary-500',
                        form.errors.name
                            ? 'border-red-400 dark:border-red-500'
                            : 'border-zinc-200 dark:border-zinc-700',
                    ]"
                    placeholder="John Doe"
                    required
                />
                <p
                    v-if="form.errors.name"
                    class="mt-1.5 text-xs text-red-500 font-medium"
                >
                    {{ form.errors.name }}
                </p>
            </div>

            <!-- Email -->
            <div>
                <label
                    for="email"
                    class="block mb-1.5 text-sm font-medium text-zinc-900 dark:text-zinc-200"
                >
                    Email Address
                </label>
                <input
                    type="email"
                    id="email"
                    v-model="form.email"
                    autocomplete="email"
                    autocapitalize="none"
                    autocorrect="off"
                    :class="[
                        'block w-full rounded-lg border p-2.5 text-sm transition-colors',
                        'bg-white dark:bg-zinc-800/50',
                        'text-zinc-900 dark:text-white',
                        'placeholder-zinc-400 dark:placeholder-zinc-500',
                        'focus:outline-none focus:ring-2 focus:ring-primary-500/30 focus:border-primary-500',
                        form.errors.email
                            ? 'border-red-400 dark:border-red-500'
                            : 'border-zinc-200 dark:border-zinc-700',
                    ]"
                    placeholder="name@example.com"
                    required
                />
                <p
                    v-if="form.errors.email"
                    class="mt-1.5 text-xs text-red-500 font-medium"
                >
                    {{ form.errors.email }}
                </p>
            </div>

            <!-- Password -->
            <div>
                <label
                    for="password"
                    class="block mb-1.5 text-sm font-medium text-zinc-900 dark:text-zinc-200"
                >
                    Password
                </label>
                <div class="relative">
                    <input
                        :type="showPassword ? 'text' : 'password'"
                        id="password"
                        v-model="form.password"
                        autocomplete="new-password"
                        :class="[
                            'block w-full rounded-lg border p-2.5 pr-10 text-sm transition-colors',
                            'bg-white dark:bg-zinc-800/50',
                            'text-zinc-900 dark:text-white',
                            'placeholder-zinc-400 dark:placeholder-zinc-500',
                            'focus:outline-none focus:ring-2 focus:ring-primary-500/30 focus:border-primary-500',
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
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300 transition-colors cursor-pointer"
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
                <p
                    v-if="form.errors.password"
                    class="mt-1.5 text-xs text-red-500 font-medium"
                >
                    {{ form.errors.password }}
                </p>
            </div>

            <!-- Confirm Password -->
            <div>
                <label
                    for="password_confirmation"
                    class="block mb-1.5 text-sm font-medium text-zinc-900 dark:text-zinc-200"
                >
                    Confirm Password
                </label>
                <div class="relative">
                    <input
                        :type="showPasswordConfirmation ? 'text' : 'password'"
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        autocomplete="new-password"
                        :class="[
                            'block w-full rounded-lg border p-2.5 pr-10 text-sm transition-colors',
                            'bg-white dark:bg-zinc-800/50',
                            'text-zinc-900 dark:text-white',
                            'placeholder-zinc-400 dark:placeholder-zinc-500',
                            'focus:outline-none focus:ring-2 focus:ring-primary-500/30 focus:border-primary-500',
                            form.errors.password_confirmation
                                ? 'border-red-400 dark:border-red-500'
                                : 'border-zinc-200 dark:border-zinc-700',
                        ]"
                        placeholder="••••••••"
                        required
                    />
                    <button
                        type="button"
                        @click="showPasswordConfirmation = !showPasswordConfirmation"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300 transition-colors cursor-pointer"
                        tabindex="-1"
                    >
                        <svg
                            v-if="showPasswordConfirmation"
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
                <p
                    v-if="form.errors.password_confirmation"
                    class="mt-1.5 text-xs text-red-500 font-medium"
                >
                    {{ form.errors.password_confirmation }}
                </p>
            </div>

            <!-- Submit -->
            <button
                type="submit"
                :disabled="form.processing"
                class="w-full flex items-center justify-center gap-2 text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed transition-colors"
            >
                <svg
                    v-if="form.processing"
                    class="animate-spin h-4 w-4"
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
                <span>{{ form.processing ? "Creating account..." : "Register Account" }}</span>
            </button>
        </form>

        <p class="px-4 mt-6 text-center text-sm text-zinc-500 dark:text-zinc-400">
            Already have an account?
            <Link
                href="/login"
                class="font-medium text-primary-600 hover:text-primary-700 dark:text-primary-500 dark:hover:text-primary-400 hover:underline transition-colors"
            >
                Sign In
            </Link>
        </p>
    </AuthLayout>
</template>

<script setup>
import { ref } from "vue";
import { useForm, Link } from "@inertiajs/vue3";
import AuthLayout from "@/Layouts/AuthLayout.vue";

const showPassword = ref(false);
const showPasswordConfirmation = ref(false);

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post("/register", {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>