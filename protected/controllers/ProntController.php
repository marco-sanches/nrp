<?php

class ProntController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow all users to perform 'index' and 'view' actions
				'actions' => array('index', 'view', 'admin'), //alterado por erro no autocomplete
				'users' => array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create', 'update', 'autocompleteCID', 'autocompleteMunicipio', 'autocompleteProfissao', 'autocompleteEmpresa'),
				'users' => array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('delete'),
				'users' => array('admin'),
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$pront=new Pront; //model
		$benef=new Benef; //model1
		$seg=new Seg; //model2	
		$fone=new Fone; //model5
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);               
		if(isset($_POST['Pront'], $_POST['Benef'], $_POST['Seg'])) {
			$pront->attributes=$_POST['Pront'];
			$benef->attributes=$_POST['Benef'];
			$seg->attributes=$_POST['Seg'];
			$seg->id=$seg->newIdSeg();
			$pront->seg_id=$seg->id;
			$pront->pront=$pront->newIdPront();
			$pront->nb=$benef->nb;
			$valido=$pront->validate();
			$valido=$benef->validate() && $valido;
			$valido=$seg->validate() && $valido;

			if($valido) {
				$seg->save(false);
				$pront->save(false);
				$benef->pront=$pront->pront;
				$benef->save(false);
			}
			$fone->seg_id=$seg->id;
			if(isset($_POST['Fone']['fone0'])) {
				$var0=$_POST['Fone']['fone0'];
				if($var0 != '') {
					$fone->numero=$fone->attributes=$_POST['Fone']['fone0'];
					$fone->save(false);
				}
			}
			if(isset($_POST['Fone']['fone1'])) {
				$var1=$_POST['Fone']['fone1'];
				if($var1 != '') {
					$fone=New Fone;
					$fone->seg_id=$seg->id;
					$fone->numero=$fone->attributes=$_POST['Fone']['fone1'];
					$fone->save(false);
				}
			}
			if(isset($_POST['Fone']['fone2'])) {
				$var2=$_POST['Fone']['fone2'];
				if($var2 != '') {
					$fone=New Fone;
					$fone->seg_id=$seg->id;
					$fone->numero=$fone->attributes=$_POST['Fone']['fone2'];
					$fone->save(false);
				}
			}
			Yii::app()->user->setFlash('success', "Informações gravadas com sucesso!");
			$this->redirect(array('view', 'id' => $pront->pront));
		}


		$this->render('create', array(
			'pront' => $pront,
			'benef' => $benef,
			'seg' => $seg,
			'fone' => $fone,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$model1=Benef::model()->findByPk($model->nb);
		$model2=Seg::model()->findByPk($model->seg_id);
		$model3=Emp::model()->findByPk($model2->emp_id);
		$model4=Munic::model()->findByPk($model2->munic_id);
		$model5=Prof::model()->findByPk($model2->prof_id);
		$model6=Cid::model()->findByPk($model1->cid_id);
		$escol=Escol::model()->findByPk($model2->escol_id);
		$fone=new Fone();

		$criteria=new CDbCriteria();
		$criteria->select='fone_id, numero';
		$criteria->condition='seg_id = :id';
		$criteria->params=array(':id' => $model2->id);
		$criteria->order='fone_id ASC';
		$criteria->limit='3';
		$model7=Fone::model()->findAll($criteria);
		switch(count($model7)) {
			case 0: {
					$fone->fone0='';
					$fone->fone0_id=null;
					$fone->fone1='';
					$fone->fone0_id=null;
					$fone->fone2='';
					$fone->fone0_id=null;
					break;
				}
			case 1: {
					$fone->fone0=$model7[0]->numero;
					$fone->fone0_id=$model7[0]->fone_id;
					$fone->fone1='';
					$fone->fone1_id=null;
					$fone->fone2='';
					$fone->fone2_id=null;
					break;
				}
			case 2: {
					$fone->fone0=$model7[0]->numero;
					$fone->fone0_id=$model7[0]->fone_id;
					$fone->fone1=$model7[1]->numero;
					$fone->fone1_id=$model7[1]->fone_id;
					$fone->fone2='';
					$fone->fone2_id=null;
					break;
				}
			case 3: {
					$fone->fone0=$model7[0]->numero;
					$fone->fone0_id=$model7[0]->fone_id;
					$fone->fone1=$model7[1]->numero;
					$fone->fone1_id=$model7[1]->fone_id;
					$fone->fone2=$model7[2]->numero;
					$fone->fone2_id=$model7[2]->fone_id;
					break;
				}
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pront'], $_POST['Benef'], $_POST['Seg'])) {
			$model->attributes=$_POST['Pront'];
			$model1->attributes=$_POST['Benef'];
			$model2->attributes=$_POST['Seg'];
			if($model1->save(false)) {
				$model->nb=$model1->nb;
				if($model->save(false)) {
					$model1->pront=$model->pront;
					if($model2->save(false)) {
						if($this->saveFones($model7)) {
							Yii::app()->user->setFlash('success', "Alterações salvas com sucesso!");
							$this->redirect(array('update', 'id' => $model->pront));
						}
					}
				}
			}
		}

		$this->render('update', array(
			'model' => $model, //prontuário
			'model1' => $model1, //benefício
			'model2' => $model2, // segurado
			'model3' => $model3, //empregador
			'model4' => $model4, //municipio
			'model5' => $model5, //profissão
			'model6' => $model6, //doença			
			'escol' => $escol,
			'fone' => $fone,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$pront=$this->loadModel($id);
		$fone=Fone::model()->deleteAll('seg_id = :seg_id', array(':seg_id' => $pront->seg_id));
		$benef=Benef::model()->deleteByPk($pront->nb);
		$seg=Seg::model()->deleteByPk($pront->seg_id);
		$pront->delete($id);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pront');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pront('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pront']))
			$model->attributes=$_GET['Pront'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pront the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pront::model()->findByPk($id);
		if($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pront $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'pront-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAutocompleteCID()
	{
		$res=array();

		if(isset($_GET['term'])) {
			$firstchar=substr($_GET['term'], 0, 1);
			if($firstchar === strtoupper(substr($_GET['term'], 0, 1))) {
				$qtxt="SELECT cid_id, codigo, descr, CONCAT(codigo,'-',descr) as label FROM cid WHERE codigo LIKE :descr";
				$command=Yii::app()->db->createCommand($qtxt);
				$command->bindValue(":descr", $_GET['term'] . '%', PDO::PARAM_STR);
				$res=$command->queryAll();
			}
			else {
				$qtxt="SELECT cid_id, codigo, descr, CONCAT(codigo,'-',descr) as label FROM cid WHERE descr LIKE :descr";
				$command=Yii::app()->db->createCommand($qtxt);
				$command->bindValue(":descr", '%' . $_GET['term'] . '%', PDO::PARAM_STR);
				$res=$command->queryAll();
			}
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}

	public function actionAutocompleteMunicipio()
	{
		$res=array();

		if(isset($_GET['term'])) {
			$qtxt="SELECT id, CONCAT(nome,'-',uf)as label FROM munic WHERE nome LIKE :nome";
			$command=Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":nome", '%' . $_GET['term'] . '%', PDO::PARAM_STR);
			$res=$command->queryAll();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}

	public function actionAutocompleteProfissao()
	{
		$res=array();

		if(isset($_GET['term'])) {
			$qtxt="SELECT prof_id, descr, CONCAT(prof_id,'-',descr) as label FROM prof WHERE descr LIKE :descr";
			$command=Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":descr", '%' . $_GET['term'] . '%', PDO::PARAM_STR);
			$res=$command->queryAll();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}

	public function actionAutocompleteEmpresa()
	{
		$res=array();

		if(isset($_GET['term'])) {
			$qtxt="SELECT emp_id, nome_emp, nome_emp as label FROM emp WHERE nome_emp LIKE :nome";
			$command=Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":nome", '%' . $_GET['term'] . '%', PDO::PARAM_STR);
			$res=$command->queryAll();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}

	private function saveFones($modelo)
	{
		switch(count($modelo)) {
			case 0: {
					return true;
				}
			case 1: {

					$modelo[0]->fone_id=$_POST['Fone']['fone0_id'];
					$modelo[0]->numero=$this->formataNum($_POST['Fone']['fone0']);
					if($modelo[0]->save(false)) {
						return true;
					}
				}
			case 2: {
					$modelo[0]->fone_id=$_POST['Fone']['fone0_id'];
					$modelo[0]->numero=$this->formataNum($_POST['Fone']['fone0']);
					if($modelo[0]->save(false)) {
						$modelo[1]->fone_id=$_POST['Fone']['fone1_id'];
						$modelo[1]->numero=$this->formataNum($_POST['Fone']['fone1']);
					}
					if($modelo[1]->save(false)) {
						return true;
					}
				}
			case 3: {
					$modelo[0]->fone_id=$_POST['Fone']['fone0_id'];
					$modelo[0]->numero=$this->formataNum($_POST['Fone']['fone0']);
					if($modelo[0]->save(false)) {
						$modelo[1]->fone_id=$_POST['Fone']['fone1_id'];
						$modelo[1]->numero=$this->formataNum($_POST['Fone']['fone1']);
					}
					if($modelo[1]->save(false)) {
						$modelo[2]->fone_id=$_POST['Fone']['fone2_id'];
						$modelo[2]->numero=$this->formataNum($_POST['Fone']['fone2']);
					}
					if($modelo[2]->save(false)) {
						return true;
					}
				}
		}
	}

	private function formataNum($string)
	{
		$search=array('(', ')');
		$replace=array('', '');
		if(strlen($string) == 13) {
			$string=substr($string, 0, 8) . substr($string, 9, 4);
			$string=str_replace($search, $replace, $string);
		}
		elseif(strlen($string) == 14) {
			$string=substr($string, 0, 9) . substr($string, 10, 4);
			$string=str_replace($search, $replace, $string);
		}
		return $string;
	}
}