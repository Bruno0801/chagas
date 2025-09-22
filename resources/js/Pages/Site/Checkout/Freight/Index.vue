<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import { Icon } from "@iconify/vue";
import CheckoutLayout from "@/Layouts/CheckoutLayout.vue";
import Summary from "@/Pages/Site/Checkout/Summary.vue";

const props = defineProps({
  freights: Array,
});

const form = useForm({
  freight: "",
});
function submit() {
  form.post(route("site.checkout.freight.store"), {
    onSuccess: () => {
      // sucesso
    },
  });
}
</script>

<template>
  <Head title="Checkout - Frete" />
  <CheckoutLayout>
    <section class="container mx-auto pt-4 flex flex-row gap-4 w-full">
      <div class="w-8/12 flex flex-col gap-2">
        <h2 class="text-xl font-semibold">Endereço</h2>
        <div
          class="flex justify-between items-center gap-4 py-6 px-2 bg-white shadow-md rounded-md mb-4"
        >
          <p>
            Rua Cabo Brasilio zequin junior, 36 PQ Novo Mundo, São Paulo - SP,
            02180000
          </p>
        </div>
        <h2 class="text-xl font-semibold">Frete {{ form.freight }}</h2>
        <div class="grid grid-cols-6 gap-4">
          <div
            v-for="freight in props.freights"
            :key="freight.id"
            class="flex items-center justify-between gap-4 col-span-6 bg-white rounded-md shadow-md py-6 px-2"
          >
            <!-- Radio só habilitado se não tiver erro -->
            <input
              v-model="form.freight"
              type="radio"
              name="freight_option"
              :value="freight.price"
              :disabled="freight.error"
              class="cursor-pointer"
            />

            <!-- Logo da transportadora -->
            <img
              class="h-8"
              :src="freight.company.picture"
              :alt="freight.company.name"
            />

            <!-- Infos -->
            <div class="flex flex-col flex-1">
              <p class="font-bold">{{ freight.name }}</p>
              <p v-if="!freight.error">
                {{ freight.currency }} {{ freight.price }}
              </p>
              <p v-else class="text-red-500 text-sm">
                {{ freight.error }}
              </p>
            </div>

            <!-- Prazo só se não tiver erro -->
            <div v-if="!freight.error" class="text-sm text-gray-600">
              {{ freight.delivery_time }} dia<span
                v-if="freight.delivery_time > 1"
                >s</span
              >
            </div>
          </div>
        </div>
        <button
          class="col-span-12 bg-black text-white w-full h-min p-2 rounded-md"
          type="button"
          @click="submit"
        >
          Salvar
        </button>
      </div>
      <Summary></Summary>
    </section>
  </CheckoutLayout>
</template>
