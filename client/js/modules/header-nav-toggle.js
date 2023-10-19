
const toggleIcon = document.querySelector('.nav-toggle-icon');
const navContainer = document.querySelector('#mobile-nav-container')

toggleIcon.addEventListener('click', () => {
  toggleIcon.classList.toggle('active');
  navContainer.classList.toggle('show');
})