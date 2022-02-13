-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage des données de la table movingratingapikey.category : ~0 rows (environ)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Listage des données de la table movingratingapikey.de_translation : ~0 rows (environ)
/*!40000 ALTER TABLE `de_translation` DISABLE KEYS */;
INSERT INTO `de_translation` (`id`, `movie_id`, `title`) VALUES
	(1, 1, 'So Finster Die Nacht'),
	(2, 2, 'Constantine'),
	(3, 3, 'Feinde - Hostiles'),
	(4, 4, 'Gone Baby Gone - Kein Kinderspiel'),
	(5, 5, 'The Irishman'),
	(6, 6, 'Inception'),
	(7, 7, 'Interstellar'),
	(8, 8, 'Tenet'),
	(9, 9, 'The Revenant – Der Rückkehrer'),
	(10, 10, 'Bone Tomahawk'),
	(11, 11, 'Parasite'),
	(12, 12, 'Titanic'),
	(13, 13, 'The Town – Stadt ohne Gnade'),
	(14, 14, 'Sicario'),
	(15, 15, 'Ex Machina'),
	(16, 16, 'Blade Runner 2049'),
	(17, 17, 'Mad Max: Fury Road'),
	(18, 18, 'Shutter Island'),
	(19, 19, 'Django Unchained'),
	(20, 20, 'Live by Night'),
	(21, 21, 'Der Untergang');
/*!40000 ALTER TABLE `de_translation` ENABLE KEYS */;

-- Listage des données de la table movingratingapikey.doctrine_migration_versions : ~13 rows (environ)
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20210810152505', '2021-08-16 18:03:24', 117),
	('DoctrineMigrations\\Version20210812185036', '2021-08-16 18:03:24', 30),
	('DoctrineMigrations\\Version20210813130340', '2021-08-16 18:03:24', 53),
	('DoctrineMigrations\\Version20210813163753', '2021-08-16 18:03:24', 52),
	('DoctrineMigrations\\Version20210813170309', '2021-08-16 18:03:24', 4),
	('DoctrineMigrations\\Version20210813173915', '2021-08-16 18:03:24', 109),
	('DoctrineMigrations\\Version20210816162136', '2021-08-16 18:03:24', 29),
	('DoctrineMigrations\\Version20210816172142', '2021-08-16 18:03:24', 63),
	('DoctrineMigrations\\Version20210816173231', '2021-08-16 18:03:24', 52),
	('DoctrineMigrations\\Version20210816175838', '2021-08-16 18:03:24', 147),
	('DoctrineMigrations\\Version20210817180029', '2021-08-17 18:00:42', 164),
	('DoctrineMigrations\\Version20210817192812', '2021-08-17 19:28:16', 69),
	('DoctrineMigrations\\Version20210817195311', '2021-08-17 19:53:16', 90),
	('DoctrineMigrations\\Version20210820135110', '2021-08-20 13:51:15', 99);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;

-- Listage des données de la table movingratingapikey.en_translation : ~5 rows (environ)
/*!40000 ALTER TABLE `en_translation` DISABLE KEYS */;
INSERT INTO `en_translation` (`id`, `movie_id`, `title`) VALUES
	(1, 1, 'Let The Right One In'),
	(2, 2, 'Constantine'),
	(3, 3, 'Hostiles'),
	(4, 4, 'Gone baby gone'),
	(5, 5, 'The irishman'),
	(6, 6, 'Inception'),
	(7, 7, 'Interstellar'),
	(8, 8, 'Tenet'),
	(9, 9, 'The Revenant'),
	(10, 10, 'Bone Tomahawk'),
	(11, 11, 'Parasite'),
	(12, 12, 'Titanic'),
	(13, 13, 'The Town'),
	(14, 14, 'Sicario'),
	(15, 15, 'Ex Machina'),
	(16, 16, 'Blade Runner 2049'),
	(17, 17, 'Mad Max: Fury Road'),
	(18, 18, 'Shutter Island'),
	(19, 19, 'Django Unchained'),
	(20, 20, 'Live by Night'),
	(21, 21, 'Downfall');
/*!40000 ALTER TABLE `en_translation` ENABLE KEYS */;

