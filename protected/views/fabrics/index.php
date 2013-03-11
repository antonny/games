<?php
if(Yii::app()->user->hasFlash('show_fabrics')){

	 echo '<div class="flash-success">'.Yii::app()->user->getFlash('show_fabrics').'</div>';
 }
?>

 <script type="text/javascript">

$(document).ready(function() {


    $('.mycarousel').jcarousel();
    $(".mycarousel a").fancybox();

});


</script>
<?php
        $connection=Yii::app()->db;
      $command=$connection->createCommand('select img from tkan');
      $dataReader=$command->query();
      $str='';
      foreach($dataReader as $row)
      {$str.='<li><a href="images/'.$row['img'].'"><img src="images/'.$row['img'].'" height="100px"></a></li>';}
      if($str!='')
      echo '<br><ul class="jcarousel-skin-tango mycarousel">'.$str.'</ul>';
        ?>
<?php if(!empty($_GET['tag'])): ?>
<h1>Posts Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'summaryText'=>'Fabrics {start}-{end} of {count}',
)); ?>
