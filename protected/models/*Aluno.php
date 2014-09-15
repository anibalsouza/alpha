<?php

/**
 * This is the model class for table "aluno".
 *
 * The followings are the available columns in table 'aluno':
 * @property integer $usuario_id
 * @property string $objetivo_id
 * @property string $historico
 * @property integer $gaming_level
 * @property string $observacoes_medicas
 * @property string $registro_professor
 * @property integer $plano_id
 * @property string $status_pagamento
 *
 * The followings are the available model relations:
 * @property Usuario $usuario
 */
class Aluno extends Usuario
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'aluno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gaming_level, plano_id', 'numerical', 'integerOnly'=>true),
			array('objetivo_id, historico, observacoes_medicas, registro_professor, status_pagamento', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usuario_id, objetivo_id, historico, gaming_level, observacoes_medicas, registro_professor, plano_id, status_pagamento', 'safe', 'on'=>'search'),
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
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuario_id' => 'Usuario',
			'objetivo_id' => 'Objetivo',
			'historico' => 'Historico',
			'gaming_level' => 'Gaming Level',
			'observacoes_medicas' => 'Observacoes Medicas',
			'registro_professor' => 'Registro Professor',
			'plano_id' => 'Plano',
			'status_pagamento' => 'Status Pagamento',
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

		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('objetivo_id',$this->objetivo_id,true);
		$criteria->compare('historico',$this->historico,true);
		$criteria->compare('gaming_level',$this->gaming_level);
		$criteria->compare('observacoes_medicas',$this->observacoes_medicas,true);
		$criteria->compare('registro_professor',$this->registro_professor,true);
		$criteria->compare('plano_id',$this->plano_id);
		$criteria->compare('status_pagamento',$this->status_pagamento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Aluno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	

	
	
}
