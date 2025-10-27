 function togglePopup() {
    const popup = document.getElementById("popup");
    popup.style.display = popup.style.display === "block" ? "none" : "block";
  }

  // Cierra el popup si se hace clic afuera
  document.addEventListener("click", function(e) {
    const popup = document.getElementById("popup");
    const icon = document.querySelector(".user-icon");
    if (!popup.contains(e.target) && !icon.contains(e.target)) {
      popup.style.display = "none";
    }
  });


