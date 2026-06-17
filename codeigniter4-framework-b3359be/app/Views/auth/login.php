<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - SuperMarché</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root {
            --brand-900: #0C447C;
            --brand-700: #185FA5;
            --brand-100: #EAF2FB;
            --ink: #16324F;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at top left, rgba(24, 95, 165, 0.18), transparent 35%),
                radial-gradient(circle at bottom right, rgba(12, 68, 124, 0.16), transparent 30%),
                linear-gradient(180deg, #f6f9fc 0%, #eef4fb 100%);
        }

        .login-shell {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            border: 0;
            border-radius: 24px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 60px rgba(14, 42, 77, 0.18);
        }

        .login-header {
            padding: 28px 28px 22px;
            background: linear-gradient(135deg, var(--brand-900), var(--brand-700));
            color: #fff;
        }

        .login-kicker {
            font-size: 12px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            opacity: 0.85;
            margin-bottom: 8px;
        }

        .login-header h1 {
            font-size: 1.7rem;
            margin: 0;
            font-weight: 700;
        }

        .login-body {
            padding: 28px;
        }

        .form-label {
            font-weight: 600;
            color: #27415c;
        }

        .form-control {
            border-radius: 14px;
            padding: 0.85rem 1rem;
            border: 1px solid #d7e2ee;
            background: #fbfdff;
        }

        .form-control:focus {
            border-color: var(--brand-700);
            box-shadow: 0 0 0 0.2rem rgba(24, 95, 165, 0.12);
        }

        .btn-login {
            width: 100%;
            border: 0;
            border-radius: 14px;
            padding: 0.9rem 1rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--brand-900), var(--brand-700));
            color: #fff;
        }

        .btn-login:hover {
            color: #fff;
            filter: brightness(1.05);
        }

        .login-footer {
            margin-top: 14px;
            font-size: 13px;
            color: #67809a;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-shell">
        <div class="login-card">
            <div class="login-header">
                <div class="login-kicker">SuperMarché App</div>
                <h1>Connexion</h1>
                <p class="mb-0 mt-2">Accédez à la caisse après authentification.</p>
            </div>

            <div class="login-body">
                <?php $loginError = session()->getFlashdata('erreur'); ?>
                <?php if (! empty($loginError)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= esc($loginError) ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse e-mail</label>
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            value="<?= esc(old('email') ?? '') ?>"
                            placeholder="exemple@domaine.com"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="mdp" class="form-label">Mot de passe</label>
                        <input
                            type="password"
                            class="form-control"
                            id="mdp"
                            name="mdp"
                            placeholder="Votre mot de passe"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-login">
                        Se connecter
                    </button>
                </form>

                <div class="login-footer">
                    Interface de caisse - CodeIgniter 4
                </div>
            </div>
        </div>
    </div>
</body>
</html>
