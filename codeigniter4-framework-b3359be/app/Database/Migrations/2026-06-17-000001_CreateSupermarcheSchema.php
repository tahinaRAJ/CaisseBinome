<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSupermarcheSchema extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INTEGER',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'designation' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'prix' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 0,
            ],
            'quantite_stock' => [
                'type'       => 'INTEGER',
                'constraint' => 11,
                'default'    => 0,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('produits', true);

        $this->forge->addField([
            'id' => [
                'type'           => 'INTEGER',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'numero' => [
                'type'       => 'INTEGER',
                'constraint' => 11,
            ],
            'libelle' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'active' => [
                'type'       => 'INTEGER',
                'constraint' => 1,
                'default'    => 1,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('numero');
        $this->forge->createTable('caisses', true);

        $this->forge->addField([
            'id' => [
                'type'           => 'INTEGER',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'caisse_id' => [
                'type'       => 'INTEGER',
                'constraint' => 11,
            ],
            'produit_id' => [
                'type'       => 'INTEGER',
                'constraint' => 11,
            ],
            'numero_ticket' => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
                'null'       => true,
            ],
            'client_reference' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'quantite' => [
                'type'       => 'INTEGER',
                'constraint' => 11,
                'default'    => 1,
            ],
            'prix_unitaire' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 0,
            ],
            'montant_total' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 0,
            ],
            'statut' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'en_cours',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('caisse_id');
        $this->forge->addKey('produit_id');
        $this->forge->addForeignKey('caisse_id', 'caisses', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('produit_id', 'produits', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('achats', true);
    }

    public function down()
    {
        $this->forge->dropTable('achats', true);
        $this->forge->dropTable('caisses', true);
        $this->forge->dropTable('produits', true);
    }
}
