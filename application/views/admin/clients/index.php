<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Client List</h1>
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
                <a href="<?php echo base_url();?>maintenance/clients/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> ADD</a>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Client Type</th>
                                    <th>Doc. Type</th>
                                    <th>Names</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Doc. Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($clients) && !empty($clients)): ?>
                                <?php foreach($clients as $cli): ?>
                                <tr>
                                    <td><?php echo $cli->client_type; ?></td>
                                    <td><?php echo $cli->doc_type; ?></td>
                                    <td><?php echo $cli->CLIE_Names; ?></td>
                                    <td><?php echo $cli->CLIE_Phone; ?></td>
                                    <td><?php echo $cli->CLIE_Address; ?></td>
                                    <td><?php echo $cli->CLIE_Doc_Number; ?></td>
                                    <?php
                                        $dataClient = $cli->CLIE_Code."*".$cli->client_type."*".$cli->doc_type."*".$cli->CLIE_Names."*".$cli->CLIE_Phone."*".$cli->CLIE_Address."*".$cli->CLIE_Doc_Number."*".$cli->CLIE_Flag;
                                    ?>
                                    <td>
                                        
                                        <button value="<?php echo $dataClient; ?>" type="button" class="btn btn-sm btn-info btnViewClient" data-toggle="modal" data-target="#staticModal"><span class="fa fa-search"></span></button>
                                        <a href="<?php echo base_url();?>maintenance/clients/edit/<?php echo $cli->CLIE_Code; ?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
                                        <a href="<?php echo base_url();?>maintenance/clients/delete/<?php echo $cli->CLIE_Code; ?>" class="btn btn-sm btn-danger btnDeleteClient"><span class="fa fa-times"></span></a>

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
                <h5 class="modal-title" id="staticModalLabel">View Client</h5>
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