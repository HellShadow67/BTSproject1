DELIMITER |

CREATE PROCEDURE afficher_acheteur_selon_id (IN p_idAcheteur INT)


BEGIN

    SELECT login, raisonSocEnt,adresse , ville,cp, numHabillitation

    FROM Acheteur

    WHERE idAcheteur = p_idAcheteur;

END |

DELIMITER ;


--CALL afficher_acheteur_selon_id(1);

SET @Acheteur_id := 2;

CALL afficher_acheteur_selon_id(@Acheteur_id);