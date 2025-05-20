<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Icon } from "@iconify/vue";
</script>

<template>

  <nav class="border-gray-200 bg-gray-200">
    <div class="max-w-screen-xl flex flex-row items-center justify-between mx-auto p-4">
      <button
        data-collapse-toggle="navbar-hamburger"
        type="button"
        class="inline-flex items-center justify-center p-2 w-10 h-10 text-xl text-gray-900 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
        aria-controls="navbar-hamburger"
        aria-expanded="false"
      >
        <span class="sr-only">Abrir menu principal</span>
        <Icon icon="hugeicons:menu-01" />
      </button>
      <div
        class="hidden w-full"
        id="navbar-hamburger"
      >
        <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50">
          <li>
            <a
              href="#"
              class="block py-2 px-3 text-white bg-blue-700 rounded-sm"
              aria-current="page"
            >Início</a>
          </li>
          <li>
            <a
              href="#"
              class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100"
            >Carrinho</a>
          </li>
          <li>
            <a
              href="#"
              class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100"
            >Perfil</a>
          </li>
        </ul>
      </div>
      <a
        href="#"
        class="flex items-center"
      >
        <ApplicationLogo class="h-4 md:h-6 fill-current text-gray-500" />
      </a>
      <div class="gap-1 md:gap-2 text-md md:text-xl flex">
        <Icon icon="ic:sharp-search" />
        <Icon icon="mingcute:user-1-line" />
        <Icon icon="flowbite:shopping-bag-outline" />
      </div>
    </div>
  </nav>

</template>