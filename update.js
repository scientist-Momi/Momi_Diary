const editBtn = document.querySelector(".editBtn"),
    updateNote = document.getElementById("updateNote"),
    realNote = document.getElementById("realNote");

editBtn.addEventListener('click', () => { 
    updateNote.style.display = "block";
    realNote.style.display = "none";
    editBtn.style.display = "none";
});