<script type="text/javascript">
$('document').ready(function(){
	$('.clear').click(function(event){
		$('#cl').css('visibility','visible');
  return false;
	});
		$('.ok').click(function(event){
		$('#cl').css('visibility','hidden');//alert('');
		//event.stopPropagation();
		
	});
});
</script>

<style type="text/css">
.clearcart{
	width: 400px;
	height: 200px;
	border: 1px solid #00F;
	border-radius: 8px;
	visibility:hidden;
	position:fixed;
	left: 35%;
	background:#FFC;
	z-index:20;
}
</style>
<?php
if(Yii::app()->user->hasFlash('show_fabrics')){

	 echo '<div class="flash-success">'.Yii::app()->user->getFlash('show_fabrics').'</div>';
 }
?>


<?php if(!empty($_GET['tag'])): ?>
<h1>Posts Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>

<?php
Yii::app()->session['totalsum']=0;
 $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view'
));
echo 'Total price:'.Yii::app()->session['totalsum'];
unset(Yii::app()->session['totalsum']);
 ?>

<div id="cl" class="clearcart"><a class="ok" href="index.php?r=cart/Clear_cart">Clear Cart</a></div>
<a class="clear" href="">Clear Cart</a>
<a href="index.php?r=cart/OrderCart">Order</a>
