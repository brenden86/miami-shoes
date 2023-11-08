
const faqHeaders = document.querySelectorAll('.accordion-header');

export function toggleAccordion(header) {
  header.nextElementSibling.classList.toggle('show');
  header.firstElementChild.classList.toggle('active');
}

faqHeaders.forEach(el => {
  el.addEventListener('click', () => {
    toggleAccordion(el);
  })
})

