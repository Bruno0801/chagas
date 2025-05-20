<script setup>
import { Head, Link } from "@inertiajs/vue3";
import SiteLayout from "@/Layouts/SiteLayout.vue";
import Product from "@/Components/Product.vue";
</script>

<template>

  <Head title="Chagas" />
  <SiteLayout>
    <section class="container mx-auto py-8">
      <div class="rounded-2xl bg-white h-96 border border-red-500"></div>
    </section>

    <section class="container mx-auto pb-8">
      <div class="grid grid-cols-12 gap-4">
        <product></product>
        <product></product>
        <product></product>
        <product></product>
        <product></product>
        <product></product>
        <product></product>
        <product></product>
        <product></product>
        <product></product>
        <product></product>
        <product></product>
      </div>
    </section>

  </SiteLayout>

</template>
