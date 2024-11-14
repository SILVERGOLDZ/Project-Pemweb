const noticeDiv = document.querySelector('.notice');
let scrollInterval;
let scrollPosition = 0; 

function startAutoScroll() {
    const slideWidth = noticeDiv.clientWidth;
    const maxScroll = noticeDiv.scrollWidth - slideWidth; 

    scrollInterval = setInterval(() => {

      noticeDiv.scrollTo({
        left: scrollPosition,
        behavior: 'smooth'
      });


      scrollPosition += slideWidth;

    
      if (scrollPosition > maxScroll) {
        scrollPosition = 0;
      }
    }, 5000);
  }

window.addEventListener('load', startAutoScroll);













