<?php

class CommentController extends Controller
{
	public function actionAdd_comment()
	{
		//$this->render('add_comment');
		//echo 'iyg';
		//print_r($_POST['comment']);
		$model=new Comment;
		$model->attributes=$_POST['comment'];
		//$model->txt=$_POST['Comment']['txt'];
		//$model->type=$_POST['Comment']['type'];
		$model->date_add=date("Y:m:d H:i:s");
		$model->author_id=Yii::app()->user->id;
		$model->state=0;
		$model->save();
		$this->redirect('?r=fabrics/show_fabric&id='.$model->type);
		
	}

	public function actionDel_comment()
	{
		//$this->render('del_comment');
		//echo 'gf';
		 $model=comment::model()->findByPk($_GET['id']);
		  $model->delete();
		  Yii::app()->request->redirect(Yii::app()->user->returnUrl);
	}

	public function actionEdit_comment()
	{
		//$this->render('edit_comment');
		  $model=comment::model()->findByPk($_GET['id']);
		if(isset($_POST['comment']))
		{
			//$model=new comment;
			$model->attributes=$_POST['comment'];
			//echo $_FILES['fabric']['tmp_name']['img'].'jijij';
			
			
			
			if($model->save()){
				Yii::app()->request->redirect(Yii::app()->user->returnUrl);}
		}

		 
		 
		 
		
		 
		 
		 
		 
		 
		 
		 
		 //if(isset)
		  //$model->;
		  $this->render('edit_comment',array('model'=>$model));
		  //Yii::app()->request->redirect(Yii::app()->user->returnUrl);
	}

	public function actionProof_comment()
	{
		//$this->render('proof_comment');
		 $model=comment::model()->findByPk($_GET['id']);
		 $model->state=2;
		 if($model->save()){
				Yii::app()->request->redirect(Yii::app()->user->returnUrl);}
		
		
	}

	public function actionRate_comment()
	{
		$this->render('rate_comment');
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