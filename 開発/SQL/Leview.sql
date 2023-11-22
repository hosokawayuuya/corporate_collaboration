create table Leview(
    shohin_id int(10) not null,
    user_id int(10) not null,
    evaluation int(1) not null,
    comment varchar(300),
    primary key(shohin_id),
    foreign key(user_id) references User(user_id),
    foreign key(shohin_id) references Shohin(shohin_id)
)