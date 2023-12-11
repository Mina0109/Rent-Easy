document.getElementById("removeAgreementsBtn").addEventListener("click", function() {
  // Get the desktop container
  var desktopContainer = document.querySelector(".desktop");

  // Remove all child elements (agreements)
  while (desktopContainer.firstChild) {
    desktopContainer.removeChild(desktopContainer.firstChild);
  }

});