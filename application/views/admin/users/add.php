<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>New User</h1>
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
                <a href="<?php echo base_url();?>/administration/users" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i> BACK</a>
                
            <div class="card">
                <div class="card-header">
                    <strong>User Form</strong> Elements
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
                    <form action="<?php echo base_url();?>administration/users/store" method="post" enctype="multipart/form-data" class="form-horizontal">
                        

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Role:</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selRole" id="select" class="form-control">
                                    <option value="">Please select</option>
                                    <?php foreach($roles as $role): ?>
                                        <option value="<?php echo $role->ROLE_Code;?>"><?php echo $role->ROLE_Name;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>  
                        
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Phone:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtPhone" placeholder="User Phone..." class="form-control">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Names:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtNames" placeholder="User Names..." class="form-control">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>                        

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Email:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="text-input" name="txtEmail" placeholder="User Email..." class="form-control">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div> 
                        
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Username:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtUsername" placeholder="User Username..." class="form-control">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div> 

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Password:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="text-input" name="txtPassword" placeholder="User Password..." class="form-control">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div> 

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Avatar:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtAvatar" placeholder="User Avatar URL..." class="form-control">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                       
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Status:</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selStatus" id="select" class="form-control">
                                    <option value="">Please select</option>
                                    <option value="1">ON</option>
                                    <option value="0">OFF</option>
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

