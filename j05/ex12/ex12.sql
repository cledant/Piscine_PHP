SELECT nom, prenom FROM db_cledant.fiche_personne WHERE LOCATE('-', nom) OR LOCATE('-', prenom) ORDER BY nom, prenom ASC;
