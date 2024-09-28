<script setup>
//import Layout from "../Shared/Layout.vue";//imported as default from app.js
//import { Head } from '@inertiajs/vue3';// imported globally

import Highlight from "@/Components/Highlight.vue";

defineProps({

});
//defineOptions({ layout: Layout });

let snippet = `
 class Example2
                {

                    public function __construct()
                    {
                        //
                    }

                }
`.trim();


</script>



<template>
    <Head>
        <title>Home</title>
        <meta type="description" content="Information about my app home page" head-key='description'>
    </Head>
    <h1 class="text-2xl font-bold">Home</h1>


    <Highlight :code="snippet" />


</template>
