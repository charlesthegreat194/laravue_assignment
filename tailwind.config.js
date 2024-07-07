import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                popins: ['"Poppins", sans-serif'],
                anton: ['"Anton SC", sans-serif'],
            },
            colors: {
                semiblack: ['#060606'],
                semired: ['#EF4444'],
            }
        },
    },

    plugins: [forms],
};
