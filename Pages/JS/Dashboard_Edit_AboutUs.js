var preview;
function UploadImage(uploadderID, imgID) {
    // console.log("this may call:baka baka");
    let uploader = document.getElementById(uploadderID);
    // console.log('Img ID:'+imgID);
    preview = document.getElementById(imgID);
    uploader.click();

}
var imgUploader = document.getElementsByClassName("imgUploader");
for (let i = 0; i < imgUploader.length; i++) {
    imgUploader[i].addEventListener("change", function () {
        if (preview) {
            if (imgUploader[i].files && imgUploader[i].files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(imgUploader[i].files[0]);

                reader.onload = function (e) {
                    //With this e object you can get anything you want from input
                    //type file. The content of uploaded file, for example:
                    //e.target.result;
                    preview.src = e.target.result;
                }
            }
        }
    })
}
var shadowCovers = document.getElementsByClassName("shadowCover");
shadowCovers[0].addEventListener("click", function () {
    UploadImage('KhoaUpload', 'KhoaPreview');
});
shadowCovers[1].addEventListener("click", function () {
    UploadImage('KentUpload', 'KentPreview');
})
shadowCovers[2].addEventListener("click", function () {
    UploadImage('PhongUpload', 'PhongPreview');
});
