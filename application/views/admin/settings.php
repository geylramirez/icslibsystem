<!DOCTYPE html>
<html lang="en">
	<?php include 'includes/head.php'; ?>
	<style type="text/css">

	/* ladda.min.css */

/*
 * Ladda
 * http://lab.hakim.se/ladda
 * MIT licensed
 *
 * Copyright (C) 2013 Hakim El Hattab, http://hakim.se
 */.ladda-button{position:relative}.ladda-button .ladda-spinner{position:absolute;z-index:2;display:inline-block;width:32px;height:32px;top:50%;margin-top:-16px;opacity:0;pointer-events:none}.ladda-button .ladda-label{position:relative;z-index:3}.ladda-button .ladda-progress{position:absolute;width:0;height:100%;left:0;top:0;background:rgba(0,0,0,0.2);visibility:hidden;opacity:0;-webkit-transition:0.1s linear all !important;-moz-transition:0.1s linear all !important;-ms-transition:0.1s linear all !important;-o-transition:0.1s linear all !important;transition:0.1s linear all !important}.ladda-button[data-loading] .ladda-progress{opacity:1;visibility:visible}.ladda-button,.ladda-button .ladda-spinner,.ladda-button .ladda-label{-webkit-transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important;-moz-transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important;-ms-transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important;-o-transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important;transition:0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all !important}.ladda-button[data-style=zoom-in],.ladda-button[data-style=zoom-in] .ladda-spinner,.ladda-button[data-style=zoom-in] .ladda-label,.ladda-button[data-style=zoom-out],.ladda-button[data-style=zoom-out] .ladda-spinner,.ladda-button[data-style=zoom-out] .ladda-label{-webkit-transition:0.3s ease all !important;-moz-transition:0.3s ease all !important;-ms-transition:0.3s ease all !important;-o-transition:0.3s ease all !important;transition:0.3s ease all !important}.ladda-button[data-style=expand-right] .ladda-spinner{right:14px}.ladda-button[data-style=expand-right][data-size="s"] .ladda-spinner,.ladda-button[data-style=expand-right][data-size="xs"] .ladda-spinner{right:4px}.ladda-button[data-style=expand-right][data-loading]{padding-right:56px}.ladda-button[data-style=expand-right][data-loading] .ladda-spinner{opacity:1}.ladda-button[data-style=expand-right][data-loading][data-size="s"],.ladda-button[data-style=expand-right][data-loading][data-size="xs"]{padding-right:40px}.ladda-button[data-style=expand-left] .ladda-spinner{left:14px}.ladda-button[data-style=expand-left][data-size="s"] .ladda-spinner,.ladda-button[data-style=expand-left][data-size="xs"] .ladda-spinner{left:4px}.ladda-button[data-style=expand-left][data-loading]{padding-left:56px}.ladda-button[data-style=expand-left][data-loading] .ladda-spinner{opacity:1}.ladda-button[data-style=expand-left][data-loading][data-size="s"],.ladda-button[data-style=expand-left][data-loading][data-size="xs"]{padding-left:40px}.ladda-button[data-style=expand-up]{overflow:hidden}.ladda-button[data-style=expand-up] .ladda-spinner{top:-32px;left:50%;margin-left:-16px}.ladda-button[data-style=expand-up][data-loading]{padding-top:54px}.ladda-button[data-style=expand-up][data-loading] .ladda-spinner{opacity:1;top:14px;margin-top:0}.ladda-button[data-style=expand-up][data-loading][data-size="s"],.ladda-button[data-style=expand-up][data-loading][data-size="xs"]{padding-top:32px}.ladda-button[data-style=expand-up][data-loading][data-size="s"] .ladda-spinner,.ladda-button[data-style=expand-up][data-loading][data-size="xs"] .ladda-spinner{top:4px}.ladda-button[data-style=expand-down]{overflow:hidden}.ladda-button[data-style=expand-down] .ladda-spinner{top:62px;left:50%;margin-left:-16px}.ladda-button[data-style=expand-down][data-size="s"] .ladda-spinner,.ladda-button[data-style=expand-down][data-size="xs"] .ladda-spinner{top:40px}.ladda-button[data-style=expand-down][data-loading]{padding-bottom:54px}.ladda-button[data-style=expand-down][data-loading] .ladda-spinner{opacity:1}.ladda-button[data-style=expand-down][data-loading][data-size="s"],.ladda-button[data-style=expand-down][data-loading][data-size="xs"]{padding-bottom:32px}.ladda-button[data-style=slide-left]{overflow:hidden}.ladda-button[data-style=slide-left] .ladda-label{position:relative}.ladda-button[data-style=slide-left] .ladda-spinner{left:100%;margin-left:-16px}.ladda-button[data-style=slide-left][data-loading] .ladda-label{opacity:0;left:-100%}.ladda-button[data-style=slide-left][data-loading] .ladda-spinner{opacity:1;left:50%}.ladda-button[data-style=slide-right]{overflow:hidden}.ladda-button[data-style=slide-right] .ladda-label{position:relative}.ladda-button[data-style=slide-right] .ladda-spinner{right:100%;margin-left:-16px}.ladda-button[data-style=slide-right][data-loading] .ladda-label{opacity:0;left:100%}.ladda-button[data-style=slide-right][data-loading] .ladda-spinner{opacity:1;left:50%}.ladda-button[data-style=slide-up]{overflow:hidden}.ladda-button[data-style=slide-up] .ladda-label{position:relative}.ladda-button[data-style=slide-up] .ladda-spinner{left:50%;margin-left:-16px;margin-top:1em}.ladda-button[data-style=slide-up][data-loading] .ladda-label{opacity:0;top:-1em}.ladda-button[data-style=slide-up][data-loading] .ladda-spinner{opacity:1;margin-top:-16px}.ladda-button[data-style=slide-down]{overflow:hidden}.ladda-button[data-style=slide-down] .ladda-label{position:relative}.ladda-button[data-style=slide-down] .ladda-spinner{left:50%;margin-left:-16px;margin-top:-2em}.ladda-button[data-style=slide-down][data-loading] .ladda-label{opacity:0;top:1em}.ladda-button[data-style=slide-down][data-loading] .ladda-spinner{opacity:1;margin-top:-16px}.ladda-button[data-style=zoom-out]{overflow:hidden}.ladda-button[data-style=zoom-out] .ladda-spinner{left:50%;margin-left:-16px;-webkit-transform:scale(2.5);-moz-transform:scale(2.5);-ms-transform:scale(2.5);-o-transform:scale(2.5);transform:scale(2.5)}.ladda-button[data-style=zoom-out] .ladda-label{position:relative;display:inline-block}.ladda-button[data-style=zoom-out][data-loading] .ladda-label{opacity:0;-webkit-transform:scale(0.5);-moz-transform:scale(0.5);-ms-transform:scale(0.5);-o-transform:scale(0.5);transform:scale(0.5)}.ladda-button[data-style=zoom-out][data-loading] .ladda-spinner{opacity:1;-webkit-transform:none;-moz-transform:none;-ms-transform:none;-o-transform:none;transform:none}.ladda-button[data-style=zoom-in]{overflow:hidden}.ladda-button[data-style=zoom-in] .ladda-spinner{left:50%;margin-left:-16px;-webkit-transform:scale(0.2);-moz-transform:scale(0.2);-ms-transform:scale(0.2);-o-transform:scale(0.2);transform:scale(0.2)}.ladda-button[data-style=zoom-in] .ladda-label{position:relative;display:inline-block}.ladda-button[data-style=zoom-in][data-loading] .ladda-label{opacity:0;-webkit-transform:scale(2.2);-moz-transform:scale(2.2);-ms-transform:scale(2.2);-o-transform:scale(2.2);transform:scale(2.2)}.ladda-button[data-style=zoom-in][data-loading] .ladda-spinner{opacity:1;-webkit-transform:none;-moz-transform:none;-ms-transform:none;-o-transform:none;transform:none}.ladda-button[data-style=contract]{overflow:hidden;width:100px}.ladda-button[data-style=contract] .ladda-spinner{left:50%;margin-left:-16px}.ladda-button[data-style=contract][data-loading]{border-radius:50%;width:52px}.ladda-button[data-style=contract][data-loading] .ladda-label{opacity:0}.ladda-button[data-style=contract][data-loading] .ladda-spinner{opacity:1}.ladda-button[data-style=contract-overlay]{overflow:hidden;width:100px;box-shadow:0px 0px 0px 3000px rgba(0,0,0,0)}.ladda-button[data-style=contract-overlay] .ladda-spinner{left:50%;margin-left:-16px}.ladda-button[data-style=contract-overlay][data-loading]{border-radius:50%;width:52px;box-shadow:0px 0px 0px 3000px rgba(0,0,0,0.8)}.ladda-button[data-style=contract-overlay][data-loading] .ladda-label{opacity:0}.ladda-button[data-style=contract-overlay][data-loading] .ladda-spinner{opacity:1}

 /** The Magic **/
