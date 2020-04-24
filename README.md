# TARGET
## Description

This repository is a System of sales with PHP Codeigniter, AJAX and MySQL.

## Installation
Using PHP7, MySQL preferably.

## DataBase
Using Codeigniter Framework and MySQL preferably.

## Apps
Using Postman or RestEasy to feed the api.

## Usage
```html
$ git clone https://github.com/DanielArturoAlejoAlvarez/TARGET.git [NAME APP] 

```
Follow the following steps and you're good to go! Important:


![alt text](https://d3nmt5vlzunoa1.cloudfront.net/phpstorm/files/2016/06/param-completion.gif)


## Coding

### Controllers

```php
...
public function store() {
    $idClient = $this->input->post('idClient');
    $idUser = $this->session->userdata('iduser');
    $idVoucher = $this->input->post('idVoucher');
    $number = $this->input->post('txtNumber');
    $serial = $this->input->post('txtSerial');
    //$subtotal = $this->input->post('subtotal');
    $igv = $this->input->post('igv');
    $discount = $this->input->post('discount');
    $total = $this->input->post('total');
    $date = $this->input->post('txtDate');

    $products = $this->input->post('idProducts');
    $qtys = $this->input->post('qtys');
    $amounts = $this->input->post('amounts');                

    $data = array(
        'CLIE_Code'     =>      $idClient,
        'USR_Code'      =>      $idUser,
        'VCHR_Code'     =>      $idVoucher,
        'ORD_Number'    =>      $number,
        'ORD_Serial'    =>      $serial,
        'ORD_Igv'       =>      $igv,
        'ORD_Discount'  =>      $discount,
        'ORD_Total'     =>      $total,
        'ORD_Flag'      =>      1,
        'ORD_Date'      =>      $date
    );

    if($this->Order_model->addOrder($data)) {
        $idorder = $this->Order_model->lastID();
        $this->updVoucher($idVoucher);
        $this->saveOrderItems($products,$idorder,$qtys,$amounts);

        redirect(base_url() . 'movements/orders');
    }else {
        redirect(base_url() . 'movements/orders/create');
    }
    
    
}  


public function getProducts() {
    $value = $this->input->post('value');
    $clients = $this->Order_model->getProducts($value);
    echo json_encode($clients);
}



protected function updVoucher($idvoucher) {
    $currentVoucher = $this->Order_model->getVoucherById($idvoucher);

    $data = array(
        'VCHR_Qty'      =>      $currentVoucher->VCHR_Qty + 1
    );

    $this->Order_model->updateVoucherType($idvoucher,$data);
}

protected function saveOrderItems($products,$idorder,$qtys,$amounts) {
    for ($i=0; $i < count($products); $i++) { 
        $data = array(
            'PROD_Code'     =>  $products[$i],
            'ORD_Code'      =>  $idorder,
            'DETA_Qty'      =>  $qtys[$i],
            'DETA_Subtotal' =>  $amounts[$i]
        );
        $this->Order_model->addOrderItem($data);

        $this->updateStockProduct($products[$i],$qtys[$i]);
    }
}

protected function updateStockProduct($idproduct,$qty) {
    $currentProduct = $this->Product_model->getProductById($idproduct);

    $data = array(
        'PROD_Stock'        =>      $currentProduct->PROD_Stock - $qty
    );

    $this->Product_model->updateProduct($idproduct,$data);
}
...
```
### VIEWS

```javascript
...
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
...
```

### Model

```php
...
class Order_model extends CI_Model {        

    public function lastID() {
        return $this->db->insert_id();
    }

    public function getProducts($value) {
        $this->db->select("PROD_Code as id,PROD_Serial as code,PROD_Name as label,PROD_Price as price,PROD_Stock as stock");
        $this->db->from('products');
        $this->db->like('PROD_Name',$value);
        $r = $this->db->get();
        return $r->result_array();
    }

    public function getVoucherTypes() {
        $r = $this->db->get('voucher_types');
        return $r->result();
    }

    public function getVoucherById($id) {
        $this->db->where('VCHR_Code',$id);
        $r = $this->db->get('voucher_types');
        return $r->row();
    }

    public function updateVoucherType($id,$data) {
        $this->db->where('VCHR_Code',$id);
        return $this->db->update('voucher_types',$data);
    }

    public function addOrderItem($data) {
        return $this->db->insert('order_items',$data);
    }

    public function getOrderItemById($id) {
        $this->db->select('dt.*,p.PROD_Serial as code,p.PROD_Name,p.PROD_Price');
        $this->db->from('order_items dt');
        $this->db->join('products p','p.PROD_Code=dt.PROD_Code');
        $this->db->where('dt.ORD_Code',$id);
        $r = $this->db->get();
        return $r->result();
    }

    public function getOrderById($id) {
        $this->db->select('o.*,cl.CLIE_Names,cl.CLIE_Address,cl.CLIE_Phone,cl.CLIE_Doc_Number,vt.VCHR_Name,vt.VCHR_Serial,vt.VCHR_Igv as igv,u.USR_Names as user');
        $this->db->from('orders o');
        $this->db->join('clients cl','cl.CLIE_Code=o.CLIE_Code');
        $this->db->join('users u','u.USR_Code=o.USR_Code');
        $this->db->join('voucher_types vt','vt.VCHR_Code=o.VCHR_Code');
        $this->db->where('o.ORD_Code',$id);
        $r = $this->db->get();
        return $r->row();
    }

    public function getOrders() {
        $this->db->select('o.*,cl.CLIE_Names as client,u.USR_Names as user,vt.VCHR_Name as voucher_type');
        $this->db->from('orders o');
        $this->db->join('clients cl','cl.CLIE_Code=o.CLIE_Code');
        $this->db->join('users u','u.USR_Code=o.USR_Code');
        $this->db->join('voucher_types vt','vt.VCHR_Code=o.VCHR_Code');
        $this->db->where('o.ORD_Flag',1);
        $r = $this->db->get();

        if($r->num_rows()>0) {
            return $r->result();
        }else {
            return false;
        }            
    }

    public function getOrderByDate($fechaini,$fechafin) {
        $this->db->select('o.*,cl.CLIE_Names as client,u.USR_Names as user,vt.VCHR_Name as voucher_type');
        $this->db->from('orders o');
        $this->db->join('clients cl','cl.CLIE_Code=o.CLIE_Code');
        $this->db->join('users u','u.USR_Code=o.USR_Code');
        $this->db->join('voucher_types vt','vt.VCHR_Code=o.VCHR_Code');
        $this->db->where('o.ORD_Date >=',$fechaini);
        $this->db->where('o.ORD_Date <=',$fechafin);
        //$this->db->where('o.ORD_Flag',1);
        $r = $this->db->get();

        if($r->num_rows()>0) {
            return $r->result();
        }else {
            return false;
        }
    }       

    public function addOrder($data) {
        return $this->db->insert('orders',$data);
    }

    public function updateOrder($id,$data) {
        $this->db->where('ORD_Code',$id);
        return $this->db->insert('orders',$data);
    }
}
...
```

## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/DanielArturoAlejoAlvarez/TARGET. This project is intended to be a safe, welcoming space for collaboration, and contributors are expected to adhere to the [Contributor Covenant](http://contributor-covenant.org) code of conduct.


## License

The gem is available as open source under the terms of the [MIT License](http://opensource.org/licenses/MIT).