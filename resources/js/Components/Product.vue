<script setup>
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
  product: Object,
});
</script>

<template>
  <article class="col-span-6 md:col-span-3 hover:-translate-y-2 duration-300">
    <Link
      :href="route('site.product.show', product.url)"
      class="flex flex-col gap-1 h-full"
    >
      <img
        class="h-40 md:h-52 w-full object-cover rounded-xl shadow-md"
        src="/img/produto.jpg"
        alt=""
      />
      <div class="flex flex-row justify-between">
        <p class="text-sm font-semibold">{{ product.name }}</p>
        <p class="text-sm font-semibold text-nowrap">R$ {{ product.price }}</p>
      </div>
    </Link>
  </article>
</template>