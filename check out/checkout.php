<?php include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>check out</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body class="animsition">

    <?php include 'nav.php' ?>
    <div class="site-wrap">
        <div class="container" style="margin-top:200px">

            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Billing Details</h2>
                    <div class="p-3 p-lg-5 border">
                        <form action="placeorder.php" method='POST'>
                            <div class="form-group">
                                <label for="c_country" class="text-black">Country <span
                                        class="text-danger">*</span></label>
                                <select id="c_country" class="form-control" name='c_country'>
                                    <option value="1">Select a country</option>
                                    <option value="2" Selected>Jordan</option>
                                    <option value="3">Algeria</option>
                                    <option value="4">Afghanistan</option>
                                    <option value="5">Ghana</option>
                                    <option value="6">Albania</option>
                                    <option value="7">Bahrain</option>
                                    <option value="8">Colombia</option>
                                    <option value="9">Dominican Republic</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="c_fname">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_lname" name="c_lname">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_address" name="c_address"
                                        placeholder="Street address">
                                </div>
                            </div>

                            <div class="form-group">

                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_state_country" class="text-black">State / Country <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_state_country" name="c_state_country">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_postal_zip" class="text-black">Posta / Zip <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                                </div>
                            </div>

                            <div class="form-group row mb-5">

                                <div class="col-md-6">
                                    <label for="c_phone" class="text-black">Phone <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_phone" name="c_phone"
                                        placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block" type='submit'
                                    style="background-color:black;border:black" name="submit">Place
                                    Order</button>
                            </div>
                        </form>
                        <div class="form-group">

                            <div class="collapse" id="create_an_account">
                                <div class="py-2">

                                    <div class="form-group">

                                        <input type="email" class="form-control" id="c_account_password"
                                            name="c_account_password" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                        </div>

                        <div class="form-group">

                        </div>

                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                            <div class="p-3 p-lg-5 border">
                                <form method="POST">
                                    <label for="c_code" class="text-black mb-3">Enter your coupon code if you have
                                        one</label>
                                    <div class="input-group w-75">
                                        <input type="text" class="form-control" id="c_code" placeholder="Coupon Code"
                                            aria-label="Coupon Code" aria-describedby="button-addon2" name="coupon">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-lg px-4" type="submit" id="button-addon2"
                                                name="submit" style="background-color:black;border:black">Apply</button>
                                        </div>
                                    </div>

                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Your Order</h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $user = $_COOKIE['userid'];
                                        $query = "SELECT product.Productname, product.price ,cart.quantity
                                FROM cart 
                                INNER JOIN product  ON cart.productid = product.id
                                WHERE cart.customerid =?";
                                        $statement = $pdo->prepare($query);
                                        $statement->execute([$user]);
                                        $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($orders as $order) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $order['Productname'] ?> <strong class="mx-2">x</strong>
                                                    <?php echo $order['quantity'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $order['price'] . 'JD' ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td><span style="font-weight:bold; font-size:20px">Subtotal:</span>
                                                <?php if (isset($_SESSION['TOTAL']))
                                                    echo $_SESSION['TOTAL'] . 'JD'
                                                        ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span style="font-weight:bold; font-size:20px">Total:</span>
                                                <?php if (isset($_SESSION['TOTAL'])) {
                                                    if (isset($_POST['submit'])) {
                                                        $coupon = $_POST['coupon'];


                                                        $query = "SELECT coupon_name, discount FROM coupon";
                                                        $result = $pdo->query($query);
                                                        $coupons = $result->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach ($coupons as $singleCoupon) {
                                                            if ($singleCoupon['coupon_name'] == $coupon) {
                                                                $total = $_SESSION['TOTAL'];
                                                                $totaldiscount = (int) ($_SESSION['TOTAL'] * $singleCoupon['discount'] / 100);
                                                                $_SESSION['TOTALDiscount'] = $totaldiscount; ?>

                                                                <span style="text-decoration: line-through; color:red">
                                                                    <?php echo $_SESSION['TOTAL'] ?>
                                                                </span> <span style="font-size:20px;font-weight:bold">
                                                                    <?php echo (int) ($_SESSION['TOTAL'] * $singleCoupon['discount'] / 100) . 'JD';
                                                                    ?>
                                                                </span>
                                                                <?php break;
                                                            } else {
                                                                echo $_SESSION['TOTAL'];
                                                            }
                                                        }
                                                    } else {
                                                        echo $_SESSION['TOTAL'];
                                                    }
                                                }

                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </form>
    <!-- </form> -->
    </div>
    </div>


    </div>
    <?php include 'footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>

    <!--===============================================================================================-->


    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>