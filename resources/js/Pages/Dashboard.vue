<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <div class="pt-12 pa-6 pb-0 ml-5 mt-2">
            <h4>
                <span class="text-2xl font-semibold">
                    Welcome {{ $page.props.auth.user.first_name }}!
                </span>
            </h4>
            <p class="text-white">
                Dashboard
            </p>

            <v-container fluid>
                            <v-row  class="pa-3">
                                <Link>
                                    <v-btn flat color="primary">
                                        <SendIcon stroke-width="1.5" size="18" class="ml-2"/> &nbsp; Create Campaign
                                    </v-btn>
                                </Link>
                            </v-row>
                            <v-row class="mt-5">
                                <v-col cols="4" lg="3" >
                                    <v-card variant="outlined">
                                        <v-card-title> here</v-card-title>
                                        <v-card-subtitle>
                                            majina tu
                                        </v-card-subtitle>
                                        <v-card-text>
                                            <div>Language: </div>
                                            <div>no 4</div>
                                        </v-card-text>
                                        <v-divider class="border-opacity-100 mt-2" color="info" :thickness="2"></v-divider>
                                        <v-card-actions class="mx-7 -2">
                                            <div class="d-flex">

                                                <v-tooltip text="View">
                                                    <template v-slot:activator="{ props }">
                                                        <Link >
                                                            <v-btn icon variant="outlined" rounded="xl" color="green" v-bind="props">
                                                                <EyeIcon/>
                                                            </v-btn>
                                                        </Link>
                                                    </template>
                                                </v-tooltip>
                                                <v-spacer class="mx-10"></v-spacer>

                                                <v-tooltip text="Delete">
                                                    <template v-slot:activator="{ props }">
                                                        <v-btn icon variant="outlined" color="red" rounded="xl"  v-bind="props">
                                                            <TrashIcon/>
                                                        </v-btn>
                                                    </template>
                                                </v-tooltip>
                                            </div>

                                        </v-card-actions>
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-container>
            
        </div>
        <div class="py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <v-card
                        class="mx-auto"
                        max-width="344"
                        :variant="variant"
                        >
                            <v-card-item>
                                <div>
                                <div class="text-overline mb-1">
                                    {{ variant }}
                                </div>
                                <div class="text-h6 mb-1">
                                    Headline
                                </div>
                                <div class="text-caption">Greyhound divisely hello coldly fonwderfully</div>
                                </div>
                            </v-card-item>

                            <v-card-actions>
                                <v-btn>
                                Button
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                        <v-card
                        class="mx-auto"
                        max-width="344"
                        :variant="variant"
                        >
                            <v-card-item>
                                <div>
                                <div class="text-overline mb-1">
                                    {{ variant }}
                                </div>
                                <div class="text-h6 mb-1">
                                    Headline
                                </div>
                                <div class="text-caption">Greyhound divisely hello coldly fonwderfully</div>
                                </div>
                            </v-card-item>

                            <v-card-actions>
                                <v-btn>
                                Button
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
