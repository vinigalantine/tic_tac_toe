CREATE DATABASE tic_tac_toe DEFAULT CHAR SET utf8;
USE tic_tac_toe;

DROP TABLE IF EXISTS boards;
CREATE TABLE boards(
	id int unsigned not null auto_increment,
    one char(1) default null,
    two char(1) default null,
    three char(1) default null,
    four char(1) default null,
    five char(1) default null,
    six char(1) default null,
    seven char(1) default null,
    eight char(1) default null,
    nine char(1) default null,
    primary key (id)
);

DROP TABLE IF EXISTS logs;
CREATE TABLE logs(
	id int unsigned not null auto_increment,
    symbol char(1) not null,
    position varchar(10) not null,
    board_id int unsigned not null,
    foreign key (board_id) references boards(id),
    primary key (id)
);    