<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { Icon } from "@iconify/vue";
import CheckoutLayout from "@/Layouts/CheckoutLayout.vue";
import Summary from "@/Pages/Site/Checkout/Summary.vue";
</script>

<template>

  <Head title="Checkout - Frete" />
  <CheckoutLayout>

    <section class="container mx-auto pt-4 flex flex-row gap-4 w-full">
      <div class="w-8/12">
        <div class="grid grid-cols-12 gap-4 bg-white p-2 rounded-md">
          <div class="col-span-6 input-default">
            <label for="postal_code">Nome</label>
            <input
              id="name"
              type="text"
              class="w-full"
              placeholder="Nome completo"
            >
          </div>
          <div class="col-span-6 input-default">
            <label for="postal_code">Nome</label>
            <input
              id="name"
              type="text"
              class="w-full"
              placeholder="Nome completo"
            >
          </div>
          <hr class="col-span-12">
          <div class="col-span-4 flex flex-col items-center justify-center gap-4 ">
            <img
              class="h-10"
              src="https://upload.wikimedia.org/wikipedia/commons/a/a2/Logo%E2%80%94pix_powered_by_Banco_Central_%28Brazil%2C_2020%29.svg"
              alt=""
            >
            <input type="radio">
          </div>
          <div class="col-span-4 flex flex-col items-center justify-center gap-4">
            <img
              class="h-10"
              src="https://blog.br.tkelevator.com/wp-content/uploads/2023/04/boleto-logo.png"
              alt=""
            >
            <input type="radio">
          </div>
          <div class="col-span-4 flex flex-col items-center justify-center gap-4">
            <img
              class="h-10"
              src="https://cdn-icons-png.flaticon.com/512/8786/8786060.png"
              alt=""
            >
            <input type="radio">
          </div>
        </div>
      </div>
      <Summary></Summary>
    </section>
  </CheckoutLayout>

</template>
