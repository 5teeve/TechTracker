CREATE TABLE categorie (
    id_categorie INTEGER PRIMARY KEY AUTOINCREMENT,
    nom_categorie TEXT NOT NULL
);

CREATE TABLE marque (
    id_marque INTEGER PRIMARY KEY AUTOINCREMENT,
    nom_marque TEXT NOT NULL
);

CREATE TABLE equipement (
    id_equipement INTEGER PRIMARY KEY AUTOINCREMENT,
    modele TEXT NOT NULL,
    prix_unitaire REAL NOT NULL,
    quantite_stock INTEGER NOT NULL,
    id_categorie INTEGER NOT NULL,
    id_marque INTEGER NOT NULL,
    FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie),
    FOREIGN KEY (id_marque) REFERENCES marque(id_marque)
);