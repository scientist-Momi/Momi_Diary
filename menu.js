const menuBtn = document.querySelector(".menuBtn"),
    menu_list = document.querySelector(".menu_list"),
    closeBtn = document.querySelector(".closeBtn");

menuBtn.addEventListener('click', () => {
    closeBtn.style.display = "block";
    menuBtn.style.display = "none";
    menu_list.style.display = "block";
});

closeBtn.addEventListener('click', () => {
    closeBtn.style.display = "none";
    menuBtn.style.display = "block";
    menu_list.style.display = "none";
});