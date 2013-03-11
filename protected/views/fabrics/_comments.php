
<?php foreach($comments as $comment):
if(($comment->state==0)&&(Yii::app()->session['privs']!=2)) continue;
 ?>
<div class="comment">
	<div class="author">
		<?php echo $comment->date_add; ?>
	</div>
    	<div class="author">
		<?php echo $comment->author->name; ?> says:
	</div>
	<div class="author">
		<?php echo $comment->txt; ?>
	</div>
    <div class="author">
		<?php if((!Yii::app()->user->isGuest)&&(Yii::app()->session['privs'])) {echo '<a href="index.php?r=comment/del_comment&id='.$comment->id.'">Delete</a> <a href="index.php?r=comment/edit_comment&id='.$comment->id.'">Edit</a> <a href="index.php?r=comment/proof_comment&id='.$comment->id.'">Proof</a>';} ?>
	</div>
    

</div><!-- comment -->
<?php endforeach; ?>