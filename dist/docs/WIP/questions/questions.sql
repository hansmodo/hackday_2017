mysql> describe question;
+--------------------+--------------+------+-----+---------+----------------+
| Field              | Type         | Null | Key | Default | Extra          |
+--------------------+--------------+------+-----+---------+----------------+
| id                 | int(11)      |      | PRI | NULL    | auto_increment |
| title              | varchar(240) | YES  |     | NULL    |                |
| details            | text         | YES  |     | NULL    |                |
| duplicate_question | int(11)      | YES  |     | NULL    |                |
| related_question   | int(11)      | YES  |     | NULL    |                |
| display            | tinyint(1)   | YES  |     | 0       |                |
+--------------------+--------------+------+-----+---------+----------------+


insert into question values(132, 'Where did Benjamin Franklin live in 1783?', '', null, null, 1);
insert into question values(133, 'Where was Benjamin Franklin last seen in 1771?', '', null, null, 1);
insert into question values(134, 'Where was Benjamin Franklin in April, 1783?', '', null, 132, 1);
insert into question values(135, 'Where was Benjamin Franklin living in January, 1770?', '', null, null, 1);
insert into question values(136, 'Where was Benjamin Franklin in 1765?', '', null, null, 1);
insert into question values(137, 'Where was Benjamin Franklin in 1772?', '', null, null, 1);
insert into question values(138, 'Where was Benjamin Franklin living in September of 1783?', '', null, 132, 1);
insert into question values(139, 'Where was Benjamin Franklin on November 21, 1783?', '', null, 132, 1);
	
insert into question values(140, 'Where was Benjamin Franklin in March of 1770?', '', null, null, 1);
insert into question values(141, 'Where is Benjamin Franklin buried?', '', null, null, 1);
insert into question values(142, 'Where did Benjamin and Deborah Franklin live?', '', null, null, 1);
insert into question values(143, 'Where did Benjamin Franklin live in Paris?', '', null, null, 1);
insert into question values(144, 'Where did Benjamin Franklin live with his wife Deborah?', '', 142, null, 1);
insert into question values(145, 'Where did Benjamin Franklins parents migrate from?', '', null, null, 1);
insert into question values(146, 'Where did Benjamin Franklin live in 1756?', '', null, null, 1);
insert into question values(147, 'Where did Benjamin Frankline dine in Philadelphia, PA', '', null, null, 1);
insert into question values(148, 'Where did Deborah Franklin live?', '', 149, 142, 1);
insert into question values(149, 'Where did Deborah Reed Franklin live?', '', null, 142, 1);
	
insert into question values(150, 'Why was Benjamin Franklin in Bethlehem, PA?', '', null, null, 0);
insert into question values(151, 'Why do people like and dislike Benjamin Franklin?', '', null, null, 0);
insert into question values(152, 'Why was Deborah Franklin so different from other women of her time?', '', null, null, 0);
insert into question values(153, 'Why did Ben Franklin go to Holland?', '', null, null, 0);
insert into question values(154, 'Why did Ben Franklins opinion about a inoculation change?', '', null, null, 0);
insert into question values(155, 'Why did Benjamin Franklin think the stamp act was improper?', '', null, null, 0);
insert into question values(156, 'Why did Benjamin Franklin write a letter to Samuel Cooper May 1, 1777?', '', 219, null, 0);
insert into question values(157, 'How were Ben Franklin and Mary Stevenson related?', '', null, null, 0);
insert into question values(158, 'How did Deborah Franklin help Ben Franklin?', '', null, null, 0);
insert into question values(159, 'How did John Adams view Ben Franklin?', '', null, null, 0);
	
