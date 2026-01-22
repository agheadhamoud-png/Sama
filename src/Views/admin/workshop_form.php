<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/Sama/public/css/style.css">
    <style>
        .form-container { max-width: 800px; margin: 2rem auto; padding: 2rem; }
        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: bold; }
        .form-control { width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px; }
        textarea.form-control { height: 150px; }
    </style>
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="logo">SAMA ADMIN</div>
            <nav class="main-nav">
                <a href="/Sama/public/admin/dashboard" class="btn btn-secondary">Retourashboard</a>
            </nav>
        </div>
    </header>

    <main class="form-container">
        <h1><?= $title ?></h1>
        
        <?php 
            $action = isset($workshop) ? "/Sama/public/admin/workshop/update/" . (is_object($workshop) ? $workshop->getId() : $workshop['id']) : "/Sama/public/admin/workshop/store";
        ?>

        <form action="<?= $action ?>" method="POST">
            <div class="form-group">
                <label>Titre</label>
                <input type="text" name="title" class="form-control" value="<?= isset($workshop) ? (is_object($workshop) ? $workshop->getTitle() : $workshop['title']) : '' ?>" required>
            </div>

            <div class="form-group">
                <label>Catégorie</label>
                <select name="category_id" class="form-control" required>
                    <?php foreach ($categories as $cat): ?>
                        <?php 
                            // Cat can be array or object (if we use repo)
                            $catId = is_object($cat) ? $cat->getId() : $cat['id'];
                            $catName = is_object($cat) ? $cat->getName() : $cat['name'];
                            $currentCatId = isset($workshop) ? (is_object($workshop) ? $workshop->getCategoryId() : $workshop['category_id']) : null;
                            $selected = ($currentCatId == $catId) ? 'selected' : '';
                        ?>
                        <option value="<?= $catId ?>" <?= $selected ?>><?= $catName ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required><?= isset($workshop) ? (is_object($workshop) ? $workshop->getDescription() : $workshop['description']) : '' ?></textarea>
            </div>

            <!-- Other fields simplified for brevity but essential for functionality -->
            <div class="form-group">
                <label>Objectifs</label>
                <textarea name="objectives" class="form-control"><?= isset($workshop) ? (is_object($workshop) ? $workshop->getObjectives() : $workshop['objectives']) : '' ?></textarea>
            </div>
            
            <div class="form-group">
                <label>Public Cible</label>
                <input type="text" name="target_audience" class="form-control" value="<?= isset($workshop) ? (is_object($workshop) ? $workshop->getTargetAudience() : $workshop['target_audience']) : '' ?>">
            </div>

            <div class="form-group">
                <label>Planning / Horaires</label>
                <input type="text" name="schedule" class="form-control" value="<?= isset($workshop) ? (is_object($workshop) ? $workshop->getSchedule() : $workshop['schedule']) : '' ?>">
            </div>

            <div class="form-group">
                <label>Lieu</label>
                <input type="text" name="location" class="form-control" value="<?= isset($workshop) ? (is_object($workshop) ? $workshop->getLocation() : $workshop['location']) : '' ?>">
            </div>

            <div class="form-group">
                <label>Contact Info</label>
                <input type="text" name="contact_info" class="form-control" value="<?= isset($workshop) ? (is_object($workshop) ? $workshop->getContactInfo() : $workshop['contact_info']) : '' ?>">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </main>
</body>
</html>
