<template>
  <template v-if="data.allTasks[0]">
    <template v-for="task of data.allTasks" :key="task.id">
        <Task :task="task" />
    </template>
  </template>
  <template v-else>
    <p class="text-center text-[25px]">No completed tasks</p>
  </template>
</template>

<script setup>
import Task from "../components/Task.vue";
import {useStore} from "../store/store.js";
import {onMounted, reactive} from "vue";
import {useRouter} from "vue-router";

const store = useStore()
const router = useRouter()

const data = reactive({
  allTasks: store.allTasks
})

onMounted(async () => {
  const res = await store.getAllTasks()
  if(res.status === 401){
    await router.push('/')
  }
  data.allTasks = res.data.filter(elem => elem.completed === 1)
})

</script>

<style scoped>

</style>