insert into question values(160, 'How are Benjamin Franklin and John Jay alike?', '', null, null, 0);
insert into question values(161, 'How did Abiah Franklin die?', '', null, 188, 0);
insert into question values(162, 'How did Abigail Adams know Benjamin Franklin?', '', null, null, 0);
insert into question values(163, 'How did Benjamin Franklin feel about the indians?', '', null, null, 0);
insert into question values(164, 'How did Benjamin Franklin view Bethlehem, Pennsylvania?', '', null, 214, 0);
insert into question values(165, 'How did Benjamin Franklin and Deborah Franklin meet?', '', null, null, 0);
insert into question values(166, 'How did Benjamin Franklin treat Deborah Read Franklin?', '', null, null, 0);
insert into question values(167, 'How did Benjamin Franklin emulate Josiah Franklin?', '', null, null, 0);
insert into question values(168, 'How did Benjamin Franklin and deborah franklin meet?', '', null, null, 0);
insert into question values(169, 'How did Benjamin Franklin meet his wife deborah?', '', 168, null, 0);
	
insert into question values(170, 'How did Benjamin Franklin persevere during the winter months?', '', null, null, 0);
insert into question values(171, 'How did Benjamin Franklin send letters?', '', null, null, 0);
insert into question values(172, 'How did Benjamin Franklin think of the Florida purchase?', '', null, null, 0);
insert into question values(173, 'How did Benjamin Franklin know Mr. Bowdoin?', '', null, null, 0);
insert into question values(174, 'How did Richard Price and Benjamin Franklin meet?', '', null, null, 0);
insert into question values(175, 'How was Benjamin Franklin influenced by William Franklin?', '', null, null, 0);
insert into question values(176, 'How does John Adams describe Benjamin Franklin?', '', null, 159, 0);
insert into question values(177, 'How does John Jay know Benjamin Franklin?', '', null, null, 0);
insert into question values(178, 'How many letters did Benjamin Franklin write Jane?', '', null, null, 0);
insert into question values(179, 'How much did Benjamin Franklin put into the Philadelphia annuity?', '', null, null, 0);
	
insert into question values(180, 'How much of education did Benjamin Franklin receive?', '', null, null, 0);
insert into question values(181, 'How much power did Benjamin Franklin believe the states should have?', '', null, null, 0);
insert into question values(182, 'How old is Benjamin Franklin he got married?', '', null, null, 0);
insert into question values(183, 'How old was Benjamin Franklin in 1772?', '', null, 184, 0);
insert into question values(184, 'How old was Benjamin Franklin in 1738?', '', null, 183, 0);
insert into question values(185, 'How was Benjamin Franklin a nonconformist?', '', null, null, 0);
insert into question values(186, 'How where Benjamin Franklin and William Franklin different?', '', null, null, 0);
insert into question values(187, 'How did Patrick Henry feel about Benjamin Franklin?', '', null, null, 0);
insert into question values(188, 'When did Abiah Franklin die?', '', null, 161, 0);
insert into question values(189, 'What did Benjamin Franklin do when he was a little boy?', '', null, null, 0);
	
insert into question values(190, 'What happened to William Franklin when he returned to England?', '', null, null, 0);
insert into question values(191, 'When Abigail Adams was living in France, did she admire Benjamin Franklin or Thomas Jefferson more?', '', null, null, 0);
insert into question values(192, 'When did Benjamin Franklin meet his wife Debra?', '', null, 168, 0);
insert into question values(193, 'When did Benjamin Franklin meet Joseph Priestly?', '', null, null, 0);
insert into question values(194, 'When was Benjamin Franklin funeral?', '', null, null, 0);
insert into question values(195, 'What did Benjamin Franklin do in 1783?', '', null, null, 0);
insert into question values(196, 'How old was Deborah Read Franklin when Benjamin Franklin asked her to marry him?', '', null, null, 0);
insert into question values(197, 'What problem did Benjamin Franklin have in 1770?', '', null, null, 0);
insert into question values(198, 'What month of 1783 are Benjamin Franklin letters written?', '', null, null, 0);
insert into question values(199, 'What accomplishments did Benjamin Franklin especially seem to take pleasure in?', '', null, null, 0);
	
