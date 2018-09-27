<?php

/**
 * This is the model class for table "oficio".
 *
 * The followings are the available columns in table 'oficio':
 * @property string $oficio_id
 * @property string $emp_id
 * @property string $dt_enc
 * @property string $n_oficio
 * @property string $dt_respos
 *
 * The followings are the available model relations:
 * @property Emp $emp
 * @property Respsde[] $respsdes
 */
class Oficio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'oficio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emp_id', 'length', 'max'=>20),
			array('n_oficio', 'length', 'max'=>8),
			array('dt_enc, dt_respos', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('oficio_id, emp_id, dt_enc, n_oficio, dt_respos', 'safe', 'on'=>'search'),
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
			'emp' => array(self::BELONGS_TO, 'Emp', 'emp_id'),
			'respsdes' => array(self::HAS_MANY, 'Respsde', 'oficio_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'oficio_id' => 'Oficio',
			'emp_id' => 'Emp',
			'dt_enc' => 'Dt Enc',
			'n_oficio' => 'N Oficio',
			'dt_respos' => 'Dt Respos',
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

		$criteria->compare('oficio_id',$this->oficio_id,true);
		$criteria->compare('emp_id',$this->emp_id,true);
		$criteria->compare('dt_enc',$this->dt_enc,true);
		$criteria->compare('n_oficio',$this->n_oficio,true);
		$criteria->compare('dt_respos',$this->dt_respos,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Oficio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
