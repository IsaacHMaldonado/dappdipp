<template>
    <backend-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <welcome />
                </div>
            </div>
        </div>
    </backend-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
import BackendLayout from '@/Layouts/BackendLayout'

    export default {
        components: {
            AppLayout,
            Welcome,
            BackendLayout,
        },
    }
</script>
