let NameTableDataBase = document.querySelector("section");
let BtnSenData = document.querySelector(".foot button");
let input = document.querySelector(".foot input");
let heads = document.querySelector(".head");
let bodyInner = document.querySelector(".body");
BtnSenData.onclick = function() {
    if (input.value != "") {
        $.ajax({
            type: "POST",
            url: "php/saher.php",
            dataType: "html",
            async: false,
            data: {
                "TextChat": input.value,
                "NameUsers": NameTableDataBase.dataset.name,
                "NameTableDataBase": Number(NameTableDataBase.dataset.id) + Number(heads.dataset.id)
            },
        });

        input.value = "";
    } else {
        alert("please Enter Your Massage");
    }

}


setInterval(() => {
    $.ajax({
        type: "POST",
        url: "php/saher.php",
        dataType: "html",
        async: false,
        data: {
            "Users": Number(NameTableDataBase.dataset.id) + Number(heads.dataset.id),
            "class": NameTableDataBase.dataset.name
        },
        success: function(d) {
            bodyInner.innerHTML = d;
        }
    });
}, 10);