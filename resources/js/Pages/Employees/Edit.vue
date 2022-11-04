<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    firstname: '',
    lastname: '',
    company: '',
    email: '',
    phone: ''
});

const submit = () => {
    form.post(route('employees.store'), {
        onFinish: () => form.reset(),
    });
}
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
                    <form @submit.prevent="submit" class="ml-4">
                        <div class="mt-4">
                            <InputLabel for="firstname" value="First Name*" />
                            <TextInput id="firstname" class="mt-1 p-2" v-model="form.firstname" required autofocus />
                            <InputError class="mt-2" :message="form.errors.firstname" />

                        </div>
                        <div class="mt-4">
                            <InputLabel for="lastname" value="Last Name*" />
                            <TextInput id="lastname" class="mt-1 p-2" v-model="form.lastname" required autofocus />
                            <InputError class="mt-2" :message="form.errors.lastname" />

                        </div>
                        <div class="mt-4">
                            <InputLabel for="company" value="Company*" />
                            <select id="company" class="mt-1 p-2" v-model="form.company" required autofocus>
                                <option v-for="company in companies" :value="company.name">{{ company.name }}</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.company" />

                        </div>
                        <div class="mt-4">
                            <InputLabel for="email" value="Email" />
                            <TextInput id="email" class="mt-1 p-2" v-model="form.email" autofocus />
                            <InputError class="mt-2" :message="form.errors.email" />

                        </div>
                        <div class="mt-4">
                            <InputLabel for="phone" value="Phone" />
                            <TextInput id="phone" class="mt-1 p-2" v-model="form.phone" autofocus />
                            <InputError class="mt-2" :message="form.errors.phone" />

                        </div>
                        <div class="my-4 ml-4">
                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Submit
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    props: {
        companies: Array
    }
}
</script>