<?php
  include 'app/views/navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>SuitGarcon</title>
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Standout</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS
    ================================================== -->
    <link href="/app/css/bootstrap.min.css" rel="stylesheet">

    <!-- script
    ================================================== -->
    <script src="/app/views/js/modernizr.js"></script>
    <script src="/app/views/js/pace.min.js"></script>


    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>
<body>
    <div class="center-block" >
        <div class="col-six tab-full">
            <h3>Your Orders</h3>
            <div class="row add-bottom">
                <div class="col-twelve">
                    <?php
                        echo "<table>
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Location</th>
                                        <th>Pickup Date</th>
                                        <th>Delivery Date</th>
                                    </tr>
                                </thead>
                                <tbody>";
                        if($data['orders'] == null){
                            echo "<td colspan='5' style='text-align: center;'>You Have No Orders</td>";
                        }
                        else{
                            foreach ($data['orders'] as $order) {
                                echo "<tr>
                                <td>$order->type</td>
                                <td>$order->status</td>
                                <td>$order->location</td>
                                <td>$order->pickup</td>
                                <td>$order->delivery</td>
                                </tr>";
                            }
                        }
                        echo "</tbody>
                        </table>";
                    ?>
                </div>    
            </div>
        </div>
    </div>
</body>
</html>






