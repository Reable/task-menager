<template>
    <div class="auth-page relative overflow-hidden">
        <div  v-if="data.register" class="absolute lg:w-[50%] rounded-3xl bg-[#EDB046] top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] p-8 text-white">
            <div class="text-center">
                <h1 class="font-bold text-[30px] lg:text-[60px]">
                    To-Do App
                </h1>
                <p class="font-regular text-[12px] lg:text-[20px]">
                    Start organizing your life day by day
                </p>
            </div>
            <form class="mt-10 lg:mt-20 flex justify-center flex-wrap">
                <input
                    type="text"
                    placeholder="Login"
                    name="login"
                    class="text-black w-full bg-white h-[40px] lg:h-[70px] border-none font-regular rounded-lg text-[12px] lg:text-[20px] px-5 lg:px-10 mb-[15px] lg:mb-[40px]"
                >

                <input
                    type="password"
                    placeholder="Password"
                    name="password"
                    class="text-black w-full bg-white h-[40px] lg:h-[70px] border-none font-regular rounded-lg text-[12px] lg:text-[20px] px-5 lg:px-10 mb-[20px] lg:mb-[40px]"
                >
                <button @click.prevent="auth" class="bg-[#BA5112] h-[40px] lg:h-[70px] w-[200px] font-regular text-[14px] lg:text-[20px] mt-5 lg:mt-10 rounded-lg">
                    Sign Up
                </button>
            </form>
            <div class="text-center mt-5 font-regular text-[12px] lg:text-[20px]">
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
        <div  v-else class="absolute border-2 lg:w-[50%] rounded-3xl bg-white top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] p-10 lg:p-20">
            <div class="text-center">
                <h1 class="font-bold text-[30px] lg:text-[60px] text-[#BA5112]">
                    To-Do App
                </h1>
                <p class="font-regular text-[12px] lg:text-[20px]">
                    Start organizing your life day by day
                </p>
            </div>
            <form class="mt-10 lg:mt-20 flex justify-center flex-wrap">
                <input
                    type="text"
                    placeholder="Login"
                    name="login"
                    class="text-black w-full bg-white h-[40px] lg:h-[70px] border-none font-regular rounded-lg text-[12px] lg:text-[20px] px-5 lg:px-10 mb-[15px] lg:mb-[40px] shadow-lg"
                >

                <input
                    type="password"
                    placeholder="Password"
                    name="password"
                    class="text-black w-full bg-white h-[40px] lg:h-[70px] border-none font-regular rounded-lg text-[12px] lg:text-[20px] px-5 lg:px-10 mb-[15px] lg:mb-[40px] shadow-lg"
                >

                <button @click.prevent="register" class="flex justify-center items-center bg-[#EDB046] h-[40px] lg:h-[70px] w-[200px] font-regular text-[14px] lg:text-[20px] mt-5 lg:mt-10 rounded-lg">
                    Sign In
                </button>
            </form>
            <div class="text-center mt-5 font-regular text-[12px] lg:text-[20px]">
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
    import {useRouter} from "vue-router";

    const router = useRouter()

    const data = reactive({
        register: true
    })

    const register = () => {
      router.push('/office')
    }

    const auth = () => {
      router.push('/office')
    }

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