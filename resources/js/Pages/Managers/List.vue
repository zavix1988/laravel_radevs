<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import AddManagerForm from "@/Pages/Managers/Partials/AddManagerForm.vue";
import ManagerListItem from "@/Pages/Managers/Partials/ManagersListItem/ManagerListItem.vue";

defineProps({
    managers: {
        type: Array,
    },
});

const form = useForm({
    password: '',
});

const deleteManager = (id) => {
    form.delete(route('managers.destroy', id))
}

</script>

<template>

  <Head title="Tests" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Managers</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <AddManagerForm class="max-w-xl"/>
      </div>

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <table class="min-w-full">
          <thead>
          <tr>
            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>
            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
          </thead>
          <tbody>
          <tr
              v-for="manager in managers"
              :key="manager.id"
          >
              <ManagerListItem
                  :manager="manager"
                  @onDeleteItem="deleteManager(manager.id)"
              />
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AuthenticatedLayout>



</template>

<style scoped>
.table {
  border-spacing: 0 15px;
}

i {
  font-size: 1rem !important;
}

.table tr {
  border-radius: 20px;
}

tr td:nth-child(n + 6),
tr th:nth-child(n + 6) {
  border-radius: 0 0.625rem 0.625rem 0;
}

tr td:nth-child(1),
tr th:nth-child(1) {
  border-radius: 0.625rem 0 0 0.625rem;
}
</style>
