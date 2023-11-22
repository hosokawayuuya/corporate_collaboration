create table User(
	user_id int(10)  not null,
    user_name varchar(20) not null,
    password varchar(16) not null,
    private_name varchar(20) not null,
    katakana_name varchar(20) not null,
    post_code int(7) not null,
    address1 varchar(100) not null,
    address2 varchar(100),
    address3 varchar(100),
    tell varchar(13) not null,
    mail_address varchar(100) not null,
    aikon varchar(100),
    credit_id int(16),
    credit_data int(8),
    security_code int(4),
    primary key(user_id),
    unique(user_name)
 );