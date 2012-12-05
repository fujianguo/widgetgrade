CREATE TABLE tbl_grade (_id int(11) NOT NULL auto_increment, keywordid int(11), keyword varchar(50), picpath varchar(50), gradevalue int(8) NOT NULL, gradecounts int(8), gradeitems varchar(500), createrid int(11), createtime varchar(50) NOT NULL UNIQUE, creaternickname varchar(100), audittype int(10), auditdate varchar(50), auditname varchar(255), auditstate int(10), PRIMARY KEY (_id)) CHARACTER SET UTF8;
CREATE TABLE tbl_grade_item (_id int(11) NOT NULL auto_increment, gradeitem varchar(50), gradeitemvalue int(10), displayorder int(10), tbl_grade_id int(11) NOT NULL, PRIMARY KEY (_id)) CHARACTER SET UTF8;
CREATE TABLE tbl_comment (_id int(11) NOT NULL auto_increment, keywordid int(10), commenttitle varchar(100) NOT NULL, commentcontent varchar(255) NOT NULL, goodcounts int(10), userid int(64), nickname varchar(100), commenttime varchar(50) NOT NULL UNIQUE, audittype int(10), auditdate varchar(50), auditname varchar(255), auditstate int(10), PRIMARY KEY (_id)) CHARACTER SET UTF8;
CREATE TABLE tbl_grade_category (_id int(11) NOT NULL auto_increment, categroyname varchar(50), parentid int(64), PRIMARY KEY (_id)) CHARACTER SET UTF8;
CREATE TABLE tbl_grade_cate_related (_id int(11) NOT NULL auto_increment, tbl_grade_id int(11) NOT NULL, tbl_grade_category_id int(11) NOT NULL, PRIMARY KEY (_id)) CHARACTER SET UTF8;
CREATE TABLE tbl_grade_operate_log (_id int(11) NOT NULL auto_increment, opttype varchar(64), opttime varchar(50), optname varchar(255), content varchar(255), tbl_grade_id int(11) NOT NULL, PRIMARY KEY (_id)) CHARACTER SET UTF8;
ALTER TABLE tbl_grade_cate_related ADD INDEX FKtbl_grade_518211 (tbl_grade_id), ADD CONSTRAINT FKtbl_grade_518211 FOREIGN KEY (tbl_grade_id) REFERENCES tbl_grade (_id);
ALTER TABLE tbl_grade_cate_related ADD INDEX FKtbl_grade_360374 (tbl_grade_category_id), ADD CONSTRAINT FKtbl_grade_360374 FOREIGN KEY (tbl_grade_category_id) REFERENCES tbl_grade_category (_id);
ALTER TABLE tbl_grade_operate_log ADD INDEX FKtbl_grade_275298 (tbl_grade_id), ADD CONSTRAINT FKtbl_grade_275298 FOREIGN KEY (tbl_grade_id) REFERENCES tbl_grade (_id);
ALTER TABLE tbl_grade_item ADD INDEX FKtbl_grade_948515 (tbl_grade_id), ADD CONSTRAINT FKtbl_grade_948515 FOREIGN KEY (tbl_grade_id) REFERENCES tbl_grade (_id);