insert into question values(200, 'What connection did Benjamin Franklin have with new york ?', '', null, null, 0);
insert into question values(201, 'What connection does Benjamin Franklin have to the am constitution?', '', null, null, 0);
insert into question values(202, 'What connections did Benjamin Franklin make in 1783?', '', null, null, 0);
insert into question values(203, 'What did Abiah Franklin do for work?', '', null, null, 0);
insert into question values(204, 'What did Benjamin Franklin obtain in 1772?', '', null, null, 0);
insert into question values(205, 'What did Benjamin Franklin say about William Franklin?', '', null, null, 0);
insert into question values(206, 'What did Benjamin Franklin accomplish in 1783?', '', null, 209, 0);
insert into question values(207, 'What did Benjamin Franklin and John Winthrop promise to the world?', '', null, null, 0);
insert into question values(208, 'What did Benjamin Franklin care about?', '', null, null, 0);
insert into question values(209, 'What did Benjamin Franklin do after 1783?', '', null, 206, 0);
	
insert into question values(210, 'What did Benjamin Franklin do in 1757?', '', null, 241, 0);
insert into question values(211, 'What did Benjamin Franklin do in 1770?', '', null, null, 0);
insert into question values(212, 'What did Benjamin Franklin do in 1771?', '', null, null, 0);
insert into question values(213, 'What did Benjamin Franklin do when he was a little boy?', '', null, null, 0);
insert into question values(214, 'What did Benjamin Franklin love about Bethlehem PA?', '', null, 164, 0);
insert into question values(215, 'What did Benjamin Franklin propose in 1770?', '', null, null, 0);
insert into question values(216, 'What did Benjamin Franklin say in an open letter to lord north?', '', null, null, 0);
insert into question values(217, 'What did Benjamin Franklin tell Peter Collinson?', '', null, null, 0);
insert into question values(218, 'What did Benjamin Franklin think of Scotland?', '', null, null, 0);
insert into question values(219, 'What did Benjamin Franklins letter to Samuel Cooper say in 1777?', '', null, null, 0);
	
insert into question values(220, 'What did Deborah Franklin do for Benjamin Franklin?', '', 158, null, 0);
insert into question values(221, 'What did Benjamin Franklin produce every year for 25 years?', '', null, null, 0);
insert into question values(222, 'What did Benjamin Franklin and John Winthrop have in common?', '', null, null, 0);
insert into question values(223, 'What did William Franklin do to Benjamin Franklin?', '', 224, null, 0);
insert into question values(224, 'What did William Franklin do that disappointed Benjamin Franklin so much?', '', null, null, 0);
insert into question values(225, 'What does the Benjamin Franklin letter to Thomas Cushing mean?', '', null, null, 0);
insert into question values(226, 'What house did Deborah Franklin die in?', '', null, null, 0);
insert into question values(227, 'What is Benjamin Franklin talking about in the letter to Jean-Baptist Leroy?', '', null, null, 0);
insert into question values(228, 'What is Lafayettes connection to Benjamin Franklin?', '', null, null, 0);
insert into question values(229, 'What is meant by the seeds of liberty have been planted in America by Benjamin Franklin?', '', null, null, 0);
	
insert into question values(230, 'What is the relationship of Benjamin Franklin and Anthony Benezet?', '', null, null, 0);
insert into question values(231, 'What jobs did Benjamin Franklin have?', '', null, null, 0);
insert into question values(232, 'What jobs did Deborah Franklin have?', '', null, 158, 0);
insert into question values(233, 'What kind of apple trees did Benjamin Franklin have in Philadelphia?', '', null, null, 0);
insert into question values(234, 'What king did Benjamin Franklin dine with?', '', null, null, 0);
insert into question values(235, 'What letter did Benjamin Franklin wrote to congress on August 9th, 1780?', '', null, null, 0);
insert into question values(236, 'What networks were Benjamin Franklin involved in?', '', null, null, 0);
insert into question values(237, 'What petition did Benjamin Franklin present just before his death?', '', null, null, 0);
insert into question values(238, 'What was Abiah Franklins job?', '', null, null, 0);
insert into question values(239, 'What was Benjamin Franklin doing in 1777?', '', null, null, 0);
	
