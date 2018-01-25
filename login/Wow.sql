create database techbit;
use techbit;
create table admins (
      admin_id int(8) PRIMARY KEY AUTO_INCREMENT,
	  admin_name varchar(32),
	  admin_password varchar(64)
);


INSERT INTO admins (admin_name,admin_password) VALUES
("Daniel","TechBit1337"),
("Carl","TechBit1337"),
("Sam","TechBit1337"),
("Hampus","TechBit1337"),
("Amanda","TechBit1337");