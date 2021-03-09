<template>
    <div class="w-full">
        <label
            :class="{ 'text-SSAred-300': error }"
            class="block text-SSAgreen-300 text-sm font-bold mb-2"
            :for="id"
        >
            {{ label }}
        </label>
        <input
            :id="id"
            v-bind="$attrs"
            :class="{ 'text-SSAwine-300': error }"
            :value="value"
            @input="$emit('input', $event.target.value)"
            class="shadow appearance-none font-semibold border rounded w-full py-2 px-3 text-SSAgreen-300 leading-tight focus:outline-none focus:shadow-outline"
        />
        <div v-if="error" class="text-SSAred-300 font-semibold text-xs">{{ error }}</div>
    </div>
</template>

<script>
    import FormInput from "../Mixins/FormInput";
    export default {
        name: "TextInput",
        mixins: [FormInput]
    }
</script>
