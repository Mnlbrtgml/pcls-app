<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

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
                <div class="bg-white h-[70vh] overflow-hidden flex shadow-xl sm:rounded-lg">
                    <div class="w-1/2 m-10 flex flex-col items-center justify-center">
                        <ApplicationLogo class="block h-60 w-auto" />
                        <p class="text-xl font-bold uppercase">Giving Happiness <br> Through Cleaning </p>
                        <div class="mt-10">
                            <!-- <p><span class="font-bold">Shop hours:</span> 8 AM to 6 AM</p>
                            <p><span class="font-bold">Telephone number:</span> 431 - 0768</p>
                            <p><span class="font-bold">Cellphone number:</span> 09650612196 / 09155270769</p> -->
                            <p class="text-xs"> {{ $page.props }} </p>
                        </div>
                    </div>
                    <div class="w-1/2 m-10 flex flex-col items-stretch justify-center gap-4">
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
