<?php
declare(strict_types=1);

use Phinx\Db\Table\Column;
use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $users = $this->table('users');
        $users->addColumn('name', Column::STRING)
              ->addColumn('email', Column::STRING)
              ->addColumn('token', Column::STRING)
              ->addColumn('password', Column::STRING)
              ->addTimestamps()
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
