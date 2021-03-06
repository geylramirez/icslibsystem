<?php 
	$email = $this->session->userdata('email');
	if($email)
		include 'logout_header.php'; 
	else
		include 'home_header.php'

?>

	<style>
		.sidebar{border-right: 1px solid #eee; height:700px;}
		th{text-align: center;}
	</style>
	
	<br/><br/>
	<div class="container">
		<div class="mainbody">
			<div class="row">
				<?php
					
					if($this->session->userdata('email')){ 
						echo "<br/>";
				
						echo "<div class='col-md-3 sidebar'>";
						//<!--sidebar-->
						 include 'sidebar.php';
						}
					?>
				</div> <!--col-md-3-->

				<?php
					if($email){
						echo "<div class='col-md-9 section'>"; //if logged in
					}else{
						echo "<div class='col-md-12 section'>"; //if not logged in
						echo "<br/>";
					}
				?>
					<ol class="breadcrumb">
					  <li><a href="<?php echo site_url();?>">Home</a></li>
					  <li class="active">Search library</a></li>
					 <!-- <?php
					  	if($email){
					  		echo "<li class='active'><a href='";
					  		echo site_url();
					  		echo "/borrower/search_all'>Search library</a></li>";
					  	}
					  	else{
					  		echo "<li class='active'><a href='";
					  		echo site_url();
					  		echo "/borrower/outside_search'>Search library</a></li>";	
					  	}
					  ?> -->
					  
					</ol>
					<!--search bar-->
					<?php include 'search_bar.php'; ?>				
					<br />
					<?php
						if($email){
							echo "<div id = 'success'>  </div>";
							echo "<div id = 'failed'>  </div>";
						}
					?>
					

						<?php
								$reserved_flag=0;
								$waitlist_flag=0;
								$rowNum 	 = 0;
								if($value!=NULL){
									$value_count = count($value);
									
									if($input!=''){
										echo $value_count;
										if($value_count==1) echo " result ";
										else echo " results ";
										echo "found for '".$input."'.<br/>";
									} 
						?>

										<div>
											<table class="table table-hover tablesorter" id="myTable" summary="Results" border="1" cellspacing="5" cellpadding="5" align = "center">
											<thead>
												<tr>
													<th width="10%" abbr="ISBN" scope="col" title="ISBN/ISSN">ISBN</th>
													<th width="10%" abbr="lmID" scope="col" title="Library Material ID">Material ID</th>
													<th width="1%" abbr="Type" scope="col" title="Type">Type</th>
													<th width="58%" abbr="Library Information" scope="col" title="Description">Library Information</th>
													<th width='10%' abbr='copies' scope='col' title='copies'>Available Copies</th>
															
													<?php
														if($email){
															echo "<th width='10%' abbr='Queue' scope='col' title='Rank'>Rank</th>";
															echo "<th width='10%' abbr='Act' scope='col' title='Action'>Action</th>";
														}
													?>
												</tr>
											</thead>
											
											
									<?php
									$count = 0;				
									foreach($value as $row){
										//var_dump($row);
										//var_dump($row['author']);
										$requirement = $row['requirement'];
										echo "<tr>";
										echo "<td class='isbn'><span class='table-text'><center>";
										$tmp = $row['isbn'];
										if (preg_match('/^[+]/', $tmp)) {
										    echo "---";
										} else {
										    echo "${row['isbn']}";
										}
										echo "</center></span></td>";
										echo "<td class='matID'><span class='table-text'><center> ${row['materialid']}</span></center></td>";
										if($row['type']== 'Book')
											$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='Book'><span class='glyphicon glyphicon-book'></span></a>";
										else if($row['type'] == 'CD')
											$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='CD'><span class='glyphicon glyphicon-headphones'></span></a>";
										else if($row['type'] == 'SP')
											$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='SP'><span class='glyphicon glyphicon-file'></span></a>";
										else if($row['type'] == 'References')
											$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='References'><span class='glyphicon glyphicon-paperclip'></span></a>";
										else if($row['type']== 'Journals')
											$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='Journal'><span class='glyphicon glyphicon-pencil'></span></a>";
										else if($row['type']== 'Magazines')
											$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='Magazine'><span class='glyphicon glyphicon-picture'></span></a>";
										else if($row['type'] == 'Thesis')
											$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='Thesis'><span class='glyphicon glyphicon-bookmark'></span></a>";
											
										echo "<td class = 'type' align='center'>". $type ."</td>";
										//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
										/*echo "<td><span class='table-text'><b> ${row['name']} </b></span> <br/>

										<span class='author'> ${row['authorname']}</span><br /></td>";*/
										echo "<td><b><span class ='title'>${row['name']}.</b></span><br />";									
										foreach ($row['author'] as $name) {
											$name = (array)$name;
											echo "<span class ='author'> ${name['lname']}, ${name['fname']} ${name['mname']}.</span>";
										}

										//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	
										if($email){
											if(($this->session->userdata('classification') == 'F' && $row['access']!=1) || $this->session->userdata('classification') == 'S' && $row['access']!=2){
												echo "<br />Ratings: ";
												if(isset($row['rating'])){ 
												if($row['rating']==1){
												 echo "<div style = 'display:inline-block;' name='$count'>
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}' value='1' id='1' class='rating' onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}'value='2' id='2' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}'value='3' id='3' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}'value='4' id='4' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}'value='5' id='5' class='rating'  onclick='fillstar(this)' />&nbsp;";
												}
												else if($row['rating']==2){
												 echo "<div style = 'display:inline-block;' name='$count'>
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}'value='1' id='1' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}'value='2' id='2' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}'value='3' id='3' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}'value='4' id='4' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}'value='5' id='5' class='rating'  onclick='fillstar(this)' />&nbsp;</div>";
												}
												else if($row['rating']==3){
												 echo "<div style = 'display:inline-block;' name='$count'>
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}'value='1' id='1' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}'value='2' id='2' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}'value='3' id='3' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}'value='4' id='4' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}'value='5' id='5' class='rating'  onclick='fillstar(this)' />&nbsp;</div>";
												}
												else if($row['rating']==4){
												 echo "<div style = 'display:inline-block;' name='$count'>
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}'value='1' id='1' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}'value='2' id='2' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}'value='3' id='3' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}'value='4' id='4' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}'value='5' id='5' class='rating'  onclick='fillstar(this)' />&nbsp;</div>";
												}
												else if($row['rating']==5){
												  echo "<div style = 'display:inline-block;' name='$count'>
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}'value='1' id='1' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}'value='2' id='2' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}'value='3' id='3' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}'value='4' id='4' class='rating'  onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/fullstar.jpg' name='{$row['materialid']}'value='5' id='5' class='rating'  onclick='fillstar(this)' />&nbsp;";
												}else{
													echo "<div style = 'display:inline-block;' name='$count'>
														<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}'value='1' id='1' class='rating' onclick='fillstar(this)' />&nbsp;
														<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}  value='2' id='2' class='rating' onclick='fillstar(this)' />&nbsp;
														<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}'value='3' id='3' class='rating' onclick='fillstar(this)' />&nbsp;
														<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}  value='4' id='4' class='rating' onclick='fillstar(this)' />&nbsp;
														<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}'value='5' id='5' class='rating' onclick='fillstar(this)' />&nbsp;";
												}
											}
											else {
												  echo "<div style = 'display:inline-block;' name='$count'>
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}'value='1' id='1' class='rating' onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}' value='2' id='2' class='rating' onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}' value='3' id='3' class='rating' onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}' value='4' id='4' class='rating' onclick='fillstar(this)' />&nbsp;
													<img style='float:left;cursor:pointer;height:15px;width:15px;' src='".base_url()."dist/images/emptystar.jpg' name='{$row['materialid']}' value='5' id='5' class='rating' onclick='fillstar(this)' />&nbsp;";
											}

												
											}
										}
										echo "<span id='span".$count."'>";
										if($row['avg']==null) echo " Average Rating: 0"; 
										else echo "  Average Rating: ".($row['avg']);
										echo "</div></span></td>";

										$available = $row['quantity'] - $row['borrowedcopy'];
										echo "<td><span class='table-text'><center>".$available." of " .$row['quantity']."</center></span></td>";
										if($email){
											$t_q = 0;
											$rrank = 0;
											foreach($rank as $q_rank){
											
												if($q_rank['materialid']== $row['materialid']){
													$rrank=$q_rank['queue'];
													//echo "<td> ${rrank} of ";
													//echo "${q_rank['queue']} ";
												}
												
											}
											foreach($total as $t_queue){
												if($t_queue['materialid']==$row['materialid']){
													 $t_q=$t_queue['tq'];
													 //echo "${t_q} </td>";
												}
											}
											if($rrank!=0)
												echo "<td class='queue'><span class='table-text'><center> ${rrank} of ${t_q} </center></span></td>";
											else
												echo "<td class='queue'><span class='table-text'><center>".$rrank."</center></span></td>";
											if($material!=NULL){
												foreach ($material as $here){ 
													if($row['materialid']==$here['materialid']){
														$waitlist_flag=1;
													}
												 } 
											}
											if($matid!=NULL){
												foreach ($matid as $tuples){ 
													if($row['materialid']==$tuples['materialid']){
														$reserved_flag=1;
													}
												 } 
											}
											if($waitlist_flag==1){
												$materialid=$row['materialid'];
												echo "<td><center>";
												echo "<span><button class='btn btn-primary reserve_button' style='display:none;' name='reserve'  value='".$materialid."'><a data-toggle='tooltip' class='tooltipLink' data-original-title='Reserve'><span class = 'glyphicon glyphicon-shopping-cart'></span></a></button>";
												echo "<button class='btn btn-danger cancel_button' name='reserve' value='".$materialid."' onclick = \"sendRow(".$rowNum.")\"><a data-toggle='tooltip' class='tooltipLink' data-original-title='Cancel reservation'><span class = 'glyphicon glyphicon-remove'></span></a></button></span></td></tr>";	
											}
											else if($reserved_flag==1){
												echo "<td><span class='table-text'><center>" . "BORROWED" . "</span></center></td>";
												echo "</tr>";	
											}
											else if($row['access']==3){
												echo "<td><span class='table-text'><center>" . "ROOM USE" . "</span></center></td>";
												echo "</tr>";
											}
											else if($this->session->userdata('classification') == 'F' && $row['access']==1){
													
												echo "<td><span class='table-text'><center>" . "STUDENT USE" . "</span></center></td>";
												echo "</tr>";	
									
											}
											else if($this->session->userdata('classification') == 'S' && $row['access']==2){
												
												echo "<td><span class='table-text'><center>" . "FACULTY USE" . "</span></center></td>";
												echo "</tr>";	
													
											}
											else{							
												echo "<td><center>" . "";
												$materialid=$row['materialid'];
												//$rowVal = $rowNum . "|" . $materialid;
												$borrowed_count = 0;
												$reserved_count = 0;
												$limit = 3;
															
												foreach($borrowedCount as $row)
													$borrowed_count = $row['COUNT(librarymaterial.materialid)'];
												foreach($reservedCount as $row)
													$reserved_count = $row['resCount'];

												$total_count = $borrowed_count+$reserved_count;
												//echo "<span id='total' value='{$total_count}'></span>";
															

												$reserve= "reserve_button";

											//	echo $row['requirement'];
												echo "<span><button class='btn btn-primary ". $reserve. "' name='reserve'  value='".$materialid. "|". $requirement."'><a data-toggle='tooltip' class='tooltipLink' data-original-title='Reserve'><span class = 'glyphicon glyphicon-shopping-cart'></span></a></button>";
												echo "<button class='btn btn-danger cancel_button' style='display:none;'  name='reserve' value='".$materialid. "|". $requirement."' onclick = \"sendRow(".$rowNum.")\"><a data-toggle='tooltip' class='tooltipLink' data-original-title='Cancel reservation'><span class = 'glyphicon glyphicon-remove'></span></a></button></span>";
												echo "</center></td></tr>";
												$rowNum++;
											}
											$count++;
											$reserved_flag=0;
											$waitlist_flag=0;
										}
									}
										
								}//if(value!=NULL)

								else{

									echo "<div>No results found for '";
									echo $input. "'!</div>";

								}
								//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
								
							?>
					</table>
					<?php if($value!=NULL){?>
					<div class="pager">
						<!--<img src="../addons/pager/icons/first.png" class="first" alt="First" />
						<img src="../addons/pager/icons/prev.png" class="prev" alt="Prev" />-->
						<img class="first" style="cursor:pointer" src = "<?php echo base_url()?>dist/images/first.png" />
						<img class="prev" style="cursor:pointer" src = "<?php echo base_url()?>dist/images/prev.png" />
						<strong> <span class="pagedisplay"></span></strong> <!--this can be any element, including an input-->
						<img class="next" style="cursor:pointer" src = "<?php echo base_url()?>dist/images/next.png" />
						<img class="last" style="cursor:pointer" src = "<?php echo base_url()?>dist/images/last.png" />
						<br/>
						<span>Page size: </span>
						<select class="pagesize" title="Select page size">
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="30">30</option>
							<option value="40">40</option>
						</select>
						<span>Go to: </span>
						<select class="gotoPage" title="Select page number"></select>
					</div>
					<?php }?>
					</div>
					</div> <!--end of library inventory tabs-->
				</div> <!--col-md-9-->
			</div> <!--row-->
		</div> <!--mainbody-->
	</div> <!--container-->

	<div class="container marketing">
		<?php if(!$this->session->userdata('email'))
				include 'home_footer.php'; 
				else 
				echo "<a href='#' class='back-to-top'><span class='glyphicon glyphicon-chevron-up'></span></a>";
		?>
		
	<script src="<?php echo base_url(); ?>dist/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/holder.js"></script>
	</div> <!--container marketing-->


