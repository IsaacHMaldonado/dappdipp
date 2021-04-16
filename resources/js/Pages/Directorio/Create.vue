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
                        :options="mechanics"
                        label="name"
                        track-by="ramo_general"
                        @search-change="onSearchMechanicsChange"
                        @input="onSelectedMechanic"
                        v-model="mechanic_id"
                        placeholder="Buscar Mecanico"></multiselect>

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
import Multiselect from '@vueform/multiselect';

export default {
    name: 'createEnlace',
    components:{BackendLayout,LoadingButton,Multiselect},
    props: {
        errors: Object,
        selectRamo: Object,
        mechanics:{
            type: Array,
            default: ()=>[]
        }
    },
    data() {
        return {
            form: this.$inertia.form({
                mechanic_id:'',
                consultant_id:'',
            }),
        }
    },
    methods: {
            submit() {
                this.processing = true;
                this.$inertia.post(this.route('directorio.store'), this.form)
                    .then(() => this.processing = false);
            },
            onSearchMechanicsChange(){
                console.log('onSearchMechanicsChange');
            },
            onSelectedMechanic(){
                console.log('onSelectedMechanic');
            },

        }
}
</script>
