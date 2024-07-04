<div style="text-align:center; font-size:20px;"><u><?php echo $userdetails->userName; ?></u></div>

<div class="btn-group btn-group-justified" role="group" aria-label="...">
					  <div class="btn-group" role="group">
					  
					  	<?php
						
							$totalmatching = 0;
							foreach($matchingincome as $v){
							
								$totalmatching = $totalmatching + $v->matchamount;
							
							}
						?>
					  
			<a href="<?php echo site_url('adminpanel/user_details/user_matchingincome/'.$userdetails->signId); ?>" class="btn btn-primary">Matching Income : $<?php echo $totalmatching; ?></a>
						
						
					  </div>
					  
					  <div class="btn-group" role="group">
					  <?php
						
							$totalleadership= 0;
							foreach($leadershipincome as $v){
								$totalleadership = $totalleadership + $v->amount;
							
							}
						?>
					  
			<a href="<?php echo site_url('adminpanel/user_details/leadership/'.$userdetails->signId); ?>" class="btn btn-success">		  
			Leadership Income : $<?php echo $totalleadership; ?></a>
					  </div>
					  
					  <div class="btn-group" role="group">
					  
					  <?php
						
							$totalrepurch= 0;
							foreach($repurchaseincome as $v){
							
								$totalrepurch = $totalrepurch + $v->amount;
							
							}
						?>
					  
					  
							<a href="<?php echo site_url('adminpanel/user_details/repurchaseincome/'.$userdetails->signId); ?>" class="btn btn-info">Repurchase Income : $<?php echo $totalrepurch; ?></a>
					  </div>
					  
					   <div class="btn-group" role="group">
					    <?php
						
							$totalwithdrawamount = 0;
							foreach($withdrawamount as $v){
							
								$totalwithdrawamount = $totalwithdrawamount + $v->amount;
							
							}
						?>
					   <a href="<?php echo site_url('adminpanel/user_details/totalwithdrawamount/'.$userdetails->signId); ?>" class="btn btn-danger">
	Withdraw Amount : $<?php echo $totalwithdrawamount; ?></a>
					  </div>
					</div>
 <div class="btn-group btn-group-justified" role="group" aria-label="..." style="padding-top:10px;">
<div class="btn-group" role="group">

<?php

$totaltranfertouser = 0;
foreach($totaltransertouser as $v){

	$totaltranfertouser = $totaltranfertouser + $v->amount;

}
?>
<a href="<?php echo site_url('adminpanel/user_details/totalTransfertouser/'.$userdetails->signId); ?>" class="btn btn-primary">		  
Balance Transfer to User : $<?php echo $totaltranfertouser; ?></a>					  </div>

<div class="btn-group" role="group">
<?php

$totaltransfertoagentamount = 0;
foreach($totaltransfertoagent as $v){

	$totaltransfertoagentamount = $totaltransfertoagentamount + $v->amount;

}
?>

<a href="<?php echo site_url('adminpanel/user_details/totaltransfertoagent/'.$userdetails->signId); ?>" class="btn btn-success">		  
Balance Transfer to Agent : $ <?php echo $totaltransfertoagentamount; ?></a>					  </div>

<div class="btn-group" role="group">

<?php

$usersendtotalamount= 0;
foreach($walletamountrecived as $v){

	$usersendtotalamount = $usersendtotalamount + $v->amount;

}
?>
<a href="<?php echo site_url('adminpanel/user_details/usersendtotalamount/'.$userdetails->signId); ?>" class="btn btn-info">

Balance Received from User : $<?php echo $usersendtotalamount; ?></a>
</div>
<div class="btn-group" role="group">
<?php

$agenttransfertousers = 0;
foreach($agenttransfertouser as $v){

	$agenttransfertousers = $agenttransfertousers + $v->amount;

}
?>
<a href="<?php echo site_url('adminpanel/user_details/agenttransfertousers/'.$userdetails->signId); ?>" class="btn btn-danger">
Balance Received from Agent : $<?php echo $agenttransfertousers; ?></a>
</div>
</div>
<div align="center" style="padding-top:10px;">
<div class="btn-group" role="group">
<?php

$totalrepurchaseamount = 0;
foreach($totalrepurchase as $v){

	$totalrepurchaseamount = $totalrepurchaseamount + $v->amount;

}
?>
<a href="<?php echo site_url('adminpanel/user_details/totalRepurchaseamount/'.$userdetails->signId); ?>" class="btn btn-primary">			   
Total Repurchase Amount : $<?php echo $totalrepurchaseamount; ?></a>
</div>
</div>