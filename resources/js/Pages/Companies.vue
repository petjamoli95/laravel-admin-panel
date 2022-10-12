<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '../../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Layouts/AuthenticatedLayout.vue';
import AuthenticatedLayout from '../../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Layouts/AuthenticatedLayout.vue';
</script>

<template>
    <Head title="Welcome" />

    <div>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Companies
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Companies
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>