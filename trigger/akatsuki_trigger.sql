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

create trigger before_ins_customer_money
before insert
on customer_money
for each row
execute procedure insert_customer_money_change_customer();