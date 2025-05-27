<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { Icon } from "@iconify/vue";
import CheckoutLayout from "@/Layouts/CheckoutLayout.vue";
import Summary from "@/Pages/Site/Checkout/Summary.vue";
</script>

<template>

  <Head title="Checkout - Endereço" />
  <CheckoutLayout>

    <section class="container mx-auto pt-4 flex flex-row gap-4 w-full">
      <div class="w-8/12 ">
        <div class="grid grid-cols-12 gap-4 bg-white p-2 rounded-md">
          <div class="col-span-4 input-default">
            <label for="postal_code">CEP</label>
            <input
              id="postal_code"
              type="text"
              class="w-full"
              placeholder="Código postal"
            >
          </div>
          <div class="col-span-6 input-default">
            <label for="street">Rua</label>
            <input
              id="street"
              type="text"
              class="w-full"
              placeholder="Rua"
            >
          </div>
          <div class="col-span-2 input-default">
            <label for="number">Nº</label>
            <input
              id="number"
              type="text"
              class="w-full"
              placeholder="Ex: 0"
            >
          </div>
          <div class="col-span-3 input-default">
            <label for="complement">Complemento</label>
            <input
              id="complement"
              type="text"
              class="w-full"
              placeholder="Ex: AP 10"
            >
          </div>
          <div class="col-span-5 input-default">
            <label for="city">Cidade</label>
            <input
              id="city"
              type="text"
              class="w-full"
              placeholder="Ex: São paulo"
            >
          </div>
          <div class="col-span-4 input-default">
            <label for="state">Estado</label>
            <input
              id="state"
              type="text"
              class="w-full"
              placeholder="Ex: SP"
            >
          </div>
          <button class="col-span-12 bg-black text-white w-full h-min p-2 rounded-md">Calcular Frete</button>
        </div>
      </div>
      <Summary></Summary>
    </section>
  </CheckoutLayout>

</template>
