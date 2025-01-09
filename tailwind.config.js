import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/livewire/livewire/src/**/*.blade.php'
    ],


    theme: {
        extend: {
            fontFamily: {
                bebas: ['Bebas Neue', 'sans-serif'],
                fira: ['Fira Sans', 'sans-serif'],
                gloock: ['Gloock', 'serif'],
                merriweather: ['Merriweather', 'serif'],
                outfit: ['Outfit', 'sans-serif'],
                poetsen: ['Poetsen One', 'sans-serif'],
                uncia: ['Uncial Antiqua', 'serif'],
                work: ['Work Sans', 'sans-serif'],
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
