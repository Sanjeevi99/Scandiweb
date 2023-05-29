function sku_validation() {
    let sku = document.getElementById("sku").value;
    let sku_msg = document.getElementById("sku-msg");

    if (sku == "" || sku == null) {
        sku_msg.style.display = "block";
        return false;
    } else {
        sku_msg.style.display = "none";
        return true;
    }
}


function name_validation() {
    let name = document.getElementById("name").value;
    let name_msg = document.getElementById("name-msg");

    if (name == "" || name == null) {
        name_msg.style.display = "block";
        return false;
    } else {
        name_msg.style.display = "none";
        return true;
    }
}


function price_validation() {
    let price = document.getElementById("price").value;
    let price_msg = document.getElementById("price-msg");
    let price_null_msg = document.getElementById("price_null_msg");


    if (price == "" || price == null) {
        price_msg.style.display = "none";
        price_null_msg.style.display = "block";
        return false;

    } else if (isNaN(price)) {
        price_null_msg.style.display = "none";
        price_msg.style.display = "block";
        return false;

    } else {
        price_msg.style.display = "none";
        price_null_msg.style.display = "none";
        return true;
    }
}


function type_validation() {
    let type = document.getElementById("productType").value;
    let type_msg = document.getElementById("type_null_msg");

    if (type == "" || type == null) {
        type_msg.style.display = "block";
        return false;
    } else {
        type_msg.style.display = "none";
        return true;
    }
}


function size_validation() {
    let type = document.getElementById("productType").value;
    let size = document.getElementById("size").value;
    let size_msg = document.getElementById("size-msg");
    let size_null_msg = document.getElementById("size_null_msg");

    if (type == "disk") {

        if (size == "" || size == null) {
            size_msg.style.display = "none";
            size_null_msg.style.display = "block";
            return false;

        } else if (isNaN(size)) {
            size_null_msg.style.display = "none";
            size_msg.style.display = "block";
            return false;

        } else {
            size_msg.style.display = "none";
            size_null_msg.style.display = "none";
            return true;
        }

    } else {
        return true;
    }

}


function weight_validation() {
    let type = document.getElementById("productType").value;
    let weight = document.getElementById("weight").value;
    let weight_msg = document.getElementById("weight-msg");
    let weight_null_msg = document.getElementById("weight_null_msg");


    if (type == "book") {

        if (weight == "" || weight == null) {
            weight_msg.style.display = "none";
            weight_null_msg.style.display = "block";
            return false;

        } else if (isNaN(weight)) {
            weight_null_msg.style.display = "none";
            weight_msg.style.display = "block";
            return false;

        } else {
            weight_msg.style.display = "none";
            weight_null_msg.style.display = "none";
            return true;
        }

    } else {
        return true;
    }


}


function height_validation() {
    let type = document.getElementById("productType").value;
    let height = document.getElementById("height").value;
    let height_msg = document.getElementById("height-msg");
    let height_null_msg = document.getElementById("height_null_msg");


    if (type == "furniture") {
        if (height == "" || height == null) {
            height_msg.style.display = "none";
            height_null_msg.style.display = "block";
            return false;

        } else if (isNaN(height)) {
            height_null_msg.style.display = "none";
            height_msg.style.display = "block";
            return false;

        } else {
            height_msg.style.display = "none";
            height_null_msg.style.display = "none";
            return true;
        }
    } else {
        return true;
    }
}


function width_validation() {
    let type = document.getElementById("productType").value;
    let width = document.getElementById("width").value;
    let width_msg = document.getElementById("width-msg");
    let width_null_msg = document.getElementById("width_null_msg");

    if (type == "furniture") {
        if (width == "" || width == null) {
            width_msg.style.display = "none";
            width_null_msg.style.display = "block";
            return false;

        } else if (isNaN(width)) {
            width_null_msg.style.display = "none";
            width_msg.style.display = "block";
            return false;

        } else {
            width_msg.style.display = "none";
            width_null_msg.style.display = "none";
            return true;
        }
    } else {
        return true;
    }
}


function length_validation() {
    let type = document.getElementById("productType").value;
    let length = document.getElementById("length").value;
    let length_msg = document.getElementById("length-msg");
    let length_null_msg = document.getElementById("length_null_msg");

    if (type == "furniture") {
        if (length == "" || length == null) {
            length_msg.style.display = "none";
            length_null_msg.style.display = "block";
            return false;

        } else if (isNaN(length)) {
            length_null_msg.style.display = "none";
            length_msg.style.display = "block";
            return false;

        } else {
            length_msg.style.display = "none";
            length_null_msg.style.display = "none";
            return true;
        }
    } else {
        return true;
    }
}


function final_validation() {
    if (sku_validation() && name_validation() && price_validation() && type_validation() && size_validation() && weight_validation() && height_validation() && width_validation() && length_validation()) {

    } else {
        event.preventDefault();
    }
}

//  
