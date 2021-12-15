const form = document.querySelector("form"),
    continueBtn = document.querySelector(".continue"),
    error = document.querySelector(".error");

form.onsubmit = (e) => {
    e.preventDefault();
}
continueBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                let data = xhr.response;
                if (data.slice(0, 7) == "success") {
                    window.location.href = "users.php?user_id=" + data.slice(7);
                } else {
                    error.style.display = "block";
                    error.textContent = data;
                }
            }
        }
    };
    let formData = new FormData(form);
    xhr.send(formData);
}