import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/filterElement.ts',
                'resources/js/productList.ts',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            // this is required for the SCSS modules
            find: /^~(.*)$/,
            replacement: '$1',
        }
    }
});
