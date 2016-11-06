CREATE TABLE besoin(
id INTEGER PRIMARY KEY AUTO_INCREMENT,
nom VARCHAR(255) NOT NULL,
path_photo VARCHAR(255),
id_asker INTEGER,
isAnswered TINYINT DEFAULT 0,
description TEXT,
CONSTRAINT check_object_isAnswered CHECK (isAnswered=0 OR isAnswered=1),
CONSTRAINT fk_besoin_asker FOREIGN KEY (id_asker) REFERENCES utilisateur(id)
);