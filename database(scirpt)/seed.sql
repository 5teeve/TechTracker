-- Enclenchons d'abord la vérification des clés étrangères pour être rigoureux
PRAGMA foreign_keys = ON;

-- 1. Insertion des données de test pour la table 'categorie'
INSERT INTO categorie (nom_categorie) VALUES 
('Carte Mère'),
('Smartphone'),
('GPU');

-- 2. Insertion des données de test pour la table 'marque'
INSERT INTO marque (nom_marque) VALUES 
('Gigabyte'),
('Google'),
('Samsung');

-- 3. Insertion des données de test pour la table 'equipement'
-- (En faisant correspondre les id_categorie et id_marque insérés ci-dessus)
INSERT INTO equipement (modele, prix_unitaire, quantite_stock, id_categorie, id_marque) VALUES 
-- Exemple 1 : Une carte mère B550 de marque Gigabyte
-- id_categorie = 1 (Carte Mère), id_marque = 1 (Gigabyte)
('B550', 129.99, 15, 1, 1),

-- Exemple 2 : Un smartphone Pixel 7 de marque Google
-- id_categorie = 2 (Smartphone), id_marque = 2 (Google)
('Pixel 7', 649.00, 8, 2, 2),

-- Exemple 3 : Un smartphone S21 Ultra de marque Samsung
-- id_categorie = 2 (Smartphone), id_marque = 3 (Samsung)
('S21 Ultra', 899.50, 4, 2, 3);

SELECT 
    e.id_equipement,
    e.modele,
    c.nom_categorie,
    m.nom_marque,
    e.prix_unitaire,
    e.quantite_stock
FROM equipement e
JOIN categorie c ON e.id_categorie = c.id_categorie
JOIN marque m ON e.id_marque = m.id_marque;