<template>
<option :value="registroRamo.id">{{registroRamo.ramo_general}} - {{registroRamo.descripcion}}</option>
</template>
<script>
export default {
    name: 'obtenerRegistros',
    props: {
            registroRamo: Object,
        }
}
</script>
