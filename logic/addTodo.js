const todoForm1 = document.querySelector("#todoForm"),
    addTodoBtn = document.querySelector("#addTodoBtn"),
    error1 = document.querySelector(".ert"),
    success1 = document.querySelector(".srt");

todoForm1.onsubmit = (e)=>{
    e.preventDefault();
}

addTodoBtn.onclick = () => { 
let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/addTodo.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if (data === "Successful") {
                  error1.style.display = "none";
                  success1.style.display = "block";
                  success1.innerHTML = "Your event has been saved.";
                  
                    setTimeout(() => {
                        document.location.reload();
                    }, 3000);                  
              } 
              else {
                error1.style.display = "block";
                error1.innerHTML = data;     
              }
          }
      }
    }
    let formData = new FormData(todoForm1);
    xhr.send(formData);
}