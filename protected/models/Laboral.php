<?php

/**
 * This is the model class for table "laboral".
 *
 * The followings are the available columns in table 'laboral':
 * @property integer $id
 * @property string $ocupacion
 * @property string $actividad
 * @property string $sueldo
 * @property string $ingreso
 * @property string $nombre_institucion
 * @property string $cuil_institucion
 *
 * The followings are the available model relations:
 * @property LaboralDireccion[] $laboralDireccions
 * @property PersonaLaboral[] $personaLaborals
 * @property Vinculacion[] $vinculacions
 */
class Laboral extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'laboral';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_institucion', 'required'),
			array('ocupacion, actividad, cuil_institucion', 'length', 'max'=>45),
			array('sueldo', 'length', 'max'=>10),
			array('nombre_institucion', 'length', 'max'=>50),
			array('ingreso', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ocupacion, actividad, sueldo, ingreso, nombre_institucion, cuil_institucion', 'safe', 'on'=>'search'),
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
			'laboralDireccions' => array(self::HAS_MANY, 'LaboralDireccion', 'id_laboral'),
			'personaLaborals' => array(self::HAS_MANY, 'PersonaLaboral', 'id_laboral'),
			'vinculacions' => array(self::HAS_MANY, 'Vinculacion', 'id_laboral'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ocupacion' => 'Ocupacion',
			'actividad' => 'Actividad',
			'sueldo' => 'Sueldo',
			'ingreso' => 'Ingreso',
			'nombre_institucion' => 'Nombre Institucion',
			'cuil_institucion' => 'Cuil Institucion',
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
		$criteria->compare('ocupacion',$this->ocupacion,true);
		$criteria->compare('actividad',$this->actividad,true);
		$criteria->compare('sueldo',$this->sueldo,true);
		$criteria->compare('ingreso',$this->ingreso,true);
		$criteria->compare('nombre_institucion',$this->nombre_institucion,true);
		$criteria->compare('cuil_institucion',$this->cuil_institucion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Laboral the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
