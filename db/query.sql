alter table users
	add column is_active active default 'yes',
	add column is_login active default 'yes',
	add column is_reset_password active default 'yes',
	add column last_login TIMESTAMP without time zone,
	add column profile_pic varchar(200),
	add column created_at TIMESTAMP without time zone,
	add column updated_at TIMESTAMP without time zone
	
alter table users
	alter column id set default nextval('id')

create table role(
	id serial primary key,
	name varchar(100),
	description varchar(100),
	is_active active default 'yes',
	created_at TIMESTAMP without time zone,
	updated_at TIMESTAMP without time zone)
	