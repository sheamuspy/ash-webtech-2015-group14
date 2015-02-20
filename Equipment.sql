use inventory;

Create Table if not exist equipment (
	equipment_sn int(11) not null,
	equipment_name varchar(255) not null,
	lab_id int(2) not null,
	date_purchased Date default null,
	place_purchased varchar(255) default null,
	description varchar(100) default null,
	Primary key(equipment_sn),
	Foreign Key(lab_id) references labs(lab_id)
	) Engine=InnoDB;