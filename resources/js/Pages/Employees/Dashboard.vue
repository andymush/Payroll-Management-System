<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { defineProps, ref, onMounted, onBeforeUnmount, watch} from 'vue';
import axios from 'axios';
import { reactive } from 'vue';

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

const clockedIn = ref(false);
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


const props = defineProps([
    'employeeDetails',
    'attendance',
    'attendanceId',
    'clockedOut'
]); 


const currentTime = ref('');
const timeIn = ref('');
const timeOut = ref('');

const currentAttendance = ref(props.attendance);
console.log(currentAttendance.value);
const clockIn = () => {
    // will add a loading state
    console.log('clocked in');
    clockedIn.value = false;
    axios.post(route('attendance.store'), {
        employee_id: props.employeeDetails.employeeId,
        current_date: props.employeeDetails.currentDate,
        time_in: currentTime.value,
    })
    .then((response) => {
        console.log(response.data.attendance);
        currentAttendance.value = "Present";
        console.log(response.data.attendance.time_in);
        timeIn.value = response.data.attendance.time_in;
        //hide the clock in button

    })
    .catch((error) => {
        console.log(error);
    });
};

const clockOut = () => {
    // will add a loading state
    console.log('clock out');
    axios.put(route('attendance.update', props.attendanceId), {
        time_out: currentTime.value,
    })
    .then((response) => {
        console.log(response);
        currentAttendance.value = "Clocked-Out";
        console.log(timeIn.value);
        timeOut.value = response.data.time_out;

    })
    .catch((error) => {
        console.log(error);
    });
};
console.log(currentAttendance.value);

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
                            <v-card-text class="text-center" v-if="currentAttendance == 'Clocked-Out' ">
                                <div class="text-h6 text-weight-bold">
                                    Clocked Out at : {{ clockedOut || timeOut }}
                                </div>
                            </v-card-text>  
                            <div>
                                <v-form @submit.prevent="clockIn" v-if="currentAttendance == 'Absent' || currentAttendance == 'Absent' ">
                                    <input type="hidden" name="employeeId" :value= employeeDetails.employeeId >
                                    <input type="hidden" name="currentDate" :value= employeeDetails.currentDate >
                                    <input type="hidden" name="timeIn" :value= currentTime >
                                
                                    <v-btn 
                                    class="mb-4"
                                    block
                                    variant="flat"
                                    color="success"
                                    type="submit"
                                    v-model = "clockedIn"
                                    >Clock-In</v-btn>
                                </v-form>
                            </div>
                            <div >
                                <v-form @submit.prevent="clockOut" v-if="currentAttendance == 'Present' ">
                                    <input type="hidden" name="timeOut" :value= currentTime >
                                
                                    <v-btn 
                                    class="mb-4"
                                    block
                                    variant="flat"
                                    color="warning"
                                    type="submit"
                                    >Clock-Out</v-btn>
                                </v-form>
                            </div>
                                <v-btn 
                                block
                                variant="elevated"
                                color="error"
                                >
                                <Link :href="route('logout')" method="post" as="button">
                                    LOGOUT 
                                </Link>
                            </v-btn>
                        </v-card>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
