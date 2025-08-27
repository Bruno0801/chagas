<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { Icon } from "@iconify/vue";
import CheckoutLayout from "@/Layouts/CheckoutLayout.vue";
import Summary from "@/Pages/Site/Checkout/Summary.vue";

const props = defineProps({
  orders: Array,
});
</script>

<template>
  <Head title="Carrinho" />
  <CheckoutLayout>
    <section class="container mx-auto pt-4 flex flex-row gap-4 w-full">
      <div class="w-8/12 flex flex-col gap-4">
        <div
          v-for="order in orders"
          :key="order.id"
          class="flex justify-between items-center rounded-md bg-white p-2"
        >
          <div class="flex items-center gap-2">
            <img
              class="h-28 w-28 object-cover rounded-md border shadow-md"
              src="https://rewert.cdn.magazord.com.br/img/2023/09/produto/4447/camiseta-masculina-manga-curta-basica-premium-lisa-preta-sem-logo.png?ims=600x900"
              alt=""
            />
            <div class="">
              <p class="font-medium">{{ order.product.name }}</p>
              <p class="text-sm text-gray-600">{{ order.size }}</p>
            </div>
          </div>
          <div class="flex shadow gap-1 px-1">
            <Link
              v-if="order.quantity > 1"
              :href="route('site.checkout.order.destroy') + '?op=' + order.id"
              method="post"
              preserve-scroll
              as="button"
              type="button"
            >
              <Icon icon="ri:subtract-fill" />
            </Link>
            <span>{{ order.quantity }}</span>
            <Link
              :href="route('site.checkout.order.store') + '?op=' + order.id"
              method="post"
              preserve-scroll
              as="button"
              type="button"
            >
              <Icon icon="material-symbols:add" />
            </Link>
          </div>
          <p>R$ {{ order.product.price * order.quantity }}</p>
          <Link
            :href="route('site.checkout.order.destroy') + '?op=' + order.id"
            method="post"
            preserve-scroll
            as="button"
            type="button"
          >
            <Icon class="text-2xl" icon="flowbite:trash-bin-outline" />
          </Link>
        </div>
      </div>
      <Summary></Summary>
    </section>
  </CheckoutLayout>
</template>
