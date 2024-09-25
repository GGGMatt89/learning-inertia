<script setup>
import Nav from './Nav.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <Head>
        <title>My App</title> <!--default value if it is not defined in the child page-->
        <meta type="description" content="Information about my app" head-key='description'>
<!--        adding the head-key property allows to overwrite this tag in the pages by passing the same head-key - without the head-key, a new <meta> is simply added to the head -->
    </Head>
    <section class="p-6 bg-gray-200">
    <header class="flex justify-between">
        <div class="flex items-center">
        <h1 class="font-bold text-lg">My App</h1>
            <p class="text-sm ml-4">Welcome back, {{ $page.props.auth.user.username }}</p>
<!--            From shared data, see "share" method in HandleInertiaRequest middleware-->
        </div>
        <Nav />
    </header>

    </section>

    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot />
        </div>
    </section>
</template>
