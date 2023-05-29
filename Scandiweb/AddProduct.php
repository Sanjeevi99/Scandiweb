<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <?php 

        include 'allProduct.php';
        include_once('DB.php');

        if(isset($_POST['save'])){
            
                $Database_obj = new DB ();
                $con = $Database_obj->connection();
                $s = $_POST['sku'];

                $product=new AllProduct();
                $product->setSKU($_POST['sku']);
                $product->setName($_POST['name']);
                $product->setPrice($_POST['price']);
                $product->setType($_POST['productType']);
                if ($_POST['weight'] != "") {
                    $product->setValue($_POST['weight']."KG");
                    $product->setValue_type("Weight");
                }elseif ($_POST['size'] != "") {
                    $product->setValue($_POST['size']." MB");
                    $product->setValue_type("Size");
                }elseif ($_POST['height'] != "") {
                    $product->setValue($_POST['height']."X".$_POST['width']."X".$_POST['length']);
                    $product->setValue_type("Dimension");
                }

                $sql1 = "SELECT * FROM `tblproducts` WHERE `sku`='$s'";

                $results = mysqli_query($con,$sql1);
                
                if (mysqli_num_rows($results)>0) {
                    echo '<script>alert("Opps !!! , This SKU is already used")</script>';
                } else {
                    $product->insertData();
                }
                
            
            
            // header("Location: display.php");
        }
    
    ?>
    <div class="container">
        <form class="form" name="form" id="product_form" method="post">
            <div class="top">
                <h1>Product Add</h1>
            <div class="btns">
                <button type="submit" class="save" name="save" id="save" onclick="final_validation ()" >Save</button>
                <!-- <button class="cancel" onclick="validate()">Cancel</button> -->
                <button class="cancel"><a class="cancel-link" href="home.php">Cancel</a></button>
                <!-- <a href="NIC_profiles.php"><button class="inhome-btn">View Digital Profiles</button></a> -->
            </div>
            </div>
            <hr>

            <div class="input-fields">
                <label for="">SKU</label>
                <input type="text" name="sku" id="sku" onblur="sku_validation ()">
                <label id="sku-msg" class="validation-message">* Please, submit required data</label>
            </div>
            <div class="input-fields">
                <label for="">Name</label>
                <input type="text" name="name" id="name" onblur="name_validation ()">
                <label id="name-msg" class="validation-message">* Please, submit required data</label>
            </div>
            <div class="input-fields">
                <label for="">Price ($)</label>
                <input type="text" name="price" id="price" onblur="price_validation ()">
                <label id="price-msg" class="validation-message">* Please, provide the data in Numbers</label>
                <label id="price_null_msg" class="validation-message">* Please, submit required data</label>
            </div>
            <div class="input-fields">
                <label for="typeSwitcher"> <b>Type switcher</b></label>
                <select class="select" id="productType" name="productType" onclick="type_validation ()">
                    <option selected disabled value=''>Select Type</option>
                    <option value="disk">DVD-disc</option>
                    <option value="book">Book</option>
                    <option value="furniture">Furniture</option>
                </select>
                <label id="type_null_msg" class="validation-message">* Please, select a Type</label>
            </div>
            <div class="dynamic-form" name="disk" id="disk">
                <div class="input-fields">
                    <label for=" size">Size (MB)</label>
                    <input type="text" name="size" id="size" onblur="size_validation ()">
                    <label id="size-msg" class="validation-message">* Please, provide the size in in indicated type</label>
                    <label id="size_null_msg" class="validation-message">* Please, submit required data</label>
                </div>
                <p class="description">Please provide size in MB format.</p>
            </div>
            <div class="dynamic-form" name="book" id="book">
                <div class="input-fields">
                    <label for="weight">Weight (KG)</label>
                    <input type="text" name="weight" id="weight" onblur="weight_validation ()">
                    <label id="weight-msg" class="validation-message">* Please, provide the Weight in indicated type</label>
                    <label id="weight_null_msg" class="validation-message">* Please, submit required data</label>
                </div>
                <p class="description">Please provide weight in Kg format.</p>
            </div>
            <div class="dynamic-form" name="furniture" id="furniture">
                <div class="input-fields">
                    <label for="height">Height (CM)</label>
                    <input type="text" name="height" id="height" onblur="height_validation ()">
                    <label id="height-msg" class="validation-message">* Please, provide the Height in indicated type</label>
                    <label id="height_null_msg" class="validation-message">* Please, submit required data</label>
                </div>
                <div class="input-fields">
                    <label for="width">Width (CM)</label>
                    <input type="text" name="width" id="width" onblur="width_validation ()">
                    <label id="width-msg" class="validation-message">* Please, provide the Width in indicated type</label>
                    <label id="width_null_msg" class="validation-message">* Please, submit required data</label>
                </div>
                <div class="input-fields">
                    <label for="length">Length (CM)</label>
                    <input type="text" name="length" id="length" onblur="length_validation ()">
                    <label id="length-msg" class="validation-message">* Please, provide the Length in indicated type</label>
                    <label id="length_null_msg" class="validation-message">* Please, submit required data</label>
                </div>
                <p class="description">Please provide dimensions in H x W x L format.</p>
                
            </div>
    </div>

    </form>
    <div class="footer">
        <hr>
        <h5>Scandiweb Test Assignment</h5>
    </div>
    </div>

    <script>
        $(function () {
            $("#productType").on("change", function () {
                // $(".dynamic-form").prop('disabled', true);
                $(".dynamic-form").hide();
                $("#" + $(this).val()).show();
            })
        });

        
    </script>
    <script src="validation.js"></script> 

</body>

</html>