import { defineConfig } from 'vite';
import { fileURLToPath, URL } from "url";
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/scss/style.scss',
                'resources/js/main.js',
                'resources/js/mail.js',
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/js/filter.js'
            ],
            refresh: true,
        }),
    ],
    resolve: {
      alias: [
        { find: '@', replacement: fileURLToPath(new URL('./public', import.meta.url)) },
      ]
    }
});
