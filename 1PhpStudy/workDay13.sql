-- 添加数据库
create database if not exists zk character set gbk;
-- 查看mysql有哪些数据库
show databases;
-- 查看数据库的详细信息
show create database zk;
-- 修改数据库的编码方式
alter database zk character set utf8;
-- 操作数据库前要先使用数据库
use zk;
-- 设置客户端汉字编码为gbk
set names gbk;
-- 创建班级表
create table if not exists class(
-- 字段表
    id smallint(5) unsigned not null atuo_increment,
    classname varchar(30) not null,
    primary key(id),
    unique key(classname)
)ENGINE=INNODB default charset=utf8 collate utf8_general_ci;