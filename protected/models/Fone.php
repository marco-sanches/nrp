<?php

/**
 * This is the model class for table "fone".
 *
 * The followings are the available columns in table 'fone':
 * @property string $fone_id
 * @property string $seg_id
 * @property string $numero
 *
 * The followings are the available model relations:
 * @property Seg $seg
 */
class Fone extends CActiveRecord
{
	public $fone0, $fone1, $fone2, $fone0_id, $fone1_id, $fone2_id;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fone';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('numero', 'required'),
			array('seg_id', 'length', 'max' => 20),
			array('numero', 'length', 'max' => 11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('fone_id, seg_id, numero', 'safe', 'on' => 'search'),
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
			'seg' => array(self::BELONGS_TO, 'Seg', 'seg_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fone_id' => 'Fone',
			'fone0' => 'Telefone 1',
			'fone1' => 'Telefone 2',
			'fone2' => 'Telefone 3',
			'seg_id' => 'Seg',
			'numero' => 'Numero',
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

		$criteria->compare('fone_id', $this->fone_id, true);
		$criteria->compare('seg_id', $this->seg_id, true);
		$criteria->compare('numero', $this->numero, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Fone the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getFones($seg_id)
	{
		$query=new CDbCriteria;
		$query->select='fone_id, numero';
		$query->condition='seg_id = :id';
		$query->params=array(':id' => $seg_id);
		$query->order='fone_id ASC';
		$query->limit='3';
		$rows=$this->findAll($query);
		$dados=array();
		$i=0;
		foreach($rows as $fone) {
			$dados[$i]=$fone->numero;
			$i++;
		}
		$numeros=implode(' - ', $dados);
		return $numeros;
	}

	public function afterFind()
	{
		if(strlen(trim($this->numero)) == 10) {
			$this->numero='(' . substr(trim($this->numero), 0, 2) . ')' . substr(trim($this->numero), 2, 4) . ' ' . substr(trim($this->numero), 6, 4);
		}
		elseif(strlen(trim($this->numero)) == 11) {
			$this->numero='(' . substr(trim($this->numero), 0, 2) . ')' . substr(trim($this->numero), 2, 5) . ' ' . substr(trim($this->numero), 7, 4);
		}
		return parent::afterFind();
	}
}