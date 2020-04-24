

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <h3 class="text-center">CLIENT <?php echo $order->CLIE_Code; ?></h3></th>
            
            <tr>
                <th>FULLNAME:</th>
                <td><?php echo $order->CLIE_Names; ?></td>
            </tr>
            <tr>
                <th>ADDRESS:</th>
                <td><?php echo $order->CLIE_Address; ?></td>
            </tr>
            <tr>
                <th>PHONE:</th>
                <td><?php echo $order->CLIE_Phone; ?></td>
            </tr>
            <tr>
                <th>NUMBER:</th>
                <td><?php echo $order->CLIE_Doc_Number; ?></td>
            </tr>
        </table>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <h3 class="text-center">VOUCHER <?php echo $order->VCHR_Code; ?></h3>
            <tr>
                <th>TYPE:</th>
                <td><?php echo $order->VCHR_Name; ?></td>
            </tr>
            <tr>
                <th>SERIAL:</th>
                <td><?php echo $order->VCHR_Serial; ?></td>
            </tr>
            <tr>
                <th>NUMBER:</th>
                <td><?php echo $order->ORD_Number; ?></td>
            </tr>
            <tr>
                <th>DATE:</th>
                <td><?php echo date('l jS \of F Y',strtotime($order->ORD_Date)); ?></td>
            </tr>
        </table>
    </div>
</div>
        

<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">DETAILS order <td><?php echo $order->ORD_Code; ?></h3>
        <table class="table table-striped table-hover table-bordered  table-condensed">
            <thead>
                <tr>
                    <th>CODE</th>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>QTY</th>
                    <th>AMOUNT</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $subtotal=0;
                foreach($details as $det): ?>
                <tr>
                    <td><?php echo $det->code; ?></td>
                    <td><?php echo $det->PROD_Name; ?></td>
                    <td><?php echo $det->PROD_Price; ?></td>
                    <td><?php echo $det->DETA_Qty; ?></td>
                    <td><?php echo $det->DETA_Subtotal; ?></td>
                    <?php $subtotal += $det->DETA_Subtotal; ?>
                </tr> 
                               
                <?php endforeach; ?>                
                
                <tr>
                    <th class="text-center" colspan="4">AMOUNT:</th>
                    <td><strong>$/. <?php echo $subtotal; ?></strong></td>
                </tr>

                <tr>
                    <th class="text-center" colspan="4">+IGV <small>(<?php echo $order->igv; ?>%)</small>:</th>
                    <td>$/. <?php echo $order->ORD_Igv; ?></td>
                </tr>

                <tr>
                    <th class="text-center" colspan="4">TOTAL:</th>
                    <td><h3><span class="badge badge-warning">$/. <?php echo $order->ORD_Total; ?></span></h3></td>
                </tr>


            </tbody>
        </table>
    </div>
</div>