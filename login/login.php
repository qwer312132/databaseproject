<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- JavaScript Bundle with Popper -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div>
            <h1>歡迎使用電商查詢器</h1>
        </div>
        <div class="row mx-1 mt-5">
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist" style="padding: 0px;">
                <div class="col-6">
                    <li class="nav-item px-0" role="presentation">
                        <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">登入</a>
                    </li>
                </div>
                <div class="col-6">
                    <li class="nav-item " role="presentation">
                        <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">註冊</a>
                    </li>
                </div>
            </ul>
        </div>
        <!-- Pills navs -->

        <!-- Pills content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form id="login">
                    <!--action="Loginback.php" method="post" -->
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="loginEmail" name="loginEmail" class="form-control" />
                        <label class="form-label" for="loginEmail">使用者信箱</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="loginPassword" name="loginPassword" class="form-control" />
                        <label class="form-label" for="loginPassword">密碼</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4" name="submit" value="登入">登入</button>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form id="register">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="registerName" class="form-control" />
                        <label class="form-label" for="registerName">使用者名稱</label>
                    </div>

                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="registerEmail" class="form-control" />
                        <label class="form-label" for="registerEmail">使用者信箱</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="registerPassword" class="form-control" />
                        <label class="form-label" for="registerPassword">密碼</label>
                    </div>

                    <!-- Repeat Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="registerRepeatPassword" class="form-control" />
                        <label class="form-label" for="registerRepeatPassword">確認密碼</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-3">註冊</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Pills content -->

    <!--- import --->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!--- import --->
    <script>
        function check(data) 
        {
            alert("check");
            if (data.message == "使用者不存在") 
            {
                alert("使用者不存在");
            } 
            else if (data.message == "密碼錯誤") 
            {
                alert("密碼錯誤");
            } 
            else 
            {
                alert("登入成功");
            }
        };


        $("#login").on("submit", function(event) {
            event.preventDefault();
            let useremail = $("#loginEmail").val();
            let pass = $("#loginPassword").val();
            if (useremail == "" || pass == "") {
                alert("請輸入完整資料");
                return;
            } else {
                $.ajax({
                    url: "loginback.php",
                    method: "post",
                    data: {
                        useremail: useremail,
                        pass: pass
                    },
                    success: function(res) 
                    {
                        res = JSON.parse(res);
                        console.log(res);
                        check(res);
                    }
                });
            }
            location.href = "../index.php";
        });

        $("#register").on("submit", function(event) {
            event.preventDefault();
            let name = $("#registerName").val();
            let useremail = $("#registerEmail").val();
            let pass = $("#registerPassword").val();
            let repeatpass = $("#registerRepeatPassword").val();
            console.log(name, useremail, pass, repeatpass);
            if (name == "" || useremail == "" || pass == "" || repeatpass == "") {
                alert("請輸入完整資料");
                return;
            } else if (pass != repeatpass) {
                alert("密碼不一致");
                return;
            } else if (pass == repeatpass) {
                $.ajax({
                    url: "register.php",
                    method: "post",
                    data: {
                        name: name,
                        useremail: useremail,
                        pass: pass
                    },
                    success: function(res) {
                        res = JSON.parse(res);
                        console.log(res);
                    }
                });
                location.href = "Login.php";
            }
        });
    </script>

</body>
<style>
    .container {
        height: 100vh;
    }
</style>

</html>