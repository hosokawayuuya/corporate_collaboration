create table Shohins(
    shohin_id int(10) not null,
    color varchar(20) not null,
    size varchar(4) not null,
    price int(8) not null,
    stock_id int(4) not null,
    gazou_id varchar(30) not null,
    primary key(shohin_id,color,size),
    foreign key (shohin_id) references Shohin(shohin_id) 
)