<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="/Sama/public/css/style.css">
    <style>
        .login-container { max-width: 400px; margin: 4rem auto; padding: 2rem; border: 1px solid #ddd; border-radius: 8px; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; }
        .form-group input { width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; }
        .error { color: red; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="text-center">Connexion SAMA</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form action="/Sama/public/admin/auth" method="POST">
            <div class="form-group">
                <label for="username">Utilisateur</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
        </form>
        <p class="mt-4"><a href="/Sama/public/index.html">Retour au site</a></p>
    </div>
</body>
</html>
