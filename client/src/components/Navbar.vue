<template>
    <div class="w-full">

        <div class="hidden lg:flex mb-10 justify-center">
            <AddTask/>
        </div>
        <div class="hidden lg:flex flex-wrap gap-5">
            <button class="font-regular text-[16px] w-full h-[44px] m-0 p-0 transition-all hover:bg-[#efefef]" id="Dashboard"
                    :class="props.page === 'Dashboard' ? 'bg-[#EDB046] hover:bg-[#EDB046]' : ''"
                    @click="(e) => data.page = e.target.id"
            >Dashboard</button>
            <button class="font-regular text-[16px] w-full h-[44px] m-0 p-0 transition-all hover:bg-[#efefef]" id="Active"
                    :class="props.page === 'Active' ? 'bg-[#EDB046] hover:bg-[#EDB046]' : ''"
                    @click="(e) => data.page = e.target.id"
            >Active</button>
            <button class="font-regular text-[16px] w-full h-[44px] m-0 p-0 transition-all hover:bg-[#efefef]" id="Completed"
                    :class="props.page === 'Completed' ? 'bg-[#EDB046] hover:bg-[#EDB046]' : ''"
                    @click="(e) => data.page = e.target.id"
            >Completed</button>
        </div>

        <div class="block lg:hidden relative">
          <div @click="data.openModalSelectPage = true" class="flex justify-between px-5 h-[35px] bg-[#EDB046] items-center rounded-lg cursor-pointer">
            <h1 class="font-regular text-[12px]">{{data.page}}</h1>
            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.97741 0.808034C8.8602 0.690865 8.70126 0.625042 8.53553 0.625042C8.36981 0.625042 8.21086 0.690865 8.09366 0.808034L4.99991 3.90178L1.90616 0.808034C1.78828 0.694185 1.63041 0.631189 1.46653 0.632613C1.30266 0.634037 1.1459 0.699767 1.03002 0.815647C0.914142 0.931527 0.848412 1.08829 0.846988 1.25216C0.845564 1.41603 0.90856 1.57391 1.02241 1.69178L4.55803 5.22741C4.67524 5.34458 4.83418 5.4104 4.99991 5.4104C5.16564 5.4104 5.32458 5.34458 5.44178 5.22741L8.97741 1.69178C9.09458 1.57458 9.1604 1.41564 9.1604 1.24991C9.1604 1.08418 9.09458 0.925239 8.97741 0.808034Z" fill="#251814"/>
            </svg>
          </div>
          <div v-if="data.openModalSelectPage" @click.stop="data.openModalSelectPage = false" class="absolute top-0 left-0 right-0 h-[300px]">
            <div class="flex justify-between px-5 h-[35px] items-center cursor-pointer w-full border-2"
              :class="data.page === 'Dashboard' ? 'bg-[#EDB046]' : 'bg-white'"
                 @click="updatePageModal('Dashboard')"
            >
              <h1 class="font-regular text-[12px]">Dashboard</h1>
            </div>
            <div class="flex justify-between px-5 h-[35px] items-center cursor-pointer w-full my-2 border-2"
                 :class="data.page === 'Active' ? 'bg-[#EDB046]' : 'bg-white'"
                 @click="updatePageModal('Active')"
            >
              <h1 class="font-regular text-[12px]">Active</h1>
            </div>
            <div class="flex justify-between px-5 h-[35px] items-center cursor-pointer w-full border-2"
                 :class="data.page === 'Completed' ? 'bg-[#EDB046]' : 'bg-white'"
                 @click="updatePageModal('Completed')"
            >
              <h1 class="font-regular text-[12px]">Completed</h1>
            </div>
          </div>
        </div>

    </div>
</template>
    
<script setup>

import {reactive, watch} from "vue";
import AddTask from "./AddTask.vue";
import Dashboard from "../pages/Dashboard.vue";

const props = defineProps(['page'])
const emit = defineEmits(['updatePage'])

const data = reactive({
  page: props.page,
  openModalSelectPage: false
})

watch(data, () => {
    emit('updatePage', data.page)
})

const updatePageModal = (page) => {
  data.page = page
  data.openModalSelectPage = false
}


</script>

<style scoped>

</style>