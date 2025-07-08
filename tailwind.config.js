module.exports = {
    mode: "jit",
    purge: ["./public/**/*.{html,js}"],
    darkMode: false, // or 'media' or 'class'
    theme: {
        colors: {
            "gray-100": "#f3f4f6",
            "gray-200": "#e5e7eb",
            "gray-300": "#d1d5db",
            "gray-400": "#9ca3af",
            "gray-500": "#6b7280",
            "gray-600": "#4b5563",
            "gray-700": "#374151",
            "gray-800": "#1f2937",
            "gray-900": "#111827",

            "blue-50": "#eff6ff",
            "blue-100": "#dbeafe",
            "blue-200": "#bfdbfe",
            "blue-300": "#93c5fd",
            "blue-400": "#60a5fa",
            "blue-500": "#3b82f6",
            "blue-600": "#2563eb",
            "blue-700": "#1d4ed8",
            "blue-800": "#1e40af",
            "blue-900": "#1e3a8a"
        },
        screens: {
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1200px",
            "2xl": "1200px"
        },
        container: {
            center: true,
            padding: "1rem"
        },
        fontFamily: {
            heading: ["Poppins, sans-serif"],
            body: ["Montserrat, sans-serif"]
        },
        boxShadow: {
            sm: "0 1px 2px 0 rgba(0, 0, 0, 0.05)",
            DEFAULT: "0px 2px 4px rgba(148, 163, 184, 0.05), 0px 6px 24px rgba(235, 238, 251, 0.4)",
            md: "0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)",
            lg: "0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)",
            xl: "0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)",
            "2xl": "0 25px 50px -12px rgba(0, 0, 0, 0.25)",
            "3xl": "0 35px 60px -15px rgba(0, 0, 0, 0.3)",
            inner: "inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)",
            none: "none"
        },
        fontSize: {
            xs: ".75rem",
            sm: ".875rem",
            tiny: ".875rem",
            base: "1rem",
            lg: "1.125rem",
            xl: "1.25rem",
            "2xl": "1.5rem",
            "3xl": "1.875rem",
            "4xl": ["2.25rem", "3.2rem"],
            "5xl": ["3rem", "4rem"],
            "6xl": ["4rem", "1rem"],
            "7xl": ["5rem", "1rem"]
        },
        extend: {
            colors: {
                white: "#ffffff",
                body: "#1e293b",

                "blueGray-50": "#f8fafc",
                "blueGray-100": "#f1f5f9",
                "blueGray-200": "#e2e8f0",
                "blueGray-300": "#cbd5e1",
                "blueGray-400": "#94a3b8",
                "blueGray-500": "#64748b",
                "blueGray-600": "#475569",
                "blueGray-700": "#334155",
                "blueGray-800": "#1e293b",
                "blueGray-900": "#0f172a"
            },
            height: {
                "128": "32rem"
            },
        }
    },
    important: true,
    variants: {
        extend: {}
    },
    plugins: []
};
