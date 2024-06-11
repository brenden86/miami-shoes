
const faqHeaders = document.querySelectorAll('.accordion-header');

export function toggleAccordion(accordionHeader) {
  // show/hide FAQ body
  accordionHeader.nextElementSibling.classList.toggle('show');
  // toggle button states
  if(accordionHeader.firstElementChild.classList.contains('active')) {
    accordionHeader.firstElementChild.classList.remove('active')
    accordionHeader.firstElementChild.setAttribute('aria-expanded', 'false');
  } else {
    accordionHeader.firstElementChild.classList.add('active')
    accordionHeader.firstElementChild.setAttribute('aria-expanded', 'true');
  }
}

faqHeaders.forEach(el => {
  el.addEventListener('click', () => {
    toggleAccordion(el);
  })
})

