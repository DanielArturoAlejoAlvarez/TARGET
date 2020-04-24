<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Permission List</h1>
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
                <a href="<?php echo base_url();?>administration/permissions/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> ADD</a>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>MENU</th>
                                    <th>ROLE</th>
                                    <th>READ</th>
                                    <th>INSERT</th>
                                    <th>UPDATE</th>
                                    <th>DELETE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($permissions) && !empty($permissions)): ?>
                                <?php foreach($permissions as $permi): ?>
                                <tr>
                                    <td><?php echo $permi->navi; ?></td>
                                    <td><?php echo $permi->role; ?></td>
                                    <td>
                                        <?php if(!$permi->PERMI_Read==0):?>
                                            <span class="fa fa-check"></span>
                                        <?php else:?>
                                            <span class="fa fa-times"></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!$permi->PERMI_Insert==0):?>
                                            <span class="fa fa-check"></span>
                                        <?php else:?>
                                            <span class="fa fa-times"></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!$permi->PERMI_Update==0):?>
                                            <span class="fa fa-check"></span>
                                        <?php else:?>
                                            <span class="fa fa-times"></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!$permi->PERMI_Delete==0):?>
                                            <span class="fa fa-check"></span>
                                        <?php else:?>
                                            <span class="fa fa-times"></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        
                                        <button value="<?php echo $permi->PERMI_Code; ?>" type="button" class="btn btn-sm btn-info btnViewPermission" data-toggle="modal" data-target="#staticModal"><span class="fa fa-search"></span></button>
                                        <a href="<?php echo base_url();?>administration/permissions/edit/<?php echo $permi->PERMI_Code; ?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
                                        <a href="<?php echo base_url();?>administration/permissions/delete/<?php echo $permi->PERMI_Code; ?>" class="btn btn-sm btn-danger btnDeletePermission"><span class="fa fa-times"></span></a>

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
                <h5 class="modal-title" id="staticModalLabel">View Permission</h5>
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