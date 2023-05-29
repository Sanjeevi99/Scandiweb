<?php
include_once ('ProductLogic.php');

class DB extends ProductLogic {
    function connection() {
        $con = mysqli_connect('localhost', 'root', '', 'productdb');
        if (!$con) {
            die('Connection error' . mysqli_connect_error());
        }
      return $con;  
    }

    

    public function displayAllData () {
        $con_obj = new DB ();
        $con = $con_obj->connection();
        $sql = "SELECT * FROM tblproducts Order by id DESC";
        $results = mysqli_query($con,$sql);
        return $results;
    }

    public function insertData (){
        // updated in AllProduct Class
    }

    

    public function deleteData (){
        $con_obj = new DB ();
        $con = $con_obj->connection();
        
        foreach($_POST["deleteId"] as $deleteId){
          $delete = "DELETE FROM tblproducts WHERE id = $deleteId";
          mysqli_query($con, $delete);
}       
    }
}

?>