// Hide the dialog when the page loads
document.querySelector(".el-dialog__wrapper").style.display = "none";

document.querySelector(".el-dialog__close").addEventListener("click", function() {
    // Hide the dialog when the close button is clicked
    document.querySelector(".el-dialog__wrapper").style.display = "none";
});

document.querySelector(".btn-change-avatar").addEventListener("click", function() {
    // Show the dialog when the avatar is clicked
    var dialog = document.querySelector(".el-dialog__wrapper");
    if (dialog.style.display === "none") {
        dialog.style.display = "block";
    } else {
        dialog.style.display = "none";
    }
});

document.getElementById("avatarUpload").addEventListener("change", function() {
    // Enable the buttons when a file is selected
    var buttons = document.querySelectorAll(".el-button");
    buttons.forEach(function(button) {
        button.classList.remove("is-disabled");
        button.disabled = false;
    });
});

document.getElementById("avatarUpload").addEventListener("change", function() {
    var reader = new FileReader();

    reader.onload = function(e) {
        // The file's text will be printed here
        document.querySelector(".btn-change-avatar img").src = e.target.result;
    };

    reader.readAsDataURL(this.files[0]);
});

