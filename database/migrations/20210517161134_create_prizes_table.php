<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePrizesTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $users = $this->table('prizes');
        $users->addColumn('name', 'string')
              ->addColumn('value', 'string', ['null' => true])
              ->addColumn('type', 'string')
              ->addColumn('user_id', 'integer', ['null' => true])
              ->addTimestamps()
              ->addForeignKey('user_id', 'users', 'id', ['delete' => 'SET_NULL'])
              ->create();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropDatabase('users');
    }
}
