<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>

  <article class="col-span-6 md:col-span-3 hover:-translate-y-2 duration-300">
    <Link
      href=""
      class="flex flex-col gap-1 h-full "
    >
    <img
      class="h-40 md:h-52 w-full object-cover rounded-xl border border-red-500"
      src="https://rewert.cdn.magazord.com.br/img/2023/09/produto/4447/camiseta-masculina-manga-curta-basica-premium-lisa-preta-sem-logo.png?ims=600x900"
      alt=""
    >
    <div class="flex flex-row justify-between">
      <p class="text-sm font-semibold">Camiseta maneira</p>
      <p class="text-sm font-semibold text-nowrap">R$ 50,00</p>
    </div>
    </Link>
  </article>

</template>