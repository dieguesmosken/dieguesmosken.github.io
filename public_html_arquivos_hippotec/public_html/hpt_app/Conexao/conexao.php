<?php
header("Access-Control-Allow-Origin:*");
$con=mysqli_connect("localhost","id17104419_tcchippotec_mmd","B2C_H7eP_t+z14Tn","id17104419_tcchippotec")or die("Não pode conectar");

?>
<!--
CREATE DATABASE tcchippotec;
USE tcchippotec;

CREATE TABLE hpt_doe(
    id int PRIMARY KEY AUTO_INCREMENT NOT null,
    nome_doe varchar(255),
    desc_doe varchar(255),
    grau_doe varchar(255)
);

CREATE TABLE hpt_usr(
    id int PRIMARY KEY AUTO_INCREMENT NOT null,
    nome_usr varchar(255),
    pass_usr varchar(64),
    cpf_usr varchar(255),
    rg_usr varchar(255),
    dtnasc_usr date
);
ALTER TABLE hpt_doe ADD sint_doe varchar(255);
ALTER TABLE hpt_doe ADD trat_doe varchar(255);
ALTER TABLE hpt_usr ADD email_usr varchar(255);
-->

