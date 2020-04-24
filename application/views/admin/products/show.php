<div class="row">
    <div class="col-md-6">
        <img class="img-fluid" src="<?php echo $product->PROD_Picture; ?>" alt="<?php echo $product->PROD_Name; ?>">
    </div>
    <div class="col-md-6">
        <h3><?php echo $product->PROD_Name; ?></h3>
        <h5><?php echo $product->PROD_Desc; ?></h5>

        <h6><strong>SERIAL: </strong> <?php echo $product->PROD_Serial; ?></h6>
        <h5><strong>CATEGORY: </strong> <?php echo $product->category; ?></h5>
        <h5><strong>PRICE: </strong> <span class="badge badge-warning" style="font-size: 1em;">$/.<?php echo $product->PROD_Price; ?></span></h5>
        <h5><strong>STOCK: </strong> <?php echo $product->PROD_Stock; ?></h5>
        <h6><strong>STATUS: </strong> <?php echo $product->PROD_Flag; ?></h6>
    </div>    
</div>

