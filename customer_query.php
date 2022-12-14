<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Customer</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
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
        <form method='post'>
            <div class='input-group'>
                <div class='form-outline'>
                    <input type='search' id='form1' placeholder='Search' class='form-control' name='S' />
                </div>
                <button type='submit' class='btn btn-primary' name='search'>
                    <i class='fas fa-search'></i>
                </button>
            </div>
        </form>
        <!-- customer_query.php -->
        <?php
        session_start();
        include_once "db_conn.php";
        $_SESSION['condition'];
        // searchbar("temp");
        if (isset($_POST['name'])) {
            
            $_SESSION['condition'] = 'name';
            // Search($_SESSION['condition'], $db);
            echo $_SESSION['condition'];
        } 
        else if (isset($_POST['city'])) {
            $_SESSION['condition'] = 'city';
        }
        else if (isset($_POST['street'])) {
            $_SESSION['condition'] = 'street';
        } 
        // function Search($_SESSION['condition'], $db){
        if (isset($_POST['search'])) {
            
            #echo $_SESSION['condition'];
            $query = sprintf("select * from customer where customer_%s='%s'", $_SESSION['condition'], $_POST['S']);
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchALL();
            if (count($result)) {

                echo "
                    <table class='table'>
                    <thead class='thead-dark'>
                    <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>customer_name</th>
                    <th scope='col'>customer_street</th>
                    <th scope='col'>customer_city</th>
                    </tr>
                    </thead>
                    <tbody>
                    "
                    ;
                for ($i = 0; $i < count($result); $i++) {
                    echo "<tr>";
                    echo "<td>" . $result[$i][0] . "</td>";
                    echo "<td>" . $result[$i][1] . "</td>";
                    echo "<td>" . $result[$i][2] . "</td>";
                    echo "<td>" . $result[$i][3] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            }
        }

        ?>
    </div>
</body>

</html>

<style type="text/css">
    @import url("style.css")
</style>