const noteBtn = document.getElementById('noteBtn'),
    noteBtn1 = document.getElementById('noteBtn1'),
    todoList = document.getElementById('todoList'),
    noteList = document.getElementById('noteList'),
    todo1 = document.getElementById('todo1');

    todo1.addEventListener('click', () => {
        todoList.style.display = "grid";
        noteList.style.display = "none";
    // para.innerHTML = "Add an Event to your diary";
        noteBtn1.classList.remove('active');
    todo1.classList.add('active');
});

noteBtn1.addEventListener('click', () => {
    todoList.style.display = "none";
    noteList.style.display = "grid";
    // para.innerHTML = "Add an Event to your diary";
    noteBtn1.classList.add('active');
    todo1.classList.remove('active');
});