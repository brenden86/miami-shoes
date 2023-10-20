
const toggleIcon = document.querySelector('.mobile-nav-toggle');
const navContainer = document.querySelector('#mobile-nav-container')

toggleIcon.addEventListener('click', () => {
  toggleIcon.classList.toggle('active');
  navContainer.classList.toggle('show');
})