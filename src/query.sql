SELECT DISTINCT animal.name, animal.type, animal.breed, owner.zipcode FROM animal, owner WHERE owner.zipcode=10012;
SELECT COUNT(gender) FROM animal WHERE type='cat' AND gender='F';
SELECT COUNT(breed) FROM animal WHERE breed='Poodle';
SELECT DISTINCT owner.last_name, owner.first_name, animal.name, immunization.immunization_type, immunization.date  FROM immunization, owner, animal WHERE animal.last_name = owner.last_name AND animal.name = immunization.pet_name ORDER BY owner.last_name, animal.name ASC;
SELECT DISTINCT immunization.vet_name, SUM(immunization.cost) FROM immunization, animal WHERE animal.name=immunization.pet_name AND  animal.type='Dog' AND immunization.date LIKE '%2015%' GROUP BY immunization.vet_name;