 <script type="text/javascript">

jQuery(document).ready(function() {


    jQuery('#mycarousel').jcarousel();
    $("#mycarousel a").fancybox();

});


</script>

 <div class="row">
		<?php echo $model->name.' '.$model->fname.' '.$model->sname.'<br>'; 
echo '<img border="0" src="/tennis/images/'.$model->photo.'">';
 ?>


		</div>
   <div class="row">
   ATP-рейтинг: <?php echo $model->atp_rate; ?><br>
   Email: <?php echo $model->email; ?>
        <?php
         $connection=Yii::app()->db;
      $command=$connection->createCommand('select image from tbl_images where author_id='.$_GET['id']);
      $dataReader=$command->query();
      $str='';
      foreach($dataReader as $row)
      {$str.='<li><a href="images/'.$row['image'].'"><img src="images/'.$row['image'].'" height="100px"></a></li>';}
      if($str!='')
      echo '<br><ul id="mycarousel" class="jcarousel-skin-tango">'.$str.'</ul>';
        ?>
  </div>

<!-- form -->
