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
class BasePersona extends CActiveRecord
{
        /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'persona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nro_documento, apellido, nombre, nacimiento, id_tipo_documento, id_estado_civil', 'required'),
			array('nro_documento, id_tipo_documento, id_estado_civil', 'numerical', 'integerOnly'=>true, "message"=>"El nro de documento debe ser un numero"),
			array('apellido, nombre', 'length', 'max'=>35),
                        //array('nombre', 'validarNombre'),
			array('sexo', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nro_documento, apellido, nombre, nacimiento, sexo, id_tipo_documento, id_estado_civil', 'safe', 'on'=>'search'),
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
			'clientes' => array(self::HAS_MANY, 'Cliente', 'id_persona'),
			'contactos' => array(self::HAS_MANY, 'Contacto', 'id_persona'),
			'garantes' => array(self::HAS_MANY, 'Garante', 'id_persona'),
			'idEstadoCivil' => array(self::BELONGS_TO, 'EstadoCivil', 'id_estado_civil'),
			'idTipoDocumento' => array(self::BELONGS_TO, 'TipoDocumento', 'id_tipo_documento'),
			'personaDireccions' => array(self::HAS_MANY, 'PersonaDireccion', 'id_persona'),
			'personaLaborals' => array(self::HAS_MANY, 'PersonaLaboral', 'id_persona'),
			'personaPersonas' => array(self::HAS_MANY, 'PersonaPersona', 'id_persona'),
			'personaPersonas1' => array(self::HAS_MANY, 'PersonaPersona', 'id_familiar'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'id_persona'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nro_documento' => 'Nro Documento',
			'apellido' => 'Apellido',
			'nombre' => 'Nombres',
			'nacimiento' => 'Fecha de nacimiento',
			'sexo' => 'Sexo',
			'id_tipo_documento' => 'Tipo Documento',
			'id_estado_civil' => 'Estado Civil',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nro_documento',$this->nro_documento);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('nacimiento',$this->nacimiento,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('id_tipo_documento',$this->id_tipo_documento);
		$criteria->compare('id_estado_civil',$this->id_estado_civil);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BasePersona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
