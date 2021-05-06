<template>
    <backend-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-SSAgreen-300 leading-tight">
                Listado de Enlaces Registrados
            </h2>
        </template>
        <div class="py-12">
            <div class="p-5 mb-6 flex justify-between items-center">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <div class="relative">
                                <pagination :links="$page.props.directorio.links" />
                            </div>
                        </div>

                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Buscar
                            </label>
                            <input
                                class="appearance-none block w-full font-semibold bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                v-model="form.search"
                                type="text"
                                placeholder="Realizar busqueda"
                            />
                        </div>

                        <button
                            class="bg-SSAgold-400 hover:bg-gray-100 hover:text-SSAgold-400 border hover:border-SSAgold-400 text-white font-semibold py-3 mt-5 px-4 rounded"
                            type="button"
                            @click="reset"
                        >
                            Restablecer filtros
                        </button>

                        <inertia-link
                            class="bg-SSAred-300 hover:bg-gray-100 hover:text-SSAred-300 border hover:border-SSAred-300 text-white font-semibold py-3 mt-5 px-4 rounded"
                            :href="route('directorio.create')"
                        >
                            <span>Generar </span>
                            <span class="hidden md:inline">Nuevo enlace</span>
                        </inertia-link>
                    </div>
            <div class="bg-white rounded shadow overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200" id="tabelContactos">
                            <tr class="text-left font-bold">
                                <th class="px-6 py-3 text-left text-xs  text-gray-500 uppercase tracking-wider">Ramo</th>
                                <th class="px-6 py-3 text-left text-xs  text-gray-500 uppercase tracking-wider">Unidad</th>
                                <th class="px-6 py-3 text-left text-xs  text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs  text-gray-500 uppercase tracking-wider">Datos de Contacto</th>
                                <th class="px-6 py-3 text-left text-xs  text-gray-500 uppercase tracking-wider">Tema General</th>
                                <th class="px-6 py-3 text-left text-xs  text-gray-500 uppercase tracking-wider">Tema Especifico</th>
                            </tr>
                            <DirectRegister
                                v-for="registroDirect in directorio.data"
                                :key="registroDirect.id"
                                :registroDirect="registroDirect"
                            />
                        </table>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <div class="relative">
                                <pagination :links="$page.props.directorio.links" />
                            </div>
                        </div>
        </div>
    </backend-layout>
</template>

<script>
    import BackendLayout from '@/Layouts/BackendLayout'

    import debounce from "lodash/debounce";
    import pickBy from "lodash/pickBy";
    import mapValues from "lodash/mapValues";
    import Pagination from '../../Components/Pagination';
    import DirectRegister from '../../Components/Directorio_dapp/DirectRegister';
    export default {
        components: {DirectRegister,BackendLayout,mapValues,pickBy,debounce,Pagination},
        props: {
            directorio: Object,
            filters: Object,
        },
        data() {
            return {
                form: {
                    search: null,
                }
            }
        },
        watch: {
            form: {
                handler: debounce(function() {
                    let query = pickBy(this.form)
                    this.$inertia.replace(this.route('directorio.index', query))
                }, 500),
                deep: true,
            }
        },
        methods: {
            reset() {
                this.form = mapValues(this.form, () => null);
            }
        }
    }
</script>
