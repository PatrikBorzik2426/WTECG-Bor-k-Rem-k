/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/**/*.php",

  ],
  theme: {
    extend: {
      fontFamily:{
        'manrope': ['manrope', 'sans-serif']
      },
      colors:{
        'light-green': '#E0F0EA',
        'light-grey': '#95ADBE',
        'light-purpel': '#571F4D',
        'purple': '#503A65',
        'dark-purple' : '#3C2A4D',
        'black' : '#121212',
        'white' : '#F0F0F0'
      }
    },
  },
  plugins: [],
}

