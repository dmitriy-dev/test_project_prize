<?php
declare(strict_types=1);

use Phinx\Db\Table\Column;
use Phinx\Migration\AbstractMigration;

final class CreateUserBalanceLogsTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $users = $this->table('user_balance_logs');
        $users->addColumn('user_balance_id', Column::INTEGER)
              ->addColumn('amount', Column::BIGINTEGER)
              ->addColumn('type', Column::STRING)
              ->addTimestamps()
              ->addForeignKey('user_balance_id', 'user_balances', 'id')
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
