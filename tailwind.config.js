/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
            'azul-custom':{
                '1000': '#132748',
                '700': '#0553b3'
            }
        }
      },
    },
    plugins: [],
  }
