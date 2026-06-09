const form = document.querySelector(".form_btn_iconimg"),
topic_id = form.querySelector(".topic_id"),
featch_contribution = document.querySelector(".featch_contribution");

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "show_contribution.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                featch_contribution.innerHTML = data;
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 1000);