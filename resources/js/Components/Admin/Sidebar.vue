<script setup>

import { Link } from '@inertiajs/vue3';

</script>

<template>
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full  border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
                <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                    <div class="text-center">
                    
                            <Link :href="route('dashboard')" class="my-2 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                            </Link>

                            <v-divider></v-divider>
                            
                            <Link :href="route('attendance.index')" class="my-2 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <span class="flex-1 ms-3 whitespace-nowrap">All Attendance</span>
                            </Link>
                                
                            <v-divider></v-divider>


                        <v-menu open-on-hover>
                                <template v-slot:activator="{ props }">
                                    <v-btn
                                    class="my-2"
                                    color="primary"
                                    v-bind="props"
                                    block
                                    >
                                    Employees
                                    </v-btn>
                                </template>

                                <v-list>
                                    <v-list-item>
                                        <v-list-item-title>
                                            <Link :href="route('employees.add')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                                <span class="flex-1 ms-3 whitespace-nowrap">Add Employee</span>
                                            </Link>
                                        </v-list-item-title>
                                    </v-list-item>
                                    <v-list-item>                            
                                        <v-list-item-title>
                                            <Link :href="route('employees.index')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                                <span class="flex-1 ms-3 whitespace-nowrap">All Employees</span>
                                            </Link>
                                        </v-list-item-title>
                                    </v-list-item>
                                    
                                </v-list>
                        </v-menu>
                    </div>
                    
                    
                </div>
            </aside>
</template>