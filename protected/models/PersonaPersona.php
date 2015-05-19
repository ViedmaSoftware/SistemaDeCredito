<?php

/**
 * This is the model class for table "persona_persona".
 *
 * The followings are the available columns in table 'persona_persona':
 * @property integer $id_persona
 * @property integer $id_familiar
 * @property integer $id_tipofamiliar
 *
 * The followings are the available model relations:
 * @property Persona $idPersona
 * @property Persona $idFamiliar
 * @property TipoFamilia $idTipofamiliar
 */
class PersonaPersona extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'persona_persona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_persona, id_familiar, id_tipofamiliar', 'required'),
			array('id_persona, id_familiar, id_tipofamiliar', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_persona, id_familiar, id_tipofamiliar', 'safe', 'on'=>'search'),
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
			'idFamiliar' => array(self::BELONGS_TO, 'Persona', 'id_familiar'),
			'idTipofamiliar' => array(self::BELONGS_TO, 'TipoFamilia', 'id_tipofamiliar'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_persona' => 'Id Persona',
			'id_familiar' => 'Id Familiar',
			'id_tipofamiliar' => 'Id Tipofamiliar',
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

		$criteria->compare('id_persona',$this->id_persona);
		$criteria->compare('id_familiar',$this->id_familiar);
		$criteria->compare('id_tipofamiliar',$this->id_tipofamiliar);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PersonaPersona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
