<template>
    <AppLayout title="Transact">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Transaction List
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <div class="flex justify-between items-center py-4 bg-white dark:bg-gray-800">
                            <div class="ml-5">
                                <PrimaryButton @click="openCreateModal">
                                    Create transaction
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
                                        Name
                                    </th>
                                    <th scope="col" class="p-6 font-bold">
                                        Type of clothes
                                    </th>
                                    <th scope="col" class="p-6 font-bold">
                                        Weight
                                    </th>
                                    <th scope="col" class="p-6 font-bold">
                                        Total Price
                                    </th>
                                    <th scope="col" class="p-6 font-bold">
                                        Status
                                    </th>
                                    <th scope="col" class="p-6 font-bold">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="transact in transacts" :key="transact.id"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-3">
                                        {{ transact.name }}
                                    </td>
                                    <td class="p-3 whitespace-nowrap">
                                        {{ transact.clothe_types }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ transact.weight }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ transact.total }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ transact.status }}
                                    </td>
                                    <td class="py-4 px-6 flex items-center justify-center gap-3">
                                        <button class="text-blue-500" @click="openUpdateModal(transact)">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </button>

                                        <button class="text-red-500" @click="openDeleteModal(transact)"
                                            v-if="$page.props.user.permissions.includes('delete transaction')">
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

        <Modal :show="showCreateModal">
            <form @submit.prevent="onCreateSubmit" class="p-5 flex flex-col gap-3">
                <div class="my-5 text-xl text-center font-bold uppercase">Create transaction</div>

                <div class="w-full px-5 hidden">
                    <InputLabel for="processed_by" value="Processed by" />
                    <TextInput id="processed_by" type="text" class="w-full read-only:text-gray-500"
                        v-model="createForm.processed_by" :value="$page.props.user.name" />
                    <InputError :message="createForm.errors.processed_by" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="name" value="Name" />
                    <TextInput id="name" type="text" class="w-full" v-model="createForm.name" />
                    <InputError :message="createForm.errors.name" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="clothe_types" value="Type of clothes" />
                    <TextInput id="clothe_types" type="text" class="w-full" v-model="createForm.clothe_types" />
                    <InputError :message="createForm.errors.clothe_types" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="weight" value="weight" />
                    <TextInput id="weight" type="number" class="w-full" v-model="createForm.weight" />
                    <InputError :message="createForm.errors.weight" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="total" value="Total" />
                    <TextInput id="total" type="number" class="w-full" v-model="createForm.total" />
                    <InputError :message="createForm.errors.total" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="status" value="Status" />
                    <TextInput id="status" type="text" class="w-full" v-model="createForm.status" />
                    <InputError :message="createForm.errors.status" class="mt-1" />
                </div>

                <div class="mt-10 px-5 flex justify-end gap-3">
                    <SecondaryButton @click="showCreateModal = false">Cancel</SecondaryButton>
                    <PrimaryButton type="submit">Save</PrimaryButton>
                </div>
            </form>
        </Modal>

        <Modal :show="showUpdateModal">
            <form @submit.prevent="onUpdateSubmit" class="p-5 flex flex-col gap-3">
                <div class="my-5 text-xl text-center font-bold uppercase">Update {{ updateForm.name }}'s schedule</div>

                <div class="w-full px-5">
                    <InputLabel for="name" value="Name" />
                    <TextInput id="name" type="text" class="w-full" v-model="updateForm.name" />
                    <InputError :message="updateForm.errors.name" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="clothe_types" value="Type of clothes" />
                    <TextInput id="clothe_types" type="text" class="w-full" v-model="updateForm.clothe_types" />
                    <InputError :message="updateForm.errors.clothe_types" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="weight" value="weight" />
                    <TextInput id="weight" type="number" class="w-full" v-model="updateForm.weight" />
                    <InputError :message="updateForm.errors.weight" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="total" value="Total" />
                    <TextInput id="total" type="number" class="w-full" v-model="updateForm.total" />
                    <InputError :message="updateForm.errors.total" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="status" value="Status" />
                    <TextInput id="status" type="text" class="w-full" v-model="updateForm.status" />
                    <InputError :message="updateForm.errors.status" class="mt-1" />
                </div>

                <div class="mt-10 px-5 flex justify-end gap-3">
                    <SecondaryButton @click="showUpdateModal = false">Cancel</SecondaryButton>
                    <PrimaryButton type="submit">Save</PrimaryButton>
                </div>
            </form>
        </Modal>


        <Modal :show="showDeleteModal">
            <form @submit.prevent="onDeleteSubmit" class="p-5 flex flex-col gap-3">
                <div class="mt-10 text-center flex items-center justify-center gap-3">
                    <div
                        class="mx-auto shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    Do you really want to delete {{ updateForm.name }}'s account?
                </div>
                <div class="mt-10 px-5 flex justify-end gap-3">
                    <SecondaryButton @click="showDeleteModal = false">No</SecondaryButton>
                    <PrimaryButton type="submit">Yes</PrimaryButton>
                </div>
            </form>
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
    'transacts': Array,
})

const createForm = useForm({
    processed_by: "",
    name: "",
    clothe_types: "",
    weight: "",
    total: "",
    status: "",
});

const updateForm = useForm({
    name: "",
    clothe_types: "",
    weight: "",
    total: "",
    status: "",
});

const showCreateModal = ref(false);

const openCreateModal = () => {
    createForm.reset();
    showCreateModal.value = true;
}

const onCreateSubmit = () => {
    createForm.post(route('transacts.store'), {
        onSuccess: () => {
            createForm.reset();
            showCreateModal.value = false;
        }
    });
};

const showUpdateModal = ref(false);

const openUpdateModal = (transact) => {
    updateForm.reset();
    showUpdateModal.value = true;
    updateForm.name = transact.name;
    updateForm.clothe_types = transact.clothe_types;
    updateForm.weight = transact.weight;
    updateForm.total = transact.total;
    updateForm.status = transact.status;
}

const onUpdateSubmit = () => {
    updateForm.put(route('transacts.update', [transact.id]), {
        onSuccess: () => {
            updateForm.reset();
            showUpdateModal.value = false;
        }
    });
};

const showDeleteModal = ref(false);

const openDeleteModal = (transact) => {
    showDeleteModal.value = true;
    updateForm.name = transact.name;
}

const onDeleteSubmit = (transact) => {
    updateForm.post(route('transacts.destroy'), {
        onSuccess: () => {
            showUpdateModal.value = false;
        }
    });
};




</script>

<style scoped>

</style>