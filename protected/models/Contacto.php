<?php

/**
 * This is the model class for table "contacto".
 *
 * The followings are the available columns in table 'contacto':
 * @property integer $id
 * @property string $telefono_fijo
 * @property string $telefono_movil
 * @property string $telefono_laboral
 * @property string $correo_electronico
 * @property string $pagina_web
 * @property integer $id_persona
 *
 * The followings are the available model relations:
 * @property Persona $idPersona
 */
class Contacto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contacto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_persona, telefono_movil, correo_electronico', 'required'),
			array('id_persona', 'numerical', 'integerOnly'=>true),
			array('telefono_fijo, telefono_movil, telefono_laboral', 'length', 'max'=>20),
			array('correo_electronico, pagina_web', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, telefono_fijo, telefono_movil, telefono_laboral, correo_electronico, pagina_web, id_persona', 'safe', 'on'=>'search'),
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
			'idPersona' => array(self::BELONGS_TO, 'Persona', 'id_persona'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'telefono_fijo' => 'Telefono Fijo',
			'telefono_movil' => 'Telefono Movil',
			'telefono_laboral' => 'Telefono Laboral',
			'correo_electronico' => 'Correo Electronico',
			'pagina_web' => 'Pagina Web',
			'id_persona' => 'Id Persona',
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
		$criteria->compare('telefono_fijo',$this->telefono_fijo,true);
		$criteria->compare('telefono_movil',$this->telefono_movil,true);
		$criteria->compare('telefono_laboral',$this->telefono_laboral,true);
		$criteria->compare('correo_electronico',$this->correo_electronico,true);
		$criteria->compare('pagina_web',$this->pagina_web,true);
		$criteria->compare('id_persona',$this->id_persona);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contacto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
