<?php
/*************************************************************************************
 * config.php
 * --------------
 * Yleiset asetukset kuuluvat tänne.
 ************************************************************************************/

// Tähän taulukkoon tallennetaan kaikki asetukset.
$config = array();

// Kaikkien URLien äiti. Laita tähän osoite siten kuin se näkyy webbiselaimessasi.
// Muista päättyvä kauttamerkki / !
$config['root_url'] = 'http://example.com/';

// ---------------------
// Tietokannan asetukset
// ---------------------
$config['db_host']     = 'hostname-or-ip';
$config['db_name']     = 'databasename';
$config['db_user']     = 'username';
$config['db_password'] = 'password';
$config['db_prefix']   = 'cbkk_'; // Taulujen prefix. Voi olla tyhjäkin.
$config['db_port']     = 3306; // Oletus 3306. Vaihda vain jos tiedät mitä olet tekemässä.



/* EOF config.php */