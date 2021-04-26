<template>
    <div class="w-full">
        <label
            :class="{ 'text-SSAred-300': error }"
            class="block uppercase tracking-wide text-SSAwine-400 text-xs font-bold mb-2"
            :for="id"
        >
            {{ label }}
        </label>
        <textarea
            :rows="rows"
            :id="id"
            v-bind="$attrs"
            :class="{ 'text-SSAwine-300': error }"
            :value="value"
            @input="$emit('input', $event.target.value)"
            class="appearance-none block w-full bg-white text-SSAgreen-400 border border-SSAgold-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-SSAgreen-400"
        ></textarea>
        <div v-if="error" class="text-SSAred-300 font-semibold text-xs">{{ error }}</div>
    </div>
</template>

<script>
    import FormInput from "../Mixins/FormInput";
    export default {
        name: "TextAreaInput",
        mixins: [FormInput],
        props: {
            rows: Number,
        }
    }
</script>
