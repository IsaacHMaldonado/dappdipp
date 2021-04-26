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
                    @submit="submit" @submit.prevent="$emit('submit')" :form="form"
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
                                 track-by="ramo_general"
                                 v-model="selectedRamo"
                                 id="selectedRamo"
                                 @select="AsignarUnidad($event)"
                                 placeholder="Seleccionar Ramo"/>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" v-show="viewSelectUnidad">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2"  for="selectedUnidad">
                                Unidad Responsable
                            </label>
                            <multiselect
                                :options="selectUnidad"
                                :custom-label="nameWithUnidad"
                                track-by="id"
                                v-model="selectedUnidad"
                                id="selectedUnidad"
                                @select="AsignarIdUnidad($event)"
                                placeholder="Seleccionar Unidad"/>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="tituloAcademico">
                                Titulo académico
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" v-model="tituloAcademico" id="tituloAcademico" type="text" placeholder="titulo Academico">
                        </div>
                        <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="NombreCompleto">
                                Nombre completo
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" v-model="NombreCompleto" id="NombreCompleto" type="text" placeholder="Ingresa el nombre completo">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="Cargo">
                                Cargo
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" v-model="Cargo" id="Cargo" type="text" placeholder="Cargo">
                        </div>
                        <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="Direccion">
                                Dirección
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" v-model="Direccion" id="Direccion" type="text" placeholder="Ingresa Dirección Física">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="TelefonoLocal">
                                Teléfono Local (extensión)
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" v-model="TelefonoLocal" id="TelefonoLocal" type="text" placeholder="Ingresa Teléfono Local">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="TelefonoCelular">
                                Celular
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" v-model="TelefonoCelular" id="TelefonoCelular" type="text" placeholder="Ingresa Teléfono Celular">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="Email">
                                E-mail
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" v-model="Email" id="Email" type="text" placeholder="Ingresa Email">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="selectedTemaGeneral">
                                Tema General
                            </label>
                            <multiselect
                                :options="selectTemaGeneral"
                                :custom-label="nameWithTemaGeneral"
                                track-by="id"
                                v-model="selectedTemaGeneral"
                                id="selectedTemaGeneral"
                                @select="AsignarTemaGeneral($event)"
                                placeholder="Seleccionar Tema General"
                            />

                        </div>
                        <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                            <TextAreaInput
                                label="Tema Especifico"
                                v-model="TemaEspecifico"
                                :rows="3"
                                :error="errors.TemaEspecifico"

                            />
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
import TextAreaInput from "@/Components/TextAreaInput";

export default {
    name: 'createEnlace',
    components:{BackendLayout,LoadingButton,Multiselect,TextAreaInput},
    props: {
        errors: Object,
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
            selectedRamo:null,
            selectedUnidad: null,
            selectedTemaGeneral: null,
            viewSelectUnidad: false,
            tituloAcademico:'',
            NombreCompleto:'',
            Cargo:'',
            Direccion:'',
            TelefonoLocal:'',
            TelefonoCelular:'',
            Email:'',
            TemaEspecifico:'',



            form: {
                Ramo:'',
                Unidad:'',
                TemaG:'',
                academico:'',
                NombreC:'',
                CargoAdm:'',
                DirectFis:'',
                TelPrin:'',
                TeleSec:'',
                correo:'',
                Tespecifico:'',



            }
        }
    },
    methods: {
            submit() {


                this.form.Ramo=this.selectedRamo.ramo_general
                this.form.Unidad=this.selectedUnidad.id
                this.form.TemaG=this.selectedTemaGeneral.id
            },
            AsignarUnidad($event){
                    console.log($event.ramo_general)
                    this.viewSelectUnidad=true,
                    this.selectedUnidad=''
                    let search=btoa($event.ramo_general)
                    this.$inertia.get('/directorio/create', {search},{
                        preserveState: true,
                        preserveScroll: true,
                        replace: true,

                    })
            },
            AsignarIdUnidad($event){
                console.log($event.id)

                    this.selectedUnidad=$event.id
            },
            AsignarTemaGeneral($event){
                console.log($event.id)
                this.selectedTemaGeneral=$event.id
            },
            nameWithRamo ({ ramo_general, descripcion }) {
                return `${ramo_general} - ${descripcion}`
            },
            nameWithUnidad ({ unidad, Descripcion }) {
                return `${unidad} - ${Descripcion}`
            },
            nameWithTemaGeneral ({ id, desc_tema }) {
                return `${id} - ${desc_tema}`
            }

        },
    watch: {
    },
}
</script>
