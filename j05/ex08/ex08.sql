SELECT nom, prenom, YEAR(date_naissance) AS 'date de naissance' FROM db_cledant.fiche_personne WHERE YEAR(date_naissance) = 1989 ORDER BY nom ASC;
