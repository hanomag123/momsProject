import axios from "axios";

function modalHandler() {
  const modal = document.querySelector(`${this.dataset?.modal}`) || this
  if (modal.classList.contains('regModal') && modal.hidden) {
    disableScroll();
  } else {
    enableScroll();
  }
  if (modal) {
    if (modal.hidden) {
      modal.hidden = !modal.hidden
      modal.style.setProperty('pointer-events', 'auto');
      setTimeout(() => {
        modal.style.opacity = 1
      }, 10);
    } else {
      modal.style.opacity = 0
      modal.style.setProperty('pointer-events', null);
      const numb = Number(getComputedStyle(modal).transitionDuration.match(/(\d+\.\d+)|(\d+)/g)[0]);
      if (numb > 0) {
        modal.addEventListener('transitionend', hideaftertransition);
      } else {
        modal.hidden = true
      }
    }
  }
}

function disableScroll() {
  // Get the current page scroll position;
  const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
  document.documentElement.style.setProperty('scroll-behavior', 'auto');

  // if any scroll is attempted, set this to the previous value;
  window.onscroll = function () {
    window.scrollTo(scrollLeft, scrollTop);
  };
}

function enableScroll() {
  document.documentElement.style.setProperty('scroll-behavior', null);
  window.onscroll = function () { };
}

const feedback = document.getElementById('feedback');
const mail = document.querySelectorAll('.mail-form')

if (mail.length) {
  for (let form of mail) {
    form.addEventListener('submit', function () {
      event.preventDefault();
      axios.post('/form-request', new FormData(this))
        .then(function (response) {
          // handle success
          console.log(response);
          if (feedback) {
            modalHandler.apply(feedback)
          }
        })
        .catch(function (error) {
          // handle error
          console.log(error.response)
        })
    })
  }
}