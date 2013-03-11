<script type="text/javascript">
$(document).ready(function(){
$('.del').click(function(){
	x=confirm('хотите удалить данные?');
	if (x==false)
	return false;
});
});
</script>
<div class="post">
	<div class="title">
    <div style='float:right'><?php echo  $data->tn->price*$data->amount; Yii::app()->session['totalsum']+=$data->tn->price*$data->amount;?></div>
		<?php echo 'Amount:'.($data->amount).'<a href="index.php?r=cart/Del_from_cart&id='.$data->tn->id.'">Count down</a>'; ?><br>
        <?php echo 'Name:'.($data->tn->name); ?><br>
        
		</div>
<hr />
</div>

