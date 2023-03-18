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
                indigo: {
                    '50':  '#fafbfa',
                    '100': '#f3f1f7',
                    '200': '#e5d9ee',
                    '300': '#c9b3d8',
                    '400': '#b087bc',
                    '500': '#9462a1',
                    '600': '#784782',
                    '700': '#5a3560',
                    '800': '#3d2440',
                    '900': '#221625',
                }
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [require('@tailwindcss/forms')],
};
