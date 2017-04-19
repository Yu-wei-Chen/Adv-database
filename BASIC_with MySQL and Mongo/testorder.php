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
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>
                    Product
                </th>
                <th>
                    Qty
                </th>                    
                <th>
                    Price
                </th>
                <th>
                    Purchase data
                </th>
                <th>                       
                     Status
                </th>
                <th>
                    Cancle order
                </th>
            </tr> 
       </thead>
        <tbody>
            <?php include("testproductselect.php"); ?>
        </tbody>
    </table>
	<form action="testproduct.php" method="POST">
        <input type="text" id="txt" value="shoes" name="search"/>
        <input type="submit" value="button" class="button" />
    </form>
</body>
</html>