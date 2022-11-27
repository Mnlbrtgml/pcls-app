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
                                <PrimaryButton @click="openCreateModal">
                                    Create account
                                </PrimaryButton>
                            </div>
                            <div class="mr-5">
                                <div class="relative">
                                    <input type="text" id="floating_outlined"
                                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " />
                                    <label for="floating_outlined"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Search</label>
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
                                        Role
                                    </th>
                                    <th scope="col" class="p-6 font-bold">
                                        Email
                                    </th>
                                    <th scope="col" class="p-6 font-bold">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-3">
                                        {{ user.name }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ user.role }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ user.email }}
                                    </td>
                                    <td class="py-4 px-6 flex items-center justify-center gap-3">
                                        <button class="text-blue-500" @click="openUpdateModal(user)">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </button>

                                        <button class="text-red-500" @click="openDeleteModal(user)">
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

                <div class="w-full px-5">
                    <InputLabel for="name" value="Name" />
                    <TextInput id="name" type="text" class="w-full" v-model="createForm.name" />
                    <InputError :message="createForm.errors.name" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="role" value="Role" />
                    <TextInput id="role" type="text" class="w-full" v-model="createForm.role" />
                    <InputError :message="createForm.errors.role" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="email" value="Email" />
                    <TextInput id="email" type="email" class="w-full" v-model="createForm.email" />
                    <InputError :message="createForm.errors.email" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="password" value="Password" />
                    <TextInput id="password" type="password" class="w-full" v-model="createForm.password" />
                    <InputError :message="createForm.errors.password" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="password" value="Confirm password" />
                    <TextInput id="password" type="password" class="w-full" v-model="createForm.password" />
                    <InputError :message="createForm.errors.password" class="mt-1" />
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
                    <InputLabel for="role" value="Role" />
                    <TextInput id="role" type="text" class="w-full" v-model="updateForm.role" />
                    <InputError :message="updateForm.errors.role" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="email" value="Email" />
                    <TextInput id="email" type="email" class="w-full" v-model="updateForm.email" />
                    <InputError :message="updateForm.errors.email" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="password" value="Old password" />
                    <TextInput id="password" type="password" class="w-full" v-model="updateForm.password" />
                    <InputError :message="updateForm.errors.password" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="password" value="New password" />
                    <TextInput id="password" type="password" class="w-full" v-model="updateForm.password" />
                    <InputError :message="updateForm.errors.password" class="mt-1" />
                </div>

                <div class="w-full px-5">
                    <InputLabel for="password" value="Confirm password" />
                    <TextInput id="password" type="password" class="w-full" v-model="updateForm.password" />
                    <InputError :message="updateForm.errors.password" class="mt-1" />
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
    'users': Array,
})

const createForm = useForm({
    name: "",
    role: "",
    email: "",
    password: "",
});

const updateForm = useForm({
    name: "",
    role: "",
    email: "",
    password: "",
});

const showCreateModal = ref(false);

const openCreateModal = () => {
    createForm.reset();
    showCreateModal.value = true;
}

const onCreateSubmit = () => {
    createForm.post(route('users.store'), {
        onSuccess: () => {
            createForm.reset();
            showCreateModal.value = false;
        }
    });
};

const showUpdateModal = ref(false);

const openUpdateModal = (user) => {
    updateForm.reset();
    showUpdateModal.value = true;
    updateForm.name = user.name;
    updateForm.role = user.role;
    updateForm.email = user.email;
    updateForm.password = user.password;
}

const onUpdateSubmit = () => {
    updateForm.put(route('users.update', [user.id]), {
        onSuccess: () => {
            updateForm.reset();
            showUpdateModal.value = false;
        }
    });
};

const showDeleteModal = ref(false);

const openDeleteModal = (user) => {
    showDeleteModal.value = true;
    updateForm.name = user.name;
}

const onDeleteSubmit = (user) => {
    updateForm.post(route('users.destroy'), {
        onSuccess: () => {
            showUpdateModal.value = false;
        }
    });
};


</script>

<style scoped>

</style>