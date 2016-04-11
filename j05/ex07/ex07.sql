SELECT titre, resum FROM db_cledant.film WHERE titre OR resum LIKE '%42%' ORDER BY duree_min ASC;
