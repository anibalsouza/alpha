<?php

/* Referencia http://learnyii.blogspot.com.br/2012/04/yii-table-inheritance-single-active.html*/

class Professor extends Usuario
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		$parentRules = parent::rules();
		$myRules = array(
							array('user_type', 'default', 'value'=>'2'), /* set type to Professor */
							array('user_type', 'in', 'range'=>array('2')) /* allow only Professor type */
							/*array('given_name', 'required') /* new rule for this subtype only */
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
		$myRelations = array();
		return array_merge($myRelations, $parentRelations);
		
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
	
	public function userType()
	{
		return 'A';
	}
	
}
