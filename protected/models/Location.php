<?php

class Location extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_player':
	 * @var integer $id
	 * @var string $title
	 * @var string $content
	 * @var string $tags
	 * @var integer $status
	 * @var integer $create_time
	 * @var integer $update_time
	 * @var integer $author_id
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
		return 'tbl_location';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city,address,courts,phone,site', 'required'),
		);
	}
     	 	/**
	 * @return array relational rules.
	 */

    public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			//'sparLocs' => array(self::HAS_MANY, 'sparring', 'location'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'id',
			'city' => 'Город',
			'address' => 'Адрес',
			'courts' => 'Количество кортов',
            'phone' => 'Телефон',
            'site' => 'Web-сайт',
		);
	}

	/**
	 * @return string the URL that shows the detail of the player
	 */


	/**
	 * Adds a new comment to this player.
	 * This method will set status and player_id of the comment accordingly.
	 * @param Comment the comment to be added
	 * @return boolean whether the comment is saved successfully
	 */


	/**
	 * This is invoked when a record is populated with data from a find() call.
	 */


	/**
	 * This is invoked before the record is saved.
	 * @return boolean whether the record should be saved.
	 */

	/**
	 * This is invoked after the record is saved.
	 */


	/**
	 * This is invoked after the record is deleted.
	 */


	/**
	 * Retrieves the list of players based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the needed players.
	 */
  protected function beforeSave()
	{
		if(parent::beforeSave())
		{


				//$this->author_id=Yii::app()->user->id;


			return true;
		}
	}

	/**
	 * This is invoked after the record is saved.
	 */
	protected function afterSave()
	{
		parent::afterSave();
		//Tag::model()->updateFrequency($this->_oldTags, $this->tags);

        ///print_r($this);
	}
  

}
