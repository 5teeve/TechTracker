<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inventaire - TechTracker</title>
</head>
<body>
    <h1>Inventaire du matériel</h1>

    <a href="/equipements/new">+ Ajouter un matériel</a>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th><th>Modèle</th><th>Catégorie</th>
                <th>Marque</th><th>Prix unitaire</th><th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipements as $equipement): ?>
                <tr>
                    <td><?= esc($equipement['id_equipement']) ?></td>
                    <td><?= esc($equipement['modele']) ?></td>
                    <td><?= esc($equipement['nom_categorie']) ?></td>
                    <td><?= esc($equipement['nom_marque']) ?></td>
                    <td><?= esc($equipement['prix_unitaire']) ?> €</td>
                    <td><?= esc($equipement['quantite_stock']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>