insert into question values(240, 'What was Benjamin Franklin doing in the winter of 1755?', '', null, null, 0);
insert into question values(241, 'What was Benjamin Franklin doing on July 27, 1757?', '', null, 210, 0);
insert into question values(242, 'What was John Adams connection to Benjamin Franklin?', '', null, null, 0);
insert into question values(243, 'What was odd about Benjamin Franklin?', '', null, null, 0);
insert into question values(244, 'What was purpose of the letter John and Abigail Adams wrote to Benjamin Franklin?', '', null, null, 0);
insert into question values(245, 'What was the address of Benjamin Franklin in France 1783?', '', null, null, 0);
insert into question values(246, 'What was the dispute between Benjamin Franklin and his brother?', '', null, 224, 0);
insert into question values(247, 'What was the purpose of the petition Benjamin Franklin wrote with the help of Joseph Galloway?', '', null, null, 0);
insert into question values(248, 'What ways was Deborah Read Franklin engaged in society?', '', null, null, 0);
insert into question values(249, 'What were Benjamin Franklins thoughts about commerce?', '', null, null, 0);

insert into question values(250, 'What were the ten jobs Benjamin Franklin had?', '', 231, null, 0);
insert into question values(251, 'What year did Benjamin Franklin move to the West Indies?', '', null, null, 0);
insert into question values(252, 'What year did Benjamin Franklin say the muses love the morning?', '', null, null, 0);
insert into question values(253, 'What year did Benjamin Franklin work for David Hall?', '', null, null, 0);
insert into question values(254, 'In what context was Benjamin Franklins 1755 letter to Shipley written?', '', null, null, 0);
insert into question values(255, 'What did Benjamin Franklin do after revolutionary war?', '', null, null, 0);
insert into question values(256, 'What did Benjamin Franklin do in 1738?', '', null, 184, 0);

/*Begin George Washington*/

insert into question values(257, 'Why did George Washington choose Thomas Pinckney?', '', null, 273, 0);
insert into question values(258, 'List three reasons why British wanted to arrest George Washington?', '', null, null, 0);
insert into question values(259, 'Why did George Washington order a suit from Virginia?', '', null, null, 0);

insert into question values(260, 'Why are George Washingtons letters important to him?', '', null, null, 0);
insert into question values(261, 'Why did George Washingtons campaign in Canada prove to be unsucessful?', '', null, null, 0);
insert into question values(262, 'Why did George Washington carry the letters to Abigil Adams?', '', null, 283, 0);
insert into question values(263, 'Why did George Washington choose Henry Knox?', '', null, null, 0);
insert into question values(264, 'Why was George Washington commissioned a lieutenant colonel in 1754?', '', null, null, 0);
insert into question values(265, 'Why did George Washington depend on Nathanael Greene?', '', null, 310, 0);
insert into question values(266, 'Why did George Washington go to Philadelphia on July 4, 1794?', '', null, null, 0);
insert into question values(267, 'Why did George Washington respect Benedict Arnold?', '', null, 298, 0);
insert into question values(268, 'Why did George Washington insist on neutrality with regard to foreign affairs?', '', null, null, 0);
insert into question values(269, 'Why did George Washington not go to the metting of the constitution?', '', null, null, 0);
	
insert into question values(270, 'Why did George Washington want to have John Jay as secretary?', '', null, 271, 0);
insert into question values(271, 'Why did George Washington write a letter to John Jay in 1786?', '', null, 270, 0);
insert into question values(272, 'Why did George Washington write a letter to Governor Dinwiddie on August 27, 1757?', '', null, null, 0);
insert into question values(273, 'Why do you think that George Washington would request to be Eliza Lucas Pinckneys pall bearer?', '', null, 257, 0);
insert into question values(274, 'Why did George Washington refuse to exchange prisoners?', '', null, null, 0);
insert into question values(275, 'Why is George Washington important in the 1770s?', '', null, null, 0);
insert into question values(276, 'Why is George Washington socially significant?', '', null, null, 0);
insert into question values(277, 'Why was George Washington important in 1754?', '', null, null, 0);
insert into question values(278, 'Why was George Washington with Francis Fauquier in 1758?', '', null, null, 0);
insert into question values(279, 'Why was George Washingtons letter to Robert Orme important?', '', null, null, 0);
	
