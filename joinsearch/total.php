<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>search</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

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
                <a class="nav-link" href="../supplier/supplier_query.php"> Supplier </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="../trade/trade_query.php"> Trade </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="../joinsearch/total.php"> Search </a>
            </li>

            <a style="width: 700px;"></a>
            <li class="nav-item" role="presentation" style="display: flex;justify-content: center;align-items: center; ">
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
    <div class="main">
        <div>
            <form style="text-align: left;margin-bottom: 10px;" method='post'>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <button name='dtid' class="btn btn-light btn-block" id="dtid" onclick="dropdownvalue('TradeID')">
                                TradeID
                            </button>
                        </li>
                        <li>
                            <button name='dcna' class="btn btn-light btn-block" id="dcna" onclick="dropdownvalue('CustomerName')">
                                CustomerName
                            </button>
                        </li>
                    </ul>
                </div>
            </form>
            <form id="formsearch">
                <div class='input-group'>
                    <div class='form-outline'>
                        <input type='search' id='search' placeholder='Search' class='form-control' name='S' style="width: 200px;" />
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
                    data: {},
                    success: function(data) {
                        window.location.href = "../login/login.php";
                    }
                });
            }

            function exhibit(data) {
                let statement = "<table class='table table-striped table-dark'>" +
                    "<thead class='thead-dark'>" +
                    "<tr><th scope='col'>TradeID</th><th scope='col'>TradeDate</th><th scope='col'>CustomerName</th><th scope='col'>CustomerPhone</th><th scope='col'>LaptopName</th><th scope='col'>Warranty(year)</th><th scope='col'>SupplierName</th></tr> </thead><tbody>";

                for (let i = 0; i < data.length; i++) {
                    statement += "<tr id=tr" + i + "><td id=tID" + i + ">" +
                        data[i].TradeID + "</td><td id=tDate" + i + ">" +
                        data[i].TradeDate + "</td><td id=cName" + i + ">" +
                        data[i].CustomerName + "</td><td id=cPhone" + i + ">" +
                        data[i].CustomerPhone + "</td><td id=lName" + i + ">" +
                        data[i].LaptopName + "</td><td id=War" + i + ">" +
                        data[i].Warranty + "</td><td id=sName" + i + ">" +
                        data[i].SupplierName + "</td></tr>";
                }
                console.log(statement);
                $("#maintable").html(statement);
            }

            $("#searchbt").click(function(event) {
                event.preventDefault();
                let search = $("#search").val();
                let condition = $("#dropdown").text();
                if (search == "") {
                    alert("Please enter a search term");
                } else {
                    $.ajax({
                        url: "total_search.php",
                        method: "post",
                        data: {
                            search: search,
                            condition: condition
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

            function dropdownvalue(x) {
                event.preventDefault();
                $("#dropdown").html(x);
                $("#search").attr("placeholder", x);
            }
        </script>
    </div>
</body>

</html>

<style type="text/css">
    @import url("../style.css")
</style>