<script src="<?php echo base_url();?>dist/js/bootbox.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>dist/js/jquery.tablesorter.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>dist/js/jquery.tablesorter.pager.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>dist/js/jquery.tablesorter.widgets.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>dist/js/widget-pager.js"></script>

<script id="js">
	var offset = 220;
	var duration = 500;
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > offset) {
			jQuery('.back-to-top').fadeIn(duration);
		} else {
			jQuery('.back-to-top').fadeOut(duration);
		}
	});

	jQuery('.back-to-top').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, duration);
		return false;
	});

			function fillstar(Obj){
				var stars=document.getElementsByName(Obj.name);
				for(i=0;i<stars.length;i++){
					if (i<Obj.id){
						stars[i].src="<?php echo base_url();?>dist/images/fullstar.jpg";
					}
					else{stars[i].src="<?php echo base_url();?>dist/images/emptystar.jpg"}
				}
			}
			
			$(function(){

			var pagerOptions = {

			// target the pager markup - see the HTML block below
			container: $(".pager"),

			// use this url format "http:/mydatabase.com?page={page}&size={size}&{sortList:col}"
			ajaxUrl: null,

			// modify the url after all processing has been applied
			customAjaxUrl: function(table, url) { return url; },

			// process ajax so that the data object is returned along with the total number of rows
			// example: { "data" : [{ "ID": 1, "Name": "Foo", "Last": "Bar" }], "total_rows" : 100 }
			ajaxProcessing: function(ajax){
			if (ajax && ajax.hasOwnProperty('data')) {
			// return [ "data", "total_rows" ];
			return [ ajax.total_rows, ajax.data ];
			}
			},

			// output string - default is '{page}/{totalPages}'
			// possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
			output: '{startRow} to {endRow} ({totalRows})',

			// apply disabled classname to the pager arrows when the rows at either extreme is visible - default is true
			updateArrows: true,

			// starting page of the pager (zero based index)
			page: 0,

			// Number of visible rows - default is 10
			size: 10,

			// Save pager page & size if the storage script is loaded (requires $.tablesorter.storage in jquery.tablesorter.widgets.js)
			savePages : false,

			//defines custom storage key
			storageKey:'tablesorter-pager',

			// if true, the table will remain the same height no matter how many records are displayed. The space is made up by an empty
			// table row set to a height to compensate; default is false
			fixedHeight: false,

			// remove rows from the table to speed up the sort of large tables.
			// setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
			removeRows: false,

			// css class names of pager arrows
			cssNext: '.next', // next page arrow
			cssPrev: '.prev', // previous page arrow
			cssFirst: '.first', // go to first page arrow
			cssLast: '.last', // go to last page arrow
			cssGoto: '.gotoPage', // select dropdown to allow choosing a page

			cssPageDisplay: '.pagedisplay', // location of where the "output" is displayed
			cssPageSize: '.pagesize', // page size selector - select dropdown that sets the "size" option

			// class added to arrows when at the extremes (i.e. prev/first arrows are "disabled" when on the first page)
			cssDisabled: 'disabled', // Note there is no period "." in front of this class name
			cssErrorRow: 'tablesorter-errorRow' // ajax error information row

			};

			$("table")
				.tablesorter({
						theme: 'blue',
						widthFixed: true,
						widgets: ['zebra']
					})

			.bind('pagerChange pagerComplete pagerInitialized pageMoved', function(e, c){
				var msg = '"</span> event triggered, ' + (e.type === 'pagerChange' ? 'going to' : 'now on') + ' page <span class="typ">' + (c.page + 1) + '/' + c.totalPages + '</span>';
				$('#display')
					.append('<li><span class="str">"' + e.type + msg + '</li>')
					.find('li:first').remove();
					jQuery('html, body').animate({scrollTop: 0}, 100);
			})

			.tablesorterPager(pagerOptions);

		});
	
	</script>
	

