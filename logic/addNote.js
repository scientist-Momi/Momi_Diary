const noteForm1 = document.querySelector("#noteForm"),
    addnoteBtn = document.querySelector("#addnoteBtn"),
    error = document.querySelector(".error-text"),
    success = document.querySelector(".success-text");

noteForm1.onsubmit = (e)=>{
    e.preventDefault();
}

addnoteBtn.onclick = () => { 
let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/addNote.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if (data === "Successful") {
                  error.style.display = "none";
                  success.style.display = "block";
                  success.innerHTML = "Your note has been added.";
                  
                    setTimeout(() => {
                        document.location.reload();
                    }, 3000);                  
              } 
              else {
                error.style.display = "block";
                error.innerHTML = data;     
              }
          }
      }
    }
    let formData = new FormData(noteForm1);
    xhr.send(formData);
}