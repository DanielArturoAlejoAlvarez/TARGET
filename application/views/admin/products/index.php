<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Product List</h1>
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
                <a href="<?php echo base_url();?>maintenance/products/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> ADD</a>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>CODE</th>
                                    <th>SEC</th>
                                    <th>NAME</th>
                                    <th>PRICE</th>
                                    <th>STOCK</th>
                                    <th>IMAGE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($products) && !empty($products)): ?>
                                <?php foreach($products as $prod): ?>
                                <tr>
                                    <th><?php echo $prod->PROD_Serial; ?></th>
                                    <td><?php echo $prod->category; ?></td>
                                    <td><?php echo $prod->PROD_Name; ?></td>
                                    <td><?php echo $prod->PROD_Price; ?></td>
                                    <td><?php echo $prod->PROD_Stock; ?></td>
                                    <td><img width="100" class="img-fluid" src="<?php echo $prod->PROD_Picture; ?>" alt="<?php echo $prod->PROD_Name; ?>"></td>
                                    
                                    <td>
                                        
                                        <button value="<?php echo $prod->PROD_Code; ?>" type="button" class="btn btn-sm btn-info btnViewProduct" data-toggle="modal" data-target="#mediumModal"><span class="fa fa-search"></span></button>
                                        <a href="<?php echo base_url();?>maintenance/products/edit/<?php echo $prod->PROD_Code; ?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
                                        <a href="<?php echo base_url();?>maintenance/products/delete/<?php echo $prod->PROD_Code; ?>" class="btn btn-sm btn-danger btnDeleteProduct"><span class="fa fa-times"></span></a>

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
                <h5 class="modal-title" id="mediumModalLabel">View Product</h5>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>