<template>
    <Header :page="data.page"/>
    <div class="flex justify-between flex-wrap gap-0 w-[90%] lg:w-[100%] mx-auto">
        <div class="w-full lg:w-[22%]">
            <Navbar @updatePage="updatePage" :page="data.page"/>
        </div>
        <div class="w-full mt-10 lg:mt-0 lg:w-9/12 border-2 lg:mx-10">
            <Dashboard v-if="data.page === 'Dashboard'" />
            <Active  v-if="data.page === 'Active'"/>
            <Completed  v-if="data.page === 'Completed'"/>
        </div>
    </div>
</template>

<script setup>
import Navbar from "../components/Navbar.vue";
import Header from "../components/Header.vue";
import Dashboard from "../pages/Dashboard.vue";
import Active from "../pages/Active.vue";
import Completed from "../pages/Completed.vue";

import {reactive} from "vue";

const data = reactive({
    page: "Dashboard"
})

const updatePage = (page) => {
    data.page = page
}

</script>

<style scoped>

</style>