use spisy;

insert into zamestnanci(Jmeno,Prijmeni,username,password,vlozil) values("Petr","Čegan","petrcegan",md5("heslo"),"admin");
insert into zamestnanci(Jmeno,Prijmeni,username,password,vlozil) values("Marek","Přidal","marekpridal",md5("admin"),"admin");
insert into zamestnanci(username,password) values("admin","admin");

select * from zamestnanci;
/*delete from zamestnanci;*/

insert into klienti(Jmeno,Prijmeni,Telefon,Email,Ulice,Mesto,PSC,Stat) VALUES("Pavel","Mlčoch",456987231,"pavel.mlcoch@email.cz","Pod Stromem 5","Horní Dolní","50020","Česká republika");
insert into klienti(ICO,Nazev,Telefon,Email,Ulice,Mesto,PSC,Stat) VALUES("25596641","ZAPA",456987258,"info@zapa.cz","Pod Mostem 41","Karlovy Vary","40020","Česká republika");

select * from klienti;
select * from zamestnanci;

select * from spisy;