-- Listage des données de la table movingratingapikey.es_translation : ~0 rows (environ)
/*!40000 ALTER TABLE `es_translation` DISABLE KEYS */;
INSERT INTO `es_translation` (`id`, `movie_id`, `title`) VALUES
	(1, 1, 'Criatura De La Noche'),
	(2, 2, 'Constantine'),
	(3, 3, 'Hostiles: Violencia Americana'),
	(4, 4, 'Adiós Pequeña, Adiós'),
	(5, 5, 'El Irlandés'),
	(6, 6, 'Origen'),
	(7, 7, 'Interstellar'),
	(8, 8, 'Tenet'),
	(9, 9, 'El renacido'),
	(10, 10, 'Bone Tomahawk'),
	(11, 11, 'Parásitos'),
	(12, 12, 'Titanic'),
	(13, 13, 'Ciudad De Ladrones'),
	(14, 14, 'Sicario'),
	(15, 15, 'Ex_Machina'),
	(16, 16, 'Blade Runner 2049'),
	(17, 17, 'Mad Max: Furia en la carretera'),
	(18, 18, 'Shutter Island'),
	(19, 19, 'Django desencadenado'),
	(20, 20, 'Vivir de noche'),
	(21, 21, 'El hundimiento');
/*!40000 ALTER TABLE `es_translation` ENABLE KEYS */;

-- Listage des données de la table movingratingapikey.fr_translation : ~2 rows (environ)
/*!40000 ALTER TABLE `fr_translation` DISABLE KEYS */;
INSERT INTO `fr_translation` (`id`, `movie_id`, `title`) VALUES
	(1, 1, 'Morse'),
	(7, 2, 'Constantine'),
	(8, 3, 'Hostiles'),
	(9, 4, 'Gone Baby Gone'),
	(10, 5, 'The Irishman'),
	(11, 6, 'Inception'),
	(12, 7, 'Interstellar'),
	(13, 8, 'Tenet'),
	(14, 9, 'The Revenant'),
	(15, 10, 'Bone Tomahawk'),
	(16, 11, 'Parasite'),
	(17, 12, 'Titanic'),
	(18, 13, 'The Town'),
	(19, 14, 'Sicario'),
	(20, 15, 'Ex Machina'),
	(21, 16, 'Blade Runner 2049'),
	(22, 17, 'Mad Max: Fury Road'),
	(23, 18, 'Shutter Island'),
	(24, 19, 'Django Unchained'),
	(25, 20, 'Live by Night'),
	(26, 21, 'La Chute');
/*!40000 ALTER TABLE `fr_translation` ENABLE KEYS */;

-- Listage des données de la table movingratingapikey.it_translation : ~0 rows (environ)
/*!40000 ALTER TABLE `it_translation` DISABLE KEYS */;
INSERT INTO `it_translation` (`id`, `movie_id`, `title`) VALUES
	(1, 1, 'Lasciami entrare'),
	(2, 2, 'Constantine'),
	(3, 3, 'Hostiles - Ostili'),
	(4, 4, 'Gone Baby Gone'),
	(5, 5, 'The Irishman'),
	(6, 6, 'Inception'),
	(7, 7, 'Interstellar'),
	(8, 8, 'Tenet'),
	(9, 9, 'Revenant - Redivivo'),
	(10, 10, 'Bone Tomahawk'),
	(11, 11, 'Parasite'),
	(12, 12, 'Titanic'),
	(13, 13, 'The Town'),
	(14, 14, 'Sicario'),
	(15, 15, 'Ex Machina'),
	(16, 16, 'Blade Runner 2049'),
	(17, 17, 'Mad Max: Fury Road'),
	(18, 18, 'Shutter Island'),
	(19, 19, 'Django Unchained'),
	(20, 20, 'La legge della notte'),
	(21, 21, 'La caduta - Gli ultimi giorni di Hitler');
/*!40000 ALTER TABLE `it_translation` ENABLE KEYS */;

