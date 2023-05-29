<?php
include_once('DB.php');
class AllProduct extends DB {
    
    protected $SKU;
    protected $name;
    protected $price;
    protected $type;
    protected $value_type;
    protected $value;
    
    
    public function setSKU($SKU){
        $this->SKU=$SKU;
    }
    public function setName($name){
        $this->name=$name;
    }
    public function setPrice($price){
        $this->price=$price;
    }
    public function setType($type){
        $this->type=$type;
    }
    public function setValue($value){
        $this->value=$value;
    }
    public function setValue_type($value_type){
        $this->value_type=$value_type;
    }
    public function getValue_type(){
        return $this->value_type;
    }
    public function getValue(){
        return $this->value;
    }
    public function getSKU(){
        return $this->SKU;
    }
    public function getName(){
        return $this->name;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getType(){
        return $this->type;
    }

    public function insertData () {
        
        $Database_obj = new DB ();
        $con = $Database_obj->connection();

        $s=$this->getSKU();
        $p=$this->getPrice();
        $t=$this->getType();
        $n=$this->getName();
        $z=$this->getValue();
        $y=$this->getValue_type();


        $sql="insert into `tblproducts` (sku,name,price,val_type,value) 
        values('$s','$n','$p','$y','$z')";
        
        if(mysqli_query($con,$sql))
        {
            header("Location: home.php");
        }
        else{
            
            echo "Opps !!! , Something Wrong Please Re-try...";
        }
}

    }

?>