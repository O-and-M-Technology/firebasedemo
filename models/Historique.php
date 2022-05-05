<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historique".
 *
 * @property int $idHistorique
 * @property int|null $Temps
 * @property string|null $Valeur
 * @property string|null $Temps_creation
 * @property int $Peripherique_idPeripherique
 * @property int $Utilisateur_idUtilisateur
 *
 * @property Peripherique $peripheriqueIdPeripherique
 * @property Utilisateur $utilisateurIdUtilisateur
 */
class Historique extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historique';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Temps', 'Peripherique_idPeripherique', 'Utilisateur_idUtilisateur'], 'integer'],
            [['Peripherique_idPeripherique', 'Utilisateur_idUtilisateur'], 'required'],
            [['Valeur', 'Temps_creation'], 'string', 'max' => 45],
            [['Peripherique_idPeripherique'], 'exist', 'skipOnError' => true, 'targetClass' => Peripherique::className(), 'targetAttribute' => ['Peripherique_idPeripherique' => 'idPeripherique']],
            [['Utilisateur_idUtilisateur'], 'exist', 'skipOnError' => true, 'targetClass' => Utilisateur::className(), 'targetAttribute' => ['Utilisateur_idUtilisateur' => 'idUtilisateur']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idHistorique' => 'Id Historique',
            'Temps' => 'Temps',
            'Valeur' => 'Valeur',
            'Temps_creation' => 'Temps Creation',
            'Peripherique_idPeripherique' => 'Peripherique Id Peripherique',
            'Utilisateur_idUtilisateur' => 'Utilisateur Id Utilisateur',
        ];
    }

    /**
     * Gets query for [[PeripheriqueIdPeripherique]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeripheriqueIdPeripherique()
    {
        return $this->hasOne(Peripherique::className(), ['idPeripherique' => 'Peripherique_idPeripherique']);
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

    public function afterFind()
    {
       $this->Temps_creation = date( "d/m/Y H:i:s" , (int)$this->Temps_creation );
        parent::afterFind();
    }

}
