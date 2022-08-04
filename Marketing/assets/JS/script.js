var headerFunction = document.querySelector(".header-login-user");
var headerFunctionBox = document.querySelector(".login-function");
var overlay = document.querySelector(".overlay");

headerFunction.addEventListener('click', function() {
    overlay.classList.add('open');
    headerFunctionBox.classList.add('open'); 
    // close header box
    overlay.addEventListener('click', function() {
        overlay.classList.remove('open');
        headerFunctionBox.classList.remove('open');
    })

});


// **** contact
// open input contact

var addBtn = document.querySelector(".filter-add-new__btn");
var addForm = document.querySelector(".add-contact-model");
var addForm2 = document.querySelector(".add-group-model");
var formCancel = document.querySelector(".add-contact-btn__cancel");


addBtn.addEventListener('click', function() {
    overlay.classList.add('open');
    addForm.classList.add('open'); 
});
// add input groups
addBtn.addEventListener('click', function() {
    overlay.classList.add('open');
    addForm2.classList.add('open'); 
    // close header box
    formCancel.addEventListener('click', function() {
        overlay.classList.remove('open');
        addForm2.classList.remove('open');
    })

});

// input contact into groups box
var form2_btn = document.getElementsByClassName("open--form2-model");
var form2 = document.querySelector(".add-contact-group-model");

function openForm2() {
    overlay.classList.add('open');
    form2.classList.add("open");
}

for(let i = 0; i < form2_btn.length; i++) {
    form2_btn[i].addEventListener('click', openForm2);
}







// *** groups






// *** contact / groups
var linkIcon = document.querySelectorAll(".link-icon");
var table_function_box = document.querySelectorAll(".table-function-box");
var overlay_second = document.querySelector(".overlay-not-color");

for(let i = 0; i < linkIcon.length; i++) {
    linkIcon[i].addEventListener('click', function() {
        overlay_second.classList.remove('open');
        for(let j = 0; j < table_function_box.length; j++) {
            table_function_box[j].classList.remove("open");
            if(i == j) {
                table_function_box[j].classList.add("open");
                overlay_second.classList.add('open');
            }
        }
    })
    overlay_second.addEventListener('click', function() {
        for(let a = 0; a < table_function_box.length; a++) {
            table_function_box[i].classList.remove("open");
            overlay_second.classList.remove('open');
        }
    });
}










var aaaa = document.querySelector(".aaaa");
