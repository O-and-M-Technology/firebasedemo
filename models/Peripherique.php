<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peripherique".
 *
 * @property int $idPeripherique
 * @property string|null $Nom
 * @property int|null $Date_creation
 * @property string|null $Type
 * @property string|null $Active
 * @property int $Serre_idSerre
 * @property int $Utilisateur_idUtilisateur
 * @property string|null $Code_HTML
 * @property string|null $IconSvg
 * @property string|null $Key
 *
 * @property Historique[] $historiques
 * @property Serre $serreIdSerre
 * @property Utilisateur $utilisateurIdUtilisateur
 */
class Peripherique extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peripherique';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Date_creation', 'Serre_idSerre', 'Utilisateur_idUtilisateur'], 'integer'],
            [['Type', 'Active', 'IconSvg', 'Key'], 'string'],
            [['Serre_idSerre', 'Utilisateur_idUtilisateur'], 'required'],
            [['Nom', 'Code_HTML'], 'string', 'max' => 45],
            [['Serre_idSerre'], 'exist', 'skipOnError' => true, 'targetClass' => Serre::className(), 'targetAttribute' => ['Serre_idSerre' => 'idSerre']],
            [['Utilisateur_idUtilisateur'], 'exist', 'skipOnError' => true, 'targetClass' => Utilisateur::className(), 'targetAttribute' => ['Utilisateur_idUtilisateur' => 'idUtilisateur']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPeripherique' => 'Id Peripherique',
            'Nom' => 'Nom',
            'Date_creation' => 'Date Creation',
            'Type' => 'Type',
            'Active' => 'Active',
            'Serre_idSerre' => 'Serre Id Serre',
            'Utilisateur_idUtilisateur' => 'Utilisateur Id Utilisateur',
            'Code_HTML' => 'Code Html',
            'IconSvg' => 'Icon Svg',
            'Key' => 'Key',
        ];
    }

    /**
     * Gets query for [[Historiques]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistoriques()
    {
        return $this->hasMany(Historique::className(), ['Peripherique_idPeripherique' => 'idPeripherique']);
    }

    /**
     * Gets query for [[SerreIdSerre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSerreIdSerre()
    {
        return $this->hasOne(Serre::className(), ['idSerre' => 'Serre_idSerre']);
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

    /**
     * Convert from Timestamp to readable date
     **/
    public function afterFind()
    {
       $this->Date_creation = date( "d/m/Y" , (int)$this->Date_creation );
        parent::afterFind();
    }

        /**
     * Convert from date to Timestamp
     **/
    public function beforeSave($insert)
    {
        $this->Key = md5(rand());
        $this->Date_creation = strtotime('now');
        $this->Utilisateur_idUtilisateur = 1;
        
        return parent::beforeSave($insert);
    }
}
