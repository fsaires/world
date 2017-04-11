<?php
use Migrations\AbstractMigration;

class World extends AbstractMigration
{
    public function up()
    {

        $this->table('cidades', ['id' => false, 'primary_key' => ['cidid']])
            ->addColumn('cidid', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('paiid', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('estid', 'string', [
                'default' => null,
                'limit' => 3,
                'null' => false,
            ])
            ->addColumn('cidnome', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->create();

        $this->table('estados', ['id' => false, 'primary_key' => ['estid']])
            ->addColumn('estid', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('paiid', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('estnome', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->create();

        $this->table('paises', ['id' => false, 'primary_key' => ['paiid']])
            ->addColumn('paiid', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('painome', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('paisigla', 'string', [
                'default' => null,
                'limit' => 2,
                'null' => false,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('cidades');
        $this->dropTable('estados');
        $this->dropTable('paises');
    }
}
