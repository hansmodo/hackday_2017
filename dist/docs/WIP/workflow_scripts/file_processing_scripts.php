///////////// Proximity Extraction (Multiple) ////////////////////////////////
#!/usr/bin/env php 
<?php
////// BEGIN DICTIONARIES/////////////////////////////////

		$relationship_matrix = array(
			'gwa' => array('chg'=>'colleague','thm'=>'colleague','pjs'=>'co-worker met','nag'=>'co-worker met','jsu'=>'co-worker','isp'=>'co-worker','rim'=>'co-worker','bea'=>'co-worker','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'co-worker','joh'=>'colleague','hek'=>'co-worker','rom'=>'colleague','gec'=>'colleague','wih'=>'co-worker','jhc'=>'colleague','bel'=>'co-worker','jol'=>'co-worker met friend','joj'=>'co-worker met friend','alh'=>'co-worker met','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary colleague','thw'=>'colleague','jor'=>'colleague','dab'=>'co-worker','atw'=>'co-worker','laf'=>'co-worker met friend','alm'=>'co-worker','hog'=>'co-worker','ben'=>'','thj'=>'colleague met','mad'=>'colleague met','jam'=>'co-worker met','jod'=>'colleague','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'co-worker','jhs'=>'co-worker','wli'=>'colleague','cdr'=>'co-worker met','cdl'=>'co-worker','jac'=>'co-worker','frs'=>'co-worker met','cdt'=>'colleague','frm'=>'co-worker','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'co-worker','roh'=>'colleague'),
			'laf' => array('gwa'=>'co-worker friend met','chg'=>'co-worker','thm'=>'co-worker','nag'=>'co-worker met friend','jsu'=>'co-worker','isp'=>'co-worker','rim'=>'colleague','bea'=>'co-worker','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'co-worker met','rom'=>'co-worker','gec'=>'colleague','wih'=>'co-worker met','jhc'=>'colleague','bel'=>'co-worker met','jol'=>'colleague met','joj'=>'colleague','alh'=>'co-worker met','kap'=>'co-worker','cde'=>'co-worker met','jhb'=>'adversary colleague','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague met','pjs'=>'co-worker','alm'=>'co-worker','hog'=>'co-worker','ben'=>'colleague friend met','thj'=>'colleague met co-worker','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'co-worker met','jhs'=>'co-worker','wli'=>'co-worker','cdr'=>'co-worker','cdl'=>'co-worker','jac'=>'colleague','frs'=>'co-worker met','cdt'=>'co-worker','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jod'=>'colleague met','tmp'=>'colleague'),
			'chg' => array('gwa'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'thm' => array('gwa'=>'colleague','chg'=>'colleague','pjs'=>'colleague met','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague'),
			'pjs' => array('gwa'=>'co-worker met','chg'=>'co-worker','thm'=>'co-worker met','nag'=>'colleague met','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague met','bea'=>'colleague met','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague met','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague met kin','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague met','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague met','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jad'=>'colleague'),
			'nag' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague met','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague met','joj'=>'colleague','alh'=>'colleague met','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague met','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','atw'=>'colleague met','jhr'=>'met','cdt'=>'colleague','frm'=>'colleague met','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'jsu' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'colleague','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','rom'=>'colleague'),
			'isp' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'hog' => array('gwa'=>'colleague met','chg'=>'colleague','pjs'=>'colleague','thm'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague met','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'me','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'rim' => array('gwa'=>'co-worker met','chg'=>'co-worker','thm'=>'colleague','pjs'=>'co-worker met','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','bea'=>'co-worker met','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague met','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','rol'=>'kin met'),
			'bea' => array('gwa'=>'co-worker met','chg'=>'co-worker met','thm'=>'co-worker met','pjs'=>'co-worker met','nag'=>'co-worker','jsu'=>'colleague','isp'=>'colleague','rim'=>'co-worker met','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'co-worker met','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'co-worker met','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'pah' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','cdt'=>'colleague'),
			'nic' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague'),
			'jht' => array('gwa'=>'colleague met friend','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague met','jod'=>'colleague','dah'=>'friend met','jab'=>'colleague met'),
			'daw' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague met','pjs'=>'colleague met','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague met','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'joh' => array('gwa'=>'colleague met friend','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague met','ben'=>'colleague met','thj'=>'colleague met','mad'=>'colleague met','jam'=>'colleague met','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'colleague','aab'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague'),
			'hek' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague met','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague met','daw'=>'colleague','joh'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague met','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jod'=>'colleague met','wib'=>'met'),
			'rom' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','gom'=>'friend met colleague'),
			'gec' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague sibling met','frs'=>'colleague'),
			'wih' => array('gwa'=>'colleague','chg'=>'colleague met','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague met','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague met','cdl'=>'colleague met','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague met'),
			'jhc' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague'),
			'bel' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jod'=>'colleague'),
			'jol' => array('gwa'=>'co-worker friend met','chg'=>'co-worker','thm'=>'co-worker','pjs'=>'co-worker','nag'=>'co-worker met','jsu'=>'co-worker met','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','joj'=>'colleague','alh'=>'colleague met friend','kap'=>'colleague','cde'=>'colleague met','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met friend','alm'=>'colleague','hog'=>'co-worker','ben'=>'co-worker','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'co-worker met','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','frm'=>'colleague'),
			'joj' => array('gwa'=>'co-worker met friend','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague met friend','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague met friend','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','alh'=>'colleague met','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'colleague met','jod'=>'colleague met friend','thj'=>'colleague','mad'=>'colleague','jam'=>'colleague','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','ewr'=>'colleague met friend','gom'=>'colleague friend met','edp'=>'colleague','jal'=>'colleague','wig'=>'colleague met','ruk'=>'colleague met','sid'=>'colleague','wib'=>'colleague met friend','wwi'=>'colleague','rcp'=>'colleague','geo'=>'colleague','now'=>'colleague','dah'=>'colleague','tom'=>'colleague'),
			'alh' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague met kin','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague met','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague met','jol'=>'colleague','joj'=>'colleague','kap'=>'colleague','cde'=>'colleague met','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague friend met','alm'=>'colleague met','hog'=>'colleague met','ben'=>'colleague','thj'=>'','mad'=>'colleague','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague met adversary','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','ruk'=>'colleague met'),
			'kap' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'cde' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague met','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague met','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'jhb' => array('gwa'=>'adversary','chg'=>'adversary','thm'=>'adversary','pjs'=>'adversary','nag'=>'adversary','jsu'=>'adversary','isp'=>'adversary','rim'=>'adversary','bea'=>'adversary','pah'=>'adversary','nic'=>'adversary','jht'=>'adversary','daw'=>'adversary','joh'=>'adversary','hek'=>'adversary','rom'=>'adversary','gec'=>'adversary','wih'=>'adversary','jhc'=>'adversary','bel'=>'adversary','jol'=>'adversary','joj'=>'adversary','alh'=>'adversary','kap'=>'adversary','cde'=>'adversary','thw'=>'adversary','jor'=>'adversary','dab'=>'adversary','atw'=>'adversary','laf'=>'adversary','alm'=>'adversary','hog'=>'adversary','ben'=>'adversary','thj'=>'adversary','mad'=>'adversary','jam'=>'adversary','tip'=>'adversary','rip'=>'adversary','edr'=>'adversary','rot'=>'adversary','sam'=>'adversary','aab'=>'adversary','rhl'=>'adversary','chl'=>'adversary','arc'=>'adversary','jhs'=>'adversary','wli'=>'adversary','cdr'=>'adversary','cdl'=>'adversary','jac'=>'adversary','frs'=>'adversary','cdt'=>'adversary'),
			'thw' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague'),
			'jor' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague'),
			'dab' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'aab' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague met','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'rhl' => array('gwa'=>'colleague met friend','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague friend met','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','tmp'=>'colleague','jod'=>'colleague'),
			'chl' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'arc' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague met','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague met','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague met','chl'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'wli' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jhs'=>'colleague','wih'=>'colleague','wli'=>'me','cdr'=>'colleague met','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague'),
			'aba' => array('aba'=>'me','thj'=>'friend met','gwa'=>'acquaintance met','laf'=>'acquaintance met','jod'=>'friend met spouse','jqa'=>'met child','cha'=>'met child','dol'=>'met acquaintance','ben'=>'met acquaintance','joj'=>'met acquaintance','jol'=>'met',thm=>'acquaintance',jab=>'acquaintance met','jal'=>'acquaintance','mad'=>'acquaintance','cde'=>'acquaintance met','jsu'=>'acquaintance met'),
			'jod' => array('jod' => 'me','aba'=>'spouse met friend','gwa'=>'colleague met','mad'=>'colleague met','dol'=>'acquaintance met','thj'=>'colleague met','aab'=>'colleague met','joj'=>'colleague met friend','jqa'=>'met colleague child','jam'=>'colleague met','cde'=>'colleague met acquaintance','hel'=>'colleague met','rot'=>'met','joh'=>'colleague met','ben'=>'colleague met','bel'=>'colleague met friend','jam'=>'colleague','rom' => 'colleague met','alh'=>'colleague met','pah'=>'colleague','tip'=>'colleague met'),
			'ben' => array('jod' => 'colleague met','thj' => 'colleague met','hel' => 'colleague','sid' => 'colleague','joj' => 'colleague met','thw'=>'friend met co-worker','jab'=>'met','joh'=>'acquaintance','edp'=>''),
			'hnb' => array('aab'=>'colleague met','jde'=>'friend met'),
			'rol' => array('gwa' => 'colleague','hek'=>'met','thj'=>'colleague met','tmp'=>'colleague friend','rim'=>'kin met','jnl'=>'child met'),
			'jej' => array('gwa' => 'colleague','rom' => 'colleague met','mad' => 'colleague','hog' => 'colleague','nag' => 'colleague','tip' => 'colleague',),
			'toc' => array('gwa' => 'colleague','bel'=>'colleague','jhb'=>'adversary'),
			'jhr' => array('gwa' => 'colleague','nag'=>'colleague'),
			'jad' => array('gwa' => 'colleague','jod'=>'colleague','pjs'=>'colleague','jol'=>'colleage met','cdl'=>'colleague'),
			'cdt' => array('gwa' => 'colleague','cdr'=>'colleague','cdl'=>'colleague','laf'=>'colleague','cde'=>'colleague'),
			'cdr' => array('gwa' => 'colleague met','cdl'=>'colleague met','laf'=>'colleague met','cde'=>'colleague met'),
			'frm' => array('nag' => 'colleague met','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','all'=>'colleague met'),
			'top' => array('frm'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'ccp' => array('frm'=>'colleague','top'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','bel'=>'colleague'),
			'peh' => array('frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'jhm' => array('roh'=>'colleague','jol'=>'colleague','nag'=>'colleague met','jhr'=>'colleague','all'=>'adversary'),
			'crg' => array('frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague met friend','anp'=>'colleague','roh'=>'colleague','nag'=>'colleague'),
			'anp' => array('frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','roh'=>'colleague','jaw'=>'colleague'),
			'roh' => array('frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','wid'=>'colleague'),
			'frs' => array('gwa' => 'colleague met','jsu' => 'colleague met','nag' => 'colleague'),
			'jac' => array('gwa' => 'colleague','gec' => 'colleague met sibling','jhs' => 'colleague met','pjs'=>'colleague met'),
			'jbu' => array('nag' => 'colleague met','frm' => 'colleague','peh' => 'colleague'),
			'all' => array('nag' => 'adversary','frm' => 'adversary','peh' => 'adversary'),
			'lab' => array('nag' => 'colleague','frm' => 'colleague','peh' => 'colleague'),
			'wid' => array('' => ''),	
			'jaw' => array('nag' => 'colleague','frm' => 'colleague','peh' => 'colleague','anp'=>'colleague','atw'=>'colleague'),
			
			'ewr' => array('jhr' => 'colleague met sibling'),
			'gom' => array('gwa'=>'co-worker','joj'=>'colleague friend met','rom'=>'colleague friend met','ben'=>'colleague','thj'=>'met colleague co-worker','jod'=>'colleague','laf'=>'colleague met','cdl'=>'colleague met','alh'=>'colleague','jhb'=>'adversary','pjs'=>'met colleague','hog'=>'colleague','bel'=>'colleague','met colleague','dah'=>'met','alm'=>'colleague met'),
			'edp' => array('joj'=>'colleague'),
			'jal' => array('joj'=>'colleague'),
			'wig' => array('joj'=>'colleague'),
			'ruk' => array('joj'=>'colleague'),
			'sid' => array('joj'=>'colleague'),
			'wib' => array('joj'=>'colleague'),
			'wwi' => array('joj'=>'colleague'),
			'rcp' => array('joj'=>'colleague friend met','ben'=>'colleague','jod'=>'colleague'),
			'now' => array('joj'=>'colleague'),
			'geo' => array('joj'=>'colleague'),

			'tmp' => array('gwa'=>'colleague','rom'=>'colleague met','laf'=>'colleague met friend','thj'=>'colleague met','jhr'=>'colleague met','dah'=>'colleague met','gom'=>'colleague','rol'=>'colleague friend'),
			'edr' => array('gwa'=>'colleague','rom'=>'colleague','hek'=>'met co-worker colleague','alh'=>'co-worker met','joj'=>'colleague','thj'=>'colleague','mad'=>'colleague'),
			'dah' => array('gwa'=>'colleague','bel'=>'co-worker met','anp'=>'met colleague','thj'=>'co-worker'),
			'tom' => array('gwa'=>'colleague'),
			'beh' => array('gwa'=>'colleague'),
			'cam' => array('gwa'=>'colleague'),
			'wlg' => array('gwa'=>'colleague'),	
			'jab' => array('jht'=>'colleague met'),	
			'bnh' => array('hek'=>'colleague met'),
			'cdl' => array('gwa'=>'colleague met','laf'=>'colleague met'),
			'tip' => array('gwa'=>'co-worker met','dah'=>'colleague','hek'=>'colleague met','arc'=>'co-worker','bel'=>'co-worker met','jsu'=>'co-worker','jhb'=>'adversary','atw'=>'co-worker','alm'=>'co-worker','hek'=>'co-worker met','thm'=>'co-worker met','hog'=>'co-worker'),

			'wis' => array('gom'=>'colleague met'),
			'leb' => array('gom'=>'colleague met'),
			'fro' => array('gom'=>'colleague met'),
			'fad' => array('gom'=>'colleague met'),
		);

///////////////////////////////
$name_tla_lookup = array("nimrod endsley"=>"nhe","jessie endsley"=>"jepe","elsie endsley "=>"ebe","rial bass"=>"rsb","james endsley"=>"jpe","gail brough"=>"gae","gail endsley"=>"gae","kathy endsley "=>"kje",
"daniel endsley"=>"dse","heidi brough"=>"hmb","heidi lampe"=>"hmb","hans brough"=>"hab","harvey brough"=>"harb","howard brough"=>"howb","sumner theller"=>"sbt","ruth theller"=>"rte","ruth endsley"=>"rte",
"lois curtis"=>"ltc","horace king"=>"hok","william endsley"=>"wae","mary baker"=>"mbk","jp endsley"=>"jpe",
"orion clemens"=>"oxc",
"ulysses grant"=>"usg",
"abraham lincoln"=>"abl",
"henry halleck"=>"hwh",
"ambrose burnside"=>"aeb",
"george mcclellan"=>"gbm",
"thomas jackson"=>"tjj",
"robert lee"=>"rel",
"jefferson davis"=>"jed",
"mary lee"=>"mnc",
"fitzhugh lee"=>"wfl",
"mildred lee"=>"mil",
"agnes lee"=>"agl",
"andrew johnson"=>"adj",
"enos christman"=>"ech",
"ellen apple"=>"eap",
"peebles prizer"=>"pep",
"william sherman"=>"wts",
"john wool"=>"jew",
"winfield scott"=>"wfs",
"george washington"=>"gwa",
"thomas jefferson"=>"thj",
"benjamin franklin"=>"ben",
"abiah franklin"=>"abf",
"peter franklin"=>"pef",
"andrew jackson"=>"anj",
"william marcy"=>"wlm",
"john sherman "=>"jos",
"william crawford"=>"whc",
"john forsyth"=>"jof",
"james monroe"=>"jam",
"john quincy adams"=>"jqa",
"william wirt"=>"wiw",
"james madison"=>"mad",
"dolly madison"=>"dol",
"marie-joseph-paul-yves-roch-gilbert du motier lafayette"=>"laf",
"cutts"=>"anna",
"anna cutts"=>"apc",
"elizabeth keckly"=>"ezk",
"mary lincoln"=>"mtl",
"abigail adams"=>"aba",
"abigail smith"=>"aba",
"john adams"=>"jod",
"patrick henry"=>"pah",
"richard lee"=>"rhl",
"samuel adams"=>"sam",
"arthur lee"=>"arl",
"francis lee"=>"fll",
"nathanael greene"=>"nag",
"philip schuyler"=>"pjs",
"israel putnam "=>"isp",
"william irvine"=>"wii",
"john sullivan "=>"jsu",
"timothy pickering"=>"tip",
"horatio gates "=>"hog",
"benedict arnold"=>"bea",
"edmund randolph"=>"edr",
"henry clay"=>"hec",
"aaron burr"=>"aab",
"john tyler"=>"jot",
"francis brooke"=>"ftb",
"josiah johnston"=>"jsj",
"adam beatty"=>"adb",
"henry clay"=>"hcj",
"john brown"=>"job",
"owen brown"=>"owb",
"george stearns"=>"ges",
"isaac smith"=>"job",
"theodore parker"=>"thp",
"theodosia prevost"=>"thb",
"theodosia alston"=>"tba",
"alexander mcdougall"=>"alm",
"william paterson"=>"whp",
"matthias ogden"=>"mao",
"robert troup"=>"rot",
"r alden"=>"ral",
"joseph alston"=>"joa",
"peggy gartin"=>"peg",
"richard montgomery"=>"rim",
"david wooster"=>"daw",
"john hancock"=>"joh",
"george mason"=>"gem",
"henry knox"=>"hek",
"robert morris"=>"rom",
"george clinton"=>"gec",
"william heath"=>"wih",
"benjamin lincoln"=>"bel",
"henry laurens"=>"hel",
"john laurens"=>"jol",
"john jay"=>"joj",
"alexander hamilton"=>"alh",
"william livingston"=>"wil",
"john burgoyne"=>"jhb",
"thomas wharton"=>"thw",
"j devereux"=>"jde",
"robert livingston"=>"rol",
"john stark"=>"jhs",
"chevalier de la luzerne"=>"cdl",
"william irvine"=>"wli",
"john rutledge"=>"jht",
"james clinton"=>"jac",
"james duane"=>"jad",
"christopher gadsden"=>"crg",
"francis marion"=>"frm",
"thomas pinckney"=>"top",
"peter horry"=>"peh",
"john matthews"=>"jhm",
"gilbert du motier lafayette"=>"laf",
"jean baptiste de vimeur"=>"cdr",
"charles pinckney"=>"ccp",
"william drayton"=>"wid",
"edward rutledge"=>"ewr",
"gouverneur morris"=>"gom",
"edmund pendleton"=>"edp",
"james lovell"=>"jal",
"rufus king"=>"ruk",
"william bingham"=>"wib",
"william wilberforce"=>"wwi",
"richard peters"=>"rcp",
"noah webster"=>"now",
"george otis"=>"geo",
"silas deane"=>"sid",
"james bowdoin"=>"jab",
"francis osborne"=>"fro",
"william short"=>"wis",
"francois deforgues"=>"fad",
"robert dinwiddie"=>"rod",
"martha washington"=>"mrd",
"mary washington"=>"mrw",
"janet livingston"=>"jnl",
"sarah dawson"=>"smd"
);

////// END DICTIONARIES//////////////////////////////////
	
	//Print proximity relationships in sql format for all letters in a given directory
	//currently the given directory is hardwired to the 'Workflow' directory
	
	$working_directory = $_ENV['FT_WORKFLOW_PATH'];
	//$working_directory = $_ENV['FT_DATA_PATH'];

	if($dir = opendir($working_directory)){
		while(($file = readdir($dir)) !== false){
			if($file != "." && $file != ".." && $file != ".DS_Store"){
				$handle = fopen($working_directory.$file, "r");
				$document = fread($handle, filesize($working_directory.$file));
				
					//Get values for SQL statement
					$author_tla 				= get_author_tla($file);
					$recipient_tla			= get_recipient_tla();
			
					$xfn_tags 				= get_person_relationship_tags();
					$xfn_tags_alters			= $xfn_tags['alter'];	
					$file_parts = explode(".",$file);
					$doc_id = $file_parts[0];	

					//////////////////////////////////////////////////////
					//write sql that removes existing proximity votes associated with this letter
					echo "delete from proximity where doc_id = '$doc_id';\n";
					//write proximity vote (correspondence)
					write_correspondence_proximity_results($author_tla,$recipient_tla,$file);
					//write proximity vote(s) (all mentions)
					write_xfn_proximity_results($author_tla,$xfn_tags_alters,$file);
					//////////////////////////////////////////////////////


				fclose ( $handle );
			}
		}
		closedir($dir);
	}



	//Create a sql entry that counts as one vote for the ego's act of writing a letter to alter.
	function write_correspondence_proximity_results($ego_tla,$alter_tla,$file){
		if($alter_tla && $alter_tla !=''){
			//determine strength of correspondence vote.
			$proximity		= get_ego_proximity_with_alter($ego_tla,$alter_tla,'write');

			$file_parts = explode(".",$file);
			$doc_id = $file_parts[0];			

			//proximity entry sql column names
			//ego_tla | alter_tla | proximity_component | document_id | timestamp
			$vote_row = "INSERT INTO proximity VALUES ('$ego_tla','$alter_tla',$proximity,'$doc_id',Now());\n";
			echo"$vote_row";
		}
		return;
	}

	//Create a sql entry for each xfn mention ego makes of an alter.
	function write_xfn_proximity_results($ego_tla,$xfn_tags_alters,$file){
		for($i=0;$i < count($xfn_tags_alters);$i++){
			//todo: account for more than 1 get param
			$get_str_pieces 	= explode("=", $xfn_tags_alters[$i]);
			$alter_tla		= $get_str_pieces[1];
			if($ego_tla != $alter_tla){//dont count 'me' xfn references
				$proximity		= get_ego_proximity_with_alter($ego_tla,$alter_tla,'mention');

				$file_parts = explode(".",$file);
				$doc_id = $file_parts[0];			

				//proximity entry sql column names
				//ego_tla | alter_tla | proximity_component | document_id | timestamp

				$vote_row = "INSERT INTO proximity VALUES ('$ego_tla','$alter_tla',$proximity,'$doc_id',Now());\n";
				echo"$vote_row";
			}
		}
		
		return;
	}

	//Look up three letter acronym associated with the recipient
	function get_recipient_tla(){
		//echo"in get_recipient_tla";
		global $document;
		global $name_tla_lookup;
		$ret_tla = 'unknown';
		$pattern = '/<recipient first="(?<first>[\w ]*)" last="(?<last>[\w ]*)"[ type="individual"]*\/>/';
		preg_match($pattern, $document, $matches);
		$name = strtolower($matches['first'] . " " . $matches['last']);
		//echo"name= " . $name;
		
		$ret_tla = $name_tla_lookup[$name];
		return $ret_tla;
	}

	//Look up xfn relationship of ego to the recipeint (alter)
	//action is 'write' or 'mention' - written proximity votes count for more than mere mentions
	function get_ego_proximity_with_alter($ego_tla,$alter_tla,$action){
		global $relationship_matrix;
		$xfn_string = $relationship_matrix[$ego_tla][$alter_tla];
		$xfn_relationships = parse_xfn_relationship_types($xfn_string);
		//print_r($xfn_relationships);

		//determine closest relationship type
 		$strongest_type = get_closest_relationship_type($xfn_relationships);
		//echo"strongest_type = $strongest_type\n";		

		//determine strength of vote based on the strongest relationship tie
		switch($strongest_type){
			case 'family':
			case 'friendship':
			case 'romantic':
				$proximity_component = ($action == 'write')?1:2;
			break;

			case 'professional':
			case 'physical':
				$proximity_component = ($action == 'write')?2:3;
			break;

			case 'geographical':
				$proximity_component = ($action == 'write')?3:4;
			break;

			default:
				$proximity_component = 4;
			break;
		}

		return $proximity_component;
	}

////////////////////////
//determine closest relationship type
////////////////////////
function get_closest_relationship_type($related_person_array){
	//print_r($related_person_array);
	$family_relationship 		= ($related_person_array['family'] != '')?true:false;
	$friend_relationship 		= ($related_person_array['friendship'] == 'friend')?true:false; 
	$professional_relationship 	= ($related_person_array['professional'] != '' || $related_person_array['friendship'] == 'acquaintance')?true:false;
	$physical_relationship 		= ($related_person_array['physical'] != '')?true:false;

	$closest_relationship_type	= 'none'; 
	if($physical_relationship){
		$closest_relationship_type	= 'physical';
	}
	if($professional_relationship){
		$closest_relationship_type	= 'professional';
	}
	if($friend_relationship){
		$closest_relationship_type	= 'friendship';
	}
	if($family_relationship){
		$closest_relationship_type	= 'family';
	}
	//echo"$closest_relationship_type";
	return $closest_relationship_type;
}	

	//Get three letter acronym associated with letter file
	function get_author_tla($file){
		global $document;
		$pattern = '/<letter id="(?<tla>\w{3})(?<digit>\d*)">/'; //note use of named subpatterns! pretty cool
		preg_match($pattern, $document, $matches);
		$author_tla = $matches['tla'];

		//get tla from file name if no letter tag (legacy files)
		if(!$author_tla || $author_tla == ''){
			$author_tla = '';
			$pattern = "/[ltr|jrn|doc]{1}_(?<tla>[a-zA-Z]{2,4})\d{3,5}/";
			preg_match($pattern, $file, $matches);
			$author_tla = $matches['tla'];			
		}
		
		return $author_tla;
	}

	//Get relationship anchor tags
	//<a href='/results.php?tla=alm' rel='colleague'>General McDougall</a>
	function get_person_relationship_tags(){
		global $document;
		//non-greedy retrieval of relationship anchor tags
		$pattern = '/<a href=.*(?<alter>tla=.*)[\'\"]{1} rel=[\'\"]{1}(?<relation>[friend|acquaintance|contact|adversary|met|co\-worker|colleague|child|parent|sibling|spouse|kin| ]*)[\'\"]{1}>(?<name>.*?)<\/a>/';		preg_match_all($pattern, $document, $matches); 
		return $matches;
	}

	//Organize relationship descriptive strings using xfn categories
	//note: 'adversary' is a modification on my part
	function parse_xfn_relationship_types($xfn_string){
		$xfn_categorized_relationship_strings = array('family'=>'','friend'=>'','professional'=>'','romantic'=>'','physical'=>'','geographical'=>'','identity'=>'');

		//XFN relationship matrix
		$xfn_category_matrix = array(
			'friend'=>'friendship','acquaintance'=>'friendship','contact'=>'friendship','adversary'=>'friendship',
			'met'=>'physical',
			'co-worker'=>'professional','colleague'=>'professional',
			'co-resident'=>'geographical','neighbor'=>'geographical',
			'child'=>'family','parent'=>'family','sibling'=>'family','spouse'=>'family','kin'=>'family',
			'muse'=>'romantic','crush'=>'romantic','date'=>'romantic','sweetheart'=>'romantic',
			'me'=>'identity'
		);
		
		$relationships = explode(' ', $xfn_string);
		//echo"$xfn_string \n";
		foreach($relationships as $relation){
			$xfn_category = $xfn_category_matrix[$relation];
			$xfn_categorized_relationship_strings[$xfn_category] = $relation;
		}

		return $xfn_categorized_relationship_strings;
	}



?>

///////////// Proximity Extraction (Single File) /////////////////////////////
///////////////////////////////
#!/usr/bin/env php 
<?php
	$selected_file_path = $_ENV['TM_SELECTED_FILE'];
	$file_path_parts = explode('/',$selected_file_path);
	$file = array_pop($file_path_parts);
	$document = file_get_contents('php://stdin');

////// BEGIN DICTIONARIES/////////////////////////////////

		$relationship_matrix = array(
			'gwa' => array('chg'=>'colleague','thm'=>'colleague','pjs'=>'co-worker met','nag'=>'co-worker met','jsu'=>'co-worker','isp'=>'co-worker','rim'=>'co-worker','bea'=>'co-worker','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'co-worker','joh'=>'colleague','hek'=>'co-worker','rom'=>'colleague','gec'=>'colleague','wih'=>'co-worker','jhc'=>'colleague','bel'=>'co-worker','jol'=>'co-worker met friend','joj'=>'co-worker met friend','alh'=>'co-worker met','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary colleague','thw'=>'colleague','jor'=>'colleague','dab'=>'co-worker','atw'=>'co-worker','laf'=>'co-worker met friend','alm'=>'co-worker','hog'=>'co-worker','ben'=>'','thj'=>'colleague met','mad'=>'colleague met','jam'=>'co-worker met','jod'=>'colleague','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'co-worker','jhs'=>'co-worker','wli'=>'colleague','cdr'=>'co-worker met','cdl'=>'co-worker','jac'=>'co-worker','frs'=>'co-worker met','cdt'=>'colleague','frm'=>'co-worker','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'co-worker','roh'=>'colleague'),
			'laf' => array('gwa'=>'co-worker friend met','chg'=>'co-worker','thm'=>'co-worker','nag'=>'co-worker met friend','jsu'=>'co-worker','isp'=>'co-worker','rim'=>'colleague','bea'=>'co-worker','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'co-worker met','rom'=>'co-worker','gec'=>'colleague','wih'=>'co-worker met','jhc'=>'colleague','bel'=>'co-worker met','jol'=>'colleague met','joj'=>'colleague','alh'=>'co-worker met','kap'=>'co-worker','cde'=>'co-worker met','jhb'=>'adversary colleague','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague met','pjs'=>'co-worker','alm'=>'co-worker','hog'=>'co-worker','ben'=>'colleague friend met','thj'=>'colleague met co-worker','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'co-worker met','jhs'=>'co-worker','wli'=>'co-worker','cdr'=>'co-worker','cdl'=>'co-worker','jac'=>'colleague','frs'=>'co-worker met','cdt'=>'co-worker','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jod'=>'colleague met','tmp'=>'colleague'),
			'chg' => array('gwa'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'thm' => array('gwa'=>'colleague','chg'=>'colleague','pjs'=>'colleague met','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague'),
			'pjs' => array('gwa'=>'co-worker met','chg'=>'co-worker','thm'=>'co-worker met','nag'=>'colleague met','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague met','bea'=>'colleague met','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague met','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague met kin','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague met','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague met','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jad'=>'colleague'),
			'nag' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague met','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague met','joj'=>'colleague','alh'=>'colleague met','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague met','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','atw'=>'colleague met','jhr'=>'met','cdt'=>'colleague','frm'=>'colleague met','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'jsu' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'colleague','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','rom'=>'colleague'),
			'isp' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'hog' => array('gwa'=>'colleague met','chg'=>'colleague','pjs'=>'colleague','thm'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague met','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'me','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'rim' => array('gwa'=>'co-worker met','chg'=>'co-worker','thm'=>'colleague','pjs'=>'co-worker met','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','bea'=>'co-worker met','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague met','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','rol'=>'kin met'),
			'bea' => array('gwa'=>'co-worker met','chg'=>'co-worker met','thm'=>'co-worker met','pjs'=>'co-worker met','nag'=>'co-worker','jsu'=>'colleague','isp'=>'colleague','rim'=>'co-worker met','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'co-worker met','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'co-worker met','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'pah' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','cdt'=>'colleague'),
			'nic' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague'),
			'jht' => array('gwa'=>'colleague met friend','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague met','jod'=>'colleague','dah'=>'friend met','jab'=>'colleague met'),
			'daw' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague met','pjs'=>'colleague met','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague met','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'joh' => array('gwa'=>'colleague met friend','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague met','ben'=>'colleague met','thj'=>'colleague met','mad'=>'colleague met','jam'=>'colleague met','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'colleague','aab'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague'),
			'hek' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague met','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague met','daw'=>'colleague','joh'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague met','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jod'=>'colleague met','wib'=>'met'),
			'rom' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','gom'=>'friend met colleague'),
			'gec' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague sibling met','frs'=>'colleague'),
			'wih' => array('gwa'=>'colleague','chg'=>'colleague met','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague met','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague met','cdl'=>'colleague met','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague met'),
			'jhc' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague'),
			'bel' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jod'=>'colleague'),
			'jol' => array('gwa'=>'co-worker friend met','chg'=>'co-worker','thm'=>'co-worker','pjs'=>'co-worker','nag'=>'co-worker met','jsu'=>'co-worker met','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','joj'=>'colleague','alh'=>'colleague met friend','kap'=>'colleague','cde'=>'colleague met','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met friend','alm'=>'colleague','hog'=>'co-worker','ben'=>'co-worker','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'co-worker met','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','frm'=>'colleague'),
			'joj' => array('gwa'=>'co-worker met friend','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague met friend','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague met friend','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','alh'=>'colleague met','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'colleague met','jod'=>'colleague met friend','thj'=>'colleague','mad'=>'colleague','jam'=>'colleague','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','ewr'=>'colleague met friend','gom'=>'colleague friend met','edp'=>'colleague','jal'=>'colleague','wig'=>'colleague met','ruk'=>'colleague met','sid'=>'colleague','wib'=>'colleague met friend','wwi'=>'colleague','rcp'=>'colleague','geo'=>'colleague','now'=>'colleague','dah'=>'colleague','tom'=>'colleague'),
			'alh' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague met kin','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague met','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague met','jol'=>'colleague','joj'=>'colleague','kap'=>'colleague','cde'=>'colleague met','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague friend met','alm'=>'colleague met','hog'=>'colleague met','ben'=>'colleague','thj'=>'','mad'=>'colleague','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague met adversary','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','ruk'=>'colleague met'),
			'kap' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'cde' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague met','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague met','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'jhb' => array('gwa'=>'adversary','chg'=>'adversary','thm'=>'adversary','pjs'=>'adversary','nag'=>'adversary','jsu'=>'adversary','isp'=>'adversary','rim'=>'adversary','bea'=>'adversary','pah'=>'adversary','nic'=>'adversary','jht'=>'adversary','daw'=>'adversary','joh'=>'adversary','hek'=>'adversary','rom'=>'adversary','gec'=>'adversary','wih'=>'adversary','jhc'=>'adversary','bel'=>'adversary','jol'=>'adversary','joj'=>'adversary','alh'=>'adversary','kap'=>'adversary','cde'=>'adversary','thw'=>'adversary','jor'=>'adversary','dab'=>'adversary','atw'=>'adversary','laf'=>'adversary','alm'=>'adversary','hog'=>'adversary','ben'=>'adversary','thj'=>'adversary','mad'=>'adversary','jam'=>'adversary','tip'=>'adversary','rip'=>'adversary','edr'=>'adversary','rot'=>'adversary','sam'=>'adversary','aab'=>'adversary','rhl'=>'adversary','chl'=>'adversary','arc'=>'adversary','jhs'=>'adversary','wli'=>'adversary','cdr'=>'adversary','cdl'=>'adversary','jac'=>'adversary','frs'=>'adversary','cdt'=>'adversary'),
			'thw' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague'),
			'jor' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague'),
			'dab' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'aab' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague met','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'rhl' => array('gwa'=>'colleague met friend','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague friend met','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','tmp'=>'colleague','jod'=>'colleague'),
			'chl' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'arc' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague met','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague met','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague met','chl'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'wli' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jhs'=>'colleague','wih'=>'colleague','wli'=>'me','cdr'=>'colleague met','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague'),
			'aba' => array('aba'=>'me','thj'=>'friend met','gwa'=>'acquaintance met','laf'=>'acquaintance met','jod'=>'friend met spouse','jqa'=>'met child','cha'=>'met child','dol'=>'met acquaintance','ben'=>'met acquaintance','joj'=>'met acquaintance','jol'=>'met','thm'=>'acquaintance','jab'=>'acquaintance met','jal'=>'acquaintance','mad'=>'acquaintance','cde'=>'acquaintance met','jsu'=>'acquaintance met'),
			'jod' => array('jod' => 'me','aba'=>'spouse met friend','gwa'=>'colleague met','mad'=>'colleague met','dol'=>'acquaintance met','thj'=>'colleague met','aab'=>'colleague met','joj'=>'colleague met friend','jqa'=>'met colleague child','jam'=>'colleague met','cde'=>'colleague met acquaintance','hel'=>'colleague met','rot'=>'met','joh'=>'colleague met','ben'=>'colleague met','bel'=>'colleague met friend','jam'=>'colleague','rom' => 'colleague met','alh'=>'colleague met','pah'=>'colleague','tip'=>'colleague met'),
			'ben' => array('jod' => 'colleague met','thj' => 'colleague met','hel' => 'colleague','sid' => 'colleague','joj' => 'colleague met','thw'=>'friend met co-worker','jab'=>'met','joh'=>'acquaintance','edp'=>''),
			'hnb' => array('aab'=>'colleague met','jde'=>'friend met'),
			'rol' => array('gwa' => 'colleague','hek'=>'met','thj'=>'colleague met','tmp'=>'colleague friend','rim'=>'kin met','jnl'=>'child met'),
			'jej' => array('gwa' => 'colleague','rom' => 'colleague met','mad' => 'colleague','hog' => 'colleague','nag' => 'colleague','tip' => 'colleague',),
			'toc' => array('gwa' => 'colleague','bel'=>'colleague','jhb'=>'adversary'),
			'jhr' => array('gwa' => 'colleague','nag'=>'colleague'),
			'jad' => array('gwa' => 'colleague','jod'=>'colleague','pjs'=>'colleague','jol'=>'colleage met','cdl'=>'colleague'),
			'cdt' => array('gwa' => 'colleague','cdr'=>'colleague','cdl'=>'colleague','laf'=>'colleague','cde'=>'colleague'),
			'cdr' => array('gwa' => 'colleague met','cdl'=>'colleague met','laf'=>'colleague met','cde'=>'colleague met'),
			'frm' => array('nag' => 'colleague met','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','all'=>'colleague met'),
			'top' => array('frm'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'ccp' => array('frm'=>'colleague','top'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','bel'=>'colleague'),
			'peh' => array('frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'jhm' => array('roh'=>'colleague','jol'=>'colleague','nag'=>'colleague met','jhr'=>'colleague','all'=>'adversary'),
			'crg' => array('frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague met friend','anp'=>'colleague','roh'=>'colleague','nag'=>'colleague'),
			'anp' => array('frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','roh'=>'colleague','jaw'=>'colleague'),
			'roh' => array('frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','wid'=>'colleague'),
			'frs' => array('gwa' => 'colleague met','jsu' => 'colleague met','nag' => 'colleague'),
			'jac' => array('gwa' => 'colleague','gec' => 'colleague met sibling','jhs' => 'colleague met','pjs'=>'colleague met'),
			'jbu' => array('nag' => 'colleague met','frm' => 'colleague','peh' => 'colleague'),
			'all' => array('nag' => 'adversary','frm' => 'adversary','peh' => 'adversary'),
			'lab' => array('nag' => 'colleague','frm' => 'colleague','peh' => 'colleague'),
			'wid' => array('' => ''),	
			'jaw' => array('nag' => 'colleague','frm' => 'colleague','peh' => 'colleague','anp'=>'colleague','atw'=>'colleague'),
			
			'ewr' => array('jhr' => 'colleague met sibling'),
			'gom' => array('gwa'=>'co-worker','joj'=>'colleague friend met','rom'=>'colleague friend met','ben'=>'colleague','thj'=>'met colleague co-worker','jod'=>'colleague','laf'=>'colleague met','cdl'=>'colleague met','alh'=>'colleague','jhb'=>'adversary','pjs'=>'met colleague','hog'=>'colleague','bel'=>'colleague','met colleague','dah'=>'met','alm'=>'colleague met'),
			'edp' => array('joj'=>'colleague'),
			'jal' => array('joj'=>'colleague'),
			'wig' => array('joj'=>'colleague'),
			'ruk' => array('joj'=>'colleague'),
			'sid' => array('joj'=>'colleague'),
			'wib' => array('joj'=>'colleague'),
			'wwi' => array('joj'=>'colleague'),
			'rcp' => array('joj'=>'colleague friend met','ben'=>'colleague','jod'=>'colleague'),
			'now' => array('joj'=>'colleague'),
			'geo' => array('joj'=>'colleague'),

			'tmp' => array('gwa'=>'colleague','rom'=>'colleague met','laf'=>'colleague met friend','thj'=>'colleague met','jhr'=>'colleague met','dah'=>'colleague met','gom'=>'colleague','rol'=>'colleague friend'),
			'edr' => array('gwa'=>'colleague','rom'=>'colleague','hek'=>'met co-worker colleague','alh'=>'co-worker met','joj'=>'colleague','thj'=>'colleague','mad'=>'colleague'),
			'dah' => array('gwa'=>'colleague','bel'=>'co-worker met','anp'=>'met colleague','thj'=>'co-worker'),
			'tom' => array('gwa'=>'colleague'),
			'beh' => array('gwa'=>'colleague'),
			'cam' => array('gwa'=>'colleague'),
			'wlg' => array('gwa'=>'colleague'),	
			'jab' => array('jht'=>'colleague met'),	
			'bnh' => array('hek'=>'colleague met'),
			'cdl' => array('gwa'=>'colleague met','laf'=>'colleague met'),
			'tip' => array('gwa'=>'co-worker met','dah'=>'colleague','hek'=>'colleague met','arc'=>'co-worker','bel'=>'co-worker met','jsu'=>'co-worker','jhb'=>'adversary','atw'=>'co-worker','alm'=>'co-worker','hek'=>'co-worker met','thm'=>'co-worker met','hog'=>'co-worker'),

			'wis' => array('gom'=>'colleague met'),
			'leb' => array('gom'=>'colleague met'),
			'fro' => array('gom'=>'colleague met'),
			'fad' => array('gom'=>'colleague met'),
		);

///////////////////////////////
$name_tla_lookup = array("nimrod endsley"=>"nhe","jessie endsley"=>"jepe","elsie endsley "=>"ebe","rial bass"=>"rsb","james endsley"=>"jpe","gail brough"=>"gae","gail endsley"=>"gae","kathy endsley "=>"kje",
"daniel endsley"=>"dse","heidi brough"=>"hmb","heidi lampe"=>"hmb","hans brough"=>"hab","harvey brough"=>"harb","howard brough"=>"howb","sumner theller"=>"sbt","ruth theller"=>"rte","ruth endsley"=>"rte",
"lois curtis"=>"ltc","horace king"=>"hok","william endsley"=>"wae","mary baker"=>"mbk","jp endsley"=>"jpe",
"orion clemens"=>"oxc",
"ulysses grant"=>"usg",
"abraham lincoln"=>"abl",
"henry halleck"=>"hwh",
"ambrose burnside"=>"aeb",
"george mcclellan"=>"gbm",
"thomas jackson"=>"tjj",
"robert lee"=>"rel",
"jefferson davis"=>"jed",
"mary lee"=>"mnc",
"fitzhugh lee"=>"wfl",
"mildred lee"=>"mil",
"agnes lee"=>"agl",
"andrew johnson"=>"adj",
"enos christman"=>"ech",
"ellen apple"=>"eap",
"peebles prizer"=>"pep",
"william sherman"=>"wts",
"john wool"=>"jew",
"winfield scott"=>"wfs",
"george washington"=>"gwa",
"thomas jefferson"=>"thj",
"benjamin franklin"=>"ben",
"abiah franklin"=>"abf",
"peter franklin"=>"pef",
"andrew jackson"=>"anj",
"william marcy"=>"wlm",
"john sherman "=>"jos",
"william crawford"=>"whc",
"john forsyth"=>"jof",
"james monroe"=>"jam",
"john quincy adams"=>"jqa",
"william wirt"=>"wiw",
"james madison"=>"mad",
"dolly madison"=>"dol",
"marie-joseph-paul-yves-roch-gilbert du motier lafayette"=>"laf",
"cutts"=>"anna",
"anna cutts"=>"apc",
"elizabeth keckly"=>"ezk",
"mary lincoln"=>"mtl",
"abigail adams"=>"aba",
"abigail smith"=>"aba",
"john adams"=>"jod",
"patrick henry"=>"pah",
"richard lee"=>"rhl",
"samuel adams"=>"sam",
"arthur lee"=>"arl",
"francis lee"=>"fll",
"nathanael greene"=>"nag",
"philip schuyler"=>"pjs",
"israel putnam "=>"isp",
"william irvine"=>"wii",
"john sullivan "=>"jsu",
"timothy pickering"=>"tip",
"horatio gates "=>"hog",
"benedict arnold"=>"bea",
"edmund randolph"=>"edr",
"henry clay"=>"hec",
"aaron burr"=>"aab",
"john tyler"=>"jot",
"francis brooke"=>"ftb",
"josiah johnston"=>"jsj",
"adam beatty"=>"adb",
"henry clay"=>"hcj",
"john brown"=>"job",
"owen brown"=>"owb",
"george stearns"=>"ges",
"isaac smith"=>"job",
"theodore parker"=>"thp",
"theodosia prevost"=>"thb",
"theodosia alston"=>"tba",
"alexander mcdougall"=>"alm",
"william paterson"=>"whp",
"matthias ogden"=>"mao",
"robert troup"=>"rot",
"r alden"=>"ral",
"joseph alston"=>"joa",
"peggy gartin"=>"peg",
"richard montgomery"=>"rim",
"david wooster"=>"daw",
"john hancock"=>"joh",
"george mason"=>"gem",
"henry knox"=>"hek",
"robert morris"=>"rom",
"george clinton"=>"gec",
"william heath"=>"wih",
"benjamin lincoln"=>"bel",
"henry laurens"=>"hel",
"john laurens"=>"jol",
"john jay"=>"joj",
"alexander hamilton"=>"alh",
"william livingston"=>"wil",
"john burgoyne"=>"jhb",
"thomas wharton"=>"thw",
"j devereux"=>"jde",
"robert livingston"=>"rol",
"john stark"=>"jhs",
"chevalier de la luzerne"=>"cdl",
"william irvine"=>"wli",
"john rutledge"=>"jht",
"james clinton"=>"jac",
"james duane"=>"jad",
"christopher gadsden"=>"crg",
"francis marion"=>"frm",
"thomas pinckney"=>"top",
"peter horry"=>"peh",
"john matthews"=>"jhm",
"gilbert du motier lafayette"=>"laf",
"jean baptiste de vimeur"=>"cdr",
"charles pinckney"=>"ccp",
"william drayton"=>"wid",
"edward rutledge"=>"ewr",
"gouverneur morris"=>"gom",
"edmund pendleton"=>"edp",
"james lovell"=>"jal",
"rufus king"=>"ruk",
"william bingham"=>"wib",
"william wilberforce"=>"wwi",
"richard peters"=>"rcp",
"noah webster"=>"now",
"george otis"=>"geo",
"silas deane"=>"sid",
"james bowdoin"=>"jab",
"francis osborne"=>"fro",
"william short"=>"wis",
"francois deforgues"=>"fad",
"robert dinwiddie"=>"rod",
"martha washington"=>"mrd",
"mary washington"=>"mrw",
"janet livingston"=>"jnl",
"sarah dawson"=>"smd"
);

////// END DICTIONARIES//////////////////////////////////

	//Get values for SQL statement
	$author_tla 				= get_author_tla($file);
	$recipient_tla			= get_recipient_tla();
			
	$xfn_tags 				= get_person_relationship_tags();
	$xfn_tags_alters			= $xfn_tags['alter'];	
	
	$file_parts = explode(".",$file);
	$doc_id = $file_parts[0];	

	//////////////////////////////////////////////////////
	//write sql that removes existing proximity votes associated with this letter
	echo "delete from proximity where doc_id = '$doc_id';\n";
	//write proximity vote (correspondence)
	write_correspondence_proximity_results($author_tla,$recipient_tla,$file);
	//write proximity vote(s) (all mentions)
	write_xfn_proximity_results($author_tla,$xfn_tags_alters,$file);
	//////////////////////////////////////////////////////

	//Create a sql entry that counts as one vote for the ego's act of writing a letter to alter.
	function write_correspondence_proximity_results($ego_tla,$alter_tla,$file){
		if($alter_tla && $alter_tla !=''){
			//determine strength of correspondence vote.
			$proximity		= get_ego_proximity_with_alter($ego_tla,$alter_tla,'write');

			$file_parts = explode(".",$file);
			$doc_id = $file_parts[0];			

			//proximity entry sql column names
			//ego_tla | alter_tla | proximity_component | document_id | timestamp
			$vote_row = "INSERT INTO proximity VALUES ('$ego_tla','$alter_tla',$proximity,'$doc_id',Now());\n";
			echo"$vote_row";
		}
		return;
	}

	//Create a sql entry for each xfn mention ego makes of an alter.
	function write_xfn_proximity_results($ego_tla,$xfn_tags_alters,$file){
		for($i=0;$i < count($xfn_tags_alters);$i++){
			//todo: account for more than 1 get param
			$get_str_pieces 	= explode("=", $xfn_tags_alters[$i]);
			$alter_tla		= $get_str_pieces[1];
			if($ego_tla != $alter_tla){//dont count 'me' xfn references
				$proximity		= get_ego_proximity_with_alter($ego_tla,$alter_tla,'mention');

				$file_parts = explode(".",$file);
				$doc_id = $file_parts[0];			

				//proximity entry sql column names
				//ego_tla | alter_tla | proximity_component | document_id | timestamp

				$vote_row = "INSERT INTO proximity VALUES ('$ego_tla','$alter_tla',$proximity,'$doc_id',Now());\n";
				echo"$vote_row";
			}
		}
		
		return;
	}

	//Look up three letter acronym associated with the recipient
	function get_recipient_tla(){
		//echo"in get_recipient_tla";
		global $document;
		global $name_tla_lookup;
		$ret_tla = 'unknown';
		$pattern = '/<recipient first="(?<first>[\w ]*)" last="(?<last>[\w ]*)"[ type="individual"]*\/>/';
		preg_match($pattern, $document, $matches);
		$name = strtolower($matches['first'] . " " . $matches['last']);
		//echo"name= " . $name;
		
		$ret_tla = $name_tla_lookup[$name];
		return $ret_tla;
	}

	//Look up xfn relationship of ego to the recipeint (alter)
	//action is 'write' or 'mention' - written proximity votes count for more than mere mentions
	function get_ego_proximity_with_alter($ego_tla,$alter_tla,$action){
		global $relationship_matrix;
		$xfn_string = $relationship_matrix[$ego_tla][$alter_tla];
		$xfn_relationships = parse_xfn_relationship_types($xfn_string);
		//print_r($xfn_relationships);

		//determine closest relationship type
 		$strongest_type = get_closest_relationship_type($xfn_relationships);
		//echo"strongest_type = $strongest_type\n";		

		//determine strength of vote based on the strongest relationship tie
		switch($strongest_type){
			case 'family':
			case 'friendship':
			case 'romantic':
				$proximity_component = ($action == 'write')?1:2;
			break;

			case 'professional':
			case 'physical':
				$proximity_component = ($action == 'write')?2:3;
			break;

			case 'geographical':
				$proximity_component = ($action == 'write')?3:4;
			break;

			default:
				$proximity_component = 4;
			break;
		}

		return $proximity_component;
	}

////////////////////////
//determine closest relationship type
////////////////////////
function get_closest_relationship_type($related_person_array){
	//print_r($related_person_array);
	$family_relationship 		= ($related_person_array['family'] != '')?true:false;
	$friend_relationship 		= ($related_person_array['friendship'] == 'friend')?true:false; 
	$professional_relationship 	= ($related_person_array['professional'] != '' || $related_person_array['friendship'] == 'acquaintance')?true:false;
	$physical_relationship 		= ($related_person_array['physical'] != '')?true:false;

	$closest_relationship_type	= 'none'; 
	if($physical_relationship){
		$closest_relationship_type	= 'physical';
	}
	if($professional_relationship){
		$closest_relationship_type	= 'professional';
	}
	if($friend_relationship){
		$closest_relationship_type	= 'friendship';
	}
	if($family_relationship){
		$closest_relationship_type	= 'family';
	}
	//echo"$closest_relationship_type";
	return $closest_relationship_type;
}	


//Get three letter acronym associated with letter file
function get_author_tla($file){
		global $document;
		$pattern = '/<letter id="(?<tla>\w{3})(?<digit>\d*)">/'; //note use of named subpatterns! pretty cool
		preg_match($pattern, $document, $matches);
		$author_tla = $matches['tla'];

		//get tla from file name if no letter tag (legacy files)
		if(!$author_tla || $author_tla == ''){
			$author_tla = '';
			$pattern = "/[ltr|jrn|doc]{1}_(?<tla>[a-zA-Z]{2,4})\d{3,5}/";
			preg_match($pattern, $file, $matches);
			$author_tla = $matches['tla'];			
		}
		
		return $author_tla;
}

	//Get relationship anchor tags
	//<a href='/results.php?tla=alm' rel='colleague'>General McDougall</a>
	function get_person_relationship_tags(){
		global $document;
		//non-greedy retrieval of relationship anchor tags
		$pattern = '/<a href=.*(?<alter>tla=.*)[\'\"]{1} rel=[\'\"]{1}(?<relation>[friend|acquaintance|contact|adversary|met|co\-worker|colleague|child|parent|sibling|spouse|kin| ]*)[\'\"]{1}>(?<name>.*?)<\/a>/';		preg_match_all($pattern, $document, $matches); 
		return $matches;
	}

	//Organize relationship descriptive strings using xfn categories
	//note: 'adversary' is a modification on my part
	function parse_xfn_relationship_types($xfn_string){
		$xfn_categorized_relationship_strings = array('family'=>'','friendship'=>'','professional'=>'','romantic'=>'','physical'=>'','geographical'=>'','identity'=>'');

		//XFN relationship matrix
		$xfn_category_matrix = array(
			'friend'=>'friendship','acquaintance'=>'friendship','contact'=>'friendship','adversary'=>'friendship',
			'met'=>'physical',
			'co-worker'=>'professional','colleague'=>'professional',
			'co-resident'=>'geographical','neighbor'=>'geographical',
			'child'=>'family','parent'=>'family','sibling'=>'family','spouse'=>'family','kin'=>'family',
			'muse'=>'romantic','crush'=>'romantic','date'=>'romantic','sweetheart'=>'romantic',
			'me'=>'identity'
		);
		
		$relationships = explode(' ', $xfn_string);
		//echo"$xfn_string \n";
		foreach($relationships as $relation){
			$xfn_category = $xfn_category_matrix[$relation];
			$xfn_categorized_relationship_strings[$xfn_category] = $relation;
		}

		return $xfn_categorized_relationship_strings;
	}



?>

///////////// XFN Extraction (Multiple Files) /////////////////////////////
#!/usr/bin/env php 
<?php
	//Print xfn relationships in sql format for all letters in a given directory
	//currently the given directory is hardwired to the 'Workflow' directory
	
	$working_directory = $_ENV['FT_WORKFLOW_SMD_PATH'];
	//$working_directory = $_ENV['FT_DATA_PATH'];

	if($dir = opendir($working_directory)){
		while(($file = readdir($dir)) !== false){
			if($file != "." && $file != ".." && $file != ".DS_Store"){
				$handle = fopen($working_directory.$file, "r");
				$document = fread($handle, filesize($working_directory.$file));
				
				//Get values for SQL statement
				$author_tla 				= get_author_tla($file);
				$xfn_tags 				= get_person_relationship_tags();
				$xfn_tags_alters			= $xfn_tags['alter'];
				$xfn_tags_relation			= $xfn_tags['relation'];
				$xfn_tags_name			= $xfn_tags['name'];
	
				write_xfn_results($author_tla,$xfn_tags_alters,$xfn_tags_relation,$xfn_tags_name,$file);

				fclose ( $handle );
			}
		}
		closedir($dir);
	}


/////////////////////
//METHODS////////////
/////////////////////

	//
	function write_xfn_results($author_tla,$xfn_tags_alters,$xfn_tags_relation,$xfn_tags_name,$file){
		for($i=0;$i < count($xfn_tags_alters);$i++){
			//get alter id string
			//todo: account for more than 1 get param
			$get_str_pieces 	= explode("=", $xfn_tags_alters[$i]);
			$alter_id			= $get_str_pieces[1];
			$xfn_relationships = parse_xfn_relationship_types($xfn_tags_relation[$i]);//print_r($xfn_relationships);
			
			//concat sql string
			//xfn entry sql column names
			//ego_tla | alter_tla | alter_name | xfn_friendship | xfn_physical | xfn_professional | xfn_geographical | xfn_family | xfn_romantic | xfn_identity | document_id
			$xfn_row = "INSERT INTO relationships VALUES ('$author_tla','$alter_id','" . htmlspecialchars(trim($xfn_tags_name[$i]),ENT_QUOTES) . "','" . $xfn_relationships['friendship'] . "','" . $xfn_relationships['physical'] . "','" . $xfn_relationships['professional'] . "','" . $xfn_relationships['geographical'] . "','" . $xfn_relationships['family'] . "','" . $xfn_relationships['romantic'] . "','" . $xfn_relationships['identity'] . "','$file');\n";
			echo"$xfn_row";
		}
		
		return;
	}

	//Get three letter acronym associated with letter file
	function get_author_tla($file){
		global $document;
		$pattern = '/<letter id="(?<tla>\w{3})(?<digit>\d*)">/'; //note use of named subpatterns! pretty cool
		preg_match($pattern, $document, $matches);
		$author_tla = $matches['tla'];

		//get tla from file name if no letter tag (legacy files)
		if(!$author_tla || $author_tla == ''){
			$author_tla = '';
			$pattern = "/[ltr|jrn|doc]{1}_(?<tla>[a-zA-Z]{2,4})\d{3,5}/";
			preg_match($pattern, $file, $matches);
			$author_tla = $matches['tla'];			
		}
		
		return $author_tla;
	}

	//Get relationship anchor tags
	//<a href='/results.php?tla=alm' rel='colleague'>General McDougall</a>
	function get_person_relationship_tags(){
		global $document;
		//non-greedy retrieval of relationship anchor tags
		$pattern = '/<a href=.*(?<alter>tla=.*)[\'\"]{1} rel=[\'\"]{1}(?<relation>[friend|acquaintance|contact|met|co\-worker|colleague|child|parent|sibling|spouse|kin|me| ]*)[\'\"]{1}>(?<name>.*?)<\/a>/';		preg_match_all($pattern, $document, $matches); 
		return $matches;
	}

	//Organize relationship descriptive strings using xfn categories
	//note: 'adversary' is a modification on my part
	function parse_xfn_relationship_types($xfn_string){
		$xfn_categorized_relationship_strings = array('friend'=>'','physical'=>'','professional'=>'','geographical'=>'','family'=>'','romantic'=>'','identity'=>'');

		//XFN relationship matrix
		$xfn_category_matrix = array(
			'friend'=>'friendship','acquaintance'=>'friendship','contact'=>'friendship',
			'met'=>'physical',
			'co-worker'=>'professional','colleague'=>'professional',
			'co-resident'=>'geographical','neighbor'=>'geographical',
			'child'=>'family','parent'=>'family','sibling'=>'family','spouse'=>'family','kin'=>'family',
			'muse'=>'romantic','crush'=>'romantic','date'=>'romantic','sweetheart'=>'romantic',
			'me'=>'identity'
		);
		
		$relationships = explode(' ', $xfn_string);
		foreach($relationships as $relation){
			$xfn_category = $xfn_category_matrix[$relation];
			$xfn_categorized_relationship_strings[$xfn_category] = $relation;
		}

		return $xfn_categorized_relationship_strings;
	}

?>
///////////// XFN Extraction (Selected File) /////////////////////////////
#!/usr/bin/env php 
<?php
	$selected_file_path = $_ENV['TM_SELECTED_FILE'];
	$file_path_parts = explode('/',$selected_file_path);
	$file = array_pop($file_path_parts);
	

	$document = file_get_contents('php://stdin');

	//Get values for SQL statement
	$author_tla 				= get_author_tla($file);
	$xfn_tags 				= get_person_relationship_tags();
	$xfn_tags_alters			= $xfn_tags['alter'];
	$xfn_tags_relation			= $xfn_tags['relation'];
	$xfn_tags_name			= $xfn_tags['name'];
	
	//remove existing relationships for this letter
	$file_parts = explode(".",$file);
	$doc_id = $file_parts[0];			
	echo "delete from relationships where doc_id = '$doc_id';\n";

	//write new relationships for this letter
	write_xfn_results($author_tla,$xfn_tags_alters,$xfn_tags_relation,$xfn_tags_name,$file);


	//
	function write_xfn_results($author_tla,$xfn_tags_alters,$xfn_tags_relation,$xfn_tags_name,$file){
		for($i=0;$i < count($xfn_tags_alters);$i++){
			//get alter id string
			//todo: account for more than 1 get param
			$get_str_pieces 	= explode("=", $xfn_tags_alters[$i]);
			$alter_id			= $get_str_pieces[1];
			$xfn_relationships = parse_xfn_relationship_types($xfn_tags_relation[$i]);//print_r($xfn_relationships);

			$file_parts = explode(".",$file);
			$doc_id = $file_parts[0];			

			//concat sql string
			//xfn entry sql column names
			//ego_tla | alter_tla | alter_name | xfn_friendship | xfn_physical | xfn_professional | xfn_geographical | xfn_family | xfn_romantic | xfn_identity | document_id
			$xfn_row = "INSERT INTO relationships VALUES ('$author_tla','$alter_id','" . htmlspecialchars(trim($xfn_tags_name[$i]),ENT_QUOTES) . "','" . $xfn_relationships['friendship'] . "','" . $xfn_relationships['physical'] . "','" . $xfn_relationships['professional'] . "','" . $xfn_relationships['geographical'] . "','" . $xfn_relationships['family'] . "','" . $xfn_relationships['romantic'] . "','" . $xfn_relationships['identity'] . "','$doc_id',Now());\n";
			echo"$xfn_row";
		}
		
		return;
	}

	//Get three letter acronym associated with letter file
	function get_author_tla($file){
		global $document;
		$pattern = '/<letter id="(?<tla>\w{3})(?<digit>\d*)">/'; //note use of named subpatterns! pretty cool
		preg_match($pattern, $document, $matches);
		$author_tla = $matches['tla'];

		//get tla from file name if no letter tag (legacy files)
		if(!$author_tla || $author_tla == ''){
			$author_tla = '';
			$pattern = "/[ltr|jrn|doc]{1}_(?<tla>[a-zA-Z]{2,4})\d{3,5}/";
			preg_match($pattern, $file, $matches);
			$author_tla = $matches['tla'];			
		}
		
		return $author_tla;
	}

	//Get relationship anchor tags
	//<a href='/results.php?tla=alm' rel='colleague'>General McDougall</a>
	function get_person_relationship_tags(){
		global $document;
		//non-greedy retrieval of relationship anchor tags
		$pattern = '/<a href=.*(?<alter>tla=.*)[\'\"]{1} rel=[\'\"]{1}(?<relation>[friend|acquaintance|contact|met|co\-worker|colleague|child|parent|sibling|spouse|kin|me| ]*)[\'\"]{1}>(?<name>.*?)<\/a>/';		preg_match_all($pattern, $document, $matches); 
		return $matches;
	}

	//Organize relationship descriptive strings using xfn categories
	//note: 'adversary' is a modification on my part
	function parse_xfn_relationship_types($xfn_string){
		$xfn_categorized_relationship_strings = array('friend'=>'','physical'=>'','professional'=>'','geographical'=>'','family'=>'','romantic'=>'','identity'=>'');

		//XFN relationship matrix
		$xfn_category_matrix = array(
			'friend'=>'friendship','acquaintance'=>'friendship','contact'=>'friendship',
			'met'=>'physical',
			'co-worker'=>'professional','colleague'=>'professional',
			'co-resident'=>'geographical','neighbor'=>'geographical',
			'child'=>'family','parent'=>'family','sibling'=>'family','spouse'=>'family','kin'=>'family',
			'muse'=>'romantic','crush'=>'romantic','date'=>'romantic','sweetheart'=>'romantic',
			'me'=>'identity'
		);
		
		$relationships = explode(' ', $xfn_string);
		foreach($relationships as $relation){
			$xfn_category = $xfn_category_matrix[$relation];
			$xfn_categorized_relationship_strings[$xfn_category] = $relation;
		}

		return $xfn_categorized_relationship_strings;
	}

?>
//////////////////////////////////////////////////////////
#!/usr/bin/env php 
	<?php
		$filename = $_ENV['TM_FILENAME'];
		$document = file_get_contents('php://stdin');


		echo preg_replace_callback("/\d{4}/","linkify_year",$document);

		//the preg replace callback 
		function linkify_year($matches){
		  $ret_val = "<a href='/results.php?year=" . strtolower($matches[0]) . "'>" . $matches[0] . "</a>"; 
		  return $ret_val;
		}

	?>
	
//////////// Linkify Selected City /////////////////////
#!/usr/bin/env php 
<?php
		$filename = $_ENV['TM_FILENAME'];
		$document = file_get_contents('php://stdin');
		
		echo "<a href='/results.php?city=". strtolower($document) ."' rel='city origin'>" . $document . "</a>";
?>

//////////// Linkify city /////////////////////
		#!/usr/bin/env php 
			<?php
				$filename = $_ENV['TM_FILENAME'];
				$document = file_get_contents('php://stdin');

				$city_names = array('/Akron/', '/Albany/', '/Alexandria/', '/Annapolis/', '/Arlington/', '/Atlanta/', '/Augusta/', '/Baltimore/', '/Baton Rouge/', '/Bennington/', '/Bethlehem/', '/Boston/', '/Braintree/','/Cambridge/','/Carlisle/', '/Charleston/', '/Charlottesville/', '/Cincinnati/', '/Cleveland/', '/Columbus/', '/Concord/', '/Elizabethtown/', '/Fayetteville/','/Fishkill/','/Fort Pitt/','/Fort Edward/', '/Frankfort/', '/Fredericksburg/', '/Georgetown/','/Hartford/','/Halifax/','/Kingston/', '/Lexington/', '/Linwood/', '/Litchfield/', '/Louisville/', '/Memphis/', '/Monticello/', '/Montpelier/', '/Morristown/', '/Mount Vernon/', '/Nashville/', '/Newark/', '/New Orleans/', '/New York/', '/Newburyport/', '/Oxford/', '/Pawlet/','/Peekskill/', '/Philadelphia/', '/Pittsburgh/', '/Plymouth/','/Pompton/', '/Poughkeepsie/', '/Princeton/', '/Providence/', '/Quincy/', '/Richmond/', '/Sacramento City/', '/Saratoga/', '/Savannah/', '/Syracuse/', '/Trenton/', '/Troy/', '/Utica/', '/Valley Forge/', '/Vicksburg/', '/Mount Washington/', '/Watertown/', '/West Point/', '/Williamsburg/', '/York Town/','/Middlebrook/','/Ticonderoga/','/Lebanon/','/Montreal/','/La Chine/','/Chamblee/','/Montreal/','/Quebec/','/Portsmouth/','/Sorel/','/Chamblee/','/Fort Lee/','/Isle-aux-Noix/','/Skenesborough/');

				echo preg_replace_callback($city_names,"linkify_city",$document);

				//the preg replace callback 
				function linkify_city($matches){
				  $ret_val = "<a href='/results.php?city=" . strtolower($matches[0]) . "' rel='city'>" . ucwords($matches[0]) . "</a>"; 
				  return $ret_val;
				}

			?>
///////////////////////////////////////////
#!/usr/bin/env php 
<?php
						$filename = $_ENV['TM_FILENAME'];
						$document = file_get_contents('php://stdin');

						$opening_tag_pattern = '/\n\/\/\/\/\/\/\/\/\/\/\n\n/';
						$opening_tag_replace = '/\n\/\/\/\/\/\/\/\/\/\/\n<p>\n/';

						$closing_tag_pattern = '/\n\n\/\/\/\/\/\/\/\/\/\/\n/';
						$closing_tag_replace = '/\n</p>\n//////////\n/';

						$inner_tag_pattern = '/\n\n/';
						$inner_tag_replace = '/\n</p><p>\n/';

						//echo preg_replace($opening_target_pattern,$opening_target_replace,$document);
						//echo preg_replace($closing_target_pattern,$closing_target_replace,$document);
						echo preg_replace($inner_tag_pattern,$inner_tag_replace,$document);

?>

	#!/usr/bin/env php 
	<?php
		$filename = $_ENV['TM_FILENAME'];

		$current_letter_number = 0;
		$document = file_get_contents('php://stdin');

		$letter_start_number = intval(get_letter_start_number());
		$letters_tla = get_letter_tla();

		echo preg_replace_callback("/<!--BEGIN_LETTER-->/","write_letter_markers",$document);

		function get_letter_start_number(){
			global $document;
			$pattern = "/--LETTER-START-NUMBER--\d{4}/";	
			preg_match($pattern, $document, $matches);
			preg_match("/\d{4}/",$matches[0],$matches);
			return $matches[0];
		}

		//Get three letter acronym associated with letter file
		function get_letter_tla(){
			global $document;
			$pattern = "/--LETTER-TLA--\w{3}/";	
			preg_match($pattern, $document, $matches);
			$tla = substr($matches[0], -3);
			return $tla;
		}

		function write_letter_markers($matches){
		  global $letter_start_number;
		  global $letters_tla;
		  global $current_letter_number;
		  $id_number = $letter_start_number + $current_letter_number;
		  $ret_val = '</letter><letter id="' . $letters_tla . $id_number . '">';
		  $current_letter_number++;
		  return $ret_val;
		}



	?>

		#!/usr/bin/env php 
		<?php
		$filename = $_ENV['TM_FILENAME'];
		$document = file_get_contents('php://stdin');

		//$fragment_suffix = array();//save for testing



		$fragment_suffix = array('/ \nent /','/ \ndy, /','/ \nble, /','/ \ntection /','/ \ngoons. /','/ \ntively /','/ \ntained /','/ \nteer. /','/ \nracters /','/ \ncuate /','/ \nlivan /','/ \nbles; /','/ \nry /','/ \nual /','/ \nvenge /','/ \ner, /','/ \nmanity /','/ \nferior /','/ \nvania /','/ \nrected /','/ \nmained /','/ \nery, /','/ \nspective /','/ \nbassadors, /','/ \nsioner /','/ \npression /','/ \ncellency /','/ \nintendence /','/ \nmit, /','/ \ndesty /','/ \nturally /','/ \ngine, /','/ \nsist /','/ \nbute /','/ \nvernment. /','/ \nputy /','/ \nvours /','/ \ncellency /','/ \ncouraged /','/ \ncurrence /','/ \ngress, /','/ \ngia, /','/ \ngia /','/ \ntiments /','/ \ntality /','/ \nlieve /','/ \npectations /','/ \ntia, /','/ \nsaries; /','/ \nficers /','/ \nneral /','/ \ndelphia, /','/ \nsant /','/ \nvisable /','/ \nciency /','/ \nsels /','/ \nneral. /','/ \nrior /','/ \nnate. /','/ \nmatum, /','/ \nlieving /','/ \nlicy /','/ \nder. /','/ \ncular /','/ \ntained. /','/ \nversal /','/ \ngings, /','/ \nss. /','/ \nnoitring /','/ \nvileges /','/ \ngize /','/ \ntutely /','/ \nferent /','/ \ndise, /','/ \nlowance, /','/ \ndence /','/ \nner /','/ \nsition; /','/ \ndiness, /','/ \nfluence. /','/ \ncumstances, /','/ \nceive /','/ \nnah, /','/ \ncient, /','/ \ncuted /','/ \nceedingly /','/ \nnity /','/ \nsengers; /','/ \nsylvania, /','/ \nmination, /','/ \nceedingly, /','/ \n /','/ \nfidence, /','/ \nmittee /','/ \nnah /','/ \nversation. /','/ \nceed, /','/ \nbany, /','/ \ntreme /','/ \ncy /','/ \nlity, /','/ \nrica /','/ \nconcilable. /','/ \nlution. /','/ \nginia /','/ \nflecting, /','/ \nfrage, /','/ \nrily. /','/ \ndiately, /','/ \nsioning, /','/ \nquent, /','/ \ntation /','/ \nriety, /','/ \nverned, /','/ \nbly. /','/ \ndential /','/ \nnated. /','/ \ncious /','/ \nest /','/ \ningly /','/ \ning /','/ \ned /','/ \ntle /','/ \ncerely /','/ \ntions /','/ \ntion /','/ \nmery /','/ \ntillery /','/ \nnition /','/ \nsume /','/ \nther /','/ \nvolve /','/ \nsiderable /','/ \nite /','/ \ndency /','/ \nral /','/ \nlency /','/ \nings /','/ \nvited /','/ \nture /','/ \nnental /','/ \nter /','/ \ntered /','/ \nvised /','/ \ntinental /','/ \nsibly /','/ \nstruction /','/ \nlin /','/ \nsive /','/ \nprehensive /','/ \nhensive /','/ \nstant /','/ \nple /','/ \nceived /','/ \nlect /','/ \nveyed /','/ \nsor /','/ \nsumption /','/ \nga /','/ \nrassed /','/ \nportance /','/ \nveniences /','/ \ntrary /','/ \nbation /','/ \nment /','/ \nswered /','/ \ndition /','/ \nlected /','/ \npected /','/ \neral /','/ \nsary /','/ \nquence /','/ \ntution /','/ \ngomery /','/ \nlitia /','/ \nvenient /','/ \nually /','/ \nern /','/ \nfiscated /','/ \nterday /','/ \ntainty /','/ \nsistance /','/ \nnished /','/ \njected /','/ \nmon /','/ \ncers /','/ \nquired /','/ \nsoners /','/ \nculous /','/ \ntance /','/ \nficing /','/ \nmendous /','/ \nous /','/ \nculties /','/ \nrassments /','/ \nments /','/ \nment /','/ \ncellency /','/ \ntermined /','/ \ntermine /','/ \nrison /','/ \ngence /','/ \ngards /','/ \nlarly /','/ \nmentably /','/ \ntunity /','/ \nfect /','/ \nation /','/ \ngether /','/ \ntish /','/ \nnel /','/ \nder /','/ \ncluded /','/ \ntia /','/ \ncember /','/ \nquainted /','/ \nly /','/ \ntinied /','/ \nately /','/ \ncient /','/ \ntention /','/ \nnagement /','/ \ncide /','/ \nver /','/ \nnam /','/ \ntive /','/ \nvernor /','/ \nceed /','/ \nberately /','/ \nfident /','/ \ncuse /','/ \ncuse /','/ \ntinued /','/ \nphans /','/ \nriety /','/ \ntude /','/ \ndom /','/ \nspect, /','/ \ner /','/ \ners /','/ \nsion /','/ \nness /','/ \nverned /','/ \ntween /','/ \nspondent /','/ \nneas /','/ \nvor /','/ \ntached /','/ \ndient /','/ \nmise /','/ \ndezvous /','/ \nsisted /','/ \ners, /','/ \nbuted /','/ \nclination /','/ \necutive /','/ \nbly, /','/ \ncruiting /','/ \ncessfully /','/ \ntinent, /','/ \nspecting /','/ \ntity /','/ \nvided /','/ \nbers /','/ \nber /','/ \ndiers /','/ \npearances /','/ \nsetts, /','/ \nlar /','/ \nneral /','/ \ndiately /','/ \ncess /','/ \nportunity /','/ \nfer /','/ \nceiving /','/ \ncoln /','/ \nant /','/ \ndelphia /','/ \nrous /','/ \nmainder /','/ \nceeded /','/ \npect /','/ \nsels, /','/ \nderations, /','/ \nder, /','/ \nsachusetts /','/ \ntember, /','/ \ncation, /','/ \nverance /','/ \ntues, /','/ \nduced, /','/ \nive /','/ \nject /','/ \ncipally /','/ \npedition, /','/ \nquer /','/ \nger. /','/ \ntage /','/ \nquent /','/ \ncumstances /','/ \nfensive /','/ \nlorable /','/ \nvey /','/ \n /','/ \nfeit /','/ \ntary /','/ \nciples /','/ \npretence /','/ \nnesses /','/ \ngress /','/ \nience, /','/ \nguished, /','/ \nance /','/ \ngress /','/ \nledging /','/ \nperience /','/ \ntually /','/ \nbably /','/ \ncouragement /','/ \ntention, /','/ \nvorite /','/ \ncially /','/ \nities /','/ \nsioners, /','/ \nble /','/ \ncle, /','/ \nity /','/ \nning, /','/ \nthority /','/ \nvate /','/ \nsioners /','/ \ncere /','/ \nished /','/ \nbly /','/ \nly, /','/ \ngining /','/ \nspect /','/ \nnagement, /','/ \nately. /','/ \ntinied, /','/ \ncember, /','/ \nquainting /','/ \nlish /','/ \npices /','/ \nsity /','/ \nzard /','/ \nces /','/ \nnately /','/ \nblish /','/ \ntal /','/ \nicy /','/ \nnesty /','/ \nsident /','/ \nduce /','/ \nardly /','/ \nceedings /','/ \nsuaded /','/ \nievel /','/ \nrily /','/ \ncurred /','/ \nishment /','/ \nfrage /','/ \nrused /','/ \nflecting /','/ \npressly /','/ \nlution /','/ \nsidious /','/ \nconcilable /','/ \nceivel /','/ \nlity /','/ \naded /','/ \njor /','/ \ntial /','/ \npaign /','/ \nderable /','/ \nance, /','/ \nmities /','/ \nviduals /','/ \ntaliation, /','/ \nduced /','/ \nlery, /','/ \nssively /','/ \ngons /','/ \ncumstance /','/ \nvered /','/ \ngencies /','/ \nges /','/ \ndians /','/ \nmit /','/ \nperty /','/ \nswer /','/ \nnada. /','/ \ntinue /','/ \nratives /','/ \nphy /','/ \nverted /','/ \ntient /','/ \ntody, /','/ \npenses, /','/ \ncally /','/ \ntely, /','/ \nflects /','/ \njecture /','/ \ngineer /','/ \nrably /','/ \ntinent /','/ \nswer /','/ \nneers. /','/ \nity, /','/ \nspectable /','/ \ncurity /','/ \ndiate /','/ \nlature /','/ \ncinity. /','/ \nlators, /','/ \nance. /','/ \nily /','/ \nviction /','/ \nvention, /','/ \nishment, /','/ \nrections /','/ \nmity /','/ \nlistment, /','/ \nciencies, /','/ \npect, /','/ \nsitions /','/ \ncised, /','/ \nercised /','/ \nvided, /','/ \nnate /','/ \nvanced /','/ \nnada /','/ \nnicated /','/ \ntice /','/ \ntelligence /','/ \nsonal /','/ \ncuted, /','/ \ncy, /','/ \ndium. /','/ \nlation /','/ \ntilio /','/ \nly, /','/ \nguid, /','/ \nvernments /','/ \nence /','/ \nclined /','/ \nbility /','/ \ndeavour /','/ \nnesty. /','/ \nrative /','/ \ndeavoured /','/ \nbarrassments /','/ \ntain /','/ \nnesty; /','/ \ntained, /','/ \ntre /','/ \ndeavor /','/ \nvidence /','/ \ntating /','/ \nbably, /','/ \nlatures /','/ \nfeebling /','/ \nducing /','/ \nrible /','/ \nsiegers /','/ \npedite /','/ \nbourhood /','/ \nlem /','/ \nsachusetts /','/ \njourned; /','/ \nren, /','/ \nary, /','/ \npeating /','/ \nlel, /','/ \nrupted /','/ \ncuted. /','/ \nperly /','/ \nness. /','/ \ndor, /','/ \nspects, /','/ \nputation /','/ \ntaining /','/ \nfess, /','/ \nty, /','/ \ncies /','/ \ntem, /','/ \nduction /','/ \nquaintance /','/ \nlonel /','/ \ntral, /','/ \ndore /','/ \nzines /','/ \nvestiture /','/ \nject. /','/ \npriety /','/ \nfered /','/ \ncept /','/ \nceipt /','/ \nspicuity /','/ \nfidence /','/ \nvages, /','/ \nchor /','/ \nleys /','/ \ndians. /','/ \nfascines /','/ \ncates. /','/ \nprehending /','/ \nmination /','/ \npable /','/ \nans /','/ \nsylvania /','/ \nsisting /','/ \nsistently /','/ \nsengers /','/ \nfluence /','/ \nincide /','/ \njesty /','/ \ndered /','/ \nquiring /','/ \nnia, /','/ \npenses /','/ \nnent, /','/ \nploded /','/ \ndelphia /','/ \nbles /','/ \nmedy /','/ \npenses /','/ \ncitude /','/ \nmissary /','/ \ncertaining /','/ \nenced /','/ \nfluence /','/ \ndiness /','/ \nrity /','/ \ntely /','/ \nets, /','/ \nlative /','/ \nginia, /','/ \nvouring /','/ \ncursion /','/ \nmensions /','/ \nssive /','/ \nsition /','/ \nvene /','/ \ngular /','/ \nligence, /','/ \nlough /','/ \ncipal /','/ \ngerous /','/ \ntiguous /','/ \nsals /','/ \nployed /','/ \nously /','/ \nsaries /');


		echo preg_replace_callback($fragment_suffix,"rejoin_word_fragments",$document);

		//the preg replace callback 
		function rejoin_word_fragments($matches){
		$ret_val = $matches[0]; 
		$ret_val = substr($ret_val,2);
		return $ret_val;
		}

?>

////////////////////////////MAKE SQL/////////////////

#!/usr/bin/env php 
<?php
	$filename = $_ENV['TM_FILENAME'];

	$current_letter_number = 0;
	$document = file_get_contents('php://stdin');

	//Grab Config Values
	$document_type = get_document_type();
	$doc_long_label = get_doc_long_label($document_type);
	$document_tla = get_letter_tla();
	$author_first = get_author_first();
	$author_last = get_author_last();
	$doc_source = get_doc_source();

	$sql_file = open_file($document_tla);
	$letters = get_letters();
	
	write_sql_file($letters,$sql_file,$document_type,$author_first,$author_last,$doc_source,$doc_long_label);
	//fclose($sql_file);

	//
	function open_file($document_tla){
		//$file_name = "/Users/Ken/Desktop/Hans/Familytales/WIP/Workflow/" . $document_tla . ".sql";
		//$fileHandle = fopen($file_name, 'x+') OR die ("Can't open file\n");
		$fileHandle = null;
		return $fileHandle;
	}

	//
	function get_letters(){
		global $document;
		$pattern = '/<letter id="\w{3}\d*">\n(.*\n)*?<\/letter>/';
		preg_match_all($pattern, $document, $matches);
		return $matches[0];
	}

	//Save each letter to a separate file using the id as part of file name
	function write_sql_file($letters,$sql_file,$document_type,$author_first,$author_last,$doc_source,$doc_long_label){
		//global $letters_tla;
		foreach($letters as $letter){
		$pattern = '/<letter id="\w{3}\d*">/';
		preg_match($pattern, $letter, $matches);
		//print_r($matches[0]);
		preg_match('/\=\"\w{3}\d{4}/',$matches[0],$matches);
		$doc_id = $document_type . '_' . substr($matches[0],2);
		$doc_file = $doc_id . '.txt';

		//find origin date info
		$doc_origin_year 		= get_doc_origin_year($letter);
		$doc_origin_month 		= get_doc_origin_month($letter);
		$doc_origin_day 		= get_doc_origin_day($letter);
		$doc_origin_city 		= get_doc_origin_city($letter);
		$recipient_type		= get_recipient_type($letter);		$recipient_type_name	= ($recipient_type != 'individual') ? get_recipient_type_name($letter) : '';
		$recipient_first 		= ($recipient_type == 'individual') ? get_recipient_first_name($letter) : '';
		$recipient_last 		= ($recipient_type == 'individual') ? get_recipient_last_name($letter) : '';
		$recipient_pedigree	= ($recipient_type == 'individual') ? get_recipient_pedigree($letter) : '';

	
		$sql_row = "INSERT INTO media VALUES ('$doc_id','$doc_long_label','$doc_origin_year-$doc_origin_month-$doc_origin_day','$doc_origin_city','STATE','US','$author_first','$author_last','','$recipient_first','$recipient_last','$recipient_pedigree','$recipient_type','$recipient_type_name','description','$doc_file','hans@broughdesign.com',NULL,Now(),NULL,'$doc_source');\n";
		echo"$sql_row";
		//$result = fwrite ($sql_file, $sql_row);

		}
	return;
	}

	//Get the document type ie letter, journal, poem etc
	function get_document_type(){
		global $document;
		$pattern = "/--DOCUMENT-TYPE--\w{3}/";
		preg_match($pattern, $document, $matches);
		$type = substr($matches[0], -3);
		return $type;
	}

	//Get three letter acronym associated with letter file
	function get_letter_tla(){
		global $document;
		$pattern = "/--LETTER-TLA--\w{3}/";	
		preg_match($pattern, $document, $matches);
		$tla = substr($matches[0], -3);
		return $tla;
	}

	//Get author first name
	function get_author_first(){
		global $document;
		$pattern = "/--DOC-AUTHOR-FIRST--[\w\.\- ]*/";	
		preg_match($pattern, $document, $matches);
		$author_first = substr($matches[0], 20);
		return $author_first;
	}

	//Get author last name
	function get_author_last(){
		global $document;
		$pattern = "/--DOC-AUTHOR-LAST--[\w\.\- ]*/";	
		preg_match($pattern, $document, $matches);
		$author_last = substr($matches[0], 19);
		return $author_last;
	}

	//Get doc source
	function get_doc_source(){
		global $document;
		$pattern = "/--DOC-SOURCE--[a-zA-Z ;.,0-9]*/";	
		preg_match($pattern, $document, $matches);
		$doc_source = substr($matches[0], 14);
		return $doc_source;
	}

	//Get full length document type
	function get_doc_long_label($doc_short_label){
		$label_map = array('ltr'=>'letter','jrn'=>'journal','pom'=>'poem');
		$ret_type = $label_map[$doc_short_label];
		$ret_type = (!$ret_type) ? 'letter' : $ret_type;
		return $ret_type;
	}

	//Find year of origin for a given document
	function get_doc_origin_year($letter){
		$ret_year = '0000';

		$pattern = '/<a .* rel="origin">\d{2,4}<\/a>/';
		preg_match_all($pattern, $letter, $matches);
		preg_match('/\d{4}/',$matches[0][0],$matches);//the link string
		$ret_year = ($matches[0] && $matches[0] != '') ? $matches[0] : $ret_year;

		return $ret_year;
	}

	//Find month of origin for a given document
	function get_doc_origin_month($letter){
		$ret_month = '00';

		$pattern = '/<a rel="month origin".*?>.*?<\/a>/';//non-greedy retrieval of month anchor
		preg_match_all($pattern, $letter, $matches);
		preg_match('/value=\"\d{1,2}\"/',$matches[0][0],$matches);//get the value string
		preg_match('/\d{1,2}/',$matches[0],$matches);//get numeric value itself from value attribute
		$ret_month = ($matches[0] && $matches[0] != '') ? $matches[0] : $ret_month;
		$ret_month = (strlen($ret_month) == 1) ? '0' . $ret_month: $ret_month;

		return $ret_month;
	}

	//Find day of origin for a given document
	function get_doc_origin_day($letter){
		$ret_day = '00';

		$pattern = '/<a rel="day origin".*?>.*?<\/a>/';//non-greedy retrieval of day anchor
		preg_match_all($pattern, $letter, $matches);
		preg_match('/value=\"\d{1,2}\"/',$matches[0][0],$matches);//get the value string
		preg_match('/\d{1,2}/',$matches[0],$matches);//get numeric value itself from value attribute
		$ret_day = ($matches[0] && $matches[0] != '') ? $matches[0] : $ret_day;
		$ret_day = (strlen($ret_day) == 1) ? '0' . $ret_day: $ret_day;

		return $ret_day;
	}

	//Find city of origin for a given document
	function get_doc_origin_city($letter){
		$ret_val = 'city';

		$pattern = '/<a .* rel=["\']city origin["\']>.*?<\/a>/';//non-greedy retrieval of city anchor
		preg_match_all($pattern, $letter, $matches);
		preg_match('/(?<=city=)[a-zA-Z ]*/',$matches[0][0],$matches);//get the value string with positive lookbehind
		//print_r($matches[0]);
		$ret_val = ($matches[0] && $matches[0] != '') ? $matches[0] : $ret_val;
		$ret_val = ucwords($ret_val);
		return $ret_val;
	}	

   	//Find recipient FIRST name value
	function get_recipient_first_name($letter){
		$ret_val = 'RECIPIENT FIRST';
		
		$pattern = '/<recipient .*?\/>/';
		preg_match_all($pattern, $letter, $matches);
		preg_match('/(?<=first=")[a-zA-Z ]*/',$matches[0][0],$matches);//get the first name attribute
		$ret_val = ($matches[0]) ? $matches[0] : $ret_val;
		$ret_val = ucwords($ret_val);
		return $ret_val;
	}

   	//Find recipient LAST name value
	function get_recipient_last_name($letter){
		$ret_val = 'RECIPIENT LAST';
		
		$pattern = '/<recipient .*?\/>/';
		preg_match_all($pattern, $letter, $matches);
		preg_match('/(?<=last=")[a-zA-Z ]*/',$matches[0][0],$matches);//get the first name attribute
		$ret_val = ($matches[0]) ? $matches[0] : $ret_val;
		$ret_val = ucwords($ret_val);
		return $ret_val;
	}

   	//Find recipient Pedigree value
	function get_recipient_pedigree($letter){
		$ret_val = '';
		$pedigree_lookup = array('senior'=>'sr','sr.'=>'sr','junior'=>'jr','jr.'=>'jr','sr'=>'sr','jr'=>'jr');		
		$pattern = '/<recipient .*?\/>/';
		preg_match_all($pattern, $letter, $matches);
		preg_match('/(?<=pedigree=")[a-zA-Z ]*/',$matches[0][0],$matches);
		$lc_match = strtolower($matches[0]);
		$ret_val = ($lc_match) ? $pedigree_lookup[$lc_match] : $ret_val;
		$ret_val = ucwords($ret_val);
		return $ret_val;
	}

   	//Find recipient type [individual,group,public,position]
	function get_recipient_type($letter){
		$ret_val = 'individual';
			
		$pattern = '/<recipient .*?\/>/';
		preg_match_all($pattern, $letter, $matches);
		preg_match('/(?<=type=")[a-zA-Z ]*/',$matches[0][0],$matches);
		$lc_match = strtolower($matches[0]);
		$ret_val = ($lc_match) ? $lc_match : $ret_val;
		return $ret_val;
	}

   	//Find name of recipient type [individual,group,public,position]
	function get_recipient_type_name($letter){
		$ret_val = '';
			
		$pattern = '/<recipient .*?\/>/';
		preg_match_all($pattern, $letter, $matches);
		preg_match('/(?<=name=")[a-zA-Z ]*/',$matches[0][0],$matches);
		$lc_match = strtolower($matches[0]);
		$ret_val = ($lc_match) ? $lc_match : $ret_val;
		$ret_val = ucwords($ret_val);
		return $ret_val;
	}
?>
/////////////////////////////

#!/usr/bin/env php 
<?php
	$filename = $_ENV['TM_FILENAME'];

	$current_letter_number = 0;
	$document = file_get_contents('php://stdin');

	$document_type = get_document_type();
	$letters_tla = get_letter_tla();
	$letters = get_letter();
	write_letter_file($letters,$document_type);

	function get_letter(){
		global $document;
		$pattern = '/<letter id="\w{3}\d*">\n(.*\n)*?<\/letter>/';
		preg_match_all($pattern, $document, $matches);
		return $matches[0];
	}
	
	//Save each letter to a separate file using the id as part of file name
	function write_letter_file($letters,$document_type){
		//global $letters_tla;
		foreach($letters as $letter){
			$pattern = '/<letter id="\w{3}\d*">/';
			preg_match($pattern, $letter, $matches);
			//print_r($matches[0]);
			preg_match('/\=\"\w{3}\d{4}/',$matches[0],$matches);
			$doc_id = substr($matches[0],2);
			//echo"$doc_id";
			$file_name = "/Users/Ken/Desktop/Hans/Familytales/WIP/Workflow/" . $document_type . "_" . $doc_id . ".txt";
			$fileHandle = fopen($file_name, 'x') OR die ("Can't open file\n");
	
			$result = fwrite ($fileHandle, $letter);

			fclose($fileHandle);
		}
		return;
	}
	
	//Get the document type ie letter, journal, poem etc
	function get_document_type(){
		global $document;
		$pattern = "/--DOCUMENT-TYPE--\w{3}/";
		preg_match($pattern, $document, $matches);
		$type = substr($matches[0], -3);
		return $type;
	}

	//Get three letter acronym associated with letter file
	function get_letter_tla(){
		global $document;
		$pattern = "/--LETTER-TLA--\w{3}/";	
		preg_match($pattern, $document, $matches);
		$tla = substr($matches[0], -3);
		return $tla;
	}

?>

///////////Headify paragraph tag////////////////////////
#!/usr/bin/env php 
<?php
	$filename 		= $_ENV['TM_FILENAME'];
	$document 		= file_get_contents('php://stdin');
	$letters 			= get_letters();

	echo get_meta_info();
	headify_first_paragraph($letters,'rel','heading');

	//return array of all letters
	function get_letters(){
		global $document;
		$pattern = '/<letter id="\w{3}\d*">\n(.*\n)*?<\/letter>/';
		preg_match_all($pattern, $document, $matches);
		return $matches[0];
	}


	//Get document meta info
	function get_meta_info(){
		global $document;
		$ret_val = 'empty';
		
		$pattern = '/<meta>[\n]{1}(.*[\n]+)*<\/meta>[\n]+/';
		preg_match($pattern, $document, $matches);//will fail when over 65k characters
		$ret_val = $matches[0];
		
		return $ret_val;
	}


	//Find first paragraph tag
	function headify_first_paragraph($letters,$attribute,$value){
		//$ret_val = null;
		
		foreach($letters as $letter){
		
			//Get first <p> tag
			$pattern 		= '/(?<!<\/p\>)<p>\n/';//non-greedy doesnt work here...?
			$replacement 	= '<p ' . $attribute . '="' . $value . '">';
			$letter = preg_replace($pattern, $replacement, $letter);
			echo $letter;
		}
		return;
	}

/*--------------------------------------*/
	//Add 'rel' attribute to paragraph tag
	//todo: repurpose later to add any attribute to any tag
	function add_attribute_to_tag($tagset,$attribute,$value){
		$ret_val=null;
		$pattern 		= '/<p>/';
		$replacement 	= '<p ' . $attribute . '="' . $value . '">';
		$ret_val = preg_replace($pattern, $replacement, $tagset);
		
		return $ret_val;
	}	

	//Find first paragraph tag
	function get_first_paragraph($letter){
		$ret_val = null;
		
		$pattern = '/<p>[\n]{1}.*[\n]{1}<\/p>/';
		preg_match($pattern, $letter, $matches);
		$ret_val = $matches[0];
		
		return $ret_val;
	}
?>
///////////////--LINKIFY PERSON--///////////////////////////////////
#!/usr/bin/env php 
<?php
		$filename 	= $_ENV['TM_FILENAME'];
		$document 	= file_get_contents('php://stdin');

		$author_tla	= get_letter_tla();

		$person_names = array(
			'/Mr. Washington/','/Mr Washington/','/General Washington/','/Genl Washington/','/Gen Washington/','/President Washington/','/Gen\'l Washington/', 
			'/Christopher Greene/', '/Colonel Greene/', 
			'/Major Mifflin/', '/General Mifflin/','/Gen\'l Mifflin/', 
			'/General Schuyler/','/Mr. Schuyler/','/Major-General Schuyler/','/Gen\'l Schuyler/', 
			'/General Greene/','/Gen. Greene/','/Gen\'l Greene/', 
			'/General Sullivan/','/Gen\'l Sullivan/', 
			'/General Putnam/','/Gen\'l Putnam/', 
			'/General Montgomery/','/Gen\'l Montgomery/', 
			'/Major Arnold/','/Colonel Arnold/','/General Arnold/','/Mr. Arnold/','/Gen\'l Arnold/', 
			'/Mr. Henry/','/Mr Henry/',
			'/Governor Cooke/','/Mr. Cooke/',
			'/Governor Trumbull/','/Mr. Trumbull/','/Gov\'r Trumbull/',
			'/General Wooster/','/Gen\'l Wooster/', 
			'/Mr. Hancock/','/President Hancock/','/General Hancock/',
			'/Mr. Mason/','/Mr. George Mason/',
			'/General Knox/','/Colonel Knox/','Mr. Knox','/Gen\'l Knox/', 
			'/Mr. Morris/','/Mr. Robert Morris/',
			#'/General Clinton/','/Gen\'l Clinton/', 
			'/Governor Clinton/',
			'/General Heath/','/Gen\'l Heath/', 
			'/General Cadwalader/','/Gen\'l Cadwalder/', 
			'/General Lincoln/','/Gen. Lincoln/','/Gen\'l Lincoln/', 
			'/Colonel Laurens/','/Lieutenant-Colonel Laurens/','/Lieutenant-Colonel John Laurens/',
			'/Mr. Jay/','/Mr Jay/',
			'/Colonel Hamilton/','/Mr. Hamilton/',
			'/General Pulaski/','/Count Pulaski/',
			'/Count d Estaing/','/Comte d Estaing/','/Count d\'Estaing/','/M. d\'Estaing/',
			'/General Burgoyne/','/Mr. Burgoyne/','/Gen\'l Burgoyne/', 
			'/Mr. Wharton/',
			'/Colonel Reed/','/General Reed/',
			'/Colonel Brodhead/',
			'/General Wayne/','/Gen\'l Wayne/', 
			'/General Devereux/','/Gen\'l Devereux/', 
			'/General Lafayette/','/Marquis deLafayette/','/Marquis de Lafayette/','/Marquis Lafayette/','/Monsieur de Lafayette/','/Gen\'l Lafayette/','/Marquis de la Fayette/','/M. de Lafayette/', 
			'/Mr. Burr/','/Major Burr/','/Colonel Burr/',
			'/General McDougall/','/Gen\'l McDougall/', 
			'/General Gates/','/Gen\'l Gates/', 
			'/General Stark/','/Mr. Stark/','/Gen\'l Stark/', 
			'/General Irvine/','/Gen\'l Irvine/', 
			'/Count Rochambeau/','/Count de Rochambeau/','/Compte de Rochambeau/','/Monsieur Rochambeau/','/General Rochambeau/','/Gen\'l Rochambeau/', 
			'/Chevalier de la Luzerne/','/Chevalier Luzerne/','/Duke de Lauzun/','/Monsieur de la Luzerne/','/M. de la Luzerne/',
			'/Chevalier de Ternay/','/Admiral Ternay/','/Monsieur le Chevalier de Ternay/','/Monsieur de Ternay/','/M. de Ternay/',
			'/Baron Steuben/','/Baron de Steuben/','/Gen\'l Steuben/', 
			'/Mr. Joseph Jones/',
			'/Mr. Chittenden/','/Governor Chittenden/',
			'/Governor Rutledge/','/Mr. Rutledge/','/Mr. J. Rutledge/',
			'/Mr. Duane/',
			'/Mr. Franklin/','/Dr. Franklin/','Doctor Franklin',
			'/Mr. Jefferson/','/Mr Jefferson/','/President Jefferson/','/Governor Jefferson/',
			'/Mr. Madison/','/Mr Madison/','/President Madison/',
			'/Mr. Monroe/','/Mr Monroe/','/President Monroe/',
			'/Mr. Samuel Adams/','/Mr. Sam Adams/',
			'/Mr. Pickering/','/Colonel Pickering/',
			'/Mr. Platt/','/Major Platt/','/Colonel Platt/',
			'/Edmund Randolph, Esq./',
			'/Mr. Troup/','/Major Troup/','/Colonel Troup/',
			'/Mr. St. Clair/','/General St. Clair/','/Colonel St. Clair/','/President St. Clair/','/Gen\'l St. Clair/', 
			'/Mrs. Adams/',
			'/Mr. Adams/',
			'/J. Q. A./','/Mr. J. Q. A./',
			'/Mr. Blennerhassett/',
			'/Mr. Madison/','/President Madison/',
			'/Mrs. Madison/',
			'/Mr. Marion/','/General Marion/','/Gen\'l Marion/', 
			'/General Pinckney/','/Gen\'l Pinckney/', 
			'/Captain Pinckney/',
			'/Mr. Horry/','/Colonel Horry/','/Col. Peter Horry/','/Col. Horry/',
			'/Governor Mathews/',
			'/Mr. Gadsden/','/General Gadsden/',
			'/Mr. Pickens/','/General Pickens/',
			#'/General Howe/','/Gen\'l Howe/', 
			'/Major Burnet/',
			'/General Leslie/','/Gen. Leslie/','/Gen\'l Leslie/', 
			'/Col. Benton/','/Colonel Benton/',
			'/Mr. Drayton/',
			'/Col. Williams/','/Colonel Williams/',
			'/Gov. Rutledge/','/Edward Rutledge/',
			'/Gouverneur Morris/','/Gouverneur/',
			'/Mr. Pendleton/',
			'/Mr. Lovell/',
			'/Lord Grenville/',
			'/Mr. King/',
			'/Mr. Deane/',
			'/Mr. Bingham/',
			'/Mr. Wilberforce/',
			'/Judge Peters/',
			'/Mr. Otis/',
			'/Mr. Paine/',
			'/Mr. E. Randolph/','/Mr. Edmund Randolph/','/Mr. Randolph/',
			'/Colonel Humphreys/','/friend Humphreys/','/Mr. Humphreys/',
			'/Mr. Marshall/',
			'/Mr. Harrison/',
			'/Mrs. Macaulay Graham/',
			'/Colonel Grayson/','/Mr. Grayson/','/Col. Grayson/',
			'/Mr. Bowdoin/','/Governor Bowdoin/',
			'/Mr. Hawkins/','/Honorable Benjamin Hawkins/',
			'/Mr Short/','/Mr. Short/',
			'/Duke of Leeds/','/Grace of Leeds/',
			'/M. Lebrun/',
			'/M. Deforgues/',
		);

		$relationship_matrix = array(
			'gwa' => array('chg'=>'colleague','thm'=>'colleague','pjs'=>'co-worker met','nag'=>'co-worker met','jsu'=>'co-worker','isp'=>'co-worker','rim'=>'co-worker','bea'=>'co-worker','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'co-worker','joh'=>'colleague','hek'=>'co-worker','rom'=>'colleague','gec'=>'colleague','wih'=>'co-worker','jhc'=>'colleague','bel'=>'co-worker','jol'=>'co-worker met friend','joj'=>'co-worker met friend','alh'=>'co-worker met','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary colleague','thw'=>'colleague','jor'=>'colleague','dab'=>'co-worker','atw'=>'co-worker','laf'=>'co-worker met friend','alm'=>'co-worker','hog'=>'co-worker','ben'=>'','thj'=>'colleague met','mad'=>'colleague met','jam'=>'co-worker met','jod'=>'colleague','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'co-worker','jhs'=>'co-worker','wli'=>'colleague','cdr'=>'co-worker met','cdl'=>'co-worker','jac'=>'co-worker','frs'=>'co-worker met','cdt'=>'colleague','frm'=>'co-worker','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'co-worker','roh'=>'colleague'),
			'laf' => array('gwa'=>'co-worker friend met','chg'=>'co-worker','thm'=>'co-worker','nag'=>'co-worker met friend','jsu'=>'co-worker','isp'=>'co-worker','rim'=>'colleague','bea'=>'co-worker','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'co-worker met','rom'=>'co-worker','gec'=>'colleague','wih'=>'co-worker met','jhc'=>'colleague','bel'=>'co-worker met','jol'=>'colleague met','joj'=>'colleague','alh'=>'co-worker met','kap'=>'co-worker','cde'=>'co-worker met','jhb'=>'adversary colleague','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague met','pjs'=>'co-worker','alm'=>'co-worker','hog'=>'co-worker','ben'=>'colleague friend met','thj'=>'colleague met co-worker','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'co-worker met','jhs'=>'co-worker','wli'=>'co-worker','cdr'=>'co-worker','cdl'=>'co-worker','jac'=>'colleague','frs'=>'co-worker met','cdt'=>'co-worker','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jod'=>'colleague met','tmp'=>'colleague'),
			'chg' => array('gwa'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'thm' => array('gwa'=>'colleague','chg'=>'colleague','pjs'=>'colleague met','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague'),
			'pjs' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague met','nag'=>'colleague met','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague met','bea'=>'colleague met','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague met','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague met kin','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague met','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague met','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jad'=>'colleague'),
			'nag' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague met','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague met','joj'=>'colleague','alh'=>'colleague met','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague met','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','atw'=>'colleague met','jhr'=>'met','cdt'=>'colleague','frm'=>'colleague met','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'jsu' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'colleague','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','rom'=>'colleague'),
			'isp' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'hog' => array('gwa'=>'colleague met','chg'=>'colleague','pjs'=>'colleague','thm'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague met','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'me','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'rim' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague met','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','bea'=>'colleague met','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague met','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'bea' => array('gwa'=>'colleague met','chg'=>'colleague met','thm'=>'colleague met','pjs'=>'colleague met','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague met','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague met','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'pah' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','cdt'=>'colleague'),
			'nic' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague'),
			'jht' => array('gwa'=>'colleague met friend','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague met','jod'=>'colleague','dah'=>'friend met','jab'=>'colleague met'),
			'daw' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague met','pjs'=>'colleague met','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague met','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'joh' => array('gwa'=>'colleague met friend','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague met','ben'=>'colleague met','thj'=>'colleague met','mad'=>'colleague met','jam'=>'colleague met','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'colleague','aab'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague'),
			'hek' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague met','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague met','daw'=>'colleague','joh'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague met','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jod'=>'colleague met','wib'=>'met'),
			'rom' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','gom'=>'friend met colleague'),
			'gec' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague sibling met','frs'=>'colleague'),
			'wih' => array('gwa'=>'colleague','chg'=>'colleague met','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague met','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague met','cdl'=>'colleague met','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague met'),
			'jhc' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague'),
			'bel' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jod'=>'colleague'),
			'jol' => array('gwa'=>'co-worker friend met','chg'=>'co-worker','thm'=>'co-worker','pjs'=>'co-worker','nag'=>'co-worker met','jsu'=>'co-worker met','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','joj'=>'colleague','alh'=>'colleague met friend','kap'=>'colleague','cde'=>'colleague met','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met friend','alm'=>'colleague','hog'=>'co-worker','ben'=>'co-worker','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'co-worker met','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','frm'=>'colleague'),
			'joj' => array('gwa'=>'co-worker met friend','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague met friend','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague met friend','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','alh'=>'colleague met','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'colleague met','jod'=>'colleague met friend','thj'=>'colleague','mad'=>'colleague','jam'=>'colleague','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','ewr'=>'colleague met friend','gom'=>'colleague friend met','edp'=>'colleague','jal'=>'colleague','wig'=>'colleague met','ruk'=>'colleague met','sid'=>'colleague','wib'=>'colleague met friend','wwi'=>'colleague','rcp'=>'colleague','geo'=>'colleague','now'=>'colleague','dah'=>'colleague','tom'=>'colleague'),
			'alh' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague met kin','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague met','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague met','jol'=>'colleague','joj'=>'colleague','kap'=>'colleague','cde'=>'colleague met','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague friend met','alm'=>'colleague met','hog'=>'colleague met','ben'=>'colleague','thj'=>'','mad'=>'colleague','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague met adversary','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','ruk'=>'colleague met'),
			'kap' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'cde' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague met','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague met','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'jhb' => array('gwa'=>'adversary','chg'=>'adversary','thm'=>'adversary','pjs'=>'adversary','nag'=>'adversary','jsu'=>'adversary','isp'=>'adversary','rim'=>'adversary','bea'=>'adversary','pah'=>'adversary','nic'=>'adversary','jht'=>'adversary','daw'=>'adversary','joh'=>'adversary','hek'=>'adversary','rom'=>'adversary','gec'=>'adversary','wih'=>'adversary','jhc'=>'adversary','bel'=>'adversary','jol'=>'adversary','joj'=>'adversary','alh'=>'adversary','kap'=>'adversary','cde'=>'adversary','thw'=>'adversary','jor'=>'adversary','dab'=>'adversary','atw'=>'adversary','laf'=>'adversary','alm'=>'adversary','hog'=>'adversary','ben'=>'adversary','thj'=>'adversary','mad'=>'adversary','jam'=>'adversary','tip'=>'adversary','rip'=>'adversary','edr'=>'adversary','rot'=>'adversary','sam'=>'adversary','aab'=>'adversary','rhl'=>'adversary','chl'=>'adversary','arc'=>'adversary','jhs'=>'adversary','wli'=>'adversary','cdr'=>'adversary','cdl'=>'adversary','jac'=>'adversary','frs'=>'adversary','cdt'=>'adversary'),
			'thw' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague'),
			'jor' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague'),
			'dab' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'aab' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague met','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'rhl' => array('gwa'=>'colleague met friend','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague friend met','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','tmp'=>'colleague','jod'=>'colleague'),
			'chl' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'arc' => array('gwa'=>'colleague met','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague met','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','wih'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague met','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague met','chl'=>'colleague','jhs'=>'colleague','wli'=>'colleague','cdr'=>'colleague','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'wli' => array('gwa'=>'colleague','chg'=>'colleague','thm'=>'colleague','pjs'=>'colleague','nag'=>'colleague','jsu'=>'colleague','isp'=>'colleague','rim'=>'colleague','bea'=>'colleague','pah'=>'colleague','nic'=>'colleague','jht'=>'colleague','daw'=>'colleague','joh'=>'colleague','hek'=>'colleague','rom'=>'colleague','gec'=>'colleague','jhc'=>'colleague','bel'=>'colleague','jol'=>'colleague','joj'=>'colleague','alh'=>'colleague','kap'=>'colleague','cde'=>'colleague','jhb'=>'adversary','thw'=>'colleague','jor'=>'colleague','dab'=>'colleague','atw'=>'colleague','laf'=>'colleague met','alm'=>'colleague','hog'=>'colleague','ben'=>'','thj'=>'','mad'=>'','jam'=>'','tip'=>'colleague','rip'=>'colleague','edr'=>'colleague','rot'=>'colleague','sam'=>'','aab'=>'colleague','arc'=>'colleague','frs'=>'colleague','cdt'=>'colleague','frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','jhs'=>'colleague','wih'=>'colleague','wli'=>'me','cdr'=>'colleague met','cdl'=>'colleague','jac'=>'colleague','frs'=>'colleague','cdt'=>'colleague'),
			'aba' => array('aba'=>'me','thj'=>'friend met','gwa'=>'acquaintance met','laf'=>'acquaintance met','jod'=>'friend met spouse','jqa'=>'met child','cha'=>'met child','dol'=>'met acquaintance','ben'=>'met acquaintance','joj'=>'met acquaintance','jol'=>'met','thm'=>'acquaintance','jab'=>'acquaintance met','jal'=>'acquaintance','mad'=>'acquaintance','cde'=>'acquaintance met','jsu'=>'acquaintance met'),
			'jod' => array('jod' => 'me','aba'=>'spouse met friend','gwa'=>'colleague met','mad'=>'colleague met','dol'=>'acquaintance met','thj'=>'colleague met','aab'=>'colleague met','joj'=>'colleague met friend','jqa'=>'met colleague child','jam'=>'colleague met','cde'=>'colleague met acquaintance','hel'=>'colleague met','rot'=>'met','joh'=>'colleague met','ben'=>'colleague met','bel'=>'colleague met friend','jam'=>'colleague','rom' => 'colleague met','alh'=>'colleague met','pah'=>'colleague','tip'=>'colleague met'),
			'ben' => array('jod' => 'colleague met','thj' => 'colleague met','hel' => 'colleague','sid' => 'colleague','joj' => 'colleague met','thw'=>'friend met co-worker','jab'=>'met','joh'=>'acquaintance','edp'=>''),
			'hnb' => array('aab'=>'colleague met','jde'=>'friend met'),
			'rol' => array('gwa' => 'colleague','hek'=>'met','thj'=>'colleague met','tmp'=>'colleague friend'),
			'jej' => array('gwa' => 'colleague','rom' => 'colleague met','mad' => 'colleague','hog' => 'colleague','nag' => 'colleague','tip' => 'colleague',),
			'toc' => array('gwa' => 'colleague','bel'=>'colleague','jhb'=>'adversary'),
			'jhr' => array('gwa' => 'colleague','nag'=>'colleague'),
			'jad' => array('gwa' => 'colleague','jod'=>'colleague','pjs'=>'colleague','jol'=>'colleage met','cdl'=>'colleague'),
			'cdt' => array('gwa' => 'colleague','cdr'=>'colleague','cdl'=>'colleague','laf'=>'colleague','cde'=>'colleague'),
			'cdr' => array('gwa' => 'colleague met','cdl'=>'colleague met','laf'=>'colleague met','cde'=>'colleague met'),
			'frm' => array('nag' => 'colleague met','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','all'=>'colleague met'),
			'top' => array('frm'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'ccp' => array('frm'=>'colleague','top'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague','bel'=>'colleague'),
			'peh' => array('frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','crg'=>'colleague','anp'=>'colleague','roh'=>'colleague'),
			'jhm' => array('roh'=>'colleague','jol'=>'colleague','nag'=>'colleague met','jhr'=>'colleague','all'=>'adversary'),
			'crg' => array('frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague met friend','anp'=>'colleague','roh'=>'colleague','nag'=>'colleague'),
			'anp' => array('frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','roh'=>'colleague','jaw'=>'colleague'),
			'roh' => array('frm'=>'colleague','top'=>'colleague','ccp'=>'colleague','peh'=>'colleague','crg'=>'colleague','anp'=>'colleague','wid'=>'colleague'),
			'frs' => array('gwa' => 'colleague met','jsu' => 'colleague met','nag' => 'colleague'),
			'jac' => array('gwa' => 'colleague','gec' => 'colleague met sibling','jhs' => 'colleague met','pjs'=>'colleague met'),
			'jbu' => array('nag' => 'colleague met','frm' => 'colleague','peh' => 'colleague'),
			'all' => array('nag' => 'adversary','frm' => 'adversary','peh' => 'adversary'),
			'lab' => array('nag' => 'colleague','frm' => 'colleague','peh' => 'colleague'),
			'wid' => array('' => ''),	
			'jaw' => array('nag' => 'colleague','frm' => 'colleague','peh' => 'colleague','anp'=>'colleague','atw'=>'colleague'),
			
			'ewr' => array('jhr' => 'colleague met sibling'),
			'gom' => array('gwa'=>'co-worker','joj'=>'colleague friend met','rom'=>'colleague friend met','ben'=>'colleague','thj'=>'met colleague co-worker','jod'=>'colleague','laf'=>'colleague met','cdl'=>'colleague met','alh'=>'colleague','jhb'=>'adversary','pjs'=>'met colleague','hog'=>'colleague','bel'=>'colleague','met colleague','dah'=>'met','alm'=>'colleague met'),
			'edp' => array('joj'=>'colleague'),
			'jal' => array('joj'=>'colleague'),
			'wig' => array('joj'=>'colleague'),
			'ruk' => array('joj'=>'colleague'),
			'sid' => array('joj'=>'colleague'),
			'wib' => array('joj'=>'colleague'),
			'wwi' => array('joj'=>'colleague'),
			'rcp' => array('joj'=>'colleague friend met','ben'=>'colleague','jod'=>'colleague'),
			'now' => array('joj'=>'colleague'),
			'geo' => array('joj'=>'colleague'),

			'tmp' => array('gwa'=>'colleague','rom'=>'colleague met','laf'=>'colleague met friend','thj'=>'colleague met','jhr'=>'colleague met','dah'=>'colleague met','gom'=>'colleague','rol'=>'colleague friend'),
			'edr' => array('gwa'=>'colleague','rom'=>'colleague','hek'=>'met co-worker colleague','alh'=>'co-worker met','joj'=>'colleague','thj'=>'colleague','mad'=>'colleague'),
			'dah' => array('gwa'=>'colleague','bel'=>'co-worker met','anp'=>'met colleague','thj'=>'co-worker'),
			'tom' => array('gwa'=>'colleague'),
			'beh' => array('gwa'=>'colleague'),
			'cam' => array('gwa'=>'colleague'),
			'wlg' => array('gwa'=>'colleague'),	
			'jab' => array('jht'=>'colleague met'),	
			'bnh' => array('hek'=>'colleague met'),
			'cdl' => array('gwa'=>'colleague met','laf'=>'colleague met'),
			'tip' => array('gwa'=>'co-worker met','dah'=>'colleague','hek'=>'colleague met','arc'=>'co-worker','bel'=>'co-worker met','jsu'=>'co-worker','jhb'=>'adversary','atw'=>'co-worker','alm'=>'co-worker','hek'=>'co-worker met','thm'=>'co-worker met','hog'=>'co-worker'),

			'wis' => array('gom'=>'colleague met'),
			'leb' => array('gom'=>'colleague met'),
			'fro' => array('gom'=>'colleague met'),
			'fad' => array('gom'=>'colleague met'),
		);

		$name_tla_lookup = array(
			'mr. washington' => 'gwa','mr washington' => 'gwa','general washington' => 'gwa','genl washington' => 'gwa','gen washington' => 'gwa','president washington' => 'gwa','gen\'l washington'=>'gwa',
			'christopher greene' => 'chg', 'colonel greene' => 'chg', 
			'major mifflin' => 'thm', 'general mifflin' => 'thm','gen\'l mifflin'=>'thm',
			'general schuyler' => 'pjs','mr. schuyler' => 'pjs','major-general schuyler' => 'pjs','gen\'l schuyler'=>'pjs', 
			'general greene' => 'nag','gen. greene' => 'nag','gen\'l greene'=>'nag',
			'general sullivan' => 'jsu','gen\'l sullivan'=>'jsu', 
			'general putnam' => 'isp','gen\'l putnam'=>'isp', 
			'general montgomery' => 'rim','gen\'l montgomery'=>'rim',
			'major arnold' => 'bea','colonel arnold' => 'bea','general arnold' => 'bea','mr. arnold' => 'bea','gen\'l arnold'=>'bea',
			'mr. henry' => 'pah','mr henry' => 'pah',
			'governor cooke' => 'nic','mr. cooke' => 'nic',
			'governor trumbull' => 'jht','mr. trumbull' => 'jht','gov\'r trumbull'=>'jht',
			'general wooster' => 'daw','gen\'l wooster'=>'daw',
			'mr. hancock' => 'joh','mr hancock' => 'joh','president hancock' => 'joh','general hancock' => 'joh',
			'general knox' => 'hek','colonel knox' => 'hek','mr. knox' => 'hek','gen\'l knox'=>'hek',
			'mr. morris' => 'rom','mr morris' => 'rom','mr. robert morris' => 'rom',
			'general clinton' => 'jac','gen\'l clinton'=>'jac',
			'governor clinton' => 'gec',
			'general heath' => 'wih','gen\'l heath'=>'wih',
			'general cadwalader' => 'jhc','gen\'l cadwalader'=>'jhc',
			'general lincoln' => 'bel','gen. lincoln' => 'bel','gen\'l lincoln'=>'bel',
			'colonel laurens' => 'jol','lieutenant-colonel laurens' => 'jol','lieutenant-colonel john laurens' => 'jol',
			'mr. jay' => 'joj','mr jay' => 'joj',
			'colonel hamilton' => 'alh','mr. hamilton' => 'alh',
			'general pulaski' => 'kap','count pulaski' => 'kap','gen\'l pulaski'=>'kap',
			'count d estaing' => 'cde','comte d estaing' => 'cde','count d\'estaing' => 'cde','m. d\'estaing'=>'cde',
			'general burgoyne' => 'jhb','mr. burgoyne' => 'jhb','gen\'l burgoyne'=>'jhb',
			'mr. wharton' => 'thw',
			'colonel reed' => 'jor','general reed' => 'jor',
			'colonel brodhead' => 'dab',
			'general wayne' => 'atw','gen\'l wayne'=>'atw',
			'general lafayette' => 'laf','marquis delafayette' => 'laf','marquis de lafayette' => 'laf','marquis lafayette' => 'laf','monsieur de lafayette'=>'laf','gen\'l lafayette'=>'laf','marquis de la fayette'=>'laf','m. de lafayette' => 'laf',
			'mr. burr' => 'aab','major burr' => 'aab','colonel burr' => 'aab',
			'general mcdougall' => 'alm','gen\'l mcdougall'=>'alm',
			'general gates' => 'hog','gen\'l gates'=>'hog',
			'mr. franklin' => 'ben','dr. franklin' => 'ben','doctor franklin'=>'ben',
			'mr. jefferson' => 'thj','mr jefferson' => 'thj','president jefferson' => 'thj','governor jefferson' => 'thj',
			'mr. madison' => 'mad','mr madison' => 'mad','president madison' => 'mad',
			'mr. monroe' => 'jam','mr monroe' => 'jam','president monroe' => 'jam',
			'mr. samuel adams' => 'sam','mr. sam adams' => 'sam',
			'mr. pickering' => 'tip','colonel pickering' => 'tip',
			'mr. platt' => 'rip','major platt' => 'rip','colonel platt' => 'rip',
			'edmund randolph, esq.' => 'edr',
			'mr. troup' => 'rot','major troup' => 'rot','colonel troup' => 'rot',
			'mr. st. clair'=>'arc','general st. clair'=>'arc','colonel st. clair'=>'arc','president st. clair'=>'arc','gen\'l st. clair'=>'arc',
			'mr. mason' => 'gem','mr. george mason' => 'gem',
			'mrs. adams' => 'aba',
			'mr. adams' => 'jod','mr adams' => 'jod',
			'mr. j. q. a.' => 'jqa','j. q. a.'=>'jqa',
			'mr. blennerhassett' => 'hnb',
			'general devereux' => 'jde','gen\'l devereux'=>'jde',
			'mr. madison' => 'mad','mr madison' => 'mad','president madison' => 'mad',
			'mrs. madison' => 'dol',
			'general stark' => 'jhs','mr. stark' => 'jhs','gen\'l stark'=>'stark',
			'general irvine' => 'wli',
			'count rochambeau' => 'cdr','count de rochambeau' => 'cdr','compte de rochambeau' => 'cdr','monsieur rochambeau' => 'cdr','general rochambeau' => 'cdr','gen\'l rochambeau'=>'cdr',
			'chevalier de la luzerne' => 'cdl','chevalier luzerne' => 'cdl','duke de lauzun' => 'cdl','monsieur de la luzerne'=>'cdl','m. de la luzerne'=>'cdl',
			'chevalier de ternay'=>'cdt','admiral ternay'=>'cdt','monsieur le chevalier de ternay'=>'cdt','monsieur de ternay'=>'cdt','m. de ternay'=>'cdt',
			'baron steuben' => 'frs','baron de steuben' => 'frs',
			'mr. joseph jones' => 'jej',
			'mr. chittenden' => 'toc','governor chittenden' => 'toc',
			'governor rutledge' => 'jhr','mr. rutledge' => 'jhr','mr. j. rutledge' => 'jhr',
			'mr. duane' => 'jad',
			'mr. marion' => 'frm','general marion' => 'frm',
			'general pinckney' => 'ccp','gen\'l pinckney'=>'ccp',
			'captain pinckney' => 'top',
			'mr. horry' => 'peh','colonel horry' => 'peh','col. peter horry'=>'peh','col. horry'=>'peh',
			'governor mathews' => 'jhm',
			'mr. gadsden' => 'crg','general gadsden' => 'crg',
			'mr. pickens' => 'anp','general pickens' => 'anp',
			'general howe' => 'roh',
			'major burnet' => 'jbu',
			'general leslie' => 'all','gen. leslie' => 'all','gen\'l leslie'=>'all',
			'col. benton' => 'lab','colonel benton' => 'lab',
			'mr. drayton' => 'wid',
			'col. williams' => 'jaw','colonel williams' => 'jaw',
			'gov. rutledge' => 'ewr','edward rutledge' => 'ewr',
			'gouverneur morris' => 'gom','gouverneur' => 'gom',
			'mr. pendleton' => 'edp',
			'mr. lovell' => 'jal',
			'lord grenville' => 'wig',
			'mr. king' => 'ruk',
			'mr. deane' => 'sid',
			'mr. bingham' => 'wib',
			'mr. wilberforce' => 'wwi',
			'judge peters' => 'rcp',
			'mr. otis' => 'geo',
			'mr. paine' =>'tmp',
			'mr. e. randolph' =>'edp','mr. edmund randolph' =>'edp','mr. randolph' =>'edp',
			'colonel humphreys' =>'dah','friend humphreys' =>'dah','mr. humphreys' =>'dah',
			'mr. marshall' =>'tom',
			'mr. harrison' =>'beh',
			'mrs. macaulay graham' =>'cam',
			'colonel grayson' =>'wlg','mr. grayson' =>'wlg','col. grayson' =>'wlg',
			'mr. bowdoin' =>'jab','governor bowdoin' =>'jab',
			'mr. hawkins' => 'bnh','honorable benjamin hawkins'=>'bnh',
			'mr short' => 'wis','mr. short' => 'wis',
			'duke of leeds' => 'fro','grace of leeds' => 'fro',
			'm. lebrun' => 'leb',
			'm. deforgues' => 'fad',
		);

		echo preg_replace_callback($person_names,"linkify_person",$document);

		//the preg replace callback 
		function linkify_person($matches){
		  global $name_tla_lookup;
		  global $author_tla;
		  $lc_match 		= strtolower($matches[0]);	
		  $subject_tla 	= $name_tla_lookup[$lc_match];
		  $relationship	= get_relationship($author_tla,$subject_tla);
		  $ret_val 		= "<a href='/results.php?tla=" . $subject_tla . "' rel='" . $relationship . "'>" . ucwords($matches[0]) . "</a>"; 

		  return $ret_val;
		}
	
		//given the author and subject(person being talked about) - find their xfn relationship
		function get_relationship($author_tla,$subject_tla){
			global $relationship_matrix;
			$relationship = $relationship_matrix[$author_tla][$subject_tla];
			return $relationship;
		}

		//Get three letter acronym associated with letter file
		function get_letter_tla(){
			global $document;
			$pattern = "/--LETTER-TLA--\w{3}/";	
			preg_match($pattern, $document, $matches);
			$author_tla = substr($matches[0], -3);

			//for legacy documents with no meta information
			if(!$tla || $tla ==''){
				global $filename;
				$pattern = "/[ltr|jrn|doc]{1}_(?<tla>[a-zA-Z]{2,4})\d{3,5}/";
				preg_match($pattern, $filename, $matches);
				$author_tla = $matches['tla'];
				
			}

			return $author_tla;
		}
	
?>
//////////////////////////////////////////////
//Retrofit multiple
//////////////////////////////////////////////
#!/usr/bin/env php 
<?php
	//Add letter markup to legacy files
	//currently the given directory is hardwired to the 'Workflow/thomas_jefferson' directory. 
	//Make a new environment variable pointing at a different folder to retrofit other collections.
		
	$working_directory = $_ENV['FT_WORKFLOW_THJ_PATH']; //contains the thomas jefferson letters
	//$working_directory = $_ENV['FT_WORKFLOW_TEST_PATH']; //contains test files

	if($dir = opendir($working_directory)){
		while(($file = readdir($dir)) !== false){
			if($file != "." && $file != ".." && $file != ".DS_Store"){
				
				$handle = fopen($working_directory.$file, "r+");
				$document = fread($handle, filesize($working_directory.$file));
				ftruncate  ($handle,0);
				fseek($handle,0);
					
				//Print beginning of letter markup
				$doc_id 				= get_doc_id($file);
				fwrite($handle,"<letter id='$doc_id'>\n");
				fwrite($handle,"<recipient first='' last='' type='individual'/>\n");
			
				//Print the original contents
				fwrite($handle,$document);

				//Print closing letter markup
				fseek($handle,0,SEEK_END);
				fwrite($handle,"</letter>");

				fclose ( $handle );
			}
		}
		closedir($dir);
	}


/////////////////////
//METHODS////////////
/////////////////////

//Get id of file (not including the doc type)
function get_doc_id($file){
		global $document;
		
		$doc_id = '';
		$pattern = "/[ltr|jrn|doc]{1}_(?<doc_id>[a-zA-Z]{2,4}\d{3,5})/";
		preg_match($pattern, $file, $matches);
		$doc_id = $matches['doc_id'];			
		
		return $doc_id;
}

?>

//////////////////////////////////////////////
//Retrofit single legacy file
//////////////////////////////////////////////
#!/usr/bin/env php 
<?php
	$selected_file_path = $_ENV['TM_SELECTED_FILE'];
	$file_path_parts = explode('/',$selected_file_path);
	$file = array_pop($file_path_parts);
	

	$document = file_get_contents('php://stdin');
	
	//$pattern = '/\n\<p\>\n/';
	//$replacement = "\n<letter>\n<p>\n";
	//echo preg_replace($pattern, $replacement, $document);

	$doc_id 				= get_doc_id($file);

	print "<letter id='$doc_id'>\n";
	print "<recipient first='' last='' type='individual'/>\n";



//Get id of file (not including the doc type)
function get_doc_id($file){
		global $document;
		
		$doc_id = '';
		$pattern = "/[ltr|jrn|doc]{1}_(?<doc_id>[a-zA-Z]{2,4}\d{3,5})/";
		preg_match($pattern, $file, $matches);
		$doc_id = $matches['doc_id'];			
		
		return $doc_id;
}


?>