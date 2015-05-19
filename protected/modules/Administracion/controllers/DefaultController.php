<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
            $Personas = Persona::model()->findAll();
		$this->render('index',array('ListaPersonas'=>$Personas));
	}
}