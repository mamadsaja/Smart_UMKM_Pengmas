/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
  safelist: [
    'opacity-0',
    'opacity-100',
    'group-hover:opacity-100',
    'group-hover:translate-y-0',
    'translate-y-2',
    'transition-all',
    'duration-300',
    'ease-in-out',
    'z-10',
    'absolute',
    'bottom-4',
    'left-0',
    'right-0',
    'px-4',
    'fixed',
    'md:block',
    'md:relative',
    'md:min-h-screen',
    'md:w-64',
    'w-64',
    'bg-white',
    'text-gray-800',
    'p-6',
    'shadow-md',
    'border-r',
    'border-gray-100',
    'inset-y-0',
    'left-0',
    'transform',
    '-translate-x-full',
    'md:translate-x-0',
    'transition-transform',
    'duration-300',
    'z-50',
    'z-40',
    'overflow-y-auto',
    'pb-24',
    // Tambahkan class lain yang digunakan pada tombol/card
  ],
}