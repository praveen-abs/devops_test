/** @type {import('tailwindcss').Config} */
const plugin = require('tailwindcss/plugin')
module.exports = {
    content: [
        // "./node_modules/flowbite/**/*.js",
        // 'node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx}',
        // 'node_modules/flowbite/**/*.{js,jsx,ts,tsx}',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        plugin(function ({ addComponents, theme }) {
            addComponents({
                '.tw-card': {
                    backgroundColor: theme('colors.white'),
                    borderRadius: theme('borderRadius.lg'),
                    padding: theme('spacing.4'),
                    boxShadow: theme('boxShadow.xl'),
                }
            })
        })
    ],
}
