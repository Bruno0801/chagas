<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import { Icon } from "@iconify/vue";
import CheckoutLayout from "@/Layouts/CheckoutLayout.vue";
import Summary from "@/Pages/Site/Checkout/Summary.vue";

const form = useForm({
  email: "",
  document: "",
  phone: "",
  name: "",
  method: "",
});

function submit() {
  form.post(route("site.checkout.payment.store"), {
    onSuccess: () => {
      // sucesso
    },
  });
}
</script>

<template>
  <Head title="Checkout - Frete" />
  <CheckoutLayout>
    <section class="container mx-auto pt-4 flex flex-row gap-4 w-full">
      <div class="w-8/12">
        <div class="grid grid-cols-12 gap-4 bg-white p-2 rounded-md">
          <div class="col-span-6 input-default">
            <label for="name">Nome</label>
            <input
              id="name"
              type="text"
              v-model="form.name"
              class="w-full"
              placeholder="Nome completo"
            />
          </div>
          <div class="col-span-6 input-default">
            <label for="document">CPF / CNPJ</label>
            <input
              id="document"
              type="tel"
              v-model="form.document"
              class="w-full"
              placeholder="Digite seu cpf ou cnpj"
            />
          </div>
          <div class="col-span-6 input-default">
            <label for="phone">Telefone / Celular</label>
            <input
              id="phone"
              type="tel"
              v-model="form.phone"
              class="w-full"
              placeholder="Digite seu telefone ou celular"
            />
          </div>
          <div class="col-span-6 input-default">
            <label for="email">E-mail</label>
            <input
              id="email"
              type="email"
              v-model="form.email"
              class="w-full"
              placeholder="Digite seu telefone ou celular"
            />
          </div>
          <hr class="col-span-12" />
          <div
            class="col-span-4 flex flex-col items-center justify-center gap-4"
          >
            <img
              class="h-10"
              src="https://upload.wikimedia.org/wikipedia/commons/a/a2/Logo%E2%80%94pix_powered_by_Banco_Central_%28Brazil%2C_2020%29.svg"
              alt=""
            />
            <input
              name="method"
              id="method"
              type="radio"
              v-model="form.method"
              value="0"
            />
          </div>
          <div
            class="col-span-4 flex flex-col items-center justify-center gap-4"
          >
            <img
              class="h-10"
              src="https://blog.br.tkelevator.com/wp-content/uploads/2023/04/boleto-logo.png"
              alt=""
            />
            <input
              name="method"
              id="method"
              type="radio"
              v-model="form.method"
              value="1"
            />
          </div>
          <div
            class="col-span-4 flex flex-col items-center justify-center gap-4"
          >
            <img
              class="h-10"
              src="https://cdn-icons-png.flaticon.com/512/8786/8786060.png"
              alt=""
            />
            <input
              name="method"
              id="method"
              type="radio"
              v-model="form.method"
              value="2"
            />
          </div>
        </div>
      </div>
      <Summary>
        <button
          @click="submit"
          class="p-3 bg-black text-white text-center rounded-md mt-10"
        >
          Ir para pagamento
        </button>
      </Summary>
    </section>
  </CheckoutLayout>
</template>
