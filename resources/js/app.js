// Log to ensure the script is loaded
console.log("App.js is loaded!");

// Add event listener for the "Add Package" button
document.addEventListener("DOMContentLoaded", function () {
    const addPackageBtn = document.getElementById("addPackageBtn");
    if (addPackageBtn) {
        addPackageBtn.addEventListener("click", function () {
            console.log("Add Package button clicked");
            const createForm = document.getElementById("createForm");
            if (createForm) {
                createForm.classList.add("active");
            }
        });
    }
});

