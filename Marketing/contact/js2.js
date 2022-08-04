// input contact into groups box in contact_detail
var openFormContactDetailBtn = document.querySelector(".open--form-addCIG");
var form2 = document.querySelector(".add-contact-group-model");
var overlay = document.querySelector(".overlay");
var overlay2 = document.querySelector(".overlay-not-color");
function openForm2() {
    overlay.classList.add('open');
    form2.classList.add("open");
}
openFormContactDetailBtn.addEventListener("click", openForm2);

//  *** contact_detail
var CDOpenFunctionBtn = document.getElementById("open--function-box");
var CDOpenFunctionBox = document.querySelector(".contact-detail-function-list");
var bb = document.getElementById('open--function-box');

CDOpenFunctionBtn.addEventListener('click', function() {
    CDOpenFunctionBox.classList.add('open');
    overlay2.classList.add("open");
    overlay2.addEventListener('click', function() {
        CDOpenFunctionBox.classList.remove("open");
        overlay2.classList.remove("open");
    })
})

// open form 1 to edit 
var editBtn = document.querySelector(".open-edit-form-btn");
var Form1 = document.querySelector(".add-contact-model");


editBtn.addEventListener('click', function() {
    overlay.classList.add('open');
    Form1.classList.add('open'); 
});