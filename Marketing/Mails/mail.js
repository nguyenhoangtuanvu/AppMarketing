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