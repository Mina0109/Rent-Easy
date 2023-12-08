document.addEventListener("DOMContentLoaded", function () {
  const draggables = document.querySelectorAll(".draggable-item");
  const dropArea = document.querySelector(".drop-area");

  draggables.forEach((draggable) => {
    draggable.addEventListener("dragstart", () => {
      draggable.classList.add("dragging");
    });

    draggable.addEventListener("dragend", () => {
      draggable.classList.remove("dragging");
    });
  });

  dropArea.addEventListener("dragover", (e) => {
    e.preventDefault();
  });

  dropArea.addEventListener("drop", (e) => {
    e.preventDefault();
    const dragged = document.querySelector(".dragging");
    const newDraggable = dragged.cloneNode(true);

    dropArea.innerHTML = "";
    dropArea.appendChild(newDraggable);

    dragged.classList.remove("dragging");
  });
});
