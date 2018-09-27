<?php

/**
 * This is the model class for table "pront".
 *
 * The followings are the available columns in table 'pront':
 * @property string $pront
 * @property string $nb
 * @property string $erp
 * @property string $encerr
 * @property string $seg_id
 * @property integer $prgm
 * @property integer $encerr_id
 * @property integer $mprot
 * @property integer $jud
 * @property integer $cert 
 *
 * The followings are the available model relations:
 * @property Benef $nb0
 * @property Seg $seg
 * @property Encrm $encerr0
 */
class Pront extends CActiveRecord
{
	/**
	 *
	 * @var string usada na busca dos campos relacionados pront e seg_id 
	 */
	public $seg_nome;

	/**
	 *
	 * @var string usada na geração de novo id no método create. 
	 */
	protected $maxPront;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pront';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('erp, nb', 'required'),
			array('prgm, encerr_id, mprot, jud, cert', 'numerical', 'integerOnly' => true),
			array('pront, nb, seg_id', 'length', 'max' => 20),
			array('erp, encerr', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('seg_nome, pront, nb, erp, encerr, encerr_id, mprot, jud, cert', 'safe', 'on' => 'search'),
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
			'seg' => array(self::BELONGS_TO, 'Seg', 'seg_id'),
			'encerr0' => array(self::BELONGS_TO, 'Encrm', 'encerr_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pront' => 'Prontuário',
			'nb' => 'Benefício',
			'erp' => 'Ingresso',
			'encerr' => 'Encerramento',
			'seg_id' => 'seg_id',
			'prgm' => 'Programa',
			'encerr_id' => 'Encerr',
			'mprot' => 'Protese',
			'jud' => 'Judicial',
			'cert' => 'Certificado',
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
		$criteria->with=array('seg');
		$criteria->compare('pront', $this->pront, true);
		$criteria->compare('nb', $this->nb, true);
		$criteria->compare('erp', $this->erp, true);
		$criteria->compare('encerr', $this->encerr, true);
		$criteria->compare('seg_id', $this->seg_id, true);
		$criteria->compare('prgm', $this->prgm);
		$criteria->compare('encerr_id', $this->encerr_id);
		$criteria->compare('mprot', $this->mprot);
		$criteria->compare('jud', $this->jud);
		$criteria->compare('cert', $this->cert);
		$criteria->compare('seg.nome', $this->seg_nome, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => array('pageSize' => 10)
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pront the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function newIdPront()
	{
		/* Lê o último id na tabela e o incrementa */
		$query=new CDbCriteria;
		$query->select='max(pront) AS maxPront';
		$row=$this->find($query);
		$newId=(int) $row['maxPront'];
		$newId++;
		return $newId;
	}

	public function beforeSave()
	{
		$erpArray=explode('/', $this->erp);
		$this->erp=$erpArray[2] . '-' . $erpArray[1] . '-' . $erpArray[0];

		//$encerrArray = explode('/', $this->encerr);            
		//$this->encerr = $encerrArray[2].'-'.$encerrpArray[1].'-'.$encerrArray[0];

		$source=array('.', '-');
		$replace=array('', '');
		$valor=str_replace($source, $replace, $this->nb);
		$this->nb=trim($valor);

		return parent::beforeSave();
	}

	public function afterFind()
	{
		$this->erp=Yii::app()->dateFormatter->format('dd/MM/yyyy', $this->erp);
		return parent::afterFind();
	}
}