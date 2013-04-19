CREATE TABLE user(

  uid integer(6),
  firstname varchar(30),
  lastname varchar(30),
  email varchar(40),
  password varchar(20),
  joindate datetime,

  primary key (uid)

) ;


CREATE TABLE schedule(

  scid integer(6),
  datefrom datetime,
  dateto datetime,
  repeatday enum('Mon','Tue','Wed','Thu','Fri','Sat','Sun') DEFAULT NULL,
  repeatmonth enum ('Jan','Feb','Apr','Mar','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec') DEFAULT NULL,
  primary key(scid)

) ;


CREATE TABLE address(

  name varchar(50),
  x  decimal(2,2),
  y  decimal(2,2),
  x1 decimal(2,2),
  y1 decimal(2,2),

) ;


CREATE TABLE tag(

  tig integer(6),
  tagname varchar(20),
  primary key(tig,tagname)

);

CREATE TABLE holiday(

  hname varchar(30),
  date datetime,
  primary key(hname)

) ;


CREATE TABLE friendship(

  followerid integer(6),
  leaderid integer(6),
  followdate datetime,
  primary key(followerid,leaderid),
  INDEX(followerid),
  INDEX(leaderid),
  CONSTRAINT FOREIGN KEY (followerid) REFERENCES user(uid),
  CONSTRAINT FOREIGN KEY (leaderid) REFERENCES user(uid)
  
) ;

CREATE TABLE note(

  nid integer(6),
  scid integer(6),
  uid integer(6),
  notetext varchar(140),
  hyperlink varchar(140),
  time datetime,
  x decimal(2,2),
  y decimal(2,2),
  x1 decimal(2,2),
  y1 decimal(2,2),
  primary key (nid,scid,uid),
  INDEX(nid),
  INDEX(scid),
  INDEX(uid),
  CONSTRAINT FOREIGN KEY (scid) REFERENCES schedule(scid),
  CONSTRAINT FOREIGN KEY (uid) REFERENCES user(uid),


) ;

CREATE TABLE state (

  uid integer(6),
  state varchar(50),
  scid integer(6),
  tig integer(6),

  primary key (uid,state,scid,tig),
  INDEX(uid),
  INDEX(scid),
  INDEX(tig),
  CONSTRAINT FOREIGN KEY (uid) REFERENCES user(uid),
  CONSTRAINT FOREIGN KEY (scid) REFERENCES schedule(scid),
  CONSTRAINT FOREIGN KEY (tig) REFERENCES tag(tig)
  
) ;




CREATE TABLE comment(

  nid integer(6),
  commenttext varchar(140),
  commentdate datetime,
  primary key(nid),
  CONSTRAINT FOREIGN KEY (nid) REFERENCES note(nid)

) ;

CREATE TABLE recieve(

  uid integer(6),
  nid integer(6),
  likes integer(3),

  primary key(uid,nid),
  INDEX(uid),
  INDEX(nid),
  CONSTRAINT FOREIGN KEY (uid) REFERENCES user(uid),
  CONSTRAINT FOREIGN KEY (nid) REFERENCES note(nid)

) ;


CREATE TABLE schedule_time(

  scid integer(6),
  timefrom datetime,
  timeto datetime,
  primary key(scid),
  INDEX(scid),
  CONSTRAINT FOREIGN KEY (scid) REFERENCES schedule(scid)

) ;

CREATE TABLE schedule_week(

  scid integer(6),
  whichweek int(1),
  whichday enum('Mon','Tue','Wed','Thu','Fri','Sat','Sun'),
  primary key(scid),
  INDEX(scid),
  CONSTRAINT FOREIGN KEY (scid) REFERENCES schedule(scid)

) ;

CREATE TABLE note_holiday(

  nid integer(6),
  hname varchar(30),
  primary key(nid,hname),
  INDEX(hname),
  INDEX(nid),
  CONSTRAINT FOREIGN KEY (nid) REFERENCES note(nid),
  CONSTRAINT FOREIGN KEY (hname) REFERENCES holiday(hname)
) ;

