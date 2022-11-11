<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    name: '',
    email: '',
    logo: null,
    website: ''
});

const submit = () => {
    form.post(route('companies.store'), {
        onFinish: () => form.reset(),
    });
}

const onChange = (e) => {
  form.logo = e.target.files[0];
}
</script>

<template>
    <Head title="Companies" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add New Company
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="ml-4">
                        <div class="mt-4">
                            <InputLabel for="name" value="Name*" />
                            <TextInput id="name" class="mt-1 p-2" v-model="form.name" required autofocus />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div class="mt-4">
                            <InputLabel for="email" value="Email" />
                            <TextInput id="email" class="mt-1 p-2" v-model="form.email" required autofocus />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
                        <div class="mt-4">
                            <InputLabel for="logo" value="Logo" />
                            <input id="logo" class="mt-2" type="file" accept="image/*" v-on:change="onChange" required autofocus />
                            <InputError class="mt-2" :message="form.errors.logo" />
                        </div>
                        <div class="mt-4">
                            <InputLabel for="website" value="Website" />
                            <TextInput id="website" class="mt-1 p-2" v-model="form.website"  autofocus />
                            <InputError class="mt-2" :message="form.errors.website" />
                        </div>
                        <div class="my-4">
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