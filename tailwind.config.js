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
    ],

    theme: {
        extend: {
            colors: {
                // buttonColor0: "#8E5088",
                // customColor: "rgb(59 130 246)",
                customColor: "#DC2626",
                // customColor: "#17317F",
                'themeColor': '#041643',
                'normalText': '#939393',
                'lightTheme': '#ececec',
                'boldText': '#000000',
                'lightGreen': '#eaffe0',
                'darkGreen': '#005f31',
                'lightBlue': '#e0e9ff',
                'darkBlue': '#00265f',


                'linkColor': '#1352f1',
                'white': '#ffffff',
            },
            fontFamily: {
                'montserrat': ['Montserrat', 'sans-serif'],
                'customeFont':["Karla", 'sans-serif'],

            },
            button: {
                base: 'px-4 py-2 rounded',
                primary: 'bg-blue-500 hover:bg-blue-600 text-white',
                secondary: 'bg-gray-500 hover:bg-gray-600 text-white',
                // Add more button styles as needed
              },
        },
    },

    plugins: [forms, typography],
};
