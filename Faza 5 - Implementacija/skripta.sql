SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

DROP SCHEMA IF EXISTS `veselipsi` ;

CREATE SCHEMA IF NOT EXISTS `veselipsi` DEFAULT CHARACTER SET utf8 ;
USE `veselipsi` ;


DROP TABLE IF EXISTS `veselipsi`.`Korisnik` ;

CREATE TABLE IF NOT EXISTS `veselipsi`.`Korisnik` (
  `idK` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `lozinka` VARCHAR(45) NOT NULL,
  `ime` VARCHAR(45) NOT NULL,
  `prezime` VARCHAR(45) NOT NULL,
  `vrsta` tinyint(4) NOT NULL,
  `odobren` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`idK`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO `korisnik` (`idK`, `email`, `lozinka`, `ime`, `prezime`, `vrsta`, `odobren`) VALUES
(1, 'sofijanosevic@gmail.com', 'sifra123', 'Sofija', 'Janošević', 1, 1),
(2, 'djidja@gmail.com', 'sifra123', 'Anđela', 'Jovanović', 2, 1),
(4, 'naka2000@gmail.com', 'jovana123', 'Jovana', 'Stojanovski', 1, 1),
(5, 'micaz00@gmail.com', 'milica123', 'Milica', 'Živković', 1, 1),
(6, 'misastanojlo00@gmail.com', 'misa123', 'Miloš', 'Stanojlović', 1, 1),
(7, 'lida00@gmail.com', 'lida123', 'Lidija', 'Stojadinović', 1, 1),
(8, 'nala00@gmail.com', 'nala123', 'Nađa', 'Stanković', 1, 1),
(9, 'andra00@gmail.com', 'andra123', 'Andrija', 'Brajsovac', 1, 1),
(10, 'dzeni00@gmail.com', 'dzeni123', 'Džensena', 'Mušović', 2, 1),
(11, 'tamarica02@gmail.com', 'tamarica123', 'Tamara', 'Najdanović', 2, 0),
(12, 'masa98@gmail.com', 'masa123', 'Maša', 'Stanković', 2, 1),
(13, 'anarad01@gmail.com', 'sifra123', 'Ana', 'Radovanović', 0, 1),
(14, 'jjovana@gmail.com', 'sifra123', 'Jovana', 'Jaćimović', 0, 1),
(15, 'nana@gmail.com', 'sifra123', 'Nastasija', 'Avramović', 0, 1);



DROP TABLE IF EXISTS `veselipsi`.`Admin` ;

CREATE TABLE IF NOT EXISTS `veselipsi`.`Admin` (
  `idK` INT NOT NULL,
  PRIMARY KEY (`idK`),
  CONSTRAINT `idK_admin`
    FOREIGN KEY (`idK`)
    REFERENCES `veselipsi`.`Korisnik` (`idK`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO `admin` (`idK`) VALUES 
(13), (14), (15);



DROP TABLE IF EXISTS `veselipsi`.`DeoGrada` ;

CREATE TABLE IF NOT EXISTS `veselipsi`.`DeoGrada` (
  `idDeoGrada` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idDeoGrada`))
ENGINE = InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

INSERT INTO `deograda` (`idDeoGrada`, `naziv`) VALUES
(1, '29. Novembra'),
(2, 'Altina'),
(3, 'Andrićev venac'),
(4, 'Autokomanda'),
(5, 'Bajlonijeva pijaca'),
(6, 'Banjica'),
(7, 'Banovo brdo'),
(8, 'Batajnica'),
(9, 'Bele vode'),
(10, 'Belvil'),
(11, 'Beograd na vodi'),
(12, 'Beograđanka'),
(13, 'Bežanijska kosa'),
(14, 'Bogoslovija'),
(15, 'Borča'),
(16, 'Botanička bašta'),
(17, 'Braće Jerković'),
(18, 'Bulbuder'),
(19, 'Bulevar Kr. Aleksandra'),
(20, 'Centar'),
(21, 'Cerak'),
(22, 'Cerak vinogradi'),
(23, 'Crveni krst'),
(24, 'Čubura'),
(25, 'Čukarica'),
(26, 'Cvetanova ćuprija'),
(27, 'Cvetkova pijaca'),
(28, 'Cvetni trg'),
(29, 'Cvijićeva'),
(30, 'Dedinje'),
(31, 'Denkova bašta'),
(32, 'Đeram pijaca'),
(33, 'Donji Dorćol'),
(34, 'Dunavski kej'),
(35, 'Dušanovac'),
(36, 'Filmski grad'),
(37, 'Golf naselje'),
(38, 'Gornji Dorćol'),
(39, 'Gradska bolnica'),
(40, 'Gundulićev venac'),
(41, 'Hala Pionir'),
(42, 'Jajinci'),
(43, 'Julino brdo'),
(44, 'Južni bulevar'),
(45, 'Kalemegdan'),
(46, 'Kalenić pijaca'), 
(47, 'Kaluđerica'),
(48, 'Kanarevo brdo'),
(49, 'Karaburma'),
(50, 'Klinički centar'),
(51, 'Kluz'),
(52, 'Knez Mihajlova'),
(53, 'Kneza Miloša'),
(54, 'Kneževac'),
(55, 'Konjarnik'),
(56, 'Kopitareva gradina'),
(57, 'Kosančićev venac'),
(58, 'Košutnjak'),
(59, 'Kotež'),
(60, 'Krnjača'),
(61, 'Kumodraž'),
(62, 'Labudovo brdo'),
(63, 'Ledine'),
(64, 'Lekino brdo'),
(65, 'Lion'),
(66, 'Lipov lad'),
(67, 'Lisičji potok'),
(68, 'Manjež'),
(69, 'Medaković'),
(70, 'Miljakovac'),
(71, 'Mirijevo'),
(72, 'Neimar'),
(73, 'Novi Beograd'),
(74, 'Novo groblje'),
(75, 'Obilićev venac'),
(76, 'Ostružnica'),
(77, 'Palata pravde'),
(78, 'Palilula'),
(79, 'Palilulska pijaca'),
(80, 'Partizanov stadion'),
(81, 'Petlovo brdo'),
(82, 'Politika'),
(83, 'Poštanska štedionica'),
(84, 'Pregrevica'),
(85, 'Profesorska kolonija'),
(86, 'Resnik'),
(87, 'Retenzija'),
(88, 'Rudo'),
(89, 'Sarajevska'),
(90, 'Sava mala'),
(91, 'Savski trg'),
(92, 'Savski venac'),
(93, 'Senjak'),
(94, 'Severni bulevar'),
(95, 'Skadarlija'),
(96, 'Slavija'),
(97, 'Slavujev venac'),
(98, 'Stari Grad'),
(99, 'Strahinjića Bana'),
(100, 'Studentski Trg'),
(101, 'Šumice'),
(102, 'Surčin'),
(103, 'Tašmajdan'),
(104, 'Terazije'),
(105, 'Topčider'),
(106, 'Topličin venac'),
(107, 'Tošin bunar'),
(108, 'Trg Republike'),
(109, 'Trošarina'),
(110, 'Učiteljsko naselje'),
(111, 'Vidikovac'),
(112, 'Viline vode'),
(113, 'Višnjica'),
(114, 'Višnjička banja'),
(115, 'Voždovac'),
(116, 'Vračar'),
(117, 'Vukov spomenik'),
(118, 'Žarkovo'),
(119, 'Zeleni venac'),
(120, 'Zeleno Brdo'),
(121, 'Železnik'),
(122, 'Zemun'),
(123, 'Zemun Polje'),
(124, 'Zvezdara'),
(125, 'Zvezdarska Šuma'),
(126, 'Zvezdin stadion');



DROP TABLE IF EXISTS `veselipsi`.`Setac` ;

CREATE TABLE IF NOT EXISTS `veselipsi`.`Setac` (
  `idK` INT NOT NULL,
  `godine` INT NOT NULL,
  `telefon` VARCHAR(13) NOT NULL,
  `pol` TINYINT(1) NOT NULL,
  `opis` VARCHAR(300) NOT NULL,
  `idDeoGrada` INT NOT NULL,
  `slika` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idK`),
  INDEX `idDeoGrada_idx` (`idDeoGrada` ASC),
  CONSTRAINT `idK_setac`
    FOREIGN KEY (`idK`)
    REFERENCES `veselipsi`.`Korisnik` (`idK`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idDeoGrada_setac`
    FOREIGN KEY (`idDeoGrada`)
    REFERENCES `veselipsi`.`DeoGrada` (`idDeoGrada`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `setac` (`idK`, `godine`, `telefon`, `pol`, `opis`, `idDeoGrada`, `slika`) VALUES
(2, 20, '064123456', 1, 'Meni kažu da sam ljubimac, al\' ne vidim da me neko šeta', 1, 'djidja.jpeg');
INSERT INTO `setac` (`idK`, `godine`, `telefon`, `pol`, `opis`, `idDeoGrada`, `slika`) VALUES
(10, 22, '0631973597', 1, 'Šetam dobermane, a i ostale', 11, 'dzeni.jpg');
INSERT INTO `setac` (`idK`, `godine`, `telefon`, `pol`, `opis`, `idDeoGrada`, `slika`) VALUES
(11, 19, '0662832838', 1, 'I mačke šetam, ali ajde', 6, 'tamara.jpg');
INSERT INTO `setac` (`idK`, `godine`, `telefon`, `pol`, `opis`, `idDeoGrada`, `slika`) VALUES
(12, 23, '0655523256', 1, 'Šetam sve što ne grize', 13, 'masa.jpg');


DROP TABLE IF EXISTS `veselipsi`.`Vlasnik` ;

CREATE TABLE IF NOT EXISTS `veselipsi`.`Vlasnik` (
  `idK` INT NOT NULL,
  `godine` INT NOT NULL,
  `pol` TINYINT(1) NOT NULL,
  `telefon` VARCHAR(13) NOT NULL,
  `opis` VARCHAR(300) NOT NULL,
  `idDeoGrada` INT NOT NULL,
  `slika` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idK`),
  INDEX `idDeoGrada_idx` (`idDeoGrada` ASC),
  CONSTRAINT `idK_vlasnik`
    FOREIGN KEY (`idK`)
    REFERENCES `veselipsi`.`Korisnik` (`idK`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idDeoGrada_vlasnik`
    FOREIGN KEY (`idDeoGrada`)
    REFERENCES `veselipsi`.`DeoGrada` (`idDeoGrada`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `vlasnik` (`idK`, `godine`, `pol`, `telefon`, `opis`, `idDeoGrada`, `slika`) VALUES
(1, 22, 1, '062241598', 'Sofija je život', 2, 'coka.jpg'),
(4, 21, 1, '0698871536', 'Fifi i ja ličimo, života mi.', 5, 'naka.jpg'),
(5, 21, 1, '0633366989', 'Ćao, Mica je :D', 7, 'mica.jpg'),
(6, 21, 0, '0645559996', 'Niko ovde nije opasan kao sto izgleda :p', 6, 'misa.jpg'),
(7, 21, 1, '0698870443', 'French bulldogs <3', 10, 'lida.jpg'),
(8, 21, 1, '064262857', 'Ja MalaNala i moji labradori :))', 8, 'nadja.jpg'),
(9, 21, 0, '0658976579', 'Nije moje, Milenino je.', 1, 'bracko.jpg');


DROP TABLE IF EXISTS `veselipsi`.`RasaPasa` ;

CREATE TABLE IF NOT EXISTS `veselipsi`.`RasaPasa` (
  `idR` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idR`))
ENGINE = InnoDB AUTO_INCREMENT=47;

INSERT INTO `RasaPasa` (`idR`, `naziv`) VALUES
(1, 'Akita'),
(2, 'Američki buldog'),
(3, 'Argentinska doga'),
(4, 'Bernardinac'),
(5, 'Bernski planinski pas'),
(6, 'Bigl'),
(7, 'Bišon'),
(8, 'Boston terijer'),
(9, 'Bul terijer'),
(10, 'Bulmastif'),
(11, 'Crni ruski terijer'),
(12, 'Čivava'),
(13, 'Doberman'),
(14, 'Džek rasel terijer'),
(15, 'Engleski buldog'),
(16, 'Engleski mastif'),
(17, 'Erdel Terijer'),
(18, 'Francuski buldog'),
(19, 'Haski'),
(20, 'Hrt'),
(21, 'Irski seter'),
(22, 'Jazavičar'),
(23, 'Jorkšijski terijer'),
(24, 'Kanarinac'),
(25, 'Kane Korso'),
(26, 'Koker španijel'),
(27, 'Kuvas'),
(28, 'Labrador'),
(29, 'Mađarski pulin'),
(30, 'Maltezer'),
(31, 'Mešanac'),
(32, 'Mops'),
(33, 'Napuljski mastif'),
(34, 'Nemački ovčar'),
(35, 'Patuljasti pinč'),
(36, 'Patuljasti šnaucer'),
(37, 'Pekinezer'),
(38, 'Pitbul'),
(39, 'Pudlica'),
(40, 'Rotvajler'),
(41, 'Samojed'),
(42, 'Šarplaninac'),
(43, 'Sibirski haski'),
(44, 'Stafordski bul terijer'),
(45, 'Terijer'),
(46, 'Zlatni retriver');


DROP TABLE IF EXISTS `veselipsi`.`Ljubimac` ;

CREATE TABLE IF NOT EXISTS `veselipsi`.`Ljubimac` (
  `idLjubimac` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(45) NOT NULL,
  `starost` INT NOT NULL,
  `idR` INT NOT NULL,
  `pol` TINYINT(1) NOT NULL,
  `parenje` TINYINT(1) NOT NULL,
  `opis` VARCHAR(300) NOT NULL,
  `idK` INT NOT NULL,
  `slika` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idLjubimac`),
  INDEX `idR_idx` (`idR` ASC),
  INDEX `idK_idx` (`idK` ASC),
  CONSTRAINT `idR_ljubimac`
    FOREIGN KEY (`idR`)
    REFERENCES `veselipsi`.`RasaPasa` (`idR`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idK_ljubimac`
    FOREIGN KEY (`idK`)
    REFERENCES `veselipsi`.`Vlasnik` (`idK`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB AUTO_INCREMENT=10;

INSERT INTO `ljubimac` (`idLjubimac`, `ime`, `starost`, `idR`, `pol`, `parenje`, `opis`, `idK`, `slika`) VALUES
(1, 'Iskra', 2, 31, 1, 1, 'Ja zapravo nisam Sofijina', 1, 'iskra.jpg'),
(2, 'Fifi', 3, 35, 1, 1, 'Na struju', 4, 'fifi.jpg'),
(3, 'Dragoljub', 6, 7, 0, 1, 'Slaže mi se stav sa imenom', 5, 'dragoljub.jpg'),
(4, 'Hak', 1, 25, 0, 1, 'Izgled vara, maza sam', 6, 'hak.jpg'),
(5, 'Arči', 2, 18, 0, 1, 'Malo, crno ', 7, 'arci.jpg'),
(6, 'Tia', 5, 18, 1, 1, 'Hrana kažeš?', 7, 'tia.jpg'),
(7, 'Džoks', 0, 28, 0, 0, 'Još sam mali', 8, 'dzoks.jpg'),
(8, 'Dora', 3, 28, 1, 1, 'Ovaj pored je moja beba', 8, 'dora.jpg'),
(9, 'Pablo', 4, 18, 0, 1, 'Mama kaže da mi je ovaj Andrija neki brat', 9, 'pablo.jpg');


DROP TABLE IF EXISTS `veselipsi`.`Setnja` ;

CREATE TABLE IF NOT EXISTS `veselipsi`.`Setnja` (
  `idSetnja` INT NOT NULL AUTO_INCREMENT,
  `datum` DATE NOT NULL,
  `vremeOd` TIME NOT NULL,
  `vremeDo` TIME NOT NULL,
  `cena` INT NOT NULL,
  `idDeoGrada` INT NOT NULL,
  `idK` INT NOT NULL,
  PRIMARY KEY (`idSetnja`),
  INDEX `idDeoGrada_idx` (`idDeoGrada` ASC),
  INDEX `idK_idx` (`idK` ASC),
  CONSTRAINT `idDeoGrada_setnja`
    FOREIGN KEY (`idDeoGrada`)
    REFERENCES `veselipsi`.`DeoGrada` (`idDeoGrada`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idK_setnja`
    FOREIGN KEY (`idK`)
    REFERENCES `veselipsi`.`Setac` (`idK`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `setnja` (`idSetnja`, `datum`, `vremeOd`, `vremeDo`, `cena`, `idDeoGrada`, `idK`) VALUES
(1, '2022-01-01', '10:00:00', '11:00:00', 400, 1, 2),
(2, '2022-01-01', '17:00:00', '18:00:00', 400, 1, 2),
(3, '2022-06-06', '10:00:00', '12:00:00', 500, 2, 2),
(4, '2022-06-09', '09:30:00', '20:00:00', 200, 17, 2),
(6, '2022-06-06', '10:00:00', '11:00:00', 500, 12, 10),
(7, '2022-06-12', '19:00:00', '22:00:00', 500, 93, 10);



DROP TABLE IF EXISTS `veselipsi`.`ZahtevZaSetnju` ;

CREATE TABLE IF NOT EXISTS `veselipsi`.`ZahtevZaSetnju` (
  `idZahteviZaSetnju` INT NOT NULL AUTO_INCREMENT,
  `idSetnja` INT NOT NULL,
  `idLjubimac` INT NOT NULL,
  `prihvacen_odbijen` TINYINT(1) NULL,
  `kada` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idZahteviZaSetnju`),
  INDEX `idSetnja_idx` (`idSetnja` ASC),
  INDEX `idLjubimac_idx` (`idLjubimac` ASC),
  CONSTRAINT `idSetnja_zahtev_za_setnju`
    FOREIGN KEY (`idSetnja`)
    REFERENCES `veselipsi`.`Setnja` (`idSetnja`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idLjubimac_zahtev_za_setnju`
    FOREIGN KEY (`idLjubimac`)
    REFERENCES `veselipsi`.`Ljubimac` (`idLjubimac`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB AUTO_INCREMENT=22;

INSERT INTO `zahtevzasetnju` (`idZahteviZaSetnju`, `idSetnja`, `idLjubimac`, `prihvacen_odbijen`, `kada`) VALUES
(1, 1, 2, 0, '2022-06-02 14:09:23'),
(2, 3, 2, 1, '2022-06-02 14:09:23'),
(15, 7, 3, 2, '2022-06-02 15:13:13'),
(16, 7, 1, 2, '2022-06-02 15:13:13'),
(17, 7, 5, 1, '2022-06-02 15:13:13'),
(19, 6, 6, 1, '2022-06-02 15:13:13'),
(20, 3, 5, 2, '2022-06-02 15:13:13'),
(21, 3, 4, 2, '2022-06-02 15:13:13');


DROP TABLE IF EXISTS `veselipsi`.`ZahtevZaParenje` ;

CREATE TABLE IF NOT EXISTS `veselipsi`.`ZahtevZaParenje` (
  `idZahtevZaParenje` INT NOT NULL AUTO_INCREMENT,
  `idSalje` INT NOT NULL,
  `idPrima` INT NOT NULL,
  `kada` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prihvacen_odbijen` TINYINT(1) NULL,
  PRIMARY KEY (`idZahtevZaParenje`),
  INDEX `idKSalje_idx` (`idSalje` ASC),
  INDEX `idKPrima_idx` (`idPrima` ASC),
  CONSTRAINT `idKSalje_zahtev_za_parenje`
    FOREIGN KEY (`idSalje`)
    REFERENCES `veselipsi`.`Ljubimac` (`idLjubimac`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idKPrima_zahtev_za_parenje`
    FOREIGN KEY (`idPrima`)
    REFERENCES `veselipsi`.`Ljubimac` (`idLjubimac`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB AUTO_INCREMENT=10;;

INSERT INTO `zahtevzaparenje` (`idZahtevZaParenje`, `idSalje`, `idPrima`, `kada`, `prihvacen_odbijen`) VALUES
(1, 2, 5, '2022-06-02 14:44:47', 2),
(2, 1, 3, '2022-06-02 14:50:15', 2),
(3, 1, 4, '2022-06-02 14:50:15', 2),
(4, 1, 5, '2022-06-02 14:50:15', 1),
(5, 5, 2, '2022-06-02 14:50:15', 1),
(6, 8, 3, '2022-06-02 14:50:15', 2),
(7, 9, 6, '2022-06-02 14:50:15', 2),
(8, 6, 9, '2022-06-02 14:50:15', 2),
(9, 9, 8, '2022-06-02 14:50:15', 2);



DROP TABLE IF EXISTS `veselipsi`.`Ocena` ;

CREATE TABLE IF NOT EXISTS `veselipsi`.`Ocena` (
  `idOcena` INT NOT NULL AUTO_INCREMENT,
  `ocena` INT NOT NULL,
  `idKOcenjuje` INT NOT NULL,
  `idKOcenjen` INT NOT NULL,
  `opis` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`idOcena`),
  INDEX `idKOcenjen_idx` (`idKOcenjen` ASC),
  INDEX `idKOcenjuje_idx` (`idKOcenjuje` ASC),
  CONSTRAINT `idKOcenjen_ocena`
    FOREIGN KEY (`idKOcenjen`)
    REFERENCES `veselipsi`.`Korisnik` (`idK`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idKOcenjuje_ocena`
    FOREIGN KEY (`idKOcenjuje`)
    REFERENCES `veselipsi`.`Korisnik` (`idK`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB AUTO_INCREMENT=13;

INSERT INTO `ocena` (`idOcena`, `ocena`, `idKOcenjuje`, `idKOcenjen`, `opis`) VALUES
(1, 5, 1, 2, 'Sve je proslo kao po dogovoru'),
(2, 5, 1, 10, 'Steta sti vise nikad ne mozemo da budemo drugarice :('),
(3, 3, 12, 2, 'Dogovor nije bio do kraja ispostovan'),
(4, 5, 9, 2, 'Sve super'),
(5, 1, 11, 7, 'Jako neprijatna osoba, izbeci saradnju'),
(6, 1, 10, 7, 'Dogovor nije ispostovan'),
(7, 5, 5, 2, 'Sve super, sve preporuke za saradnju'),
(8, 5, 6, 2, 'Sjajna devojka, moj pas je jako zadovoljan'),
(9, 5, 8, 11, 'Sjajna saradnja'),
(10, 5, 2, 1, 'Sjajna devojka'),
(11, 5, 2, 6, 'Jedan od najboljih klijenata do sada'),
(12, 5, 10, 9, 'Sve preporuke');


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
