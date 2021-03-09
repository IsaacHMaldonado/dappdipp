<template>
<div>
    <select
            :rows="rows"
            :id="id"
            v-bind="$attrs"
            :class="{ 'text-SSAwine-300': error }"
            :value="value"
            @select="$emit('select', $event.target.value)"
            class="shadow appearance-none border rounded font-semibold w-full py-2 px-3 text-SSAgreen-300 leading-tight focus:outline-none focus:shadow-outline"
        >
        <option value="">Hola</option>
    </select>
</div>
</template>
<script>
export default {
    name: 'RegisterCatRamo'
}
</script>
