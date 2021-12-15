window.onload = function() {
    let body = document.querySelector("body").dataset.type;
    if (body == "friends") {
        // Most variables
        // {{{{{{{{{{{Starts}}}}}}}}}}}
        let h5 = document.querySelector(".head h5");
        let all_users = document.querySelector("ul.all_users");
        let AllDriends = document.querySelector(".AllDriends");
        let friend_request = document.querySelector("ul.friend_request");
        var myVar;
        // {{{{{{{{{{{Ends}}}}}}}}}}}




        // Hide The First Page
        // {{{{{{{{{{{Starts}}}}}}}}}}}
        setTimeout(() => {
            let preloader = document.getElementById("preloader");
            preloader.style.display = "none";
        }, 3000);
        // {{{{{{{{{{{Ends}}}}}}}}}}}





        //Get All Users
        // {{{{{{{{{{{Starts}}}}}}}}}}}
        $.ajax({
            type: "POST",
            url: "php/users.php",
            dataType: "html",
            async: false,
            data: {
                ThisNot: h5.dataset.id,
            },
            success: function(d) {
                all_users.innerHTML = d;
                let equels = document.querySelectorAll(".AllDriends li");
                equels.forEach(ele => {
                    for (let i = 0; i < all_users.children.length; i++) {
                        if (all_users.children[i].dataset.id == ele.dataset.equel) {
                            all_users.children[i].remove();
                        }
                    }
                })
                if (all_users.children.length == 0) {
                    all_users.innerHTML = "No friend requests";
                }
            },
        });
        // {{{{{{{{{{{Ends}}}}}}}}}}}



        // Alternative websocket
        // {{{{{{{{{{{Starts}}}}}}}}}}}
        setInterval(() => {
            $.ajax({
                type: "POST",
                url: "php/users.php",
                dataType: "html",
                async: false,
                data: {
                    ThisNot: h5.dataset.id,
                },
                success: function(d) {
                    all_users.innerHTML = d;
                    let equels = document.querySelectorAll(".AllDriends li");
                    equels.forEach(ele => {
                        for (let i = 0; i < all_users.children.length; i++) {
                            if (all_users.children[i].dataset.id == ele.dataset.equel) {
                                all_users.children[i].remove();
                            }
                        }
                    })
                    if (all_users.children.length == 0) {
                        all_users.innerHTML = "No friend requests";
                    }
                },
            });
            var baseUrl = window.location.href; // You can also use document.URL
            var koopId = baseUrl.substring(baseUrl.lastIndexOf("=") + 1);
            $.ajax({
                type: "POST",
                url: "php/getFriends.php",
                dataType: "html",
                async: false,
                data: {
                    koopId: koopId,
                },
                success: function(d) {
                    friend_request.innerHTML = d;
                },
            });
            let UlLiA = document.querySelectorAll(
                "ul.friend_request li button.accept"
            );
            for (let i = 0; i < UlLiA.length; i++) {
                UlLiA[i].onclick = function() {
                    $.ajax({
                        type: "POST",
                        url: "php/savefriends.php",
                        dataType: "html",
                        async: false,
                        data: {
                            From: [UlLiA[i].dataset.id, koopId, UlLiA[i].dataset.del],
                        },
                    });
                };
            }
            $.ajax({
                type: "POST",
                url: "php/GetDataAllYou.php",
                dataType: "html",
                async: false,
                data: {
                    koopId: koopId,
                },
                success: function(d) {
                    AllDriends.innerHTML = '<h3 class="m-0"> All Your Friends </h3>' + d;
                    let UlLiA = document.querySelectorAll(".AllDriends li a");
                    let UlLiBtn = document.querySelectorAll("ul.all_users li button");
                    for (let i = 0; i < UlLiA.length; i++) {
                        var baseUrl = window.location.href; // You can also use document.URL
                        var koopId = baseUrl.substring(baseUrl.lastIndexOf("=") + 1);
                        var koopId2 = UlLiA[i].dataset.go;
                        let h5 = document.querySelector(".head h5");
                        UlLiA[i].href =
                            "saher.php?user_id=" +
                            koopId2 +
                            "&Back=" +
                            koopId +
                            "&Name=" +
                            h5.dataset.name +
                            "";
                        UlLiA[i].onclick = function() {
                            var nu1 = UlLiA[i].dataset.go;
                            let nu2 = h5.dataset.id;
                            $.ajax({
                                type: "POST",
                                url: "php/CreateTableForPageUsers.php",
                                dataType: "html",
                                async: false,
                                data: {
                                    createTable: Number(nu1) + Number(nu2),
                                },
                            });
                        };
                    }
                    for (let i = 0; i < UlLiBtn.length; i++) {
                        UlLiBtn[i].onclick = function() {
                            var baseUrl = window.location.href; // You can also use document.URL
                            var koopId = baseUrl.substring(baseUrl.lastIndexOf("=") + 1);
                            let DivId =
                                this.parentElement.parentElement.parentElement.dataset.id;
                            $.ajax({
                                type: "POST",
                                url: "php/friends.php",
                                dataType: "html",
                                async: false,
                                data: {
                                    From: [koopId, DivId],
                                },
                            });
                        };
                    }
                },
            });
        }, 2000);
        // {{{{{{{{{{{Ends}}}}}}}}}}}




        // LogOut Btn
        // {{{{{{{{{{{Starts}}}}}}}}}}}
        let LogOut = document.querySelector("#LogOut");
        LogOut.onclick = function() {
            location.href = "Login.php";
            let nu1 = document.querySelector(".head h5").dataset.id;
            $.ajax({
                type: "POST",
                url: "php/logout.php",
                dataType: "html",
                async: false,
                data: {
                    From: nu1,
                },
            });
        };
        // {{{{{{{{{{{Ends}}}}}}}}}}}



        // All About Posts
        // {{{{{{{{{{{Starts}}}}}}}}}}}
        let buttons = document.querySelectorAll(".YourPost div button");
        let textarea = document.querySelector(".YourPost textarea");
        let send = document.querySelector(".YourPost #send");
        let Posts = document.querySelector(".Posts");
        $.ajax({
            type: "POST",
            url: "php/post.php",
            dataType: "html",
            async: false,
            success: function(d) {
                Posts.innerHTML = d;
            },
        });

        send.onclick = function() {
            if (textarea.value != "") {
                $.ajax({
                    type: "POST",
                    url: "php/post.php",
                    dataType: "html",
                    async: false,
                    data: {
                        From: [h5.dataset.id, textarea.value, textarea.className, ]
                    },
                    success: function(d) {
                        Posts.innerHTML = d;
                    }
                });
            } else {
                alert("Please Enter Your Message");
            }
        };

        function alertFunc() {
            $.ajax({
                type: "POST",
                url: "php/post.php",
                dataType: "html",
                async: false,
                success: function(d) {
                    Posts.innerHTML = d;
                }
            });
            let buttonLikes = document.querySelectorAll(".Posts .post .foot button");

            buttonLikes.forEach((buttonLike) => {
                buttonLike.onclick = function() {
                    let span = Number(buttonLike.querySelector("span").innerHTML);
                    buttonLike.innerHTML = '<i class="fa fa-thumbs-up"></i> ' + ++span + "";
                    $.ajax({
                        type: "POST",
                        url: "php/post.php",
                        dataType: "html",
                        async: false,
                        data: {
                            "Likes": buttonLike.dataset.up,
                            "Num": span,
                        },
                    });
                };
            });

            let num = 0;
            buttons.forEach((button) => {
                button.style.background = button.dataset.color;
                button.innerHTML = ++num;
                button.onclick = function() {
                    textarea.className = "";
                    textarea.classList.add(button.dataset.class);
                };
            });

            // buttons del the friends
            let btnDels = document.querySelectorAll(".btnDel");
            btnDels.forEach((btnDel) => {
                btnDel.onclick = function() {
                    this.parentElement.parentElement.parentElement.parentElement.style.display =
                        "none";
                    $.ajax({
                        type: "POST",
                        url: "php/Delete_frineds.php",
                        dataType: "html",
                        async: false,
                        data: {
                            Del1: btnDel.dataset.del1,
                        },
                        success: function(d) {
                            console.log(d);
                        },
                    });
                };
            });
        }

        myVar = setInterval(alertFunc, 3000);

        setInterval(() => {
            let textareasPost = document.querySelectorAll(".post .comments textarea");
            let BtnSendComment = document.querySelectorAll(".post .comments button");

            textareasPost.forEach(textareaPost => {
                textareaPost.onkeyup = function() {
                    textareaPost.style.height = "40px";
                    textareaPost.style.height = (textareaPost.scrollHeight) + "px";
                    if (textareaPost.value == "") {
                        textareaPost.style.height = "0";
                    }
                }
                textareaPost.onkeypress = function() {
                    textareaPost.style.height = "40px";
                    textareaPost.style.height = (textareaPost.scrollHeight) + "px";
                    if (textareaPost.value == "") {
                        textareaPost.style.height = "40px";
                    }
                }
                textareaPost.onfocus = function() {
                    clearInterval(myVar);
                    textareaPost.style.height = (textareaPost.scrollHeight) + "px";
                }
                textareaPost.onblur = function() {
                    textareaPost.style.height = "40px";
                }
            })
            BtnSendComment.forEach(element => {
                element.onclick = function() {
                    myVar = setInterval(alertFunc, 3000);
                    $.ajax({
                        type: "POST",
                        url: "php/Comments.php",
                        dataType: "html",
                        async: false,
                        data: {
                            "All": [element.parentElement.parentElement.parentElement.dataset.from, h5.dataset.id, element.parentElement.parentElement.children[1].children[0].value],
                        }
                    });
                };
            });
        }, 3000);
        // {{{{{{{{{{{Ends}}}}}}}}}}}




        //  Toggle Light And Dark
        // {{{{{{{{{{{Starts}}}}}}}}}}}
        let ToggleLight = document.querySelector("#ToggleLight");
        let ToggleLightI = document.querySelector("#ToggleLight i");
        let Body = document.querySelector("body");
        let PostsDiv = document.querySelector(".Posts");
        ToggleLight.onclick = function() {
            Body.classList.toggle("Moon");
            PostsDiv.classList.toggle("Moon");
            if (ToggleLightI.className == "fa fa-moon") {
                ToggleLightI.className = "fa fa-sun";
                localStorage.setItem("Light", "moon");
            } else {
                ToggleLightI.className = "fa fa-moon";
                localStorage.setItem("Light", "sun");
            }
        };

        if (localStorage.getItem("Light") == "moon") {
            Body.classList.add("Moon");
            PostsDiv.classList.add("Moon");
            ToggleLightI.className = "fa fa-sun";
        } else {
            Body.classList.remove("Moon");
            PostsDiv.classList.remove("Moon");
            ToggleLightI.className = "fa fa-moon";
            localStorage.setItem("Light", "sun");
        }
        // {{{{{{{{{{{Ends}}}}}}}}}}}
    } else {
        let btnToggleHide = document.querySelector(".All button");
        let Password = document.querySelector(".All input[type='Password']");

        btnToggleHide.onclick = function() {
            this.classList.toggle("active");
            if (Password.type === "password") {
                Password.type = "text";
            } else {
                Password.type = "password";
            }
        };
    }
};