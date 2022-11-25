<template>
    <AppLayout title="Customer">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Customer List
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <div class="flex justify-between items-center py-4 bg-white dark:bg-gray-800">
                            <div class="ml-5">
                                <PrimaryButton @click="openAddModal">
                                    Add new account
                                </PrimaryButton>
                            </div>
                            <div class="mr-5">
                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input type="text" id="table-search-users"
                                        class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search">
                                </div>
                            </div>
                        </div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase text-center bg-blue-50 dark:bg-blue-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-6 font-bold">
                                        ID
                                    </th>
                                    <th scope="col" class="p-6 font-bold">
                                        Name
                                    </th>
                                    <th scope="col" class="p-6 font-bold">
                                        Address
                                    </th>
                                    <th scope="col" class="p-6 font-bold">
                                        Number
                                    </th>
                                    <th scope="col" class="p-6 font-bold">
                                        Current Transaction
                                    </th>
                                    <th scope="col" class="p-6 font-bold">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="customer in customers" :key="customer.id"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-3 text-center">
                                        {{ customer.id }}
                                    </td>
                                    <td class="p-3">
                                        {{ customer.name }}
                                    </td>
                                    <td class="p-3 whitespace-nowrap">
                                        {{ customer.address }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ customer.number }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ customer.current_transaction }}
                                    </td>
                                    <td class="py-4 px-6 flex items-center justify-center gap-3">
                                        <button class="text-blue-500">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </button>

                                        <button class="text-red-500">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <Modal :show="showAddModal">
            <div>
                <div>
                    <form @submit.prevent="onAddSubmit" class="p-5 flex flex-col gap-3">
                        <!-- <button type="submit">submit</button> -->

                        <div class="my-5 text-xl text-center font-bold">Create new customer</div>

                        <div class="w-full px-5">
                            <InputLabel for="name" value="Name" />
                            <TextInput id="name" type="text" class="w-full" v-model="form.name" />
                            <InputError :message="form.errors.name" class="mt-1" />
                        </div>

                        <div class="w-full px-5">
                            <InputLabel for="address" value="Address" />
                            <TextInput id="address" type="text" class="w-full" v-model="form.address" />
                            <InputError :message="form.errors.address" class="mt-1" />
                        </div>

                        <div class="w-full px-5">
                            <InputLabel for="number" value="Number" />
                            <TextInput id="number" type="number" class="w-full" v-model="form.number" />
                            <InputError :message="form.errors.number" class="mt-1" />
                        </div>

                        <div class="mt-10 px-5 flex justify-end gap-3">
                            <SecondaryButton @click="showAddModal = false">Cancel</SecondaryButton>
                            <PrimaryButton type="submit">Add new customer</PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </Modal>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Modal from '@/Components/Modal.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';

defineProps({
    'customers': Array,
})

const showAddModal = ref(false);

const openAddModal = () => {
    form.reset();
    showAddModal.value = true;
}

const form = useForm({
    name: "",
    address: "",
    number: "",
    current_transaction: "",
});

const onAddSubmit = () => {
    form.post(route('customers.store'), {
        onSuccess: () => {
            form.reset();
            showAddModal.value = false;
        }
    });
};


</script>

<style scoped>

</style>