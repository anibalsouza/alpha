<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property string $nome_conhecido
 * @property string $nome_completo
 * @property string $email
 * @property integer $equipe_id
 * @property integer $user_type
 * @property string $pass
 * @property string $cpf
 * @property string $endereco_rua
 * @property integer $endereco_numero
 * @property string $endereco_complemento
 * @property string $endereco_cep
 * @property string $telefone_residencial
 * @property string $telefone_celular
 * @property string $objetivo
 * @property string $historico
 * @property integer $gaming_level
 * @property string $observacoes_medicas
 * @property string $registro_professor
 * @property integer $plano_id
 * @property string $status_pagamento
 */
class Usuario extends CActiveRecord
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
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome_conhecido', 'required'),
			array('equipe_id, user_type, endereco_numero, gaming_level, plano_id', 'numerical', 'integerOnly'=>true),
			array('nome_conhecido, endereco_complemento, endereco_cep, telefone_residencial, telefone_celular', 'length', 'max'=>20),
			array('nome_completo, email', 'length', 'max'=>60),
			array('pass', 'length', 'max'=>16),
			array('cpf', 'length', 'max'=>11),
			array('endereco_rua, objetivo, historico, observacoes_medicas, registro_professor, status_pagamento', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome_conhecido, nome_completo, email, equipe_id, user_type, pass, cpf, endereco_rua, endereco_numero, endereco_complemento, endereco_cep, telefone_residencial, telefone_celular, objetivo, historico, gaming_level, observacoes_medicas, registro_professor, plano_id, status_pagamento', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome_conhecido' => 'Nome Conhecido',
			'nome_completo' => 'Nome Completo',
			'email' => 'Email',
			'equipe_id' => 'Equipe',
			'user_type' => 'User Type',
			'pass' => 'Pass',
			'cpf' => 'Cpf',
			'endereco_rua' => 'Endereco Rua',
			'endereco_numero' => 'Endereco Numero',
			'endereco_complemento' => 'Endereco Complemento',
			'endereco_cep' => 'Endereco Cep',
			'telefone_residencial' => 'Telefone Residencial',
			'telefone_celular' => 'Telefone Celular',
			'objetivo' => 'Objetivo',
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
		$equipe = Yii::app()->user->equipe;


		$criteria=new CDbCriteria;

 		$criteria->condition="equipe_id = '$equipe'"; //só busca dentro da própria equipe
 		
		$criteria->compare('id',$this->id);
		$criteria->compare('nome_conhecido',$this->nome_conhecido,true);
		$criteria->compare('nome_completo',$this->nome_completo,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('equipe_id',$this->equipe_id);
		$criteria->compare('user_type',$this->user_type);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('cpf',$this->cpf,true);
		$criteria->compare('endereco_rua',$this->endereco_rua,true);
		$criteria->compare('endereco_numero',$this->endereco_numero);
		$criteria->compare('endereco_complemento',$this->endereco_complemento,true);
		$criteria->compare('endereco_cep',$this->endereco_cep,true);
		$criteria->compare('telefone_residencial',$this->telefone_residencial,true);
		$criteria->compare('telefone_celular',$this->telefone_celular,true);
		$criteria->compare('objetivo',$this->objetivo,true);
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
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password,CPasswordHelper::hashPassword($this->pass)); 
    }

 	public function userType(){
        switch($this->user_type){
            case '0':
                $class='SuperAdmin';
            break;
            case '1':
                $class='Admin';
            break;
            case '2':
                $class='Professor';
            break;
            case '3':
                $class='Aluno';
            break;
            default:
 				$class='Usuario';
 			break;
        }
        return $class;
        }    

}
