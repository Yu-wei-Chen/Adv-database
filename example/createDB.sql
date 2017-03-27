create table Login_Company
	(ID_Company		int NOT NULL AUTO_INCREMENT,
	 username		varchar(40),
	 password		varchar(40),
	 primary key (ID_Company)
	);

create table Login_Manager
	(ID_Manager 	int NOT NULL AUTO_INCREMENT,
	 username		varchar(40),
	 password		varchar(40),
	 primary key (ID_Manager)
	);

create table Store
	(ID_Store 			int NOT NULL AUTO_INCREMENT,
	 store_name			varchar(40),
	 manager_amount		int,
	 primary key (ID_Store)
	);

create table Region 
	(ID_Region 		int NOT NULL AUTO_INCREMENT,
	 state			varchar(40),
	 primary key (ID_Region)
	);

create table Manager
	(ID_Manager 	int NOT NULL AUTO_INCREMENT,
	 manager_name	varchar(40),
	 address		varchar(40),
	 email			varchar(40),
	 phone			varchar(40),
	 job_title		varchar(40),
	 ID_Store		int,
	 state			varchar(40),
	 primary key (ID_Manager),
	 foreign key (ID_Store) references Store(ID_Store)
	);

create table Salary
	(job_title		varchar(40),
	 ID_Store		int,
	 salary			FLOAT,
	 primary key (job_title,ID_Store),
	 foreign key (ID_Store) references Store(ID_Store)
	);

create table Company
	(ID_Company 	int NOT NULL AUTO_INCREMENT,
	 company_name	varchar(40),
	 address		varchar(40),
	 email			varchar(40),
	 phone			varchar(40),
	 category		varchar(40),
	 income			FLOAT,
	 state			varchar(40),
	 primary key (ID_Company)
	);

create table Customer
	(ID_Customer 	int NOT NULL AUTO_INCREMENT,
	 customer_name	varchar(40),
	 age			int,
	 gender			varchar(40),
	 address		varchar(40),
	 email			varchar(40),
	 phone			varchar(40),
	 income			FLOAT,
	 state			varchar(40),
	 primary key (ID_Customer)
	);

create table Product
	(ID_Product 	int NOT NULL AUTO_INCREMENT,
	 product_name	varchar(40),
	 inventory		int,
	 price			FLOAT,
	 kind			varchar(40),
	 gender			varchar(40),
	 description	varchar(1000),
	 image			varchar(1000),
	 ID_Store 		int,
	 primary key (ID_Product),
	 foreign key (ID_Store) references Store(ID_Store)
	);

create table Transaction
	(ID_Transaction 	int NOT NULL AUTO_INCREMENT,
	 purchase_date		date,
	 quantity			int,
	 price				FLOAT,
	 ID_Product 		int,
	 ID_Store 			int,
	 ID_Customer 		int,
	 ID_Company			int,
	 change_state		varchar(1000),
	 change_address		varchar(1000),
	 status    			varchar(40),
	 primary key (ID_Transaction),
	 foreign key (ID_Product) references Product(ID_Product),
	 foreign key (ID_Store) references Store(ID_Store),
	 foreign key (ID_Customer) references Customer(ID_Customer),
	 foreign key (ID_Company) references Company(ID_Company)
	);
