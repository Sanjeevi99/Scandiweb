<?php
include_once('DB.php');

$Database_obj = new DB ();
$con = $Database_obj->connection();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

  <div class="container">
                                <div class="top">
                                    <h1>Product List</h1>
                                    <div class="btns">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <button class="add"><a class="add-link" href="AddProduct.php">ADD</a></button>
                                            <button type="submit" name="delete" class="delete">MASS DELETE</button>
                                        
                                    </div>  
                                </div>
                                <hr>
                                <div class="main">
    
      <!-- <form class="" action="" method="post">
        
          <button type="submit" name="delete">Delete</button> -->
          
        
        <?php
        if(isset($_POST["delete"]) && isset($_POST["deleteId"])){

          $Database_obj->deleteData ();
        }

        
        $results = $Database_obj->displayAllData ();

        if(mysqli_num_rows($results)>0){
        
        foreach($results as $row) {
        ?>
        
        <div class="card">
                                    <input type="checkbox" class="delete-checkbox" name="deleteId[]" value="<?php echo $row['id']; ?>">
                                        <div class="card-data">
                                            <p><?php echo $row["sku"]; ?></p>
                                            <p><?php echo $row["name"]; ?></p>
                                            <p><?php echo $row["price"]; ?></p>
                                            <div class="data">
                                                <p><?php echo $row["val_type"];?>: </p>
                                                <p><?php echo $row["value"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
        
        <?php  } 
         }else{
          echo '<p>No Data to Display</p>';
        } ?>
      </form>
    </div>
    <div class="footer">
                                    <hr>
                                    <h5>Scandiweb Test Assignment</h5>
                                </div>
                            </div>
  </body>
</html>