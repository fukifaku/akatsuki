select jutsu_id from ninmu_jutsu where ninmu_id=1;

create or replace view jutsu1 as
select ninja_id,jutsu_id from ninja_jutsu where jutsu_id=1;

create or replace view jutsu2 as
select ninja_id,jutsu_id from ninja_jutsu where jutsu_id=5;


with tmp as
(
select jutsu1.ninja_id,jutsu2.ninja_id,
(select ninja_cost from ninja where ninja_id=jutsu1.ninja_id)
+(select ninja_cost from ninja where ninja_id=jutsu2.ninja_id)as tong
from jutsu1 cross join jutsu2
order by tong
)
select * from tmp
where tong=(select min(tong) from tmp);
