<template>
    <auth-layout>
        <template #toolbar>
            <section>
                <h3 class="text-white font-bold text-4xl">Bienvenid@</h3>
                <p class="text-white text-SSAgold-300 font-bold pt-2">Inicia sesión en tu cuenta</p>
            </section>
        </template>

        <form
            @submit.prevent="login"
            class="flex flex-col"
        >
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label
                    class="block text-SSAred-500 text-sm font-semibold mb-2 ml-3"
                    for="email"
                >
                    Correo electrónico
                </label>
                <input
                    v-model="form.email"
                    id="email"
                    class="bg-gray-200 border-SSAgold-200 border-b-4 rounded w-full text-SSAgreen-300 font-semibold text-xl transition duration-500 px-8 focus:outline-none focus:border-SSAgreen-300"
                />
                <div v-if="errors.email" class="text-SSAred-300 font-semibold text-sm">{{ errors.email }}</div>
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label
                    class="block text-SSAred-500 text-sm font-semibold mb-2 ml-3"
                    for="password"
                >
                    Contraseña
                </label>
                <input
                    v-model="form.password"
                    type="password"
                    id="password"
                    class="bg-gray-200 border-SSAgold-200 border-b-4 rounded w-full text-SSAgreen-300 font-semibold text-xl transition duration-500 px-8 focus:outline-none focus:border-blue-300"
                />
                <div v-if="errors.password" class="text-SSAred-300 font-semibold text-sm">{{ errors.password }}</div>
            </div>

            <div class="flex justify-end">
                <inertia-link
                    :href="route('password.request')"
                    class="text-sm text-SSAgold-200 hover:text-SSAgold-400 hover:underline mb-6"
                >
                    ¿Has olvidado tu contraseña?
                </inertia-link>
            </div>
            <button
                class="bg-SSAgold-300 text-SSAred-500 font-bold py-2 rounded shadow-lg hover:bg-SSAgold-100  hover:shadow-xl transition duration-200"
                type="submit"
            >
                Iniciar sesión
            </button>
        </form>

        <template #footer>
            <p class="text-white">
                ¿No tienes una cuenta? <inertia-link :href="route('register')" class="text-SSAgold-100 font-bold hover:underline">¡Regístrate!</inertia-link>
            </p>
        </template>
    </auth-layout>
</template>

<script>
    import AuthLayout from "../../Layouts/AuthLayout";
    export default {
        name: "Login",
        components: {AuthLayout},
        props: {
            errors: Object,
        },
        data() {
            return {
                form: {
                    email: null,
                    password: null,
                }
            }
        },
        methods: {
            login() {
                this.$inertia.post(this.route("login"), this.form).then(() => {

                })
            }
        }
    }
</script>
