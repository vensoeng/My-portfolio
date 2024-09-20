// ============================this is for add image and show image==============>
    function previewImage(event, boxImg = ".soeng_book") {
        var ShowImg = document.querySelectorAll(boxImg);

        var input = event.target;

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                ShowImg.forEach((element) => {
                    element.querySelector('img').src = e.target.result;
                    element.classList.add('txt-photo-box-active');
                });
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            ShowImg.forEach((element) => {
                element.querySelector('img').src = "#";
                element.classList.remove('txt-photo-box-active');
            });
        }
    }

    function activateWebForm(elementPost, elementGet = "#book-form") {
        var Epost = document.querySelector(elementPost);
        var webForms = document.querySelectorAll('.web-form');

        webForms.forEach((element) => {
            element.classList.remove('web-form-active');
        });

        if (Epost) {
            Epost.classList.add('web-form-active');
        } else {
            console.error(`Element not found: ${elementPost}`);
        }
    }