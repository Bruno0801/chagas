<script setup>
import { ref } from "vue";
import { Head, Link } from "@inertiajs/vue3";
import { Icon } from "@iconify/vue";
import CheckoutLayout from "@/Layouts/CheckoutLayout.vue";
import Summary from "@/Pages/Site/Checkout/Summary.vue";

const loadingCep = ref(false);
const cepError = ref("");

const form = ref({
  postal_code: "",
  street: "",
  number: "",
  complement: "",
  district: "",
  city: "",
  state: "",
});

function onlyDigits(v = "") {
  return v.replace(/\D/g, "");
}

function maskCep(raw = "") {
  const d = onlyDigits(raw).slice(0, 8);
  if (d.length <= 5) return d;
  return d.slice(0, 5) + "-" + d.slice(5);
}

function onCepInput(e) {
  form.value.postal_code = maskCep(e.target.value);
  cepError.value = "";
}

async function fetchCep() {
  cepError.value = "";

  const cepDigits = onlyDigits(form.value.postal_code);
  if (cepDigits.length !== 8) {
    cepError.value = "CEP inválido. Use 8 números (ex.: 01001-000).";
    return;
  }

  loadingCep.value = true;
  try {
    const res = await fetch(`https://viacep.com.br/ws/${cepDigits}/json/`);
    if (!res.ok) throw new Error("Erro ao consultar o CEP");
    const data = await res.json();

    if (data.erro) {
      cepError.value = "CEP não encontrado.";
      return;
    }

    // Preenche os campos — ajuste conforme quiser
    form.value.street = data.logradouro || "";
    form.value.district = data.bairro || "";
    form.value.city = data.localidade || "";
    form.value.state = data.uf || "";

    // Mantém número e complemento para o usuário digitar
  } catch (err) {
    cepError.value = "Não foi possível consultar o CEP agora.";
  } finally {
    loadingCep.value = false;
  }
}

// Opcional: dispara a busca ao sair do campo CEP
function onCepBlur() {
  if (onlyDigits(form.value.postal_code).length === 8) {
    fetchCep();
  }
}

function submit() {
  form.post(route("'site.checkout.address.store"), {
    onSuccess: () => {
      console.log("Endereço salvo!");
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
            <label for="postal_code">CEP</label>
            <div class="flex gap-2">
              <input
                id="postal_code"
                type="text"
                class="w-full"
                inputmode="numeric"
                autocomplete="postal-code"
                placeholder="00000-000"
                :value="form.postal_code"
                @input="onCepInput"
                @blur="onCepBlur"
              />
              <button
                type="button"
                class="shrink-0 px-3 rounded-md bg-black text-white disabled:opacity-50"
                :disabled="loadingCep"
                @click="fetchCep"
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
              Digite o CEP e clique em “Buscar” (ou saia do campo) para
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
            @click="calcularFrete"
          >
            Calcular Frete
          </button>
        </div>
      </div>

      <Summary />
    </section>
  </CheckoutLayout>
</template>
