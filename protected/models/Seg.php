<?php

/**
 * This is the model class for table "seg".
 *
 * The followings are the available columns in table 'seg':
 * @property string $id
 * @property string $nome
 * @property string $doc
 * @property string $empresa
 * @property string $fone
 * @property string $dn
 * @property integer $escol_id
 * @property string $prof_id
 * @property string $emp_id
 * @property integer $sex
 * @property integer $renda
 * @property integer $munic_id
 *
 * The followings are the available model relations:
 * @property Fone[] $fones
 * @property Pront[] $pronts
 * @property Escol $escol
 * @property Prof $prof
 * @property Emp $emp
 * @property Munic $munic
 */
class Seg extends CActiveRecord
{
	protected $maxId;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'seg';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('doc, nome,munic_id, prof_id, emp_id, dn, escol_id, sex', 'required'),
			array('escol_id, sex, munic_id', 'numerical', 'integerOnly' => true),
			array('id, prof_id, emp_id', 'length', 'max' => 20),
			array('nome', 'length', 'max' => 100),
			array('doc, fone', 'length', 'max' => 14),
			array('empresa', 'length', 'max' => 200),
			array('dn, renda', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, doc, empresa, fone, dn, escol_id, prof_id, emp_id, sex, renda, munic_id', 'safe', 'on' => 'search'),
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
			'fones' => array(self::HAS_MANY, 'Fone', 'seg_id'),
			'pronts' => array(self::HAS_MANY, 'Pront', 'seg_id'),
			'escol' => array(self::BELONGS_TO, 'Escol', 'escol_id'),
			'prof' => array(self::BELONGS_TO, 'Prof', 'prof_id'),
			'emp' => array(self::BELONGS_TO, 'Emp', 'emp_id'),
			'munic' => array(self::BELONGS_TO, 'Munic', 'munic_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'doc' => 'N.I.T.',
			'empresa' => 'Empresa',
			'fone' => 'Telefones',
			'dn' => 'Data de nascimento',
			'escol_id' => 'escol_id',
			'prof_id' => 'Prof',
			'emp_id' => 'Emp',
			'sex' => 'Sexo',
			'renda' => 'Renda',
			'munic_id' => 'Municípío',
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

		$criteria->together=true;    //Together adicionado para fazer a junção das tabelas na pesquisa 
		$criteria->with=array('pronts');
		$criteria->compare('id', $this->id, true);
		$criteria->compare('nome', $this->nome, true);
		$criteria->compare('doc', $this->doc, true);
		$criteria->compare('empresa', $this->empresa, true);
		$criteria->compare('fone', $this->fone, true);
		$criteria->compare('dn', $this->dn, true);
		$criteria->compare('escol_id', $this->escol_id);
		$criteria->compare('prof_id', $this->prof_id, true);
		$criteria->compare('emp_id', $this->emp_id, true);
		$criteria->compare('sex', $this->sex);
		$criteria->compare('renda', $this->renda);
		$criteria->compare('munic_id', $this->munic_id);
		$criteria->compare('pronts.seg_id', $this->pronts);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Seg the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function newIdSeg()
	{
		/* Lê o último id na tabela e o incrementa */
		$query=new CDbCriteria;
		$query->select='max(id) as maxId';
		$row=$this->find($query);
		$newId=(int) $row['maxId'];
		$newId++;
		return $newId;
	}

	public function beforeSave()
	{
		$dnArray=explode('/', $this->dn);
		$this->dn=$dnArray[2] . '-' . $dnArray[1] . '-' . $dnArray[0]; //formata a data para o armazenamento            
		$source=array('.', ',');
		$replace=array('', '.');
		$valor=trim(str_replace($source, $replace, $this->renda)); //formata a renda para o armazenamento
		$this->renda=$valor;
		$this->doc=substr($this->doc, 0, 3) . substr($this->doc, 4, 5) . substr($this->doc, 10, 2) . substr($this->doc, 13, 1);

		return parent::beforeSave();
	}

	public function afterFind()
	{
		$this->dn=Yii::app()->dateFormatter->format('dd/MM/yyyy', $this->dn);
		$this->doc=substr($this->doc, 0, 3) . '.' . substr($this->doc, 3, 5) . '.' . substr($this->doc, 8, 2) . '-' . substr($this->doc, 10, 1);
		if($this->renda === null || $this->renda == 0) {
			$this->renda='não informada';
		}
		else {
		$this->renda=Yii::app()->numberFormatter->formatCurrency($this->renda, 'BRL');
			$this->renda=str_replace('.',',',$this->renda);			
			if(strlen($this->renda)>6){
				$this->renda=substr_replace($this->renda, '.', 3,1);
				
			}					
		}
		return parent::afterFind();
	}
}

