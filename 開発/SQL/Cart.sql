create table Cart(
    user_id int(10) not null,
    shohin_id int(10) not null,
    shohin_name varchar(100) not null,
    color varchar(20) not null,
    size varchar(4) not null,
    price int(8) not null, 
    piece int(4) not null, 
    gazou_id varchar(30) not null,
    primary key(user_id),
    foreign key(user_id) references User(user_id),
    foreign key(shohin_id) references Shohin(shohin_id)
)