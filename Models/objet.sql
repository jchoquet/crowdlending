CREATE TABLE objet(
id INTEGER PRIMARY KEY AUTO_INCREMENT,
nom VARCHAR(255) NOT NULL,
prix FLOAT DEFAULT NULL,
path_photo VARCHAR(255),
id_owner INTEGER,
isAvailable TINYINT DEFAULT 1,
description TEXT,
CONSTRAINT check_object_isAvailable CHECK (isAvailable=0 OR isAvailable=1),
CONSTRAINT fk_objet_owner FOREIGN KEY (id_owner) REFERENCES utilisateur(id) ON DELETE CASCADE
);