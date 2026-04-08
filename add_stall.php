<?php
if(isset($_POST['add'])){

    $name = $_POST['name'];
    $cat = $_POST['cat'];
    $price = $_POST['price'];

    $sql = "INSERT INTO stalls(stall_name, category, price) 
            VALUES('$name', '$cat', $price)";

    if($conn->query($sql) === TRUE){
        echo "<script>alert('✅ Stall Added Successfully');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>