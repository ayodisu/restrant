import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: [
                "resources/views/**/*.blade.php",
                "routes/**/*.php",
                "app/**/*.php",
            ],
        }),
    ],
    server: {
        host: "0.0.0.0",
        port: 5173,
        strictPort: true,
        hmr: {
            host: "localhost",
            protocol: "ws",
        },
        cors: true,
    },
});
