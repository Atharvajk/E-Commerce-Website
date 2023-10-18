<?php
include_once "../authguard.php";
include "navbar.html";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>   
    <div style="display: block; height: 100px;"></div>

    <center>

        <div  style="background-color: beige;padding: 40px; max-width: 600px; overflow:hidden; ;">
            
        <h3 style="margin: 20px;">Upload Product</h3>
        
        <form  id="add_product_form" action="upload.php"  method="post"  enctype="multipart/form-data">
        <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Product Tittle</span>
  <input type="text" name="tittle"  class="form-control"  aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="input-group mb-3">
  <span class="input-group-text">Product Price $</span>
  <input type="number" name="price" class="form-control" aria-label="Amount (to the nearest dollar)">

</div>
  <div class="input-group mb-3">
  <span class="input-group-text">Product Description</span>
  <textarea name="desc" class="form-control" ></textarea>
</div>
<div class="input-group mb-3">
  <input type="file" name="imgfile" class="form-control" id="inputGroupFile02">
</div>
  
         
            <button  class="btn btn-primary p-3" >Add Product</button>
            
        </form>
        <br>
    </div>
</center>
</body>
</html>