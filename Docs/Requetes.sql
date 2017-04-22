
/*a) Afficher les noms d'espèces de poissons pêchés par nom de bateau.*/

select  b.nomBateau as "Nom Du BATEAU", e.nomComm as "Espece de poisson" 
FROM espece E
INNER JOIN lot L ON  L.IdEspece=E.IdEspece 
INNER JOIN peche P ON P.datePeche=L.datePeche
INNER JOIN bateau B ON B. idBateau =P. idBateau
group by b.nomBateau, e.nomComm ;

/*b) Afficher le poids total (brut) de poissons pêchés par immatriculation de bateau.*/

select b.immatriculationBateau, sum(l.poidsBrutLot) as "Poids brut" 
from bateau b
INNER JOIN peche P ON b. idBateau =P.IdB
INNER JOIN lot L ON P. idBateau =L. idBateau AND  P.datePeche=L.datePeche
group by b.ImmatriculationBateau;

/*c) Afficher le poids total (brut) de poissons pêchés par immatriculation de bateau en considérant uniquement ceux qui ont au moins pêché 500 Kg.*/

select b.immatriculationBateau, sum(l.poidsBrutLot) as "Poids brut"
from bateau b
INNER JOIN peche p ON p.datePeche=l.datePeche
INNER JOIN lot  l ON p. idBateau =l. idBateau
AND l.idBateau=b.idBateau
group by b.ImmatriculationBateau
having sum(l.poidsBrutLot)>=500 ;

/*d) Afficher le libellé qualité, la spécification de taille, la tare, le nom scientifique des espèces associés à la pêche effectuée en août 2008.*/

select q.libelleQual, t.Specification, b.tare, e.nomScient
FROM lot l
INNER JOIN taille t ON t.IdTaille=l.IdTaille
INNER JOIN bac b ON b.IdBac=l.IdBac
INNER JOIN espece e ON e.IdEspece=l.IdEspece
INNER JOIN qualite q ON q.IdQualite=l.IdQualite
WHERE year(l.datePeche)=2008
and month(l.datePeche)=8;

/*e) Afficher tous les renseignements (des lots, et les libellés de tailles, de bacs, de poissons) associés aux pêches des espèces suivantes : Lophius Virens, Conger conger, Molva Molva, Dicentrarchus Labrax.*/
 
select l.*, t.*, b.*, e.*
FROM lot l
INNER JOIN espece e ON l.IdEspece=e.IdEspece
INNER JOIN bac b ON l.IdBac=b.IdBac
INNER JOIN taille t ON l.IdTaille = t.IdTaille
WHERE e.nomScient = "Lophius Virens" 
or e.nomScient ="Conger conger" 
or e.nomScient ="Molva Molva" 
or e.nomScient ="Dicentrarchus Labrax";
