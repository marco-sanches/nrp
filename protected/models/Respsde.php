<?php

/**
 * This is the model class for table "respsde".
 *
 * The followings are the available columns in table 'respsde':
 * @property string $oficio_id
 * @property string $respon_id
 * @property string $dt_inicio
 * @property string $dt_fim
 * @property string $repsde_id
 *
 * The followings are the available model relations:
 * @property Oficio $oficio
 * @property Responsavel $respon
 */
class Respsde extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'respsde';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('oficio_id, respon_id', 'length', 'max'=>20),
			array('dt_inicio, dt_fim', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('oficio_id, respon_id, dt_inicio, dt_fim, repsde_id', 'safe', 'on'=>'search'),
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
			'oficio' => array(self::BELONGS_TO, 'Oficio', 'oficio_id'),
			'respon' => array(self::BELONGS_TO, 'Responsavel', 'respon_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'oficio_id' => 'Oficio',
			'respon_id' => 'Respon',
			'dt_inicio' => 'Dt Inicio',
			'dt_fim' => 'Dt Fim',
			'repsde_id' => 'Repsde',
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
		$criteria->compare('respon_id',$this->respon_id,true);
		$criteria->compare('dt_inicio',$this->dt_inicio,true);
		$criteria->compare('dt_fim',$this->dt_fim,true);
		$criteria->compare('repsde_id',$this->repsde_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Respsde the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
