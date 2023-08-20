<?php
include "../connection.php";

$sql = "SELECT * FROM shipment";



try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM `shipment` WHERE `id`= :id";
    $deleteStatement = $pdo->prepare($deleteQuery);

    try {
        $deleteStatement->execute(['id' => $id]);
    } catch (PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    }
}


?>




<!doctype html>
<html lang="en">

<head>
    <title>shipment </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../nav.css">

</head>

<body>



    <div class="side">
        <?php
        include "../nav.php";

        ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">shipment</h4>

                            <div class="table-responsive">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">first name</th>
                                            <th scope="col">last name</th>
                                            <th scope="col">phone</th>
                                            <th scope="col">address</th>
                                            <th scope="col">city</th>
                                            <th scope="col">country</th>
                                            <th scope="col">shipment date </th>
                                            <th scope="col">zip</th>
                                            <th scope="col">customerid</th>
                                            <th scope="col">Operation</th>
                                        </tr>
                                    </thead>
                                    <?php


                                    $selectQuery = "SELECT * FROM shipment ";
                                    $query = $pdo->query($selectQuery);

                                    if (!$query) {
                                        echo "Query failed: " . $pdo->errorInfo()[2];
                                    }

                                    $shipments = $query->fetchAll(PDO::FETCH_ASSOC);
                                    ?>


                                    <tbody>
                                        <?php foreach ($shipments as $shipment): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $shipment['id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $shipment['firstname']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $shipment['lastname']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $shipment['phone']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $shipment['address']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $shipment['city']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $shipment['country']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $shipment['Shipmentdate']; ?>
                                                </td>
                                                
                                                
                                                <td>
                                                    <?php echo $shipment['zip']; ?>
                                                </td>
                                                
                                                <td>
                                                    <?php echo $shipment['customerid']; ?>
                                                </td>

                                                <td class="d-flex flex-row ">
                                                    <a class='btn btn-primary btn-sm m-1'
                                                        href='update-shipment.php?id=<?php echo $shipment['id']; ?>'>Update</a>
                                                    <a class='btn btn-danger btn-sm m-1'
                                                        href='shipment-view.php?id=<?php echo $shipment['id']; ?>'>Delete</a>
                                                </td>
                                                <td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>