// JavaScript untuk Tag Interaksi
document.addEventListener('DOMContentLoaded', () => {
    const tags = document.querySelectorAll('.tag'); // Ambil semua elemen tag
    const inputSearch = document.getElementById('search'); // Input pencarian

    tags.forEach(tag => {
        tag.addEventListener('click', () => {
            // Toggle class 'active' untuk tag yang dipilih
            if (tag.classList.contains('active')) {
                tag.classList.remove('active');
            } else {
                tag.classList.add('active');
            }

            // Perbarui input pencarian dengan tag yang dipilih
            updateSearchInput();
        });
    });

    function updateSearchInput() {
        const activeTags = document.querySelectorAll('.tag.active'); // Ambil semua tag aktif
        const selectedValues = Array.from(activeTags).map(tag => tag.dataset.value); // Ambil nilai 'data-value' dari tag aktif
        inputSearch.value = selectedValues.join(', '); // Gabungkan tag dengan koma
    }
});
