DELIMITER //
DROP TRIGGER IF EXISTS ValeureNegative 
 //
CREATE TRIGGER ValeureNegative BEFORE INSERT ON poster FOR EACH ROW
BEGIN
	
	IF (new.prixEnchere >= 0) THEN 
		SET @prixEnchere = new.prixEnchere;
	END IF;
END //
DELIMITER ;


