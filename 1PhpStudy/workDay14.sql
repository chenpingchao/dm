
-- 一、创建数据库yhshop
create database if not exists yhshop default character set utf8;
-- 二、使用yhshop
use yhshop;
-- 三、设置客户端编码为gbk
set names gbk;
-- 四、创建品牌表，结构如下
create table if not exists yh_brand (
id smallint(5) unsigned not null key auto_increment,
brandname varchar(30)
)ENGINE=INNODB default charset=utf8 collate utf8_general_ci;
-- 五、创建分类表，结构如下
create table if not exists yh_cate (
id smallint(5) unsigned not null key auto_increment,
brandname varchar(30)
)ENGINE=INNODB default charset=utf8 collate utf8_general_ci;
-- 六、创建商品表，结构如下
create table if not exists yh_goods(
id int(8) unsigned not null key auto_increment,
goodsname varchar(120) ,
price float(8,2),
bid smallint unsigned,
cid smallint unsigned,
constraint good_brand_key foreign key (bid) references yh_brand (id),
constraint good_cate_key foreign key (cid) references yh_cate(id)
)ENGINE=InnoDB default charset=utf8 collate utf8_general_ci;
-- 七、使用insert语句分别向三个表中插入如下数据记录
-- 品牌表
insert into yh_brand(brandname)values
('apple'),
('huawei'),
('mi'),
('nike');
-- 分类表
insert into yh_cate(catename)values
('手机'),
('数码'),
('服装');
-- 商品表
insert into yh_goods(goodsname,price,bid,cid)values
('iphone XS 256',7521,1,1),
('nike koby 8',8888,4,2),
('iphone 6s plus',1666,1,1),
('Huawei mate 20',4500,2,1),
('iphone 8 plus',4000,1,1),
('xiaomi mi 9',3333,3,1),
('canon 单反',16666,77,3),
('sony 单反',26666,88,3),
('xiaodao',3333,99,66),
('华为笔记本',46666,null,null);

-- 八、查询所有商品记录并以价格降序排序
select goodsname,price from yh_goods order by price desc;
-- 九、查询价格3000-8000之间的所有商品
select goodsname,price from yh_goods where price BETWEEN 3000 and 8000;
-- 十、查询出品牌为apple和nike的所有商品
select goodsname,bid from yh_goods where bid = 1 or bid = 4;
-- 十一、查询出商品名称中包含on的全部商品
select goodsname,price from yh_goods where goodsname like '%on%';
-- 十二、查询出商品数量大于1的分类
select bid,count(id) from yh_goods group by bid having count(id)>1;
-- 十三、查询出品牌或分类为null的所有商品
select goodsname from yh_goods where cid is null or bid is null ;
-- 十四、查询出品牌为apple并且价格大于5000的所有商品
select goodsname,price from yh_goods where bid=1 and price>5000;
-- 十五、查询出价格排名3-5位的商品
select goodsname,price from yh_goods order by price desc limit 2,3;
-- 十六、利用聚合函数查询出如下结果：
select count(id)as '总记录数',avg(price)as '平均价格',sum(price)as '单价总和',max(price)as'最高价格',min(price)as'最低价格'from yh_goods;

-- 十七、将价格最低的三个的商品价格增加1000
update yh_goods set price=price+1000 order by price limit 3;
select goodsname,price from yh_goods order by price;
-- 十八、删除apple品牌价格最高的两条记录
delete from yh_goods where bid=1 order by price desc limit 2;
select goodsname,price from yh_goods where bid=1 order by price desc;
-- 十九、分别使用多表内连接联合查询的两种方法查出如下格式内容
select g.id as '商品编号',goodsname as '商品名称',price as '商品价格',bid as '品牌名称',cid as '分类名称'from yh_goods as g
inner join yh_brand as b on g.bid=b.id
inner join yh_cate as ca on g.cid = ca.id;
-- er
select g.id as '商品编号',goodsname as '商品名称',price as '商品价格',bid as '品牌名称',cid as '分类名称'from yh_goods as g
left join yh_brand as b on g.bid=b.id
left join yh_cate as ca on g.cid = ca.id;

