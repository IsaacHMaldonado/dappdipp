const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');
module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],


    theme: {
        extend: {
            fontFamily: {
                'mont':['Montserrat']

            },
            colors:{
                SSAgreen:{
                    100: '#619083',
                    200: '#3E7566',
                    300: '#285C4E',
                    400: '#164D3E',
                    500: '#13322B',
                },
                SSAred:{
                    100: '#DA7090',
                    200: '#B84165',
                    300: '#9D2449',
                    400: '#7F0C2F',
                    500: '#521132',
                },
                SSAgold:{
                    100: '#D4C19C',
                    200: '#D7B78D',
                    300: '#B38E5D',
                    400: '#8F6B3B',
                    500: '#744F1E',
                },
                SSAwine:{
                    100: '#9B6269',
                    200: '#653D42',
                    300: '#56242A',
                    400: '#421317',
                    500: '#4E232E',
                },
            },
            backgroundImage: theme=>({
                'imgBackGround':"url('/img/img-bg-aguila.png')",
                'img-Logo-back':"url('/img/Logo_DAPP.png')",
            }),
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
