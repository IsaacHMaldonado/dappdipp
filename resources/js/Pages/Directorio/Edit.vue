<template>
    <backend-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-SSAwine-400 leading-tight">
                Crea un nuevo Enlace Estratégico
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <form
                    @submit="submit" :errors="errors" @submit.prevent="$emit('submit')" :form="form"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full w-full"
                >
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="selectedRamo">
                                Ramo Administrativo
                            </label>
                            <multiselect
                                :options="selectRamo"
                                :custom-label="nameWithRamo"
                                track-by="id"
                                v-model="form.selectedRamo"
                                id="selectedRamo"
                                @select="AsignarUnidad($event)"
                                placeholder="Seleccionar Ramo"/>
                            <div v-if="errors" class="text-SSAred-300 font-semibold text-xs">{{ errors.ramo_general }}</div>
                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" v-show="viewSelectUnidad">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2"  for="selectedUnidad">
                                Unidad Responsable
                            </label>
                            <multiselect
                                :options="selectUnidad"
                                :custom-label="nameWithUnidad"
                                track-by="id"
                                v-model="form.selectedUnidad"
                                id="selectedUnidad"
                                @select="AsignarIdUnidad($event)"
                                placeholder="Seleccionar Unidad"/>
                            <div v-if="errors" class="text-SSAred-300 font-semibold text-xs">{{ errors.unidad }}</div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="titulo_grado">
                                Titulo académico
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" v-model="form.titulo_grado" id="titulo_grado" type="text" placeholder="titulo Academico">
                            <div v-if="errors" class="text-SSAred-300 font-semibold text-xs">{{ errors.titulo_grado }}</div>
                        </div>
                        <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="nombre">
                                Nombre completo
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" v-model="form.nombre" id="nombre" type="text" placeholder="Ingresa el nombre completo">
                            <div v-if="errors" class="text-SSAred-300 font-semibold text-xs">{{ errors.nombre }}</div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="cargo">
                                Cargo
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" v-model="form.cargo" id="cargo" type="text" placeholder="Cargo">
                            <div v-if="errors" class="text-SSAred-300 font-semibold text-xs">{{ errors.cargo }}</div>
                        </div>
                        <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="direccion">
                                Dirección
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" v-model="form.direccion" id="direccion" type="text" placeholder="Ingresa Dirección Física">
                            <div v-if="errors" class="text-SSAred-300 font-semibold text-xs">{{ errors.direccion }}</div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="phone_local">
                                Teléfono Local (extensión)
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" v-model="form.phone_local" id="phone_local" type="text" placeholder="Ingresa Teléfono Local">
                            <div v-if="errors" class="text-SSAred-300 font-semibold text-xs">{{ errors.phone_local }}</div>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="movile_phone">
                                Celular
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" v-model="form.movile_phone" id="movile_phone" type="text" placeholder="Ingresa Teléfono Celular">
                            <div v-if="errors" class="text-SSAred-300 font-semibold text-xs">{{ errors.movile_phone }}</div>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="email">
                                E-mail
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" v-model="form.email" id="email" type="email" placeholder="Ingresa Email">
                            <div v-if="errors" class="text-SSAred-300 font-semibold text-xs">{{ errors.email }}</div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="tema_general">
                                Tema General
                            </label>
                            <multiselect
                                :options="selectTemaGeneral"
                                :custom-label="nameWithTemaGeneral"
                                track-by="id"
                                v-model="form.selectedTemaGeneral"
                                id="tema_general"
                                @select="AsignarTemaGeneral($event)"
                                placeholder="Seleccionar Tema General"
                            />
                            <div v-if="errors" class="text-SSAred-300 font-semibold text-xs">{{ errors.tema_general }}</div>

                        </div>
                        <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="tema_especifico">
                                Tema Especifico
                            </label>
                            <textarea
                                v-model="form.tema_especifico"
                                id="tema_especifico"
                                :rows="3"
                                class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400"
                            />
                            <div v-if="errors" class="text-SSAred-300 font-semibold text-xs">{{ errors.tema_especifico }}</div>

                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <loading-button
                                :loading="processing"
                                class="bg-SSAgreen-400 hover:bg-white text-white hover:text-SSAgreen-400 hover:border-SSAgreen-400 font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit"
                                @submit="submit"
                            >
                                Dar de Alta Enlace

                            </loading-button>

                        </div>
                    </div>






                    <div class="px-8 py-4 border-t border-gray-200 flex justify-center items-center">
                        <slot name="buttons" />
                    </div>
                </form>





            </div>
        </div>
    </backend-layout>
</template>
<script>
import BackendLayout from '@/Layouts/BackendLayout';
import LoadingButton from "@/Components/Backend/LoadingButton";
import Multiselect from '@suadelabs/vue3-multiselect';

export default {
    name: 'createEnlace',
    components:{BackendLayout,LoadingButton,Multiselect},
    props: {
        errors: Object,
        directorio: Object,
        selectRamo:{
            type: Array,
            default: ()=>[]
        },
        selectUnidad:{
            type: Array,
            default: ()=>[]
        },
        selectTemaGeneral:{
            type: Array,
            default: ()=>[]
        }

    },
    data() {
        return {
            processing: false,
            viewSelectUnidad: true,


            form: {
                selectedRamo: this.selectRamo[this.directorio.ramo_general-1],
                ramo_general:this.selectRamo[this.directorio.ramo_general-1].id,

                selectedUnidad:this.selectUnidad[this.directorio.unidad-1],
                unidad: this.selectUnidad[this.directorio.unidad-1].id,
                selectedTemaGeneral: this.selectUnidad[this.directorio.tema_general-1],
                tema_general: this.selectUnidad[this.directorio.tema_general-1].id,
                titulo_grado:this.directorio.titulo_grado,
                nombre:this.directorio.nombre,
                cargo:this.directorio.cargo,
                direccion:this.directorio.direccion,
                movile_phone:this.directorio.movile_phone,
                phone_local:this.directorio.phone_local,
                email:this.directorio.email,
                tema_especifico:this.directorio.tema_especifico,



            }
        }
    },
    methods: {
        submit() {
            this.processing = true
            this.$inertia.post(this.route('directorio.store'), this.form)
                .then(() => this.processing = false);

        },
        AsignarUnidad($event){
            console.log($event.ramo_general)
            this.viewSelectUnidad=true,
                this.form.selectedUnidad=''
            this.form.ramo_general=$event.id
            let search=btoa($event.ramo_general)
            this.$inertia.post(this.route('directorio.createTwo', search,{
                preserveState: true,
                preserveScroll: true,
                replace: true,

            }));
        },
        AsignarIdUnidad($event){
            console.log($event.id)

            this.form.unidad=$event.id
        },
        AsignarTemaGeneral($event){
            console.log($event.id)
            this.form.tema_general=$event.id
        },
        nameWithRamo ({ ramo_general, descripcion }) {
            return `${ramo_general} - ${descripcion}`
        },
        nameWithUnidad ({ unidad, Descripcion }) {
            return `${unidad} - ${Descripcion}`
        },
        nameWithTemaGeneral ({ id, desc_tema }) {
            return `${id} - ${desc_tema}`
        },
        destroy() {
            this.processing = true
            this.$inertia.delete(this.route('directorio.destroy', this.project.id))
                .then(() => this.processing = false)
        }

    },
    watch: {
    },
}
</script>
