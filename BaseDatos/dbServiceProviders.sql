CREATE DATABASE  IF NOT EXISTS `dbserviceproviders` 
USE `dbserviceproviders`;
create table addressList(
	eIdAddress int auto_increment primary key,
    txtStreet varchar(50) not null,
    txtOutNumber varchar(10) not null,
    txtInNumber varchar(10) not null,
    txtColony varchar(25),
    txtCity varchar(30),
    txtState varchar(30),
     bActive bit(1) default b'1',
    feCreatedAt datetime default current_timestamp,
    feUpdatedAt datetime default current_timestamp
);

create table catCompanyTypes(
	eIdType int auto_increment primary key,
    txtTypeName varchar(20) not null,
    txtDescription varchar(150),
    txtCompanyArea varchar(30),
    txtCompanySector varchar(50),
    bActive bit(1) default b'1',
    feCreatedAt datetime default current_timestamp,
    feUpdatedAt datetime default current_timestamp
);

create table companiesList(
	eIdCompany int auto_increment primary key,
    fK_eIdAddress int null,
    fk_eIdType int null,
    txtName varchar(100) not null,
    txtPhone varchar(20),
	bActive bit(1) default b'1',
    feCreatedAt datetime default current_timestamp,
    feUpdatedAt datetime default current_timestamp,
    foreign key (fk_eIdAddress) references addressList(eIdAddress),
    foreign key (fk_eIdType) references addressList(eIdAddress)
);

create table servicesList (
	eIdService int primary key auto_increment,
    fk_eIdCompany int null,
    txtService varchar(120) not null,
    txtDescription varchar(150),
    flPrice decimal(14,2),
    bActive bit(1) default b'1',
    feCreatedAt datetime default current_timestamp,
    feUpdatedAt datetime default current_timestamp,
    foreign key(fk_eIdCompany) references companiesList(eIdCompany)
);

create table catfreightsTypes(
	eIdFType int auto_increment primary key,
    txtFType varchar(30) not null,
    txtFDescription varchar(150) null,
     bActive bit(1) default b'1',
    feCreatedAt datetime default current_timestamp,
    feUpdatedAt datetime default current_timestamp
);

create table freightsList(
	eIdFreight int auto_increment primary key,
    fk_eIdCompany int null,
    fk_eIdFreightType int null,
    txtOrigin varchar(100) not null,
    txtDestiny varchar(100) not null,
    flFreightPrice decimal(10,2) not null,
    eDistanceKm decimal(10,2) null,
     bActive bit(1) default b'1',
    feCreatedAt datetime default current_timestamp,
    feUpdatedAt datetime default current_timestamp,
    foreign key(fk_eIdCompany) references companiesList(eIdCompany),
    foreign key(fk_eIdFreightType) references freightsTypeList(eIdFType)
);

