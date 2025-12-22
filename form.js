// Function to display the specified form and hide others
function displayForm(formId) {
    var forms = document.querySelectorAll(".form-container");
    forms.forEach(function (form) {
        if (form.id === formId) {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    });
}

// Function to close the form
function closeForm(formId) {
    var form = document.getElementById(formId);
    form.style.display = "none";
}
