var photo = document.getElementById("profileImage");
var uploader = document.getElementById("imageUpload");
photo.addEventListener("click", function () {
    uploader.click();
});
uploader.addEventListener("change", function () {
    console.log("may this run");
    if (uploader.files && uploader.files[0]) {
        var reader = new FileReader();
        reader.readAsDataURL(uploader.files[0]);
        reader.onload = function (e) {
            //With this e object you can get anything you want from input
            //type file. The content of uploaded file, for example:
            //e.target.result;
            photo.src = e.target.result;
        }
    }
});