/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",],
    theme: {
        extend: {},
        screens: {
            'tablet': '768px',
            'laptop': '1024px',
            'laptop-l': '1440px',
            'desktop': '1920px',
        }
    },
    plugins: [],
}
// 1536 x 864
// patokan
// - mobile w-full
// - table 672px w-2xl
// - laptop 1440px w-4xl

