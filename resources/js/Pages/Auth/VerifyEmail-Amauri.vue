<template>
  <auth-layout>
      <template #toolbar>
          <section>
                <h3 class="text-white font-bold text-2xl">¡Hola!</h3>
                <p class="text-SSAgold-100 pt-2">
                    ¡Gracias por registrarte! Antes de comenzar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibió el correo electrónico, con gusto le enviaremos otro.
                </p>
            </section>
      </template>
      <form
            @submit.prevent="sendNewVerificationEmail"
            class="flex flex-col"
        >
            <button
                class="bg-SSAgold-300 text-SSAred-500 font-bold py-2 rounded shadow-lg hover:bg-SSAgold-100  hover:shadow-xl transition duration-200"
                type="submit"
            >
                Reenviar correo electrónico de verificación
            </button>
        </form>
  </auth-layout>
</template>

<script>
import AuthLayout from '../../Layouts/AuthLayout.vue'
export default {
  components: { AuthLayout },
  methods:{
      sendNewVerificationEmail(){
          this.$inertia.post(this.route('verification.send')).then(()=>{

          })
      }
  }

}
</script>

<style>

</style>
