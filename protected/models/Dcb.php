<?php

/**
 * This is the model class for table "dcb".
 *
 * The followings are the available columns in table 'dcb':
 * @property string $ordem
 * @property string $nb
 * @property string $dcb
 *
 * The followings are the available model relations:
 * @property Benef $nb0
 */
class Dcb extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dcb';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nb', 'length', 'max'=>20),
			array('dcb', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ordem, nb, dcb', 'safe', 'on'=>'search'),
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
			'nb0' => array(self::BELONGS_TO, 'Benef', 'nb'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ordem' => 'Ordem',
			'nb' => 'Nb',
			'dcb' => 'Dcb',
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

		$criteria->compare('ordem',$this->ordem,true);
		$criteria->compare('nb',$this->nb,true);
		$criteria->compare('dcb',$this->dcb,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dcb the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
