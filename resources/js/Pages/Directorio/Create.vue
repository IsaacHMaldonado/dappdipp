<template>
    <backend-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crea un nuevo Enlace Estratégico
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <form
                    @submit.prevent="$emit('submit')"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
                >

                    <multiselect
                        :options="selectRamo"
                        :custom-label="nameWithRamo"
                        track-by="ramo_general"
                        v-model="selectedRamo"
                        @select="AsignarUnidad($event)"
                        placeholder="Buscar Ramo"></multiselect>

                    <multiselect
                        :options="selectUnidad"
                        :custom-label="nameWithUnidad"
                        track-by="id"
                        v-model="selectedUnidad"
                        placeholder="Buscar Unidad"></multiselect>

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
                    let ramo_general=$event.ramo_general
                    this.$inertia.get('/directorio/create', {ramo_general},{
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
