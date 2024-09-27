<script setup>
// import { Link } from '@inertiajs/vue3'; //registered globally
// import Layout from '../Shared/Layout.vue'; //imported as default from app.js
// import { Head } from '@inertiajs/vue3'; // imported globally
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import Paginator from "@/Shared/Paginator.vue";
import throttle from 'lodash/throttle'; //to execute a method at least once every x ms
//import debounce from 'lodash/debounce'; //to execute a method once after x ms -> example: one single request when I stop typing in the search input for 500 ms


let props = defineProps({
    time: String,
    users: Object,
    filters: Object,
    can: Object

});

let search = ref(props.filters.search); //initialized to any search parametry in the query string, if present, accepted as prop from the BE
watch(search, throttle(function (value) {
    console.log('input');
    router.get('/users', {search: value}, {
        preserveState: true, //preserving the state after the request
        replace: true //replaces the old request with the new in the browser history
    }); // this would trigger a page reload without the preserveState option set to true, it is equivalent to a click on a Link component -> search field is erased
}, 500));

//defineOptions({ layout: Layout });

</script>

<template>
    <Head>
        <title>Users</title>
    </Head>

    <div class="flex justify-between mb-6">
        <div class="flex items-center">
            <h1 class="text-2xl font-bold">Users</h1>
            <Link v-if="can.createUser" href="/users/create" class="text-blue-500 text-sm ml-3">New User</Link>
        </div>
        <input v-model="search" type="text" placeholder="Search..." class="border px-2 rounded-lg "/>
    </div>

    <ul role="list" class="divide-y divide-gray-100">
        <li class="flex justify-between gap-x-6 py-5" v-for="user in users.data" :key="user.id">
            <div class="flex min-w-0 gap-x-4">
                <Link :href="`/users/${user.id}`">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{user.name}}</p>
                    </div>
                </Link>
            </div>
            <div v-if="user.can.edit" class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                <Link :href="`/users/${user.id}/edit`" class="text-sm text-indigo-600 hover:text-indigo-900">Edit</Link>
            </div>
        </li>
    </ul>

<Paginator :links="users.meta.links" class="mt-6"></Paginator>

        <div style="margin-top: 800px">
            <p>The current time is: {{ time }}</p>
        </div>
        <Link href="/Index" class="text-blue-500" preserve-scroll>Refresh</Link>
        <!--    preserving the scroll vertical position of the page when clicking on this link
        EXAMPLES: like button in posts, table layouts setting filters, etc.-->
</template>
