<?php
/**
 * User: monir-dev
 * Date: 7/10/2020
 * Time: 8:07 AM
 */

class m0003_Create_post_table {
    public function up()
    {
        $db = \app\monirdev\phpcore\Application::$app->db;
        $SQL = "CREATE TABLE posts (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                body TEXT NULL,
                image TEXT NULL,
                user_id int NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\monirdev\phpcore\Application::$app->db;
        $SQL = "DROP TABLE posts;";
        $db->pdo->exec($SQL);
    }
}