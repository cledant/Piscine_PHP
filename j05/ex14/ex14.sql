SELECT etage_salle AS 'etage', SUM(nbr_siege) AS 'sieges' FROM db_cledant.salle GROUP BY etage_salle ORDER BY SUM(nbr_siege) DESC;
