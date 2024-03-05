<template>
  <template v-for="task of data.allTasks.filter(elem => elem.completed == true)" :key="task.id">
    <Task :task="task" />
  </template>
</template>

<script setup>
import Task from "../components/Task.vue";
import {useStore} from "../store/store.js";
import {onMounted, reactive} from "vue";

const store = useStore()

const data = reactive({
  allTasks: store.allTasks
})

onMounted(async () => {
  data.allTasks = await store.getAllTasks()
})
</script>

<style scoped>

</style>