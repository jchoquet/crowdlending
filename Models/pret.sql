CREATE TABLE pret(
id INTEGER PRIMARY KEY AUTO_INCREMENT,
id_borrower INTEGER,
id_objet INTEGER,
isAccepted TINYINT DEFAULT 0,
date_accepted DATE DEFAULT NULL,
date_refused DATE DEFAULT NULL,
date_returned DATE DEFAULT NULL,
CONSTRAINT check_pret_isAccepted CHECK (isAccepted=-1 OR isAccepted=0 OR isAccepted=1),
CONSTRAINT fk_pret_borrower FOREIGN KEY (id_borrower) REFERENCES utilisateur(id) ON DELETE CASCADE,
CONSTRAINT fk_pret_objet FOREIGN KEY (id_objet) REFERENCES objet(id) ON DELETE CASCADE
);