<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperMarché — <?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background: #f4f6f8; }
        .topbar {
            background: #185FA5;
            color: #fff;
            padding: 10px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .topbar .caisse-badge {
            background: rgba(255,255,255,0.15);
            padding: 4px 14px;
            border-radius: 6px;
            font-size: 14px;
        }
        .navbar-custom {
            background: #0C447C;
        }
        .navbar-custom .nav-link {
            color: #B5D4F4 !important;
            font-size: 14px;
        }
        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: #fff !important;
            background: rgba(255,255,255,0.1);
            border-radius: 4px;
        }
        .main-content { padding: 24px; }
        footer {
            text-align: center;
            font-size: 12px;
            color: #aaa;
            padding: 12px;
            border-top: 1px solid #e0e0e0;
            margin-top: 24px;
        }
    </style>
    <?= $this->renderSection('styles') ?>
</head>
<body>

    <!-- Barre supérieure avec caisse active -->
    <div class="topbar">
        <span><strong>🛒 SuperMarché App</strong></span>
        <?php if (session()->has('caisse')) : ?>
            <span class="caisse-badge">
                🖥️ Caisse N°<?= session('caisse')['numero'] ?> — <?= session('caisse')['libelle'] ?>
            </span>
        <?php endif; ?>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand navbar-custom px-3">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() === '') ? 'active' : '' ?>"
                   href="<?= base_url('/') ?>">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= str_contains(uri_string(), 'achats') ? 'active' : '' ?>"
                   href="<?= base_url('achats') ?>">Achats</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= str_contains(uri_string(), 'produits') ? 'active' : '' ?>"
                   href="<?= base_url('produits') ?>">Produits</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout') ?>">Déconnexion</a>
            </li>
        </ul>
    </nav>

    <!-- Contenu principal -->
    <div class="main-content">
        <?= $this->renderSection('content') ?>
    </div>

    <footer>
        ITUniversity — TD SI-IHM CodeIgniter Promo 18 — Juin 2026
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
