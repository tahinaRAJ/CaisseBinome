<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de caisse</title>
</head>
<body>
    <h1>Choisir une caisse</h1>

    <?php if (! empty($error)) : ?>
        <p><?= esc($error) ?></p>
    <?php endif; ?>

    <?php if (! empty($selectedCaisse)) : ?>
        <p>Caisse en session: <?= esc($selectedCaisse['numero']) ?><?= ! empty($selectedCaisse['libelle']) ? ' - ' . esc($selectedCaisse['libelle']) : '' ?></p>
    <?php endif; ?>

    <form action="/caisse/select" method="post">
        <?= csrf_field() ?>

        <label for="caisse_numero">Numéro de caisse</label>
        <select name="caisse_numero" id="caisse_numero" required>
            <option value="">-- Choisir --</option>
            <?php foreach ($caisses as $caisse) : ?>
                <option value="<?= esc($caisse['numero']) ?>">
                    Caisse <?= esc($caisse['numero']) ?><?= ! empty($caisse['libelle']) ? ' - ' . esc($caisse['libelle']) : '' ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Valider</button>
    </form>
</body>
</html>
