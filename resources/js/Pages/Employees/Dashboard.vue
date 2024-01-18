<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { defineProps, ref, onMounted } from 'vue';
import axios from 'axios';

let loading = false;
let selection = 1;

const reserve = () => {
loading = true;
setTimeout(() => (loading = false), 2000);
};

// defineProps(
//     {
//         employeeDetails: Array,
//     }
// )

// const currentTime = ref(null);

const getCurrentTime = () => {
  const now = new Date();
  const hours = now.getHours().toString().padStart(2, '0');
  const minutes = now.getMinutes().toString().padStart(2, '0');
  const seconds = now.getSeconds().toString().padStart(2, '0');

  currentTime.value = `${hours}:${minutes}:${seconds}`;
};

onMounted(() => {
  getCurrentTime();
  setInterval(getCurrentTime, 1000);
});



// console.log(employeeDetails.employeeId);

// const clockIn = () => {
//     //will add a loading state
//     console.log(employeeId);
//     console.log('clock in');
//     axios.post(route('attendance.store'), {
//         employee_id: employeeId.value,
//         current_date: currentDate.value,
//         time_in: timeIn.value,
//         time_out: timeOut.value,
//     })
//     .then((response) => {
//         console.log(response);
//     })
//     .catch((error) => {
//         console.log(error);
//     });
// };

const props = defineProps(['employeeDetails']); 

const currentTime = ref('');

const clockIn = () => {
    // will add a loading state
    console.log('clock in');
    axios.post(route('attendance.store'), {
        employee_id: props.employeeDetails.employeeId,
        current_date: props.employeeDetails.currentDate,
        time_in: currentTime.value,
    })
    .then((response) => {
        console.log(response);
    })
    .catch((error) => {
        console.log(error);
    });
};


</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <v-card
                            
                            :loading="loading"
                            class="mx-auto my-12"
                            max-width="374"
                        >
                            <template v-slot:loader="{ isActive }">
                                <v-progress-linear
                                    :active="isActive"
                                    color="deep-purple"
                                    height="4"
                                    indeterminate
                                ></v-progress-linear>
                            </template>
                            <v-img
                                height="50%"
                                cover
                                src="https://cdn.vuetifyjs.com/images/cards/server-room.jpg"
                                >
                                <v-avatar
                                    color="grey"
                                    size="150"
                                    rounded="0"
                                >
                                    <v-img cover src="https://cdn.vuetifyjs.com/images/profiles/marcus.jpg"></v-img>
                                </v-avatar>
                                <v-list-item
                                    class="text-white"
                                >
                                <v-title-content>
                                    <v-list-item-title class="text-h6"> {{ $page.props.auth.user.first_name }} {{ $page.props.auth.user.last_name }}</v-list-item-title>
                                    <v-list-item-subtitle class="font-weight-bold">{{ employeeDetails.department }} </v-list-item-subtitle>
                                </v-title-content>
                            </v-list-item>
                            </v-img>

                            <v-card-item class="text-center">
                                <v-card-text class="text-center ">
                                    <!-- <div class="text-subtitle-1">
                                        Position : Front-end
                                    </div> -->
                                    <div>
                                        Date of the week 
                                        <p class="font-weight-bold text-h6"> 
                                            {{ employeeDetails.currentDate }}
                                            <br>
                                            <v-divider></v-divider>
                                            {{ currentTime }}
                                        </p>
                                    </div>
                                </v-card-text>
                            </v-card-item>
                            <v-divider class="mx-4 mb-1"></v-divider>

                                <v-form @submit.prevent="clockIn">
                                    <input type="hidden" name="employeeId" :value= employeeDetails.employeeId >
                                    <input type="hidden" name="currentDate" :value= employeeDetails.currentDate >
                                    <input type="hidden" name="timeIn" :value= currentTime >
                                
                                    <v-btn 
                                    class="mb-4"
                                    block
                                    variant="flat"
                                    color="success"
                                    type="submit"
                                    >Clock-In</v-btn>
                                </v-form>

                                <v-btn 
                                block
                                variant="outlined"
                                color="error"
                                
                                >Cancel</v-btn>
                        </v-card>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
