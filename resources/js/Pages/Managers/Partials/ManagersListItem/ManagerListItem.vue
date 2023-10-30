<script setup>

const props = defineProps({
    manager: {
        type: Object
    }
})

const emit = defineEmits(['onDeleteItem']);


const deleteItem = () => {
    if (confirm("Are you sure you want to Delete")) {
        emit( 'onDeleteItem' );
    }
}

</script>

<template>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ manager.name }}</td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ manager.email }}</td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Manager</td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-2"><i class="fa-solid fa-edit"></i></a>
        <a href="#" class="text-red-600 hover:text-red-900" @click.prevent="deleteItem"><i class="fa-solid fa-trash"></i></a>
    </td>
</template>

<style scoped>

</style>
