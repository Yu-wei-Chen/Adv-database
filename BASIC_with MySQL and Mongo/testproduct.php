<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script type="text/javascript" src="js.js"></script>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
	<title></title>
	<link rel="stylesheet" href="">
</head>

<body>
    <div class="item">
        <div class="container">
            <div class="col-md-9">
                <div class="col-md-5 grid">
                    <div class="flexslider">
                        <div class="item_display">
        <?php include_once("Item_select.php"); ?>
    <div class="available">
                            <!--size(optional) or other available option-->
                            <h6>Choose quantity </h6>
                            <ul>
                                <li>Quantity: <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select></li>
                            </ul>
                        </div>
                        <a href="#" class="cart item_add">Add to Cart</a>
                    </div>
                </div>
            </div>
	<form action="testproduct.php" method="POST">
        <input type="text" id="txt" value="1" name="search"/>
        <input type="submit" value="button" class="button" />
    </form>
</body>
</html>