CREATE TABLE categorie(
    id_categorie INTEGER PRIMARY KEY AUTOINCREMENT,
    nom_categorie TEXT
);

CREATE TABLE marque(
    id_marque INTEGER PRIMARY KEY AUTOINCREMENT,
    nom_marque TEXT
);

CREATE TABLE equipement(
    id_equipement INTEGER PRIMARY KEY AUTOINCREMENT,
    modele TEXT,
    prix_unitaire REAL,
    quantite_stock INTEGER,
    id_categorie INTEGER FOREIGN KEY REFERENCES categorie(id_categorie),
    id_marque INTEGER FOREIGN KEY REFERENCES marque(id_marque)
);