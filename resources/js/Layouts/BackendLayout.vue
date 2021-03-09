<template>
    <div class="flex h-screen bg-gray-200">
        <backend-sidebar />
        <div class="flex-1 flex flex-col overflow-hidden">
            <backend-header />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">

                <flash-messages />
                <div class="container mx-auto px-6 py-8">
                    <header class="bg-white shadow" v-if="$slots.header">
                        <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                            <slot name="header"></slot>
                        </div>
                    </header>
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>

<script>
    import BackendSidebar from "../Components/Backend/Sidebar";
    import BackendHeader from "../Components/Backend/Header";
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'

    export default {
        components: {
            BackendHeader,
            BackendSidebar,
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
        },
    }
</script>