.btn-breadcrumb .btn:not(:last-child):after {
  content: " ";
  display: block;
  width: 0;
  height: 0;
  border-top: 17px solid transparent;
  border-bottom: 17px solid transparent;
  border-left: 10px solid white;
  position: absolute;
  top: 50%;
  margin-top: -17px;
  left: 100%;
  z-index: 3;
}
.btn-breadcrumb .btn:not(:last-child):before {
  content: " ";
  display: block;
  width: 0;
  height: 0;
  border-top: 17px solid transparent;
  border-bottom: 17px solid transparent;
  border-left: 10px solid rgb(173, 173, 173);
  position: absolute;
  top: 50%;
  margin-top: -17px;
  margin-left: 1px;
  left: 100%;
  z-index: 3;
}

/** The Spacing **/
.btn-breadcrumb .btn {
  padding:6px 12px 6px 24px;
}
.btn-breadcrumb .btn:first-child {
  padding:6px 6px 6px 10px;
}
.btn-breadcrumb .btn:last-child {
  padding:6px 18px 6px 24px;
}

/** Default button **/
.btn-breadcrumb .btn.btn-default:not(:last-child):after {
  border-left: 10px solid #fff;
}
.btn-breadcrumb .btn.btn-default:not(:last-child):before {
  border-left: 10px solid #ccc;
}
.btn-breadcrumb .btn.btn-default:hover:not(:last-child):after {
  border-left: 10px solid #ebebeb;
}
.btn-breadcrumb .btn.btn-default:hover:not(:last-child):before {
  border-left: 10px solid #adadad;
}

	</style>
	<body>
    	<?php include 'includes/header.php'; ?>
    	<div class="mainBody">
			<!-- Nav tabs -->
			<?php include 'includes/sidebar.php'; ?> 

	         <div class="leftMain">
	        	<div id="main-page">
	        		<div class="row">
		<!--div class="btn-group btn-breadcrumb">
            <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-default">Snippets</a>
            <a href="#" class="btn btn-default">Breadcrumbs</a>
            <a href="#" class="btn btn-default">Default</a>
        </div>
	</div-->
	        		<div id = "main-content">
						<div id="settings_container"> <br />
						
						<h2>Administrator Settings</h2><br />
						
						<div class="alert alert-success alert-dismissable" id="info_succ" style = 'height: 40px; margin: 20px; text-align: center; display:none;'>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Update successful!</strong> Information successfully updated.
						</div> 
						
						<div id = "fineDiv" class="form-inline">
							<label class = "control-label"> Fine Settings </label> &nbsp;
							<button class="btn btn-default" id="fineEnable" >Enable</button>
							<button class="btn btn-default" id="fineDisable" >Disable</button>
							<div class="form-group">
								<label class="sr-only" for="fineInput">Fine</label>
								<input type="number" class="form-control col-sm-1" id="fineInput" value = "<?php echo $info[0]->fine; ?>">
							</div>
						</div>
						<br /> <br /> <br />

						<div id = "maxDiv" class="form-inline">
							<label class = "control-label"> Maximum Materials </label> &nbsp;
							<button class="btn btn-default" id="updateMax" > Update </button>
							<button class="btn btn-default" id="saveMax" > Save </button>
							<button class="btn btn-default" id="cancelMax" > Cancel </button>
							<div class="form-group">
								<label class="sr-only" for="maxInput">Maximum</label>
								<!--label class="control-label col-sm-1" id="maxLabel" ><?php echo $info[0]->max; ?></label-->
								<input type="number" class="form-control col-sm-1" id="maxInput" value = "<?php echo $info[0]->max; ?>">
							</div>
						</div>
						<br /> <br /> <br />
						

						<!--button class="btn btn-primary ladda-button" data-style="expand-right">
							<span class="ladda-label"> Save snippet </span>
						</button-->


						<div id = "passwordDiv" class="form-horizontal" >
							<div class="form-group">
								<label class="col-sm-3 control-label"> Current Password : </label>
								<div class="col-sm-3">
									<label class = "control-label" id="passText"> *************** </label>
									<input type="password" class="form-control" id="passInput" value = "" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" id = "newPassLabel"> New Password : </label>
								<div class="col-sm-3">
									<input type="password" class="form-control" id="newPassInput" value = "" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" id = "reNewPassLabel" for = ""> Retype New Password : </label>
								<div class="col-sm-3">
									<input type="password" class="form-control" id="reNewPassInput" value = "" >
								</div>
							</div>
							<div class="form-group col-sm-9">
								<div class="col-sm-3 pull-right">
									<input type="button" class="btn btn-primary" id="updatePass" value = "Update Password" >
									<input type="button" class="btn btn-default" id="savePass" value = "Save" >
									<input type="button" class="btn btn-danger" id="cancelPass" value = "Cancel" >
								</div>
							</div>
						</div>
						<legend> Clear </legend>
						<div id= "clearDiv">
						<input id = "clear" type = "button" class = "btn btn-default" value = "Clear Reservations" style = 'margin-top: 12px;'/>
						</div>
					</div>
					</div>
					</div>
				</div>
				</div>
    </div>

	<script src="<?php echo base_url();?>dist/js/jquery.js"></script>
    <script src="<?php echo base_url();?>dist/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>dist/js/holder.js"></script>
    <script src="<?php echo base_url();?>dist/js/bootbox.min.js"></script>
	<script>
		var enable = "<?php echo $info[0]->fineenable; ?>";
		
		hideInfoInput();
		hideFine();
		hideMax();
		hidePassword();

		function hidePassword(){
			$('#passText').show();
			$('#updatePass').show();
			$('#newPassInput').hide();
			$('#passInput').hide();				
			$('#reNewPassInput').hide();				
			$('#reNewPassLabel').hide();				
			$('#newPassLabel').hide();
			$('#savePass').hide();				
			$('#cancelPass').hide();							
		}

		function hideFine(){
			if( enable == 1 ) {
				$('#fineEnable').hide();
				$('#fineDisable').show();
				$('#fineInput').show();				
			} else {
				$('#fineInput').hide();
				$('#fineEnable').show();
				$('#fineDisable').hide();
			
			}
		}

		function hideInfoLabel(){
		
			$('#startDateText').hide();
			$('#endDateText').hide();

			$('#startDateInput').show();
			$('#endDateInput').show();
				
			
			$('#save').show();
			$('#cancel').show();
			$('#updateInfo').hide();

		}
		
		function hideMax(){
			$('#maxInput').hide();
			$('#updateMax').show();
			$('#saveMax').hide();
			$('#cancelMax').hide();
		}
		
		function hideMaxLabel(){
			$('#maxInput').show();
			$('#updateMax').hide();
			$('#saveMax').show();
			$('#cancelMax').show();
		}

		$('#cancelPass').click(function(){
			hidePassword();
		});

		$('#updatePass').click(function(){
			$('#newPassInput').show();
			$('#passInput').show();
			$('#reNewPassInput').show();				
			$('#reNewPassLabel').show();				
			$('#newPassLabel').show();
			$('#savePass').show();				
			$('#cancelPass').show();
			$('#updatePass').hide();
			$('#passText').hide();
		});
		
		$('#updateMax').click(function() {
			hideMaxLabel();
		});

		$('#updateInfo').click(function(){
			hideInfoLabel();
		});

		$('#cancel').click(function(){
			hideInfoInput();
		});

		$('#fineEnable').click(function(){
			$('#fineEnable').hide();
			$('#fineDisable').show();
			$('#fineInput').show();
			enable_fine();

			confirmUpdateSettings('fineDiv');	
		});


		$('#fineDisable').click(function(){
			$('#fineEnable').show();
			$('#fineDisable').hide();
			$('#fineInput').hide();
			disable_fine();	

			confirmUpdateSettings('fineDiv');
		});

		function hideInfoInput(){
			$('#startDateText').show();
			$('#endDateText').show();

			$('#startDateInput').hide();
			$('#endDateInput').hide();

			$('#save').hide();
			$('#cancel').hide();
			$('#updateInfo').show();
			
		}

		initial_hide();
		
		function initial_hide() {
			$('#fine').hide();
			$('#enable_fine').hide();
			$('#fine-label').hide();
			$('#disable_fine').hide();

			$('#cna').hide();
		}
		
		$('#saveMax').click(function(){
			if(max_check()){ 
				confirmUpdateSettings('maxDiv'); 
				hideMax(); 
			};
		});
		
		$('#cancelMax').click(function(){		
				hideMax(); 
		});

		$('#save').click(function(){
			if(info_check()){ 
				confirmUpdateSettings('infoDiv'); 
				hideInfoInput(); 
			};
		});

		$('#reNewPassInput').blur(function(){
			reNewPassInput_check();	
		});

		$('#fineInput').on('change',function(){
			var fine = document.getElementById('fineInput').value;
				$.ajax({
					type: "POST",
					url: "<?php echo site_url()?>/admin/settings_for_fine",
					data: { fine: fine },
					success : function( result ){
						if( result == "" ){
							console.log("Updated");
						}
	
						$('table').trigger('update');
					}
				});
		});				

		$('#savePass').click(function(){
			if(valPword() && reNewPassInput_check()){ 
				$('#newPassInput').val('');
				$('#passInput').val('');			
				$('#reNewPassInput').val('');
				hidePassword(); 
			};	
		});

		function reNewPassInput_check(){
			var newPassInput = document.getElementById('newPassInput').value;
			var reNewPassInput = document.getElementById('reNewPassInput').value;
			var reNewPassDiv = document.getElementById('reNewPassInput').parentNode;

			if(newPassInput != reNewPassInput){
				reNewPassDiv.className += " has-error";
				return false;
			}
			else{
				reNewPassDiv.className = "col-sm-3";
				return true;
			}
		}
		
		function valPword(){
			
			var currpw = document.getElementById('passInput').value;
			var newpw = document.getElementById('newPassInput').value;
			var nrepw = document.getElementById('reNewPassInput').value;
			
			if(newpw == currpw){
				alert('Please provide a new password');
				return false;
			}

			else if(newpw.length < 6) {
				alert("Password must be greater than 6 characters!");
				return false;
			}
			else{
				return true;
			}
		
		}
		
		function max_check() {
			var max = document.getElementById('maxInput').value;
			var filter = /^\d{1,2}$/; 
			if (!filter.test(max)){
				alert('Invalid max value.');
				max.focus;	
				return false;
			}
			
			else {
				return true;
			}
		
		}

		function info_check(){
			var start_sem = document.getElementById('startDateInput').value;
			var end_sem = document.getElementById('endDateInput').value;
			var start_sem_date = new Date(start_sem);
			var end_sem_date = new Date(end_sem);
			var current_date = new Date();
			var oneDay = 24*60*60*1000;    // hours*minutes*seconds*milliseconds
			
			var months_difference;
			months_difference = (end_sem_date.getFullYear() - start_sem_date.getFullYear()) * 12;
			months_difference -= start_sem_date.getMonth();
			months_difference += end_sem_date.getMonth();
			if(months_difference <= 0) months_difference = 0;
			
			start_sem_date.setDate(start_sem_date.getDate()+1);
			
			if (start_sem_date < current_date) {
				alert('The input for start sem is less than the current date');
				return false;
			}
			
			if(end_sem.value < start_sem.value){
				
				alert('End of semester date should occur later than the start of semester date.');
				return false;
			}
			
			else if( months_difference < 5 || months_difference > 6){
				alert('Invalid semester length.');
				return false;
			}
			else return true;	
		}

		function enable_fine() {
			$('#fine-label').show();
			$('#fine').show();
			var fine_data = document.getElementById('fineInput').innerHTML;
			var disable_fine = document.getElementById('fineDisable');
			var enable_fine = document.getElementById('fineEnable');
			disable_fine.style.display='inline';
			enable_fine.style.display='none';
			
			$.ajax({
				url : "<?php echo site_url()?>/admin/settings_for_enable",
				success : function( result ){
					if( result == "" ){
						console.log("Updated");
					}

					$('table').trigger('update');
				}
			});
				
		}
		
		function disable_fine() {
			$('#fine-label').hide();
			$('#fine').hide();
			var disable_fine = document.getElementById('fineDisable');
			var enable_fine = document.getElementById('fineEnable');
			disable_fine.style.display='none';
			enable_fine.style.display='inline';
			
			$.ajax({
				url : "<?php echo site_url()?>/admin/settings_for_disable",
				success : function( result ){
					if( result == "" ){
						console.log("Updated");
					}

					$('table').trigger('update');
				}
			});
		
		}
		
		function confirmUpdateSettings( thisDiv ){
			bootbox.dialog({
				message: "Yey?",
				title: "Update Settings",
				onEscape: function() {},
				buttons: {
					yes: {
						label: "Yes, continue.",
						className: "btn-primary",
						callback: function() {
							var password = prompt( "Please enter admin password" );
							//if( password != "" ){
								$.ajax({
									type : "POST",
									url : "<?php echo site_url()?>/admin/check_password",
									data : { password : password },
									success : function( result ){
													console.log( result );
													if( result == "1" ){
 														updateSettings(thisDiv);
														initial_hide();
													} else {
														alert( "Wrong password!" );
													}
												}

								});								
							//}
						}
					},
					no: {
						label: "No.",
						className: "btn-default"
					}
				}
			});
		}
		
		function updateSettings( thisDiv ){
			alert(thisDiv);
			if(thisDiv == 'infoDiv'){
				var start_sem_value = document.getElementById('startDateInput').value;
				var end_sem_value = document.getElementById('endDateInput').value;
	
				$.ajax({
					type : "POST",
					url : "<?php echo site_url()?>/admin/settings_for_info",
					data: { start_sem_value : start_sem_value, end_sem_value : end_sem_value },
					success : function( result ){
						if( result == "" ){
							console.log("Updated");
						}
	
						$('table').trigger('update');
					}
				});
			}
			else if(thisDiv == 'fineDiv'){
				var fine = document.getElementById('fineInput').value;
				$.ajax({
					type: "POST",
					url: "<?php echo site_url()?>/admin/settings_for_fine",
					data: { fine: fine },
					success : function( result ){
						if( result == "" ){
							console.log("Updated");
						}
	
						$('table').trigger('update');
					}
				});
			}
			else if(thisDiv == 'maxDiv'){
				alert(1);
				var max = document.getElementById('maxInput').value;
				$.ajax({
					type: "POST",
					url: "<?php echo site_url()?>/admin/settings_for_max",
					data: { max: max },
					success : function( result ){
						if( result == "" ){
							console.log("Updated");
						}
	
						$('table').trigger('update');
					}
				});
			}
		}
		
		function checkDays(){
			var end_sem = document.getElementById('endDateInput').value;
			var end_sem_date = new Date(end_sem);
			var current_date = new Date();
			var diff =  Math.floor(( Date.parse(end_sem_date) - Date.parse(current_date) ) / 86400000);
				
			if(diff > 10){
				alert("Invalid number of days.");
				return false;
			}else return true;
				
		}

		$("#clear").click(function(){
			if(checkDays()){ 
				confirmClearReserv('clearDiv'); 
			};		
		});
		
		function confirmClearReserv( thisDiv ){
			bootbox.dialog({
						message: "Are you sure you want to clear the reservations?",
						title: "Clear Reservations",
						buttons: {
							yes: {
								label: "Yes, continue.",
								className: "btn-primary",
								callback: function() {
									$.ajax({
										type: "POST",
										url: "<?php echo site_url()?>/admin/clear_reservation",

										beforeSend: function() {
											//$("#con").html('<img src="/function-demos/functions/ajax/images/loading.gif" />');
											$("#error_message").html("loading...");
										},

										error: function(xhr, textStatus, errorThrown) {
												$('#error_message').html(textStatus);
										},

										success: function( result ){
											console.log("Cleared");
											
										}
									});
								}
							},
							no: {
								label: "No.",
								className: "btn-default"
							}
						}
					});
				
		}
	</script>

	<script type="text/javascript">
		/*
Ref:
http://www.jqueryscript.net/demo/Buttons-with-Built-in-Loading-Indicators-For-Bootsrap-3-Ladda-Bootstrap/
*/
/*
$(window).load(function(){
            // Bind normal buttons
			Ladda.bind( 'div:not(.progress-demo) button', { callback : function( instance ){
				alert(1);
				setTimeout(function(){
					instance.stop();
				}, 1000);
			} } );

			// Bind progress buttons and simulate loading progress
			Ladda.bind( '.progress-demo button', {
				callback: function( instance ) {
					var progress = 0;
					var interval = setInterval( function() {
						progress = Math.min( progress + Math.random() * 0.1, 1 );
						instance.setProgress( progress );

						if( progress === 1 ) {
							instance.stop();
							clearInterval( interval );
						}
					}, 200 );
				}
			} );

			// You can control loading explicitly using the JavaScript API
			// as outlined below:

			// var l = Ladda.create( document.querySelector( 'button' ) );
			// l.start();
			// l.stop();
			// l.toggle();
			// l.isLoading();
			// l.setProgress( 0-1 );
});

*/
/*
Files:
spin.min.js
ladda.min.js"
*/

