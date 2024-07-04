<?php echo $this->load->view("websiteloginview/header"); ?>				
		
				<div class="main-content">
				
				
				<style>
#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}

</style>
				
				
				
				
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">New Order Edit Manage</li>
						</ul>
					</div>
					
					<div class="page-content" id="listView">
						<div id="invoice">

    
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
          
            <main>
                <div class="row contacts">
                    <div class="col-md-6 col invoice-to">
					 <h2 class="to">SHIPPING ADDRESS :</h2>
                        <div class="text-gray-light">Name : <?php echo $orderinfo->d_name; ?></div>
                        <div class="address">Email : <?php echo $orderinfo->d_email; ?></div>
                        <div class="email">Phone : <?php echo $orderinfo->d_phone; ?></div>
						<div class="email">Address : <?php echo $orderinfo->d_address; ?></div>
						<div class="email"><a style="cursor:pointer; text-decoration:underline;" class="" data-toggle="modal" data-target="#exampleModal">
 Change Information
</a></div>
						
                    </div>
                    <div class="col-md-6 col invoice-details">
                        <div class="date">INVOICE : <?php echo $orderinfo->invoice_no; ?></div>
                        <div class="date">Date of Invoice : <?php echo $orderinfo->paymentdate; ?></div>
                        <div class="date">Payment With <?php echo $orderinfo->payment_type; ?></div>
						<div class="date">Amounts : <?php echo $orderinfo->subtotal; ?>Tk.</div>

                    </div>
                </div>
                <?php if($orderinfo->payment_type == 'Cash'){ ?>
				<div align="right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddexampleModal">
  Add Items
</button></div>
                <?php } ?>
<form method="post" action="<?php echo site_url('websiteloginControler/New_order/UpdateInvoice');?>">
 <input type="hidden"  name="orId" required value="<?php echo $orderinfo->orId; ?>">
                <table class="table table-bordered table-sm">
		<thead>
			<tr>
				<th>S.N</th>
				<th>Product Name</th>
				<th>Price</th>
				<th colspan="2" align="center" style="">Quantity</th>
				<th style="text-align:right;">Total Amount</th>
			</tr>
		</thead>
		<tbody>
		
		
		<?php 
			$sn=1;
			foreach ($this->cart->contents() as $items): 
			$pro_price = $items['price']; 
			$total_pro_price = $items['subtotal'];
			$prodetails  		= $this->M_cloud->find('webproduct_mange_table', array('wproid' => $items['id']));
		?>
		
		
		<input type="hidden" name="rowid[]" id="rowid[]" value="<?php echo $items['rowid']; ?>"/>
			<tr>
				<td style="background:#FFFFFF;border:1px #DDDDDD solid;"><?php echo $sn++; ?></td>
				<td style="background:#FFFFFF;border:1px #DDDDDD solid;"><?php echo $prodetails->product_name; ?></td>
				<td style="background:#FFFFFF;border:1px #DDDDDD solid;"><?php echo number_format($items['price'],2); ?></td>
				<td width="10%" colspan="2" style="background:#FFFFFF;border:1px #DDDDDD solid;"><input type="text" style="width:60px;text-align:center;" updata-id="<?php echo $items['rowid']; ?>" class="cartupdate" name="quantity" id="quantity" value="<?php echo $items['qty']; ?>" min="1">
				<td style="background:#FFFFFF;border:1px #DDDDDD solid;text-align:right;"><?php echo ($items['price']*$items['qty'])?>Tk &nbsp; &nbsp; 
				<img data-id="<?php echo $items['rowid']; ?>" class="deletecart" id="<?php echo $count; ?>"  onclick="myFunction(<?php echo $count; ?>)" style="height:20px;cursor:pointer;" src="<?php echo base_url('resource/delete.jpg');?>">
				</td>
			</tr>
		 <?php endforeach; ?> 
		</tbody>
		<tfoot>
			<tr>
				<td colspan="5" align="right" style="">Sub total amount </td>
				<td colspan="1"><?php echo $this->cart->total(); ?>Tk &nbsp; &nbsp; &nbsp; </td>
			</tr>
			<tr>
				<td colspan="5" align="right" style="">Delivery charge </td>
				<td colspan="1"><?php echo $orderinfo->delevery_cost; ?>Tk &nbsp; &nbsp; &nbsp; </td>
			</tr>
			<tr>
				<td colspan="5" align="right" style="color:#000000;">Grand total amounts</td>
				<td colspan="1" style="color:#000000;"><?php echo $this->cart->total()+$orderinfo->delevery_cost; ?>Tk &nbsp; &nbsp;&nbsp; </td>
			</tr>
			<?php if($orderinfo->payment_type == 'Cash'){ ?>
			<tr>
				<td colspan="6" align="right" style="color:#000000;"><button type="submit" class="btn btn-primary">Update Now</button></td>
			</tr>
			<?php } ?>
			
		</tfoot>
		
	</table>
	</form>
                
                
            </main>
            
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
					</div>
					
					
				</div>
			</div>
			
			
			
