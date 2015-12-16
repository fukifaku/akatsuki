CREATE OR REPLACE FUNCTION insert_customer_money_change_customer() RETURNS trigger AS
$$DECLARE
money_amount int4;
cus_money real;
BEGIN
	select into cus_money "customer_money"
	from customer
	where customer_id = new.customer_id;
	if new.money_amount < 0 then
		if -new.money_amount > cus_money then
			raise exception 'xx';
		else 
			update customer
			set 
			customer_money = customer_money + new.money_amount
			where customer_id = new.customer_id;
		end if;
	else 
		update customer
			set 
			customer_money = customer_money + new.money_amount
			where customer_id = new.customer_id;
	end if;
		
RETURN NEW;
END;
$$ LANGUAGE plpgsql VOLATILE;

CREATE OR REPLACE FUNCTION insert_ninmu_ninja_insert_ninja_schedule() RETURNS trigger AS
$$DECLARE
nstart timestamp;
nend timestamp;
BEGIN
	select into nstart, nend "ninmu_start", "ninmu_end"
	from ninmu
	where ninmu_id = new.ninmu_id;
	insert into ninja_schedule values(new.ninja_id, nstart, nend);
		
RETURN NEW;
END;
$$ LANGUAGE plpgsql VOLATILE;

CREATE OR REPLACE FUNCTION insert_customer_ninmu_insert_customer_money() RETURNS trigger AS
$$DECLARE
ninmucost integer;
BEGIN
	select into ninmucost "ninmu_cost"
	from ninmu
	where ninmu_id = new.ninmu_id;
	insert into customer_money values(new.customer_id, CURRENT_TIMESTAMP, - ninmucost);
		
RETURN NEW;
END;
$$ LANGUAGE plpgsql VOLATILE;

create trigger before_ins_customer_money
before insert
on customer_money
for each row
execute procedure insert_customer_money_change_customer();

create trigger after_ins_ninmu_ninja
after insert
on ninmu_ninja
for each row
execute procedure insert_ninmu_ninja_insert_ninja_schedule();

create trigger after_ins_customer_ninmu
after insert
on customer_ninmu
for each row
execute procedure insert_customer_ninmu_insert_customer_money();