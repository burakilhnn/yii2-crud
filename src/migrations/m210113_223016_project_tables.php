<?php

use yii\db\Migration;

/**
 * Class m210113_223016_project_tables
 */
class m210113_223016_project_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('clubs', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'email' => $this->string(100)->notNull(),
            'address' => $this->string(255)->notNull(),
            'country' => $this->string(100)->notNull(),
            'created_at' => $this->dateTime()->notNull()
        ]);

        $this->createTable('branches', [
            'branch_id' => $this->primaryKey(),
            'club_id' => $this->integer()->notNull(),
            'branch_name' => $this->string(100)->notNull(),
            'branch_address' => $this->string()->notNull(),
            'branch_created_at' => $this->dateTime()->notNull(),
            'branch_status' => "ENUM('active', 'inactive')"
        ]);

        $this->addForeignKey('FK_club','branches','club_id','clubs','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_club','branches');
        $this->dropTable('clubs');
        $this->dropTable('branches');
    }
}
