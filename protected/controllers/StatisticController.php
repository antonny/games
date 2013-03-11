<?php

class StatisticController extends Controller
{
		public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	
	
   	public function accessRules()
	{
		return array(

			array('allow', // allow authenticated users to access all actions
			     'actions'=>array('show'),
				'users'=>array('@'),
				'expression' => 'Yii::app()->user->isAdmin', // And must be admin
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	public function actionShow()
	{
		if(isset($_GET['type'])&&($_GET['type']=='showuser'))
		{
					$criteria=new CDbCriteria(array(
			'order'=>'id DESC',
			'condition'=>'user_id='.$_GET['id'],
		));
			}
		else
		$criteria=new CDbCriteria(array(
			'order'=>'id DESC'
		));
	
		$dataProvider=new CActiveDataProvider('stat', array(
			'pagination'=>array(
				'pageSize'=>10,
			),
			'criteria'=>$criteria,
		));

		$this->render('show',array(
			'dataProvider'=>$dataProvider,
		));
	
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}