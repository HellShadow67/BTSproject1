


/*Login	MDP	Autorisation

LEDRU	LED1	TOUS LES DROITS au niveau de la base de données
KELLER	KEL1	LECTURE au niveau de la base de données
KLEIN	KLE1	LECTURE au niveau de la base de données et ajout/modification/suppression possibles au niveau de la table bateau.
BLAYAC	BLA1	LECTURE au niveau de la base de données et ajout au niveau de la table BAC*/

create user 'LEDRU'@'localhost' identified by 'LED1';
create user 'KELLER'@'localhost' identified by 'KEL1';
create user 'KLEIN'@'localhost' identified by 'KLE1';
create user 'BLAYAC'@'localhost' identified by 'BLA1';

grant all on Poulgoazec.* to 'LEDRU'@'localhost';
grant select on Poulgoazec.* to 'KELLER'@'localhost';
grant select on Poulgoazec.* to 'KLEIN'@'localhost';
grant insert,update,delete on Poulgoazec.Bateau to 'KLEIN'@'localhost';
grant select on Poulgoazec.* to 'BLAYAC'@'localhost';
grant insert on Poulgoazec.bac to 'BLAYAC'@'localhost';