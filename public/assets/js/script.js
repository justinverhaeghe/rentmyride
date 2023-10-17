let deleteImgCheckbox = document.getElementById("deleteImg");
let pictureInput = document.getElementById("picture");
let pictureFile = document.querySelector("#pictureFile");

if (pictureInput.getAttribute("value") == "") {
    pictureFile.classList.remove("d-none");
}

const displayPic = () => {
    if (pictureInput.getAttribute("value") === "") {
        pictureFile.classList.remove("d-none");
    }
    if (deleteImgCheckbox.checked) {
        pictureFile.classList.remove("d-none");
    } else {
        pictureInput.value = "";
        pictureFile.classList.add("d-none");
    }
};

deleteImgCheckbox.addEventListener("change", displayPic);
