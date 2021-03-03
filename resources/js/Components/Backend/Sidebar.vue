<template>

    <section>
        <div class="flex h-screen">
            <nav class="w-64 flex-shrink-0">
                <div class="flex-auto bg-SSAgreen-500 h-full">
                    <div class="flex flex-col overflow-y-auto">
                        <!-- Logotipo de app -->
                        <div class="text-2xl p-4 w-full flex relative shadow-sm justify-start bg-SSAgreen-500 border-r-1 border-b-1 border-SSAgold-100">
                            <inertia-link
                                href="/dashboard"
                            >
                            <div class="flex items-center h-10 w-10">
                                    <img src="/img/Logo_DAPP.png" alt="Logotipo DAPP" />

                                <span class="text-SSAgold-100 text-2xl mx-2 font-semibold">DAPP</span>
                            </div>
                            </inertia-link>
                        </div>
                        <!-- Menú -->
                        <inertia-link
                            class="text-white mt-4 p-4 w-full flex relative justify-start border-l-4 border-SSAgold-100 hover:text-SSAgold-100"
                            :class="[$page.url === '/dashboard' ? activeClass : inactiveClass]"
                            href="/dashboard"
                        >
                            <div class="mr-1 flex-shrink-0 my-auto">

                                <svg class="fill-current w-5 h-5" aria-hidden="true" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                </svg>
                            </div>
                            <div class="flex-auto my-1">
                                <span class="mx-4">Directorio</span>
                            </div>
                        </inertia-link>
                    </div>
                    <div class="flex-auto bg-SSAgreen-500 h-full">
                                <jet-dropdown>
                                    <template #trigger>
                                            <div class="text-white mt-4 p-4 w-full flex relative justify-start border-l-4 border-SSAgold-100">
                                                <button class="w-full inline-flex border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-SSAgold-100 focus:outline-none transition ease-in-out duration-150">
                                                    <div class="mr-1 flex-shrink-0 my-auto">
                                                        <div class="mr-1 flex-shrink-0 my-auto">
                                                            <svg class="fill-current w-5 h-5" aria-hidden="true" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div class="my-1">
                                                        <span class="mx-4">Documentación</span>
                                                    </div>
                                                </button>
                                            </div>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs font-semibold text-SSAred-500">
                                            Gestión de Documentación
                                        </div>

                                        <jet-dropdown-link :href="route('profile.show')">
                                            Oficios
                                        </jet-dropdown-link>
                                        <jet-dropdown-link :href="route('profile.show')">
                                            Atentas notas
                                        </jet-dropdown-link>

                                        <jet-dropdown-link :href="route('api-tokens.index')">
                                            Circulares
                                        </jet-dropdown-link>
                                    </template>
                                </jet-dropdown>
                            </div>
                </div>
            </nav>
        </div>
    </section>

    <!--<section>
        <div
            class="h-screen fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-SSAgreen-500 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0"
        >
            <div class="flex items-center ml-5 justify-left mt-8">
                <inertia-link
                    href="/dashboard"
                >
                <div class="flex items-center h-10 w-10">
                        <img src="/img/Logo_DAPP.png" alt="Logotipo DAPP" />

                    <span class="text-SSAgold-100 text-2xl mx-2 stroke- font-semibold">DAPP</span>
                </div>
                </inertia-link>
            </div>

            <nav class="mt-10">
                <inertia-link
                    class="flex items-center  border-SSAgold-100  mt-4 py-2 px-6 border-l-4"
                    :class="[$page.url === '/dashboard' ? activeClass : inactiveClass]"
                    href="/dashboard"
                >
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 10C2 5.58172 5.58172 2 10 2V10H18C18 14.4183 14.4183 18 10 18C5.58172 18 2 14.4183 2 10Z"
                            fill="currentColor"
                        />
                        <path
                            d="M12 2.25195C14.8113 2.97552 17.0245 5.18877 17.748 8.00004H12V2.25195Z"
                            fill="currentColor"
                        />
                    </svg>
                    <span class="mx-4">Directorio</span>
                </inertia-link>
                <inertia-link
                    class="flex items-center mt-4 py-2 border-SSAgold-100 px-6 border-l-4"
                    :class="[$page.url === '/directory' ? activeClass : inactiveClass]"
                    href="/directory"
                >
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 10C2 5.58172 5.58172 2 10 2V10H18C18 14.4183 14.4183 18 10 18C5.58172 18 2 14.4183 2 10Z"
                            fill="currentColor"
                        />
                        <path
                            d="M12 2.25195C14.8113 2.97552 17.0245 5.18877 17.748 8.00004H12V2.25195Z"
                            fill="currentColor"
                        />
                    </svg>
                    <span class="mx-4">Pendientes</span>
                </inertia-link>
                <inertia-link
                    class="flex items-center border-SSAgold-100 mt-4 py-2 px-6 border-l-4"
                    :class="[$page.url === '/pendientes' ? activeClass : inactiveClass]"
                    href="/pendientes"
                >
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 10C2 5.58172 5.58172 2 10 2V10H18C18 14.4183 14.4183 18 10 18C5.58172 18 2 14.4183 2 10Z"
                            fill="currentColor"
                        />
                        <path
                            d="M12 2.25195C14.8113 2.97552 17.0245 5.18877 17.748 8.00004H12V2.25195Z"
                            fill="currentColor"
                        />
                    </svg>
                    <span class="mx-4">Gestion de Oficios</span>
                </inertia-link>
            </nav>
        </div>
    </section>-->
</template>

<script>

    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    export default {
        name: "BackendSidebar",
        components: {JetDropdown, JetDropdownLink},
        data() {
            return {
                activeClass: "bg-gray-600 bg-opacity-25 text-gray-100 border-gray-100",
                inactiveClass: "border-gray-900 text-gray-500 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100"
            }
        }
    };
</script>
