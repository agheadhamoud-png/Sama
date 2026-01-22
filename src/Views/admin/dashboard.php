<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Admin' ?></title>
    <link rel="stylesheet" href="/Sama/public/css/style.css">
    <style>
        .admin-container { max-width: 1200px; margin: 0 auto; padding: 2rem; }
        .admin-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
        .data-table { width: 100%; border-collapse: collapse; margin-bottom: 2rem; }
        .data-table th, .data-table td { padding: 1rem; border-bottom: 1px solid #ddd; text-align: left; }
        .action-btn { padding: 0.5rem 1rem; border-radius: 4px; text-decoration: none; color: white; display: inline-block; }
        .btn-edit { background-color: #f39c12; }
        .btn-delete { background-color: #e74c3c; }
        .btn-create { background-color: #27ae60; }
    </style>
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="logo">SAMA ADMIN</div>
            <nav class="main-nav">
                <a href="/Sama/public/admin/logout" class="btn btn-secondary">Déconnexion</a>
            </nav>
        </div>
    </header>

    <main class="admin-container">
        <div class="admin-header">
            <h1>Tableau de Bord</h1>
        </div>

        <section>
            <div class="admin-header">
                <h2>Formations</h2>
                <a href="/Sama/public/admin/workshop/create" class="action-btn btn-create">Ajouter une formation</a>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($workshops as $w): ?>
                    <tr>
                        <!-- Support Array or Entity -->
                        <td><?= is_object($w) ? $w->getTitle() : $w['title'] ?></td>
                        <td><?= is_object($w) ? $w->getCategoryName() : ($w['category_name'] ?? '-') ?></td>
                        <td>
                            <?php $id = is_object($w) ? $w->getId() : $w['id']; ?>
                            <a href="/Sama/public/admin/workshop/edit/<?= $id ?>" class="action-btn btn-edit">Modifier</a>
                            <a href="/Sama/public/admin/workshop/delete/<?= $id ?>" class="action-btn btn-delete" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section>
            <div class="admin-header">
                <h2>Actualités</h2>
                <a href="/Sama/public/admin/news/create" class="action-btn btn-create">Ajouter une actualité</a>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($newsList as $news): ?>
                    <tr>
                        <td><?= $news['title'] ?></td>
                        <td><?= $news['created_at'] ?></td>
                        <td>
                            <a href="/Sama/public/admin/news/edit/<?= $news['id'] ?>" class="action-btn btn-edit">Modifier</a>
                            <a href="/Sama/public/admin/news/delete/<?= $news['id'] ?>" class="action-btn btn-delete" onclick="return confirm('Supprimer ?')">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
