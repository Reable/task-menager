<template>
    <div class="auth-page relative h-100 overflow-y-hidden">
        <div  v-if="data.register" class="absolute w-[800px] rounded-3xl bg-[#EDB046] top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] p-10 text-white">
            <div class="text-center">
                <h1 class="font-bold text-[60px]">
                    To-Do App
                </h1>
                <p class="font-regular text-[20px]">
                    Start organizing your life day by day
                </p>
            </div>
            <form class="mt-20 flex justify-center flex-wrap">
                <input
                    type="text"
                    placeholder="Login"
                    name="login"
                    class="text-black w-full bg-white h-[70px] border-none font-regular rounded-2xl text-[20px] px-10 mb-[40px]"
                >

                <input
                    type="password"
                    placeholder="Password"
                    name="password"
                    class="text-black w-full bg-white h-[70px] border-none font-regular rounded-2xl text-[20px] px-10 mb-[40px]"
                >
                <button class="bg-[#BA5112] h-[70px] w-[200px] font-regular text-[20px] mt-10 rounded-2xl">
                    Sign Up
                </button>
            </form>
            <div class="text-center mt-5 font-regular text-[20px]">
                <p>
                    Already have an account?
                    <span
                        class="cursor-pointer"
                        @click="data.register = !data.register"
                    >
                        Sign In
                        <span class="text-[#BA5112]">here</span>
                    </span>
                </p>
            </div>
        </div>
        <div  v-else class="absolute w-[900px] h-[700px] rounded-3xl bg-white top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] p-20">
            <div class="text-center">
                <h1 class="font-bold text-[60px] text-[#BA5112]">
                    To-Do App
                </h1>
                <p class="font-regular text-[20px]">
                    Start organizing your life day by day
                </p>
            </div>
            <form class="mt-20 flex justify-center flex-wrap">
                <input
                    type="text"
                    placeholder="Login"
                    name="login"
                    class="w-full bg-white h-[70px] border-none font-regular rounded-2xl text-[20px] px-10 mb-[40px] shadow-md"
                >

                <input
                    type="password"
                    placeholder="Password"
                    name="password"
                    class="w-full bg-white h-[70px] border-none font-regular rounded-2xl text-[20px] px-10 mb-[40px] shadow-md"
                >

                <router-link to="/office" class="flex justify-center items-center bg-[#EDB046] h-[70px] w-[200px] font-regular text-[20px] mt-10 rounded-2xl">
                    Sign In
                </router-link>
            </form>
            <div class="text-center mt-5 font-regular text-[20px]">
                <p>
                    Already have an account?
                    <span
                        class="cursor-pointer"
                        @click="data.register = !data.register"
                    >
                        Sign Up
                        <span class="text-[#BA5112]">here</span>
                    </span>
                </p>
            </div>
        </div>

    </div>
</template>

<script setup>
    import {reactive} from "vue";

    const data = reactive({
        register: true
    })

</script>

<style scoped>
    .auth-page{
        height: 100vh;
        background-image: url("../assets/background.png");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>