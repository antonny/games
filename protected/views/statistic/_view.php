<?php
/* @var $this StatisticController */

$this->breadcrumbs=array(
	'Statistic'=>array('/statistic'),
	'Show',
);
?>
<p><?php echo '<a href="?r=statistic/show&type=showuser&id='.$data->user_id.'">'.$data->user->name.'</a>;'.$data->action.'Date:'.$data->date_action; ?></p>