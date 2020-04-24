<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Product</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <a href="<?php echo base_url();?>/maintenance/products" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i> BACK</a>
                
            <div class="card">
                <div class="card-header">
                    <strong>Product Form</strong> Elements
                </div>
                <div class="card-body card-block">
                    <?php if($this->session->flashdata("error")): ?>
                        <div class="col-sm-12">
                            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                <span class="badge badge-pill badge-danger">ERROR: </span> <?php echo $this->session->flashdata("error"); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo base_url();?>maintenance/products/update" method="post" enctype="multipart/form-data" class="form-horizontal">
                        
                        <input type="hidden" name="txtId" value="<?php echo $product->PROD_Code;?>">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Category:</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selCategory" id="select" class="form-control">
                                    <option value="">Please select</option>
                                    <?php foreach($categories as $cat): ?>
                                        <option <?php if($cat->CATE_Code==$product->CATE_Code){echo 'selected';}else{echo '';}?> value="<?php echo $cat->CATE_Code;?>"><?php echo $cat->CATE_Name;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Serial:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtSerial" placeholder="Product Serial..." class="form-control" value="<?php echo $product->PROD_Serial;?>">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Name:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtName" placeholder="Product Name..." class="form-control" value="<?php echo $product->PROD_Name;?>">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class=" form-control-label">Body:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="txtDesc" id="textarea-input" rows="9" placeholder="Product Content..." class="form-control"><?php echo $product->PROD_Desc;?></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Price:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtPrice" placeholder="Product Price..." class="form-control" value="<?php echo $product->PROD_Price;?>">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Stock:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtStock" placeholder="Product Stock..." class="form-control" value="<?php echo $product->PROD_Stock;?>">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>                        

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Image:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtPicture" placeholder="Product Image URL..." class="form-control" value="<?php echo $product->PROD_Picture;?>">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                       
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Status:</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selStatus" id="select" class="form-control">
                                    <option  value="">Please select</option>
                                    <option <?php if($product->PROD_Flag==1){echo 'selected';}else{echo '';}?>  value="1">ON</option>
                                    <option <?php if($product->PROD_Flag==0){echo 'selected';}else{echo '';}?> value="0">OFF</option>
                                </select>
                            </div>
                        </div>
                            
                    
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-danger btn-lg btn-block">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </div>                    
                </div>
                </form>
            </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

