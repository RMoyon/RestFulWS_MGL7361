INSERT INTO great_deal (description, name, type_of_great_deal) VALUES
	('2 Places achetées 1 place offerte', 'Place gratuite', 'Reduction'),
	('Place à $6','Tarif étudiant Cinéma', 'Réduction'),
	('Entrée à $18', 'Tarif étudiant mbam', 'Réduction'),
	('Burger gratuit entre 19h-20h', 'Burger gratuit', 'Evenement'),
	('RedBull Festival - Concert', 'RedBull Festival', 'Festival'),
	('Black Friday - H&M', 'BF H&M', 'Réduction'),
	('Black Friday - Hudson Bay', 'BF Hudson', 'Réduction'),
	('Black Friday - Zara', 'BF Zara', 'Réduction'),
	('Black Friday - Séphora', 'BF Sephora', 'Réduction'),
	('Black Friday - Gap', 'BF Gap', 'Evenement'),
	('Black Friday - Miniso', 'BF Miniso', 'Evenement'),
	('Black Friday - Browns Chaussures', 'BF Browns', 'Réduction'),
	('Black Friday - Trunkshop', 'BF Trunkshop', 'Réduction'),
	('Black Friday - Lamarque', 'BF Lamarque', 'Réduction'),
	('Black Friday - Armani', 'BF Armani', 'Festival');

INSERT INTO user (first_name, last_name, login, password) VALUES
	('Admin', 'Admin', 'admin', 'admin'),
	('Freddy', 'Krueger', 'LeGriffeur', 'NgWEdi^5kJngbE#3fW+^'),
	('Norman', 'Bates', 'Norman', 'QMRF&B:csS]HMj@:Feg#'),
	('Jack', 'Torrance', 'Johnny', ',}T~|GT~yppMPdh9St4G'),
	('Ashley', 'Williams', 'SauverWilly', '9=k*bn_n3{VP{=RAJtB3'),
	('Chris', 'MacNeil', 'Pazuzu', ',/zRJk&yQ{9YWmJ?[nkd'),
	('Rosemary', 'Woodhouse', 'TheDevil', '9csDQM+RYevew4qM~Jr}'),
	('Bubba', 'Sawyer', 'Leatherface', 'a[6v[{R{6w8qma;SWyc3'),
	('Michael', 'Myers', 'Halloween', '_LaG$4nbN+F2b8SmsQXF'),
	('R.J.', 'MacReady', 'UneChose', '[{5y.;:c"kgjh/_%}=Wi'),
	('Hannibal', 'Lecter', 'LHommeEstBon', 'i+8jc5#Dg*$Y@7x%cAH4'),
	('Billy', 'Loomis', 'Ghostface', 'WsXJ;]7LCV*gzphVN]Z,');

	INSERT INTO tag (name) VALUES
	('Fast-food'),
	('Restaurant'),
	('Burger'),
	('Cinéma'),
	('Musée'),
	('Beaux arts'),
	('Festival'),
	('Concert'),
	('Music'),
	('Vetement'),
	('Parfum'),
	('Chaussures');

	INSERT INTO university (name) VALUES
	('UQAM'),
	('ESG'),
	('McGill');

	INSERT INTO information (category, street_number, street_name, town, postal_code, latitude, longitude, email, phone_number, urlWebsite) VALUES
	('Cinéma', '1430', 'Rue de Bleury', 'Montréal', 'QC H3A 2J1', '45.506541', '-73.567888' ,NULL, '(514) 884-7187', NULL),
	('Musée', '1380', 'Rue Sherbrook O', 'Montréal', 'QC H3G 1J5', '45.498676', '-73.579333', NULL, NULL, 'https://www.mbam.qc.ca'),
	('Restaurant', '150', 'Rue Sainte-Catherine O', 'Montréal', 'QC H2X 3Y2', '45.507975', '-73.565158', NULL, '(514) 844-4684', 'https://www.mcdonalds.com'),
	('Restaurant', '625', 'Rue Sainte-Catherine O', 'Montréal', 'QC H3B 1B7', '45.503991', '-73.569585', NULL, '(514) 284-0848', 'https://www.mcdonalds.com'),
	('Salle de spectacle', '407', 'Rue Saint-Pierre', 'Montréal', 'QC H2Y 2M3', '45.501599', '-73.556225', NULL, NULL, ''),
	('Salle de spectacle', '463', 'Rue Sainte-Catherine O', 'Montréal', 'QC H3B 1B1', '45.505506', '-73.568747', NULL, '(514) 528-9766', 'lebalcon.ca'),
	('Magasin', '450', 'Rue Sainte-Catherine O', 'Montréal', 'QC H3B 1A6', '45.505364', '-73.567720', NULL, NULL, NULL),
	('Magasin', '585', 'Rue Sainte-Catherine O', 'Montréal', 'QC H3B 3Y5', '45.504281', '-73.569262', NULL, NULL, NULL),
	('Magasin', '2305', 'Chemin Rockland', 'Mont-Royal', 'QC H3P 3E9', '45.527943', '-73.648808', NULL, NULL, NULL),
	('Magasin', '7999', 'Boulevard Les-Galeries-d\'Anjou Suite# B16F', 'Montreal', 'QC H1M 1W9', '45.600999', '-73.565054', NULL, NULL, NULL),
	('Magasin', '9160', 'Boulevard Leduc', 'Brossard', 'QC J4Y 0E6', '45.447326', '-73.435861', NULL, NULL, NULL),
	('Magasin', '475', 'Rue Sainte-Catherine O', 'Montréal', 'QC H3B 1B1', '45.5049335', '-73.5704852', NULL, NULL, NULL),
	('Magasin', '2305', 'Rockland Rd Suite 2570', 'Montreal', 'Quebec H3P 3E9', '45.5282005', '-73.6503124', NULL, NULL, NULL),
	('Magasin', '263', 'Avenue du Mont-Royal E', 'Montréal', 'QC H2T 1P6', '45.5225929', '-73.5864341', NULL, NULL, NULL),
	('Magasin', '2000', 'Rue Peel', 'Montréal', 'QC H3A 2W5', '45.500911', '-73.5773525', NULL, NULL, NULL),
	('Magasin', '1241', 'Rue Sainte-Catherine O', 'Montréal', 'QC H3G 1P3', '45.4982999', '-73.5770252', NULL, NULL, NULL);

	INSERT INTO study (user_id, university_id) VALUES
	(1,1),
	(2,1),
	(3,1),
	(4,1),
	(4,2),
	(5,3),
	(6,2),
	(8,3),
	(9,1),
	(10,2);

