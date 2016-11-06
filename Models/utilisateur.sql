CREATE TABLE utilisateur(
id INTEGER PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(50) UNIQUE NOT NULL,
hash_password VARCHAR(60) NOT NULL,
prenom VARCHAR(50) NOT NULL,
nom VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
path_photo VARCHAR(255),
id_commune INTEGER,
isAdmin TINYINT DEFAULT 0,
CONSTRAINT check_utilisateur_isAdmin CHECK (isAdmin=0 OR isAdmin=1),
CONSTRAINT fk_utilisateur_commune FOREIGN KEY (id_commune) REFERENCES commune(id)
);