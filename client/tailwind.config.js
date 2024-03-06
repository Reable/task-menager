/** @type {import('tailwindcss').Config} */
export default {
  purge: ['*.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  content: [],
  theme: {
    screens: {
      usm: '340px',
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
      '2xl': '1536px'
    },
    fontFamily: {
      regular: "Lexend-Regular",
      bold: "Lexend-Bold",
    },
    extend: {
    },
  },
  plugins: [],
}