insert into question values(280, 'Why was the militia set up by George Washington?', '', null, null, 0);
insert into question values(281, 'Why were George Washington and Thomas Jefferson good friends?', '', null, null, 0);
insert into question values(282, 'Why would George Washington write a letter to Lafayette?', '', null, null, 0);
insert into question values(283, 'Why did George Washington have to meet Abigail Adams?', '', null, 262, 0);
insert into question values(284, 'Why did George Washington write a letter to Robert Morris?', '', null, 285, 0);
insert into question values(285, 'Why did George Washington write \"there is nothing more necessary than good intelligence to frustrate a designing enemy\" in a letter to Robert Morris?', '', null, 284, 0);
insert into question values(286, 'How did George Washington sign his letters?', '', null, null, 0);
insert into question values(287, 'How were George Washington and Thomas Jefferson alike?', '', null, null, 0);
insert into question values(288, 'How many letters did George Washington write?', '', null, null, 0);
insert into question values(289, 'How was George Washington social?', '', null, null, 0);
	
insert into question values(290, 'How did George Washington meet John Adams?', '', null, 314, 0);
insert into question values(291, 'How does George Washingtons letter of March 15, 1755 pertain to Britian and the American colonies?', '', null, null, 0);
insert into question values(292, 'How are George Washington and James Madison similar?', '', null, null, 0);
insert into question values(293, 'How are George Washington and Patrick Henry similar?', '', null, null, 0);
insert into question values(294, 'How are George Washington and Sam Houston similar?', '', null, null, 0);
insert into question values(295, 'How are George Washington and Thomas Jefferson similar??', '', null, null, 0);
insert into question values(296, 'How close were George Washington and John Jay?', '', null, null, 0);
insert into question values(297, 'How did General George Washington feel about General Horatio Gates?', '', null, null, 0);
insert into question values(298, 'How did George Washington and Benedict Arnold meet?', '', null, 267, 0);
insert into question values(299, 'How did George Washington communicate with others?', '', null, null, 0);
	
insert into question values(300, 'How did George Washington convince soldiers to stay?', '', null, null, 0);
insert into question values(301, 'How did George Washington feel about Alexander Hamilton?', '', null, 307, 0);
insert into question values(302, 'How did George Washington feel about General Charles Cornwallis?', '', null, null, 0);
insert into question values(303, 'How did George Washington feel about limited executive power?', '', null, null, 0);
insert into question values(304, 'How did George Washington feel about the cotton kingdom?', '', null, null, 0);
insert into question values(305, 'How did George Washington know Anthony Wayne?', '', null, null, 0);
insert into question values(306, 'How did George Washington know Martha?', '', null, null, 0);
insert into question values(307, 'How did George Washington meet Alexander Hamilton?', '', null, 301, 0);
insert into question values(308, 'How did George Washington view Benedict Arnold?', '', null, 298, 0);
insert into question values(309, 'How did George Washington meet Henry Knox?', '', null, null, 0);
	
insert into question values(310, 'How did George Washington meet Nathanael Greene?', '', null, 265, 0);
insert into question values(311, 'How did George Washington sign his letters?', '', null, 312, 0);
insert into question values(312, 'How did George Washington start letters?', '', null, 311, 0);
insert into question values(313, 'How did George Washington work with Nathaniel Greene?', '', null, 265, 0);
insert into question values(314, 'How were George Washington and John Adams different?', '', null, 290, 0);
insert into question values(315, 'How did George Washington know Thomas Paine?', '', null, null, 0);
insert into question values(316, 'How many letters did George Washington write in his study?', '', null, 318, 0);
insert into question values(317, 'How many letters did George Washington write to King George?', '', null, 316, 0);
insert into question values(318, 'How many letters were written by George Washington?', '', null, 317, 0);
insert into question values(319, 'How many pair of shoes did George Washington own?', '', null, null, 0);
	
insert into question values(320, 'How often did George Washington write letters?', '', null, 312, 0);
insert into question values(321, 'How long did it take for a letter from George Washington to be delivered to the King George?', '', null, 317, 0);
insert into question values(322, 'How was George Washington consoled in 1797?', '', null, null, 0);
insert into question values(323, 'How was George Washington\'s heath?', '', null, null, 0);
insert into question values(324, 'How many letters did George Washington receive from Benedict Arnold?', '', null, 308, 0);
insert into question values(325, 'What does George Washington mean when he says \"there is nothing more necessary than good intelligence to frustrate a designing enemy and nothing that requires greater pains to obtain.\"', '', null, null, 0);
insert into question values(326, 'What happened when George Washington was 21 years old?', '', null, null, 0);
insert into question values(327, 'When did George Washington arrive at Fort Cumberland?', '', null, null, 0);
insert into question values(328, 'When did George Washington hire Benedict Arnold?', '', null, 308, 0);
insert into question values(329, 'When did George Washington meet James Madison?', '', null, 292, 0);
	
