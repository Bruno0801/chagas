<script setup>
import { Head, Link } from "@inertiajs/vue3";
import SiteLayout from "@/Layouts/SiteLayout.vue";
</script>

<template>
  <SiteLayout>
    <section class="container mx-auto pt-6">
      <h1 class="text-3xl font-medium">Checkout</h1>
      <p>Chagas / produtos / frete / pagamento</p>
      <p class="text-xs text-gray-800">Aqui vc vai Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni provident voluptatibus nisi error sint libero pariatur voluptatem praesentium deleniti quo optio omnis ratione.</p>
    </section>
    <slot />
  </SiteLayout>
</template>