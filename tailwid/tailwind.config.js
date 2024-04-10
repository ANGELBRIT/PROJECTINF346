const colors=require('tailwindcss/colors')
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./dist/*.{html,js}"],
  theme: {
    extend: {
      'cyan':colors.cyan,
      'teal':colors.teal,
    },
  },
  plugins: [],
}

