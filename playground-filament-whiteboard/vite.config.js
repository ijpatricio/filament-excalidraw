import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    define: {
        'process.env.NODE_ENV': JSON.stringify(process.env.NODE_ENV || 'development'),
        'process.env.IS_PREACT': `'false'`,
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/dev-excalidraw.js',
                'resources/css/filament/admin/theme.css',
            ],
            refresh: true,
        }),
    ],
});
