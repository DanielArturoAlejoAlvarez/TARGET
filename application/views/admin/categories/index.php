<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Category List</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo base_url();?>dashboard"> Dashboard</a></li>
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
                <?php if($permit->PERMI_Insert==1):?>
                    <a href="<?php echo base_url();?>maintenance/categories/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> ADD</a>
                <?php endif;?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($categories) && !empty($categories)): ?>
                                <?php foreach($categories as $cat): ?>
                                <tr>
                                    <td><?php echo $cat->CATE_Name; ?></td>
                                    <td><?php echo $cat->CATE_Desc; ?></td>
                                    <td><?php echo $cat->CATE_Flag; ?></td>
                                    <td>
                                        
                                        <button value="<?php echo $cat->CATE_Code; ?>" type="button" class="btn btn-sm btn-info btnViewCategory" data-toggle="modal" data-target="#staticModal"><span class="fa fa-search"></span></button>
                                        <?php if($permit->PERMI_Update==1):?>   
                                            <a href="<?php echo base_url();?>maintenance/categories/edit/<?php echo $cat->CATE_Code; ?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
                                        <?php endif;?>
                                        <?php if($permit->PERMI_Delete==1):?> 
                                            <a href="<?php echo base_url();?>maintenance/categories/delete/<?php echo $cat->CATE_Code; ?>" class="btn btn-sm btn-danger btnDeleteCategory"><span class="fa fa-times"></span></a>
                                        <?php endif;?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

        

    </div><!-- .animated -->
</div><!-- .content -->

<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">View Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <!-- This is a static modal, backdrop click will not close it. -->
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>