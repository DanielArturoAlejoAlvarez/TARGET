<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>EDIT Category</h1>
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
                <a href="<?php echo base_url();?>/maintenance/categories" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i> BACK</a>
                
            <div class="card">
                <div class="card-header">
                    <strong>Category Form</strong> Elements
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
                    <form action="<?php echo base_url();?>maintenance/categories/update" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="txtId" value="<?php echo $category->CATE_Code;?>">
                        <div class="row form-group <?php echo !empty(form_error('txtName')) ? 'has-error' : ''; ?>">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Name:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtName" placeholder="Category Name..." class="form-control" value="<?php echo !empty(form_error()) ? set_value('txtName') : $category->CATE_Name;?>">
                                <?php echo form_error("txtName","<small class='form-text text-danger'>","</span>"); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class=" form-control-label">Body:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="txtDesc" id="textarea-input" rows="9" placeholder="Category Content..." class="form-control"><?php echo $category->CATE_Desc;?></textarea>
                            </div>
                        </div>

                       
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Status:</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selStatus" id="select" class="form-control">
                                    <option value="">Please select</option>
                                    <option <?php if($category->CATE_Flag==1){echo 'selected';}else{echo '';}?> value="1">ON</option>
                                    <option <?php if($category->CATE_Flag==0){echo 'selected';}else{echo '';}?> value="0">OFF</option>
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

