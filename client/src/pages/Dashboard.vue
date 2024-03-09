<template>

  <div class="flex justify-end">

    <select v-if="data.allTasks[0]" @change="filteredItems" v-model="data.filter" class="rounded-lg bg-[#BA5112] text-white py-3 px-5 lg:mr-2">
      <option value="1">By date create</option>
      <option value="2">Reverse</option>
    </select>
  </div>

  <template v-if="data.allTasks[0]">
      <template v-for="task of data.allTasks" :key="task.id">
          <Task :task="task" />
      </template>
  </template>
  <template v-else>
    <p class="text-center text-[25px]">Not found Tasks</p>
  </template>

</template>

<script setup>
	import Task from "../components/Task.vue";
  import {useStore} from "../store/store.js";
  import {onMounted, reactive, watch} from "vue";
  import {useRouter} from "vue-router";

  const store = useStore()
  const router = useRouter()

  const data = reactive({
    allTasks: store.allTasks,
    filter: 1
  })

  const generateTasks = async (fil = 0) => {
    const res = await store.getAllTasks()
    if(res.status === 401){
      await router.push('/')
    }

    data.allTasks = res.data

    return data.allTasks
  }

  onMounted(async () => {
    await generateTasks()
  })

  const filteredItems = async () => {
    console.log(data.filter)
    let tasks = await generateTasks(data.filter)
    console.log(tasks[0])
    switch(Number(data.filter)){
      case 1:
        store.allTasks = tasks
        break
      case 2:
        store.allTasks = tasks.reverse()
        break
    }
  }

</script>

<style scoped>

</style>