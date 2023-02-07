const addUser = document.querySelector("#addUser"),
    addUserBtn = document.querySelector("#addUserBtn"),
error = document.querySelector(".error-text"),
success = document.querySelector(".success-text");

addUser.onsubmit = (e)=>{
    e.preventDefault();
}


addUserBtn.onclick = () => {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/signup.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if (data === "Successful") {
                  error.style.display = "none";
                  success.style.display = "block";
                  success.innerHTML = "You have successfully being registered.";
                  
                    setTimeout(() => {
                        location.href = "./index.php";
                    }, 5000);                  
              } 
              else {
                error.style.display = "block";
                error.innerHTML = data;     
              }
          }
      }
    }
    let formData = new FormData(addUser);
    xhr.send(formData);
}


