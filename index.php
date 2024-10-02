<?php // la conexión a Northwind
include_once 'php/connection.php';
$con = connection();
?>
<?php // la query
$sqlQuery = "Select products.ProductName, categories.CategoryName, products.UnitPrice from products, categories where products.categoryID = categories.CategoryID and unitPrice > (Select avg(p.UnitPrice) from products p where products.categoryID = p.categoryID);";
$result = $con->query($sqlQuery);
?>
<!--la tabla en html con estilo-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
    <table>
        <tr>
            <th>Nombre de la Categoría</th>
            <th>Nombre del Producto</th>
            <th>Precio</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['CategoryName'] ?></td>
                <td><?= $row['ProductName'] ?></td>
                <td><?= $row['UnitPrice'] ?></td>
            </tr>
        <?php endwhile; ?>
        <?php $con->close(); ?>
    </table>
</body>
</html>


