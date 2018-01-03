	@foreach ($historyinfo as $historyvalue)
		<?php 
			$logindate 	= date('F j Y H:m:i A', strtotime($historyvalue->logindatetime)); ?> 
			<tr>
				<input type="hidden" value="<?php echo $historyvalue->email ?>" name="email" id="email">
				<td><?php echo $historyvalue->status ?></td>
				<td><?php echo $logindate ?></td>
				<td><?php echo $historyvalue->location ?>   </td>
				<td> <?php echo $historyvalue->ipaddress ?> </td>
			</tr>
	@endforeach 
		<?php if($flag =='Yes') {?>
			<div id="loadmore" class="btn btn-grey">
					<input class="blus-btnl loadmore" id="<?php echo $historyvalue->id ?>" type="submit" value="Load More">
			</div>
 		<?php } ?>
<script>
	$('.loadmore').click(function () {
		var loadid = $(this).attr("id");
		offset = parseInt($('#openoffset').val()) + 1;
		$("#openoffset").val(offset);
		offset = parseInt($('#openoffset').val());
		email = $('#email').val();
			if(loadid) {
				$.ajax ({
					type: "POST",
					url: "myaccount/loadmore",
					data: {'offset':offset,'email':email},
					cache: false,
					success: function(html) {
						//$("#loadmore").remove(); 
						$("#openupdates").append(html);
					}
					});
			} else {
				$(".btn-grey").html('The End');
			}
			return false; 
		});
</script>

