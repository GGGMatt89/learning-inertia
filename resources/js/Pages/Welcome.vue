<script setup>
defineProps({
    name: String,
    frameworks: Array
})
</script>

<template>
    <h1>Hello, {{ name }}</h1>

    <p>We will use the following:</p>
    <ul>
        <li v-for="framework in frameworks" v-text="framework"></li>
    </ul>
</template>
