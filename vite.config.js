import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/client/style.css',
                'resources/js/client/script.js',
                'resources/css/admin/style.css',
                'resources/js/admin/script.js',
            ],
            refresh: true,
        }),
    ],
    optimizeDeps: {
        include: ['swiper'],
    },
});
