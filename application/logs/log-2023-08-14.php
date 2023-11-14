<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-08-14 09:29:29 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 2
ERROR - 2023-08-14 09:31:14 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COALESCE(COUNT(id_service),0) AS nbr FROM service WHERE display = 0
ERROR - 2023-08-14 09:31:20 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 2
ERROR - 2023-08-14 09:31:34 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 2
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'id_client' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 21
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'ice' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 25
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 29
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'responsable' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 33
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'remise' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 37
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'id_client' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 37
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'telephone' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 43
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'email' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 47
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'adresse' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 51
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'ville' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 55
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 71
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'id_client' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 73
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'display' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 74
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'display' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 83
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'pays' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 108
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'code_client' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 113
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'id_client' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 114
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'display' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 117
ERROR - 2023-08-14 09:31:42 --> Severity: Notice --> Trying to get property 'id_client' of non-object /home4/planetbu/public_html/iatm/application/views/client/modifier.php 122
ERROR - 2023-08-14 09:31:56 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_categorie` = '1'
ERROR - 2023-08-14 09:32:25 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_sub_categorie` = '1'
ERROR - 2023-08-14 09:32:29 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_categorie` = '1'
ERROR - 2023-08-14 09:32:50 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 1
ERROR - 2023-08-14 09:32:54 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:32:57 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:33:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:33:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:33:27 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 09:33:30 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: INSERT INTO `service` (`id_categorie`, `id_sub_categorie`, `full_name`, `prix_vente`, `description`, `image`) VALUES ('1', '1', 'Ignatius Cote', '33', 'Sit eum dolorem velit minim distinctio Optio ut officia mollit Nam deleniti voluptas', NULL)
ERROR - 2023-08-14 09:33:46 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 09:33:48 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 09:33:55 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT d.*, u.full_name AS utilisateur, u.role, cl.full_name AS client, v.id_vente, v.code_vente, v.id_facture FROM devis d LEFT JOIN `user` u ON u.id_user = d.id_user LEFT JOIN client cl ON cl.id_client = d.id_client LEFT JOIN vente v ON v.id_devis = d.id_devis WHERE d.date_devis BETWEEN '2023-08-01' AND '2023-08-31'
ERROR - 2023-08-14 09:33:57 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 09:34:02 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT f.*, cl.full_name AS client FROM facture f Left join client cl ON cl.id_client = f.id_client WHERE f.date BETWEEN '2023-08-01' AND '2023-08-31'
ERROR - 2023-08-14 09:34:03 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT d.*, u.full_name AS utilisateur, u.role, cl.full_name AS client, v.id_vente, v.code_vente, v.id_facture FROM devis d LEFT JOIN `user` u ON u.id_user = d.id_user LEFT JOIN client cl ON cl.id_client = d.id_client LEFT JOIN vente v ON v.id_devis = d.id_devis WHERE d.date_devis BETWEEN '2023-08-01' AND '2023-08-31'
ERROR - 2023-08-14 09:34:05 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 09:34:14 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT f.*, cl.full_name AS client FROM facture f Left join client cl ON cl.id_client = f.id_client WHERE f.date BETWEEN '2023-08-01' AND '2023-08-31'
ERROR - 2023-08-14 09:34:34 --> Query error: Duplicate entry 'admin' for key 'username' - Invalid query: INSERT INTO `user` (`full_name`, `username`, `role`, `password`) VALUES ('CLIENT COMPTOIR', 'admin', '0', '$2y$10$ZdPqfwOzKmLmRAR7GKrlGOjYBANCQafpd.Rz.5RvQrLVol0OPSVUG')
ERROR - 2023-08-14 09:34:37 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT count(*) as allcount
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 09:34:39 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 09:34:39 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 09:34:39 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 09:34:39 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 09:34:42 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 09:34:42 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 09:34:42 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 09:34:42 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 09:34:48 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT count(*) as allcount
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 09:35:03 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 09:35:10 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 09:35:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:35:29 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:35:29 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 927
ERROR - 2023-08-14 09:35:29 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 928
ERROR - 2023-08-14 09:35:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:35:40 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:35:40 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 927
ERROR - 2023-08-14 09:35:40 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 928
ERROR - 2023-08-14 09:37:25 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COALESCE(COUNT(id_service),0) AS nbr FROM service WHERE display = 0
ERROR - 2023-08-14 09:38:30 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 09:38:32 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT count(*) as allcount
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 09:38:38 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT d.*, u.full_name AS utilisateur, u.role, cl.full_name AS client, v.id_vente, v.code_vente, v.id_facture FROM devis d LEFT JOIN `user` u ON u.id_user = d.id_user LEFT JOIN client cl ON cl.id_client = d.id_client LEFT JOIN vente v ON v.id_devis = d.id_devis WHERE d.date_devis BETWEEN '2023-08-01' AND '2023-08-31'
ERROR - 2023-08-14 09:39:24 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 1
ERROR - 2023-08-14 09:39:45 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 1
ERROR - 2023-08-14 09:39:59 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_categorie` = '1'
ERROR - 2023-08-14 09:41:13 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_sub_categorie` = '1'
ERROR - 2023-08-14 09:42:37 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 1
ERROR - 2023-08-14 09:42:51 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_categorie` = '2'
ERROR - 2023-08-14 09:42:52 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 3
ERROR - 2023-08-14 09:43:01 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 3
ERROR - 2023-08-14 09:43:27 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_categorie` = '2'
ERROR - 2023-08-14 09:43:52 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_categorie` = '2'
ERROR - 2023-08-14 09:45:00 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_sub_categorie` = '2'
ERROR - 2023-08-14 09:45:26 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_sub_categorie` = '1'
ERROR - 2023-08-14 09:45:36 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_sub_categorie` = '2'
ERROR - 2023-08-14 09:46:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:47:05 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:47:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:47:20 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 2
ERROR - 2023-08-14 09:47:51 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 09:48:20 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: INSERT INTO `service` (`id_categorie`, `id_sub_categorie`, `full_name`, `prix_vente`, `description`, `image`) VALUES ('1', '1', 'Kieran Bruce', '11', 'Pariatur Rem consectetur ratione consequatur Incididunt sit minima possimus omnis libero maxime', NULL)
ERROR - 2023-08-14 09:48:26 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 3
ERROR - 2023-08-14 09:48:38 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:48:38 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:48:38 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:48:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:48:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:48:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:49:37 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:49:37 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:49:37 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:49:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:49:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:49:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:50:04 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: INSERT INTO `service` (`id_categorie`, `id_sub_categorie`, `full_name`, `prix_vente`, `description`, `image`) VALUES ('1', '1', 'Service1', '200', '', NULL)
ERROR - 2023-08-14 09:50:14 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 09:50:14 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 09:50:14 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 09:50:14 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 09:50:17 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:50:17 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:50:17 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:50:33 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 09:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:50:36 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 09:51:16 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 09:51:23 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 3
ERROR - 2023-08-14 09:51:46 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 09:52:05 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT d.*, u.full_name AS utilisateur, u.role, cl.full_name AS client, v.id_vente, v.code_vente, v.id_facture FROM devis d LEFT JOIN `user` u ON u.id_user = d.id_user LEFT JOIN client cl ON cl.id_client = d.id_client LEFT JOIN vente v ON v.id_devis = d.id_devis WHERE d.date_devis BETWEEN '2023-08-01' AND '2023-08-31'
ERROR - 2023-08-14 09:52:32 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT f.*, cl.full_name AS client FROM facture f Left join client cl ON cl.id_client = f.id_client WHERE f.date BETWEEN '2023-08-01' AND '2023-08-31'
ERROR - 2023-08-14 09:53:34 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 3
ERROR - 2023-08-14 09:53:51 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:53:51 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:53:51 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:54:00 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT count(*) as allcount
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 09:54:04 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 09:54:04 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 09:54:04 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 09:54:04 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 09:54:07 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT count(*) as allcount
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 09:54:44 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT count(*) as allcount
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 09:56:27 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_categorie` = '3'
ERROR - 2023-08-14 09:56:36 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_categorie` = '3'
ERROR - 2023-08-14 09:56:45 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 09:56:52 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_categorie` = '3'
ERROR - 2023-08-14 09:57:00 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_categorie` = '3'
ERROR - 2023-08-14 09:57:08 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COALESCE(COUNT(id_service),0) AS nbr FROM service WHERE display = 0
ERROR - 2023-08-14 09:57:43 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 09:57:43 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 09:57:43 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 09:57:43 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 09:58:19 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 3
ERROR - 2023-08-14 09:58:25 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 1
ERROR - 2023-08-14 09:58:54 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:58:54 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:58:54 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:59:34 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:59:34 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:59:34 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:59:39 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:59:39 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 927
ERROR - 2023-08-14 09:59:39 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 928
ERROR - 2023-08-14 09:59:39 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:59:39 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 927
ERROR - 2023-08-14 09:59:39 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 928
ERROR - 2023-08-14 09:59:39 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 09:59:39 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 927
ERROR - 2023-08-14 09:59:39 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 928
ERROR - 2023-08-14 10:01:45 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COALESCE(COUNT(id_service),0) AS nbr FROM service WHERE display = 0
ERROR - 2023-08-14 10:03:18 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 10:03:18 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 10:03:18 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 10:03:23 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 10:03:23 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 927
ERROR - 2023-08-14 10:03:23 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 928
ERROR - 2023-08-14 10:03:23 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 10:03:23 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 927
ERROR - 2023-08-14 10:03:23 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 928
ERROR - 2023-08-14 10:03:23 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 10:03:23 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 927
ERROR - 2023-08-14 10:03:23 --> Severity: Notice --> A non well formed numeric value encountered /home4/planetbu/public_html/iatm/application/controllers/Produit.php 928
ERROR - 2023-08-14 10:03:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 10:03:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 10:03:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 10:05:55 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT count(*) as allcount
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 10:10:35 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_sub_categorie` = '1'
ERROR - 2023-08-14 10:12:07 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_sub_categorie` = '1'
ERROR - 2023-08-14 10:12:15 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_sub_categorie` = '1'
ERROR - 2023-08-14 10:13:18 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_sub_categorie` = '1'
ERROR - 2023-08-14 11:01:39 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:03:56 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:06:15 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:06:53 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:08:18 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:09:04 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:10:05 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:10:08 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:10:15 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:10:21 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:11:16 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:11:22 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 1
ERROR - 2023-08-14 11:11:26 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 3
ERROR - 2023-08-14 11:11:33 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:11:51 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:11:53 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:11:58 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 4
ERROR - 2023-08-14 11:12:01 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 5
ERROR - 2023-08-14 11:13:22 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 5
ERROR - 2023-08-14 11:13:37 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 4
ERROR - 2023-08-14 11:14:50 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 5
ERROR - 2023-08-14 11:15:05 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 5
ERROR - 2023-08-14 11:15:11 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 5
ERROR - 2023-08-14 11:16:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:16:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:16:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:16:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:18:00 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: INSERT INTO `service` (`id_categorie`, `id_sub_categorie`, `full_name`, `prix_vente`, `description`, `image`) VALUES ('1', '1', 'Rose Velez', '41', 'Cum porro et libero reprehenderit consequatur voluptates nostrud sit hic aliquid', NULL)
ERROR - 2023-08-14 11:18:17 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 5
ERROR - 2023-08-14 11:18:45 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 5
ERROR - 2023-08-14 11:18:57 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 5
ERROR - 2023-08-14 11:22:01 --> Query error: Table 'planetbu_iatm_db.facture' doesn't exist - Invalid query: SELECT * FROM facture WHERE id_client = 5
ERROR - 2023-08-14 11:22:15 --> Severity: Notice --> Undefined variable: factures /home4/planetbu/public_html/iatm/application/views/client/details.php 222
ERROR - 2023-08-14 11:22:15 --> Severity: Warning --> Invalid argument supplied for foreach() /home4/planetbu/public_html/iatm/application/views/client/details.php 222
ERROR - 2023-08-14 11:23:19 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 5
ERROR - 2023-08-14 11:25:04 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 6
ERROR - 2023-08-14 11:26:15 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 7
ERROR - 2023-08-14 11:29:06 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 7
ERROR - 2023-08-14 11:30:24 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 11:30:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:30:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:30:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:30:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:30:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:30:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:30:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:31:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:31:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:31:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:31:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:31:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:31:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:31:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:31:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:31:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:31:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:31:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:31:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:31:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:31:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:34:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:34:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:34:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:34:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:34:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:34:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:34:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:36:34 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 11:37:29 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:37:29 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:37:29 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:37:29 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:37:29 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:37:29 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:37:29 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:37:57 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 11:40:58 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 8
ERROR - 2023-08-14 11:41:26 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 8
ERROR - 2023-08-14 11:41:40 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:41:40 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:41:40 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:41:40 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:41:40 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:41:40 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:41:40 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:41:40 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:42:19 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:42:19 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:42:19 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:42:19 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:42:19 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:42:19 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:42:19 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:42:19 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:46:16 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 11:46:32 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 11:46:49 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 11:47:11 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:11 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:11 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:11 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:11 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:11 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:11 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:11 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:12 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 11:47:14 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:14 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:14 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:14 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:14 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:14 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:14 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:14 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:47:31 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: INSERT INTO `service` (`id_categorie`, `id_sub_categorie`, `full_name`, `prix_vente`, `description`, `image`) VALUES ('1', '1', 'Serv', '200', 'creation site web', NULL)
ERROR - 2023-08-14 11:47:33 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 9
ERROR - 2023-08-14 11:53:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:53:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:53:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:53:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:53:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:53:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:53:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:53:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:53:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:54:13 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 10
ERROR - 2023-08-14 11:54:54 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 11
ERROR - 2023-08-14 11:56:18 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 12
ERROR - 2023-08-14 11:58:27 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:27 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:27 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:27 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:27 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:27 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:27 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:27 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:27 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:27 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:27 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:27 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 11:58:46 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 13
ERROR - 2023-08-14 12:00:25 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 13
ERROR - 2023-08-14 12:01:16 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 14
ERROR - 2023-08-14 12:04:47 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 14
ERROR - 2023-08-14 12:05:03 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 15
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:05:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:06:43 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 16
ERROR - 2023-08-14 12:08:35 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 17
ERROR - 2023-08-14 12:17:26 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 12:17:41 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 12:18:13 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: INSERT INTO `service` (`id_categorie`, `id_sub_categorie`, `full_name`, `prix_vente`, `description`, `image`) VALUES ('1', '1', 'Service1', '2001', 'creation site web', NULL)
ERROR - 2023-08-14 12:18:55 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: INSERT INTO `service` (`id_categorie`, `id_sub_categorie`, `full_name`, `prix_vente`, `description`, `image`) VALUES ('1', '1', 'Service1', '100', 'creation site web', NULL)
ERROR - 2023-08-14 12:20:10 --> Query error: Table 'planetbu_iatm_db.service' doesn't exist - Invalid query: INSERT INTO `service` (`id_categorie`, `id_sub_categorie`, `full_name`, `prix_vente`, `description`, `image`) VALUES ('1', '1', 'Service1', '1500', 'creation site web', NULL)
ERROR - 2023-08-14 12:20:46 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 18
ERROR - 2023-08-14 12:21:12 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 18
ERROR - 2023-08-14 12:21:15 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_service = 1
ERROR - 2023-08-14 12:22:33 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_service = 1
ERROR - 2023-08-14 12:22:54 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_service = 1
ERROR - 2023-08-14 12:23:02 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 19
ERROR - 2023-08-14 12:23:18 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 12:23:25 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 12:24:37 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 20
ERROR - 2023-08-14 12:25:19 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 12:26:04 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_service = 2
ERROR - 2023-08-14 12:27:47 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_service = 3
ERROR - 2023-08-14 12:31:25 --> Query error: Unknown column 'vd.id_service' in 'where clause' - Invalid query: SELECT vd.*, v.code_vente, v.num_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_service = 4
ERROR - 2023-08-14 12:35:09 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT vd.*, v.code_vente, v.id_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = 21
ERROR - 2023-08-14 12:40:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:41:28 --> Severity: Notice --> Trying to get property 'display' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 17
ERROR - 2023-08-14 12:41:28 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 23
ERROR - 2023-08-14 12:41:28 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 30
ERROR - 2023-08-14 12:41:28 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 30
ERROR - 2023-08-14 12:41:28 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 36
ERROR - 2023-08-14 12:41:28 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 36
ERROR - 2023-08-14 12:41:28 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 42
ERROR - 2023-08-14 12:41:28 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 47
ERROR - 2023-08-14 12:41:28 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 56
ERROR - 2023-08-14 12:41:28 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 114
ERROR - 2023-08-14 12:49:03 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:49:07 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:49:23 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:49:57 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:50:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:28 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 41
ERROR - 2023-08-14 12:51:28 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 55
ERROR - 2023-08-14 12:51:28 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 55
ERROR - 2023-08-14 12:51:28 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 67
ERROR - 2023-08-14 12:51:28 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 67
ERROR - 2023-08-14 12:51:28 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 79
ERROR - 2023-08-14 12:51:28 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 89
ERROR - 2023-08-14 12:51:28 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 107
ERROR - 2023-08-14 12:51:28 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 223
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:51:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 12:54:04 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 41
ERROR - 2023-08-14 12:54:04 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 55
ERROR - 2023-08-14 12:54:04 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 55
ERROR - 2023-08-14 12:54:04 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 67
ERROR - 2023-08-14 12:54:04 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 67
ERROR - 2023-08-14 12:54:04 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 79
ERROR - 2023-08-14 12:54:04 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 89
ERROR - 2023-08-14 12:54:04 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 107
ERROR - 2023-08-14 12:54:04 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 223
ERROR - 2023-08-14 12:57:44 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 40
ERROR - 2023-08-14 12:57:44 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 54
ERROR - 2023-08-14 12:57:44 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 54
ERROR - 2023-08-14 12:57:44 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 66
ERROR - 2023-08-14 12:57:44 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 66
ERROR - 2023-08-14 12:57:44 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 78
ERROR - 2023-08-14 12:57:44 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 88
ERROR - 2023-08-14 12:57:44 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 106
ERROR - 2023-08-14 12:57:44 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 222
ERROR - 2023-08-14 12:58:25 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 40
ERROR - 2023-08-14 12:58:25 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 54
ERROR - 2023-08-14 12:58:25 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 54
ERROR - 2023-08-14 12:58:25 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 66
ERROR - 2023-08-14 12:58:25 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 66
ERROR - 2023-08-14 12:58:25 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 78
ERROR - 2023-08-14 12:58:25 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 88
ERROR - 2023-08-14 12:58:25 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 106
ERROR - 2023-08-14 12:58:25 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 222
ERROR - 2023-08-14 12:58:40 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 40
ERROR - 2023-08-14 12:58:40 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 54
ERROR - 2023-08-14 12:58:40 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 54
ERROR - 2023-08-14 12:58:40 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 66
ERROR - 2023-08-14 12:58:40 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 66
ERROR - 2023-08-14 12:58:40 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 78
ERROR - 2023-08-14 12:58:40 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 88
ERROR - 2023-08-14 12:58:40 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 106
ERROR - 2023-08-14 12:58:40 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 222
ERROR - 2023-08-14 12:59:44 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 40
ERROR - 2023-08-14 12:59:44 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 54
ERROR - 2023-08-14 12:59:44 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 54
ERROR - 2023-08-14 12:59:44 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 66
ERROR - 2023-08-14 12:59:44 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 66
ERROR - 2023-08-14 12:59:44 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 78
ERROR - 2023-08-14 12:59:44 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 88
ERROR - 2023-08-14 12:59:44 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 106
ERROR - 2023-08-14 12:59:44 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 222
ERROR - 2023-08-14 12:59:58 --> Severity: Notice --> Trying to get property 'display' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 33
ERROR - 2023-08-14 12:59:58 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 45
ERROR - 2023-08-14 12:59:58 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 59
ERROR - 2023-08-14 12:59:58 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 59
ERROR - 2023-08-14 12:59:58 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 71
ERROR - 2023-08-14 12:59:58 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 71
ERROR - 2023-08-14 12:59:58 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 83
ERROR - 2023-08-14 12:59:58 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 93
ERROR - 2023-08-14 12:59:58 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 111
ERROR - 2023-08-14 12:59:58 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 227
ERROR - 2023-08-14 13:06:18 --> Severity: Notice --> Trying to get property 'display' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 33
ERROR - 2023-08-14 13:06:18 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 45
ERROR - 2023-08-14 13:06:18 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 59
ERROR - 2023-08-14 13:06:18 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 59
ERROR - 2023-08-14 13:06:18 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 71
ERROR - 2023-08-14 13:06:18 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 71
ERROR - 2023-08-14 13:06:18 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 83
ERROR - 2023-08-14 13:06:18 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 93
ERROR - 2023-08-14 13:06:18 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 111
ERROR - 2023-08-14 13:06:18 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 227
ERROR - 2023-08-14 13:06:21 --> Severity: Notice --> Trying to get property 'display' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 33
ERROR - 2023-08-14 13:06:21 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 45
ERROR - 2023-08-14 13:06:21 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 59
ERROR - 2023-08-14 13:06:21 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 59
ERROR - 2023-08-14 13:06:21 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 71
ERROR - 2023-08-14 13:06:21 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 71
ERROR - 2023-08-14 13:06:21 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 83
ERROR - 2023-08-14 13:06:21 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 93
ERROR - 2023-08-14 13:06:21 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 111
ERROR - 2023-08-14 13:06:21 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 227
ERROR - 2023-08-14 13:07:44 --> Severity: Notice --> Trying to get property 'display' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 33
ERROR - 2023-08-14 13:07:44 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 45
ERROR - 2023-08-14 13:07:44 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 59
ERROR - 2023-08-14 13:07:44 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 59
ERROR - 2023-08-14 13:07:44 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 71
ERROR - 2023-08-14 13:07:44 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 71
ERROR - 2023-08-14 13:07:44 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 83
ERROR - 2023-08-14 13:07:44 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 93
ERROR - 2023-08-14 13:07:44 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 111
ERROR - 2023-08-14 13:07:44 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 227
ERROR - 2023-08-14 13:07:54 --> Severity: Notice --> Trying to get property 'display' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 33
ERROR - 2023-08-14 13:07:54 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 45
ERROR - 2023-08-14 13:07:54 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 59
ERROR - 2023-08-14 13:07:54 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 59
ERROR - 2023-08-14 13:07:54 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 71
ERROR - 2023-08-14 13:07:54 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 71
ERROR - 2023-08-14 13:07:54 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 83
ERROR - 2023-08-14 13:07:54 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 93
ERROR - 2023-08-14 13:07:54 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 111
ERROR - 2023-08-14 13:07:54 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 227
ERROR - 2023-08-14 13:07:57 --> Severity: Notice --> Trying to get property 'display' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 33
ERROR - 2023-08-14 13:07:57 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 45
ERROR - 2023-08-14 13:07:57 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 59
ERROR - 2023-08-14 13:07:57 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 59
ERROR - 2023-08-14 13:07:57 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 71
ERROR - 2023-08-14 13:07:57 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 71
ERROR - 2023-08-14 13:07:57 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 83
ERROR - 2023-08-14 13:07:57 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 93
ERROR - 2023-08-14 13:07:57 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 111
ERROR - 2023-08-14 13:07:57 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 227
ERROR - 2023-08-14 13:08:04 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 43
ERROR - 2023-08-14 13:08:04 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:08:04 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:08:04 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:08:04 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:08:04 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 81
ERROR - 2023-08-14 13:08:04 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 91
ERROR - 2023-08-14 13:08:04 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 109
ERROR - 2023-08-14 13:08:04 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 225
ERROR - 2023-08-14 13:12:03 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 43
ERROR - 2023-08-14 13:12:03 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:12:03 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:12:03 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:12:03 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:12:03 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 81
ERROR - 2023-08-14 13:12:03 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 91
ERROR - 2023-08-14 13:12:03 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 109
ERROR - 2023-08-14 13:12:03 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 225
ERROR - 2023-08-14 13:12:18 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 43
ERROR - 2023-08-14 13:12:18 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:12:18 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:12:18 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:12:18 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:12:18 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 81
ERROR - 2023-08-14 13:12:18 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 91
ERROR - 2023-08-14 13:12:18 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 109
ERROR - 2023-08-14 13:12:18 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 225
ERROR - 2023-08-14 13:12:47 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 43
ERROR - 2023-08-14 13:12:47 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:12:47 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:12:47 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:12:47 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:12:47 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 81
ERROR - 2023-08-14 13:12:47 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 91
ERROR - 2023-08-14 13:12:47 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 109
ERROR - 2023-08-14 13:12:47 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 225
ERROR - 2023-08-14 13:17:55 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 56
ERROR - 2023-08-14 13:17:55 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 56
ERROR - 2023-08-14 13:17:55 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 68
ERROR - 2023-08-14 13:17:55 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 68
ERROR - 2023-08-14 13:17:55 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 80
ERROR - 2023-08-14 13:17:55 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 90
ERROR - 2023-08-14 13:17:55 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 108
ERROR - 2023-08-14 13:17:55 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 224
ERROR - 2023-08-14 13:39:11 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 43
ERROR - 2023-08-14 13:39:11 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:39:11 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:39:11 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:39:11 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:39:11 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 81
ERROR - 2023-08-14 13:39:11 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 91
ERROR - 2023-08-14 13:39:11 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 109
ERROR - 2023-08-14 13:39:11 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 225
ERROR - 2023-08-14 13:39:27 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 43
ERROR - 2023-08-14 13:39:27 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:39:27 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:39:27 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:39:27 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:39:27 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 81
ERROR - 2023-08-14 13:39:27 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 91
ERROR - 2023-08-14 13:39:27 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 109
ERROR - 2023-08-14 13:39:27 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 225
ERROR - 2023-08-14 13:40:41 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 43
ERROR - 2023-08-14 13:40:41 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:40:41 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:40:41 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:40:41 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:40:41 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 81
ERROR - 2023-08-14 13:40:41 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 91
ERROR - 2023-08-14 13:40:41 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 109
ERROR - 2023-08-14 13:40:41 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 225
ERROR - 2023-08-14 13:40:49 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 43
ERROR - 2023-08-14 13:40:49 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:40:49 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:40:49 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:40:49 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:40:49 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 81
ERROR - 2023-08-14 13:40:49 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 91
ERROR - 2023-08-14 13:40:49 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 109
ERROR - 2023-08-14 13:40:49 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 225
ERROR - 2023-08-14 13:44:25 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 43
ERROR - 2023-08-14 13:44:25 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:44:25 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 57
ERROR - 2023-08-14 13:44:25 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:44:25 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 69
ERROR - 2023-08-14 13:44:25 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 81
ERROR - 2023-08-14 13:44:25 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 91
ERROR - 2023-08-14 13:44:25 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 109
ERROR - 2023-08-14 13:44:25 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 225
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:53:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:22 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:22 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:22 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:22 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:22 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:22 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:22 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:54:28 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 42
ERROR - 2023-08-14 13:54:28 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 55
ERROR - 2023-08-14 13:54:28 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 55
ERROR - 2023-08-14 13:54:28 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 67
ERROR - 2023-08-14 13:54:28 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 67
ERROR - 2023-08-14 13:54:28 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 79
ERROR - 2023-08-14 13:54:28 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 89
ERROR - 2023-08-14 13:54:28 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 107
ERROR - 2023-08-14 13:54:28 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 223
ERROR - 2023-08-14 13:57:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 13:57:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:02:05 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 58
ERROR - 2023-08-14 14:02:05 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 58
ERROR - 2023-08-14 14:02:05 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 70
ERROR - 2023-08-14 14:02:05 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 70
ERROR - 2023-08-14 14:02:05 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 82
ERROR - 2023-08-14 14:02:05 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 92
ERROR - 2023-08-14 14:02:05 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 110
ERROR - 2023-08-14 14:02:05 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 226
ERROR - 2023-08-14 14:02:14 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:02:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:02:17 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:02:37 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:02:40 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:03:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:04:36 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 58
ERROR - 2023-08-14 14:04:36 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 58
ERROR - 2023-08-14 14:04:36 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 70
ERROR - 2023-08-14 14:04:36 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 70
ERROR - 2023-08-14 14:04:36 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 82
ERROR - 2023-08-14 14:04:36 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 92
ERROR - 2023-08-14 14:04:36 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 110
ERROR - 2023-08-14 14:04:36 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 226
ERROR - 2023-08-14 14:04:59 --> Severity: Notice --> Trying to get property 'id_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 58
ERROR - 2023-08-14 14:04:59 --> Severity: Notice --> Trying to get property 'categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 58
ERROR - 2023-08-14 14:04:59 --> Severity: Notice --> Trying to get property 'id_sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 70
ERROR - 2023-08-14 14:04:59 --> Severity: Notice --> Trying to get property 'sub_categorie' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 70
ERROR - 2023-08-14 14:04:59 --> Severity: Notice --> Trying to get property 'prix_vente' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 82
ERROR - 2023-08-14 14:04:59 --> Severity: Notice --> Trying to get property 'description' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 92
ERROR - 2023-08-14 14:04:59 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 110
ERROR - 2023-08-14 14:04:59 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 226
ERROR - 2023-08-14 14:07:57 --> Severity: error --> Exception: syntax error, unexpected '$cout_revient' (T_VARIABLE) /home4/planetbu/public_html/iatm/application/controllers/Produit.php 853
ERROR - 2023-08-14 14:08:00 --> Severity: error --> Exception: syntax error, unexpected '$cout_revient' (T_VARIABLE) /home4/planetbu/public_html/iatm/application/controllers/Produit.php 853
ERROR - 2023-08-14 14:08:19 --> Severity: error --> Exception: syntax error, unexpected '$cout_revient' (T_VARIABLE) /home4/planetbu/public_html/iatm/application/controllers/Produit.php 853
ERROR - 2023-08-14 14:08:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:13:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:13:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:15:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:15:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:15:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:27 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:16:27 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:16:37 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:16:37 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:16:49 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:17:14 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:17:14 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:17:21 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:17:21 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:17:22 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:17:22 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:17:23 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:17:23 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:17:24 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:17:24 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:17:34 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:17:34 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:17:35 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:17:35 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:18:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:18:09 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:18:09 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:18:10 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:18:10 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:21:10 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:21:10 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:21:12 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:21:12 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:21:13 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:21:13 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:21:34 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:21:34 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:22:26 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:22:26 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:22:32 --> Severity: Notice --> Trying to get property 'id_service' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 85
ERROR - 2023-08-14 14:22:32 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 201
ERROR - 2023-08-14 14:23:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:23:49 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 200
ERROR - 2023-08-14 14:23:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:26:15 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 200
ERROR - 2023-08-14 14:27:13 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 200
ERROR - 2023-08-14 14:27:16 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 200
ERROR - 2023-08-14 14:29:14 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 200
ERROR - 2023-08-14 14:29:15 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/details.php 200
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:29:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:05 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:06 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 14:30:07 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:38 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:38 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:34:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:35:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 14:36:52 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 14:38:58 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 14:39:02 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 14:39:12 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 14:43:55 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 97
ERROR - 2023-08-14 14:43:55 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 159
ERROR - 2023-08-14 14:44:51 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 14:45:05 --> 404 Page Not Found: Service/modofier
ERROR - 2023-08-14 14:45:13 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 97
ERROR - 2023-08-14 14:45:13 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 159
ERROR - 2023-08-14 15:01:44 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 97
ERROR - 2023-08-14 15:01:44 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 159
ERROR - 2023-08-14 15:01:48 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 97
ERROR - 2023-08-14 15:01:48 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 159
ERROR - 2023-08-14 15:05:01 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 97
ERROR - 2023-08-14 15:05:01 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 159
ERROR - 2023-08-14 15:06:43 --> Severity: Notice --> Undefined variable: service_sub_categorie /home4/planetbu/public_html/iatm/application/views/service/modifier.php 60
ERROR - 2023-08-14 15:06:43 --> Severity: Notice --> Trying to get property 'full_name' of non-object /home4/planetbu/public_html/iatm/application/views/service/modifier.php 60
ERROR - 2023-08-14 15:06:43 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 97
ERROR - 2023-08-14 15:06:43 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 159
ERROR - 2023-08-14 15:10:53 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 97
ERROR - 2023-08-14 15:10:53 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 159
ERROR - 2023-08-14 15:14:00 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 282
ERROR - 2023-08-14 15:14:00 --> Severity: Warning --> session_set_cookie_params(): Cannot change session cookie parameters when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 294
ERROR - 2023-08-14 15:14:00 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 304
ERROR - 2023-08-14 15:14:00 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 314
ERROR - 2023-08-14 15:14:00 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 315
ERROR - 2023-08-14 15:14:00 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 316
ERROR - 2023-08-14 15:14:00 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 317
ERROR - 2023-08-14 15:14:00 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 375
ERROR - 2023-08-14 15:14:00 --> Severity: Warning --> session_set_save_handler(): Cannot change save handler when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 110
ERROR - 2023-08-14 15:14:00 --> Severity: Warning --> session_start(): Cannot start session when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 143
ERROR - 2023-08-14 15:14:00 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/index.php:313) /home4/planetbu/public_html/iatm/system/helpers/url_helper.php 561
ERROR - 2023-08-14 15:15:24 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 282
ERROR - 2023-08-14 15:15:24 --> Severity: Warning --> session_set_cookie_params(): Cannot change session cookie parameters when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 294
ERROR - 2023-08-14 15:15:24 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 304
ERROR - 2023-08-14 15:15:24 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 314
ERROR - 2023-08-14 15:15:24 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 315
ERROR - 2023-08-14 15:15:24 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 316
ERROR - 2023-08-14 15:15:24 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 317
ERROR - 2023-08-14 15:15:24 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 375
ERROR - 2023-08-14 15:15:24 --> Severity: Warning --> session_set_save_handler(): Cannot change save handler when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 110
ERROR - 2023-08-14 15:15:24 --> Severity: Warning --> session_start(): Cannot start session when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 143
ERROR - 2023-08-14 15:15:24 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/index.php:313) /home4/planetbu/public_html/iatm/system/helpers/url_helper.php 561
ERROR - 2023-08-14 15:15:37 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 282
ERROR - 2023-08-14 15:15:37 --> Severity: Warning --> session_set_cookie_params(): Cannot change session cookie parameters when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 294
ERROR - 2023-08-14 15:15:37 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 304
ERROR - 2023-08-14 15:15:37 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 314
ERROR - 2023-08-14 15:15:37 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 315
ERROR - 2023-08-14 15:15:37 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 316
ERROR - 2023-08-14 15:15:37 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 317
ERROR - 2023-08-14 15:15:37 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 375
ERROR - 2023-08-14 15:15:37 --> Severity: Warning --> session_set_save_handler(): Cannot change save handler when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 110
ERROR - 2023-08-14 15:15:37 --> Severity: Warning --> session_start(): Cannot start session when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 143
ERROR - 2023-08-14 15:15:37 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/index.php:313) /home4/planetbu/public_html/iatm/system/helpers/url_helper.php 561
ERROR - 2023-08-14 15:16:13 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 282
ERROR - 2023-08-14 15:16:13 --> Severity: Warning --> session_set_cookie_params(): Cannot change session cookie parameters when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 294
ERROR - 2023-08-14 15:16:13 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 304
ERROR - 2023-08-14 15:16:13 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 314
ERROR - 2023-08-14 15:16:13 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 315
ERROR - 2023-08-14 15:16:13 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 316
ERROR - 2023-08-14 15:16:13 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 317
ERROR - 2023-08-14 15:16:13 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 375
ERROR - 2023-08-14 15:16:13 --> Severity: Warning --> session_set_save_handler(): Cannot change save handler when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 110
ERROR - 2023-08-14 15:16:13 --> Severity: Warning --> session_start(): Cannot start session when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 143
ERROR - 2023-08-14 15:16:13 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/index.php:313) /home4/planetbu/public_html/iatm/system/helpers/url_helper.php 561
ERROR - 2023-08-14 15:17:58 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 282
ERROR - 2023-08-14 15:17:58 --> Severity: Warning --> session_set_cookie_params(): Cannot change session cookie parameters when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 294
ERROR - 2023-08-14 15:17:58 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 304
ERROR - 2023-08-14 15:17:58 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 314
ERROR - 2023-08-14 15:17:58 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 315
ERROR - 2023-08-14 15:17:58 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 316
ERROR - 2023-08-14 15:17:58 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 317
ERROR - 2023-08-14 15:17:58 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 375
ERROR - 2023-08-14 15:17:58 --> Severity: Warning --> session_set_save_handler(): Cannot change save handler when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 110
ERROR - 2023-08-14 15:17:58 --> Severity: Warning --> session_start(): Cannot start session when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 143
ERROR - 2023-08-14 15:17:58 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/index.php:313) /home4/planetbu/public_html/iatm/system/helpers/url_helper.php 561
ERROR - 2023-08-14 15:18:00 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 282
ERROR - 2023-08-14 15:18:00 --> Severity: Warning --> session_set_cookie_params(): Cannot change session cookie parameters when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 294
ERROR - 2023-08-14 15:18:00 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 304
ERROR - 2023-08-14 15:18:00 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 314
ERROR - 2023-08-14 15:18:00 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 315
ERROR - 2023-08-14 15:18:00 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 316
ERROR - 2023-08-14 15:18:00 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 317
ERROR - 2023-08-14 15:18:00 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 375
ERROR - 2023-08-14 15:18:00 --> Severity: Warning --> session_set_save_handler(): Cannot change save handler when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 110
ERROR - 2023-08-14 15:18:00 --> Severity: Warning --> session_start(): Cannot start session when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 143
ERROR - 2023-08-14 15:18:00 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/index.php:313) /home4/planetbu/public_html/iatm/system/helpers/url_helper.php 561
ERROR - 2023-08-14 15:18:03 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 282
ERROR - 2023-08-14 15:18:03 --> Severity: Warning --> session_set_cookie_params(): Cannot change session cookie parameters when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 294
ERROR - 2023-08-14 15:18:03 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 304
ERROR - 2023-08-14 15:18:03 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 314
ERROR - 2023-08-14 15:18:03 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 315
ERROR - 2023-08-14 15:18:03 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 316
ERROR - 2023-08-14 15:18:03 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 317
ERROR - 2023-08-14 15:18:03 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 375
ERROR - 2023-08-14 15:18:03 --> Severity: Warning --> session_set_save_handler(): Cannot change save handler when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 110
ERROR - 2023-08-14 15:18:03 --> Severity: Warning --> session_start(): Cannot start session when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 143
ERROR - 2023-08-14 15:18:03 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/index.php:313) /home4/planetbu/public_html/iatm/system/helpers/url_helper.php 561
ERROR - 2023-08-14 15:18:05 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 282
ERROR - 2023-08-14 15:18:05 --> Severity: Warning --> session_set_cookie_params(): Cannot change session cookie parameters when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 294
ERROR - 2023-08-14 15:18:05 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 304
ERROR - 2023-08-14 15:18:05 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 314
ERROR - 2023-08-14 15:18:05 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 315
ERROR - 2023-08-14 15:18:05 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 316
ERROR - 2023-08-14 15:18:05 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 317
ERROR - 2023-08-14 15:18:05 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 375
ERROR - 2023-08-14 15:18:05 --> Severity: Warning --> session_set_save_handler(): Cannot change save handler when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 110
ERROR - 2023-08-14 15:18:05 --> Severity: Warning --> session_start(): Cannot start session when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 143
ERROR - 2023-08-14 15:18:05 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/index.php:313) /home4/planetbu/public_html/iatm/system/helpers/url_helper.php 561
ERROR - 2023-08-14 15:18:07 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 282
ERROR - 2023-08-14 15:18:07 --> Severity: Warning --> session_set_cookie_params(): Cannot change session cookie parameters when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 294
ERROR - 2023-08-14 15:18:07 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 304
ERROR - 2023-08-14 15:18:07 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 314
ERROR - 2023-08-14 15:18:07 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 315
ERROR - 2023-08-14 15:18:07 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 316
ERROR - 2023-08-14 15:18:07 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 317
ERROR - 2023-08-14 15:18:07 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 375
ERROR - 2023-08-14 15:18:07 --> Severity: Warning --> session_set_save_handler(): Cannot change save handler when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 110
ERROR - 2023-08-14 15:18:07 --> Severity: Warning --> session_start(): Cannot start session when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 143
ERROR - 2023-08-14 15:18:07 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/index.php:313) /home4/planetbu/public_html/iatm/system/helpers/url_helper.php 561
ERROR - 2023-08-14 15:18:11 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 282
ERROR - 2023-08-14 15:18:11 --> Severity: Warning --> session_set_cookie_params(): Cannot change session cookie parameters when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 294
ERROR - 2023-08-14 15:18:11 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 304
ERROR - 2023-08-14 15:18:11 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 314
ERROR - 2023-08-14 15:18:11 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 315
ERROR - 2023-08-14 15:18:11 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 316
ERROR - 2023-08-14 15:18:11 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 317
ERROR - 2023-08-14 15:18:11 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 375
ERROR - 2023-08-14 15:18:11 --> Severity: Warning --> session_set_save_handler(): Cannot change save handler when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 110
ERROR - 2023-08-14 15:18:11 --> Severity: Warning --> session_start(): Cannot start session when headers already sent /home4/planetbu/public_html/iatm/system/libraries/Session/Session.php 143
ERROR - 2023-08-14 15:19:20 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 97
ERROR - 2023-08-14 15:19:20 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 159
ERROR - 2023-08-14 15:19:33 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 15:19:46 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 15:19:57 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 97
ERROR - 2023-08-14 15:19:57 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 159
ERROR - 2023-08-14 15:20:06 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 15:20:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 15:20:48 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 15:23:36 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 97
ERROR - 2023-08-14 15:23:36 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 159
ERROR - 2023-08-14 15:25:23 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 15:25:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 15:27:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 15:27:50 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 15:27:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 15:29:05 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 15:29:23 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 15:29:57 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_categorie` = '1'
ERROR - 2023-08-14 15:30:00 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT *
FROM `service`
WHERE `display` = 1
AND `id_categorie` = '1'
ERROR - 2023-08-14 15:30:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 15:33:35 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 190
ERROR - 2023-08-14 15:33:35 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 310
ERROR - 2023-08-14 15:35:06 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 15:35:15 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 190
ERROR - 2023-08-14 15:35:15 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 310
ERROR - 2023-08-14 15:36:13 --> Severity: Notice --> Undefined property: stdClass::$display /home4/planetbu/public_html/iatm/application/views/service/modifier.php 311
ERROR - 2023-08-14 15:36:38 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT COUNT(id_service) AS total FROM service WHERE display = 1
ERROR - 2023-08-14 15:36:39 --> Query error: Unknown column 'display' in 'field list' - Invalid query: UPDATE `service` SET `id_categorie` = '1', `full_name` = 'Updated Service ', `prix_vente` = '2000', `description` = 'creation site web', `display` = 1
WHERE `id_service` = '1'
ERROR - 2023-08-14 15:38:07 --> Severity: Notice --> Undefined variable: produits /home4/planetbu/public_html/iatm/application/views/produit/liste.php 68
ERROR - 2023-08-14 15:38:07 --> Severity: Warning --> Invalid argument supplied for foreach() /home4/planetbu/public_html/iatm/application/views/produit/liste.php 68
ERROR - 2023-08-14 15:40:53 --> Severity: Notice --> Undefined variable: produits /home4/planetbu/public_html/iatm/application/views/produit/liste.php 69
ERROR - 2023-08-14 15:40:53 --> Severity: Warning --> Invalid argument supplied for foreach() /home4/planetbu/public_html/iatm/application/views/produit/liste.php 69
ERROR - 2023-08-14 15:40:56 --> Severity: Notice --> Undefined variable: produits /home4/planetbu/public_html/iatm/application/views/produit/liste.php 69
ERROR - 2023-08-14 15:40:56 --> Severity: Warning --> Invalid argument supplied for foreach() /home4/planetbu/public_html/iatm/application/views/produit/liste.php 69
ERROR - 2023-08-14 15:46:35 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 15:46:40 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 15:46:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:00:46 --> Severity: Notice --> Undefined index: draw /home4/planetbu/public_html/iatm/application/controllers/Produit.php 784
ERROR - 2023-08-14 16:00:46 --> Severity: Notice --> Undefined index: start /home4/planetbu/public_html/iatm/application/controllers/Produit.php 785
ERROR - 2023-08-14 16:00:46 --> Severity: Notice --> Undefined index: length /home4/planetbu/public_html/iatm/application/controllers/Produit.php 786
ERROR - 2023-08-14 16:00:46 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:00:46 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:00:46 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:00:46 --> Severity: Notice --> Undefined index: columns /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:00:46 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:00:46 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:00:46 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:00:46 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:00:46 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:00:46 --> Severity: Notice --> Undefined index: search /home4/planetbu/public_html/iatm/application/controllers/Produit.php 790
ERROR - 2023-08-14 16:00:46 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 790
ERROR - 2023-08-14 16:00:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT  OFFSET' at line 1 - Invalid query: SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 1 ORDER BY   LIMIT  OFFSET 
ERROR - 2023-08-14 16:00:46 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 16:02:04 --> Severity: Notice --> Undefined index: draw /home4/planetbu/public_html/iatm/application/controllers/Produit.php 784
ERROR - 2023-08-14 16:02:04 --> Severity: Notice --> Undefined index: start /home4/planetbu/public_html/iatm/application/controllers/Produit.php 785
ERROR - 2023-08-14 16:02:04 --> Severity: Notice --> Undefined index: length /home4/planetbu/public_html/iatm/application/controllers/Produit.php 786
ERROR - 2023-08-14 16:02:04 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:02:04 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:02:04 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:02:04 --> Severity: Notice --> Undefined index: columns /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:02:04 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:02:04 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:02:04 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:02:04 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:02:04 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:02:04 --> Severity: Notice --> Undefined index: search /home4/planetbu/public_html/iatm/application/controllers/Produit.php 790
ERROR - 2023-08-14 16:02:04 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 790
ERROR - 2023-08-14 16:02:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT  OFFSET' at line 1 - Invalid query: SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 1 ORDER BY   LIMIT  OFFSET 
ERROR - 2023-08-14 16:02:04 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 16:02:22 --> Severity: Notice --> Undefined index: draw /home4/planetbu/public_html/iatm/application/controllers/Produit.php 784
ERROR - 2023-08-14 16:02:22 --> Severity: Notice --> Undefined index: start /home4/planetbu/public_html/iatm/application/controllers/Produit.php 785
ERROR - 2023-08-14 16:02:22 --> Severity: Notice --> Undefined index: length /home4/planetbu/public_html/iatm/application/controllers/Produit.php 786
ERROR - 2023-08-14 16:02:22 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:02:22 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:02:22 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:02:22 --> Severity: Notice --> Undefined index: columns /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:02:22 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:02:22 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:02:22 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:02:22 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:02:22 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:02:22 --> Severity: Notice --> Undefined index: search /home4/planetbu/public_html/iatm/application/controllers/Produit.php 790
ERROR - 2023-08-14 16:02:22 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 790
ERROR - 2023-08-14 16:02:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT  OFFSET' at line 1 - Invalid query: SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 1 ORDER BY   LIMIT  OFFSET 
ERROR - 2023-08-14 16:02:22 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 16:03:35 --> Severity: Notice --> Undefined index: draw /home4/planetbu/public_html/iatm/application/controllers/Produit.php 784
ERROR - 2023-08-14 16:03:35 --> Severity: Notice --> Undefined index: start /home4/planetbu/public_html/iatm/application/controllers/Produit.php 785
ERROR - 2023-08-14 16:03:35 --> Severity: Notice --> Undefined index: length /home4/planetbu/public_html/iatm/application/controllers/Produit.php 786
ERROR - 2023-08-14 16:03:35 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:03:35 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:03:35 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:03:35 --> Severity: Notice --> Undefined index: columns /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:03:35 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:03:35 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:03:35 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:03:35 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:03:35 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:03:35 --> Severity: Notice --> Undefined index: search /home4/planetbu/public_html/iatm/application/controllers/Produit.php 790
ERROR - 2023-08-14 16:03:35 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 790
ERROR - 2023-08-14 16:03:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT  OFFSET' at line 1 - Invalid query: SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 1 ORDER BY   LIMIT  OFFSET 
ERROR - 2023-08-14 16:03:35 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 16:03:51 --> Severity: Notice --> Undefined index: draw /home4/planetbu/public_html/iatm/application/controllers/Produit.php 784
ERROR - 2023-08-14 16:03:51 --> Severity: Notice --> Undefined index: start /home4/planetbu/public_html/iatm/application/controllers/Produit.php 785
ERROR - 2023-08-14 16:03:51 --> Severity: Notice --> Undefined index: length /home4/planetbu/public_html/iatm/application/controllers/Produit.php 786
ERROR - 2023-08-14 16:03:51 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:03:51 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:03:51 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:03:51 --> Severity: Notice --> Undefined index: columns /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:03:51 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:03:51 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:03:51 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:03:51 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:03:51 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:03:51 --> Severity: Notice --> Undefined index: search /home4/planetbu/public_html/iatm/application/controllers/Produit.php 790
ERROR - 2023-08-14 16:03:51 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 790
ERROR - 2023-08-14 16:03:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT  OFFSET' at line 1 - Invalid query: SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 1 ORDER BY   LIMIT  OFFSET 
ERROR - 2023-08-14 16:03:51 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 16:06:08 --> Severity: Notice --> Undefined index: draw /home4/planetbu/public_html/iatm/application/controllers/Produit.php 784
ERROR - 2023-08-14 16:06:08 --> Severity: Notice --> Undefined index: start /home4/planetbu/public_html/iatm/application/controllers/Produit.php 785
ERROR - 2023-08-14 16:06:08 --> Severity: Notice --> Undefined index: length /home4/planetbu/public_html/iatm/application/controllers/Produit.php 786
ERROR - 2023-08-14 16:06:08 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:06:08 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:06:08 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 787
ERROR - 2023-08-14 16:06:08 --> Severity: Notice --> Undefined index: columns /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:06:08 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:06:08 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 788
ERROR - 2023-08-14 16:06:08 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:06:08 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:06:08 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 789
ERROR - 2023-08-14 16:06:08 --> Severity: Notice --> Undefined index: search /home4/planetbu/public_html/iatm/application/controllers/Produit.php 790
ERROR - 2023-08-14 16:06:08 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Produit.php 790
ERROR - 2023-08-14 16:06:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT  OFFSET' at line 1 - Invalid query: SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 1 ORDER BY   LIMIT  OFFSET 
ERROR - 2023-08-14 16:06:08 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:10:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:11:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:12:33 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:14:59 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:15:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:19:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:20:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:21:21 --> Severity: Notice --> Undefined index: draw /home4/planetbu/public_html/iatm/application/controllers/Service.php 482
ERROR - 2023-08-14 16:21:21 --> Severity: Notice --> Undefined index: start /home4/planetbu/public_html/iatm/application/controllers/Service.php 484
ERROR - 2023-08-14 16:21:21 --> Severity: Notice --> Undefined index: length /home4/planetbu/public_html/iatm/application/controllers/Service.php 486
ERROR - 2023-08-14 16:21:21 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Service.php 488
ERROR - 2023-08-14 16:21:21 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 488
ERROR - 2023-08-14 16:21:21 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 488
ERROR - 2023-08-14 16:21:21 --> Severity: Notice --> Undefined index: columns /home4/planetbu/public_html/iatm/application/controllers/Service.php 490
ERROR - 2023-08-14 16:21:21 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 490
ERROR - 2023-08-14 16:21:21 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 490
ERROR - 2023-08-14 16:21:21 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Service.php 492
ERROR - 2023-08-14 16:21:21 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 492
ERROR - 2023-08-14 16:21:21 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 492
ERROR - 2023-08-14 16:21:21 --> Severity: Notice --> Undefined index: search /home4/planetbu/public_html/iatm/application/controllers/Service.php 494
ERROR - 2023-08-14 16:21:21 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 494
ERROR - 2023-08-14 16:21:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT  OFFSET' at line 1 - Invalid query: SELECT s.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM service s LEFT JOIN categorie c ON c.id_categorie = s.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = s.id_sub_categorie WHERE s.display = 1 ORDER BY   LIMIT  OFFSET 
ERROR - 2023-08-14 16:21:21 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 16:22:15 --> Severity: Notice --> Undefined index: draw /home4/planetbu/public_html/iatm/application/controllers/Service.php 482
ERROR - 2023-08-14 16:22:15 --> Severity: Notice --> Undefined index: start /home4/planetbu/public_html/iatm/application/controllers/Service.php 484
ERROR - 2023-08-14 16:22:15 --> Severity: Notice --> Undefined index: length /home4/planetbu/public_html/iatm/application/controllers/Service.php 486
ERROR - 2023-08-14 16:22:15 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Service.php 488
ERROR - 2023-08-14 16:22:15 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 488
ERROR - 2023-08-14 16:22:15 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 488
ERROR - 2023-08-14 16:22:15 --> Severity: Notice --> Undefined index: columns /home4/planetbu/public_html/iatm/application/controllers/Service.php 490
ERROR - 2023-08-14 16:22:15 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 490
ERROR - 2023-08-14 16:22:15 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 490
ERROR - 2023-08-14 16:22:15 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Service.php 492
ERROR - 2023-08-14 16:22:15 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 492
ERROR - 2023-08-14 16:22:15 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 492
ERROR - 2023-08-14 16:22:15 --> Severity: Notice --> Undefined index: search /home4/planetbu/public_html/iatm/application/controllers/Service.php 494
ERROR - 2023-08-14 16:22:15 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 494
ERROR - 2023-08-14 16:22:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT  OFFSET' at line 1 - Invalid query: SELECT s.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM service s LEFT JOIN categorie c ON c.id_categorie = s.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = s.id_sub_categorie WHERE s.display = 1 ORDER BY   LIMIT  OFFSET 
ERROR - 2023-08-14 16:22:15 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:22:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:23:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:04 --> Severity: Notice --> Undefined index: draw /home4/planetbu/public_html/iatm/application/controllers/Service.php 483
ERROR - 2023-08-14 16:27:04 --> Severity: Notice --> Undefined index: start /home4/planetbu/public_html/iatm/application/controllers/Service.php 485
ERROR - 2023-08-14 16:27:04 --> Severity: Notice --> Undefined index: length /home4/planetbu/public_html/iatm/application/controllers/Service.php 487
ERROR - 2023-08-14 16:27:04 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Service.php 489
ERROR - 2023-08-14 16:27:04 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 489
ERROR - 2023-08-14 16:27:04 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 489
ERROR - 2023-08-14 16:27:04 --> Severity: Notice --> Undefined index: columns /home4/planetbu/public_html/iatm/application/controllers/Service.php 491
ERROR - 2023-08-14 16:27:04 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 491
ERROR - 2023-08-14 16:27:04 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 491
ERROR - 2023-08-14 16:27:04 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Service.php 493
ERROR - 2023-08-14 16:27:04 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 493
ERROR - 2023-08-14 16:27:04 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 493
ERROR - 2023-08-14 16:27:04 --> Severity: Notice --> Undefined index: search /home4/planetbu/public_html/iatm/application/controllers/Service.php 495
ERROR - 2023-08-14 16:27:04 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Service.php 495
ERROR - 2023-08-14 16:27:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'LIMIT  OFFSET' at line 1 - Invalid query: SELECT s.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM service s LEFT JOIN categorie c ON c.id_categorie = s.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = s.id_sub_categorie WHERE s.display = 1 ORDER BY   LIMIT  OFFSET 
ERROR - 2023-08-14 16:27:04 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:27:56 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:28:41 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:30:31 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:31:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:32:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:21 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:34:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:39:29 --> 404 Page Not Found: Chemin_vers_getData/index
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:40:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 16:44:18 --> Query error: Unknown column 'id_service' in 'where clause' - Invalid query: SELECT *
FROM `client_cmd_details`
WHERE `id_service` = '6'
ERROR - 2023-08-14 16:46:07 --> Severity: Notice --> Undefined variable: columnName /home4/planetbu/public_html/iatm/application/controllers/Produit.php 798
ERROR - 2023-08-14 16:46:07 --> Severity: Notice --> Undefined variable: columnSortOrder /home4/planetbu/public_html/iatm/application/controllers/Produit.php 798
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:46:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:47:36 --> Query error: Unknown column 'id_service' in 'where clause' - Invalid query: SELECT *
FROM `client_cmd_details`
WHERE `id_service` = '6'
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:48:51 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:49:09 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:51:29 --> Query error: Unknown column 'id_service' in 'where clause' - Invalid query: SELECT *
FROM `client_cmd_details`
WHERE `id_service` = '6'
ERROR - 2023-08-14 16:51:42 --> Query error: Unknown column 'id_service' in 'where clause' - Invalid query: SELECT *
FROM `client_cmd_details`
WHERE `id_service` = '6'
ERROR - 2023-08-14 16:51:58 --> Query error: Unknown column 'id_service' in 'where clause' - Invalid query: SELECT *
FROM `client_cmd_details`
WHERE `id_service` = '6'
ERROR - 2023-08-14 16:52:08 --> Query error: Unknown column 'id_service' in 'where clause' - Invalid query: SELECT *
FROM `client_cmd_details`
WHERE `id_service` = '6'
ERROR - 2023-08-14 16:55:17 --> Query error: Unknown column 'id_service' in 'where clause' - Invalid query: SELECT *
FROM `client_cmd_details`
WHERE `id_service` = '6'
ERROR - 2023-08-14 16:55:49 --> Query error: Unknown column 'id_service' in 'where clause' - Invalid query: SELECT *
FROM `client_cmd_details`
WHERE `id_service` = '6'
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:56:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:57:19 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:39 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:39 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:39 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:39 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:39 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:39 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:39 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:39 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:39 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:39 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:58:39 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:05 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 16:59:05 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 16:59:05 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 16:59:05 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 16:59:21 --> Query error: Unknown column 'id_service' in 'where clause' - Invalid query: SELECT *
FROM `client_cmd_details`
WHERE `id_service` = '6'
ERROR - 2023-08-14 16:59:24 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT count(*) as allcount
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 16:59:37 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 16:59:37 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 16:59:37 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 16:59:37 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 16:59:39 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT count(*) as allcount
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 16:59:54 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:04 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 17:00:18 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 17:00:22 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:00:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:02:06 --> Query error: Unknown column 'id_service' in 'where clause' - Invalid query: SELECT *
FROM `client_cmd_details`
WHERE `id_service` = '6'
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:07:21 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:08:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 17:08:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 17:08:17 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:10:28 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:13:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:14:25 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:16:07 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 17:16:24 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 17:17:28 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 17:17:40 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT d.*, u.full_name AS utilisateur, u.role, cl.full_name AS client, v.id_vente, v.code_vente, v.id_facture FROM devis d LEFT JOIN `user` u ON u.id_user = d.id_user LEFT JOIN client cl ON cl.id_client = d.id_client LEFT JOIN vente v ON v.id_devis = d.id_devis WHERE d.date_devis BETWEEN '2023-08-01' AND '2023-08-31'
ERROR - 2023-08-14 17:20:40 --> Query error: Table 'planetbu_iatm_db.transport' doesn't exist - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 17:24:49 --> Query error: Unknown column 'display' in 'where clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ERROR - 2023-08-14 17:25:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 17:25:45 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 17:25:48 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 17:25:49 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 17:26:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 219
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:26:45 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:27:05 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT d.*, u.full_name AS utilisateur, u.role, cl.full_name AS client, v.id_vente, v.code_vente, v.id_facture FROM devis d LEFT JOIN `user` u ON u.id_user = d.id_user LEFT JOIN client cl ON cl.id_client = d.id_client LEFT JOIN vente v ON v.id_devis = d.id_devis WHERE d.date_devis BETWEEN '2023-08-01' AND '2023-08-31'
ERROR - 2023-08-14 17:27:11 --> Query error: Unknown column 'v.id_facture' in 'field list' - Invalid query: SELECT d.*, u.full_name AS utilisateur, u.role, cl.full_name AS client, v.id_vente, v.code_vente, v.id_facture FROM devis d LEFT JOIN `user` u ON u.id_user = d.id_user LEFT JOIN client cl ON cl.id_client = d.id_client LEFT JOIN vente v ON v.id_devis = d.id_devis WHERE d.date_devis BETWEEN '2023-08-01' AND '2023-08-31'
ERROR - 2023-08-14 17:27:31 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 17:27:31 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 17:27:31 --> Query error: Unknown column 'id_transport' in 'field list' - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 17:27:31 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 17:27:41 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:27:54 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:27:58 --> Severity: Notice --> Undefined index: draw /home4/planetbu/public_html/iatm/application/controllers/Transport.php 184
ERROR - 2023-08-14 17:27:58 --> Severity: Notice --> Undefined index: start /home4/planetbu/public_html/iatm/application/controllers/Transport.php 185
ERROR - 2023-08-14 17:27:58 --> Severity: Notice --> Undefined index: length /home4/planetbu/public_html/iatm/application/controllers/Transport.php 186
ERROR - 2023-08-14 17:27:58 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Transport.php 187
ERROR - 2023-08-14 17:27:58 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Transport.php 187
ERROR - 2023-08-14 17:27:58 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Transport.php 187
ERROR - 2023-08-14 17:27:58 --> Severity: Notice --> Undefined index: columns /home4/planetbu/public_html/iatm/application/controllers/Transport.php 188
ERROR - 2023-08-14 17:27:58 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Transport.php 188
ERROR - 2023-08-14 17:27:58 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Transport.php 188
ERROR - 2023-08-14 17:27:58 --> Severity: Notice --> Undefined index: order /home4/planetbu/public_html/iatm/application/controllers/Transport.php 189
ERROR - 2023-08-14 17:27:58 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Transport.php 189
ERROR - 2023-08-14 17:27:58 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Transport.php 189
ERROR - 2023-08-14 17:27:58 --> Severity: Notice --> Undefined index: search /home4/planetbu/public_html/iatm/application/controllers/Transport.php 190
ERROR - 2023-08-14 17:27:58 --> Severity: Notice --> Trying to access array offset on value of type null /home4/planetbu/public_html/iatm/application/controllers/Transport.php 190
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:30:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:35:23 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:35:27 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:35:35 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:36:12 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:36:18 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:36:30 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:53 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:37:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:38:15 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:41:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:42:50 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:42:53 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:13 --> Severity: Notice --> Undefined variable: data /home4/planetbu/public_html/iatm/application/controllers/Produit.php 830
ERROR - 2023-08-14 17:46:36 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:46:45 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:24 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:38 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:49:52 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:16 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:50:36 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:08 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:18 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 17:51:18 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 17:51:18 --> Query error: Unknown column 'id_transport' in 'field list' - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 17:51:18 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:26 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:51:30 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 17:51:30 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 17:51:30 --> Query error: Unknown column 'id_transport' in 'field list' - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 17:51:30 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 17:52:11 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:52:23 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:52:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:53:57 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:11 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:11 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:11 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:11 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:11 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:11 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:11 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:11 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:11 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:11 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:47 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:59 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:59 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:59 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:59 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:59 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:59 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:59 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:59 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:59 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:54:59 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:19 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:55:32 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` DESC
 LIMIT 20
ERROR - 2023-08-14 17:55:34 --> Query error: Unknown column 'code_transport' in 'order clause' - Invalid query: SELECT *
FROM `transport`
WHERE `display` = 1
ORDER BY `code_transport` ASC
 LIMIT 10
ERROR - 2023-08-14 17:55:35 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:35 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:35 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:35 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:35 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:35 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:35 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:35 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:35 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:35 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:55:46 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 17:57:24 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 17:57:24 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 17:57:24 --> Query error: Unknown column 'id_transport' in 'field list' - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 17:57:24 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 18:00:07 --> Query error: Unknown column 'id_transport' in 'field list' - Invalid query: INSERT INTO `vente` (`id_client`, `id_transport`, `id_client_cmd`, `id_devis`, `code_vente`, `id_user`, `date_vente`, `remarque`, `tva`) VALUES ('4', NULL, NULL, NULL, 'BL/23/0001', '1', '2023-08-14', '', '20')
ERROR - 2023-08-14 18:00:21 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 18:00:21 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 18:00:21 --> Query error: Unknown column 'id_transport' in 'field list' - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 18:00:21 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:34 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:00:55 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:07 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:01:29 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:06:42 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:16:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:22 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:24:31 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 18:27:43 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 18:27:43 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 18:27:43 --> Query error: Unknown column 'id_transport' in 'field list' - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 18:27:43 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 18:27:46 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 18:27:46 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 18:27:46 --> Query error: Unknown column 'id_transport' in 'field list' - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 18:27:46 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 18:27:48 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 18:27:48 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 18:27:48 --> Query error: Unknown column 'id_transport' in 'field list' - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 18:27:48 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 18:27:51 --> Severity: Notice --> Trying to get property 'year' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 559
ERROR - 2023-08-14 18:27:51 --> Severity: Notice --> Trying to get property 'next_value' of non-object /home4/planetbu/public_html/iatm/application/helpers/my_functions_helper.php 569
ERROR - 2023-08-14 18:27:51 --> Query error: Unknown column 'id_transport' in 'field list' - Invalid query: SELECT id_transport FROM transport WHERE code_transport = 'TR/23/0000' 
ERROR - 2023-08-14 18:27:51 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/planetbu/public_html/iatm/system/core/Exceptions.php:271) /home4/planetbu/public_html/iatm/system/core/Common.php 570
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
ERROR - 2023-08-14 20:45:32 --> Severity: Notice --> Undefined variable: cout_revient /home4/planetbu/public_html/iatm/application/controllers/Produit.php 910
