<script setup>
// import { Link } from '@inertiajs/vue3'; registered globally
import Layout from '../Shared/Layout.vue';

defineProps({
    time: String

})
</script>

<template>
    <Layout>
        <h1 class="text-2xl font-bold">Users</h1>

        <div style="margin-top: 800px">
            <p>The current time is: {{ time }}</p>
        </div>
        <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
        <!--    preserving the scroll vertical position of the page when clicking on this link
        EXAMPLES: like button in posts, table layouts setting filters, etc.-->
    </Layout>

</template>
