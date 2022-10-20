<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Employees" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add New Employee
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <PrimaryButton class="ml-4 mt-4">
                        <Link>Submit</Link>
                    </PrimaryButton>
                    <div class="flex p-6 bg-white border-b justify-center items-center border-gray-200">

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>