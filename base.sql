-- Activation des clés étrangères dans SQLite
PRAGMA foreign_keys = ON;

-- 1. Table des Produits
CREATE TABLE produit (
    id_produit INTEGER PRIMARY KEY AUTOINCREMENT,
    designation TEXT NOT NULL,
    prix_unitaire REAL NOT NULL CHECK(prix_unitaire >= 0),
    quantite_stock INTEGER NOT NULL CHECK(quantite_stock >= 0)
);

-- 2. Table des Caisses
CREATE TABLE caisse (
    id_caisse INTEGER PRIMARY KEY AUTOINCREMENT,
    num_caisse TEXT NOT NULL UNIQUE
);

-- 3. Table des Achats (Entête de l'achat / Session client)
CREATE TABLE achat (
    id_achat INTEGER PRIMARY KEY AUTOINCREMENT,
    id_caisse INTEGER NOT NULL,
    date_achat DATETIME DEFAULT CURRENT_TIMESTAMP,
    est_cloture INTEGER DEFAULT 0 CHECK(est_cloture IN (0, 1)), -- 0 = En cours, 1 = Clôturé
    FOREIGN KEY (id_caisse) REFERENCES caisse(id_caisse) ON DELETE CASCADE
);

-- 4. Table Détails des Achats (Lignes du panier de la page de saisie)
CREATE TABLE detail_achat (
    id_detail INTEGER PRIMARY KEY AUTOINCREMENT,
    id_achat INTEGER NOT NULL,
    id_produit INTEGER NOT NULL,
    quantite INTEGER NOT NULL CHECK(quantite > 0),
    prix_unitaire_facture REAL NOT NULL, -- Sauvegarde du prix au moment de l'achat
    FOREIGN KEY (id_achat) REFERENCES achat(id_achat) ON DELETE CASCADE,
    FOREIGN KEY (id_produit) REFERENCES produit(id_produit)
);