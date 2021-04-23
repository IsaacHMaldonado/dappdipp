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
                    @submit.prevent="$emit('submit')"
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
                            <label class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2" for="grid-zip">
                                Nombre completo
                            </label>
                            <input class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400" id="grid-zip" type="text" placeholder="Ingresa el nombre completo">
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
        selectRamo:{
            type: Array,
            default: ()=>[]
        },
        selectUnidad:{
            type: Array,
            default: ()=>[]
        }
    },
    data() {
        return {
            selectedRamo:null,
            selectedUnidad: null,
            viewSelectUnidad: false,
        }
    },
    methods: {
            submit() {
                this.processing = true;
                this.$inertia.post(this.route('directorio.store'), this.form)
                    .then(() => this.processing = false);
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
            nameWithRamo ({ ramo_general, descripcion }) {
                return `${ramo_general} - ${descripcion}`
            },
            nameWithUnidad ({ unidad, Descripcion }) {
                return `${unidad} - ${Descripcion}`
            }

        },
    watch: {
    },
}
</script>
