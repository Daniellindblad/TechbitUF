create database techbit;
use techbit;
create table tickets (
      ticket_id int(8) PRIMARY KEY AUTO_INCREMENT,
      tid_inkom TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      status int(1) DEFAULT 1,
      mottagare varchar(32),
      ansvarig varchar(32) DEFAULT null,
      produkt varchar(64),
      meddelande text(500),
      tid_klar TIMESTAMP default null,
      pris float,
      kund_namn varchar(64),
      kontaktuppgifter text(500),
      extra text(500)
);



status
1 => ej påbörjad
2 => påbörjad
3 => färdig
4 => hämtad och betald av kund
