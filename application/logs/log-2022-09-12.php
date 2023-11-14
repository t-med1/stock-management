<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-09-12 13:07:36 --> Severity: Notice --> Undefined index: num_facture /var/www/html/iatm/application/views/produit/details.php 371
ERROR - 2022-09-12 19:39:42 --> Severity: Notice --> Undefined index: num_facture /var/www/html/iatm/application/views/produit/details.php 371
ERROR - 2022-09-12 19:39:42 --> Severity: Notice --> Undefined index: num_facture /var/www/html/iatm/application/views/produit/details.php 371
ERROR - 2022-09-12 23:35:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '%' 
                             OR p.full_name LIKE '%rj'%' 
                  ' at line 1 - Invalid query: SELECT COUNT(p.id_produit) AS total FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 1 AND ( p.code_produit LIKE '%rj'%' 
                             OR p.full_name LIKE '%rj'%' 
                             OR c.full_name LIKE '%rj'%' 
                              OR sc.full_name LIKE '%rj'%' 
                             OR p.prix_achat LIKE '%rj'%' 
                             OR p.prix_vente LIKE '%rj'%' ) 
ERROR - 2022-09-12 23:35:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '(%' 
                             OR p.full_name LIKE '%rj'(%' 
                ' at line 1 - Invalid query: SELECT COUNT(p.id_produit) AS total FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 1 AND ( p.code_produit LIKE '%rj'(%' 
                             OR p.full_name LIKE '%rj'(%' 
                             OR c.full_name LIKE '%rj'(%' 
                              OR sc.full_name LIKE '%rj'(%' 
                             OR p.prix_achat LIKE '%rj'(%' 
                             OR p.prix_vente LIKE '%rj'(%' ) 
ERROR - 2022-09-12 23:35:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '%' 
                             OR p.full_name LIKE '%rj'%' 
                  ' at line 1 - Invalid query: SELECT COUNT(p.id_produit) AS total FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 1 AND ( p.code_produit LIKE '%rj'%' 
                             OR p.full_name LIKE '%rj'%' 
                             OR c.full_name LIKE '%rj'%' 
                              OR sc.full_name LIKE '%rj'%' 
                             OR p.prix_achat LIKE '%rj'%' 
                             OR p.prix_vente LIKE '%rj'%' ) 