insert into question values(330, 'When did George Washington meet John Adams?', '', null, 290, 0);
insert into question values(331, 'When did George Washington meet Aaron Burr?', '', null, null, 0);
insert into question values(332, 'When George Washington marched to ohio in 1754 what did he want to do?', '', null, null, 0);
insert into question values(333, '', '', null, null, 0);
insert into question values(334, '', '', null, null, 0);
insert into question values(335, '', '', null, null, 0);
insert into question values(336, '', '', null, null, 0);
insert into question values(337, '', '', null, null, 0);
insert into question values(338, '', '', null, null, 0);
insert into question values(339, '', '', null, null, 0);
	
insert into question values(340, '', '', null, null, 0);
insert into question values(341, '', '', null, null, 0);
insert into question values(342, '', '', null, null, 0);
insert into question values(343, '', '', null, null, 0);
insert into question values(344, '', '', null, null, 0);
insert into question values(345, '', '', null, null, 0);
insert into question values(346, '', '', null, null, 0);
insert into question values(347, '', '', null, null, 0);
insert into question values(348, '', '', null, null, 0);
insert into question values(349, '', '', null, null, 0);
	
insert into question values(350, '', '', null, null, 0);
insert into question values(351, '', '', null, null, 0);
insert into question values(352, '', '', null, null, 0);
insert into question values(353, '', '', null, null, 0);
insert into question values(354, '', '', null, null, 0);
insert into question values(355, '', '', null, null, 0);
insert into question values(356, '', '', null, null, 0);
insert into question values(357, '', '', null, null, 0);
insert into question values(358, '', '', null, null, 0);
insert into question values(359, '', '', null, null, 0);
	
insert into question values(360, '', '', null, null, 0);
insert into question values(361, '', '', null, null, 0);
insert into question values(362, '', '', null, null, 0);
insert into question values(363, '', '', null, null, 0);
insert into question values(364, '', '', null, null, 0);
insert into question values(365, '', '', null, null, 0);
insert into question values(366, '', '', null, null, 0);
insert into question values(367, '', '', null, null, 0);
insert into question values(368, '', '', null, null, 0);
insert into question values(369, '', '', null, null, 0);
	
insert into question values(370, '', '', null, null, 0);
insert into question values(371, '', '', null, null, 0);
insert into question values(372, '', '', null, null, 0);
insert into question values(373, '', '', null, null, 0);
insert into question values(374, '', '', null, null, 0);
insert into question values(375, '', '', null, null, 0);
insert into question values(376, '', '', null, null, 0);
insert into question values(377, '', '', null, null, 0);
insert into question values(378, '', '', null, null, 0);
insert into question values(379, '', '', null, null, 0);
	
insert into question values(380, '', '', null, null, 0);
insert into question values(381, '', '', null, null, 0);
insert into question values(382, '', '', null, null, 0);
insert into question values(383, '', '', null, null, 0);
insert into question values(384, '', '', null, null, 0);
insert into question values(385, '', '', null, null, 0);
insert into question values(386, '', '', null, null, 0);
insert into question values(387, '', '', null, null, 0);
insert into question values(388, '', '', null, null, 0);
insert into question values(389, '', '', null, null, 0);
	
insert into question values(390, '', '', null, null, 0);
insert into question values(391, '', '', null, null, 0);
insert into question values(392, '', '', null, null, 0);
insert into question values(393, '', '', null, null, 0);
insert into question values(394, '', '', null, null, 0);
insert into question values(395, '', '', null, null, 0);
insert into question values(396, '', '', null, null, 0);
insert into question values(397, '', '', null, null, 0);
insert into question values(398, '', '', null, null, 0);
insert into question values(399, '', '', null, null, 0);