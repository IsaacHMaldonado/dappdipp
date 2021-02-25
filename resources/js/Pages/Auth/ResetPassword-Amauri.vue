<template>
    <auth-layout>
        <template #toolbar>
            <section>
                <h3 class="text-white font-bold text-4xl">Bienvenid@</h3>
                <p class="text-white text-SSAgold-300 font-bold pt-2">Crea una nueva contraseña</p>
            </section>
        </template>

        <form
            @submit.prevent="updatePassword"
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
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label
                    class="block text-SSAred-500 text-sm font-semibold mb-2 ml-3"
                    for="password_confirmation"
                >
                    Confirmar Contraseña
                </label>
                <input
                    v-model="form.password_confirmation"
                    type="password"
                    id="password_confirmation"
                    class="bg-gray-200 border-gray-300 border-b-4 rounded w-full text-SSAgreen-300 font-semibold text-xl transition duration-500 px-8 focus:outline-none focus:border-blue-300"
                />
                <div v-if="errors.password_confirmation" class="text-SSAred-500 text-sm font-semibold">{{ errors.password_confirmation }}</div>
            </div>
            <button
                class="bg-SSAgold-300 text-SSAred-500 font-bold py-2 rounded shadow-lg hover:bg-SSAgold-100  hover:shadow-xl transition duration-200"
                type="submit"
            >
                Actualizar mi contraseña
            </button>
        </form>

        <template #footer>
            <p class="text-white">¿Ya tienes una cuenta? <inertia-link :href="route('login')" class="text-SSAgold-100 font-bold hover:underline">¡Accede!</inertia-link></p>
        </template>
    </auth-layout>
</template>

<script>
    import AuthLayout from "../../Layouts/AuthLayout";
    export default {
        name: "ResetPassword",
        components: {AuthLayout},
        props: {
            errors: Object,
        },
        data() {
            return {
                processing: false,
                form: {
                    email: null,
                    password: null,
                    password_confirmation: null,
                }
            }
        },
        methods: {
            updatePassword() {
                this.form.token = this.$page.props.request.token;
                this.$inertia.post(this.route("password.update"), this.form).then(() => {

                });
            }
        }
    }
</script>
