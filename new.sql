-- USER(uid, firstname, lastname, email, password, joindate)
CREATE TABLE user(

  uid integer(6),
  firstname varchar(30),
  lastname varchar(30),
  email varchar(40),
  password varchar(20),
  joindate datetime,

  primary key (uid)

) ;

-- SCHEDULE_USER(stid, fid, timefrom, timeto, repeatday) 

CREATE TABLE schedule_user(

  scid integer(6),
  fid integer(6),
  datefrom datetime,
  dateto datetime,
  repeatday enum('Mon','Tue','Wed','Thu','Fri','Sat','Sun') DEFAULT NULL,
  primary key(scid),
  primary key(fid),
  INDEX (fid),
  CONSTRAINT FOREIGN KEY (fid) REFERENCES filter(fid)

) ;

-- FILTER(fid, uid, state, Aname, tag, x, y, timestamp )
CREATE TABLE filter(
  fid integer(6),
  uid integer(6),
  state varchar(30),
  aname varchar(50) ,
  tag varchar(30) ,
  x decimal(2,2),
  y decimal(2,2),
  time datetime ,
  primary key (fid,aname,uid),
  INDEX(aname),
  INDEX(fid),
  INDEX(uid),
  
  CONSTRAINT FOREIGN KEY (aname) REFERENCES address(aname),
  CONSTRAINT FOREIGN KEY (uid) REFERENCES user(uid),
  CONSTRAINT FOREIGN KEY (tag) REFERENCES note_tag(tag),
    
);

-- Address(Aname, x, y, x’, y’)
CREATE TABLE address(

  aname varchar(50),
  x  decimal(2,2),
  y  decimal(2,2),
  x1 decimal(2,2),
  y1 decimal(2,2),
  primary key (aname)
) ;

-- HOLIDAY(hname,date)te
CREATE TABLE holiday(

  hname varchar(30),
  date datetime,
  primary key(hname)

) ;

-- FRIENDSHIP(followeruid, leaderuid, followdate)
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

-- NOTE(nid, uid, notetext, hyperlink, timestamp, x, y, x’,y’, like)
CREATE TABLE note(

  nid integer(6),
  uid integer(6),
  notetext varchar(140),
  hyperlink varchar(140),
  time datetime,
  x decimal(2,2),
  y decimal(2,2),
  x1 decimal(2,2),
  y1 decimal(2,2),
  likes integer(3),
  primary key (nid,uid),
  INDEX(nid),
  INDEX(uid),
  CONSTRAINT FOREIGN KEY (uid) REFERENCES user(uid),


) ;

-- COMMENT(nid,commenttext, comdate)
CREATE TABLE comment(

  nid integer(6),
  commenttext varchar(140),
  commentdate datetime,
  
  INDEX(nid),
  CONSTRAINT FOREIGN KEY (nid) REFERENCES note(nid)

) ;

-- NOTE_TAG(nid,tag)
CREATE TABLE note_tag(
  nid integer(6),
  tag varchar(30),
  primary key(nid),
  INDEX(nid),
  CONSTRAINT FOREIGN KEY(nid) REFERENCES note(nid)
) ;


-- SCHEDULE_DATE(scid, nid, timefrom, timeto, datefrom, dateto, repeatday)
CREATE TABLE schedule_date(

  scid integer(6),
  nid integer(6),
  timefrom datetime,
  timeto datetime,
  primary key(scid,nid),
  INDEX(scid),
  INDEX(nid),
  CONSTRAINT FOREIGN KEY (scid) REFERENCES schedule_user(scid),
  CONSTRAINT FOREIGN KEY (nid) REFERENCES note(nid)

) ;

-- SCHEDULE_WEEK(swid, nid, whichweek, whichday, repeatmonth)
CREATE TABLE schedule_week(

  swid integer(6),
  nid integer(6),
  whichweek int(1),
  whichday enum('Mon','Tue','Wed','Thu','Fri','Sat','Sun'),
  repeatmonth enum('Jan','Feb','Mar','Apr','Jun','Jul','Aug','Sep','Oct','Nov','Dec'),
  primary key(swid,nid),
  INDEX(nid),
  CONSTRAINT FOREIGN KEY (nid) REFERENCES note(nid)

) ;

-- NOTE_HOLIDAY(nid, hname)
CREATE TABLE note_holiday(

  nid integer(6),
  hname varchar(30),
  primary key(nid,hname),
  INDEX(hname),
  INDEX(nid),
  CONSTRAINT FOREIGN KEY (nid) REFERENCES note(nid),
  CONSTRAINT FOREIGN KEY (hname) REFERENCES holiday(hname)
) ;
