/** @type {import('tailwindcss').Config} */

module.exports = {
    //...
    plugins: [require("daisyui")],

    daisyui: {
        themes: ["light", "synthwave"],
    },

    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {},
    },
}


