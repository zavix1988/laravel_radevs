<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";
import DeleteUserForm from "@/Pages/Profile/Partials/DeleteUserForm.vue";
import AddTestForm from "@/Pages/Tests/Partials/AddTestForm.vue";

</script>

<template>

    <Head title="Tests" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tests</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <AddTestForm class="max-w-xl"/>
            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Estimation</th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Standard</th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">John Doe</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">2023-10-28</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">New York</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Excellent</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Yes</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-2"><i class="fa-solid fa-edit"></i></a>
                            <a href="#" class="text-red-600 hover:text-red-900"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <!-- Додайте інші рядки даних аналогічно -->
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
