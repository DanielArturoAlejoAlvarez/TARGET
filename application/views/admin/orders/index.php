<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Order List</h1>
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
                <a href="<?php echo base_url();?>movements/orders/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> ADD</a>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Voucher Type</th>
                                    <th>Doc. Num</th>
                                    <th>TOTAL</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($orders) && !empty($orders)): ?>
                                <?php foreach($orders as $ord): ?>
                                <tr>
                                    <td><?php echo $ord->client; ?></td>
                                    <td><?php echo $ord->voucher_type; ?></td>
                                    <td><?php echo $ord->ORD_Number; ?></td>
                                    
                                    <td><strong>$/.<?php echo $ord->ORD_Total; ?></strong></td>
                                    <td><?php echo date('l jS \of F Y',strtotime($ord->ORD_Date)); ?></td>
                                    
                                    <?php
                                        $dataOrder = $ord->ORD_Code."*".$ord->client."*".$ord->user."*".$ord->voucher_type."*".$ord->ORD_Number."*".$ord->ORD_Serial."*".$ord->ORD_Igv."*".$ord->ORD_Discount."*".$ord->ORD_Total."*".$ord->ORD_Date."*".$ord->ORD_Flag;
                                    ?>
                                    <td>
                                        
                                        <button value="<?php echo $ord->ORD_Code; ?>" type="button" class="btn btn-sm btn-info btnViewOrder" data-toggle="modal" data-target="#mediumModal"><span class="fa fa-search"></span></button>
                                        
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
                <h5 class="modal-title" id="mediumModalLabel">View Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <p>
                    There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra
                    and the mountain zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus
                    Dolichohippus. The latter resembles an ass, to which it is closely related, while the former two are more
                    horse-like. All three belong to the genus Equus, along with other living equids.
                </p> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btnPrint"><span class="fa fa-print"></span> Print</button>
            </div>
        </div>
    </div>
</div>