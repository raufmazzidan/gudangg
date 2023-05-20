module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        colors: {
            grey: "#ced4da",
            black: "#171717",
            "grey-light": "#f8f9fa",
            "grey-dark": "#6c757d",
            pink: "#C92C6D",
            "pink-dark": "#B42762",
            red: "#e5383b",
            white: "#ffffff",
            yellow: "#f0ad4e",
            green: "#66bb6a",
            blue: "#0E86D4",
        },
        extend: {
            minWidth: {
                "2/5": "60%",
            },
        },
    },
    plugins: [],
};
