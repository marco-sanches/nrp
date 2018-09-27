<?php

/**
 * This is the model class for table "benef".
 *
 * The followings are the available columns in table 'benef':
 * @property string $nb
 * @property integer $esp_id
 * @property string $dii
 * @property string $cid_id
 *
 * The followings are the available model relations:
 * @property Esp $esp
 * @property Cid $cid
 * @property Dcb[] $dcbs
 * @property Pront[] $pronts
 */
class Benef extends CActiveRecord
{

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'benef';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nb, cid_id, dii', 'required'),
			array('esp_id', 'numerical', 'integerOnly' => true),
			array('nb, cid_id', 'length', 'max' => 20),
			array('dii', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nb, esp_id, dii, cid_id', 'safe', 'on' => 'search'),
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
			'esp' => array(self::BELONGS_TO, 'Esp', 'esp_id'),
			'cid' => array(self::BELONGS_TO, 'Cid', 'cid_id'),
			'dcbs' => array(self::HAS_MANY, 'Dcb', 'nb'),
			'pronts' => array(self::HAS_MANY, 'Pront', 'nb'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nb' => 'Benefício',
			'esp_id' => 'Espécie',
			'dii' => 'Início da incapacidade',
			'cid_id' => 'Cid-10',
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

		$criteria->compare('nb', $this->nb, true);
		$criteria->compare('esp_id', $this->esp_id);
		$criteria->compare('dii', $this->dii, true);
		$criteria->compare('cid_id', $this->cid_id, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Benef the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
	{
		$diiArray=explode('/', $this->dii);
		$this->dii=$diiArray[2] . '-' . $diiArray[1] . '-' . $diiArray[0];

		$source=array('.', '-');
		$replace=array('', '');
		$valor=str_replace($source, $replace, $this->nb);
		$this->nb=trim($valor);

		return parent::beforeSave();
	}

	public function afterFind()
	{
		$this->dii=Yii::app()->dateFormatter->format('dd/MM/yyyy', $this->dii);
		$this->nb=substr($this->nb, -10, -7) . '.' . substr($this->nb, -7, -4) . '.' . substr($this->nb, -4, -1) . '-' . substr($this->nb, -1);
		return parent::afterFind();
	}
}