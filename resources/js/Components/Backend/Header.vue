<template>

    <header class="flex justify-between items-center py-4 px-6 bg-SSAred-400 border-b-4 border-SSAgold-100">

        <div class="flex items-center">
        </div>

        <div class="flex items-center">
            <div class="hidden sm:flex sm:items-center sm:ml-2">
                <div class="ml-1 relative">
                    <button class="flex mx-0 text-SSAgold-100 focus:outline-none">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-2">
                <div class="ml-1 relative">
                    <jet-dropdown align="right" width="60">
                        <template #trigger>
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-SSAgold-100 bg-SSAred-400 hover:bg-white hover:text-SSAred-400 focus:outline-none focus:bg-gray-50 active:bg-white active:text-SSAgreen-300 transition ease-in-out duration-150">
                                    {{ $page.props.user.name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-SSAgold-100 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs font-semibold text-SSAred-500">
                                Administrar Cuenta
                            </div>

                            <jet-dropdown-link :href="route('profile.show')">
                                Perfíl
                            </jet-dropdown-link>

                            <jet-dropdown-link href="#">
                                Otra Opción
                            </jet-dropdown-link>

                            <div class="border-t border-SSAgold-300"></div>

                            <!-- Authentication -->
                            <form @submit.prevent="logout">
                                <jet-dropdown-link as="button">
                                    Salir
                                </jet-dropdown-link>
                            </form>
                        </template>
                    </jet-dropdown>
                </div>
            </div>
        </div>
    </header>
</template>

<script>

    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'

    export default {
        components: {
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
        },
        name: "BackendHeader",
        data() {
            return {
                dropdownOpen: false,
            }
        },
        methods: {
            logout() {
                axios.post('/logout').then(response => {
                    window.location = '/login';
                })
            },
        }
    };
</script>

