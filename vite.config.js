import { defineConfig } from 'vite';
import { fileURLToPath, URL } from "url";
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/style.scss',
                'resources/js/main.js',
                'resources/js/vendor.js',
                'resources/js/mail.js',
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
