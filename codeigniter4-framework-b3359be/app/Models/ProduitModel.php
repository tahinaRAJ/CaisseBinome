<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduitModel extends Model
{
    protected $table = 'produits';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'designation',
        'prix',
        'quantite_stock',
        'description',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getAllProducts(): array
    {
        return $this->orderBy('designation', 'ASC')->findAll();
    }

    public function searchByDesignation(string $term): array
    {
        if ($term === '') {
            return $this->getAllProducts();
        }

        return $this->like('designation', $term)
            ->orderBy('designation', 'ASC')
            ->findAll();
    }
}
