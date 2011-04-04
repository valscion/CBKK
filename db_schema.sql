--
-- Tietokannan malli. Aja tämä tiedosto omassa
-- tietokannassasi, niin saat sivuston toimimaan.
-- Muista että tämä luo oletuksena taulut prefixin
-- cbkk_ kera.
-- --------------------------------------------------------
--

SET sql_mode="NO_AUTO_VALUE_ON_ZERO";

--
-- Tietokanta: `cbkk`
--
-- --------------------------------------------------------
--
-- Rakenne taululle `cbkk_codes`
--
CREATE TABLE IF NOT EXISTS `cbkk_codes`
  (
     `name`        TEXT NOT NULL,
     `code`        TEXT NOT NULL,
     `description` TEXT NOT NULL,
     `author`      VARCHAR(15) NOT NULL,
     `id`          INT(11) NOT NULL AUTO_INCREMENT,
     `added`       TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
     `type`        INT(11) NOT NULL,
     `category`    INT(11) NOT NULL,
     PRIMARY KEY (`id`)
  )
ENGINE=myisam
DEFAULT CHARSET=utf8
AUTO_INCREMENT=12;

-- --------------------------------------------------------
--
-- Rakenne taululle `cbkk_comments`
--
CREATE TABLE IF NOT EXISTS `cbkk_comments`
  (
     `author`  VARCHAR(15) NOT NULL,
     `content` TEXT NOT NULL,
     `date`    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
     `codeid`  INT(11) NOT NULL,
     `id`      INT(11) NOT NULL AUTO_INCREMENT,
     PRIMARY KEY (`id`)
  )
ENGINE=myisam
DEFAULT CHARSET=utf8
AUTO_INCREMENT=10;

-- --------------------------------------------------------
--
-- Rakenne taululle `cbkk_users`
--
CREATE TABLE IF NOT EXISTS `cbkk_users`
  (
     `nick`      VARCHAR(15) NOT NULL,
     `password`  VARCHAR(40) NOT NULL,
     `email`     TEXT NOT NULL,
     `active`    BOOLEAN NOT NULL DEFAULT FALSE,
     `hash`      VARCHAR(40) NOT NULL,
     `joined`    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
     `lastlogin` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
     `id`        INT(11) NOT NULL AUTO_INCREMENT,
     PRIMARY KEY (`id`)
  )
ENGINE=myisam
DEFAULT CHARSET=utf8
AUTO_INCREMENT=7; 