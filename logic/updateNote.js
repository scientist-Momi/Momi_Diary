const updateNote1 = document.querySelector("#updateNote"),
    updatenoteBtn = document.querySelector("#updatenoteBtn"),
error = document.querySelector(".error-text"),
success = document.querySelector(".success-text");

updateNote1.onsubmit = (e)=>{
    e.preventDefault();
}


updatenoteBtn.onclick = () => {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/updateNote.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if (data === "Successful") {
                  error.style.display = "none";
                  success.style.display = "block";
                  success.innerHTML = "Edit has been saved.";
                  
                    setTimeout(() => {
                        document.location.reload();
                    }, 5000);                  
              } 
              else {
                error.style.display = "block";
                error.innerHTML = data;     
              }
          }
      }
    }
    let formData = new FormData(updateNote1);
    xhr.send(formData);
}


