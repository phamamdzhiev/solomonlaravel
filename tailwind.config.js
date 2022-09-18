/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        container: {
            center: true,
            padding: '2rem',
        },
        colors: {
            'main-green': '#94ca15',
            'main-green-dark': '#1B692E',
            'main-orange': '#FE8532',
            'facebook': '#1778F2',
            'instagram': '#C13584',
            'youtube': '#FF0000',
            'orange-100' : '#ffece3',
            'orange-500': '#c05621'
        },
        fontFamily: {
            'body': ['"Raleway"']
        },
        extend: {},
    },
    plugins: [],
}
