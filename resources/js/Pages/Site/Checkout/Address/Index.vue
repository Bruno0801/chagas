<script setup>
import { ref } from "vue";
import axios from "axios"; // se já tiver global, pode remover
import { Head, useForm } from "@inertiajs/vue3";
import CheckoutLayout from "@/Layouts/CheckoutLayout.vue";
import Summary from "@/Pages/Site/Checkout/Summary.vue";

const loadingCep = ref(false);
const cepError = ref("");
const travado = ref(false); // trava enquanto consulta pra evitar chamadas em loop

const form = useForm({
  cep: "",
  street: "",
  number: "",
  complement: "",
  district: "",
  city: "",
  state: "",
});

function somenteDigitos(v = "") {
  return v.replace(/\D/g, "");
}

async function consultPostalCode() {
  const cep = somenteDigitos(form.cep);

  // só busca CEP válido e quando não estiver travado
  if (cep.length !== 8 || travado.value) return;

  cepError.value = "";
  loadingCep.value = true;
  travado.value = true;

  try {
    const res = await axios.get(`https://viacep.com.br/ws/${cep}/json/`);
    const data = res.data;

    if (data.erro) {
      cepError.value = "CEP não encontrado.";
      return;
    }

    // Mapeia campos ViaCEP -> seu form
    form.street = data.logradouro || "";
    form.district = data.bairro || "";
    form.city = data.localidade || "";
    form.state = data.uf || "";

    // foca no número para agilizar
    const num = document.getElementById("number");
    if (num) num.focus();
  } catch (e) {
    cepError.value = "Não foi possível consultar o CEP agora.";
  } finally {
    loadingCep.value = false;
    // pequena janela para não disparar outra busca imediatamente
    setTimeout(() => (travado.value = false), 300);
  }
}

function submit() {
  form.post(route("site.checkout.address.store"), {
    onSuccess: () => {
      // sucesso
    },
  });
}
</script>

<template>
  <Head title="Checkout - Endereço" />
  <CheckoutLayout>
    <section class="container mx-auto pt-4 flex flex-row gap-4 w-full">
      <div class="w-8/12">
        <div class="grid grid-cols-12 gap-4 bg-white p-2 rounded-md">
          <div class="col-span-4 input-default">
            <label for="cep">CEP</label>
            <div class="flex gap-2">
              <input
                id="cep"
                type="text"
                class="w-full"
                inputmode="numeric"
                autocomplete="postal-code"
                placeholder="00000-000"
                v-model="form.cep"
                @blur="consultPostalCode"
              />
              <!-- Botão opcional de buscar -->
              <button
                type="button"
                class="shrink-0 px-3 rounded-md bg-black text-white disabled:opacity-50"
                :disabled="loadingCep"
                @click="consultPostalCode"
                title="Buscar CEP"
              >
                <span v-if="!loadingCep">Buscar</span>
                <span v-else>...</span>
              </button>
            </div>
            <p v-if="cepError" class="text-sm text-red-600 mt-1">
              {{ cepError }}
            </p>
            <p class="text-xs text-gray-500 mt-1">
              Digite o CEP e saia do campo (ou clique em “Buscar”) para
              preencher o endereço automaticamente.
            </p>
          </div>

          <div class="col-span-6 input-default">
            <label for="street">Rua</label>
            <input
              id="street"
              type="text"
              class="w-full"
              placeholder="Rua"
              v-model="form.street"
              autocomplete="address-line1"
            />
          </div>

          <div class="col-span-2 input-default">
            <label for="number">Nº</label>
            <input
              id="number"
              type="text"
              class="w-full"
              placeholder="Ex: 0"
              v-model="form.number"
              autocomplete="address-line2"
            />
          </div>

          <div class="col-span-3 input-default">
            <label for="complement">Complemento</label>
            <input
              id="complement"
              type="text"
              class="w-full"
              placeholder="Ex: AP 10"
              v-model="form.complement"
              autocomplete="address-line2"
            />
          </div>

          <div class="col-span-4 input-default">
            <label for="district">Bairro</label>
            <input
              id="district"
              type="text"
              class="w-full"
              placeholder="Bairro"
              v-model="form.district"
              autocomplete="address-level3"
            />
          </div>

          <div class="col-span-4 input-default">
            <label for="city">Cidade</label>
            <input
              id="city"
              type="text"
              class="w-full"
              placeholder="Ex: São Paulo"
              v-model="form.city"
              autocomplete="address-level2"
            />
          </div>

          <div class="col-span-4 input-default">
            <label for="state">Estado</label>
            <input
              id="state"
              type="text"
              class="w-full"
              placeholder="Ex: SP"
              v-model="form.state"
              maxlength="2"
              autocomplete="address-level1"
            />
          </div>

          <button
            class="col-span-12 bg-black text-white w-full h-min p-2 rounded-md"
            type="button"
            @click="submit"
          >
            Calcular Frete
          </button>
        </div>
      </div>

      <Summary />
    </section>
  </CheckoutLayout>
</template>
