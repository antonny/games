<?php

/**
 * This is the model class for table "fabric".
 *
 * The followings are the available columns in table 'fabric':
 * @property integer $id
 * @property string $name
 * @property string $info
 * @property double $width
 * @property double $length
 * @property string $img
 * @property double $price
 * @property integer $type
 * @property string $color
 */
class fabric extends CActiveRecord 
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return fabric the static model class
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
		return '{{tkan}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, width, price,tkantype,length', 'required'),
			array('width', 'numerical','min'=>0.5),
			array('length', 'numerical','min'=>0.5),
			array('price', 'match', 'pattern'=>'/^\d{1,}[\.,]{0,1}(\d{2}){0,1}$/'),
			array('color', 'match', 'pattern'=>'/^[A-Za-z]{3,}$/','message'=>'Minimum 3 latin charecters'),
			array('name', 'match', 'pattern'=>'/^[A-Z][a-z]{1,}$/','message'=>'Minimum 2 latin charecters'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('color', 'safe')
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
// class name for the relations automatically generated below.
		return array(
			'locationID' => array(self::BELONGS_TO, 'FabricType', 'tkantype'),
			//'comments' => array(self::HAS_MANY, 'comment', 'type', 'condition'=>'comment.state=1', 'order'=>'comment.date_add DESC'),
			'comments' => array(self::HAS_MANY, 'comment', 'type'),
		'commentCount' => array(self::STAT, 'comment', 'id'),
   );

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'info' => 'Info',
			'width' => 'Width',
			'length' => 'Length',
			'img' => 'Img',
			'price' => 'Price',
			'tkantype' => 'Type',
			'color' => 'Color',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */

}
