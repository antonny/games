<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */


	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
	
     public function actionAddlinen()
	{
		
		$this->render('addlinen');
		

	}
	     public function actionShowlinen()
	{
		
		$this->render('showlinen');
		

	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
  

  
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
   public function actionRegisteruser()
	{
		$model=new Register;
  
        if(isset($_POST['ajax']))
                {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }

  
		/*if(isset($_POST['ajax']) && $_POST['ajax']==='R-form')
		{
			echo CActiveRecord::validate($model);
			Yii::app()->end();
		}*/
 function make_seed()
{
  list($usec, $sec) = explode(' ', microtime());
  return (float) $sec + ((float) $usec * 100000);
}
srand(make_seed());


		
        //$this->_model=$model;
  		// collect user input data
		if(isset($_POST['Register']))
		{
             $model->attributes=$_POST['Register'];
             //print_r($_FILES['Register']['tmp_name']['photo']);exit;
             if( is_uploaded_file($_FILES['Register']['tmp_name']['photo']) )

             {   $n=explode('.',$_FILES['Register']['name']['photo']);
                 if($n[1])
                 $ext='.'.$n[1];
                 else
                 $ext='';
                 $name=rand(1,100000000).$ext;
                 move_uploaded_file($_FILES['Register']['tmp_name']['photo'],'images/'.$name);
             $model->photo=$name;
          }

             $model->salt='28b206548469ce62182048fd9cf91760';//uniqid('',true);echo uniqid('',true);exit;
             //echo $model->hashPassword('demo','28b206548469ce62182048fd9cf91760');
             if($model->validate())
             {
				  $model->password=$model->hashPassword($model->password,$model->salt);
                  $model->confirm_password='';
                 Yii::app()->user->setFlash('login','Thank you. Now you may enter the site)');
                 $model->save(false);
                 $this->redirect('index.php?r=site/login');

             }
             //$model->attributes=$_POST['Register'];
             //print_r($_FILES);
              //echo 'we';}
             //print_r($mode);
              //echo 'Thanks';
		}
		// display the login form

		$this->render('R',array('model'=>$model));
        //$this->render('contact',array('model'=>$model));
 }




     public function actionUpdateuser()
	{

         $model=Register::model()->findByPk(Yii::app()->user->id);
        //$model->findByPk(Yii::app()->user->id);
  		//collect user input data
        if(isset($_POST['Register']))
		{
             //$model->name=
             $model->attributes=$_POST['Register'];
             if( is_uploaded_file($_FILES['Register']['tmp_name']['photo']) )

             {   $n=explode('.',$_FILES['Register']['name']['photo']);
                 if($n[1])
                 $ext='.'.$n[1];
                 else
                 $ext='';
                 $name=rand(1,100000000).$ext;
                 move_uploaded_file($_FILES['Register']['tmp_name']['photo'],'images/'.$name);
             $model->photo=$name;
          }

             $model->salt='28b206548469ce62182048fd9cf91760';
             //$model->password=$model->hashPassword($model->password,$model->salt);
             $model->save();

              echo 'Thanks';
		}
		// display the login form
        $model=Register::model()->findByPk(Yii::app()->user->id);
		$this->render('U',array('model'=>$model));
        //$this->render('contact',array('model'=>$model));
 }


    public function actionshowuser()
	{

         $model=Register::model()->findByPk($_GET['id']);
        //$model->findByPk(Yii::app()->user->id);
  		//collect user input data
		$this->render('showuser',array('model'=>$model));
        //$this->render('contact',array('model'=>$model));
 }




  
  
  
  
  
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			{
					//session_start();
					$model_=Register::model()->findByPk(Yii::app()->user->id);
     // $GLOBALS['privs']=
			     //$_SESSION['privs']=$model_->privs;
				 Yii::app()->session['privs']=$model_->privs;
				$this->redirect(Yii::app()->user->returnUrl);

			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		unset(Yii::app()->session['privs']);
		$returl=Yii::app()->user->returnUrl;
		Yii::app()->user->logout();
		//$this->redirect(Yii::app()->homeUrl);
		$this->redirect($returl);
	}
}
