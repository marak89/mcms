/*
* skrypt instalacyjny mCMS
* wersja 2013-04-22_06:00
* autor: Marcin "marak89" Rał
*/

-- zmiana tabeli na ktorej pracuje skrypt
use kohana1;
--SET @_prefix_ = `mcms`; zrobić kiedyś prefixy do tabel

-- Kodowanie oraz metodę porównywania napisów dla bazy danych zmieniamy zapytaniem:
ALTER DATABASE kohana1 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- UWAGA SKRYPT USUNIE AKTUALNĄ ZAWARTOŚĆ 
drop table if exists users;
drop table if exists blog;
drop table if exists sessions;
drop table if exists comments;
drop table if exists default_config;
drop table if exists menu;
drop table if exists admin_menu;
drop table if exists photos;
drop table if exists gallery;
drop table if exists allegro_template;
drop table if exists allegro_auction;
drop table if exists allegro_auction_info;
drop table if exists allegro_other_auction;





CREATE TABLE  if not exists  `allegro_other_auction` (
`id` int unsigned not null auto_increment primary key,
`name` char(255) not null,
`content` text not null,
`image` char(255) not null,
`delete` bool not null
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;
select * from allegro_other_auction;
--insert into allegro_other_auction values(NULL, '1', '1', '1');

CREATE TABLE  if not exists  `allegro_auction_info` (
`id` int unsigned not null auto_increment primary key,
`name` char(255) not null,
`content` text not null
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

--insert into allegro_auction_info values(NULL, 'kontakt', 'Kontakt z firmą: Cynkow ');
---insert into allegro_auction_info values(NULL, 'regulamin', 'Regulujemy że możemy w Wy NIE ');
--insert into allegro_auction_info values(NULL, 'platnosci', 'Płatności ');
--select * from allegro_auction_info;


CREATE TABLE  if not exists  `allegro_auction` (
`id` int unsigned not null auto_increment primary key,
`name` char(255) not null,
`template_id` int unsigned not null,
`nazwa` text not null,
`cena` text not null,
`opis1` text,
`opis2` text,
`opis3` text,
`opis4` text,
`opis5` text,
`opis6` text,
`opis7` text,
`opis8` text,
`gallery_id` int unsigned
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

insert into allegro_auction values( NULL, 'Grys', 1,'Grys', '10zł/worek', 'Nowoczesny żwir do tapet', 'Dzięki niemu Twoja kuchnia będzie idealna', NULL, NULL, NULL, NULL, NULL, NULL, 1 );
INSERT INTO `allegro_auction` (`name`, `template_id`, `nazwa`, `cena`, `opis1`, `opis2`, `opis3`, `opis4`, `opis5`, `opis6`, `opis7`, `opis8`, `gallery_id`) VALUES ('NowaTestowa', '1', 'Nowy super wypasiony ', '4zł za r ', 'asdas', 'asdasd', 'sadsadasd', '', '', '', '', '', '1');

select * from allegro_auction;


CREATE TABLE  if not exists  `allegro_template` (
`id` int unsigned not null auto_increment primary key,
`name` char(255) not null,
`content` text not null
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

--insert into `allegro_template` values(NULL,'stanpol','<div id="root" style="background-color: #e9f8bf; margin: 0 auto; width:1020px; padding: 0;"><div id="top" style="background-image: url([url_graph]logotopb.jpg); width:1020px; height:369px;" ><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="[url_graph]logo.png" ></div><div id="container" style="width:1020px; height: auto; " ><div id="leftright" style="overflow: hidden;  background-image: url([url_graph]background.jpg); background-repeat: repeat-y;"><div id="left" style="float:left; width:261px; "><div id="kontakt_head" style="width:261px; height:48px; background-image: url([url_graph]kontaktsw.jpg); background-position: top; background-repeat: no-repeat;">&nbsp;</div><div id="kontakt_content" style=" width:261px; background-image: url([url_graph]menusrodek.jpg); background-position: top; background-repeat: repeat-y;"><div style="padding-left:45px; padding-right:10px;">[text_kontakt]</div></div><div id="kontakt_end" style="width:261px; height:7px; background-image: url([url_graph]menudolcl.jpg); background-position: top; background-repeat: no-repeat;">&nbsp;</div><div id="platnosc_head" style="width:261px; height:48px; background-image: url([url_graph]platnoscic.jpg); background-position: top; background-repeat: no-repeat;">&nbsp;</div><div id="platnosc_content" style=" width:261px; background-image: url([url_graph]menusrodek.jpg); background-position: top; background-repeat: repeat-y;"><div style="padding-left:45px; padding-right:10px;">[text_platnosc]</div></div><div id="platnosc_end" style="width:261px; height:7px; background-image: url([url_graph]menudolcl.jpg); background-position: top; background-repeat: no-repeat;">&nbsp;</div><div id="regulamin_head" style="width:261px; height:48px; background-image: url([url_graph]regulamins.jpg); background-position: top; background-repeat: no-repeat;">&nbsp;</div><div id="regulamin_content" style=" width:261px; background-image: url([url_graph]menusrodek.jpg); background-position: top; background-repeat: repeat-y;"><div style="padding-left:45px; padding-right:10px;">[text_regulamin]</div></div><div id="regulamin_end" style="width:261px; height:7px; background-image: url([url_graph]menudolcl.jpg); background-position: top; background-repeat: no-repeat;">&nbsp;</div></div><div id="right" style=" float:right; width:759px; text-align: center;"><div style="padding-top:15px; padding-bottom:5px; padding-right:15px; padding-left:15px;"><div style="margin: 0px 30px 10px 20px;  text-align: -webkit-center;  font-family: Arial; font-size: 14px; font-weight: bold;"><a href="http://allegro.pl/show_user_auctions.php?uid=13491547" style="color: #2264ab;" >Wszystkie nasze aukcje</a> &nbsp;<a href="http://allegro.pl/show_user.php?uid=13491547" style="color: #2264ab;">Komentarze</a>  &nbsp;<a href="http://allegro.pl/my_page.php?uid=13491547" style="color: #2264ab;">Strona "O mnie"</a>  &nbsp;<a href="http://allegro.pl/email_to_user.php?uid=13491547" style="color: #2264ab;">Wyślij wiadomość</a> &nbsp;<a href="http://www.allegro.pl/myaccount/favourites_sellers.php/addNew/?userId=13491547&ret=%2Fshow_user.php%3Fuid%3D13491547" style="color: #2264ab;">Dodaj do ulubionych</a></div><h2>Witaj na aukcji firmy P.P.H Stanpol</h2><p>Na tej aukcji zakup <h2> [text_1] </h2>w cenie: <h2> [text_2]</h2></p><img src="[url_graph]mapa.jpg" width="640" height="480" style="box-shadow: 5px 5px 5px #888888;"><p>Opis produktu:</p><br /><p>[text_3]</p><br /><p>[text_4]</p><br /><p>[text_5]</p><img src="[url_graph]mapa.jpg" width="640" height="480" style="box-shadow: 5px 5px 5px #888888;"><br /><p>[text_6]</p><img src="[url_graph]mapa.jpg" width="640" height="480" style="box-shadow: 5px 5px 5px #888888;"><br /><p>[text_7]</p><img src="[url_graph]mapa.jpg" width="640" height="480" style="box-shadow: 5px 5px 5px #888888;"><br /><p>[text_8]</p><img src="[url_graph]mapa.jpg" width="640" height="480" style="box-shadow: 5px 5px 5px #888888;"><br /><p>Darmowa przesyłka dotyczy obszaru zaznaczonego na mapie: (120 km. od siedziby firmy)</p><img src="[url_graph]mapa.jpg" width="640" height="640" style="box-shadow: 5px 5px 5px #888888;"><br /><a href="http://allegro.pl/listing/user.php?us_id=13491547" ><h2>Inne nasze aukcje:</h2></a><div id="inneaukcje" style="overflow: hidden; padding: 10px 10px 10px 10px ; margin: 0px 0px 0px 0px;"><a href="http://allegro.pl/listing/user/listing.php?us_id=13491547&string=kora&search_scope=userItems-13491547"><div style="box-shadow: 5px 5px 5px #888888; display: block; float:left;  width: 190px; height: 250px;  padding: 0px 0px 0px 0px ;  margin: 5px 5px 5px 5px; background-image: url(); background-position: top; background-repeat: no-repeat; color: #2264ab;"><br /><br /><br /><br /><br />Kora</div></a><a href="http://allegro.pl/listing/user/listing.php?us_id=13491547&string=torf&search_scope=userItems-13491547"><div style="box-shadow: 5px 5px 5px #888888; display: block; float:left;  width: 190px; height: 250px;  padding: 0px 0px 0px 0px ;  margin: 5px 5px 5px 5px; background-image: url(); background-position: top; background-repeat: no-repeat; color: #2264ab;" ><br /><br /><br /><br /><br />Torf</div></a><a href="http://allegro.pl/listing/user/listing.php?us_id=13491547&string=ziemia&search_scope=userItems-13491547"><div style="box-shadow: 5px 5px 5px #888888; display: block; float:left;  width: 190px; height: 250px;  padding: 0px 0px 0px 0px;  margin: 5px 5px 5px 5px; background-image: url(); background-position: top; background-repeat: no-repeat; color: #2264ab;"><br /><br /><br /><br /><br />Ziemia</div></a><a href="http://allegro.pl/listing/user/listing.php?us_id=13491547&string=grys&search_scope=userItems-13491547"><div style="box-shadow: 5px 5px 5px #888888; display: block; float:left;  width: 190px; height: 250px;  padding: 0px 0px 0px 0px ;  margin: 5px 5px 5px 5px; background-image: url(); background-position: top; background-repeat: no-repeat; color: #2264ab;"><br /><br /><br /><br /><br />Grys</div></a><a href="http://allegro.pl/listing/user/listing.php?us_id=13491547&string=kora+kamienna&search_scope=userItems-13491547"><div style="box-shadow: 5px 5px 5px #888888; display: block; float:left;  width: 190px; height: 250px;  padding: 0px 0px 0px 0px ;  margin: 5px 5px 5px 5px; background-image: url(); background-position: top; background-repeat: no-repeat; color: #2264ab;"><br /><br /><br /><br /><br />Kora kamienna</div></a><a href="http://allegro.pl/listing/user/listing.php?us_id=13491547&string=grys+granitowy&search_scope=userItems-13491547"><div style="box-shadow: 5px 5px 5px #888888; display: block; float:left;  width: 190px; height: 250px;  padding: 0px 0px 0px 0px ;  margin: 5px 5px 5px 5px; background-image: url(); background-position: top; background-repeat: no-repeat; color: #2264ab;"><br /><br /><br /><br /><br />Grys granitowy</div></a><a href="http://allegro.pl/listing/user/listing.php?us_id=13491547&string=żwir&search_scope=userItems-13491547"><div style="box-shadow: 5px 5px 5px #888888; display: block; float:left;  width: 190px; height: 250px;  padding: 0px 0px 0px 0px ;  margin: 10px 10px 10px 10px; background-image: url(); background-position: top; background-repeat: no-repeat; color: #2264ab;"><br /><br /><br /><br /><br />Żwir</div></a></div></div></div></div></div><div id="footer" style="width:1020px; height:259px; background-color: red; background-image: url([url_graph]dolw.jpg); background-repeat: no-repeat;">&nbsp;</div></div>');
--select * from `allegro_template`;

CREATE TABLE  if not exists  `gallery` (
`id` int unsigned not null auto_increment primary key,
`name` char(255) not null,
`desc` char(255)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

insert into `gallery` values(NULL, 'Usunięte', 'Zamiast usuwać zdjęć, przenoś je do tej galerii');
--select * from gallery;
--SELECT * FROM `gallery` INNER JOIN (SELECT count("*") FROM `photos`) AS `ilosc` ON (`gallery`.`id` = `photos`.`gallery_id`);
--SELECT * ,(select count(*) from photos where photos.gallery_id = gallery.id) as count FROM gallery;

CREATE TABLE  if not exists  `photos` (
`id` int unsigned not null auto_increment primary key,
`filename` char(255) not null,
`oldfilename` char(255) not null,
`mime_type` char(255) not null,
`size` int not null,
`desc` char(255),
`gallery_id` int unsigned
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

SELECT * FROM `photos` WHERE `gallery_id` = 1 ;
--select *, size/1024/1024 from photos;
--select  distinct filename from photos;
--select count(*) from photos where gallery_id IS NULL;
--insert into `photos` values(NULL, 'filename', 'oname', 'mime', '12345', NULL, '1');
--insert into `photos` values(NULL,'1367537068.jpg', 'skany001-2.jpg', 'image/jpeg', '2122600', NULL);



CREATE TABLE  if not exists  `admin_menu` (
`id` int unsigned not null auto_increment primary key,
`name` char(60) not null,
`path` char(60) not null
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

insert into `admin_menu` values(NULL, 'Pulpit', 'admin');
--insert into `admin_menu` values(NULL, 'Menu', 'menu');
insert into `admin_menu` values(NULL, 'Blog', 'blog');
insert into `admin_menu` values(NULL, 'Galeria', 'gallery');
insert into `admin_menu` values(NULL, 'Allegro', 'allegro');




-- tabela z menu

CREATE TABLE  if not exists  `menu` (
`id` int unsigned not null auto_increment primary key,
`parent_node` int unsigned not null,
`next_node` int unsigned not null,
`prev_node` int unsigned not null,
`child_node` int unsigned not null,
`name` char(60) not null,
`title` char(60) not null,
`type` char(4) not null,
`param` char(255)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

insert into `menu` values(NULL, '0', '0', '0', '2',  'glowne', '', 'menu', '');
insert into `menu` values(NULL, '1', '3', '0', '0',  'blog', 'Blog', 'url', '/');
insert into `menu` values(NULL, '1', '4', '2', '0',  'portfolio', 'Portfolio', 'url', '/portfolio');
insert into `menu` values(NULL, '1', '5', '3', '0',  'uslugi', 'Usługi', 'url', '/uslugi');
insert into `menu` values(NULL, '1', '6', '4', '0',  'strony', 'Strony WWW', 'url', '/strony-www');
insert into `menu` values(NULL, '1', '0', '5', '0',  'kontakt', 'Kontakt', 'url', '/kontakt');
insert into `menu` values(NULL, '0', '0', '0', '9',  'polecam', '', 'menu', '');
insert into `menu` values(NULL, '8', '10', '0', '0',  'google', 'Google', 'url', 'http://google.pl');
insert into `menu` values(NULL, '8', '0', '9', '0',  'cezik', 'Cezik', 'url', 'http://cezik.com/');




select * from menu;

-- tabela z wpisami menu

-- tabela z podstawowymi ustawieniami

CREATE TABLE  if not exists  `default_config` (
`id` int unsigned not null auto_increment primary key,
`name` char(60) not null,
`value` char(255) not null
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

insert into `default_config` values(NULL, 'title', 'Marak informatyk');
insert into `default_config` values(NULL, 'logo', 'marak89.com');
insert into `default_config` values(NULL, 'motto', 'My own place in the INTERactive NETwork');
insert into `default_config` values(NULL, 'keywords', 'marak89, marcin, rał');
insert into `default_config` values(NULL, 'description', 'Źródło wiedzy o technologji');
insert into `default_config` values(NULL, 'author', 'Marcin Rał');
insert into `default_config` values(NULL, 'template', 'bluesurge');
insert into `default_config` values(NULL, 'content-language', 'pl');
insert into `default_config` values(NULL, 'robots', 'all');
insert into `default_config` values(NULL, 'revisit-after', '30'); -- gdzie zapraszasz robota do powrotu po - w tym przykładzie 30 - dniach, aby zarejestrował zmiany,
insert into `default_config` values(NULL, 'date', '2001-07-22T'); --gdzie dajesz datę stworzenia strony - tu rok, miesiąc, dzień; może być też godzina, minuta, sekunda
insert into `default_config` values(NULL, 'copyright', 'Marcin Rał');
insert into `default_config` values(NULL, 'reply-to', 'marak89@marak89.com');
insert into `default_config` values(NULL, 'classification', 'Tag o klasyfikowaniu strony');
--insert into `default_config` values(NULL, '', '');
--insert into `default_config` values(NULL, '', '');
--insert into `default_config` values(NULL, '', '');
--select * from default_config;
--insert into `default_config` values(NULL, '', '');

-- tabela z sesjami kohany

CREATE TABLE  if not exists  sessions (
`session_id` VARCHAR(24) NOT NULL,
`last_active` INT UNSIGNED NOT NULL,
`contents` TEXT NOT NULL,
PRIMARY KEY (`session_id`),
INDEX (`last_active`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

---  twożenie tabeli blog

create table if not exists blog (
post_id  int unsigned not null auto_increment primary key,
title char(50) not null unique, 
url char(50) not null unique, 
`content` longtext not null,
`desc` char(255) not null,
image char(100) null,
`data` int unsigned not null,
author char(60) not null,
data_last_mod int unsigned ,
user_last_mod char(60),
mod_count tinyint unsigned not null,
stick bool not null,
stick_pos tinyint unsigned not null,
page bool not null,
del  bool not null,
tags char(255) not null,
gallery char(255) null
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci; 


INSERT INTO `blog` VALUES(NULL, 'Polityka cookies', 'polityka-cookies', '<p>Rozpoczęliśmy działalność w 1995 r. i od tego czasu funkcjonujemy z sukcesami na rynku krajowym i zagranicznym. Specjalizujemy się w branży produkcyjnej. Nasi stali klienci cenią w szczególności wysoką jakość naszych produktów, która jest poparta długoletnim doświadczeniem.</p><p>Systematycznie poszerzamy zakres oferowanych przez nas produktów uwzględniając aktualne nowości wyłaniające się na rynku, dzięki czemu w naszej ofercie znajdą Państwo zawsze unikalne wzornictwo oraz ogromny wybór.</p><p>Zachęcamy Państwa do poznania naszej oferty.</p>', 'Krótka historia firmy', '', 1365496252, 'admin', 1365498934, 'admin', 1, 0, 0, 1, 0, 'historia, o firmie, firma, stanpol,', NULL);
INSERT INTO `blog` VALUES(NULL, 'Transport', 'transport', '<p>a) choinki, podkłady, wiązanki, wieńce, stroiki - cała polska przy ilościach hurtowych<br /> b) ziemia, kora, grys - przy wcześniejszym uzgodnieniu:<br /> woj. śląskie.<br /> woj. łódzkie,<br /> woj. opolskie,<br /> woj. świętokrzyskie,<br /> woj. małopolskie.</p>', 'Warunki transportu', '', 1365496254, 'admin', 1365496547, 'admin', 1, 0, 0, 1, 0, 'transport, warunki transportu, dostawa,', NULL);
INSERT INTO `blog` VALUES(NULL, 'Kontakt', 'kontakt', '<p>Siedziba Naszej firmy znajduje się przy trasie DK 1(E75) Katowice-Częstochowa</p><br /><p>Adres:<br />P.P.H.STANPOL<br />Cynków<br />ul. Dąbrówka 31<br />42-350 Koziegłowy<br />woj.śląskie</p><br /><p>Telefon:<br />- kom. 601 51 49 79 <br />- kom. 693 52 83 65<br />- fax. 34 314 20 80</p><p>Internet:<br />- e-mail <script type="text/javascript">// <![CDATA[\nsecmail=(''stanpol65@'' + ''o2.pl'')\ndocument.write(''<A href="mailto:'' + secmail + ''">'' + secmail + ''</a>'')\n// ]]></script>\n<noscript>Adres e-mail zabezpieczony. Włącz JavaScript aby go zobaczyć.\n</noscript><br />- www <a href="http://choinki-kozieglowy.com">choinki-kozieglowy.com/</a></p><br /><p>Mapa dojazdu:</p><p><a href="http://www.zumi.pl/1593882,PPH_Stanpol_Stanislaw_Bedkowski,Cynkow,firma.html">Mapa Zumi</a></p>', 'Dane teleadresowe przedsiębiorstwa', '', 1365496262, 'admin', 1365698549, 'admin', 3, 0, 0, 1, 0, 'kontakt, dojazd, telefon, adres, mapa,', NULL);
INSERT INTO `blog` VALUES(NULL, 'Choinki', 'choinki', '<p>Sprzedajemy wyprodukowane u nas choinki  w rozmiarach:<br />\n- 2.20m<br />\n- 1.80m<br />\n- 1.50m<br />\n- 1.20m<br />\n- 1.00m<br />\n- 0.80m<br />\n- 0.60m<br />\n- 0.40m<br /></p>', 'Sztuczne choinki naszej produkcji', '/public/galeria/choinki/default.jpg', 1365496262, 'admin', 1365510007, 'admin', 1, 0, 0, 0, 0, 'Choinki, php,', NULL);
INSERT INTO `blog` VALUES(NULL, 'Wiązanki i wieńće', 'wiazanki-i-wience', '<p>wiązanki i wieńce pogrzebowe prezentowane poniżej są to ubrane podkłady będące również w Naszej ofercie bez przybrania, najładniejsze to wiązanki przebrane na liściach dużym, średnim oraz małym.</p>', 'Wiązanki i wieńce pogrzebowe', '/public/galeria/wiazanki/default.jpg', 1365496262, 'admin', 1365697685, 'admin', 2, 0, 0, 0, 0, 'wiązanki, pogrzebowe, wieńce, wience, wiazanki, mysql', NULL);
INSERT INTO `blog` VALUES(NULL, 'Stroiki', 'stroiki', '<p>Sprzedajemy wyprodukowane u nas stroiki:<br />\n- wielkanocne<br />\n- bożenarodzeniowe<br />\n- całoroczne<br />\n- cmentarne<br />\n<br />\nPonad 100 różnych wzorów.\n', 'Stroiki własnej produkcji', '/public/galeria/stroiki/default.jpg', 1365496262, 'admin', 1365510387, 'admin', 1, 0, 0, 0, 0, 'stroiki, sztuczne, wielkanocne, bożenarodzeniowe, całoroczne, linux,', NULL);
INSERT INTO `blog` VALUES(NULL, 'Podkłady', 'podklady', '<p>Produkujemy podkłady w kształcie:<br />\nmisa<br />\nłezka<br />\nłódka</p>', 'Podkłady naszej produkcji', '/public/galeria/podklady/default.jpg', 1365496262, 'admin', 1365510250, 'admin', 1, 0, 0, 0, 0, 'podkłady, misa, łezka, łódka, mcms', NULL);
INSERT INTO `blog` VALUES(NULL, 'Ozdoby', 'ozdoby', 'tresc. ', 'opis', '/public/galeria/ozdoby/default.jpg', 1365496262, 'admin', NULL, NULL, 0, 0, 0, 0, 0, 'learnnet', NULL);
INSERT INTO `blog` VALUES(NULL, 'Girlandy', 'girlandy', 'tresc. ', 'opis', '/public/galeria/girlandy/default.jpg', 1365496262, 'admin', NULL, NULL, 0, 0, 0, 0, 1, 'marak89', NULL);
INSERT INTO `blog` VALUES(NULL, 'Gałązki', 'galazki', 'tresc. ', 'opis', '/public/galeria/galazki/default.jpg', 1365496262, 'admin', NULL, NULL, 0, 0, 0, 0, 1, 'marak89', NULL);
INSERT INTO `blog` VALUES(NULL, 'Kora', 'kora', '<p>Proponujemy również Państwu korę sosnową. W swojej ofercie posiadamy:<br />\n<br />\nfrakcja 0,0-0,5 cm.<br />\nfrakcja 0,5-3 cm.<br />\nfrakcja 3-9 cm.<br />\nfrakcja 0,0-9 cm.<br />\n<br />\n<br />\nZASTOSOWANIE KORY:<br />\n<br />\ndo zapobiegania nadmiernego wzrostu chwastów<br />\ndo utrzymywania wilgotności podłoża<br />\nchroni system korzeniowy przed mrozami<br />\npodwyższa estetykę ogrodu<br />', 'Kora mielona sortowana sosnowa', '/public/galeria/kora_sosnowa/default.jpg', 1365496262, 'admin', 1365694869, 'admin', 2, 0, 0, 0, 0, 'kora, sosnowa, kora sosnowa, kora mielona, mielona, kora sortowana, sortowana,', NULL);
INSERT INTO `blog` VALUES(NULL, 'Ziemia', 'ziemia', '<p>Przetwarzamy:<br />\nZiemia <b>kwiatowa</b> ziemia <b>ogrodowa</b> ziemia <b>uniwersalna</b></br> <br />\nOferujemy w sprzedaży opakowania:<br />\n<br />\n6l  (250 szt. na palecie)<br />\n12l (140 szt. na palecie)<br />\n25l ( 60 szt. na palecie)<br />\n65l ( 32 szt. na palecie)<br /></p>', 'Ziemia kwiatowa, ogrodową i uniwersalna.', '/public/galeria/ziemia_ogrodowa/default.jpg', 1365496262, 'admin', 1365695050, 'admin', 3, 0, 0, 0, 0, 'ziemia, uniwersalna, kwiatowa, ogrodowa,', NULL);
INSERT INTO `blog` VALUES(NULL, 'Torf', 'torf', '<p>W swojej ofercie posiadamy również torfy:\n<br />\n<b>odkwaszony</b><br />\n<b>kwaśny</b><br />\n<br />\nDostępne w opakowaniach o pojemności:<br />\n<br />\n12l. (140 szt. na palecie)<br />\n65l. (32 szt. na palecie)<br />\nbig-bag (5m<sup>3</sup> na palecie)<br />\n <br />\nZASTOSOWANIE TORFU KWAŚNEGO pH 4,2-4,8:<br />\n<br />\n- do iglaków do roślin kwaśnolubnych<br />\n- do zakwaszania gleby<br />\nZASTOSOWANIE TORFU ODWASZONEGO pH 5,5-6,5:<br />\n<br />\n- do zakładania trawników<br />\n- do użyźniania gleby<br /></p>', 'Torf kwaśny i odkwaszony', '/public/galeria/torf_kwasny/default.jpg', 1365496262, 'admin', 1365695297, 'admin', 2, 0, 0, 0, 0, 'torf, kwaśny, odkwaszony,', NULL);
INSERT INTO `blog` VALUES(NULL, 'Grys', 'grys', '<p>Posiadamy w naszej ofercie następujące kamienie ozdobne<br />\n<br />\n<b>kora kamienna</b> frakcja 31,5-63 mm. <br />\n<b>grys granitowy</b> frakcja 8-16 mm. <br />\n<b>żwir frakcja</b> 8-16 mm. <br />\n<b>grys biały frakcja</b> 8-16 mm.<br />\n<br />\nZASTOSOWANIE:<br />\n<br />\nelement dekoracyjny  <br />\ndo celów budowlanych<br />\nwokół domu<br />\nopaski, chodniki<br />\nścieżki ,alejki<br />\noczka wodne<br />\nogrody skalne<br />\nobsypywanie na powierzchnie doniczek z kwiatami.<br />\n <br />\nStosowanie kruszywa daje ładny i estetyczny wygląd ogrodów oraz domów.<br />\n<br />\nDostępnego w opakowaniach:<br />\n<br />\n2kg<br />\n6kg<br />\n25kg<br />\n1 tona luzem<br />\n1 tona big-bag<br /></p>', 'Oferujemy grys ozdobny', '/public/galeria/grys/default.jpg', 1365496262, 'admin', 1365696056, 'admin', 2, 0, 0, 0, 0, 'big-bag, grys, grys ozdobny, marak89,', NULL);


--update blog SET del = true where post_id = 1;
--select * from blog ;
--SELECT * FROM `blog` WHERE `del` = 'false' AND `page` = true ORDER BY `data` DESC;
-- wherepost_id = 1;
--- tworzenie tabeli users

create table if not exists users (
user_id  int unsigned not null auto_increment primary key,
username char(62) unique not null,
`password` char(32) not null,
`range` char(2),
`name` char(20),
surname char(40),
email char(20),
confirmed bool,
skype char(30),
phone char(15),
gg char(10),
url char(40),
address char(50),
city char(30),
zip_code char(6),
first_login int unsigned,
last_login int unsigned,
last_ip char(50),
description char(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;


insert into users (username, `password`, `range`) values ('admin', md5('cmsadmin'), '5');
insert into users (username, `password`, `range`) values ('żółć', md5('cmsadmin'), '1');

-- tworzenie tabeli comments

create table if not exists comments (
comment_id  int unsigned not null auto_increment primary key,
author char(60) not null,
`content` longtext not null,
`data` int unsigned not null,
post_id  int unsigned not null,
data_last_mod int unsigned ,
user_last_mod char(60),
mod_count tinyint unsigned
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci ; 


insert into comments (author, content, data, post_id) values ( 'admin', 'Zapraszam do komentowania', unix_timestamp(now()), 1 );

--- wyświetlanie całej struktury
 
--select * from blog;
-- select * from users;
-- select * from comments;

-- select count(*) as 'ilość postów' from blog;
-- select count(*) as 'ilość użytkowników' from users;
-- select count(*) as 'ilość komentarzy' from comments;


--- pozotałości: 
--- select * from blog where post_id = last_insert_id();
-- select unix_timestamp(now()) ;
--Kodowanie oraz metodę porównywania napisów dla tabeli zmieniamy zapytaniem:
--ALTER TABLE users DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;