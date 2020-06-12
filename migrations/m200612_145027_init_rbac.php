<?php

use yii\db\Migration;

/**
 * Class m200612_145027_init_rbac
 */
class m200612_145027_init_rbac extends Migration
{
    public function up()
    {
        // Depends
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        
        // Campaign permission
        $indexCampaign = $auth->createPermission('indexCampaign');
        $indexCampaign->description = 'See a campaign index';
        $auth->add($indexCampaign);

        $updateCampaign = $auth->createPermission('updateCampaign');
        $updateCampaign->description = 'Update a campaign';
        $auth->add($updateCampaign);
        
        // Create role and connect with rules.
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $indexCampaign);
        $auth->addChild($admin, $updateCampaign);
        
        // Give a shit to users.
        $auth->assign($admin, 1);
    }
    
    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}
