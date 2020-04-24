

const base_url = "http://127.0.0.1/TARGET/";


jQuery(document).ready(function($) {

    $(".btnDeletePermission").on("click", function(e) {
        e.preventDefault();
        let url = $(this).attr("href");
        $.ajax({
            url: url,
            type: 'POST',
            success: function(resp) {
                window.location.href = base_url + resp;
            }
        }); 
    });

    $(".btnDeleteCategory").on("click", function(e) {
        e.preventDefault();
        let url = $(this).attr("href");
        $.ajax({
            url: url,
            type: 'POST',
            success: function(resp) {
                window.location.href = base_url + resp;
            }
        }); 
    });

    $(".btnViewUser").on("click", function() {        
        let id = $(this).val();
        $.ajax({
            url: base_url + 'administration/users/show/'+id,
            type: 'POST',
            success: function(resp) {
                $("#mediumModal .modal-body").html(resp);
            }
        });        
    });

    $(".btnViewCategory").on("click", function() {        
        let id = $(this).val();
        $.ajax({
            url: base_url + 'maintenance/categories/show/'+id,
            type: 'POST',
            success: function(resp) {
                $("#staticModal .modal-body").html(resp);
            }
        });        
    });
    
    $(".btnViewProduct").on("click", function() {        
        let id = $(this).val();
        $.ajax({
            url: base_url + 'maintenance/products/show/'+id,
            type: 'POST',
            success: function(resp) {
                $("#mediumModal .modal-body").html(resp);
            }
        });        
    });

    $(".btnViewClient").on("click", function() {
        let client = $(this).val();
        let dataClientInfo = client.split("*");

        html = "<h3>"+dataClientInfo[3]+"</h3>";
        html += "<h5><strong>TYPE:</strong> "+dataClientInfo[1]+"</h5>";
        html += "<h6><strong>DOC. TYPE:</strong> "+dataClientInfo[2]+"</h6>";
        html += "<h5><strong>PHONE:</strong> "+dataClientInfo[4]+"</h5>";
        html += "<h6><strong>ADDRESS:</strong> "+dataClientInfo[5]+"</h6>";
        html += "<h5><strong>DOC. NUMBER:</strong> "+dataClientInfo[6]+"</h5>";
        html += "<h6><strong>STATUS:</strong> "+dataClientInfo[7]+"</h6>";
        $("#staticModal .modal-body").html(html);
    })

    $("#vouchers").on("change", function() {
        let option = $(this).val();
        if(option!="") {
            let dataVoucher = option.split("*");

            $('#idVoucher').val(dataVoucher[0]);
            $('#igv').val(dataVoucher[2]);
            $('#serial').val(dataVoucher[3]);
            $('#number').val(generateNumber(dataVoucher[1]));
        }else {
            $('#idVoucher').val(null);
            $('#igv').val(null);
            $('#serial').val(null);
            $('#number').val(null);
        }
        sumItems();
        
    });

    $(document).on("click",".btn-check",function() {
        let client = $(this).val();
        let dataClient = client.split("*");
        $("#idClient").val(dataClient[0]);
        $("#client").val(dataClient[3]);
        $("#mediumModal").modal('hide');
    });

    $("#product").autocomplete({
        source: function(req,res) {
            $.ajax({
                url: base_url + 'movements/orders/getProducts',
                type: 'POST',
                dataType: 'json',
                data: {value: req.term},
                success: function(data) {
                    res(data);
                }
            })
        },
        minLength: 2,
        select: function(ev,ui) {
            let dataProduct = ui.item.id + "*" + ui.item.code + "*" + ui.item.label + "*" + ui.item.price + "*" + ui.item.stock; 
            $("#btnAddProduct").val(dataProduct);
        }        
    });

    $("#btnAddProduct").on("click", function() {
        let product = $(this).val();
        
        if (product!="") {
            let dataProduct = product.split("*");

            html = "<tr>";
            html += "<td><input type='hidden' name='idProducts[]' value='"+dataProduct[0]+"'>"+dataProduct[1]+"</td>";
            html += "<td>"+dataProduct[2]+"</td>";
            html += "<td><input type='hidden' name='prices[]' value='"+dataProduct[3]+"'>"+dataProduct[3]+"</td>";
            html += "<td>"+dataProduct[4]+"</td>";
            html += "<td><input type='text' name='qtys[]' value='1' class='qtys'></td>";
            html += "<td><input type='hidden' name='amounts[]' value='"+dataProduct[3]+"'><p>"+dataProduct[3]+"</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-product'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";

            $("#tbOrderItems tbody").append(html);
            sumItems();
            $("#btnAddProduct").val(null);
            $("#product").val(null);

        }else {
            alert("Select one product...")
        }
    });

    $(document).on('click','.btn-remove-product',function() {
        $(this).closest('tr').remove();
        sumItems();
    });

    $(document).on('keyup','#tbOrderItems input.qtys',function() {
        let qty = $(this).val();
        let price = $(this).closest('tr').find('td:eq(2)').text();

        let amount = qty*price;
        $(this).closest('tr').find('td:eq(5)').children('p').text(amount.toFixed(2));
        $(this).closest('tr').find('td:eq(5)').children('input').val(amount.toFixed(2));
        sumItems();
    });

    $(document).on('click','.btnViewOrder',function() {
        let value_id = $(this).val();
        $.ajax({
            url: base_url + 'movements/orders/show',
            type: 'POST',
            dataType: 'html',
            data: {id: value_id},
            success: function(resp) {
                $("#mediumModal .modal-body").html(resp);
            }
        })
    });

    $(document).on("click",".btnPrint",function() {
        $("#mediumModal .modal-body").print({
            title: "Voucher of the Order"
        });
    });

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                title: 'Order List',
                exportOptions: {
                    columns: [0,1,2,3,4,5]
                }
            },
            {
                extend: 'excelHtml5',
                title: 'Order List',
                exportOptions: {
                    columns: [0,1,2,3,4,5]
                }
            }
        ]
    } );

    
    
});

function generateNumber(num) {
    if (num>=99999&&num<999999) {
        return Number(num) + 1;
    }
    if (num>=9999&&num<99999) {
        return "0" + Number(num) + 1;
    }
    if (num>=999&&num<9999) {
        return "00" + Number(num) + 1;
    }
    if (num>=99&&num<999) {
        return "000" + Number(num) + 1;
    }
    if (num>=9&&num<99) {
        return "0000" + Number(num) + 1;
    }
    if (num<9) {
        return "00000" + Number(num) + 1;
    }
}

function sumItems() {
    let subtotal = 0;
    jQuery("#tbOrderItems tbody tr").each(function() {
        subtotal = subtotal + Number(jQuery(this).find('td:eq(5)').text());
    });

    jQuery("input[name=subtotal]").val(subtotal.toFixed(2));
    let percent = jQuery("#igv").val();
    let igv = subtotal * (percent/100);
    jQuery("input[name=igv]").val(igv.toFixed(2));
    let discount = jQuery("input[name=discount]").val();
    let total = subtotal + igv - discount;
    jQuery("input[name=total]").val(total.toFixed(2));
}





    
    