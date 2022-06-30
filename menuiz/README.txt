Pour la BDD j'ai simplement ajouter une colonne à la table t_d_user_usr : 

alter table t_d_user_usr add column `username` varchar(255) <-- (** Vous pouvez aussi mettre 1024 à vous de voir :) **)



J'ai aussi ajouté la colonne PRD_DEFINITION dans la table t_d_product_prd : (Pas utilisé dans le code)

alter table t_d_product_prd add column `PRD_DEFINITION` varchar(1024) DEFAULT NULL

