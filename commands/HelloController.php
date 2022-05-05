<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use Kreait\Firebase\Factory;
use app\models\Peripherique;
use app\models\Historique;
use Google\Cloud\Core\Timestamp;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $factory = (new Factory)
            /**
             *      Firebase credentials
             */
            ->withServiceAccount('./firebase_credentials.json')
             /**
             *      Firebase realtime database link 
             */
            ->withDatabaseUri('https://amina-52b4d.firebaseio.com');


        $auth = $factory->createAuth();

        $realtimeDatabase = $factory->createDatabase();

        /**
         *          the keys tree
         */

        
        foreach( Peripherique::find()->all() as $_perepherique ){
            $reference = $realtimeDatabase->getReference( "/". $_perepherique->Key);
            $snapshot = $reference->getSnapshot();
            echo $snapshot->getValue();
            if($snapshot->getValue() != null){
                $_historique = new Historique();
                $_historique->Temps = 0; 
                $_historique->Temps_creation = strtotime("now");
                $_historique->Valeur = $snapshot->getValue(); 
                $_historique->Peripherique_idPeripherique = $_perepherique->idPeripherique;
                $_historique->Utilisateur_idUtilisateur = 1;
                $_historique->save(false);
            }
        }

        return ExitCode::OK;
    }
}
