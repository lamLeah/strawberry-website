function displayImage() {
  const imageSrc = document.getElementById("image-file");
  const imageDisplay = document.querySelector("#image");
  const previewText = document.getElementById("preview-text");

  imageSrc.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
      const reader = new FileReader();
      previewText.style.display = "none";

      reader.addEventListener("load", function () {
        imageDisplay.style.backgroundImage = `url(${this.result})`;
      });

      reader.readAsDataURL(file);
    }
  });
}
(function initialProfilePage() {
  const editBtn = document.querySelector("#editButton");
  editBtn.addEventListener("click", () => {
    const editSec = document.querySelector("#editSection");
    const displaySec = document.querySelector("#displaySection");
    editSec.style.display = "block";
    displaySec.style.display = "none";

    displayImage();
  });
})();
