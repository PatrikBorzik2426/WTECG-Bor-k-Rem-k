const menu = document.getElementById('menu');
const menuToggle = document.getElementById('menuToggle');
const menuClose = document.getElementById('menuClose');

menuToggle.addEventListener('click', () => {
  menuToggle.classList.toggle('max-lg:block');
  menu.classList.toggle('hidden');
  menuClose.classList.toggle('hidden');
});

menuClose.addEventListener('click', () => {
  menuToggle.classList.toggle('max-lg:block');
  menu.classList.toggle('hidden');
  menuClose.classList.toggle('hidden');
});


