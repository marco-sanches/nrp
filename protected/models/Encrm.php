<?php

/**
 * This is the model class for table "encrm".
 *
 * The followings are the available columns in table 'encrm':
 * @property integer $encerr_id
 * @property string $codigo
 * @property string $descr_encrm
 *
 * The followings are the available model relations:
 * @property Pront[] $pronts
 */
class Encrm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'encrm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo, descr_encrm', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('encerr_id, codigo, descr_encrm', 'safe', 'on'=>'search'),
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
			'pronts' => array(self::HAS_MANY, 'Pront', 'encerr_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'encerr_id' => 'Encerr',
			'codigo' => 'Codigo',
			'descr_encrm' => 'Descr Encrm',
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

		$criteria->compare('encerr_id',$this->encerr_id);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('descr_encrm',$this->descr_encrm,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Encrm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
