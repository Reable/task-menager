<template>
	<div class="flex w-full shadow-xl min-h-[70px] py-5 pb-3 cursor-pointer mb-5 rounded-lg" :class="task.completed ? 'bg-[#EDB046]' : 'bg-white'" @click="data.openModal = !data.openModal">
      <div class="ml-3 mr-5 w-[10%]" @click.stop>
        <svg v-if="!task.completed" class="w-[22px] lg:w-[28px] lg:h-[28px] transition-all hover:scale-105" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.3667 18.9L20.5917 10.675L18.9583 9.04167L12.3667 15.6333L9.04167 12.3083L7.40833 13.9417L12.3667 18.9ZM5.83333 24.5C5.19167 24.5 4.64256 24.2717 4.186 23.8152C3.72944 23.3586 3.50078 22.8091 3.5 22.1667V5.83333C3.5 5.19167 3.72867 4.64256 4.186 4.186C4.64333 3.72944 5.19244 3.50078 5.83333 3.5H22.1667C22.8083 3.5 23.3578 3.72867 23.8152 4.186C24.2725 4.64333 24.5008 5.19244 24.5 5.83333V22.1667C24.5 22.8083 24.2717 23.3578 23.8152 23.8152C23.3586 24.2725 22.8091 24.5008 22.1667 24.5H5.83333ZM5.83333 22.1667H22.1667V5.83333H5.83333V22.1667Z" fill="#EDB046"/>
        </svg>
        <svg v-else class="ml-1 w-[18px] lg:w-[23px] lg:h-[23px] transition-all hover:scale-105 mt-1" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.36667 15.9L17.5917 7.675L15.9583 6.04167L9.36667 12.6333L6.04167 9.30833L4.40833 10.9417L9.36667 15.9ZM2.83333 21.5C2.19167 21.5 1.64256 21.2717 1.186 20.8152C0.729444 20.3586 0.500778 19.8091 0.5 19.1667V2.83333C0.5 2.19167 0.728667 1.64256 1.186 1.186C1.64333 0.729444 2.19244 0.500778 2.83333 0.5H19.1667C19.8083 0.5 20.3578 0.728667 20.8152 1.186C21.2725 1.64333 21.5008 2.19244 21.5 2.83333V19.1667C21.5 19.8083 21.2717 20.3578 20.8152 20.8152C20.3586 21.2725 19.8091 21.5008 19.1667 21.5H2.83333Z" fill="#BA5112"/>
        </svg>
      </div>
      <div class="font-regular text-[16px] lg:text-[20px] pr-3">
        <p class="break-all">
          {{task.title}}
        </p>
      </div>
    </div>
  <div v-if="data.openModal" class="fixed top-0 left-0 right-0 bottom-0 backdrop-blur-sm bg-[rgb(0,0,0,0.2)] cursor-pointer z-[999]" @click="data.openModal = !data.openModal">
    <div @click.stop class="cursor-auto absolute top-[50%] left-[50%] translate-y-[-50%] translate-x-[-50%] rounded-2xl w-[80%] p-5 pb-20 lg:p-10 lg:pb-20 lg:w-[400px]" :class="data.completed ? 'bg-[#EDB046]' : 'bg-white'">
      <div v-if="!data.updateTaskModel">
        <h1 class="font-bold lg:text-[28px] text-center lg:mb-3">{{data.title}}</h1>
        <p class="font-regular text-[#BA5112] lg:text-[16px] text-center lg:mb-7">added 3d ago</p>
        <p class="font-bold lg:text-[20px] text-center mb-5">Description</p>
        <p class="break-all font-regular lg:text-[20px] text-center">{{data.title}}</p>
      </div>

      <div v-if="data.updateTaskModel">
        <input
            v-model="data.title"
            type="text"
            placeholder="Title"
            class="w-full py-2 px-3 lg:py-3 lg:px-5 shadow-lg rounded-lg text-[12px] lg:text-[18px]"
        >
        <textarea
          v-model="data.description"
          class="w-full py-2 px-3 min-h-[80px] lg:min-h-[100px] lg:py-3 lg:px-5 shadow-lg rounded-lg mt-5 text-[12px] lg:text-[18px]"
        ></textarea>
      </div>

      <div class="absolute flex bottom-5 right-5 left-5 justify-between items-center">
        <svg v-if="!data.completed" class="cursor-pointer w-[25px] h-[25px] lg:w-[30px] lg:h-[30px] transition-all hover:scale-105" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.3667 18.9L20.5917 10.675L18.9583 9.04167L12.3667 15.6333L9.04167 12.3083L7.40833 13.9417L12.3667 18.9ZM5.83333 24.5C5.19167 24.5 4.64256 24.2717 4.186 23.8152C3.72944 23.3586 3.50078 22.8091 3.5 22.1667V5.83333C3.5 5.19167 3.72867 4.64256 4.186 4.186C4.64333 3.72944 5.19244 3.50078 5.83333 3.5H22.1667C22.8083 3.5 23.3578 3.72867 23.8152 4.186C24.2725 4.64333 24.5008 5.19244 24.5 5.83333V22.1667C24.5 22.8083 24.2717 23.3578 23.8152 23.8152C23.3586 24.2725 22.8091 24.5008 22.1667 24.5H5.83333ZM5.83333 22.1667H22.1667V5.83333H5.83333V22.1667Z" fill="#EDB046"/>
        </svg>
        <svg v-if="data.completed" class="cursor-pointer w-[20px] h-[20px] lg:w-[25px] lg:h-[25px] transition-all hover:scale-105 mt-1" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.36667 15.9L17.5917 7.675L15.9583 6.04167L9.36667 12.6333L6.04167 9.30833L4.40833 10.9417L9.36667 15.9ZM2.83333 21.5C2.19167 21.5 1.64256 21.2717 1.186 20.8152C0.729444 20.3586 0.500778 19.8091 0.5 19.1667V2.83333C0.5 2.19167 0.728667 1.64256 1.186 1.186C1.64333 0.729444 2.19244 0.500778 2.83333 0.5H19.1667C19.8083 0.5 20.3578 0.728667 20.8152 1.186C21.2725 1.64333 21.5008 2.19244 21.5 2.83333V19.1667C21.5 19.8083 21.2717 20.3578 20.8152 20.8152C20.3586 21.2725 19.8091 21.5008 19.1667 21.5H2.83333Z" fill="#BA5112"/>
        </svg>

        <button @click.prevent="data.updateTaskModel = !data.updateTaskModel" class="cursor-pointer font-regular text-[10px] lg:text-[16px] bg-[#BA5112] text-white py-2 px-10 rounded-lg transition-all hover:scale-105">Update</button>

        <svg class="cursor-pointer lg:w-[32px] lg:h-[32px] transition-all hover:scale-105" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M11.25 5.75H11C11.1375 5.75 11.25 5.6375 11.25 5.5V5.75ZM11.25 5.75H20.75V5.5C20.75 5.6375 20.8625 5.75 21 5.75H20.75V8H23V5.5C23 4.39688 22.1031 3.5 21 3.5H11C9.89687 3.5 9 4.39688 9 5.5V8H11.25V5.75ZM27 8H5C4.44687 8 4 8.44688 4 9V10C4 10.1375 4.1125 10.25 4.25 10.25H6.1375L6.90938 26.5938C6.95938 27.6594 7.84063 28.5 8.90625 28.5H23.0938C24.1625 28.5 25.0406 27.6625 25.0906 26.5938L25.8625 10.25H27.75C27.8875 10.25 28 10.1375 28 10V9C28 8.44688 27.5531 8 27 8ZM22.8531 26.25H9.14688L8.39062 10.25H23.6094L22.8531 26.25Z" fill="#BA5112"/>
        </svg>

      </div>
    </div>
  </div>
</template>

<script setup>

import {reactive} from "vue";

const props = defineProps(['task'])

const data = reactive({
  openModal: false,
  updateTaskModel: false,
  title: props.task.title,
  description: props.task.description,
  completed: props.task.completed
})

</script>

<style scoped>

</style>