<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateSocietyMaintenance extends AbstractMigration
{
    public function change(): void
    {
        // Societies
        $this->table('societies')
            ->addColumn('name', 'string', ['limit' => 255])
            ->addColumn('address', 'text', ['null' => true])
            ->addTimestamps()
            ->create();

        // Wings
        $this->table('wings')
            ->addColumn('name', 'string', ['limit' => 50])
            ->addColumn('society_id', 'integer')
            ->addTimestamps()
            ->addForeignKey('society_id', 'societies', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
            ->create();

        // Members
        $this->table('members')
            ->addColumn('society_id', 'integer')
            ->addColumn('name', 'string', ['limit' => 255])
            ->addColumn('email', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('phone', 'string', ['limit' => 20, 'null' => true])
            ->addTimestamps()
            ->addForeignKey('society_id', 'societies', 'id', ['delete'=> 'CASCADE'])
            ->create();

        // Flats
        $this->table('flats')
            ->addColumn('wing_id', 'integer')
            ->addColumn('flat_no', 'string', ['limit' => 20])
            ->addColumn('member_id', 'integer', ['null' => true])
            ->addTimestamps()
            ->addForeignKey('wing_id', 'wings', 'id', ['delete'=> 'CASCADE'])
            ->addForeignKey('member_id', 'members', 'id', ['delete'=> 'SET_NULL'])
            ->create();

        // Maintenance Fees
        $this->table('maintenance_fees')
            ->addColumn('flat_id', 'integer')
            ->addColumn('amount', 'decimal', ['precision' => 10, 'scale' => 2])
            ->addColumn('month', 'string', ['limit' => 7]) // YYYY-MM
            ->addColumn('status', 'enum', ['values' => 'Pending,Paid', 'default' => 'Pending'])
            ->addTimestamps()
            ->addForeignKey('flat_id', 'flats', 'id', ['delete'=> 'CASCADE'])
            ->create();

        // Payments
        $this->table('payments')
            ->addColumn('fee_id', 'integer')
            ->addColumn('paid_amount', 'decimal', ['precision' => 10, 'scale' => 2])
            ->addColumn('paid_date', 'date')
            ->addTimestamps()
            ->addForeignKey('fee_id', 'maintenance_fees', 'id', ['delete'=> 'CASCADE'])
            ->create();
    }
}
