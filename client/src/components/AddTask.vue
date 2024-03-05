<template>
    <button class="flex justify-between items-center shadow-circle rounded-xl font-regular text-[10px] lg:text-[20px] w-[100px] lg:w-[180px] lg:h-[68px] px-2 lg:px-5 gap-3 lg:gap-5 m-0 transition-all hover:scale-105"
        @click="data.openModal = !data.openModal"
    >
        <span>Add task</span>
        <svg class="w-[20px] h-[20px] lg:w-[32px] lg:h-[32px]" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="18" cy="18" r="18" fill="#BA5112"/>
            <path d="M18.125 12L18.125 24" stroke="white" stroke-width="2" stroke-linecap="round"/>
            <path d="M12 17.875H24" stroke="white" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </button>
    <div v-if="data.openModal" class="fixed top-0 left-0 right-0 bottom-0 backdrop-blur-sm bg-[rgb(0,0,0,0.2)] cursor-pointer z-[999]" @click="data.openModal = !data.openModal">
        <div @click.stop class="cursor-auto absolute top-[50%] left-[50%] translate-y-[-50%] translate-x-[-50%] rounded-2xl w-[80%] lg:w-[800px] lg:h-[400px] bg-white">
            <form action="" class="px-10 py-5 lg:px-20 lg:py-10">
                <input
                    type="text"
                    placeholder="Add title"
                    name="title"
                    class="w-full bg-white border-none font-regular rounded-lg lg:rounded-2xl h-[50px] text-[12px] px-5 mb-[20px] lg:h-[60px] lg:text-[16px] lg:px-10 lg:mb-[30px] shadow-md"
                >
                <textarea
                    type="text"
                    placeholder="Add description"
                    name="description"
                    class="w-full bg-white border-none font-regular rounded-lg lg:rounded-2xl h-[120px] text-[12px] px-5 py-3 mb-[20px] lg:h-[170px] lg:text-[16px] lg:px-10 lg:py-5 lg:mb-[30px] shadow-md"
                />

                <div class="flex gap-5 justify-end">
                    <button @click="data.openModal = !data.openModal" class="w-[80px] h-[30px] text-[12px] rounded-lg lg:w-[130px] lg:h-[50px] lg:text-[20px] lg:rounded-xl border-2 border-[#EDB046] text-black font-regular">
                        Cansel
                    </button>
                    <button @click.prevent class="w-[80px] h-[30px] text-[12px] lg:w-[130px] lg:h-[50px] rounded-lg lg:text-[20px] lg:rounded-xl border-2 border-[#EDB046] bg-[#EDB046] text-black font-regular active:bg-[#fff]">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
    import {reactive} from "vue";

    const data = reactive({
        openModal: false
    })
</script>

<style scoped>

</style>