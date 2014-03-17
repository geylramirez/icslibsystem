<!DOCTYPE html>
<html lang="en">
	<?php include 'includes/head.php'; ?>			
	<body>
		<?php include 'includes/header.php'; ?>        
        <div class="mainBody">
            <?php include 'includes/sidebar.php'; ?>

			<script>
				function returnBook( thisDiv ){
					bootbox.dialog({
						message: "Confirm return of borrowed material.",
						title: "Confirmation",
						buttons: {
							yes: {
								label: "Yes, continue",
								className: "btn-primary",
								callback: function() {
									var thisButton = thisDiv;
									var parent = thisDiv.parent();
									var fine = $.trim(parent.siblings('.fine').text());
									var materialid = $.trim(parent.siblings('.materialid').text());
									var isbn = $.trim(parent.siblings('.isbn').text());
									var idnumber = $.trim(parent.siblings('.idnumber').text());
							
									$.ajax({
										type: "POST",
										url: "<?php echo site_url();?>/admin/material_returned",
										data: { isbn : isbn, materialid : materialid, fine : fine }, 

										beforeSend: function() {
											//$("#con").html('<img src="/function-demos/functions/ajax/images/loading.gif" />');
											$("#error_message").html("loading...");
										},

										error: function(xhr, textStatus, errorThrown) {
												$('#error_message').html(textStatus);
										},

										success: function( result ){

											if( result != "1" ){
												$("#success_return").show();
												$("#success_return").html("Successfully returned!");
												$("#success_return").fadeIn('slow');
												$("#"+materialid+"-"+idnumber).html("");
												document.body.scrollTop = document.documentElement.scrollTop = 0;
												setTimeout(function() { $('#success_return').fadeOut('slow') }, 5000);	
											} else {
												//alert("Failed to notify");
											}
										}
									});
								}
							},
							no: {
								label: "No",
								className: "btn-default"
							}
						}
					});
				}
			</script>
			
			<div class="leftMain">
				<div id="main-page">
					<div id = "main-content">
						<br />
						<h2> Borrowed Materials View </h2>
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url()?>/admin/home">Home</a></li>
							<li class="active"> Borrowed </li>
						</ol>

						<div class="col-md-6 col-md-offset-3 " style = 'height: 50px; margin-bottom : 40px;'>
							<div style="text-align: center;" id = "alert"> </div>
						</div>
						<br />
						
						<div class="row">
							<div class="col-md-6 col-md-offset-3 ">
								<div class="input-group">
									<input type="text" id = "searchBorrowedBooks" class="form-control">
									<span class="input-group-btn">
										<button class="btn btn-default" id = "searchBorrowedButton" type="button"> Search</button>
									</span>
								</div><!-- /input-group -->
							</div><!-- /.col-lg-6 -->
						</div><!-- /.row -->
						<br />

						<!--
							<div class="row">
								<div class="col-md-6 col-md-offset-3 ">
									<div class="alert-container" style = 'height: 40px; padding-top: 10px; margin-bottom:10px;'>
										<div style="display:none; height: 20px; text-align: center;" id = "success_return">  </div>
									</div>
								</div>
							</div>
					

						<br />

						<form method="post"  style="width: 800px ; margin-left: auto; margin-right: auto;" role="form" >
                            <input type="text" name="search"/>
                            <input class = "btn btn-primary" type="submit" value="Search" name="search_borrowed_books"/> 
                           	<div class="alert-container" style = 'height: 40px; margin: 30px;'>
								<div style="display:none" id = "success_return" class = "alert alert-success">  </div>
							</div>   
                        </form>-->

						<?php
						  	echo"<table class='table table-hover'>
								<thead>
									<tr>
										<th width='10%'><center>ISBN/ISSN</center></th>
										<th width='11%'><center>ID Material</center></th>
										<th width='5%'><center>Type</center></th>
										<th width='42%'><center>Library Information</center></th>
										<th width='8%'><center>Borrower</center></th>
										<th width='8%'><center>Start Date</center></th>
										<th width='8%'><center>Due Date</center></th>";
							
							if ($enable_fine == 0) echo "<th width='5%'><center>Status</center></th>";
							else echo "<th width='5%'><center>Fine</center></th>";
										
							echo "<th width='5%'><center>Action</center></th> </tr></thead>";
							echo "<tbody>";
							if( !$this->input->post('search_borrowed_books') )
								echo "<span><center>No borrowed books to be claimed.</center></td>";  
							else {
	                         	if(count($flag) ==0){		
	                                echo "<td colspan = '9'><center>No search results found.</center></td>";                                    
	                         	}else{
									
									date_default_timezone_set('Asia/Manila');
								    // Then call the date functions
								    $date = strtotime(date('Y-m-d'));
									//echo count($borrowed_books->result());
									//$i=0;
									foreach($borrowed_books as $row){	
										$date2 = strtotime($row->expectedreturn);
										$days = $date-$date2;
										$finalfine = floor($days/(60*60*24))*$fine;
										echo "<tr id = '{$row->materialid}-{$row->idnumber}'>";
										echo "<td class = 'isbn' ><center><span class='table-text'>{$row->isbn}</span></center> </td>";
										echo "<td class = 'materialid' ><center><span class='table-text'>{$row->materialid} </span></center></td>";
										
										if($row->type== 'Book')
											$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='Book'><span class='glyphicon glyphicon-book'></span></a>";
										else if($row->type == 'CD')
											$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='CD'><span class='glyphicon glyphicon-headphones'></span></a>";
										else if($row->type == 'SP')
											$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='SP'><span class='glyphicon glyphicon-file'></span></a>";
										else if($row->type == 'References')
											$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='References'><span class='glyphicon glyphicon-paperclip'></span></a>";
										else if($row->type== 'Journals')
											$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='Journal'><span class='glyphicon glyphicon-pencil'></span></a>";
										else if($row->type== 'Magazines')
											$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='Magazine'><span class='glyphicon glyphicon-picture'></span></a>";
										else if($row->type == 'Thesis')
											$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='Thesi'><span class='glyphicon glyphicon-bookmark'></span></a>";
									
										echo "<td align='center'>". $type . "</span></td>";
										echo "<td>	<b><span class='title'>" . $row->name. ".</span></b><br />";
										echo "<span class='table-text'>".$row->authorname."</span>";
										echo "<td class='idnumber'><span class='table-text'>". $row->idnumber. "</span></td>";
										echo "<td><span class='table-text'>". $row->start . "</span></td>";
										echo "<td><span class='table-text'>". $row->expectedreturn. "</span></td>";
										
										if($enable_fine == 1) {
											if ($finalfine > 0) echo "<td><span class='table-text'>". $finalfine. ".00</span></td>";
											else echo "<td><span class='table-text'>0.00</span></td>";
										}
										else {
											if ($finalfine > 0) echo "<td><span class='table-text'>Overdue</span></td>";
											else echo "<td><span class='table-text'>0.00</span></td>";
										}
										echo "<td><button onclick = 'returnBook($(this))' class='returnButton btn btn-primary' name='return'><span class='glyphicon glyphicon-remove-circle'></span></button>";
										echo "</td></tr>";
									}//for	
									
								}
							}
							echo "</tbody>";
							echo "</table>";
						?>
						
					</div>
					<?php include "includes/pager.php"; ?>
				</div>
			</div>
		
		<?php include "includes/pagination.php"; ?>
		<?php include "includes/footer.php"; ?>
		
		
		<script>
			
			function submitForm(){
				$("#return").submit();
			}	

			$("#searchBorrowedButton").click(function(){
					var search = $("#searchBorrowedBooks").val();

					$.ajax({
						type: "POST",
						url: "<?php echo site_url('admin/search_reservations')?>",
						dataType: "json",
						data: { search : search }, 

						beforeSend: function() {
							$("#alert").show();
							$("#alert").removeClass("alert alert-success");
							$("#alert").html("<center><img src='<?php echo base_url();?>dist/images/ajax-loader.gif' /></center>");
						},

						error: function(xhr, textStatus, errorThrown) {
							$("#alert").addClass("alert alert-success");
							$("#alert").html( "<strong>" + xhr.status + " " + xhr.statusText + "</strong>");
							$("#alert").fadeIn('slow');
						},

						success: function( result ){
							$("#alert").fadeOut('slow', function(){
								$("#alert").hide();	
							});
							
							if( result != "" ){
								$('tbody').html("");
								$('tbody').fadeIn('slow', function(){
									for( i = 0; i < result.length; i++ ){
										var content = "";
										content = content + "<tr id ='"+ result[i].materialid + "-" + result[i].idnumber +"' > ";
										content = content + "<td class = 'isbn' ><span class='table-text'> " + printISBN( result[i].isbn, result[i].type ) + "  </span></center></td>";
										content = content + "<td class = 'materialid' ><center><span class='table-text'> " + result[i].materialid + " </span></center></td>"; 
										content = content + "<td class = 'type' > " + printType(result[i].type) + " </td>";
										content = content + "<td><span class = 'title' > <strong> " + result[i].name + ".</strong> </span><br />" + printAuthor(result[i].author) + "<span class = 'author' > " + result[i].year + ".</span>" + printEdition( result[i].edvol ) + " </td>";
										content = content + "<td class = 'idnumber' ><center><span class='table-text'> " + result[i].idnumber + " </span></center></td>";
										content = content + printDate( result[i].started, result[i].claimdate );
										content = content + "<td align='center'><span class='table-text'>" + result[i].queue + "/" + result[i].total + "</span></td>";
										content = content + printButton( result[i].started ) + "</tr>";

										$('tbody').append( content );
										
									}
									$('table').trigger('update');									
								});
								
							} else {
								$('tbody').html("");
								$('tbody').fadeIn('slow');

								$('tbody').html("<td colspan = '8'><center> <br /> <b>No results found</b> </center> <br /></td>");
								$('table').tablesorter();
							}

							$('table').trigger('update');				
						}
					});
				});


			
		</script>

	</body>
</html>