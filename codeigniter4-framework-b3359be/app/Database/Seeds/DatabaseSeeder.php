<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $this->db->table('user')->insertBatch([
            [
                'nom'        => 'Admin',
                'email'      => 'admin@example.com',
                'mdp'        => password_hash('admin', PASSWORD_DEFAULT),
                'role'       => 'admin',
            ],
            [
                'nom'        => 'test',
                'email'      => 'test@example.com',
                'mdp'        => password_hash('user', PASSWORD_DEFAULT),
                'role'       => 'user',
            ],
        ]);
        


        $this->db->table('produits')->insertBatch([
            [
                'designation'     => 'Riz blanc 5kg',
                'prix'            => 25000,
                'quantite_stock'  => 25,
                'description'     => 'Sac de riz de 5 kg',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
            [
                'designation'     => 'Huile végétale 1L',
                'prix'            => 18000,
                'quantite_stock'  => 40,
                'description'     => 'Bouteille d huile de 1 litre',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
            [
                'designation'     => 'Sucre 1kg',
                'prix'            => 6500,
                'quantite_stock'  => 60,
                'description'     => 'Paquet de sucre',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
            [
                'designation'     => 'Lait en poudre 400g',
                'prix'            => 12000,
                'quantite_stock'  => 30,
                'description'     => 'Boite de lait en poudre',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
            [
                'designation'     => 'Savon de lessive',
                'prix'            => 3000,
                'quantite_stock'  => 80,
                'description'     => 'Savon pour lessive',
                'created_at'      => $now,
                'updated_at'      => $now,
            ],
        ]);

        $this->db->table('caisses')->insertBatch([
            [
                'numero'     => 1,
                'libelle'    => 'Caisse principale',
                'active'     => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'numero'     => 2,
                'libelle'    => 'Caisse secondaire',
                'active'     => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
