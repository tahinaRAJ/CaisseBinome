<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>Choix de caisse<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h1 class="h4 mb-3">Choisir une caisse</h1>

                <?php if (! empty($error)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= esc($error) ?>
                    </div>
                <?php endif; ?>

                <?php if (! empty($selectedCaisse)) : ?>
                    <div class="alert alert-info" role="alert">
                        Caisse en session :
                        <strong><?= esc($selectedCaisse['numero']) ?></strong>
                        <?= ! empty($selectedCaisse['libelle']) ? ' - ' . esc($selectedCaisse['libelle']) : '' ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('caisse/select') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="caisse_numero" class="form-label">Numéro de caisse</label>
                        <select name="caisse_numero" id="caisse_numero" class="form-select" required>
                            <option value="">-- Choisir --</option>
                            <?php foreach ($caisses as $caisse) : ?>
                                <option value="<?= esc($caisse['numero']) ?>">
                                    Caisse <?= esc($caisse['numero']) ?><?= ! empty($caisse['libelle']) ? ' - ' . esc($caisse['libelle']) : '' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
