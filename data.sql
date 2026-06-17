-- Insertion des 5 produits requis (avec les exemples du TD)
INSERT INTO produit (designation, prix_unitaire, quantite_stock) VALUES 
('Biscuit', 1000.0, 150),
('Pain', 400.0, 80),
('Chocolat', 2500.0, 50),
('Jus de fruits', 4500.0, 30),
('Eau minérale', 1200.0, 200);

-- Insertion des 2 caisses requises
INSERT INTO caisse (num_caisse) VALUES 
('Caisse N°1'),
('Caisse N°2');