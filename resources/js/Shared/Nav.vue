<script setup>
import { Link } from "@inertiajs/vue3";
import NavLink from "@/Shared/NavLink.vue";

</script>

<template>
    <nav>
        <ul class="flex space-x-6">
            <li><NavLink href="/" :active="$page.component === 'Home'">Home</NavLink></li>
            <li><NavLink href="/users" :active="$page.component === 'Users'">Users</NavLink></li>
            <li><NavLink href="/settings" :active="$page.component === 'Settings'">Settings</NavLink></li>
            <li><NavLink href="/logout" method="post" as="button">Log Out</NavLink></li>
        </ul>
    </nav>
</template>



<!-- EXAMPLE: ACTIVE STATE SETTINGS FOR LINKS
// URL exact match...
<Link href="/users" :class="{ 'active': $page.url === '/users' }">Users</Link>

// Component exact match...
<Link href="/users" :class="{ 'active': $page.component === 'Users/Index' }">Users</Link>

// URL starts with (/users, /users/create, /users/1, etc.)...
<Link href="/users" :class="{ 'active': $page.url.startsWith('/users') }">Users</Link>

// Component starts with (Users/Index, Users/Create, Users/Show, etc.)...
<Link href="/users" :class="{ 'active': $page.component.startsWith('Users') }">Users</Link>-->
