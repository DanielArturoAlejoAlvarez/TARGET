<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>New Client</h1>
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
                <a href="<?php echo base_url();?>/movements/orders" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i> BACK</a>
                
            <div class="card">
                <div class="card-header">
                    <strong>Order Form</strong> Elements
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
                    <form action="<?php echo base_url();?>movements/orders/store" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="">Voucher:</label>
                                    <select name="vouchers" id="vouchers" class="form-control" required>
                                        <option value="">Select One...</option>
                                        <?php foreach($voucherTypes as $vt): ?>
                                            <?php 
                                                $dataVoucher = $vt->VCHR_Code."*".$vt->VCHR_Qty."*".$vt->VCHR_Igv."*".$vt->VCHR_Serial;    
                                            ?>
                                            <option value="<?php echo $dataVoucher;?>"><?php echo $vt->VCHR_Name;?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="hidden" id="idVoucher" name="idVoucher">
                                    <input type="hidden" id="igv">
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="">Serial:</label>
                                    <input type="text" class="form-control" id="serial" name="txtSerial" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Number:</label>
                                    <input type="text" class="form-control" id="number" name="txtNumber" readonly>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">Client:</label>
                                    <div class="input-group">
                                        <input type="hidden" name="idClient" id="idClient">
                                        <input type="text" class="form-control" disabled="disabled" id="client">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#mediumModal"><span class="fa fa-search"></span> Search</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div> 
                                <div class="col-md-3">
                                    <label for="">Date:</label>
                                    <input type="date" class="form-control" name="txtDate" required>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">Product:</label>
                                    <input type="text" class="form-control" id="product">
                                </div>
                                <div class="col-md-2">
                                    <label for="">&nbsp;</label>
                                    <button id="btnAddProduct" type="button" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> ADD</button>
                                </div>
                                
                            </div>
                            <div class="clearfix"></div>

                            <table id="tbOrderItems" class="mt-4 table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>CODE</th>
                                        <th>NAME</th>

                                        <th>PRICE</th>
                                        <th>STOCK</th>
                                        <th>QTY</th>
                                        <th>AMOUNT</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>

                            <div class="form-group">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Subtotal:</span>
                                        <input type="text" class="form-control" placeholder="Subtotal" name="subtotal" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">IGV:</span>
                                        <input type="text" class="form-control" placeholder="Igv" name="igv" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Discount:</span>
                                        <input type="text" class="form-control" placeholder="Discount" name="discount" value="0.00" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Total:</span>
                                        <input type="text" class="form-control" placeholder="Total" name="total" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="btn btn-success btn-flat pull-right">SAVE</button>
                                </div>
                                
                            </div>
                        </form>
            </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->
    </div>
</div>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">View Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Document</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($clients) && !empty($clients)): ?>
                        <?php foreach($clients as $cli): ?>
                        <tr>
                            
                            <td><?php echo $cli->CLIE_Code; ?></td>
                            <td><?php echo $cli->CLIE_Names; ?></td>
                            <td><?php echo $cli->CLIE_Doc_Number; ?></td>
                            <?php
                                $dataClient = $cli->CLIE_Code."*".$cli->client_type."*".$cli->doc_type."*".$cli->CLIE_Names."*".$cli->CLIE_Phone."*".$cli->CLIE_Address."*".$cli->CLIE_Doc_Number."*".$cli->CLIE_Flag;
                            ?>
                            <td>
                                
                                <button value="<?php echo $dataClient; ?>" type="button" class="btn btn-success btn-check"><span class="fa fa-check"></span></button>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

