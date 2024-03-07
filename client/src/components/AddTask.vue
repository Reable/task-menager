<template>
    <button class="flex justify-between items-center shadow-circle rounded-lg font-regular text-[6px] usm:text-[10px] lg:text-[20px] w-[70px] usm:w-[100px] lg:w-[200px] lg:h-[68px] px-2 lg:px-5 gap-1 us,:gap-3 lg:gap-5 m-0 h-[30px] usm:h-[40px] transition-all hover:scale-105"
        @click="data.openModal = !data.openModal"
    >
        <span>Add task</span>
        <svg class="w-[15px] h-[15px] usm:w-[20px] usm:h-[20px] lg:w-[32px] lg:h-[32px]" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="18" cy="18" r="18" fill="#BA5112"/>
            <path d="M18.125 12L18.125 24" stroke="white" stroke-width="2" stroke-linecap="round"/>
            <path d="M12 17.875H24" stroke="white" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </button>
    <div v-if="data.openModal" class="fixed top-0 left-0 right-0 bottom-0 backdrop-blur-sm bg-[rgb(0,0,0,0.2)] cursor-pointer z-[999]" @click="data.openModal = !data.openModal">
        <div @click.stop class="cursor-auto absolute top-[50%] left-[50%] translate-y-[-50%] translate-x-[-50%] rounded-2xl w-[80%] lg:w-[800px] bg-white">
            <form action="" class="px-10 py-5 lg:px-10 lg:py-10">
                <p class="text-[10px] lg:text-[20px] text-center text-red-600 mb-1 lg:mb-3">{{data.errors.title}}</p>
                <input
                    v-model="data.title"
                    type="text"
                    placeholder="Add title"
                    name="title"
                    class="w-full bg-white border-none font-regular rounded-lg h-[50px] text-[12px] mb-[20px] lg:h-[60px] lg:text-[16px] px-5 lg:mb-[30px] shadow-md"
                >

                <p class="text-[10px] lg:text-[20px] text-center text-red-600 mb-1 lg:mb-3">{{data.errors.description}}</p>
                <textarea
                    v-model="data.description"
                    type="text"
                    placeholder="Add description"
                    name="description"
                    class="w-full resize-none bg-white border-none font-regular rounded-lg h-[120px] text-[12px] py-3 mb-[20px] lg:h-[170px] lg:text-[16px] lg:py-5 px-5  lg:mb-[30px] shadow-md"
                />

                <div class="flex gap-5 justify-end">
                    <button @click="data.openModal = !data.openModal" class="w-[80px] h-[30px] text-[12px] rounded-md lg:w-[130px] lg:h-[50px] lg:text-[20px] lg:rounded-xl border-2 border-[#EDB046] text-black font-regular">
                        Cansel
                    </button>
                    <button @click.prevent="addTask" class="w-[80px] h-[30px] text-[12px] lg:w-[130px] lg:h-[50px] rounded-md lg:text-[20px] lg:rounded-xl border-2 border-[#EDB046] bg-[#EDB046] text-black font-regular active:bg-[#fff]">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
    import {reactive} from "vue";

    import {useStore} from '../store/store.js'

    const data = reactive({
      openModal: false,
      title: "",
      description: "",
      errors: {
        message: "",
        title: "",
        description: ""
      }
    })

    const addTask = async () => {
      data.errors.title = ""
      data.errors.description = ""

      if(data.title.length < 10){
        data.errors.title = "Min 10 length"
        return
      }

      if(data.description.length < 10){
        data.errors.description = "Min 10 length"
        return
      }

      const info = await useStore().addTask({
        title: data.title,
        description: data.description,
        completed: false
      })

      data.openModal = false

      data.title = ""
      data.description = ""
    }

</script>

<style scoped>

</style>