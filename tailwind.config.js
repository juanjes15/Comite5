import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito Sans', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'pattern': 'url("/public/img/pattern.png")',
            },
            colors: {
                'gray1': '#545454',
                'gray2': '#69747C',
                'mint1': '#E6EFE9',
                'mint2': '#C5F4E0',
                'sena': {
                    100: '#C3FFA5',
                    200: '#A0F79C',
                    300: '#78E38D',
                    400: '#50CE7E',
                    500: '#39A900',
                    600: '#2C800D',
                    700: '#1E5E00',
                    800: '#104100',
                    900: '#002500',
                },
            },
        },

        plugins: [forms],
    },
};
