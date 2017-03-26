<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "titulo".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $idCategoria
 *
 * @property Arquivo[] $arquivos
 * @property Subtitulo[] $subtitulos
 * @property Categoria $idCategoria0
 */
class Titulo extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'titulo';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nome', 'idCategoria'], 'required'],
            [['idCategoria'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['idCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['idCategoria' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'idCategoria' => 'Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArquivos() {
        return $this->hasMany(Arquivo::className(), ['idTitulo' => 'id', 'idCategoria' => 'idCategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubtitulos() {
        return $this->hasMany(Subtitulo::className(), ['idTitulo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria() {
        return $this->hasOne(Categoria::className(), ['id' => 'idCategoria']);
    }

}
