drop table if exists alerte;

drop table if exists navire; 

drop table if exists utilisateur;

drop table if exists port;

create table utilisateur (u_id serial primary key, u_nom varchar(255) not null, u_prenom varchar(255) not null, u_mail text unique not null, u_mdp text not null, 

u_profession varchar(255) not null, u_admin integer default 0 check(u_admin in (0,1)), u_etat integer default 0 check(u_etat in (0,1)), 
u_super integer default 0 check(u_super in (0,1)));

create table port (p_id serial primary key, p_nom varchar(255) not null, p_pays varchar(255) not null, p_latitude real not null, p_longitude real not null,

p_latitudeDegre real not null, p_latitudeMinute real not null, p_latitudeHeni varchar(255) not null, p_longitudeDegre real not null, p_longitudeMinute real not null,

p_longitudeHeni varchar(255) not null);

create table navire (n_id serial primary key, n_nom varchar(255) not null, n_mmsi integer not null unique, n_imo integer not null unique, n_type varchar(255) not null,

p_nom varchar(255) not null);

create table alerte (a_id serial, a_dateDebut varchar(255) not null, a_seuil integer not null, u_id integer not null, n_nom varchar(255) not null, p_nom varchar(255) not null,

foreign key(u_id) references utilisateur(u_id), primary key(u_id, n_nom, p_nom));

insert into utilisateur (u_nom, u_prenom, u_profession, u_mail, u_mdp, u_admin, u_etat, u_super) values ('sokhona','Diakarou','Agent de securité','sokhonadiakarou1993@gmail.com',
'7c4a8d09ca3762af61e59520943dc26494f8941b',1,1,1);
-- mdp : 1234
