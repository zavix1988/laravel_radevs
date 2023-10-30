<script setup>
import Modal from "@/Components/Modal.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import {useForm} from "@inertiajs/vue3";
import {nextTick, ref, watch} from "vue";

const openedModal = ref(false);
const nameInput = ref(null);
const emailInput = ref(null);
const passwordInput = ref(null);

let errors = {}

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
});

const openAddingModal = () => {
  openedModal.value = true;

  nextTick(() => nameInput.value.focus());
};

const createTest = () => {
  form.post(route('managers.store'), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onError: (err) => {
      nameInput.value.focus()
      errors = { ...err }
    },
    onFinish: () => form.reset(),
  });

};

const closeModal = () => {
  openedModal.value = false;

  form.reset();
};

watch(
    () => form.password,
    (newVal) => {
      form.password_confirmation = newVal;
    }
)

</script>

<template>
  <section class="space-y-6">
    <PrimaryButton @click="openAddingModal">Add Manager</PrimaryButton>

    <Modal :show="openedModal" @close="closeModal">
      <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">
          Add Manager
        </h2>


        <div class="mt-6">
          <InputLabel for="name" value="Full name" class="sr-only" />

          <TextInput
              id="name"
              ref="nameInput"
              v-model="form.name"
              type="text"
              class="mt-1 block w-full"
              required
              placeholder="Full name"
          />

          <InputError :message="errors.name" class="mt-2" />
        </div>

        <div class="mt-4">
          <InputLabel for="email" value="Email" />

          <TextInput
              id="email"
              ref="emailInput"
              type="email"
              class="mt-1 block w-full"
              v-model="form.email"
              required
              placeholder="Email"
              autocomplete="username"
          />

          <InputError class="mt-2" :message="errors.email" />
        </div>

        <div class="mt-4">
          <InputLabel for="password" value="Password" />

          <TextInput
              id="password"
              ref="passwordInput"
              type="password"
              class="mt-1 block w-full"
              v-model="form.password"
              placeholder="Password"
              required
              autocomplete="new-password"
          />

          <InputError class="mt-2" :message="errors.password" />
        </div>


        <div class="mt-6 flex justify-end">
          <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

          <PrimaryButton
              class="ml-3"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
              @click="createTest"
          >
            Save Manager
          </PrimaryButton>
        </div>
      </div>
    </Modal>
  </section>
</template>

<style scoped>

</style>
