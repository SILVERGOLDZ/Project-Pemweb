const swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 3, 
    spaceBetween: 30,
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    breakpoints: {
                0: {
                    slidesPerView: 1, // Mobile: 1 slide
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2, // Tablet: 2 slides
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3, // Desktop: 3 slides
                    spaceBetween: 30,
                },
            },
});

//FLipping Card
const cards = document.querySelectorAll('.card');

// button visibility
function updateFlipButtonVisibility() {
    cards.forEach((card, index) => {
        const flipButton = card.querySelector('.flip-button');
        if (index === swiper.activeIndex) {
            flipButton.classList.remove('hidden');
        } else {
            flipButton.classList.add('hidden');
        }
    });
}

// Initial visibility update
updateFlipButtonVisibility();

cards.forEach((card) => {
    const flipButton = card.querySelector('.flip-button');

    // Flip Button Click
    flipButton.addEventListener('click', (event) => {
        event.stopPropagation(); // Prevent triggering card click
        card.classList.add('flipped');
        flipButton.classList.add('hidden'); // Hide button after flip
    });

    // Card Click to Reset
    card.addEventListener('click', () => {
        if (card.classList.contains('flipped')) {
            card.classList.remove('flipped');
            if (card === cards[swiper.activeIndex]) {
                flipButton.classList.remove('hidden'); // Show button for active card
            }
        }
    });
});

// Update visibility on slide change
swiper.on('slideChange', () => {
    updateFlipButtonVisibility();
    cards.forEach((card) => {
        card.classList.remove('flipped'); // Reset flipped state
    });
});
