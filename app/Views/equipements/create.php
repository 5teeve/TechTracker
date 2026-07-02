<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un matériel - TechTracker</title>
</head>
<body>
    <h1>Ajouter un nouveau matériel</h1>

    <?php if (isset($validation)): ?>
        <div style="color:red;"><?= $validation->listErrors() ?></div>
    <?php endif; ?>

    <form action="/equipements/create" method="post">
        <?= csrf_field() ?>

        <label>Modèle :</label><br>
        <input type="text" name="modele" value="<?= old('modele') ?>"><br><br>

        <label>Catégorie :</label><br>
        <select name="id_categorie">
            <option value="">-- Choisir --</option>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?= $categorie['id_categorie'] ?>"><?= esc($categorie['nom_categorie']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Marque :</label><br>
        <select name="id_marque">
            <option value="">-- Choisir --</option>
            <?php foreach ($marques as $marque): ?>
                <option value="<?= $marque['id_marque'] ?>"><?= esc($marque['nom_marque']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Prix unitaire :</label><br>
        <input type="text" name="prix_unitaire" value="<?= old('prix_unitaire') ?>"><br><br>

        <label>Quantité en stock :</label><br>
        <input type="number" name="quantite_stock" value="<?= old('quantite_stock') ?>"><br><br>

        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>