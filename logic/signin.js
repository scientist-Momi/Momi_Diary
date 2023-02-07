const signinForm = document.querySelector("#signinForm"),
    signinBtn = document.querySelector("#signinBtn"),
error = document.querySelector(".error-text"),
success = document.querySelector(".success-text");

signinForm.onsubmit = (e)=>{
    e.preventDefault();
}


signinBtn.onclick = () => {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/signin.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if (data === "Successful") {
                  error.style.display = "none";
                  success.style.display = "block";
                  success.innerHTML = "Credentials match. Redirecting...";
                  
                    setTimeout(() => {
                        location.href = "./diary_list.php";
                    }, 5000);                  
              } 
              else {
                error.style.display = "block";
                error.innerHTML = data;     
              }
          }
      }
    }
    let formData = new FormData(signinForm);
    xhr.send(formData);
}


