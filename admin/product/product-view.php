<?php
include "../connection.php";

$sql = "SELECT * FROM product";


try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM `product` WHERE `id`= :id";
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
    <title>product</title>
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
                            <h4 class="card-title">product</h4>

                            <div class="table-responsive">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">product Name</th>
                                            <th scope="col">description</th>
                                            <th scope="col">price</th>
                                            <th scope="col">stockqty</th>
                                            <th scope="col">color</th>
                                            <th scope="col">image</th>
                                            <th scope="col">image2</th>
                                            <th scope="col">image3</th>
                                            <th scope="col">Operation</th>
                                            <th scope="col"><a class='btn btn-primary btn-sm btn-create ' class="add"
                                                    href="create-product.php">create
                                                    product</a></th>
                                        </tr>
                                    </thead>
                                    <?php


                                    $selectQuery = "SELECT * FROM product";
                                    $query = $pdo->query($selectQuery);

                                    if (!$query) {
                                        echo "Query failed: " . $pdo->errorInfo()[2];
                                    }

                                    $products = $query->fetchAll(PDO::FETCH_ASSOC);

                                    ?>


                                    <tbody>
                                        <?php foreach ($products as $product): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $product['id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $product['Productname']; ?>
                                                </td>
                                                <td class="description">
                                                    <?php echo $product['description']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $product['price']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $product['stockqty']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $product['color']; ?>
                                                </td>


                                                <td>
                                                    <img width="100px"
                                                        src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($product['image']) ?>"
                                                        alt=" ">

                                                </td>

                                                <td>
                                                    <img width="100px"
                                                        src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($product['image2']) ?>"
                                                        alt=" ">

                                                </td>

                                                <td>
                                                    <img width="100px"
                                                        src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($product['image3']) ?>"
                                                        alt=" ">

                                                </td>

                                                <td class="d-flex flex-row ">
                                                    <a class='btn btn-primary btn-sm m-1'
                                                        href='update.php?id=<?php echo $product['id']; ?>'>Update</a>

                                                    <a class='btn btn-danger btn-sm m-1'
                                                        href='product-view.php?id=<?php echo $product['id']; ?>'>Delete</a>
                                                </td>

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