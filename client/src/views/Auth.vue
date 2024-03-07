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

            <p class="text-center text-red text-[14px] lg:text-[20px] text-red-600 mt-2 lg:mt-5">{{ data.errors.message }}</p>

            <form class="mt-5 lg:mt-10 flex justify-center flex-wrap">

                <p class="text-[12px] lg:text-[20px] mb-1 lg:mb-3 text-red-600">{{data.errors.login ? data.errors.login[0] : "" }}</p>
                <input
                    v-model="data.login"
                    type="text"
                    placeholder="Login"
                    name="login"
                    class="text-black w-full bg-white h-[40px] lg:h-[70px] border-none font-regular rounded-lg text-[12px] lg:text-[20px] px-5 lg:px-10 mb-[15px] lg:mb-[40px]"
                >

                <p class="text-[12px] lg:text-[20px] mb-1 lg:mb-3 text-red-600">{{data.errors.password ? data.errors.password[0] : "" }}</p>
                <input
                    v-model="data.password"
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

        <div  v-else class="absolute border-2 lg:w-[50%] rounded-3xl bg-white top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] p-8">
            <div class="text-center">
                <h1 class="font-bold text-[30px] lg:text-[60px] text-[#BA5112]">
                    To-Do App
                </h1>
                <p class="font-regular text-[12px] lg:text-[20px]">
                    Start organizing your life day by day
                </p>
            </div>

            <p class="text-center text-red text-[14px] lg:text-[20px] text-red-600 mt-2 lg:mt-5">{{ data.errors.message }}</p>

            <form class="mt-5 lg:mt-20 flex justify-center flex-wrap">
                <p class="text-[12px] lg:text-[20px] mb-1 lg:mb-3 text-red-600">{{data.errors.login ? data.errors.login[0] : "" }}</p>
                <input
                    v-model="data.login"
                    type="text"
                    placeholder="Login"
                    name="login"
                    class="text-black w-full bg-white h-[40px] lg:h-[70px] border-none font-regular rounded-lg text-[12px] lg:text-[20px] px-5 lg:px-10 mb-[15px] lg:mb-[40px] shadow-lg"
                >

                <p class="text-[12px] lg:text-[20px] mb-1 lg:mb-3 text-red-600">{{data.errors.password ? data.errors.password[0] : "" }}</p>
                <input
                    v-model="data.password"
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
    import {useStore} from '../store/store'; // Предполагая, что ваш store.js находится в каталоге store, который расположен на один уровень выше текущего файла


    const router = useRouter()
    const store = useStore()

    const data = reactive({
      register: true,
      login: "",
      password: "",
      errors: {
        message: "",
        login: [],
        password: []
      }
    })

    const register = async () => {
      try {
        let user = {
          login: data.login,
          password: data.password
        };

        data.errors = {
          message: "",
          login: [],
          password: []
        }

        const res = await store.register(user);

        if (res.status === 412) {
          data.errors.login = res.data.errors.login ?? '';
          data.errors.password = res.data.errors.password ?? '';
        }

        if (res.status === 400) {
          data.errors.message = res.data.error.message
        }

        if (res.status === 200) {
          localStorage.setItem('token', res.data.token)
          await router.push('/office')
        }
      } catch (error) {
        console.error('Error occurred:', error);
      }
    }

    const auth = async () => {
      try {
        let user = {
          login: data.login,
          password: data.password
        };

        data.errors = {
          message: "",
          login: [],
          password: []
        }

        const res = await store.login(user);

        if (res.status === 412) {
            data.errors.login = res.data.errors.login ?? '';
            data.errors.password = res.data.errors.password ?? '';
        }

        if (res.status === 400) {
            data.errors.message = res.data.error.message
        }

        if (res.status === 200) {
          localStorage.setItem('token', res.data.token)
          await router.push('/office')
        }
      } catch (error) {
        console.error('Error occurred:', error);
      }

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