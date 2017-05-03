<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "arquivo".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $idTitulo
 * @property integer $idCategoria
 *
 * @property Titulo $idTitulo0
 */
class Arquivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arquivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'idTitulo', 'idCategoria'], 'required'],
            [['idTitulo', 'idCategoria'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['idTitulo', 'idCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Titulo::className(), 'targetAttribute' => ['idTitulo' => 'id', 'idCategoria' => 'idCategoria']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'idTitulo' => 'Id Titulo',
            'idCategoria' => 'Id Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTitulo0()
    {
        return $this->hasOne(Titulo::className(), ['id' => 'idTitulo', 'idCategoria' => 'idCategoria']);
    }
}
