import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            typography: {
                DEFAULT: {
                    css: {
                        h3: {
                            "font-size": "1.5rem",
                            "font-weight": "700",
                            "margin-bottom": "1rem",
                            "text-align": "justify",
                        },
                        p: {
                            "text-align": "justify",
                            "margin-bottom": "1.25rem",
                        },
                        ul: {
                            "text-align": "justify",
                            "margin-bottom": "1.25rem",
                            "list-style-type": "disc",
                            "list-style-position": "inside",
                        },
                        li: {
                            "text-align": "justify",
                        },
                    },
                },
            },
            screens: {
                lgs: "1440px",
                xs: "425px",
                x2s: "375px",
                x3s: "320px",
                lg2: { min: "1204px", max: "1439.9px" },
                "lg-lgs": { min: "1204px", max: "1440px" },
                "md-lg": { min: "768px", max: "1203.9px" },
                "xs-md": { min: "425px", max: "767.9px" },
                "x2s-xs": { min: "375px", max: "424.9px" },
                "x3s-md": { min: "320px", max: "767.9px" },
                "x3s-xs": { min: "320px", max: "424.9px" },
                "x3s-x2s": { min: "320px", max: "374.9px" },
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                custom: ["Montserrat", "Poppins"],
            },
            padding: {
                "1/100": "1%",
                "1.5/100": "1.5%",
                "2/100": "2%",
                "3/100": "3%",
                "3.5/100": "3.5%",
                "4/100": "4%",
                "4.5/100": "4.5%",
                "5.5/100": "5.5%",
                "6.5/100": "6.5%",
            },
            margin: {
                "2/100": "2%",
                "3/100": "3%",
            },
            scale: {
                115: "1.15",
            },
            borderWidth: {
                5: "5px",
            },
        },
    },

    variants: {
        extend: {
            scale: ["group-hover"],
            opacity: ["group-hover"],
        },
    },

    plugins: [
        forms,
        function ({ addComponents }) {
            addComponents({
                ".hero-overlay": {
                    position: "relative",
                },
                ".hero-overlay::before": {
                    content: '""',
                    background: "rgba(0, 0, 0, 0.5)",
                    width: "100%",
                    zIndex: "1",
                    position: "absolute",
                    top: "0",
                    left: "0",
                    right: "0",
                    bottom: "0",
                },
                ".nextButton": {
                    background: "#007bff",
                    color: "#ffffff",
                },
                ".nextButton": {
                    background: "#0056b3",
                },
            });
        },
        typography,
    ],
};
