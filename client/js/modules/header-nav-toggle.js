
const toggleIcon = document.querySelector('.mobile-nav-toggle');
const navContainer = document.querySelector('#mobile-nav-container')

toggleIcon.addEventListener('click', () => {
  toggleIcon.classList.toggle('active');
  navContainer.classList.toggle('show');
})

// brands toggle

const brandsToggle = document.querySelector('#brands-header-mobile');

brandsToggle.addEventListener('click', () => {
  brandsToggle.classList.toggle('active');
  console.log('toggled class')
})