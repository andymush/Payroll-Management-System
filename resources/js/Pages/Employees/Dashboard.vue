<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';


let loading = false;
  let selection = 1;

  const reserve = () => {
    loading = true;
    setTimeout(() => (loading = false), 2000);
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
                                    title="Marcus Obrien"
                                    subtitle="Network Engineer"
                                >
                            </v-list-item>
                            </v-img>

                            <v-card-item class="text-center">
                                <!-- <v-card-title>                                            
                                    {{ $page.props.auth.user.first_name }} {{ $page.props.auth.user.last_name }}
                                
                                </v-card-title>

                                <v-card-subtitle class="mb-0">
                                    <span class="">Department</span>
                                    <v-icon
                                    color="error"
                                    icon="mdi-fire-circle"
                                    size="small"
                                    ></v-icon>
                                </v-card-subtitle> -->

                                <v-card-text class="text-center ">
                                    <!-- <div class="text-subtitle-1">
                                        Position : Front-end
                                    </div> -->
                                    <div>
                                        Date of the week :
                                    </div>
                                </v-card-text>
                            </v-card-item>
                            <v-divider class="mx-4 mb-1"></v-divider>

                            
                                <v-btn 
                                class="mb-4"
                                block
                                variant="flat"
                                color="success"
                                
                                >Clock-In</v-btn>

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
