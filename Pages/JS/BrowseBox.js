var browse = document.getElementById("buttonBrowse");
var checkBox = document.getElementById("DropDown");
browse.addEventListener("mouseenter", function () {
    checkBox.checked = true;
});
browse.addEventListener("mouseleave", function () {
    checkBox.checked = false;
})