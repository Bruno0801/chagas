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
      <div class="w-8/12 flex flex-col gap-2">
        <h2 class="text-xl font-semibold">Endereço</h2>
        <div class="flex justify-between items-center gap-4 py-6 px-2 bg-white shadow-md rounded-md mb-4">
          <input type="checkbox">
          <p>Rua Cabo Brasilio zequin junior, 36 PQ Novo Mundo, São Paulo - SP, 02180000</p>
        </div>
        <h2 class="text-xl font-semibold">Frete</h2>
        <div class="grid grid-cols-12 gap-4">
          <div class="flex items-center justify-between gap-4 col-span-6 bg-white rounded-md shadow-md py-6 px-2">
            <input type="radio">
            <img
              class="h-8"
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6QncjwCQf7pV9FMEQ6jhlLLIir2g4C9vKCQ&s"
              alt=""
            >
            <div class="flex flex-col">
              <p class="font-bold">Jadlog</p>
              <p>R$ 4,00</p>
            </div>
          </div>
          <div class="flex items-center justify-between gap-4 col-span-6 bg-white rounded-md shadow-md py-6 px-2">
            <input type="radio">
            <img
              class="h-8"
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6QncjwCQf7pV9FMEQ6jhlLLIir2g4C9vKCQ&s"
              alt=""
            >
            <div class="flex flex-col">
              <p class="font-bold">Jadlog</p>
              <p>R$ 4,00</p>
            </div>
          </div>
        </div>
      </div>
      <Summary></Summary>
    </section>
  </CheckoutLayout>

</template>
