<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link} from '@inertiajs/vue3';

defineProps({
    employees: Array,
});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="mt-7 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Employees</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-800 border-b border-gray-200">

                        <div className="flex items-center justify-between mb-6">
                            <Link
                                className="px-6 py-2 text-white bg-green-500 rounded-md focus:outline-none"
                                :href="route('employees.create')"
                            >
                                Create employee
                            </Link>
                        </div>

                        <table className="table-fixed w-full bg-gray-800">
                            <thead>
                                <tr className="bg-gray-800">
                                    <th className="px-4 py-2 w-20">No.</th>
                                    <th className="px-4 py-2">Title</th>
                                    <th className="px-4 py-2">Body</th>
                                    <th className="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="employee in employees">
                                    <td className="border px-4 py-2">{{ employee.emp_code }}</td>
                                    <td className="border px-4 py-2">{{ employee.first_name }}</td>
                                    <td className="border px-4 py-2">{{ employee.department }}</td>
                                    <td className="border px-4 py-2">
                                        <Link
                                            tabIndex="1"
                                            className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                                            :href="route('employees.edit', employee.emp_id)"
                                        >
                                            Edit
                                        </Link>

                                        <button
                                            @click="destroy(employee.emp_id)"
                                            tabIndex="-1"
                                            type="button"
                                            className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>