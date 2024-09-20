document.addEventListener("DOMContentLoaded", function () {
    var web_aside = document.querySelector(".web-form");
    // Function to recalculate heights
    function setSformHeight() {
        var sceen_height = document.body.offsetHeight;
        var header = web_aside.querySelector(
            ".web-form-body > .head"
        ).offsetHeight;
        var formHeard = web_aside.querySelector(
            ".con-body > .form-head"
        ).offsetHeight;
        var formFoot =
            web_aside.querySelector(".con-body > .foot").offsetHeight;
        var bntSubmit = web_aside.querySelector(
            ".web-form-body > .submit-form"
        ).offsetHeight;
        web_aside.querySelector("#taget-height").style.height =
            sceen_height -
            (header + formHeard + formFoot + bntSubmit + 30) +
            "px";
    }
    // Set initial heights
    setSformHeight();
    // Listen for window resize
    window.addEventListener("resize", setSformHeight);
});
