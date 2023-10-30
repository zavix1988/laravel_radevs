<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from "@/Components/Modal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import {nextTick, ref, watch} from "vue";
import {useForm} from "@inertiajs/vue3";


const openedModal = ref(false);
const fullNameInput = ref(null);
const testDateInput = ref(null);
const locationInput = ref(null);
const estimationInput = ref('');

const form = useForm({
    full_name: '',
    test_date: (new Date()).getDate().toString(),
    location: '',
    estimation: '',
    standard: 0,
});

let errors = {}

const openAddingModal = () => {
    openedModal.value = true;

    nextTick(() => fullNameInput.value.focus());
};

const createTest = () => {
    form.post(route('tests.store'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: (err) => {
            fullNameInput.value.focus()
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
    () => form.estimation,
    (newVal) => {
      form.standard = 100;
      if(newVal <= 60) {
        form.standard = 100;
      } else if(newVal <= 80) {
        form.standard = 200;
      } else if (newVal <= 99) {
        form.standard = 300;
      } else {
        form.standard = 500;
      }
    }
)

</script>

<template>
    <section class="space-y-6">
        <PrimaryButton @click="openAddingModal">Add Test</PrimaryButton>

        <Modal :show="openedModal" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Add Test
                </h2>

                <InputError :message="errors.standard" class="mt-2" />


                <div class="mt-6">
                    <InputLabel for="full-name" value="Full name" class="sr-only" />

                    <TextInput
                        id="full-name"
                        ref="fullNameInput"
                        v-model="form.full_name"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Full name"
                    />

                    <InputError :message="errors.full_name" class="mt-2" />
                </div>

              <div class="mt-6"></div>

                <div class="mt-6">
                    <InputLabel for="test-date" value="Date" class="sr-only" />

                  <TextInput
                      id="test-date"
                      ref="testDateInput"
                      v-model="form.test_date"
                      type="date"
                      class="mt-1 block w-3/4"
                      placeholder="location"
                  />

                  <InputError :message="errors.test_date" class="mt-2" />
                </div>

                <div class="mt-6">
                    <InputLabel for="location" value="location" class="sr-only" />

                    <TextInput
                        id="location"
                        ref="locationInput"
                        v-model="form.location"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="location"
                    />

                    <InputError :message="errors.location" class="mt-2" />
                </div>

                <div class="mt-6">
                    <InputLabel for="Estimation" value="estimation" class="sr-only" />

                    <TextInput
                        id="estimation"
                        ref="estimationInput"
                        v-model="form.estimation"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Estimation"
                    />

                    <InputError :message="errors.estimation" class="mt-2" />
                </div>


                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                    <PrimaryButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="createTest"
                    >
                        Save test
                    </PrimaryButton>
                </div>
            </div>
        </Modal>
    </section>

</template>

<style scoped>

</style>
