module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ["poppins", "sans-serif"],
                poppins: ["inter", "sans-serif"],
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
