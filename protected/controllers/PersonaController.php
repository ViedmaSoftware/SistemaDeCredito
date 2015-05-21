<?php

class PersonaController extends Controller
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
            return array(array('CrugeAccessControlFilter'));
		/*return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);*/
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
            $model = $this->loadModel($id);
            $Direccion = new Direccion;
             
           
	    $this->render('view',array(
                                    'model'=>$model,
                                    'Direccion'=>$Direccion,)
                         );
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Persona;
                $model->setScenario('create');
		$Direccion = new Direccion;
		$personaDireccion = new PersonaDireccion;
                $Contacto = new Contacto;
                
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);
                
		if(isset($_POST['Persona']) && isset($_POST['Direccion']) && isset($_POST['Contacto']))
		{   
                        
                        
                        
                        $transaction=  Yii::app()->db->beginTransaction();
                        try{
                           
                        //guardamos a Personas
                        $model->attributes=$_POST['Persona'];
                        //atributo virtual... nos ayuda adaptar la fecha
                        $model->setXnacimiento($_POST['Persona']['xnacimiento']);
                        //Guardamos todas las direcciones
                        $Direccion->attributes = $_POST['Direccion'];
                        			
                        $Contacto->attributes = $_POST['Contacto'];
                       
                        
                        
                            if(!$model->save()){
                                throw new Exception();
                            }
                            
                            if(!$Direccion->save()){
                                throw new Exception();
                            }
                            
                            
                            
                            
                            $personaDireccion->id_direccion=$Direccion->id;
                            $personaDireccion->id_persona=$model->id;
                            
                            $Contacto->id_persona=$model->id;
                            
                            if(!$personaDireccion->save()){
                                throw new Exception();
                            }
                            
                            if(!$Contacto->save()){
                                throw new Exception();
                            }
                            
                            
                            $transaction->commit();
                            
                            $this->redirect(array('view','id'=>$model->id));
                            
                        }
                        catch(Exception $e){
                           $transaction->rollback();
                        }
                        
			
		}

		$this->render('create',array(
			'model'=>$model,
			'Direccion'=>$Direccion,
			'Contacto'=>$Contacto,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{//Pendiente 
        //validar cantidad de direcciones
        //validar si es unn objeto nuevo    
            
            $model=$this->loadModel($id);
            $model->setScenario('update');
            $PersonaDirecciones = $model->personaDireccions;

            $Direccion = $PersonaDirecciones[0]->idDireccion;

            $Contacto = $model->contactos[0];


            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['Persona']) && isset($_POST['Direccion']) && isset($_POST['Contacto']))
            {
                $transaction=  Yii::app()->db->beginTransaction();
                    try{

                    //guardamos a Personas
                    $model->attributes=$_POST['Persona'];
                     //atributo virtual... nos ayuda adaptar la fecha
                    $model->setXnacimiento($_POST['Persona']['xnacimiento']);

                    //Guardamos todas las direcciones
                    $Direccion->attributes = $_POST['Direccion'];

                    $Contacto->attributes = $_POST['Contacto'];



                        if(!$model->save()){
                            throw new Exception();
                        }
                        if(!$Direccion->save()){
                            throw new Exception();
                        }
                        if(!$Contacto->save()){
                            throw new Exception();
                        }



                        $transaction->commit();

                        $this->redirect(array('view','id'=>$model->id));

                    }
                    catch(Exception $e){
                       $transaction->rollback();
                    }
            }



            $this->render('update',array(
                    'model'=>$model,
                    'Direccion'=>$Direccion,
                    'Contacto'=>$Contacto
            ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Persona');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
                //$_SESSION['ultimaBusquedaPersona']=Yii::app()->request->getQueryString();
		$model=new Persona('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Persona']))
			$model->attributes=$_GET['Persona'];
                        
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Persona the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Persona::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Persona $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='persona-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionPrueba()
	{
            $lista=array('opcion1','opcion2','opcion3');
            
            $listajs=  CJavaScript::encode($lista);
            Yii::app()->getClientScript()->registerScript('lista', 'var opciones='.$listajs.';',  CClientScript::POS_HEAD);
            $this->render('vistaAngular');
	}
        
        public function actionOpciones()
	{
          $lista=array('opcion1','opcion2','opcion3');
          echo json_encode($lista);
	}
}
