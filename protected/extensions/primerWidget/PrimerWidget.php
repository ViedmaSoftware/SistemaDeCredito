<?php
class PrimerWidget extends CWidget{
    public $mensaje = 'mensaje predeterminado';
    
    public function run() {
       
        $this->render('index',array('mensaje'=>$this->mensaje));
    }
    
    public function init() {
        $direccion=  dirname(__FILE__).'/assets';
        
        $publicacion = Yii::app()->assetManager->publish($direccion,false,-1,true);
        Yii::app()->getClientScript()->registerCSSFile($publicacion."/estilo.css");
        
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

