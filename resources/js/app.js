// import './bootstrap';

import Typed from 'typed.js';

const image_profile = document.getElementById('img_profile');

image_profile.addEventListener('mousemove', (e) => {
  let [x, y] = [
    e.offsetX - image_profile.offsetWidth / 2,
    e.offsetY - image_profile.offsetHeight / 2
  ];

  const sensitivity = 15;

  image_profile.style.transform = "rotateX(" + (y / sensitivity) + "deg) rotateY(" + (-x / sensitivity) + "deg) scale(1.05)";
});

image_profile.addEventListener('mouseout', () => {
  image_profile.style.transform = "scale(1)";
})

new Typed('#name', {
  stringsElement: '#typed_name',
  typeSpeed: 50,
  cursorChar: '_'
});

new Typed('#desc', {
  strings: ['Étudiant de 1ère année de BTS SIO'],
  typeSpeed: 16,
  cursorChar: '_'
});