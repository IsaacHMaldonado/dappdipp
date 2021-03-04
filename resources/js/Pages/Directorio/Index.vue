<template>
    <backend-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Listado de enlaces registrados
            </h2>
        </template>
        <div class="py-12">
            <div class="bg-white rounded shadow overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <tr class="text-left font-bold">
                                <th class="px-6 pt-6 pb-4">Ramo</th>
                                <th class="px-6 pt-6 pb-4">Unidad</th>
                                <th class="px-6 pt-6 pb-4">Nombre</th>
                                <th class="px-6 pt-6 pb-4">Cargo</th>
                                <th class="px-6 pt-6 pb-4">Domicilio</th>
                                <th class="px-6 pt-6 pb-4">Teléfono</th>
                                <th class="px-6 pt-6 pb-4">Celular</th>
                                <th class="px-6 pt-6 pb-4">Correo</th>
                                <th class="px-6 pt-6 pb-4">Tema General</th>
                                <th class="px-6 pt-6 pb-4">Tema Especifico</th>
                            </tr>
                            <DirectRegister
                                v-for="registroDirect in directorio.data"
                                :key="registroDirect.id"
                                :registroDirect="registroDirect"
                            />
                        </table>
                    </div>
        </div>
        <pagination :links="$page.props.directorio.links" />
    </backend-layout>
</template>

<script>
    import BackendLayout from '@/Layouts/BackendLayout'

    import debounce from "lodash/debounce";
    import pickBy from "lodash/pickBy";
    import mapValues from "lodash/mapValues";
    import Pagination from '../../Components/Pagination';
    import DirectRegister from '../../Components/DirectRegister';
    export default {
        components: {DirectRegister,BackendLayout,mapValues,pickBy,debounce,Pagination},
        props: {
            directorio: Object,
            filters: Object,
        },
        data() {
            return {
                form: {
                    search: this.filters.search,
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
