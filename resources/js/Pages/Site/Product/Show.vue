<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import SiteLayout from "@/Layouts/SiteLayout.vue";
import Product from "@/Components/Product.vue";
import { Icon } from "@iconify/vue";
import { ref } from "vue";

const loading = ref(false);

const props = defineProps({
  product: Object,
});

const form = useForm({
  size: "",
  product_id: props.product.id,
});

const submit = () => {
  loading.value = true;
  form.post(route("site.checkout.order.store"), {
    preserveScroll: true,
    onError: (errors) => {
      loading.value = false;
    },
  });
};

const scrollContainer = ref(null);

const scrollLeft = () => {
  scrollContainer.value.scrollBy({ left: -200, behavior: "smooth" });
};

const scrollRight = () => {
  scrollContainer.value.scrollBy({ left: 200, behavior: "smooth" });
};
</script>

<template>
  <Head title="Nome do Produto" />
  <SiteLayout>
    <section class="container mx-auto flex flex-col md:flex-row py-8 gap-6">
      <div class="w-full md:w-[510px] flex flex-col gap-4">
        <img
          class="h-[335px] md:h-[510px] object-cover rounded-md border shadow-md"
          src="https://rewert.cdn.magazord.com.br/img/2023/09/produto/4447/camiseta-masculina-manga-curta-basica-premium-lisa-preta-sem-logo.png?ims=600x900"
          alt=""
        />

        <div class="relative">
          <div class="flex justify-between h-full w-full absolute">
            <button
              @click="scrollLeft"
              class="bg-gray-200 opacity-40 px-1 border border-gray-300 rounded-sm"
            >
              <Icon icon="material-symbols:chevron-left" />
            </button>
            <button
              @click="scrollRight"
              class="bg-gray-200 opacity-40 px-1 border border-gray-300 rounded-sm"
            >
              <Icon icon="material-symbols:chevron-right" />
            </button>
          </div>

          <div
            class="flex overflow-x-auto space-x-4 scroll-smooth px-7 no-scrollbar"
            ref="scrollContainer"
          >
            <img
              src="https://rewert.cdn.magazord.com.br/img/2023/09/produto/4447/camiseta-masculina-manga-curta-basica-premium-lisa-preta-sem-logo.png?ims=600x900"
              class="w-24 md:w-32 h-24 md:h-32 object-cover flex-shrink-0 rounded border shadow-sm"
            />
            <img
              src="https://rewert.cdn.magazord.com.br/img/2023/09/produto/4447/camiseta-masculina-manga-curta-basica-premium-lisa-preta-sem-logo.png?ims=600x900"
              class="w-24 md:w-32 h-24 md:h-32 object-cover flex-shrink-0 rounded border shadow-sm"
            />
            <img
              src="https://rewert.cdn.magazord.com.br/img/2023/09/produto/4447/camiseta-masculina-manga-curta-basica-premium-lisa-preta-sem-logo.png?ims=600x900"
              class="w-24 md:w-32 h-24 md:h-32 object-cover flex-shrink-0 rounded border shadow-sm"
            />
            <img
              src="https://rewert.cdn.magazord.com.br/img/2023/09/produto/4447/camiseta-masculina-manga-curta-basica-premium-lisa-preta-sem-logo.png?ims=600x900"
              class="w-24 md:w-32 h-24 md:h-32 object-cover flex-shrink-0 rounded border shadow-sm"
            />
            <img
              src="https://rewert.cdn.magazord.com.br/img/2023/09/produto/4447/camiseta-masculina-manga-curta-basica-premium-lisa-preta-sem-logo.png?ims=600x900"
              class="w-24 md:w-32 h-24 md:h-32 object-cover flex-shrink-0 rounded border shadow-sm"
            />
          </div>
        </div>
      </div>
      <div class="flex flex-col gap-3">
        <p class="text-sm text-gray-500">Camiseta / Adulto</p>
        <h1 class="text-3xl text-gray-900 font-medium">
          {{ product.name }}
        </h1>
        <p class="text-xl">R$ {{ product.price }}</p>
        <p class="text-sm text-gray-600">
          {{ product.description }}
        </p>

        <div class="flex gap-2">
          <button
            v-for="size in product.size"
            :key="size"
            :class="{ 'bg-black text-white': form.size == size }"
            class="py-1 px-2 border border-gray-800 shadow-md rounded-md hover:bg-gray-900 hover:text-white duration-300"
            @click="form.size = size"
          >
            {{ size }}
          </button>
        </div>
        <!-- <div class="flex gap-2">
          <button
            class="bg-red-500 p-4 rounded-full hover:-translate-y-1 duration-300"
          ></button>
          <button
            class="bg-blue-500 p-4 rounded-full hover:-translate-y-1 duration-300"
          ></button>
          <button
            class="bg-yellow-500 p-4 rounded-full hover:-translate-y-1 duration-300"
          ></button>
        </div> -->
        <div class="flex gap-2">
          <button
            @click="submit"
            class="px-2 py-1 bg-black text-white rounded-lg"
          >
            Adcionar ao carrinho
          </button>
          <button
            @click="submit"
            class="px-2 py-1 bg-black text-white rounded-lg"
          >
            Comprar agora
          </button>
        </div>
      </div>
    </section>
  </SiteLayout>
</template>
