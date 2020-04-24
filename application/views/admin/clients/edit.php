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
                    <form action="<?php echo base_url();?>maintenance/clients/update" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="txtId" value="<?php echo $client->CLIE_Code;?>">
                        
                        <div class="row form-group <?php echo !empty(form_error('selClientType')) ? 'has-error' : ''; ?>">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Client Type:</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selClientType" id="select" class="form-control">
                                    <option value="">Please select</option>
                                    <?php if(form_error('selClientType')!=false || set_value('selClientType')!=false): ?>
                                        <?php foreach($clientTypes as $ct): ?>
                                            <option <?php echo set_select('selClientType',$ct->CTYPE_Code)?> value="<?php echo $ct->CTYPE_Code;?>"><?php echo $ct->CTYPE_Name;?></option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <?php foreach($clientTypes as $ct): ?>
                                            <option <?php if($ct->CTYPE_Code==$client->CTYPE_Code){echo 'selected';}else{echo '';}?> value="<?php echo $ct->CTYPE_Code;?>"><?php echo $ct->CTYPE_Name;?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?> 
                                    
                                </select>
                                <?php echo form_error("selClientType","<small class='text-form text-danger'>","</small>"); ?>
                            </div>
                        </div>

                        <div class="row form-group <?php echo !empty(form_error('selDocType')) ? 'has-error' : ''; ?>">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Doc. Type:</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selDocType" id="select" class="form-control">
                                    <option value="">Please select</option>
                                    <?php if(form_error('selDocType')!=false || set_value('selDocType')!=false): ?>
                                        <?php foreach($docTypes as $dt): ?>
                                            <option <?php echo set_select('selDocType',$dt->DOC_Code)?> value="<?php echo $dt->DOC_Code;?>"><?php echo $dt->DOC_Name;?></option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <?php foreach($docTypes as $dt): ?>
                                            <option <?php if($dt->DOC_Code==$client->DOC_Code){echo 'selected';}else{echo '';}?> value="<?php echo $dt->DOC_Code;?>"><?php echo $dt->DOC_Name;?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?> 
                                </select>
                                <?php echo form_error("selDocType","<small class='text-form text-danger'>","</small>"); ?>
                            </div>
                        </div>
                        
                        <div class="row form-group <?php echo !empty(form_error('txtNames')) ? 'has-error' : ''; ?>">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Names:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtNames" placeholder="Client Names..." class="form-control" value="<?php echo !empty(form_error('txtNames')) ? set_value('txtNames') : $client->CLIE_Names;?>">
                                <?php echo form_error("txtNames","<small class='text-form text-danger'>","</small>"); ?>
                            </div>
                        </div>

                        <div class="row form-group <?php echo !empty(form_error('txtPhone')) ? 'has-error' : ''; ?>">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Phone:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtPhone" placeholder="Client Phone..." class="form-control" value="<?php echo !empty(form_error('txtPhone')) ? set_value('txtPhone') : $client->CLIE_Phone;?>">
                                <?php echo form_error("txtPhone","<small class='text-form text-danger'>","</small>"); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Address:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtAddress" placeholder="Client Address..." class="form-control" value="<?php echo $client->CLIE_Address;?>">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group <?php echo !empty(form_error('txtDocNumber')) ? 'has-error' : ''; ?>">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Doc. Number:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="txtDocNumber" placeholder="Client Doc. Number..." class="form-control" value="<?php echo !empty(form_error('txtDocNumber')) ? set_value('txtDocNumber') : $client->CLIE_Doc_Number; ?>">
                                <?php echo form_error("txtDocNumber","<small class='text-form text-danger'>","</small>"); ?>
                            </div>
                        </div>
                       
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Status:</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selStatus" id="select" class="form-control">
                                    <option value="">Please select</option>
                                    <option <?php if($client->CLIE_Flag==1){echo 'selected';}else{echo '';}?> value="1">ON</option>
                                    <option <?php if($client->CLIE_Flag==0){echo 'selected';}else{echo '';}?> value="0">OFF</option>
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

