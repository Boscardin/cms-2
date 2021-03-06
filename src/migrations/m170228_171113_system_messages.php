<?php

namespace craft\migrations;

use craft\db\Migration;
use craft\helpers\MigrationHelper;

/**
 * m170228_171113_system_messages migration.
 */
class m170228_171113_system_messages extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        MigrationHelper::renameTable('{{%emailmessages}}', '{{%systemmessages}}');

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m170228_171113_system_messages cannot be reverted.\n";

        return false;
    }
}
