<template>
    <auth-layout>
        <template #toolbar>
            <section>
                <h3 class="text-white font-bold text-4xl">Bienvenid@</h3>
                <p class="text-white text-SSAgold-300 font-bold pt-2">Utiliza el formulario para recuperar tu contraseña</p>
            </section>
        </template>

        <form
            @submit.prevent="requestPasswordLink"
            class="flex flex-col"
        >
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label
                    class="block text-SSAred-500 text-sm font-semibold mb-2 ml-3"
                    for="email"
                >
                    Introduce tu correo electrónico
                </label>
                <input
                    v-model="form.email"
                    id="email"
                    class="bg-gray-200 border-SSAgold-200 border-b-4 rounded w-full text-SSAgreen-300 font-semibold text-xl transition duration-500 px-8 focus:outline-none focus:border-SSAgreen-300"
                />
                <div v-if="errors.email" class="text-SSAred-300 font-semibold text-sm">{{ errors.email }}</div>
            </div>
            <button
                class="bg-SSAgold-300 text-SSAred-500 font-bold py-2 rounded shadow-lg hover:bg-SSAgold-100  hover:shadow-xl transition duration-200"
                type="submit"
            >
                Recuperar mi contraseña
            </button>
        </form>

        <template #footer>
            <p class="text-white">¿Has recordado tu contraseña? <inertia-link :href="route('login')" class="text-SSAgold-100 font-bold hover:underline">¡Accede a tu cuenta!</inertia-link></p>
        </template>
    </auth-layout>
</template>

<script>
    import AuthLayout from "../../Layouts/AuthLayout";
    export default {
        name: "PasswordResetLink",
        components: {AuthLayout},
        props: {
            errors: Object,
        },
        data() {
            return {
                form: {
                    email: null
                }
            }
        },
        methods: {
            requestPasswordLink() {
                this.$inertia.post(this.route("password.email"), this.form).then(() => {

                })
            }
        }
    }
</script>
