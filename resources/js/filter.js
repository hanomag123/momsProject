import {createApp} from 'vue'
import customFilter from './components/customFilter.vue';
import { TailwindPagination, Bootstrap5Pagination } from 'laravel-vue-pagination';

const app = createApp(customFilter)
app.component('Pagination', Bootstrap5Pagination)
app.mount("#vueFilter");