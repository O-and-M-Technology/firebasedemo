<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('../firebase_credentials.json')
    ->withDatabaseUri('https://amina-52b4d.firebaseio.com');


    $auth = $factory->createAuth();
    
    $realtimeDatabase = $factory->createDatabase();
    
    $reference = $realtimeDatabase->getReference('/detect_1');
    $snapshot = $reference->getSnapshot();

    echo  $snapshot->getValue();

?>
<div class="site-index">
    <h1>
        hello world 
    </h1>
</div>
