const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: ['class', '[data-mode="light"]'],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                indigo: {
                  '50':  '#f9fafb',
                  '100': '#f0f1f9',
                  '200': '#dedaf3',
                  '300': '#bdb5e1',
                  '400': '#9e8aca',
                  '500': '#8266b3',
                  '600': '#694a97',
                  '700': '#4e3773',
                  '800': '#35254e',
                  '900': '#1e172d',
                },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [require('@tailwindcss/forms')],
};
