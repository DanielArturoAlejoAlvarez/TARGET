<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit User</h1>
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
                    <form action="<?php echo base_url();?>administration/users/update" method="post" enctype="multipart/form-data" class="form-horizontal">
                        
                        <input type="hidden" name="txtId" value="<?php echo $user->USR_Code;?>">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Role:</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selRole" id="select" class="form-control">
                                    <option value="">Please select</option>
                                    <?php foreach($roles as $role): ?>
                                        <option <?php if($role->ROLE_Code==$user->ROLE_Code){echo 'selected';}else{echo '';}?> value="<?php echo $role->ROLE_Code;?>"><?php echo $role->ROLE_Name;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>  
                        
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Phone:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtPhone" placeholder="User Phone..." class="form-control" value="<?php echo $user->USR_Phone;?>">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group <?php echo !empty(form_error('txtNames')) ? 'has-error' : '';?>">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Names:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtNames" placeholder="User Names..." class="form-control" value="<?php echo !empty(form_error('txtNames')) ? set_value('txtNames') : $user->USR_Names;?>">
                                <?php echo form_error("txtNames","<small class='form-text text-danger'>","</small>");?>
                            </div>
                        </div>                        

                        <div class="row form-group <?php echo !empty(form_error('txtEmail')) ? 'has-error' : '';?>">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Email:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="text-input" name="txtEmail" placeholder="User Email..." class="form-control" value="<?php echo !empty(form_error('txtEmail')) ? set_value('txtEmail') : $user->USR_Email;?>">
                                <?php echo form_error("txtEmail","<small class='form-text text-danger'>","</small>");?>
                            </div>
                        </div> 
                        
                        <div class="row form-group <?php echo !empty(form_error('txtUsername')) ? 'has-error' : '';?>">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Username:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtUsername" placeholder="User Username..." class="form-control" value="<?php echo !empty(form_error('txtUsername')) ? set_value('txtUsername') : $user->USR_Username;?>">
                                <?php echo form_error("txtUsername","<small class='form-text text-danger'>","</small>");?>
                            </div>
                        </div> 

                        <!-- <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Password:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="text-input" name="txtPassword" placeholder="User Password..." class="form-control" value="<?php //echo $user->USR_Password;?>" disabled>
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>  -->

                        <div class="row form-group">
                            
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Avatar:</label>                                
                            </div>
                            <div class="col-12">
                                <?php if($user->USR_Avatar):?>
                                    <img width="150" class="img-fluid" src="<?php echo $user->USR_Avatar; ?>" alt="<?php echo $user->USR_Names; ?>">
                                <?php endif; ?>                                
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtAvatar" placeholder="User Avatar URL..." class="form-control" value="<?php echo $user->USR_Avatar;?>">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                       
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Status:</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selStatus" id="select" class="form-control">
                                    <option value="">Please select</option>
                                    <option <?php if($user->USR_Flag==1){echo 'selected';}else{echo '';}?> value="1">ON</option>
                                    <option <?php if($user->USR_Flag==0){echo 'selected';}else{echo '';}?> value="0">OFF</option>
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

