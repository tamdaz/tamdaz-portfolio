import Observer from 'tailwindcss-intersect';

try {
    Observer.start();
} catch (e) {
    console.log(e);
}
