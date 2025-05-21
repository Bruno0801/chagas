<script setup>
import { Head, Link } from "@inertiajs/vue3";
import SiteLayout from "@/Layouts/SiteLayout.vue";
import Product from "@/Components/Product.vue";
</script>

<template>

  <Head title="Nome do Produto" />
  <SiteLayout>
    <section class="container mx-auto flex flex-row py-8 gap-6">
      <div class="w-[510px] flex flex-col gap-4">
        <img
          class="h-[510px] object-cover rounded-md border border-red-500"
          src="https://rewert.cdn.magazord.com.br/img/2023/09/produto/4447/camiseta-masculina-manga-curta-basica-premium-lisa-preta-sem-logo.png?ims=600x900"
          alt=""
        >
        <div class=" flex flex-row gap-4 overflow-x-scroll overflow-y-hidden whitespace-nowrap w-[510px]">
          <div class="h-28 w-28">
            <img
              class="object-cover rounded-md border border-red-500 w-full h-full"
              src="https://rewert.cdn.magazord.com.br/img/2023/09/produto/4447/camiseta-masculina-manga-curta-basica-premium-lisa-preta-sem-logo.png?ims=600x900"
              alt=""
            >
          </div>

        </div>
      </div>
      <div class=""></div>
    </section>
  </SiteLayout>

</template>
