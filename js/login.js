function fnType(element){
    var input = document.querySelector(".txt-pw");
    if(input.getAttribute('type') == "password"){
        input.setAttribute('type', "text");
    }else{
        input.setAttribute('type', "password");
    }if(input.value !== ""){
        element.parentElement.classList.add("value-true");
    }else{
        element.parentElement.classList.remove("value-true");
    }
    element.querySelector('i').classList.toggle("fa-eye");
    element.querySelector('i').classList.toggle("fa-eye-slash");
}
function fnText(e){
    var input = document.querySelector(".txt-g");
    if(input.value == ""){
        input.value = "@gmail.com";

    }else{
        input.value += "@gmail.com";
    }
    e.parentElement.classList.add("value-true");
}
function checkValue(elemen){
    var input = elemen.querySelector("input");
    input.addEventListener("input", function() {
        var e = elemen;
        if(input.value == ""){
            e.classList.remove("value-true");
        }else{
            e.classList.add("value-true");
        }
    })
}
function fnToggle(e,c) {
    document.querySelector(e).classList.toggle(c);
}