/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}"],
  theme: {
    extend: {
      colors: {
        lineColor: "#ececed",
        forestGreen: "#1a2e33",
        lightGrey: "#fafafa",
        creame: "#edebe8",
        darkBlue: "#131c2c",
      },
      fontFamily: {
        sans: ["Karla", "sans-serif"],
      },
      letterSpacing: {
        extraWide: "0.2em",
      },
    },
  },
  plugins: [
    require("@tailwindcss/typography"),
    // ...
  ],
};
