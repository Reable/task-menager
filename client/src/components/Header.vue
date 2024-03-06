<template>
    <header class="flex justify-between py-7 px-[2%] gap-2">
        <h1 class="font-bold text-[#BA5112] text-[20px] lg:text-[36px] min-w-[20%]">To-Do App</h1>

        <div class="hidden lg:flex w-4/6 justify-start items-center">
            <p class="font-regular text-[28px]">{{props.page}}</p>
        </div>

        <div class="flex gap-3">

            <div class="flex lg:hidden">
                <AddTask  />
            </div>

            <button @click.prevent="logout" class="bg-[#BA5112] flex px-3 lg:px-5 justify-between items-center rounded-xl text-white font-regular text-[10px] lg:text-[16px] h-[40px] lg:h-[50px] w-[100px] lg:w-[130px]">
                <span>Sign out</span>
                <svg class="w-[16px] h-[16px]" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.3334 4.66667L10.3934 5.60667L12.1134 7.33333H5.33337V8.66667H12.1134L10.3934 10.3867L11.3334 11.3333L14.6667 8M2.66671 3.33333H8.00004V2H2.66671C1.93337 2 1.33337 2.6 1.33337 3.33333V12.6667C1.33337 13.4 1.93337 14 2.66671 14H8.00004V12.6667H2.66671V3.33333Z" fill="white"/>
                </svg>
            </button>
        </div>
    </header>
</template>

<script setup>
import AddTask from "./AddTask.vue";
import {useRouter} from "vue-router";

const props = defineProps(['page'])

const router = useRouter()

const logout = () => {
  router.push('/')
}

</script>

<style scoped>

</style>