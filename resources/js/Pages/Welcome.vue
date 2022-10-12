<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
})
</script>

<template>
    <Head title="Welcome" />

    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <div class="hidden sm:block text-2xl">Admin Panel</div>
                                </Link>
                            </div>
                            <div v-if="canLogin" class="hidden px-6 py-4 sm:block">
                                <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>
                                <template v-else>
                                    <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>