<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="index-main">
    <a href="joinsearch/total.php">
        <button type="button" class="btn btn-primary btn-lg">
            Detailed transaction information</button>
    </a>
        <div style="width: 100%; background-color: red;">
        </div>
        <a href="laptop/laptop_query.php">
            <button type="button" class="btn btn-primary btn-lg index-item">
                Laptop
            </button>
        </a>
        <a href="customer/customer_query.php">
            <button type="button" class="btn btn-primary btn-lg index-item">
                Customer
            </button>
        </a>
        <a href="supplier/supplier_query.php">
            <button type="button" class="btn btn-primary btn-lg index-item">
                Supplier
            </button>
        </a>
        <a href="trade/trade_query.php">
            <button type="button" class="btn btn-primary btn-lg index-item">
                Trade
            </button>
        </a>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        const triggerTabList = document.querySelectorAll('#myTab button')
        triggerTabList.forEach(triggerEl => {
            const tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', event => {
                event.preventDefault()
                tabTrigger.show()
            })
        })
        const tabEl = document.querySelector('button[data-bs-toggle="tab"]')
        tabEl.addEventListener('show.bs.tab', event => {
            event.target // newly activated tab
            event.relatedTarget // previous active tab
        })
    </script>
</body>

</html>

<style type="text/css">
    @import url("style.css")
</style>