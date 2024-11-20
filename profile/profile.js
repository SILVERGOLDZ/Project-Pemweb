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

const button_user = document.getElementById("user-button");
const getA = document.querySelector("#profile-change input")
const getB = document.querySelector("#profile-change h2")
function showInput(){

    getA.style.display = '';
    getB.style.display = 'none';

    document.querySelector("#submitButton").style.display = '';
    button_user.style.display = 'none';

}
function hideInput() {
    // Find the input element
    const input = document.querySelector("input[name='username']");
    
    // Add 'display: none' to its style
    if (input) {
        input.style.display = "none";
    }

    // Optionally, hide the submit button too
    button_user.style.display = '';
    document.querySelector("#submitButton").style.display = 'none';
}