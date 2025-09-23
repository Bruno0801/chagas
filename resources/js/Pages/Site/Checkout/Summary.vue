<template>
  <div class="shadow w-4/12 p-2 rounded-md flex flex-col gap-3 bg-white h-min">
    <h2 class="text-2xl font-medium">Resumo</h2>
    <input
      class="w-full rounded-md"
      placeholder="Cupom de desconto"
      type="text"
    />
    <div class="flex justify-between text-sm">
      <p>Produtos</p>
      <p>R$ {{ $page.props.auth.order.price }}</p>
    </div>
    <div
      v-if="$page.props.auth.order.discount"
      class="flex justify-between text-sm"
    >
      <p>Desconto</p>
      <p>-R$ {{ $page.props.auth.order.discount }}</p>
    </div>
    <div
      v-if="$page.props.auth.order.freight"
      class="flex justify-between text-sm"
    >
      <p>Frete</p>
      <p>R$ {{ $page.props.auth.order.freight }}</p>
    </div>
    <div
      v-if="$page.props.auth.order.total"
      class="flex justify-between text-sm"
    >
      <p class="font-semibold">Total</p>
      <p>R$ {{ $page.props.auth.order.total }}</p>
    </div>
    <slot> </slot>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
