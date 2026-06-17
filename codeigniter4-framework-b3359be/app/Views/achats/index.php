<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>Saisie des achats<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="mb-3">
    <h4>Saisie des achats</h4>
    <small class="text-muted">Caisse N°<?= session('caisse')['numero'] ?> — ticket en cours</small>
</div>

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
                                <?= esc($p['designation']) ?> (<?= number_format($p['prix'], 0, ',', ' ') ?> Ar)
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
                <?php foreach ($achats as $a) : ?>
                    <?php $total += $a['montant_total']; ?>
                    <tr>
                        <td><?= esc($a['designation']) ?></td>
                        <td><?= number_format($a['prix_unitaire'], 0, ',', ' ') ?></td>
                        <td><?= $a['quantite'] ?></td>
                        <td><?= number_format($a['montant_total'], 0, ',', ' ') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end fw-bold">Total</td>
                    <td class="fw-bold"><?= number_format($total, 0, ',', ' ') ?></td>
                </tr>
            </tfoot>
        </table>

        <div class="text-end">
            <a href="<?= base_url('achats/cloturer') ?>"
               class="btn btn-danger"
               onclick="return confirm('Clôturer cet achat ?')">
                🔒 Clôturer achat
            </a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
