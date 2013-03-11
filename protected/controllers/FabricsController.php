<?php

class FabricsController extends Controller
{

	public function actionShow_fabric_by_type()
	{
		$criteria=new CDbCriteria(array(
			'condition'=>'tkantype='.$_GET['type'],
		));
	
		$dataProvider=new CActiveDataProvider('fabric', array(
			'pagination'=>array(
				'pageSize'=>10,
			),
			'criteria'=>$criteria,
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	
	     public function actionsearch()
	{
		$criteria=new CDbCriteria(array(
			'condition'=>'name regexp "'.$_GET['q'].'"',
		));
	
		$dataProvider=new CActiveDataProvider('fabric', array(
			'pagination'=>array(
				'pageSize'=>10,
			),
			'criteria'=>$criteria,
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));

	}
	
	
	public function actionAdd_fabric()
	{
 function make_seed()
{
  list($usec, $sec) = explode(' ', microtime());
  return (float) $sec + ((float) $usec * 100000);
}
srand(make_seed());		
		
		$model=new fabric;
		if(isset($_POST['fabric']))
		{
			$model->attributes=$_POST['fabric'];
			//echo $_FILES['fabric']['tmp_name']['img'].'jijij';
			 if( is_uploaded_file($_FILES['fabric']['tmp_name']['img']) )
             
             {   $n=explode('.',$_FILES['fabric']['name']['img']);
                 if($n[1])
                 $ext='.'.$n[1];
                 else
                 $ext='';
                 $name=rand(1,100000000).$ext;
                 move_uploaded_file($_FILES['fabric']['tmp_name']['img'],'images/'.$name);
             $model->img=$name;
          }
			
			
			if($model->save()){
			Yii::app()->user->setFlash('show_fabrics','Thank you.');
				$this->redirect(array('show_fabrics','id'=>$model->id));}
		}

		$this->render('add_fabric',array(
			'model'=>$model,
		));
		
		
		
		
		
		
		$this->render('add_fabric');
	}

	public function actionDel_fabric()
	{
		//$this->render('del_fabric');
		 $connection=Yii::app()->db;
        $command=$connection->createCommand('delete from tkan where id='.$_GET['id']);
         $dataReader=$command->query();
		$this->redirect('index.php?r=fabrics/show_fabrics');
		
	}
	

public function actionshow_fabric()
	{
            $model=fabric::model()->findByPk($_GET['id']);
	$this->render('showfabric',array('model'=>$model));
	//$this->returnUrl=array('fabrics/show_fabric&id='.$_GET['id']);
	Yii::app()->user->setReturnUrl($_SERVER['REQUEST_URI']);
	}	
	
public function actionshow_fabrics()
	{
              /*
              if(!Yii::app()->user->isGuest)
      {
      $model_=Register::model()->findByPk(Yii::app()->user->id);
      $GLOBALS['privs']=$model_->privs;
      }
	  */

		$criteria=new CDbCriteria(array(
			'order'=>'id DESC'
		));
	
		$dataProvider=new CActiveDataProvider('fabric', array(
			'pagination'=>array(
				'pageSize'=>10,
			),
			'criteria'=>$criteria,
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		
		
		//$this->render('show_fabrics');
	}
	public function actioncart_fabric()
	{
		//$this->render('move_fabric');
		 $model_=Cart::model()->findByPk(Array('id'=>Yii::app()->user->id,'tkan_id'=>$_GET['id']));
		 //print_r($model_);exit;
		 //if(!)
		 //$r=fopen('1.txt','w');
		 //fwrite($r,$model_);
		 if(!$model_)
		 {
		$Cart=new Cart;
		$Cart->id=Yii::app()->user->id;
		$Cart->tkan_id=$_GET['id'];
		$Cart->amount=1;
		$Cart->save();
		 }
		 else
		 {
		
		$model_->id=Yii::app()->user->id;
		$model_->tkan_id=$_GET['id'];
		$model_->amount=$model_->amount+1;
		$model_->save();
			 }
		$this->redirect('index.php?r=cart/show_cart');
	}

	public function actionUpdate_fabric()
	{
		       
		
		 function make_seed()
{
  list($usec, $sec) = explode(' ', microtime());
  return (float) $sec + ((float) $usec * 100000);
}
srand(make_seed());		
		
		$model=fabric::model()->findByPk($_GET['id']);
		if(isset($_POST['fabric']))
		{
			$model->attributes=$_POST['fabric'];
			//echo $_FILES['fabric']['tmp_name']['img'].'jijij';
			 if( is_uploaded_file($_FILES['fabric']['tmp_name']['img']) )
             
             {   $n=explode('.',$_FILES['fabric']['name']['img']);
                 if($n[1])
                 $ext='.'.$n[1];
                 else
                 $ext='';
                 $name=rand(1,100000000).$ext;
                 move_uploaded_file($_FILES['fabric']['tmp_name']['img'],'images/'.$name);
             $model->img=$name;
          }
			
			
			if($model->save(true)){
			Yii::app()->user->setFlash('show_fabrics','Thank you.');
		    $this->redirect(array('show_fabrics','id'=>$model->id));
				
		}}
else
{
	 $model=fabric::model()->findByPk($_GET['id']);
	$this->render('update_fabric',array('model'=>$model));
	}

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

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
