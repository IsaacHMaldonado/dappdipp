<template>
    <backend-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crea un nuevo Enlace Estratégico
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <DirectorioForm :selectRamo="selectRamo" :errors="errors" :form="form" @submit="submit">
                    <template #buttons>
                        <loading-button
                            :loading="processing"
                            class="btn-indigo"
                            type="submit"
                        >
                            Dar de Alta Enlace
                        </loading-button>
                    </template>
                </DirectorioForm>
            </div>
        </div>
    </backend-layout>
</template>
<script>
import BackendLayout from '@/Layouts/BackendLayout';
import DirectorioForm from "@/Components/Directorio_dapp/enlaceForm";
import LoadingButton from "@/Components/Backend/LoadingButton";
export default {
    name: 'createEnlace',
    components:{BackendLayout,LoadingButton,DirectorioForm},
    props: {
        errors: Object,
        selectRamo: Object
    },
    data() {
        return {
            processing: false,
            form: {
                name: null,
                excerpt: null,
                content: null,
                ramo: null,
            }
        }
    },
    methods: {
            submit() {
                this.processing = true;
                this.$inertia.post(this.route('directorio.store'), this.form)
                    .then(() => this.processing = false);
            }
        }
}
</script>
