<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Permission</h1>
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
                <a href="<?php echo base_url();?>administration/permissions" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i> BACK</a>
                
            <div class="card">
                <div class="card-header">
                    <strong>Permission Form</strong> Elements
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
                    <form action="<?php echo base_url();?>administration/permissions/store" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="txtId" value="<?php echo $permission->PERMI_Code ?>">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">MENU:</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selNavi" id="select" class="form-control">
                                    <option value="">Please select</option>
                                    <?php foreach($navigations as $navi): ?>
                                        <option <?php echo $navi->NAVI_Code==$permission->NAVI_Code ? 'selected' : '';?> value="<?php echo $navi->NAVI_Code;?>"><?php echo $navi->NAVI_Name;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">ROLE:</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selRole" id="select" class="form-control">
                                    <option value="">Please select</option>
                                    <?php foreach($roles as $role): ?>
                                        <option <?php echo $role->ROLE_Code==$permission->ROLE_Code ? 'selected' : '';?> value="<?php echo $role->ROLE_Code;?>"><?php echo $role->ROLE_Name;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                       
                        <div class="form-group">
                            <label style="margin-right: 316px;" for="">READ:</label>
                            <label for="radio1" class="radio-inline">
                                <input type="radio" id="radio1" name="radioRead" value="1" class="form-check-input" <?php echo $permission->PERMI_Read==1 ? 'checked' : ''; ?>>Yes
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="radio1" class="radio-inline">
                                <input type="radio" id="radio1" name="radioRead" value="0" class="form-check-input" <?php echo $permission->PERMI_Read==0 ? 'checked' : ''; ?>>No
                            </label>
                        </div>

                        <div class="form-group">
                            <label style="margin-right: 305px;" for="">INSERT:</label>
                            <label for="radio2" class="radio-inline">
                                <input type="radio" id="radio2" name="radioInsert" value="1" class="form-check-input" <?php echo $permission->PERMI_Insert==1 ? 'checked' : ''; ?>>Yes
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="radio2" class="radio-inline">
                                <input type="radio" id="radio2" name="radioInsert" value="0" class="form-check-input" <?php echo $permission->PERMI_Insert==0 ? 'checked' : ''; ?>>No
                            </label>
                        </div>

                        <div class="form-group">
                            <label style="margin-right: 300px;" for="">UPDATE:</label>
                            <label for="radio3" class="radio-inline">
                                <input type="radio" id="radio3" name="radioUpdate" value="1" class="form-check-input" <?php echo $permission->PERMI_Update==1 ? 'checked' : ''; ?>>Yes
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="radio1" class="radio-inline">
                                <input type="radio" id="radio3" name="radioUpdate" value="0" class="form-check-input" <?php echo $permission->PERMI_Update==0 ? 'checked' : ''; ?>>No
                            </label>
                        </div>

                        <div class="form-group">
                            <label style="margin-right: 303px;" for="">DELETE:</label>
                            <label for="radio4" class="radio-inline">
                                <input type="radio" id="radio4" name="radioDelete" value="1" class="form-check-input" <?php echo $permission->PERMI_Delete==1 ? 'checked' : ''; ?>>Yes
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="radio4" class="radio-inline">
                                <input type="radio" id="radio4" name="radioDelete" value="0" class="form-check-input" <?php echo $permission->PERMI_Delete==0 ? 'checked' : ''; ?>>No
                            </label>
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

