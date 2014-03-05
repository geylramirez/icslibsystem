<!--

	SHOWS THE TABLE OF A USER'S CURRENTLY RESERVED BOOKS
	
-->

<table class="table table-hover" summary="Results" border="1" cellspacing="5" cellpadding="5">
	<thead>
		<tr>
			<th width="5%" abbr="ISBN" scope="col" title="ISBN/ISSN">ISBN/ISSN</th>
			<th width="12%" abbr="lmID" scope="col" title="Library Material ID">Library Material ID</th>
			<th width="5%" abbr="Type" scope="col" title="Type">Type</th>
			<th width="70%" abbr="CourseClassification" scope="col" title="Description">Description</th>
			<th width="7%" abbr="Queue" scope="col" title="Queue">Rank</th>
			<th width="5%" abbr="Action" scope="col" title="Action">Action</th>
		</tr>
	</thead>
										
	<?php
		if($list!=NULL && $rank!=NULL && $total!=NULL){
			foreach($reserved as $row){
				echo "<form method ='post'>";
				echo "<tr>";
				echo "<td>";
					$tmp = $row['isbn'];
					if (preg_match('/^[+]/', $tmp)) {
						echo "---";
					} else {
						echo "${row['isbn']}";
					}
				echo "</td>";
				echo "<td> ${row['materialid']} </td>";
				echo "<td>";
					if($row['type']== 'Book')
						$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='Book'><span class='glyphicon glyphicon-book'></span></a>";
					else if($row['type'] == 'CD')
						$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='CD'><span class='glyphicon glyphicon-headphones'></span></a>";
					else if($row['type'] == 'SP')
						$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='SP'><span class='glyphicon glyphicon-file'></span></a>";
					else if($row['type'] == 'Reference')
						$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='Reference'><span class='glyphicon glyphicon-paperclip'></span></a>";
					else if($row['type']== 'Journals')
						$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='Journal'><span class='glyphicon glyphicon-pencil'></span></a>";
					else if($row['type']== 'Magazines')
						$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='Magazine'><span class='glyphicon glyphicon-picture'></span></a>";
					else if($row['type'] == 'Thesis')
						$type = "<a data-toggle='tooltip' class='tooltipLink' data-original-title='Thesis'><span class='glyphicon glyphicon-bookmark'></span></a>";
											
				echo "$type";
				echo "</td>";
				echo "<td> <b>${row['name']}</b>
					 <br/>${row['authorname']}. 
					  ${row['year']}
					  </td>";
				foreach($rank as $q_rank){
							
				if($q_rank['materialid']==$row['materialid']){
					$rrank=$q_rank['queue'];
					}
				}
				foreach($total as $t_queue){
				if($t_queue['materialid']==$row['materialid']){
					 $t_q=$t_queue['tq'];
				}
				}
				  echo "<td> $rrank of $t_q </td>";
				  echo "<td><button type=\"submit\" class=\"cancel_reservation btn btn-danger\" data-dismiss=\"modal\" name = 'materialid' value='${row['materialid']}'>CANCEL</button>" . "</td>";
				  echo "</form>";
				  echo "</tr>";
			  }
		}
	?>			  
</table>

<script src="<?php echo base_url();?>dist/js/jquery-2.1.0.min.js"></script>
<script src="<?php echo base_url();?>dist/js/bootbox.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>dist/js/jquery.tablesorter.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>dist/js/jquery.tablesorter.pager.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>dist/js/jquery.tablesorter.widgets.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>dist/js/widget-pager.js"></script>



<script id="js">
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
				document.body.scrollTop = document.documentElement.scrollTop = 0;
			})

			.tablesorterPager(pagerOptions);
	</script>

<script type="text/javascript">
	$(document).ready(function()
	{
		$('.cancel_reservation').on('click', function(){
			if(confirm('Are you sure?'))
			{
				materialid = $(this).val();
					$.ajax({
  						type: "POST",
  						url: "<?php echo site_url('borrower/cancel_reservation');?>",
  						data: {materialid: materialid},
  						success: function(data)
  						{
  							alert('You have successfully cancelled the item');
  							location.reload();
  						},
  						error: function()
  						{
  							alert('Cancel failed. Try again.');
  						}
  					});
			}	

			else
			{

			}

		});
	});


</script>
