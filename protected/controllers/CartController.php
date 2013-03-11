<?php

class CartController extends Controller
{
	public function actionClear_cart()
	{

		 $connection=Yii::app()->db;
        $command=$connection->createCommand('insert into stat values ("",'.Yii::app()->user->id.',"clear cart",NOW())');
         $dataReader=$command->query();
		$criteria = new CDbCriteria;  
$criteria->condition ='id = '.Yii::app()->user->id;

		$model_=Cart::model()->find($criteria);
		 if($model_)$model_->deleteAll();
		$this->redirect('index.php?r=cart/show_cart');	
		
	}
	
		public function actionDel_from_cart()
	{
		
		 $model_=Cart::model()->findByPk(Array('id'=>Yii::app()->user->id,'tkan_id'=>$_GET['id']));
		 //print_r($model_);exit;
		 //if(!)
		 //$r=fopen('1.txt','w');
		 //fwrite($r,$model_);

		if($model_->amount>1)
		{
		$model_->amount=$model_->amount-1;
		$model_->save();
		}
		else
		$model_->delete();
	$this->redirect('index.php?r=cart/show_cart');	
		
	}

	public function actionExe_cart()
	{
		$this->render('exe_cart');
	}

	public function actionShow_cart()
	{
		$criteria=new CDbCriteria(array(
			'condition'=>'id='.Yii::app()->user->id,
		));
	
		$dataProvider=new CActiveDataProvider('cart', array(
			'pagination'=>array(
				'pageSize'=>10,
			),
			'criteria'=>$criteria,
		));

		$this->render('index',array(
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

	public function actionOrderCart()
	{
		 $connection=Yii::app()->db;
		//$this->render('del_fabric');
      $command=$connection->createCommand("SELECT cart.tkan_id,cart.amount,tkan.name FROM cart,tkan where cart.id=".Yii::app()->user->id.' and cart.tkan_id=tkan.id');
      $dataReader=$command->query();
      $str='<table>';
      foreach($dataReader as $row)
      {$str.='<tr><td>'.$row['name'].'</td><td>'.$row['amount'].'</td></tr>';}
	 $str.='</table>';	
		
		
        $command=$connection->createCommand('insert into orders values ("",'.Yii::app()->user->id.',"'.$str.'",NOW())');
         $dataReader=$command->query();
		 
		 
		 
		$this->redirect('index.php?r=cart/Clear_cart');
	}

}