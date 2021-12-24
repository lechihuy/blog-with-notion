const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  mode: 'jit',
  purge: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/**/*.vue',
    './app/Services/**/*.php',
  ],

  theme: {
    extend: {
      screens: {
        xs: '460px',
      },
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans],
        logo: ["'Niconne'", 'cursive']
      },
    },
  },

  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/line-clamp'),
  ],
};