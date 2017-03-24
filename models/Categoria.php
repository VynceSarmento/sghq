<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property integer $id
 * @property string $nome
 *
 * @property Titulo[] $titulos
 */
class Categoria extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitulos() {
        return $this->hasMany(Titulo::className(), ['idCategoria' => 'id']);
    }

}
