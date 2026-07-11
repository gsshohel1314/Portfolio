<template>
    <Teleport to="body" :disabled="!mounted">
        <Transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition ease-in duration-150"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div
                v-if="show && mounted"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4 backdrop-blur-sm"
                @click.self="close"
            >
                <Transition
                    enter-active-class="transition ease-out duration-200"
                    enter-from-class="opacity-0 scale-95"
                    enter-to-class="opacity-100 scale-100"
                    leave-active-class="transition ease-in duration-150"
                    leave-from-class="opacity-100 scale-100"
                    leave-to-class="opacity-0 scale-95"
                >
                    <div
                        v-if="show && mounted"
                        class="relative flex max-h-[90vh] w-full max-w-md flex-col rounded-lg border border-zinc-200 bg-white shadow-lg dark:border-zinc-800 dark:bg-zinc-900"
                    >
                        <!-- Header -->
                        <div
                            class="flex items-center justify-between border-b border-zinc-200 px-5 py-4 dark:border-zinc-800"
                        >
                            <h3 class="text-lg font-medium text-zinc-900 dark:text-white">
                                {{ title }}
                            </h3>
                            <button
                                type="button"
                                @click="close"
                                class="inline-flex h-8 w-8 cursor-pointer items-center justify-center rounded-lg text-zinc-400 transition-colors hover:bg-zinc-100 hover:text-zinc-900 dark:hover:bg-zinc-800 dark:hover:text-white"
                            >
                                <svg
                                    class="h-5 w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18 17.94 6M18 18 6.06 6"
                                    />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        <!-- Body -->
                        <div
                            class="space-y-4 overflow-y-auto px-5 py-4 text-sm leading-relaxed text-zinc-600 dark:text-zinc-300"
                        >
                            <slot />
                        </div>

                        <!-- Footer -->
                        <div
                            v-if="$slots.footer"
                            class="flex items-center gap-3 border-t border-zinc-200 px-5 py-4 dark:border-zinc-800"
                        >
                            <slot name="footer" />
                        </div>
                    </div>
                </Transition>
            </div>
        </Transition>
    </Teleport>
</template>

<script setup>
import { ref, onMounted } from "vue";

defineProps({
    show: { type: Boolean, default: false },
    title: { type: String, default: "" },
});

const emit = defineEmits(["close"]);

const mounted = ref(false);

onMounted(() => {
    mounted.value = true;
});

const close = () => emit("close");
</script>
