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

function showInput(formId,submitId, buttonId){
    let button_user = document.getElementById(buttonId);
    let getA = document.querySelector(`#${formId} input`);
    let getB = document.querySelector(`#${formId} h2`);

    getA.style.display = '';
    getB.style.display = 'none';

    document.querySelector(`#${submitId}`).style.display = '';
    button_user.style.display = 'none';

}
function hideInput(inputName, submitId,buttonId) {
    let button_user = document.getElementById(buttonId);

    const input = document.querySelector(`input[name='${inputName}']`);
    
  
    if (input) {
        input.style.display = "none";
    }

 
    button_user.style.display = '';
    document.querySelector(`#${submitId}`).style.display = 'none';
}