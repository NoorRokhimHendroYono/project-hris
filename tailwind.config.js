/** @type {import('tailwindcss').Config} */
export default {
    content: [
      './resources/views/**/*.blade.php',
      './resources/js/**/*.js',
      './resources/css/**/*.css',
    ],
    theme: {
      extend: {
        fontFamily: {
          sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui'],
        },
      },
    },
    plugins: [],
  }
  
  // tailwind.config.js
module.exports = {
  theme: {
    extend: {
      colors: {
        'primary': '#4a90e2', // Contoh warna biru kustom
        'orange': '#f5a623', // Contoh warna orange kustom
        'purple': '#6a3ab2', // Warna ungu dari contoh tombol Anda
      }
    },
  },
  plugins: [],
}