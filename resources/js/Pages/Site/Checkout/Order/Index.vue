<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { Icon } from "@iconify/vue";
import CheckoutLayout from "@/Layouts/CheckoutLayout.vue";
</script>

<template>

  <Head title="Carrinho" />
  <CheckoutLayout>
    <section class="container mx-auto pt-4 flex flex-row gap-4 w-full">
      <div class="w-8/12 flex flex-col gap-4">
        <div class="flex justify-between items-center rounded-md bg-white p-2">
          <div class="flex items-center gap-2">
            <img
              class="h-28 w-28 object-cover rounded-md border  shadow-md"
              src="https://rewert.cdn.magazord.com.br/img/2023/09/produto/4447/camiseta-masculina-manga-curta-basica-premium-lisa-preta-sem-logo.png?ims=600x900"
              alt=""
            >
            <div class="">
              <p class="font-medium">Camiseta gola alto</p>
              <p class="text-sm text-gray-600">Camiseta/Adulto</p>
            </div>
          </div>
          <div class="flex shadow gap-1 px-1">
            <button class="hover:bg-gray-200">
              <Icon icon="ri:subtract-fill" />
            </button>
            <span>2</span>
            <button class="hover:bg-gray-200">
              <Icon icon="material-symbols:add" />
            </button>
          </div>
          <p>R$ 25,00</p>
          <button>
            <Icon
              class="text-2xl"
              icon="flowbite:trash-bin-outline"
            />
          </button>
        </div>
      </div>
      <div class="shadow w-4/12 p-2 rounded-md flex flex-col gap-3 bg-white">
        <h2 class="text-2xl font-medium">
          Resumo
        </h2>
        <input
          class="w-full rounded-md"
          placeholder="Cupom de desconto"
          type="text"
        >
        <div class="flex justify-between text-sm">
          <p>Produtos</p>
          <p>R$ 1500,00</p>
        </div>
        <div class="flex justify-between text-sm">
          <p>Desconto</p>
          <p>-R$ 1500,00</p>
        </div>
        <div class="flex justify-between text-sm">
          <p>Frete</p>
          <p>R$ 10,00</p>
        </div>
        <div class="flex justify-between text-sm">
          <p class="font-semibold">Total</p>
          <p>R$ 10,00</p>
        </div>
        <button class="p-3 bg-black text-white rounded-md mt-10">Finalizar compra</button>
      </div>
    </section>
  </CheckoutLayout>

</template>
