<template>
  <div class="shadow w-4/12 p-2 rounded-md flex flex-col gap-3 bg-white">
    <h2 class="text-2xl font-medium">
      Resumo
    </h2>
    <input
      class="w-full rounded-md"
      placeholder="Cupom de desconto"
      type="text"
    >
    <div class="flex justify-between text-sm">
      <p>Produtos</p>
      <p>R$ 1500,00</p>
    </div>
    <div class="flex justify-between text-sm">
      <p>Desconto</p>
      <p>-R$ 1500,00</p>
    </div>
    <div class="flex justify-between text-sm">
      <p>Frete</p>
      <p>R$ 10,00</p>
    </div>
    <div class="flex justify-between text-sm">
      <p class="font-semibold">Total</p>
      <p>R$ 10,00</p>
    </div>
    <button class="p-3 bg-black text-white rounded-md mt-10">Finalizar compra</button>
  </div>
</template>