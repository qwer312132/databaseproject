<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <div class="main" background="https://images.unsplash.com/photo-1593160758246-02187660fd9f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="customer_query.php">Query</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="customer_edit.php">Edit</a>
            </li>
        </ul>
        <form method="post">
            <div class="input-group">
                <div class="form-outline">
                    <input type="search" id="form1" placeholder="Search" class="form-control" name="city" />
                    <!-- <label class="form-label" for="form1">Search</label> -->
                </div>
                <button type="submit" class="btn btn-primary" name="button1">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <!-- customer_query.php -->
        <?php
        include_once "db_conn.php";

        if (isset($_POST['button1'])) {
            $query = sprintf("select * from customer where customer_city='%s'", $_POST['city']);
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchALL();
            if (count($result)) {

                echo "<table border='1'>
                <tr>
                <th>ID</th>
                <th>customer_name</th>
                <th>customer_street</th>
                <th>customer_city</th>
                </tr>";
                for ($i = 0; $i < count($result); $i++) {
                    echo "<tr>";
                    echo "<td>" . $result[$i][0] . "</td>";
                    echo "<td>" . $result[$i][1] . "</td>";
                    echo "<td>" . $result[$i][2] . "</td>";
                    echo "<td>" . $result[$i][3] . "</td>";
                    echo "</tr>";
                }
            }
        }
        ?>
    </div>
</body>

</html>

<style type="text/css">
    @import url("style.css")
</style>