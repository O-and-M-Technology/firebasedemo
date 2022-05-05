<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "serre".
 *
 * @property int $idSerre
 * @property string|null $Nom
 * @property string|null $Adresse
 * @property string|null $Date_creation
 * @property string|null $Surface
 * @property int $Utilisateur_idUtilisateur
 *
 * @property Peripherique[] $peripheriques
 * @property Utilisateur $utilisateurIdUtilisateur
 */
class Serre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'serre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Utilisateur_idUtilisateur'], 'required'],
            [['Utilisateur_idUtilisateur'], 'integer'],
            [['Nom', 'Adresse', 'Date_creation', 'Surface'], 'string', 'max' => 45],
            [['Utilisateur_idUtilisateur'], 'exist', 'skipOnError' => true, 'targetClass' => Utilisateur::className(), 'targetAttribute' => ['Utilisateur_idUtilisateur' => 'idUtilisateur']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSerre' => 'Id Serre',
            'Nom' => 'Nom',
            'Adresse' => 'Adresse',
            'Date_creation' => 'Date Creation',
            'Surface' => 'Surface',
            'Utilisateur_idUtilisateur' => 'Utilisateur Id Utilisateur',
        ];
    }

    /**
     * Gets query for [[Peripheriques]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeripheriques()
    {
        return $this->hasMany(Peripherique::className(), ['Serre_idSerre' => 'idSerre']);
    }

    /**
     * Gets query for [[UtilisateurIdUtilisateur]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUtilisateurIdUtilisateur()
    {
        return $this->hasOne(Utilisateur::className(), ['idUtilisateur' => 'Utilisateur_idUtilisateur']);
    }
}
