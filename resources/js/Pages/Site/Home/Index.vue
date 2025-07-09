<script setup>
import { Head, Link } from "@inertiajs/vue3";
import SiteLayout from "@/Layouts/SiteLayout.vue";
import Product from "@/Components/Product.vue";

const props = defineProps({
  products: Array,
});
</script>

<template>
  <Head title="Chagas" />
  <SiteLayout>
    <section class="container mx-auto py-8">
      <div class="rounded-2xl bg-white h-96 shadow-md"></div>
    </section>

    <section class="container mx-auto pb-8">
      <div class="grid grid-cols-12 gap-4">
        <product
          v-for="product in props.products"
          :key="product.id"
          :product="product"
        ></product>
      </div>
    </section>
  </SiteLayout>
</template>
