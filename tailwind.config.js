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
                '700': '#0553b3',
                '600':'#02B2FD'
            },
            'red-custom':{
                '200':'#F12D11',
                '300':'#81030E'
            }
        }
      },
    },
    plugins: [],
  }
