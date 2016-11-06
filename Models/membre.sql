CREATE TABLE membre(
id_groupe INTEGER,
id_utilisateur INTEGER,
CONSTRAINT fk_membre_groupe FOREIGN KEY (id_groupe) REFERENCES groupe(id) ON DELETE CASCADE,
CONSTRAINT fk_membre_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id) ON DELETE CASCADE,
CONSTRAINT pk_membre PRIMARY KEY (id_groupe, id_utilisateur)
);