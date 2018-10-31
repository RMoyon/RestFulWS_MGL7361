INSERT INTO great_deal (description, name, type_of_great_deal) VALUES
	('2 Places achetées 1 place offerte', 'Place gratuite', 'Reduction'),
	('Place à $6','Tarif étudiant Cinéma', 'Réduction'),
	('Entrée à $18', 'Tarif étudiant mbam', 'Réduction'),
	('Burger gratuit entre 19h-20h', 'Burger gratuit', 'Evenement'),
	('RedBull Festival - Concert', 'RedBull Festival', 'Festival');

INSERT INTO user (first_name, last_name, login, password) VALUES
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

INSERT INTO information (category, street_number, street_name, town, postal_code, email, phone_number, urlWebsite) VALUES
	('Cinéma', '1430', 'Rue de Bleury', 'Montréal', 'QC H3A 2J1', NULL, '(514) 884-7187', NULL),
	('Musée', '1380', 'Rue Sherbrook O', 'Montréal', 'QC H3G 1J5', NULL, NULL, 'https://www.mbam.qc.ca'),
	('Restaurant', '150', 'Rue Sainte-Catherine O', 'Montréal', 'QC H2X 3Y2', NULL, '(514) 844-4684', 'https://www.mcdonalds.com'),
	('Restaurant', '625', 'Rue Sainte-Catherine O', 'Montréal', 'QC H3B 1B7', NULL, '(514) 284-0848', 'https://www.mcdonalds.com'),
	('Salle de spectacle', '407', 'Rue Saint-Pierre', 'Montréal', 'QC H2Y 2M3', NULL, NULL, ''),
	('Salle de spectacle', '463', 'Rue Sainte-Catherine O', 'Montréal', 'QC H3B 1B1', NULL, '(514) 528-9766', 'lebalcon.ca');

INSERT INTO period (great_deal_id, start_date, end_date) VALUES
	(4, '2018-10-02 19:00:00', '2018-10-02 20:00:00'),
	(5, '2018-09-19', '2018-09-27');

INSERT INTO tag (name) VALUES
	('Fast-food'),
	('Restaurant'),
	('Burger'),
	('Cinéma'),
	('Musée'),
	('Beaux arts'),
	('Festival'),
	('Concert'),
	('Music');

INSERT INTO university (name) VALUES
	('UQAM'),
	('ESG'),
	('McGill');

INSERT INTO information_great_deal (great_deal_id, information_id) VALUES
	(1,1),
	(2,1),
	(3,2),
	(4,3),
	(4,4),
	(5,5),
	(5,6);

INSERT INTO tag_great_deal (great_deal_id, tag_id) VALUES
	(1,4),
	(2,4),
	(3,5),
	(3,6),
	(4,1),
	(4,2),
	(4,3),
	(5,7),
	(5,8),
	(5,9);

INSERT INTO take_an_interest (great_deal_id, user_id, type_of_interest) VALUES
	(1,3,'Like'),
	(4,10,'Participe'),
	(5,5,'A participé');

INSERT INTO university_great_deal (great_deal_id, university_id) VALUES
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

INSERT INTO university_user (user_id, university_id) VALUES
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
