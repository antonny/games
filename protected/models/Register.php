<?php

class Register extends CActiveRecord
{
    	private $_identity;
	/**
	 * The followings are the available columns in table 'tbl_user':
	 * @var integer $id
	 * @var string $username
	 * @var string $password
	 * @var string $salt
	 * @var string $email
	 * @var string $profile
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('username', 'checkexist'),
            array('username, password, salt,sname,name,fname,email', 'required'),
			array('username, password, salt, email', 'length', 'max'=>128),
			array('password', 'match','pattern'=>'/^\w{6,20}$/','message'=>'please, fill this field with  at least 6 latin charecters and digits, at most 20'),
			array('confirm_password','compare','compareAttribute'=>'password'),

			//array('id,email,username,password,privs', 'safe'),
			array('email','email'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * @return array relational rules.
	 */

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'username' => 'username',
			'password' => 'password',
			'confirm_password' => 'confirm password',
            'name'=>'name',
            'fname'=>'fname',
            'sname'=>'sname',
            'privs'=>'privs',
     		'photo' => 'photo',
			'salt' => 'Salt',
			'email' => 'Email',
			'verifyCode'=>'Verification Code',
		);
	}



	/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
        //$this->salt
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @param string salt
	 * @return string hash
	 */
	 public function checkexist($attribute,$params)
	{
       $connection=Yii::app()->db;
      $command=$connection->createCommand("SELECT * from tbl_user where username='".$this->username."'");
      $dataReader=$command->query();
      $isreg=0;
      foreach($dataReader as $row)
      {$isreg=1;}
			if($isreg==1)
			$this->addError('username','This username is already registered.');
			
			//$this->addError('username',"Error");
	}
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}

	/**
	 * Generates a salt that can be used to generate a password hash.
	 * @return string the salt
	 */
	public function generateSalt()
	{
		return uniqid('',true);
	}
 	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}

			Yii::app()->user->login($this->_identity,3600*24*30);
			return true;


	}
}
