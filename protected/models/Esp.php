<?php

/**
 * This is the model class for table "esp".
 *
 * The followings are the available columns in table 'esp':
 * @property integer $esp_id
 * @property string $desc_esp
 *
 * The followings are the available model relations:
 * @property Benef[] $benefs
 */
class Esp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'esp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('esp_id', 'numerical', 'integerOnly'=>true),
			array('desc_esp', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('esp_id, desc_esp', 'safe', 'on'=>'search'),
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
			'benefs' => array(self::HAS_MANY, 'Benef', 'esp_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'esp_id' => 'Esp',
			'desc_esp' => 'Desc Esp',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('esp_id',$this->esp_id);
		$criteria->compare('desc_esp',$this->desc_esp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Esp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function espReab()
        {
            $query = new CDbCriteria;
            $query->select = '*';
            $query->addInCondition('esp_id', array(31,32,36,91,94));
            $result=$this->findAll($query);
            return $result;
        }
}