/*!
 * Copyright (c) 2011-2013 Felix Gnass
 * Licensed under the MIT license
 */
(function(t,e){"object"==typeof exports?module.exports=e():"function"==typeof define&&define.amd?define(e):t.Spinner=e()})(this,function(){"use strict";function t(t,e){var i,n=document.createElement(t||"div");for(i in e)n[i]=e[i];return n}function e(t){for(var e=1,i=arguments.length;i>e;e++)t.appendChild(arguments[e]);return t}function i(t,e,i,n){var o=["opacity",e,~~(100*t),i,n].join("-"),r=.01+100*(i/n),a=Math.max(1-(1-t)/e*(100-r),t),s=u.substring(0,u.indexOf("Animation")).toLowerCase(),l=s&&"-"+s+"-"||"";return f[o]||(c.insertRule("@"+l+"keyframes "+o+"{"+"0%{opacity:"+a+"}"+r+"%{opacity:"+t+"}"+(r+.01)+"%{opacity:1}"+(r+e)%100+"%{opacity:"+t+"}"+"100%{opacity:"+a+"}"+"}",c.cssRules.length),f[o]=1),o}function n(t,e){var i,n,o=t.style;if(void 0!==o[e])return e;for(e=e.charAt(0).toUpperCase()+e.slice(1),n=0;d.length>n;n++)if(i=d[n]+e,void 0!==o[i])return i}function o(t,e){for(var i in e)t.style[n(t,i)||i]=e[i];return t}function r(t){for(var e=1;arguments.length>e;e++){var i=arguments[e];for(var n in i)void 0===t[n]&&(t[n]=i[n])}return t}function a(t){for(var e={x:t.offsetLeft,y:t.offsetTop};t=t.offsetParent;)e.x+=t.offsetLeft,e.y+=t.offsetTop;return e}function s(t){return this===void 0?new s(t):(this.opts=r(t||{},s.defaults,p),void 0)}function l(){function i(e,i){return t("<"+e+' xmlns="urn:schemas-microsoft.com:vml" class="spin-vml">',i)}c.addRule(".spin-vml","behavior:url(#default#VML)"),s.prototype.lines=function(t,n){function r(){return o(i("group",{coordsize:u+" "+u,coordorigin:-l+" "+-l}),{width:u,height:u})}function a(t,a,s){e(f,e(o(r(),{rotation:360/n.lines*t+"deg",left:~~a}),e(o(i("roundrect",{arcsize:n.corners}),{width:l,height:n.width,left:n.radius,top:-n.width>>1,filter:s}),i("fill",{color:n.color,opacity:n.opacity}),i("stroke",{opacity:0}))))}var s,l=n.length+n.width,u=2*l,d=2*-(n.width+n.length)+"px",f=o(r(),{position:"absolute",top:d,left:d});if(n.shadow)for(s=1;n.lines>=s;s++)a(s,-2,"progid:DXImageTransform.Microsoft.Blur(pixelradius=2,makeshadow=1,shadowopacity=.3)");for(s=1;n.lines>=s;s++)a(s);return e(t,f)},s.prototype.opacity=function(t,e,i,n){var o=t.firstChild;n=n.shadow&&n.lines||0,o&&o.childNodes.length>e+n&&(o=o.childNodes[e+n],o=o&&o.firstChild,o=o&&o.firstChild,o&&(o.opacity=i))}}var u,d=["webkit","Moz","ms","O"],f={},c=function(){var i=t("style",{type:"text/css"});return e(document.getElementsByTagName("head")[0],i),i.sheet||i.styleSheet}(),p={lines:12,length:7,width:5,radius:10,rotate:0,corners:1,color:"#000",direction:1,speed:1,trail:100,opacity:.25,fps:20,zIndex:2e9,className:"spinner",top:"auto",left:"auto",position:"relative"};s.defaults={},r(s.prototype,{spin:function(e){this.stop();var i,n,r=this,s=r.opts,l=r.el=o(t(0,{className:s.className}),{position:s.position,width:0,zIndex:s.zIndex}),d=s.radius+s.length+s.width;if(e&&(e.insertBefore(l,e.firstChild||null),n=a(e),i=a(l),o(l,{left:("auto"==s.left?n.x-i.x+(e.offsetWidth>>1):parseInt(s.left,10)+d)+"px",top:("auto"==s.top?n.y-i.y+(e.offsetHeight>>1):parseInt(s.top,10)+d)+"px"})),l.setAttribute("role","progressbar"),r.lines(l,r.opts),!u){var f,c=0,p=(s.lines-1)*(1-s.direction)/2,h=s.fps,m=h/s.speed,g=(1-s.opacity)/(m*s.trail/100),v=m/s.lines;(function y(){c++;for(var t=0;s.lines>t;t++)f=Math.max(1-(c+(s.lines-t)*v)%m*g,s.opacity),r.opacity(l,t*s.direction+p,f,s);r.timeout=r.el&&setTimeout(y,~~(1e3/h))})()}return r},stop:function(){var t=this.el;return t&&(clearTimeout(this.timeout),t.parentNode&&t.parentNode.removeChild(t),this.el=void 0),this},lines:function(n,r){function a(e,i){return o(t(),{position:"absolute",width:r.length+r.width+"px",height:r.width+"px",background:e,boxShadow:i,transformOrigin:"left",transform:"rotate("+~~(360/r.lines*l+r.rotate)+"deg) translate("+r.radius+"px"+",0)",borderRadius:(r.corners*r.width>>1)+"px"})}for(var s,l=0,d=(r.lines-1)*(1-r.direction)/2;r.lines>l;l++)s=o(t(),{position:"absolute",top:1+~(r.width/2)+"px",transform:r.hwaccel?"translate3d(0,0,0)":"",opacity:r.opacity,animation:u&&i(r.opacity,r.trail,d+l*r.direction,r.lines)+" "+1/r.speed+"s linear infinite"}),r.shadow&&e(s,o(a("#000","0 0 4px #000"),{top:"2px"})),e(n,e(s,a(r.color,"0 0 1px rgba(0,0,0,.1)")));return n},opacity:function(t,e,i){t.childNodes.length>e&&(t.childNodes[e].style.opacity=i)}});var h=o(t("group"),{behavior:"url(#default#VML)"});return!n(h,"transform")&&h.adj?l():u=n(h,"animation"),s});


