import './bootstrap';
import '../css/app.css';
import 'vuetify/styles' // Global CSS has to be imported
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
const vuetify = createVuetify({
    components,
    directives,
})

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin).use(vuetify)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});


InertiaProgress.init({ color: '#4B5563' });
