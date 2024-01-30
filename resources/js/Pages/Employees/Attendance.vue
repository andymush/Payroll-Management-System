<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps, ref} from 'vue';


const props = defineProps([
    'empId',
    'employeeAttendance',
])

const items = ref(props.employeeAttendance);
</script>

<template>
    <Head title="Attendance" />

    <AuthenticatedLayout>
        

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="">
                        
                        <v-data-table :headers="headers" :items="items" class="p-6 text-gray-900 dark:text-gray-100"></v-data-table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>