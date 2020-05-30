<?php

use yii\db\Migration;

/**
 * Class m200530_151725_create_table_users
 */
class m200530_151725_create_table_users extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE `users` (
            `id` int(10) NOT NULL AUTO_INCREMENT,
            `name` varchar(40) NOT NULL,
            `email` varchar(30) NOT NULL,
            `status` varchar(20) NOT NULL,
            `password` varchar(100) NOT NULL,
            `created_at` datetime NOT NULL,
            `updated_at` datetime NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        
        $this->execute($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE `users`";
        
        $this->execute($sql);
    }
}
