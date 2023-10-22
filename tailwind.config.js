/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {
      animation: {
        'menu-slide': 'down 500ms cubic-bezier(0,.47,.27,.99)',
        'line': 'down 750ms linear forwards',
        'point': 'point 150ms linear forwards',
        'zoom': 'zoom 250ms ease-out forwards',
		'pickaxe': 'pickaxe 1.5s ease-in-out infinite'
      },
      keyframes: {
        down: {
          'from': {
            transform: 'translateY(-100%)'
          },
          'to': {
            transform: 'translateY(0)'
          }
        },
        point: {
          'from': {
            transform: 'scale(0%)'
          },
          'to': {
            transform: 'scale(100%)'
          }
        },
        zoom: {
          'from': {
            transform: 'scale(0.85)'
          },
          'to': {
            transform: 'scale(1)'
          }
        },
		pickaxe: {
		  '0%': {
			transform: 'rotate(0deg)'
		  },
		  '50%': {
			transform: 'rotate(50deg)'
		  },
		  '100%': {
			transform: 'rotate(0deg)'
		  },
		}
      }
    },
  },
  plugins: [
    require('tailwindcss-intersect')
  ],
}

