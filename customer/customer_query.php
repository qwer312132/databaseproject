<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Customer</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <header class="banner">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link " href="index.php">Home </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="laptop_query.php"> Laptop </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="customer_query.php"> Customer </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="supplier_query.php"> Supplier </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="trade_query.php"> Trade </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="search.php"> Search </a>
            </li>
        </ul>
        <?php
        echo "<span>" .  $_SESSION['UserName'] . "</span>"
        ?>
    </header>
    <div class="main">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="customer_query.php">Query</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="customer_edit.php">Edit</a>
            </li>
            <li class="nav-item" role="presentation">
                <button type="button" class="btn btn-primary" id="create">新增</button>
            </li>
        </ul>
        <form method='post'>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown button
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <button name='name'>
                            name
                        </button>
                    </li>
                    <li>
                        <button name='street'>
                            street
                        </button>
                    </li>
                    <li>
                        <button name='city'>
                            city
                        </button>
                    </li>
                </ul>
            </div>
        </form>
        <form id="formsearch">
            <div class='input-group'>
                <div class='form-outline'>
                    <input type='search' id='search' placeholder='Search' class='form-control' name='S' />
                </div>
                <button class='btn btn-primary' name='search' id="searchbt">
                    <i class='fas fa-search'></i>
                </button>
            </div>
        </form>
        <script>
            function exhibit(data) {
                let statement = "<table class='table'><thead class='thead-dark'><tr><th scope='col'>ID</th><th scope='col'>customer_name</th><th scope='col'>customerPhone</th></tr> </thead><tbody>";

                for (let i = 0; i < data.length; i++) {
                    statement += "<tr id=tr" + i + "><td id=cus" + i + ">" + data[i].CustomerID + "</td><td id=name" + i + ">" + data[i].CustomerName + "</td><td id=phone" + i + ">" + data[i].CustomerPhone + "</td><td>" +
                        "<button class='btn btn-primary' name='search' id=update" + i + ">....</button>" +
                        "<button class='btn btn-primary' name='search' id=del" + i + ">-</button>" +
                        "</td></tr>";
                }
                console.log(statement);
                $('#formsearch').after(statement);
                for (let i = 0; i < data.length; i++) {
                    $("#update" + i).click(function() {
                        event.preventDefault();
                        let id = $("#cus" + i).text();
                        let name = $("#name" + i).text();
                        let phone = $("#phone" + i).text();
                        let statement = "<tr id=tr" + i + "><td id=cus" + i + ">" + id + "</td><td>" +
                            "<input type='text'  class='form-control' id='name" + i + "' value='" + name + "'>" +
                            "</td><td>" +
                            "<input type='text'  class='form-control' id='phone" + i + "' value='" + phone + "'>" +
                            "</td><td>" +
                            "<button class='btn btn-primary' name='search' id=update" + i + ">update</button>" +
                            "<button class='btn btn-primary' name='search' id=del" + i + ">-</button>" +
                            "</td></tr>";
                        $("#tr" + i).replaceWith(statement);
                        $("#update" + i).click(function() {
                            event.preventDefault();
                            let id = $("#cus" + i).text();
                            let name = $("#name" + i).val();
                            let phone = $("#phone" + i).val();
                            $.ajax({
                                url: "customer_update.php",
                                type: "POST",
                                data: {
                                    id: id,
                                    name: name,
                                    phone: phone
                                },
                                success: function(data) {
                                    alert(data);
                                    location.reload();
                                }
                            });
                        });
                    });

                    $("#del" + i).click(function() {
                        event.preventDefault();
                        let id = $("#cus" + i).text();
                        $.ajax({
                            url: "customer_delete.php",
                            type: "POST",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                alert(data);
                                location.reload();
                            }
                        });
                    });
                }
            };

            $("#create").click(function() {
                event.preventDefault();
                let statement = "<tr ><td>" +
                    "<input type='text'  class='form-control' disabled='disabled'>" +
                    "</td><td>" +
                    "<input type='text'  class='form-control' id='newname'>" +
                    "</td><td>" +
                    "<input type='text'  class='form-control' id='newphone'>" +
                    "</td><td>" +
                    "<button class='btn btn-primary' name='search' id='po'><i class='fas fa-search'></i></button>" +
                    "</td></tr>";
                $('#tr0').after(statement);
                $("#po").click(function() {
                    event.preventDefault();
                    let name = $("#newname").val();
                    let phone = $("#newphone").val();
                    $.ajax({
                        url: "customer_create.php",
                        method: "post",
                        data: {
                            name: name,
                            phone: phone
                        },
                        success: function(res) {
                            res = JSON.parse(res);
                            console.log(res);
                        }
                    });
                });
            });



            $("#searchbt").click(function(event) {
                event.preventDefault();
                let search = $("#search").val();
                if (search == "") {
                    alert("Please enter a search term");
                } else {
                    $.ajax({
                        url: "customer_search.php",
                        method: "post",
                        data: {
                            search: search
                        },
                        success: function(res) {
                            res = JSON.parse(res);
                            console.log(res);
                            exhibit(res.data);
                            console.log(res.data);
                        }
                    });
                }
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