/*!
 * Ladda 0.8.0 (2013-09-05, 18:54)
 * http://lab.hakim.se/ladda
 * MIT licensed
 *
 * Copyright (C) 2013 Hakim El Hattab, http://hakim.se
 */
 
(function(t,e){"object"==typeof exports?module.exports=e():"function"==typeof define&&define.amd?define(["spin"],e):t.Ladda=e(t.Spinner)})(this,function(t){"use strict";function e(t){if(t===void 0)return console.warn("Ladda button target must be defined."),void 0;t.querySelector(".ladda-label")||(t.innerHTML='<span class="ladda-label">'+t.innerHTML+"</span>");var e=i(t),n=document.createElement("span");n.className="ladda-spinner",t.appendChild(n);var r,a={start:function(){return t.setAttribute("disabled",""),t.setAttribute("data-loading",""),clearTimeout(r),e.spin(n),this.setProgress(0),this},startAfter:function(t){return clearTimeout(r),r=setTimeout(function(){a.start()},t),this},stop:function(){return t.removeAttribute("disabled"),t.removeAttribute("data-loading"),clearTimeout(r),r=setTimeout(function(){e.stop()},1e3),this},toggle:function(){return this.isLoading()?this.stop():this.start(),this},setProgress:function(e){e=Math.max(Math.min(e,1),0);var n=t.querySelector(".ladda-progress");0===e&&n&&n.parentNode?n.parentNode.removeChild(n):(n||(n=document.createElement("div"),n.className="ladda-progress",t.appendChild(n)),n.style.width=(e||0)*t.offsetWidth+"px")},enable:function(){return this.stop(),this},disable:function(){return this.stop(),t.setAttribute("disabled",""),this},isLoading:function(){return t.hasAttribute("data-loading")}};return o.push(a),a}function n(t,n){n=n||{};var r=[];"string"==typeof t?r=a(document.querySelectorAll(t)):"object"==typeof t&&"string"==typeof t.nodeName&&(r=[t]);for(var i=0,o=r.length;o>i;i++)(function(){var t=r[i];if("function"==typeof t.addEventListener){var a=e(t),o=-1;t.addEventListener("click",function(){a.startAfter(1),"number"==typeof n.timeout&&(clearTimeout(o),o=setTimeout(a.stop,n.timeout)),"function"==typeof n.callback&&n.callback.apply(null,[a])},!1)}})()}function r(){for(var t=0,e=o.length;e>t;t++)o[t].stop()}function i(e){var n,r=e.offsetHeight;r>32&&(r*=.8),e.hasAttribute("data-spinner-size")&&(r=parseInt(e.getAttribute("data-spinner-size"),10)),e.hasAttribute("data-spinner-color")&&(n=e.getAttribute("data-spinner-color"));var i=12,a=.2*r,o=.6*a,s=7>a?2:3;return new t({color:n||"#fff",lines:i,radius:a,length:o,width:s,zIndex:"auto",top:"auto",left:"auto",className:""})}function a(t){for(var e=[],n=0;t.length>n;n++)e.push(t[n]);return e}var o=[];return{bind:n,create:e,stopAll:r}});


	</script>

	</body>
</html>