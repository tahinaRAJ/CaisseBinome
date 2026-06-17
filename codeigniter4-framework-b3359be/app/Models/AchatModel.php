<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatModel extends Model
{
    protected $table = 'achats';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'caisse_id',
        'produit_id',
        'numero_ticket',
        'client_reference',
        'quantite',
        'prix_unitaire',
        'montant_total',
        'statut',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function closeCurrentSession(int $caisseId, ?string $ticket = null): bool
    {
        return (bool) $this->builder()
            ->where('caisse_id', $caisseId)
            ->where('statut', 'en_cours')
            ->update([
                'statut' => 'cloture',
                'numero_ticket' => $ticket,
            ]);
    }
}
