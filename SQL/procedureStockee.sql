DELIMITER |

CREATE PROCEDURE afficher_acheteur_selon_id (IN p_idAcheteur INT)

BEGIN

    SELECT login, raisonSocEnt,adresse , ville,cp, numHabillitation
    FROM Acheteur
    WHERE idAcheteur = p_idAcheteur;

END |

DELIMITER ;

DELIMITER |

CREATE PROCEDURE ajout_bateau (IN p_nom Varchar (25) , p_imm Varchar (25))

BEGIN

    insert into bateau(nomBateau,immatriculationBateau)
    values (p_nom,p_imm);

END |

DELIMITER ;

DELIMITER |

CREATE PROCEDURE ajout_Reservation (in p_idVeh int, p_idCreneau INT, p_dateLivraison  date , p_disponibilite Varchar (25), p_idLot int)

BEGIN

    insert into reservation(idVeh,idCreneau,dateLivraison,disponnibilite,idLot)
    values (p_idVeh, p_idCreneau , p_dateLivraison  , p_disponibilite, p_idLot );

END |

DELIMITER ;


--CALL afficher_acheteur_selon_id(1);
--CALL ajout_bateau('test2','test2');

--SET @Acheteur_id := 2;
--CALL afficher_acheteur_selon_id(@Acheteur_id);

--CALL ajout_Reservation ( 1, M2, '2017-06-12', 'Reservé', 13);