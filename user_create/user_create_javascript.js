const fileInput = document.getElementById('image');
    const preview = document.getElementById('upload-preview');

    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                preview.src = e.target.result; // Update image preview
            };
            reader.readAsDataURL(file);
        }
    });