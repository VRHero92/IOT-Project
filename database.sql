create table utenti(
id_usr int(11) auto_increment primary key,
username varchar(30),
password varchar(30),
logged tinyint(1) unsigned zerofill not null default '0'
) engine = "InnoDB";

create table parcheggio(
id_par int(11) auto_increment primary key,
stato tinyint(1),
utente int(11),
INDEX new_utente(utente),
FOREIGN KEY (utente) REFERENCES utenti(id_usr)
)engine="InnoDB";
