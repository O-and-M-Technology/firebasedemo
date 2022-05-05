<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "utilisateur".
 *
 * @property int $idUtilisateur
 * @property string|null $Nom
 * @property string|null $Prenom
 * @property string|null $Identifiant
 * @property string|null $Password
 * @property int|null $Role
 * @property string|null $Derniere_authentification
 *
 * @property Historique[] $historiques
 * @property Peripherique[] $peripheriques
 * @property Serre[] $serres
 */
class Utilisateur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'utilisateur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Password'], 'string'],
            [['Role'], 'integer'],
            [['Derniere_authentification'], 'safe'],
            [['Nom', 'Prenom', 'Identifiant'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUtilisateur' => 'Id Utilisateur',
            'Nom' => 'Nom',
            'Prenom' => 'Prenom',
            'Identifiant' => 'Identifiant',
            'Password' => 'Password',
            'Role' => 'Role',
            'Derniere_authentification' => 'Derniere Authentification',
        ];
    }

    /**
     * Gets query for [[Historiques]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistoriques()
    {
        return $this->hasMany(Historique::className(), ['Utilisateur_idUtilisateur' => 'idUtilisateur']);
    }

    /**
     * Gets query for [[Peripheriques]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeripheriques()
    {
        return $this->hasMany(Peripherique::className(), ['Utilisateur_idUtilisateur' => 'idUtilisateur']);
    }

    /**
     * Gets query for [[Serres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSerres()
    {
        return $this->hasMany(Serre::className(), ['Utilisateur_idUtilisateur' => 'idUtilisateur']);
    }
}