-- Listage des données de la table movingratingapikey.ja_translation : ~0 rows (environ)
/*!40000 ALTER TABLE `ja_translation` DISABLE KEYS */;
INSERT INTO `ja_translation` (`id`, `movie_id`, `title`) VALUES
	(1, 1, 'ぼくのエリ 200歳の少女'),
	(2, 2, 'コンスタンティン'),
	(3, 3, '荒野の誓い'),
	(4, 4, 'ゴーン・ベイビー・ゴーン'),
	(5, 5, 'アイリッシュマン'),
	(6, 6, 'インセプション'),
	(7, 7, 'インターステラー'),
	(8, 8, 'TENET テネット'),
	(9, 9, 'レヴェナント: 蘇えりし者'),
	(10, 10, 'トマホーク ガンマンvs食人族'),
	(11, 11, 'パラサイト 半地下の家族'),
	(12, 12, 'タイタニック'),
	(13, 13, 'ザ・タウン'),
	(14, 14, 'ボーダーライン'),
	(15, 15, 'エクス・マキナ'),
	(16, 16, 'ブレードランナー 2049'),
	(17, 17, 'マッドマックス 怒りのデス・ロード'),
	(18, 18, 'シャッター アイランド'),
	(19, 19, 'ジャンゴ 繋がれざる者'),
	(20, 20, '夜に生きる'),
	(21, 21, 'ヒトラー 〜最期の12日間〜');
/*!40000 ALTER TABLE `ja_translation` ENABLE KEYS */;

