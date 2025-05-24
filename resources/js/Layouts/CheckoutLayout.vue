<script setup>
import { Head, Link } from "@inertiajs/vue3";
import SiteLayout from "@/Layouts/SiteLayout.vue";
</script>

<template>
  <SiteLayout>
    <section class="container mx-auto pt-6">
      <h1 class="text-3xl font-medium">Checkout</h1>
      <p>Chagas / produtos / frete / pagamento</p>
    </section>
    <slot />
  </SiteLayout>
</template>