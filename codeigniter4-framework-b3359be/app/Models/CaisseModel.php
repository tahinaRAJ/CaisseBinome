<?php

namespace App\Models;

use CodeIgniter\Model;

class CaisseModel extends Model
{
    protected $table = 'caisses';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'numero',
        'libelle',
        'active',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getActiveCaisses(): array
    {
        return $this->where('active', 1)
            ->orderBy('numero', 'ASC')
            ->findAll();
    }

    public function findActiveByNumero(int $numero): ?array
    {
        $caisse = $this->where('numero', $numero)
            ->where('active', 1)
            ->first();

        return $caisse ?: null;
    }
}
