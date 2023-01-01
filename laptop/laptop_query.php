<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <title>Laptop</title>
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

</head>

<body>
    <header class="banner">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link " href="../index.php">Home </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="laptop_query.php"> Laptop </a>
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
                <a class="nav-link" href="search.php"> Search </a>
            </li>
        </ul>
        <?php echo "<span>" . $_SESSION["username"] . "</span>"; ?>
    </header>
    <div class="main">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation" style="display: flex;justify-content: center;align-items: center; ">
                <a class="nav-link active" href="customer_query.php">Query</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="customer_edit.php">Edit</a>
            </li>
            <li class="nav-item" role="presentation">
                <button type="button" class="btn btn-primary" id="create">新增</button>
            </li>
        </ul>
        <div>
            <form style="text-align: left;margin-bottom: 10px;" method='post'>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <button name='lid' class="btn btn-light btn-block" id="lid"
                                onclick="dropdownvalue('LaptopID')">
                                ID
                            </button>
                        </li>
                        <li>
                            <button name='lname' class="btn btn-light btn-block" id="lame"
                                onclick="dropdownvalue('LaptopName')">
                                LaptopName
                            </button>
                        </li>
                        <li>
                            <button name='sname' class="btn btn-light btn-block" id="sname"
                                onclick="dropdownvalue('SupplierName')">
                                SupplierName
                            </button>
                        </li>
                        <li>
                            <button name='price' class="btn btn-light btn-block" id="price"
                                onclick="dropdownvalue('Price')">
                                Price
                            </button>
                        </li>
                        <li>
                            <button name='warranty' class="btn btn-light btn-block" id="warranty"
                                onclick="dropdownvalue('Warranty')">
                                Warranty
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
            function exhibit(data) {
                let statement = "<table class='table table-striped table-dark'>" +
                "<thead class='thead-dark'>"+
                "<tr><th scope='col'>ID</th><th scope='col'>laptop_name</th><th scope='col'>supplier_name</th><th scope='col'>price</th><th scope='col'>warranty</th><th scope='col'>more function</th></tr> </thead><tbody>";

                for (let i = 0; i < data.length; i++) {
                    statement += "<tr id=tr" + i + "><td id=lap" + i + ">" + data[i].LaptopID + "</td><td id=lname" + i + ">" + data[i].LaptopName + "</td><td id=sname" + i + ">" + data[i].SupplierName +"</td><td id=price" + i + ">" + data[i].Price + "</td><td id=war" + i + ">" + data[i].Warranty + "</td><td>"+
                        "<button class='btn btn-primary' name='search' id=update" + i + ">....</button>" +
                        "<button class='btn btn-primary' name='search' id=del" + i + ">-</button>" +
                        "</td></tr>";
                }
                console.log(statement);
                $("#maintable").html(statement);
                for (let i = 0; i < data.length; i++) {
                    $("#update" + i).click(function () {
                        event.preventDefault();
                        let id = $("#lap" + i).text();
                        let lname = $("#lname" + i).text();
                        let sname = $("#sname" + i).text();
                        let price = $("#price" + i).text();
                        let war = $("#war" + i).text();
                        let statement = "<tr id=tr" + i + "><td id=lap" + i + ">" + id + "</td><td><input type='text' id=lname" + i + " value=" + lname + "></td><td><input type='text' id=sname" + i + " value=" + sname + "></td><td><input type='text' id=price" + i + " value=" + price + "></td><td><input type='text' id=war" + i + " value=" + war + "></td><td>"+
                            "<button class='btn btn-primary' name='search' id=update" + i + ">update</button>" +
                            "<button class='btn btn-primary' name='search' id=del" + i + ">-</button>" +
                            "</td></tr>";
                        $("#tr" + i).replaceWith(statement);
                        $("#update" + i).click(function () {
                            event.preventDefault();
                            let id = $("#lap" + i).text();
                            let lname = $("#lname" + i).text();
                            let sname = $("#sname" + i).text();
                            let price = $("#price" + i).text();
                            let war = $("#war" + i).text();
                            $.ajax({
                                url: "laptop_update.php",
                                type: "POST",
                                data: {
                                    id: id,
                                    lname: lname,
                                    sname: sname,
                                    price: price,
                                    war: war
                                },
                                success: function (data) {
                                    alert(data);
                                    location.reload();
                                }
                            });
                        });
                    });

                    $("#del" + i).click(function () {
                        event.preventDefault();
                        let id = $("#lap" + i).text();
                        $.ajax({
                            url: "laptop_delete.php",
                            type: "POST",
                            data: {
                                id: id
                            },
                            success: function (data) {
                                alert(data);
                                location.reload();
                            }
                        });
                    });
                }
            };

            $("#create").click(function () {
                event.preventDefault();
                let statement = "<tr ><td>" +
                    "<input type='text'  class='form-control' disabled='disabled'>" +
                    "</td><td>" +
                    "<input type='text'  class='form-control' id='newlname'>" +
                    "</td><td>" +
                    "<input type='text'  class='form-control' id='newsname'>" +
                    "</td><td>" +
                    "<input type='text'  class='form-control' id='newprice'>" +
                    "</td><td>" +
                    "<input type='text'  class='form-control' id='newwar'>" +
                    "</td><td>" +
                    "<button class='btn btn-primary' name='search' id='po'><i class='fa fa-check' aria-hidden='true'></i></button>" +
                    "</td></tr>";
                $('#tr0').before(statement);
                $("#po").click(function () {
                    event.preventDefault();
                    let lname = $("#newlname").val();
                    let sname = $("#newsname").val();
                    let price = $("#newprice").val();
                    let war = $("#newwar").val();

                    $.ajax({
                        url: "laptop_create.php",
                        method: "post",
                        data: {
                            lname: lname,
                            sname: sname,
                            price: price,
                            war: war
                        },
                        success: function (res) {
                            res = JSON.parse(res);
                            console.log(res);
                            // alert(res);
                            // location.reload();
                        }
                    });
                });
            });



            $("#searchbt").click(function (event) {
                event.preventDefault();
                let search = $("#search").val();
                let condition = $("#dropdown").text();
                if (search == "") {
                    alert("Please enter a search term");
                } else {
                    $.ajax({
                        url: "laptop_search.php",
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

        </script>
        <!-- customer_query.php -->
        <!--  -->
    </div>
</body>

</html>

<style type="text/css">
    @import url("../style.css")
</style>