INSERT INTO period (great_deals_id, start_date, end_date) VALUES
	(4, '2018-10-02 19:00:00', '2018-10-02 20:00:00'),
	(5, '2017-09-19', '2017-09-27'),
	(5, '2018-09-19', '2018-09-27'),
	(6, '2018-11-23', '2018-11-25'),
	(7, '2018-11-23', '2018-11-25'),
	(8, '2018-11-23', '2018-11-25'),
	(9, '2018-11-23', '2018-11-25'),
	(10, '2018-11-23', '2018-11-25'),
	(11, '2018-11-23', '2018-11-25'),
	(12, '2018-11-23', '2018-11-25'),
	(13, '2018-11-23', '2018-11-25'),
	(14, '2018-11-23', '2018-11-25'),
	(15, '2018-11-23', '2018-11-25');

INSERT INTO contact (great_deal_id, information_id) VALUES
	(1,1),
	(2,1),
	(3,2),
	(4,3),
	(4,4),
	(5,5),
	(5,6),
	(6,7),
	(7,8),
	(8,9),
	(9,10),
	(10,11),
	(11,12),
	(12,13),
	(13,14),
	(14,15),
	(15,16);

INSERT INTO have_tag (great_deal_id, tag_id) VALUES
	(1,4),
	(2,4),
	(3,5),
	(3,6),
	(4,1),
	(4,2),
	(4,3),
	(5,7),
	(5,8),
	(5,9),
	(6,10),
	(7,10),
	(8,10),
	(9,11),
	(10,10),
	(11,10),
	(12,12),
	(13,10),
	(14,10),
	(15,10);

INSERT INTO take_an_interest (great_deals_id, users_id, type_of_interest) VALUES
	(1,3,'Like'),
	(4,10,'Participe'),
	(5,5,'A participé');

INSERT INTO availability (great_deal_id, university_id) VALUES
	(1,1),
	(1,2),
	(1,3),
	(2,1),
	(2,2),
	(2,3),
	(3,1),
	(3,2),
	(3,3),
	(4,1);
