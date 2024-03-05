<template>
    <Header />
    <div class="flex justify-between gap-0 w-[90%] lg:w-[100%] mx-auto">
        <div class="w-full lg:w-1/6">
            <Navbar/>
        </div>
        <div class="lg:w-5/6">
        </div>
    </div>
</template>

<script setup>
import Navbar from "../components/Navbar.vue";
import Header from "../components/Header.vue";

</script>

<style scoped>

</style>