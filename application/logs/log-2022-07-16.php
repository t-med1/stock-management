<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-07-16 13:30:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ACCES 300MB%' OR p.description LIKE '%NETIS WF2409E POINT D'ACCES 300MB%')  
   ' at line 6 - Invalid query: SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie 
                                     FROM produit p 
                                     LEFT JOIN categorie c ON c.id_categorie = p.id_categorie 
                                     LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie 
                                     WHERE p.display = 1 
                                      AND (p.full_name LIKE '%NETIS WF2409E POINT D'ACCES 300MB%' OR p.description LIKE '%NETIS WF2409E POINT D'ACCES 300MB%')  
                                      
                                     LIMIT 10 
ERROR - 2022-07-16 18:22:32 --> Query error: Duplicate entry 'CHEVILLE 10 DETAIL' for key 'full_name' - Invalid query: INSERT INTO `produit` (`id_categorie`, `id_sub_categorie`, `code_produit`, `full_name`, `prix_achat`, `prix_vente`, `alert`, `description`, `image`) VALUES ('25', '191', 'PR4071JS6577', 'CHEVILLE 10 DETAIL', '0.1', '0.5', '30', '', NULL)
ERROR - 2022-07-16 19:16:40 --> Query error: Duplicate entry 'CHEVILLE' for key 'full_name' - Invalid query: INSERT INTO `sub_categorie` (`id_categorie`, `full_name`, `description`) VALUES ('26', 'CHEVILLE', '')