<script type="text/javascript">
	var finalRow;
	$("a.tooltipLink").tooltip();

	document.getElementById("failed").style.display='none';
	document.getElementById("success").style.display='none';
	//$(".cannot_reserve").attr('disabled','true');
	function sendRow(numrow) {
			finalRow = numrow;
			
	}
	
$(document).ready(function()
{		
		$(".rating").click( function(){
			var rating = $(this).attr('value');
			
			var materialid = $(this).closest('td').siblings('.matID').text().trim();
			var isbn = $(this).closest('td').siblings('.isbn').text().trim();
			var index = $(this).closest('div').attr('name');
			if( isbn == "---" ) isbn = "+" + materialid.trim();	

			$.ajax({
				type: "post",
				url: "<?php echo site_url();?>/borrower/insert_rating",
				data: { materialid: materialid, isbn: isbn, rating: rating },
				success: function(data){

					$("#span"+index+"").text(" Average: "+data);
				},
				error: function()
				{
					alert('Failed rating the library material.');
				}
			});
		});

//	$(".cancel_button").hide();	
	var reserved = parseInt($('#reservedCount').text());
		
	$(".reserve_button").click( function(){
		var a = $(this).val().split("|");
		var materialid = a[0];
		var requirement = a[1];
		var thisButton = $(this);
		var parent = $(this).parent().parent().parent();
		var r_queue = $.trim(parent.siblings('.queue').text());
		var sibling = parseInt(r_queue);
		var str = "Reserve " + materialid + "?";
		var req="";
		if(requirement==1)
			req = "<strong>Requirement:</strong><br/>Consent from the instructor.<br/>";
			
		bootbox.dialog({
			message: req + str,
			title: "Reserve Material",
			onEscape: function() {},
			buttons:{
				
				yes:{
					label: "Reserve",
					className: "btn-primary",
					callback: function() {
						$.ajax({
						type: "POST",
						url: "<?php echo site_url('/borrower/reserve');?>",
						data: {materialid: materialid},
						dataType: "JSON",
						success: function(data)
						{
							if(data.val == 'fail')
							{

								$("#failed").attr('class', 'alert alert-danger');
								$("#failed").fadeIn('slow');
								$("#failed").show();
								$("#failed").html("Reservation for "+materialid+" <strong>failed</strong>. You can only have atmost "+data.max+" reserved and borrowed materials.");
								document.body.scrollTop = document.documentElement.scrollTop = 0;
								setTimeout(function() { $('#failed').fadeOut('slow') }, 3000);
							}

							else
							{
								reserved = reserved+1;
								$('#reservedCount').html(reserved);
								sibling = sibling+1;
								parent.siblings('.queue').html("<center>" + sibling +" of "+sibling+ "</center>");
								
								thisButton.hide();
								thisButton.next().show();
								$("#success").html("You have successfully placed your <strong>reservation</strong> for "+materialid+".");		
								$("#success").attr('class', 'alert alert-success');
								$("#success").fadeIn('slow');
								$("#success").show();
															//$(".cancel_button")[].show();	
							document.body.scrollTop = document.documentElement.scrollTop = 0;
							setTimeout(function() { $('#success').fadeOut('slow') }, 3000);
							}

						},
						error: function()
						{
							$("#failed").attr('class', 'alert alert-danger');
							$("#failed").fadeIn('slow');
							$("#failed").show();
							$("#failed").html("Reservation for "+materialid+" <strong>failed</strong>. Please try again.");
							document.body.scrollTop = document.documentElement.scrollTop = 0;
							setTimeout(function() { $('#failed').fadeOut('slow') }, 3000);
						}
						});
					}
				},
				no: {
					label: "Cancel",
					className: "btn-default"
				}
			}
			});
	});
		

	$(".cancel_button").click( function(){
		var a = $(this).val().split("|");
		var materialid = a[0];
		var thisButton = $(this);
		var parent = $(this).parent().parent().parent();
		var r_queue = $.trim(parent.siblings('.queue').text());
		var sibling = parseInt(r_queue);
		
		bootbox.dialog({
			message: "Are you sure you want to cancel your reservation for "+ materialid+"?",
			title: "Cancel Reservation",
			buttons:{
				yes:{
					label: "Yes",
					className: "btn-primary",
					callback: function() {
						$.ajax({
							type: "POST",
							url: "<?php echo site_url('/borrower/cancel_reservation');?>",
							data: {materialid: materialid},
							success: function()
							{
								reserved = reserved-1;
								$('#reservedCount').html(reserved);
								sibling = sibling - 1;
								parent.siblings('.queue').html("<center>" + sibling + "</center>");
								thisButton.hide();
								thisButton.prev().show();
								$("#success").attr('class', 'alert alert-success');
								$("#success").fadeIn('slow');
								$("#success").show();
								$("#success").html("You have successfully <strong>cancelled</strong> your reservation for "+materialid+".");
								document.body.scrollTop = document.documentElement.scrollTop = 0;
								setTimeout(function() { $('#success').fadeOut('slow') }, 3000);	
							},
							error: function()
							{
								$("#failed").attr('class', 'alert alert-danger');
								$("#failed").fadeIn('slow');
								$("#failed").show();
								$("#failed").html("Cancellation for "+materialid+" <strong>failed</strong>. Please try again.");
								document.body.scrollTop = document.documentElement.scrollTop = 0;
								setTimeout(function() { $('#failed').fadeOut('slow') }, 3000);
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
	});
});
</script>
