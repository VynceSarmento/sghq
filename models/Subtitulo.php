<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subtitulo".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $idTitulo
 *
 * @property Titulo $idTitulo0
 */
class Subtitulo extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'subtitulo';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nome', 'idTitulo'], 'required'],
            [['idTitulo'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['idTitulo'], 'exist', 'skipOnError' => true, 'targetClass' => Titulo::className(), 'targetAttribute' => ['idTitulo' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'idTitulo' => 'Título',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitulo() {
        return $this->hasOne(Titulo::className(), ['id' => 'idTitulo']);
    }

}
