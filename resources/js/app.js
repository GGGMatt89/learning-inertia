// import './bootstrap';
import '../css/app.css';
import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/vue3'
import Layout from './Shared/Layout.vue';

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`]
        if(page.default.layout === undefined) {
            page.default.layout = Layout // set the Layout component as default if it is not set in the page
        }
        // page.default.layout = page.default.layout || Layout // set the Layout as default if it is not set in the page or is null
        return page
        // const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        // return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Link', Link) //register component globally
            .component('Head', Head) //register component globally
            .mount(el)
    },
    progress: {
        // The delay after which the progress bar will appear, in milliseconds...
        delay: 250,

        // The color of the progress bar...
        color: '#29d',

        // Whether to include the default NProgress styles...
        includeCSS: true,

        // Whether the NProgress spinner will be shown...
        showSpinner: true,
    },

    title: title => `My App - ${title}`, //defines a template for the head title with the {title} provided in each page

    // ...
})
