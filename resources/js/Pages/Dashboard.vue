<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="m-5 flex items-center justify-center gap-4">
                        <div class="bg-blue-50 w-full p-6 text-center space-y-3 rounded-lg">
                            <p>Number of Transaction Today</p>
                            <p class="text-3xl font-bold">0</p>
                        </div>
                        <div class="bg-blue-50 w-full p-6 text-center space-y-3 rounded-lg">
                            <p>Total Profit Today</p>
                            <p class="text-3xl font-bold">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
