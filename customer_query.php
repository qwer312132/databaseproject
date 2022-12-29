<!DOCTYPE html>
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
    </header>
    <div class="main">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="customer_query.php">Query</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="customer_edit.php">Edit</a>
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

        <!-- <table class='table'>
                    <thead class='thead-dark'>
                    <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>customer_name</th>
                    <th scope='col'>customer_street</th>
                    <th scope='col'>customer_city</th>
                    </tr>
                    </thead>
                    <tbody> -->

        <script>
            function exhibit(data) {
                let statement = "<table class='table'><thead class='thead-dark'><tr><th scope='col'>ID</th><th scope='col'>customer_name</th><th scope='col'>customer_street</th><th scope='col'>customer_city</th></tr> </thead><tbody>";

                for(let i = 0; i < data.length; i++) {
                    statement += "<tr><td>" + data[i].CustomerID + "</td><td>" + data[i].CustomerName + "</td><td>" + data[i].CustomerPhone + "</td></tr>";
                }
                console.log(statement);
                $('#formsearch').after(statement);
            };


            $("#searchbt").click(function(event) {
                event.preventDefault();
                let search = $("#search").val();
                if(search == "") {
                    alert("Please enter a search term");
                } 
                else 
                {
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
    @import url("style.css")
</style>

