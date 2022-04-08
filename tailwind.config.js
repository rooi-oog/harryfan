module.exports = {
  content: [
      "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
      "./storage/framework/views/*.php",
      "./resources/views/**/*.blade.php",
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {

        colors: {
            'dark-600': '#252A37',
            'dark-700': '#171923',
            'dark-800': '#12141C',
            'dark-900': '#0D0C12',
        },
    },
  },
    plugins: [require('@tailwindcss/forms')],
}
