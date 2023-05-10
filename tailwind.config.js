/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],

    darkMode: 'class',
    theme: {
        extend: {
            colors: {
              primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a"}
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


