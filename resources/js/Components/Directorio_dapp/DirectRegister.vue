<template>
    <tr class="bg-white divide-y divide-gray-200 hover:bg-gray-100 focus-within:bg-gray-100">
        <td class="border-t whitespace-pre-wrap">

            <inertia-link
                class="px-6 py-4 flex items-center focus:text-indigo-500"
                :href="route('directorio.edit', registroDirect.id)"
            >
                <div class="flex items-center tracking-wide">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{ registroDirect.ramo }}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ registroDirect.ramoDes }}
                        </div>
                    </div>
                </div>
            </inertia-link>
        </td>
        <td class="border-t whitespace-pre-wrap">
            <inertia-link
                class="px-6 py-4 flex items-center"
                :href="route('directorio.edit', registroDirect.id)"
            >
                <div class="flex items-center tracking-wide">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{ registroDirect.cveUnidad }}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ registroDirect.unidadDes }}
                        </div>
                    </div>
                </div>
            </inertia-link>
        </td>
        <td class="border-t">
            <inertia-link
                class="px-6 py-4 flex items-center"
                :href="route('directorio.edit', registroDirect.id)"
            >

                <div class="flex items-center tracking-wide">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{ registroDirect.titulo_grado }} {{registroDirect.nombre}}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ registroDirect.cargo }}
                        </div>
                    </div>
                </div>
            </inertia-link>
        </td>
        <td class="border-t">
            <inertia-link
                class="px-6 py-4 flex items-center"
                :href="route('directorio.edit', registroDirect.id)"
            >
                <div class="flex items-center tracking-wide">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900 py-2">
                            <span class="font-bold">email:</span> <br> {{ registroDirect.email }}
                        </div>
                        <div class="text-sm font-medium text-gray-700 py-2">
                            <span class="font-bold">Teléfono Local:</span> <br> {{ registroDirect.phone_local }}
                        </div>
                        <div class="text-sm text-gray-500 py-2">
                            <span class="font-bold">Celular:</span> <br> {{ registroDirect.movile_phone }}
                        </div>
                    </div>
                </div>
            </inertia-link>
        </td>
        <td class="border-t">
            <inertia-link
                class="px-6 py-4 flex items-center"
                :href="route('directorio.edit', registroDirect.id)"
            >
                {{ registroDirect.temaDes }}
            </inertia-link>
        </td>
        <td class="border-t">
            <inertia-link
                class="px-6 py-4 flex items-center"
                :href="route('directorio.edit', registroDirect.id)"
            >
                {{ registroDirect.tema_especifico }}
            </inertia-link>
        </td>
        <td class="border-t w-px">
            <inertia-link
                class="px-4 flex items-center"
                :href="route('directorio.edit', registroDirect.id)"
            >
                <svg
                    class="block w-6 h-6 fill-gray-400"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <polygon points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707" />
                </svg>
            </inertia-link>
        </td>
    </tr>
</template>

<script>
    export default {
        name: "DirectRegister",
        props: {
            registroDirect: Object,
        }
    }
</script>
