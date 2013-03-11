<script type="text/javascript">
$(document).ready(function(){
$('.del').click(function(){
	x=confirm('хотите удалить данные?');
	if (x==false)
	return false;
});
});
</script>

<script type='text/javascript'>
$('document').ready(function(){
	$('.addtocart').click(function(){
		$('#accart').css('visibility','visible');
	});
		$('.ok').click(function(){
		$('#accart').css('visibility','hidden');
	});
});
</script>

<style type="text/css">
.div2{
	width: 400px;
	height: 200px;
	border: 1px solid #00F;
	border-radius: 8px;
	visibility:hidden;
	position:fixed;
	left: 35%;
	background:#FFC;
}
</style>

<div class="post">
	<div class="title">
		<?php echo '<a href="index.php?r=fabrics/show_fabric&id='.$data->id.'"><img src="/linenstore/images/'.$data->img.'" style="float:left"></a>';?>
		<?php echo 'Name:'.($data->name); ?><br>
		<?php echo'Color:'.($data->color); ?><br>
		<?php echo'Price:'.($data->price).'$'; ?><br>
		<?php echo'Width:'.($data->width); ?><br>
		<?php echo'Length:'.($data->length); ?><br>
        <?php echo 'Type:'.$data->locationID->name; ?><br>
         <?php if(!Yii::app()->user->isGuest) {
			 
			 
			
echo CHtml::ajaxLink(

    "<img src='images/addcart.jpg' class='addtocart'>",
    Yii::app()->createUrl( '/Fabrics/cart_fabric' ),

    array(

    'type' => 'GET',
    'data' => array( 'id' => $data->id ), // посылаем значения
    'cache'=>'false' // если нужно можно закешировать
  )
);
			 
		 }
?>			
<div id="accart" class="div2">
<?php if(!Yii::app()->user->isGuest) {echo'<a class="" href="index.php?r=cart/show_cart">
<img style="position:absolute;left:200px;top:80px;" src="images/addcart.jpg"></a>
<img style="position:absolute;left:80px;top:80px;" class="ok" src="images/proceed.jpg">';}?>
</div><br />
        <?php if((!Yii::app()->user->isGuest)&&($GLOBALS['privs']==2)) {echo'<a class="del" href="index.php?r=Fabrics/del_fabric&id='.$data->id.'">Del fabric</a>';}?><br>
        <?php if((!Yii::app()->user->isGuest)&&($GLOBALS['privs']==2)){echo'<a class="update" href="index.php?r=Fabrics/update_fabric&id='.$data->id.'">Update fabric</a>';} ?><br>
	</div>
<hr />
</div>
