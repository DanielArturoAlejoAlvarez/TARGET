<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>User List</h1>
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
                <a href="<?php echo base_url();?>administration/users/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> ADD</a>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ROLE</th>
                                    <th>PHONE</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>USER</th>
                                    <th>AVATAR</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($users) && !empty($users)): ?>
                                <?php foreach($users as $user): ?>
                                <tr>
                                    <td><?php echo $user->role; ?></td>
                                    <td><?php echo $user->USR_Phone; ?></td>
                                    <td><?php echo $user->USR_Names; ?></td>
                                    <td><?php echo $user->USR_Email; ?></td>
                                    <td><?php echo $user->USR_Username; ?></td>
                                    <td><img width="100" class="img-fluid" src="<?php echo $user->USR_Avatar; ?>" alt="<?php echo $user->USR_Names; ?>"></td>
                                    
                                    <td>
                                        
                                        <button value="<?php echo $user->USR_Code; ?>" type="button" class="btn btn-sm btn-info btnViewUser" data-toggle="modal" data-target="#mediumModal"><span class="fa fa-search"></span></button>
                                        <a href="<?php echo base_url();?>administration/users/edit/<?php echo $user->USR_Code; ?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
                                        <a href="<?php echo base_url();?>administration/users/delete/<?php echo $user->USR_Code; ?>" class="btn btn-sm btn-danger btnDeleteUser"><span class="fa fa-times"></span></a>

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

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">View User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>