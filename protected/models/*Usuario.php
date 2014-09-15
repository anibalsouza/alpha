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
 *
 * The followings are the available model relations:
 * @property Aluno $aluno
 * @property Professor $professor
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
			array('nome_conhecido, nome_completo, email, equipe_id', 'required'),
			array('equipe_id, user_type, endereco_numero', 'numerical', 'integerOnly'=>true),
			array('nome_conhecido, endereco_complemento, endereco_cep, telefone_residencial, telefone_celular', 'length', 'max'=>20),
			array('nome_completo, email', 'length', 'max'=>60),
			array('pass', 'length', 'max'=>16),
			array('cpf', 'length', 'max'=>11),
			array('endereco_rua', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome_conhecido, nome_completo, email, equipe_id, user_type, pass, cpf, endereco_rua, endereco_numero, endereco_complemento, endereco_cep, telefone_residencial, telefone_celular', 'safe', 'on'=>'search'),
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
			'aluno' => array(self::HAS_ONE, 'Aluno', 'usuario_id'),
			'professor' => array(self::HAS_ONE, 'Professor', 'usuario_id'),
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
}
