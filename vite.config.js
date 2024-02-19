import {defineConfig, splitVendorChunkPlugin} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/typer.js',
                'resources/js/bootstrap.js',
                'resources/js/header.js',
                'resources/js/observer.js',
                'resources/js/theme.js',
                'resources/js/glitch.js'
            ],
            refresh: true
        }),
        splitVendorChunkPlugin()
    ],
});
