SELECT titre AS 'Titre', resum AS 'Resume', annee_prod FROM db_cledant.film INNER JOIN db_cledant.genre ON film.id_genre = genre.id_genre WHERE genre.nom = 'erotic' ORDER BY annee_prod DESC;
