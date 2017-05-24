CREATE VIEW V_lot

AS SELECT *

FROM Lot

WHERE idAcheteur IS NULL;


CREATE VIEW V_lotRemporte

AS SELECT datePeche, idBateau, idLot

FROM Poster

WHERE idAcheteur IS NOT NULL;