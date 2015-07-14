<?php

/**
 * This is the model class for table "persona".
 *
 * The followings are the available columns in table 'persona':
 * @property integer $id
 * @property integer $nro_documento
 * @property string $apellido
 * @property string $nombre
 * @property string $nacimiento
 * @property string $sexo
 * @property integer $id_tipo_documento
 * @property integer $id_estado_civil
 *
 * The followings are the available model relations:
 * @property Cliente[] $clientes
 * @property Contacto[] $contactos
 * @property Garante[] $garantes
 * @property EstadoCivil $idEstadoCivil
 * @property TipoDocumento $idTipoDocumento
 * @property PersonaDireccion[] $personaDireccions
 * @property PersonaLaboral[] $personaLaborals
 * @property PersonaPersona[] $personaPersonas
 * @property PersonaPersona[] $personaPersonas1
 * @property Usuario[] $usuarios
 */
class Persona extends BasePersona
{
    public $Xnacimiento;
    

    public function getXnacimiento(){
            if(!empty($this->nacimiento)){
                return Yii::app()->format->date(strtotime($this->nacimiento));
            }
            
        }
        
        public function setXnacimiento($fecha){
            if(!empty($fecha) && CDateTimeParser::parse($fecha,Yii::app()->locale->dateFormat)){
                $this->nacimiento = date('Y-m-d',CDateTimeParser::parse($fecha,Yii::app()->locale->dateFormat));
            }else{
                $this->nacimiento = $fecha;
            }
            
        }
        
        public function rules(){
            return CMap::mergeArray(parent::rules(),array(
                array('nacimiento','date','format'=>'yyyy-MM-dd'),
                array('apellido,nombre', 'validarString'),
                //array('nombre', 'validarNombre'),
                array('documento', 'validarDocumento','on'=>'create'),
                array('documento', 'validarDocumentoUpdate','on'=>'update'),
                
            ));
        }
        
        public function validarString($attribute,$params)
	{
		if(preg_match("/[0-9]+/", $this->$attribute))
			$this->addError("$attribute","El campo $attribute debe ser letras");
	}
        
        public function validarDocumento($attribute,$params)
	{
            if(count($this->nro_documento)>=7){
                $this->addError('nro_documento','El nro de documento debe ser valido.');
            }
            //if(empty($this->scenario)){
                $resultado=$this->find("nro_documento='{$this->nro_documento}'");
                if(!empty($resultado))
                    $this->addError('nro_documento','Ya exite la persona con el nro de documento: '.$this->nro_documento);
            //}
            
	}
        
        public function validarDocumentoUpdate($attribute,$params)
	{
            if(count($this->nro_documento)>=7){
                $this->addError('nro_documento','El nro de documento debe ser valido.');
            }
            //if(empty($this->scenario)){
                $resultado=$this->find("id <> $this->id and nro_documento='{$this->nro_documento}'");
                if($resultado!=null)
                    $this->addError('nro_documento','Ya exite la persona con el nro de documento: '.$this->nro_documento);
            //}
            
	}


     


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Persona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
