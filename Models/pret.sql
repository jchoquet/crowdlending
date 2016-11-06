CREATE TABLE pret(
id INTEGER PRIMARY KEY AUTO_INCREMENT,
id_borrower INTEGER,
id_objet INTEGER,
accepted DATE DEFAULT NULL,
returned DATE DEFAULT NULL,
CONSTRAINT fk_pret_borrower FOREIGN KEY (id_borrower) REFERENCES utilisateur(id) ON DELETE CASCADE,
CONSTRAINT fk_pret_objet FOREIGN KEY (id_objet) REFERENCES objet(id) ON DELETE CASCADE
);