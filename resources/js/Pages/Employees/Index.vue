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
                Employees List
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <PrimaryButton class="ml-4 mt-4">
                        <Link :href="route('employees.create')">Add new employee</Link>
                    </PrimaryButton>
                    <div class="flex p-6 bg-white border-b justify-center items-center border-gray-200">
                        <table class="border-collapse border table-fixed">
                            <thead>
                                <tr>
                                <th class="w-1/5 px-4 py-2">First Name</th>
                                <th class="w-1/5 px-4 py-2">Last Name</th>
                                <th class="w-1/5 px-4 py-2">Company</th>
                                <th class="w-1/5 px-4 py-2">E-mail Address</th>
                                <th class="w-1/5 px-4 py-2">Phone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="employee in employees">
                                    <td class="border px-4 py-2">{{ employee.firstname }}</td>
                                    <td class="border px-4 py-2">{{ employee.lastname }}</td>
                                    <td class="border px-4 py-2">{{ employee.company }}</td>
                                    <td class="border px-4 py-2">{{ employee.email }}</td>
                                    <td class="border px-4 py-2">{{ employee.phone }}</td>
                                </tr>
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    props: {
        employees: Array
    }
}
</script>