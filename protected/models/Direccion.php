<?php

/**
 * This is the model class for table "direccion".
 *
 * The followings are the available columns in table 'direccion':
 * @property integer $id
 * @property string $nombre
 * @property string $nrocalle
 * @property string $escalera
 * @property string $piso
 * @property string $departamento
 * @property integer $id_tipo_direccion
 * @property integer $id_localidad
 *
 * The followings are the available model relations:
 * @property Localidad $idLocalidad
 * @property TipoDireccion $idTipoDireccion
 * @property InstitucionDireccion[] $institucionDireccions
 * @property PersonaDireccion[] $personaDireccions
 */
class Direccion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'direccion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, nrocalle, id_tipo_direccion, id_localidad', 'required'),
			array('id_tipo_direccion, id_localidad', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>35),
			array('nrocalle, escalera, piso, departamento', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, nrocalle, escalera, piso, departamento, id_tipo_direccion, id_localidad', 'safe', 'on'=>'search'),
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
			'idLocalidad' => array(self::BELONGS_TO, 'Localidad', 'id_localidad'),
			'idTipoDireccion' => array(self::BELONGS_TO, 'TipoDireccion', 'id_tipo_direccion'),
			'institucionDireccions' => array(self::HAS_MANY, 'InstitucionDireccion', 'id_direccion'),
			'personaDireccions' => array(self::HAS_MANY, 'PersonaDireccion', 'id_direccion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Direcci&oacute;n',
			'nrocalle' => 'Nro calle',
			'escalera' => 'Escalera',
			'piso' => 'Piso',
			'departamento' => 'Departamento',
			'id_tipo_direccion' => 'Tipo Direcci&oacute;n',
			'id_localidad' => 'Localidad',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('nrocalle',$this->nrocalle,true);
		$criteria->compare('escalera',$this->escalera,true);
		$criteria->compare('piso',$this->piso,true);
		$criteria->compare('departamento',$this->departamento,true);
		$criteria->compare('id_tipo_direccion',$this->id_tipo_direccion);
		$criteria->compare('id_localidad',$this->id_localidad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Direccion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
