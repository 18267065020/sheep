<?php exit;?>	2016-04-24 23:46:29	127.0.0.1	/eat/admin/main.php?param=delhotel	0	delete from hotel where id=5
<?php exit;?>	2016-04-24 23:46:32	127.0.0.1	/eat/admin/main.php?param=delhotel	0	update hotel set isdefault=1 where id=(select id from hotel order by addtime desc limit 0,1)
<?php exit;?>	2016-04-24 23:48:03	127.0.0.1	/eat/admin/main.php?param=delhotel	0	update hotel set isdefault=1 where id in (select id from hotel order by addtime desc limit 0,1)
<?php exit;?>	2016-04-24 23:51:08	127.0.0.1	/eat/admin/main.php?param=delhotel	0	update hotel set isdefault=1 where id in (select a.id from (select id from hotel order by addtime desc limit 0,1)a)
<?php exit;?>	2016-04-24 23:51:08	127.0.0.1	/eat/admin/main.php?param=delhotel	0	delete from hotel where id=3
<?php exit;?>	2016-04-24 23:51:13	127.0.0.1	/eat/admin/main.php?param=delhotel	0	update hotel set isdefault=1 where id in (select a.id from (select id from hotel order by addtime desc limit 0,1)a)
<?php exit;?>	2016-04-24 23:51:13	127.0.0.1	/eat/admin/main.php?param=delhotel	0	delete from hotel where id=6
<?php exit;?>	2016-04-24 23:51:43	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set isdefault=0
<?php exit;?>	2016-04-24 23:51:43	127.0.0.1	/eat/admin/main.php?param=addhotel	0	insert into hotel values(null,'是打发第三方',1,now())
<?php exit;?>	2016-04-24 23:51:45	127.0.0.1	/eat/admin/main.php?param=addhotel	0	insert into hotel values(null,'额外人认为人',0,now())
<?php exit;?>	2016-04-24 23:51:49	127.0.0.1	/eat/admin/main.php?param=delhotel	0	update hotel set isdefault=1 where id in (select a.id from (select id from hotel where id<>7 order by addtime desc limit 0,1)a)
<?php exit;?>	2016-04-24 23:51:49	127.0.0.1	/eat/admin/main.php?param=delhotel	0	delete from hotel where id=7
<?php exit;?>	2016-04-24 23:51:52	127.0.0.1	/eat/admin/main.php?param=delhotel	0	update hotel set isdefault=1 where id in (select a.id from (select id from hotel where id<>8 order by addtime desc limit 0,1)a)
<?php exit;?>	2016-04-24 23:51:52	127.0.0.1	/eat/admin/main.php?param=delhotel	0	delete from hotel where id=8
<?php exit;?>	2016-04-24 23:51:56	127.0.0.1	/eat/admin/main.php?param=delhotel	0	update hotel set isdefault=1 where id in (select a.id from (select id from hotel where id<>4 order by addtime desc limit 0,1)a)
<?php exit;?>	2016-04-24 23:51:56	127.0.0.1	/eat/admin/main.php?param=delhotel	0	delete from hotel where id=4
<?php exit;?>	2016-04-24 23:52:03	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set name='22222',isdefault=0 where id=2
<?php exit;?>	2016-04-24 23:53:29	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set name='22222',isdefault=1 where id=2
<?php exit;?>	2016-04-24 23:53:34	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set isdefault=0
<?php exit;?>	2016-04-24 23:53:34	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set name='22222',isdefault=1 where id=2
<?php exit;?>	2016-04-24 23:53:39	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set name='22222',isdefault=1 where id=2
<?php exit;?>	2016-04-24 23:54:17	127.0.0.1	/eat/admin/main.php?param=addhotel	0	insert into hotel values(null,'发郭德纲',0,now())
<?php exit;?>	2016-04-24 23:54:20	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set isdefault=0
<?php exit;?>	2016-04-24 23:54:20	127.0.0.1	/eat/admin/main.php?param=addhotel	0	insert into hotel values(null,'而额外人',1,now())
<?php exit;?>	2016-04-24 23:57:49	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set isdefault=0
<?php exit;?>	2016-04-24 23:57:49	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set name='而额外人',isdefault=1 where id=10
<?php exit;?>	2016-04-24 23:57:49	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set isdefault=0
<?php exit;?>	2016-04-24 23:57:49	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set name='而额外人',isdefault=1 where id=10
<?php exit;?>	2016-04-24 23:57:49	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set isdefault=0
<?php exit;?>	2016-04-24 23:57:49	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set name='而额外人',isdefault=1 where id=10
<?php exit;?>	2016-04-24 23:57:52	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set isdefault=0
<?php exit;?>	2016-04-24 23:57:52	127.0.0.1	/eat/admin/main.php?param=addhotel	0	update hotel set name='而额外人',isdefault=1 where id=10
