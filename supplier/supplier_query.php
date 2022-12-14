<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Supplier</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.2.js"
        integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
        th {
            text-align: center !important;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <header class="banner">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link " href="../index.php">Home </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="../laptop/laptop_query.php"> Laptop </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="../customer/customer_query.php"> Customer </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active " href="../supplier/supplier_query.php"> Supplier </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="../trade/trade_query.php"> Trade </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="../joinsearch/total.php"> Search </a>
            </li>
            <a style="width: 700px;"></a>
            <li class="nav-item" role="presentation"
                style="display: flex;justify-content: center;align-items: center; ">
                <img src="https://cdn-icons-png.flaticon.com/512/6386/6386976.png" width="20px" height="20px">
            </li>
            <li class="nav-item" role="presentation">
                <?php
                echo "<a class='nav-link'>" . $_SESSION['UserName'] . "</a>"
                    ?>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" onclick="out()"> Sign Out</a>
            </li>
        </ul>
    </header>
    <div style="display:none;position: fixed;top:10%;left:0%;z-index:100" id="ale"><button type="button"
            class="btn btn-danger" id="alemessage" style="font-size:medium">Danger</button></div>
    <div class="main">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="customer_query.php">Query</a>
            </li>
            <li class="nav-item" role="presentation"
                style="display: flex;justify-content: center;align-items: center; ">
                <button type="button" class="btn btn-primary" id="create">??????</button>
            </li>
        </ul>
        <div>
            <form style="text-align: left;margin-bottom: 10px;" method='post'>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">all</button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <button name='all' class="btn btn-light btn-block" id="all" onclick="dropdownvalue('all')">
                                ALL
                            </button>
                        </li>
                        <li>
                            <button name='sname' class="btn btn-light btn-block" id="sname"
                                onclick="dropdownvalue('SupplierName')">
                                NAME
                            </button>
                        </li>
                        <li>
                            <button name='saddress' class="btn btn-light btn-block" id="saddress"
                                onclick="dropdownvalue('SupplierAddress')">
                                ADDRESS
                            </button>
                        </li>
                        <li>
                            <button name='sphone' class="btn btn-light btn-block" id="sphone"
                                onclick="dropdownvalue('SupplierPhone')">
                                PHONE
                            </button>
                        </li>
                    </ul>
                </div>
            </form>
            <form id="formsearch">
                <div class='input-group'>
                    <div class='form-outline'>
                        <input type='search' id='search' placeholder='all' class='form-control' name='S'
                            style="width: 200px;" />
                    </div>
                    <button class='btn btn-primary' name='search' id="searchbt" style="float:left">
                        <i class='fas fa-search'></i>
                    </button>
                </div>
            </form>
        </div>
        <div id="maintable"></div>
        <script>
            function out() {
                $.ajax({
                    url: "../login/logout.php",
                    type: "POST",
                    data: {
                    },
                    success: function (data) {
                        window.location.href = "../login/login.php";
                    }
                });
            }
            function exhibit(data) {
                let statement = "<table class='table table-striped table-dark'>" +
                    "<thead class='thead-dark'>" +
                    "<tr><th scope='col'>supplier_name</th><th scope='col'>supplier_address</th><th scope='col'>supplier_phone</th><th scope='col'>more function</th></tr> </thead><tbody>";

                for (let i = 0; i < data.length; i++) {
                    statement += "<tr id=tr" + i + "><td id=sname" + i + ">" + data[i].SupplierName + "</td><td id=saddress" + i + ">" + data[i].SupplierAddress + "</td><td id=sphone" + i + ">" + data[i].SupplierPhone + "</td><td>" +
                        "<button class='btn btn-primary' name='search' id=update" + i + ">....</button>" +
                        "<button class='btn btn-primary' name='search' id=del" + i + ">-</button>" +
                        "</td></tr>";
                }
                console.log(statement);
                $("#maintable").html(statement);
                for (let i = 0; i < data.length; i++) {
                    $("#update" + i).click(function () {
                        event.preventDefault();
                        let sname = $("#sname" + i).text();
                        let saddress = $("#saddress" + i).text();
                        let sphone = $("#sphone" + i).text();
                        let statement = "<tr id=tr" + i + "><td id = sname" + i + ">" + sname + "</td><td><input type='text' class='form-control' id='saddress" + i + "' value='" + saddress + "'></td><td><input type='text' class='form-control' id='sphone" + i + "' value='" + sphone + "'></td><td>" +
                            "<button class='btn btn-primary' name='search' id=update" + i + ">update</button>" +
                            "<button class='btn btn-primary' name='search' id=del" + i + ">-</button>" +
                            "</td></tr>";
                        $("#tr" + i).replaceWith(statement);
                        $("#update" + i).click(function () {
                            event.preventDefault();
                            let sname = $("#sname" + i).text();
                            let saddress = $("#saddress" + i).val();
                            let sphone = $("#sphone" + i).val();
                            $.ajax({
                                url: "supplier_update.php",
                                type: "POST",
                                data: {
                                    sname: sname,
                                    saddress: saddress,
                                    sphone: sphone
                                },
                                success: function (data) {
                                    // console.log(data);
                                    location.reload();
                                }
                            });
                        });
                    });

                    $("#del" + i).click(function () {
                        event.preventDefault();
                        let sname = $("#sname" + i).text();
                        $.ajax({
                            url: "supplier_delete.php",
                            type: "POST",
                            data: {
                                sname: sname
                            },
                            success: function (data) {
                                location.reload();
                            }
                        });
                    });
                }
            };

            $("#create").click(function () {
                event.preventDefault();
                let statement = "<tr><td>" + "<input type='text'  class='form-control' id='newsname'>" +
                    "</td><td>" + "<input type='text'  class='form-control' id='newsaddress'>" +
                    "</td><td>" + "<input type='text'  class='form-control' id='newsphone'>" +
                    "</td><td>" + "<button class='btn btn-primary' name='search' id='po'><i class='fa fa-check' aria-hidden='true'></i></button>" +
                    "</td></tr>";
                $('#tr0').before(statement);
                $("#po").click(function () {
                    event.preventDefault();
                    let sname = $("#newsname").val();
                    let saddress = $("#newsaddress").val();
                    let sphone = $("#newsphone").val();
                    $.ajax({
                        url: "supplier_create.php",
                        method: "post",
                        data: {
                            sname: sname,
                            saddress: saddress,
                            sphone: sphone
                        },
                        success: function (res) {
                            res = JSON.parse(res);
                            if (res.status == 500) {
                                document.getElementById("ale").style.display = "block";
                                $("#alemessage").text(res.message);
                            } else
                                location.reload();
                        }
                    });
                });
            });



            $("#searchbt").click(function (event) {
                event.preventDefault();
                let search = $("#search").val();
                let condition = $("#dropdown").text();
                console.log(search, condition);
                if (search == "" && condition != "all") {
                    alert("Please enter a search term");
                } else {
                    if (condition == "all") {
                        search = "1";
                        condition = "1";
                    }
                    $.ajax({
                        url: "supplier_search.php",
                        method: "post",
                        data: {
                            search: search,
                            condition: condition
                        },
                        success: function (res) {
                            res = JSON.parse(res);
                            console.log(res);
                            exhibit(res.data);
                            console.log(res.data);
                        }
                    });
                }
            });

            function dropdownvalue(x) {
                event.preventDefault();
                $("#dropdown").html(x);
                $("#search").attr("placeholder", x);

            }
            $("#ale").click(function (event) {
                $("#ale").hide();
                location.reload();
            });
        </script>
        <!-- customer_query.php -->
        <!--  -->
    </div>
</body>

</html>

<style type="text/css">
    @import url("../style.css")
</style>