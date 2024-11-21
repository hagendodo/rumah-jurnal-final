import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primeBlue: "#008ed6",
                primeGreen: "#3dbc21",
                primeYellow: "#e0e24a",
                primeGray: "#3b3d41",
                secondGray: "#4d5053",
                sinta1: "#5cbc21",
                sinta2: "#007dbd",
                sinta3: "#e8e74b",
                sinta4: "#ffc107",
                sinta5: "#ff9800",
                sinta6: "#ff5722",
                sintaAll: "#7e7e7e",
                sintaNot: "#fc2828",
            },
        },
    },
    plugins: [],
};
