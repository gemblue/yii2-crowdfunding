<?php

use yii\db\Migration;

/**
 * Class m200530_151647_create_table_campaign
 */
class m200530_151647_create_table_campaign extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE `campaign` (
            `id` int(10) NOT NULL AUTO_INCREMENT,
            `user_id` int(10) NOT NULL,
            `title` varchar(100) NOT NULL,
            `content` text NOT NULL,
            `target_amount` int(10) NOT NULL,
            `created_at` datetime NOT NULL,
            `updated_at` datetime NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        
        $this->execute($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE `campaign`";

        $this->execute($sql);
    }
}
