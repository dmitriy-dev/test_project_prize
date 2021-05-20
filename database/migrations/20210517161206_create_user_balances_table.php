<?php
declare(strict_types=1);

use Phinx\Db\Table\Column;
use Phinx\Migration\AbstractMigration;

final class CreateUserBalancesTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $users = $this->table('user_balances');
        $users->addColumn('user_id', Column::INTEGER)
              ->addColumn('amount', Column::BIGINTEGER)
              ->addTimestamps()
              ->addForeignKey('user_id', 'users', 'id')
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
