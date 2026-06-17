<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>Saisie des achats<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="mb-3">
    <h4>Saisie des achats</h4>
    <small class="text-muted">
        Caisse N°<?= esc($caisse['numero']) ?> —
        Ticket <?= esc($ticket ?? 'en cours') ?>
    </small>
</div>

<?php if (! empty($error)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= esc($error) ?>
    </div>
<?php endif; ?>

<?php if (! empty($message)) : ?>
    <div class="alert alert-success" role="alert">
        <?= esc($message) ?>
    </div>
<?php endif; ?>

<!-- Formulaire d'ajout -->
<div class="card mb-4">
    <div class="card-body">
        <form action="<?= base_url('achats/ajouter') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3 row align-items-center">
                <label class="col-sm-2 col-form-label">Produit</label>
                <div class="col-sm-6">
                    <select name="produit_id" class="form-select" required>
                        <option value="">-- Choisir --</option>
                        <?php foreach ($produits as $p) : ?>
                            <option value="<?= $p['id'] ?>">
                                <?= esc($p['designation']) ?> -
                                <?= number_format((float) $p['prix'], 0, ',', ' ') ?> Ar
                                (stock: <?= (int) $p['quantite_stock'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row align-items-center">
                <label class="col-sm-2 col-form-label">Quantité</label>
                <div class="col-sm-3">
                    <input type="number" name="quantite" class="form-control"
                           value="1" min="1" required>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
    </div>
</div>

<!-- Tableau récapitulatif -->
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Produit</th>
                    <th>Prix unit.</th>
                    <th>Qté</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php if (! empty($achats)) : ?>
                    <?php foreach ($achats as $a) : ?>
                        <?php $total += (float) $a['montant_total']; ?>
                        <tr>
                            <td><?= esc($a['designation']) ?></td>
                            <td><?= number_format((float) $a['prix_unitaire'], 0, ',', ' ') ?></td>
                            <td><?= (int) $a['quantite'] ?></td>
                            <td><?= number_format((float) $a['montant_total'], 0, ',', ' ') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            Aucun article saisi pour le moment.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end fw-bold">Total</td>
                    <td class="fw-bold"><?= number_format((float) $total, 0, ',', ' ') ?></td>
                </tr>
            </tfoot>
        </table>

        <div class="text-end">
            <button type="button" class="btn btn-outline-danger" disabled>
                🔒 Clôturer achat
            </button>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