-- Listage des données de la table movingratingapikey.movie : ~18 rows (environ)
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` (`id`, `category_id`, `original_title`, `slug`, `synopsis`, `release_date`, `poster`) VALUES
	(1, NULL, 'Låt Den Rätte Komma In', 'let-the-right-one-in', 'Oskar, an overlooked and bullied boy, finds love and revenge through Eli, a beautiful but peculiar girl.', '2008', 'lat_den_ratte_komma_in.jpg'),
	(2, NULL, 'Constantine', 'constantine', 'Supernatural exorcist and demonologist John Constantine helps a policewoman prove her sister\'s death was not a suicide, but something more.', '2005', 'constantine.jpg'),
	(3, NULL, 'Hostiles', 'hostiles', 'In 1892, a legendary Army Captain reluctantly agrees to escort a Cheyenne chief and his family through dangerous territory.', '2017', 'hostiles.jpg'),
	(4, NULL, 'Gone Baby Gone', 'gone-baby-gone', 'Two Boston area detectives investigate a little girl\'s kidnapping, which ultimately turns into a crisis both professionally and personally.', '2007', 'gone_baby_gone.jpg'),
	(5, NULL, 'The Irishman', 'the-irishman', 'Hitman Frank Sheeran looks back at the secrets he kept as a loyal member of the Bufalino crime family.', '2019', 'the_irishman.jpg'),
	(6, NULL, 'Inception', 'inception', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', '2010', 'inception.jpg'),
	(7, NULL, 'Interstellar', 'interstellar', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.', '2014', 'interstellar.jpg'),
	(8, NULL, 'Tenet', 'tenet', 'Armed with only one word, Tenet, and fighting for the survival of the entire world, a Protagonist journeys through a twilight world of international espionage on a mission that will unfold in something beyond real time.', '2020', 'tenet.jpg'),
	(9, NULL, 'The Revenant', 'the-revenant', 'A frontiersman on a fur trading expedition in the 1820s fights for survival after being mauled by a bear and left for dead by members of his own hunting team.', '2015', 'the_revenant.jpg'),
	(10, NULL, 'Bone Tomahawk', 'bone-tomahawk', 'In the dying days of the old west, an elderly sheriff and his posse set out to rescue their town\'s doctor from cannibalistic cave dwellers.', '2015', 'bone_tomahawk.jpg'),
	(11, NULL, '기생충', 'parasite', 'Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.', '2019', 'parasite.jpg'),
	(12, NULL, 'Titanic', 'titanic', 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', '1997', 'titanic.jpg'),
	(13, NULL, 'The Town', 'the-town', 'A proficient group of thieves rob a bank and hold Claire, the assistant manager, hostage. Things begin to get complicated when one of the crew members falls in love with Claire.', '2010', 'the_town.jpg'),
	(14, NULL, 'Sicario', 'sicario', 'An idealistic FBI agent is enlisted by a government task force to aid in the escalating war against drugs at the border area between the U.S. and Mexico.', '2015', 'sicario.jpg'),
	(15, NULL, 'Ex Machina', 'ex-machina', 'A young programmer is selected to participate in a ground-breaking experiment in synthetic intelligence by evaluating the human qualities of a highly advanced humanoid A.I.', '2014', 'ex_machina.jpg'),
	(16, NULL, 'Blade Runner 2049', 'blade-runner-2049', 'Young Blade Runner K\'s discovery of a long-buried secret leads him to track down former Blade Runner Rick Deckard, who\'s been missing for thirty years.', '2017', 'blade_runner_2049.jpg'),
	(17, NULL, 'Mad Max : Fury Road', 'mad-max-fury-road', 'In a post-apocalyptic wasteland, a woman rebels against a tyrannical ruler in search for her homeland with the aid of a group of female prisoners, a psychotic worshiper, and a drifter named Max.', '2015', 'mad_max_fury_road.jpg'),
	(18, NULL, 'Shutter Island', 'shutter-island', 'In 1954, a U.S. Marshal investigates the disappearance of a murderer who escaped from a hospital for the criminally insane.', '2010', 'shutter_island.jpg'),
	(19, NULL, 'Django Unchained', 'django-unchained', 'With the help of a German bounty-hunter, a freed slave sets out to rescue his wife from a brutal plantation-owner in Mississippi.', '2012', 'django_unchained.jpg'),
	(20, NULL, 'Live By Night', 'live-by-night', 'A group of Boston-bred gangsters set up shop in balmy Florida during the Prohibition era, facing off against the competition and the Ku Klux Klan.', '2016', 'live_by_night.jpg'),
	(21, NULL, 'Der Untergang', 'downfall', 'Traudl Junge, the final secretary for Adolf Hitler, tells of the Nazi dictator\'s final days in his Berlin bunker at the end of WWII.', '2004', 'der_untergang.jpg');
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;

-- Listage des données de la table movingratingapikey.ru_translation : ~0 rows (environ)
/*!40000 ALTER TABLE `ru_translation` DISABLE KEYS */;
INSERT INTO `ru_translation` (`id`, `movie_id`, `title`) VALUES
	(1, 1, 'Впусти меня'),
	(2, 2, 'Константи́н: Повелитель тьмы'),
	(3, 3, 'Недруги'),
	(4, 4, 'Прощай, детка, прощай'),
	(5, 5, 'Ирландец'),
	(6, 6, 'Начало'),
	(7, 7, 'Интерстеллар'),
	(8, 8, 'Довод'),
	(9, 9, 'Выживший'),
	(10, 10, 'Костяной томагавк'),
	(11, 11, 'Паразиты'),
	(12, 12, 'Титаник'),
	(13, 13, 'Город воров'),
	(14, 14, 'Убийца'),
	(15, 15, 'Из машины'),
	(16, 16, 'Бегущий по лезвию 2049'),
	(17, 17, 'Безумный Макс: Дорога ярости'),
	(18, 18, 'Остров проклятых'),
	(19, 19, 'Джанго освобождённый'),
	(20, 20, 'Закон ночи'),
	(21, 21, 'Бункер');
/*!40000 ALTER TABLE `ru_translation` ENABLE KEYS */;

-- Listage des données de la table movingratingapikey.user : ~0 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `roles`, `password`, `api_key`) VALUES
	(1, 'tchoin', '[]', '$2y$13$C/OD9GoHiXPm12ALApQG8eVYeEUlttBjFFyoarMIME4Tz33jwWFbq', '841cc035-d483-4d22-87c1-a85386c1f5cd');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Listage des données de la table movingratingapikey.zh_translation : ~0 rows (environ)
/*!40000 ALTER TABLE `zh_translation` DISABLE KEYS */;
INSERT INTO `zh_translation` (`id`, `movie_id`, `title`) VALUES
	(1, 1, '生人勿進'),
	(2, 2, '魔間行者'),
	(3, 3, '敵對分子'),
	(4, 4, '失蹤人口'),
	(5, 5, '愛爾蘭人'),
	(6, 6, '全面啟動'),
	(7, 7, '星际穿越'),
	(8, 8, 'TENET天能'),
	(9, 9, '神鬼獵人'),
	(10, 10, '戰斧骨'),
	(11, 11, '寄生上流'),
	(12, 12, '泰坦尼克号'),
	(13, 13, '城中大盗'),
	(14, 14, '毒裁者'),
	(15, 15, '机械姬'),
	(16, 16, '銀翼殺手2049'),
	(17, 17, '疯狂的麦克斯：狂暴之路'),
	(18, 18, '隔離島'),
	(19, 19, '被解救的姜戈'),
	(20, 20, '夜行人生'),
	(21, 21, '希特拉的最後12夜');
/*!40000 ALTER TABLE `zh_translation` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
