import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/dist/css/adminlte.min.css',
                'resources/dist/js/adminlte.min.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
