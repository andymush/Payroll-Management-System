<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { defineProps, ref} from 'vue';
import AddEmployeeForm from '@/components/Admin/AddEmployeeForm.vue';


</script>

<template>
    <Head title="Attendance" />

    <AdminLayout>
        

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="">
                        <AddEmployeeForm />
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>