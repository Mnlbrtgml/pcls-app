<template>
    <AppLayout title="Report">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Report List
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="m-5 flex flex-col gap-2">
                        <PrimaryButton>Download Transaction List</PrimaryButton>
                        <PrimaryButton>Download Scheduled Transaction List</PrimaryButton>
                        <PrimaryButton>Download Customer List</PrimaryButton>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

</script>

<style scoped>

</style>