const noteBtn = document.getElementById('noteBtn'),
    todo = document.getElementById('todo'),
    todoForm = document.getElementById('todoForm'),
    noteForm = document.getElementById('noteForm'),
    para = document.querySelector('.para');

todo.addEventListener('click', () => {
    todoForm.style.display = "block"
    noteForm.style.display = "none"
    para.innerHTML = "Add an Event to your diary";
    noteBtn.classList.remove('active')
    todo.classList.add('active');
});



noteBtn.addEventListener('click', () => {
    todoForm.style.display = "none"
    noteForm.style.display = "block"
    para.innerHTML = "Add a note in your diary";
    noteBtn.classList.add('active')
    todo.classList.remove('active');
});