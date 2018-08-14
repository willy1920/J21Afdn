<?php
    include "config/config.php";
    include "config/sessionUser.php";

    $tmpName;
    $tmpIdProduct = htmlspecialchars($_GET['idProduct']);
    echo $tmpIdProduct;
    $sql = "SELECT product.idProduct,
            product.sellingPrice,
            product.stock,
            dataproduct.name,
            dataproduct.description,
            dataproduct.size,
            dataproduct.color,
            dataproduct.picture
            FROM product
            INNER JOIN dataproduct
            ON product.idProduct = dataproduct.idProduct
            WHERE dataproduct.idProduct = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $tmpIdProduct);
        if($stmt->execute()){
            $stmt->bind_result($idProduct, $price, $stock, $name, $description, $size, $color, $picture);
            while($row = $stmt->fetch()){
                $tmpName = $name;
                  echo $price."<br>";
                echo $stock."<br>";
                echo $name."<br>";
                echo $description."<br>";
                echo $size."<br>";
                echo $color."<br>";
                echo $picture."<br>";
    
                ?>
                
                <input type="hidden" name="idProduct" id="idProduct" value="<?php echo $idProduct; ?>">
                <?php
                if (isset($_SESSION['id'])) {
                    ?>
                    <input type="hidden" name="idAccount" id="idAccount" value="<?php echo $_SESSION['id']; ?>">
                    <input type="number" name="addStock" id="trolliStock">
                    <input type="submit" value="addSubmit" onclick="submitTrolli()">
                    <?php
                }
                ?>

            <?php
            }
        }
        else{
            echo $stmt->error;
        }
        $stmt->close();
    }
    else{
        echo "Execute failed";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Silahkan Belanja</title>
    <script src="js/ajax.js"></script>
    <script src="js/user.js"></script>
</head>
<body>
    
</body>
</html>