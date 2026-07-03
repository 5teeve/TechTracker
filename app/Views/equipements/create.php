<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= esc($titre) ?> - TechTracker</title>
</head>

<body>
    <h1><?= esc($titre) ?></h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <div style="color:red;">
            <?php foreach (session()->getFlashdata('errors') as $erreur): ?>
                <p><?= esc($erreur) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url($action_url) ?>" method="post">
        <?= csrf_field() ?>

        <?php if ($mode_edition === true): ?>
            <input type="hidden" name="_method" value="PUT">
        <?php endif; ?>

        <p>
            <label>Modèle :</label><br>
            <input type="text" name="modele" value="<?= esc(old('modele', $equipement['modele'] ?? '')) ?>">
        </p>

        <p>
            <label>Catégorie :</label><br>
            <select name="id_categorie">
                <option value="">-- Choisir --</option>
                <?php foreach ($categories as $categorie): ?>
                    <?php
                    $id_cat_courant = old('id_categorie', $equipement['id_categorie'] ?? '');
                    $selected = ($id_cat_courant == $categorie['id_categorie']) ? 'selected' : '';
                    ?>
                    <option value="<?= $categorie['id_categorie'] ?>" <?= $selected ?>>
                        <?= esc($categorie['nom_categorie']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label>Marque :</label><br>
            <select name="id_marque">
                <option value="">-- Choisir --</option>
                <?php foreach ($marques as $marque): ?>
                    <?php
                    $id_mar_courant = old('id_marque', $equipement['id_marque'] ?? '');
                    $selected = ($id_mar_courant == $marque['id_marque']) ? 'selected' : '';
                    ?>
                    <option value="<?= $marque['id_marque'] ?>" <?= $selected ?>>
                        <?= esc($marque['nom_marque']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label>Prix unitaire :</label><br>
            <input type="text" name="prix_unitaire"
                value="<?= esc(old('prix_unitaire', $equipement['prix_unitaire'] ?? '')) ?>">
        </p>

        <p>
            <label>Quantité en stock :</label><br>
            <input type="number" name="quantite_stock"
                value="<?= esc(old('quantite_stock', $equipement['quantite_stock'] ?? '')) ?>">
        </p>

        <button type="submit"><?= esc($bouton_texte) ?></button>
        <a href="/">Retour a l'accueil</a>
    </form>
</body>

</html>