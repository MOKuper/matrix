const defaultTheme = require("tailwindcss/defaultTheme");

const tailwindcss = require("@tailwindcss/forms");
module.exports = {
  theme: {
    screens: {
      xs: "580px",
      sm: "640px",
      // => @media (min-width: 640px) { ... }

      md: "768px",
      mdplus: "900px",
      // => @media (min-width: 768px) { ... }

      lg: "1024px",
      // => @media (min-width: 1024px) { ... }

      xl: "1280px",
      // => @media (min-width: 1280px) { ... }

      "2xl": "1536px"
      // => @media (min-width: 1536px) { ... }
    },
    extend: {
      fontFamily: {
        sans: ["Inter var", ...defaultTheme.fontFamily.sans]
      }
    }
  },
  sourceMap: true,
  plugins: [tailwindcss],
  purge: [
    "./src/**/*.html",
    "./src/**/*.vue",
    "./src/**/*.jsx",
    "./src/**/*.stylus"
  ]
};
