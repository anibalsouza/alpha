<?php

/**
 * This is the model class for table "professor".
 *
 * The followings are the available columns in table 'professor':
 * @property integer $usuario_id
 * @property string $titulo
 *
 * The followings are the available model relations:
 * @property Usuario $usuario
 */
class Professor extends Usuario
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'professor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		$parentRules = parent::rules();
		$myRules = array(
			array('titulo', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usuario_id, titulo', 'safe', 'on'=>'search'),
		);
		
		return array_merge($myRules, $parentRules); 
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
	
		$parentRelations = parent::relations();
		$myRelations = array(
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
							);
		return array_merge($myRelations, $parentRelations);
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuario_id' => 'Usuario',
			'titulo' => 'Titulo',
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

//		$criteria->with = array('usuario');
//		$criteria->compare('tableA.name', Yii::app()->request->getParam('tableA_name'), true);
//		$criteria->compare('Usuario.nome_conhecido',Yii::app()->request->getParam('Usuario_nome_conhecido'), true);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('titulo',$this->titulo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Professor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	//###########################################
	//Minhas Funções
	
	public function defaultScope()
	{
	/* only read Usuarios that are Professores */
	return array(
				'condition'=>"user_type='2'"
 				);
	}
	
	
}
