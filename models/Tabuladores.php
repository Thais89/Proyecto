<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabuladores".
 *
 * @property string $tabuladorID
 * @property string $tabulador
 * @property string $descripcion
 * @property double $precio
 * @property string $encomiendaID
 *
 * @property Encomiendas $encomienda
 */
class Tabuladores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabuladores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tabulador', 'descripcion', 'precio', 'encomiendaID'], 'required'],
            [['precio'], 'number'],
            [['encomiendaID'], 'integer'],
            [['tabulador'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 200],
            [['encomiendaID'], 'exist', 'skipOnError' => true, 'targetClass' => Encomiendas::className(), 'targetAttribute' => ['encomiendaID' => 'encomiendaID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tabuladorID' => 'Tabulador ID',
            'tabulador' => 'Tabulador',
            'descripcion' => 'Descripcion',
            'precio' => 'Precio',
            'encomiendaID' => 'Encomienda ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncomienda()
    {
        return $this->hasOne(Encomiendas::className(), ['encomiendaID' => 'encomiendaID']);
    }
}
