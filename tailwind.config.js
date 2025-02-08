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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#1D4ED8',   // Azul
                secondary: '#F59E0B',  // Amarillo
                danger: '#EF4444',     // Rojo
                success: '#10B981',    // Verde
            },
            // Agregar más personalizaciones si lo necesitas
        },
    },

    plugins: [forms],
};
