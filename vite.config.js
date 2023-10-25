import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/header.js',
                'resources/js/observer.js',
                'resources/js/theme.js',
                'resources/js/md/markdown-editor.js',
                'resources/js/md/markdown-parse.js',
            ],
            refresh: true
        }),
    ],
});