<!-- Modal start-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">CHANGE SHIPPING ADDRESS</h5>
        
      </div>
	   <form method="post" action="<?php echo site_url('websiteloginControler/New_order/InfoUpdate');?>">
	   <input type="hidden"  name="orId" required value="<?php echo $orderinfo->orId; ?>">
      <div class="modal-body">
      
  <div class="form-group">
    <label for="exampleInputEmail1">Name </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="d_name" required value="<?php echo $orderinfo->d_name; ?>" aria-describedby="emailHelp" placeholder="Enter Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="d_email" required value="<?php echo $orderinfo->d_email; ?>" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="d_phone" required  value="<?php echo $orderinfo->d_phone; ?>" placeholder="Phone">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
	<textarea class="form-control" id="exampleFormControlTextarea1" name="d_address" required rows="3"><?php echo $orderinfo->d_address; ?></textarea>
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
	  </form>
    </div>
  </div>
</div>		
<!-- Modal end-->

<?php if($orderinfo->payment_type == 'Cash'){ ?>
<!-- Add Modal start-->
<div class="modal fade" id="AddexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">ADD Items</h5>
        
      </div>
	   <form method="post" action="#">
      <div class="modal-body">
      
		  <div class="form-group" style="padding-bottom:50px;">
			<label for="exampleInputEmail1">Product Name </label>
			<select class="form-control selectpicker cartstore" id="pro_id" name="pro_id" data-live-search="true">
				<option selected="selected">Select Product Name</option>
				<?php foreach($product_tablelist as $pv) { ?>
				<option value="<?php echo $pv->wproid; ?>"><?php echo $pv->product_name; ?></option>
				<?php } ?>
			</select>
		  </div>
      </div>
      
	  </form>
    </div>
  </div>
</div>		
<!-- Add Modal end-->
			
<?php } ?>			
			
			
			
<script>
	$('.cartstore').on('change', function(){
		var pro_id = $(this).val();
		var urlmgs = "<?php echo site_url('websiteloginControler/New_order/cartstore'); ?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{pro_id:pro_id},
			success:function(data){
				location.reload();
				
			}
		});
		//e.preventDefault();
	});


	$('.cartupdate').on('change', function(){
		var row_id = $(this).attr("updata-id");
		var qty = $(this).val();
		//alert(qty);
		var urlmgs = "<?php echo site_url('websiteloginControler/New_order/updateCartItem'); ?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{row_id:row_id, qty:qty},
			success:function(data){
				location.reload();
				
			}
		});
		//e.preventDefault();
	});

	$(".deletecart").on('click', function(){
		var itemid = $(this).attr('data-id');
		
		var urlmgs = "<?php echo site_url("websiteloginControler/New_order/cartdelete"); ?>";
		$.ajax({
			url:urlmgs,
			type:"POST",
			data:{itemid:itemid},
			success:function(data){
				location.reload();
			}
		});
		//e.preventDefault();
	});
	
	
		//$(".edit").click(function(e)
		$(document).on("click", ".green", function(e)
		{
		
	
			var id 		= $(this).attr("data-id");
			
			var formURL = "<?php echo site_url('websiteloginControler/category_manage/update'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id},
				dataType: "json",
				success:function(data){
					$('#modal-form').modal('show');
					$('#id').val(data.catId);
					$('#category_name').val(data.category_name);
					$('#status').val(data.status);
					$('.update').text("Update");
					
				}
			});
			
			e.preventDefault();
		});
	
	
		
	//update End
	
	
	
	$('.delete').click(function (){
       var answer = confirm("Are you sure delete this data?");
          if (answer) {
             return true;
          }else{
             return false;
          }
    });
	
	
	
	
</script>	
			
			
<?php echo $this->load->view("websiteloginview/footer"); ?>