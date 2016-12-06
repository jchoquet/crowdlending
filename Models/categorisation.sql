CREATE TABLE categorisation(
id_categorie INTEGER,
id_objet INTEGER,
CONSTRAINT fk_categorisation_categorie FOREIGN KEY (id_categorie) REFERENCES categorie(id) ON DELETE CASCADE,
CONSTRAINT fk_categorisation_objet FOREIGN KEY (id_objet) REFERENCES objet(id) ON DELETE CASCADE,
CONSTRAINT pk_categorisation PRIMARY KEY (id_categorie, id_objet)
)ENGINE=InnoDB;