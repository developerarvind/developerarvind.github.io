$(document).ready(function () {
    $("#ImageForm").submit(function (e) {
        var form = this;
        e.preventDefault(); //Stop the submit for now

        var fileInput = $(this).find("#image-file")[0],
            file = fileInput.files && fileInput.files[0];
        console.log(file)
        if (file) {
            var img = new Image();

            img.src = window.URL.createObjectURL(file);

            img.onload = function () {
                var width = img.naturalWidth,
                    height = img.naturalHeight;

                window.URL.revokeObjectURL(img.src);

                if (width == 600 && height > 0) {
                    form.submit();
                    alert("Images uploaded sucessfully!!!")
                    console.log("file uploaded sucessfully");
                }
                else {

                    if (width >= 600 && height > 0) {

                        alert("Image is too big please crop image to upload");


                    } else if (width <= 600 && height > 0) {
                        alert("Image is too small!! Plese choose another image");
                    }


                }
            };
        }
        else { //No file was input or browser doesn't support client side reading
            form.submit();
        }

    });
});