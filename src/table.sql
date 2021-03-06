CREATE TABLE animal ( name VARCHAR(10), type VARCHAR(10), breed VARCHAR(25), vet_name VARCHAR(30), gender VARCHAR(1), dob VARCHAR(10), last_name VARCHAR(15), first_name VARCHAR(10), PRIMARY KEY(name), FOREIGN KEY(last_name) REFERENCES owner.last_name, FOREIGN KEY(vet_name) REFERENCES vet.name);
CREATE TABLE owner ( last_name VARCHAR(15), first_name VARCHAR(10), email VARCHAR(30), mobile INT(10), address VARCHAR(30), zipcode INT(5), PRIMARY KEY (last_name));
CREATE TABLE vet ( name VARCHAR(30), email VARCHAR(30), mobile INT(10), PRIMARY KEY (name));
CREATE TABLE immunization ( immunization_id INT(7) UNSIGNED NOT NULL AUTO_INCREMENT, pet_name VARCHAR(10), immunization_type VARCHAR(20), cost INT(5), vet_name VARCHAR(30), date VARCHAR(10), PRIMARY KEY (immunization_id), FOREIGN KEY(vet_name) REFERENCES vet.name, FOREIGN KEY(pet_name) REFERENCES animal.name);
INSERT INTO vet ( name, email, mobile ) VALUES ( 'Adam Smith', 'asmith@vet.org', 2125554444 );
INSERT INTO vet ( name, email, mobile ) VALUES ( 'Joan of Arc', 'joarc@vet.org', 2125557777 );
INSERT INTO vet ( name, email, mobile ) VALUES ( 'Cleopatra', 'cleo@vet.org', 2125550000 );
INSERT INTO owner ( last_name, first_name, email, mobile, address, zipcode ) VALUES ( 'Hime', 'Kaguya', 'khime@taketori.com', 2124549898, '1 Yama No Naka Ni', 10080 );
INSERT INTO owner ( last_name, first_name, email, mobile, address, zipcode ) VALUES ( 'Hiroyuki', 'Sawano', 'shiroyuki@ongaku.com', 2124827754, '45 Saikou No', 10003 );
INSERT INTO owner ( last_name, first_name, email, mobile, address, zipcode ) VALUES ( 'Tsunemori', 'Akane', 'atsunemori@mwpsb.com', 2124854232, '911 Sibyl No Michi', 10012 );
INSERT INTO owner ( last_name, first_name, email, mobile, address, zipcode ) VALUES ( 'Kuroko', 'Tetsuya', 'tkuroko@seirin.com', 2124851111, '327 Kiseki No Seidai', 10012 );
INSERT INTO animal ( name, type, breed, vet_name, gender, dob, last_name, first_name ) VALUES ( 'Niban', 'Dog', 'Husky', 'Cleopatra', 'M', '02/02/2013', 'Kuroko', 'Tetsuya' );
INSERT INTO animal ( name, type, breed, vet_name, gender, dob, last_name, first_name ) VALUES ( 'Candy', 'Octopus', 'Flapjack', 'Adam Smith', 'F', '06/25/2011', 'Tsunemori', 'Akane' );
INSERT INTO animal ( name, type, breed, vet_name, gender, dob, last_name, first_name ) VALUES ( 'Aomine', 'Ferret', 'Black Sable', 'Joan of Arc', 'M', '12/05/2009', 'Kuroko', 'Tetsuya' );
INSERT INTO animal ( name, type, breed, vet_name, gender, dob, last_name, first_name ) VALUES ( 'Kougami', 'Dog', 'German Sheperd', 'Cleopatra', 'M', '10/10/2012', 'Tsunemori', 'Akane' );
INSERT INTO animal ( name, type, breed, vet_name, gender, dob, last_name, first_name ) VALUES ( 'Kagari', 'Dog', 'Chihuahua', 'Cleopatra', 'M', '09/20/2013', 'Tsunemori', 'Akane' );
INSERT INTO animal ( name, type, breed, vet_name, gender, dob, last_name, first_name ) VALUES ( 'Okina', 'Mouse', 'Albino', 'Joan of Arc', 'M', '03/27/1992', 'Hime', 'Kaguya' );
INSERT INTO animal ( name, type, breed, vet_name, gender, dob, last_name, first_name ) VALUES ( 'Mizuki', 'Rat', 'Street', 'Joan of Arc', 'F', '05/01/1991', 'Hiroyuki', 'Sawano' );
INSERT INTO animal ( name, type, breed, vet_name, gender, dob, last_name, first_name ) VALUES ( 'Mika', 'Cat', 'Persian', 'Adam Smith', 'F', '08/31/2008', 'Hiroyuki', 'Sawano' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Niban', 'Fleas', 500, 'Cleopatra', '03/28/2015' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Niban', 'Rabies', 900, 'Cleopatra', '03/28/2015' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Niban', 'Measles', 750, 'Cleopatra', '03/28/2015' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Candy', 'Pox', 1100, 'Adam Smith', '12/10/2014' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Kougami', 'Fleas', 500, 'Cleopatra', '10/10/2014' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Kougami', 'Rabies', 900, 'Cleopatra', '10/10/2014' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Kagari', 'Rabies', 900, 'Cleopatra', '02/27/2015' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Kagari', 'Fleas', 500, 'Cleopatra', '02/27/2015' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Kagari', 'Measles', 1100, 'Cleopatra', '02/27/2015' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Aomine', 'Rabies', 1200, 'Joan of Arc', '05/16/2013' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Aomine', 'Canine Distemper', 2050, 'Joan of Arc', '05/16/2013' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Okina', 'Rabies', 210, 'Joan of Arc', '05/16/2007' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Mizuki', 'Rabies', 210, 'Joan of Arc', '01/09/2000' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Mizuki', 'Fleas', 210, 'Joan of Arc', '01/09/2000' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Mika', 'Rabies', 690, 'Adam Smith', '11/23/2011' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Mika', 'FIV', 1400, 'Adam Smith', '11/23/2011' );
INSERT INTO immunization ( pet_name, immunization_type, cost, vet_name, date ) VALUES ( 'Mika', 'Feline Leukemia', 1900, 'Adam Smith', '11/23/2011' );