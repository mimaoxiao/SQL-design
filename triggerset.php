create table logsp
(
ID int not null auto_increment,
timing datetime not null,
tablename varchar(20) not null,
itemaim int not null,
action varchar(10) not null,
actionaim varchar(20),
bef varchar(255),
aft varchar(255),
primary key(ID)
)

delimiter $
create trigger I_com  
after insert on computer for each row   
begin  
    insert into logsp (timing,tablename,itemaim,action)  
    values(now(),'computer',new.ID,'insert');
end$

create trigger U_com  
after update on computer for each row   
begin
    if(new.type!=old.type)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'computer',new.ID,'update','type',old.type,new.type);
        end if;
    if(new.remark!=old.remark)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'computer',new.ID,'update','remark',old.remark,new.remark);
        end if;
    if(new.photo_url!=old.photo_url)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'computer',new.ID,'update','photo_url',old.photo_url,new.photo_url);
        end if;
    if(new.owner_ID!=old.owner_ID)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'computer',new.ID,'update','owner_ID',cast(old.owner_ID as char),cast(new.owner_ID as char));
        end if;
    if(new.status!=old.status)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'computer',new.ID,'update','status',cast(old.status as char),cast(new.status as char));
        end if;
    if(new.avaliable!=old.avaliable)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'computer',new.ID,'update','avaliable',cast(old.avaliable as char),cast(new.avaliable as char));
        end if;
end$

create trigger I_item  
after insert on item for each row   
begin  
    insert into logsp (timing,tablename,itemaim,action)  
    values(now(),'item',new.ID,'insert');
end$

create trigger U_item 
after update on item for each row   
begin
    if(new.message!=old.message)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'item',new.ID,'update','message',old.message,new.message);
        end if;
    if(new.photo_url!=old.photo_url)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'item',new.ID,'update','photo_url',old.photo_url,new.photo_url);
        end if;
    if(new.owner_ID!=old.owner_ID)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'item',new.ID,'update','owner_ID',cast(old.owner_ID as char),cast(new.owner_ID as char));
        end if;
    if(new.status!=old.status)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'item',new.ID,'update','status',cast(old.status as char),cast(new.status as char));
        end if;
    if(new.avaliable!=old.avaliable)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'item',new.ID,'update','avaliable',cast(old.avaliable as char),cast(new.avaliable as char));
        end if;
end$

create trigger I_donor  
after insert on donor for each row   
begin  
    insert into logsp (timing,tablename,itemaim,action)  
    values(now(),'donor',new.ID,'insert');
end$

create trigger U_donor 
after update on donor for each row   
begin
    if(new.name!=old.name)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'donor',new.ID,'update','name',old.name,new.name);
        end if;
    if(new.type!=old.type)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'donor',new.ID,'update','type',old.type,new.type);
        end if;
    if(new.email!=old.email)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'donor',new.ID,'update','email',old.email,new.email);
        end if;
    if(new.phone!=old.phone)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'donor',new.ID,'update','phone',old.phone,new.phone);
        end if;
    if(new.remark!=old.remark)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'donor',new.ID,'update','remark',old.remark,new.remark);
        end if;
    if(new.avaliable!=old.avaliable)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'donor',new.ID,'update','avaliable',cast(old.avaliable as char),cast(new.avaliable as char));
        end if;
end$

create trigger I_donee  
after insert on donee for each row   
begin  
    insert into logsp (timing,tablename,itemaim,action)  
    values(now(),'donee',new.ID,'insert');
end$

create trigger U_donee 
after update on donee for each row   
begin
    if(new.name!=old.name)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'donee',new.ID,'update','name',old.name,new.name);
        end if;
    if(new.type!=old.type)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'donee',new.ID,'update','type',old.type,new.type);
        end if;
    if(new.email!=old.email)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'donee',new.ID,'update','email',old.email,new.email);
        end if;
    if(new.phone!=old.phone)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'donee',new.ID,'update','phone',old.phone,new.phone);
        end if;
    if(new.remark!=old.remark)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'donee',new.ID,'update','remark',old.remark,new.remark);
        end if;
    if(new.avaliable!=old.avaliable)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'donee',new.ID,'update','avaliable',cast(old.avaliable as char),cast(new.avaliable as char));
        end if;
end$

create trigger I_keeper  
after insert on keeper for each row   
begin  
    insert into logsp (timing,tablename,itemaim,action)  
    values(now(),'keeper',new.ID,'insert');
end$

create trigger U_keeper 
after update on keeper for each row   
begin
    if(new.name!=old.name)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'keeper',new.ID,'update','name',old.name,new.name);
        end if;
    if(new.email!=old.email)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'keeper',new.ID,'update','email',old.email,new.email);
        end if;
    if(new.phone!=old.phone)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'keeper',new.ID,'update','phone',old.phone,new.phone);
        end if;
    if(new.remark!=old.remark)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'keeper',new.ID,'update','remark',old.remark,new.remark);
        end if;
    if(new.avaliable!=old.avaliable)
        then insert into logsp (timing,tablename,itemaim,action,actionaim,bef,aft)
        values(now(),'keeper',new.ID,'update','avaliable',cast(old.avaliable as char),cast(new.avaliable as char));
        end if;
end$