import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css','resources/js/app.js', // fakadi
                'resources/assets/css/style.css',
                ...(await import('glob')).sync("resources/assets/vendor/aos/*.js", { ignore: 'resources/assets/vendor/aos/*.esm.*' }),
                ...(await import('glob')).sync("resources/assets/vendor/aos/*.css", { ignore: 'resources/assets/vendor/aos/*.esm.*' }),
                
                ...(await import('glob')).sync("resources/assets/vendor/bootstrap/css/*.css", { ignore: 'resources/assets/vendor/bootstrap/*.esm.*' }),
                ...(await import('glob')).sync(
                    [
                        "resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"
                    ]),
            
                
                ...(await import('glob')).sync("resources/assets/vendor/bootstrap-icons/*.css", { ignore: 'resources/assets/vendor/bootstrap-icons/*.esm.*' }),
                ...(await import('glob')).sync("resources/assets/vendor/bootstrap-icons/*.js", { ignore: 'resources/assets/vendor/bootstrap-icons/*.esm.*' }),
            
                
                ...(await import('glob')).sync("resources/assets/vendor/boxicons/css/*.css", { ignore: 'resources/assets/vendor/boxicons/*.esm.*' }),
                ...(await import('glob')).sync("resources/assets/vendor/boxicons/*.js", { ignore: 'resources/assets/vendor/boxicons/*.esm.*' }),
            
                
                ...(await import('glob')).sync("resources/assets/vendor/glightbox/css/*.css", { ignore: 'resources/assets/vendor/glightbox/*.esm.*' }),
                ...(await import('glob')).sync("resources/assets/vendor/glightbox/js/*.js", { ignore: 'resources/assets/vendor/glightbox/*.esm.*' }),
             
                ...(await import('glob')).sync("resources/assets/vendor/isotope-layout/*.css", { ignore: 'resources/assets/vendor/isotope-layout/*.esm.*' }),
                ...(await import('glob')).sync("resources/assets/vendor/isotope-layout/isotope.pkgd.min.js"),
             
                
                ...(await import('glob')).sync("resources/assets/vendor/php-email-form/*.css", { ignore: 'resources/assets/vendor/php-email-form/*.esm.*' }),
                ...(await import('glob')).sync("resources/assets/vendor/php-email-form/*.js", { ignore: 'resources/assets/vendor/php-email-form/*.esm.*' }),
                
                
                ...(await import('glob')).sync("resources/assets/vendor/purecounter/*.css", { ignore: 'resources/assets/vendor/purecounter/*.esm.*' }),
                ...(await import('glob')).sync("resources/assets/vendor/purecounter/*.js", { ignore: 'resources/assets/vendor/purecounter/*.esm.*' }),
                
                
                ...(await import('glob')).sync("resources/assets/vendor/remixicon/*.css", { ignore: 'resources/assets/vendor/remixicon/*.esm.*' }),
                ...(await import('glob')).sync("resources/assets/vendor/remixicon/*.js", { ignore: 'resources/assets/vendor/remixicon/*.esm.*' }),
                 
                
                ...(await import('glob')).sync("resources/assets/vendor/swiper/*.css", { ignore: 'resources/assets/vendor/swiper/*.esm.*' }),
                ...(await import('glob')).sync("resources/assets/vendor/swiper/swiper-bundle.min.js"),
                  
                
            ],
            refresh: true,
        }),
    ],
});
