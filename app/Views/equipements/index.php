<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inventaire - TechTracker</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                <th>ID</th>
                <th>Modèle</th>
                <th>Catégorie</th>
                <th>Marque</th>
                <th>Prix unitaire</th>
                <th>Stock</th>
                <th>Actions</th>
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
                    <td>
                        <button>
                            <a href="<?= site_url('equipements/edit/' . esc($equipement['id_equipement'])) ?>">Modify</a>
                        </button>
                        <form action="<?= site_url('equipements/delete/' . esc($equipement['id_equipement'])) ?>"
                            method="post" class="form-delete" style="display:inline;">

                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn-delete">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // On récupère tous les formulaires de suppression
            const formulaires = document.querySelectorAll('.form-delete');

            formulaires.forEach(formulaire => {
                formulaire.addEventListener('submit', function (evenement) {
                    // Étape 1 : On bloque la soumission immédiate du formulaire
                    evenement.preventDefault();

                    // Étape 2 : On ouvre la fenêtre SweetAlert2
                    Swal.fire({
                        title: 'Confirmation',
                        text: "Cette action est irréversible !",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Oui, supprimer !',
                        cancelButtonText: 'Annuler'
                    }).then((resultat) => {
                        // Étape 3 : Si l'utilisateur a cliqué sur "Oui, supprimer !"
                        if (resultat.isConfirmed) {
                            // On soumet manuellement le formulaire en cours
                            formulaire.submit();
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>