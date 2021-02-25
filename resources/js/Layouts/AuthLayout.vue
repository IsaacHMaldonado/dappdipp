<template>
    <div>
        <backend-LogoApp />
    </div>
    <div>
        <main class="bg-SSAgreen-500  max-w-lg mx-auto p-8 md:p-12 my-4 rounded-lg shadow-2xl">

            <flash-messages />

            <slot name="toolbar" />

            <section class="mt-4">
                <slot />
            </section>
        </main>

        <div class="max-w-lg mx-auto text-center mt-12 mb-6">
            <slot name="footer" />
        </div>
    </div>
</template>

<script>
    import FlashMessages from "../Components/UI/FlashMessages";
    import BackendLogoApp from "../Components/Backend/BackendLogoApp"
    export default {
        name: "AuthLayout",
        components: {FlashMessages, BackendLogoApp},
    }
</script>
