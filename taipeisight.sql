create table type
	(type_name		varchar(15), 
	 suit			varchar(15),
	 primary key (type_name, suit)
	 )  ENGINE=INNODB;

create table information
	(sight_ID		varchar(8),
             sight_name                   varchar(20),
	 ticket_price		numeric(5,0),
	 website		            varchar(100),
	 season			varchar(8),
	 type_name		varchar(15),
	 location		varchar(100),
	 traffic		            varchar(100),
	 primary key (sight_ID),
	 foreign key (type_name) references type (type_name)
		on delete set null
	 ) ENGINE=INNODB;

create table user
	(user_ID		varchar(8),
	 name			varchar(20) not null,
	 account		varchar(20),
	 password		varchar(10),
	 sex			varchar(2),
	 birthday		date,
	 email			varchar(30),
	 url			varchar(100),
	 primary key (user_ID)
	) ENGINE=INNODB;
	 

create table favorite
	(user_ID		varchar(8),
	 sight_ID		varchar(8),
	 primary key (user_ID, sight_ID),
	 foreign key (user_ID) references user (user_ID)
		on delete cascade,
	 foreign key (sight_ID) references information (sight_ID)
		on delete cascade
	) ENGINE=INNODB;

create table comment
	(comment_ID		varchar(8),
	 user_ID		varchar(8),
	 sight_ID		varchar(8),
	 grade			numeric(2, 1),
	 context			varchar(200),
	 photo			varchar(100),
	 primary key (comment_ID),
	 foreign key (user_ID) references user (user_ID)
		on delete set null,
	 foreign key (sight_ID) references information (sight_ID)
		on delete cascade
	) ENGINE=INNODB;