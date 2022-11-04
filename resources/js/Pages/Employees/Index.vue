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
                                    <Link :href="route('employees.edit', employee.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="cursor-pointer ml-2 w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </Link>
                                    <Link :href="route('employees.edit', employee.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="cursor-pointer mx-2 mt-2 w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </Link>
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