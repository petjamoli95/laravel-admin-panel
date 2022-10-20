<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import NavLink from '@/Components/NavLink.vue';

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
                            <div v-if="canLogin" class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <NavLink v-if="$page.props.auth.user" :href="route('dashboard')" :active="route().current('dashboard')">Dashboard</NavLink>
                                <template v-else>
                                    <NavLink :href="route('dashboard')" :active="route().current('login')">Log in</NavLink>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>