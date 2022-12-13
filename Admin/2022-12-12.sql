DROP TABLE category;

CREATE TABLE `category` (
  `cat_Id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `questions_added` varchar(255) NOT NULL DEFAULT '0',
  `no_of_items` int(11) NOT NULL,
  `time_limit` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO category VALUES("6","English","20","20","12 minutes");
INSERT INTO category VALUES("7","Mathematics","20","20","12 minutes");
INSERT INTO category VALUES("8","History","20","20","12 minutes");
INSERT INTO category VALUES("9","Filipino","20","20","12 minutes");
INSERT INTO category VALUES("10","Science","20","20","12 minutes");



DROP TABLE customization;

CREATE TABLE `customization` (
  `customID` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) NOT NULL,
  `status` varchar(150) NOT NULL DEFAULT 'Inactive',
  `date_added` varchar(100) NOT NULL,
  PRIMARY KEY (`customID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO customization VALUES("7","6207ad7e34af5.jpg","Active","2022-11-27");
INSERT INTO customization VALUES("8","wallpaperflare.com_wallpaper (1).jpg","Inactive","2022-11-27");
INSERT INTO customization VALUES("10","wallpaperflare.com_wallpaper.jpg","Inactive","2022-11-27");
INSERT INTO customization VALUES("11","minimalism-1644666519306-6515.jpg","Inactive","2022-11-27");
INSERT INTO customization VALUES("18","logo.png","Inactive","2022-11-27");
INSERT INTO customization VALUES("19","12.jpg","Inactive","2022-12-12");



DROP TABLE exam;

CREATE TABLE `exam` (
  `exam_Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_Id` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q1_remarks` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q2_remarks` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q3_remarks` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q4_remarks` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q5_remarks` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q6_remarks` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q7_remarks` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `q8_remarks` int(11) NOT NULL,
  `q9` int(11) NOT NULL,
  `q9_remarks` int(11) NOT NULL,
  `q10` int(11) NOT NULL,
  `q10_remarks` int(11) NOT NULL,
  `q11` int(11) NOT NULL,
  `q11_remarks` int(11) NOT NULL,
  `q12` int(11) NOT NULL,
  `q12_remarks` int(11) NOT NULL,
  `q13` int(11) NOT NULL,
  `q13_remarks` int(11) NOT NULL,
  `q14` int(11) NOT NULL,
  `q14_remarks` int(11) NOT NULL,
  `q15` int(11) NOT NULL,
  `q15_remarks` int(11) NOT NULL,
  `q16` int(11) NOT NULL,
  `q16_remarks` int(11) NOT NULL,
  `q17` int(11) NOT NULL,
  `q17_remarks` int(11) NOT NULL,
  `q18` int(11) NOT NULL,
  `q18_remarks` int(11) NOT NULL,
  `q19` int(11) NOT NULL,
  `q19_remarks` int(11) NOT NULL,
  `q20` int(11) NOT NULL,
  `q20_remarks` int(11) NOT NULL,
  `q21` int(11) NOT NULL,
  `q21_remarks` int(11) NOT NULL,
  `q22` int(11) NOT NULL,
  `q22_remarks` int(11) NOT NULL,
  `q23` int(11) NOT NULL,
  `q23_remarks` int(11) NOT NULL,
  `q24` int(11) NOT NULL,
  `q24_remarks` int(11) NOT NULL,
  `q25` int(11) NOT NULL,
  `q25_remarks` int(11) NOT NULL,
  `q26` int(11) NOT NULL,
  `q26_remarks` int(11) NOT NULL,
  `q27` int(11) NOT NULL,
  `q27_remarks` int(11) NOT NULL,
  `q28` int(11) NOT NULL,
  `q28_remarks` int(11) NOT NULL,
  `q29` int(11) NOT NULL,
  `q29_remarks` int(11) NOT NULL,
  `q30` int(11) NOT NULL,
  `q30_remarks` int(11) NOT NULL,
  `q31` int(11) NOT NULL,
  `q31_remarks` int(11) NOT NULL,
  `q32` int(11) NOT NULL,
  `q32_remarks` int(11) NOT NULL,
  `q33` int(11) NOT NULL,
  `q33_remarks` int(11) NOT NULL,
  `q34` int(11) NOT NULL,
  `q34_remarks` int(11) NOT NULL,
  `q35` int(11) NOT NULL,
  `q35_remarks` int(11) NOT NULL,
  `q36` int(11) NOT NULL,
  `q36_remarks` int(11) NOT NULL,
  `q37` int(11) NOT NULL,
  `q37_remarks` int(11) NOT NULL,
  `q38` int(11) NOT NULL,
  `q38_remarks` int(11) NOT NULL,
  `q39` int(11) NOT NULL,
  `q39_remarks` int(11) NOT NULL,
  `q40` int(11) NOT NULL,
  `q40_remarks` int(11) NOT NULL,
  `q41` int(11) NOT NULL,
  `q41_remarks` int(11) NOT NULL,
  `q42` int(11) NOT NULL,
  `q42_remarks` int(11) NOT NULL,
  `q43` int(11) NOT NULL,
  `q43_remarks` int(11) NOT NULL,
  `q44` int(11) NOT NULL,
  `q44_remarks` int(11) NOT NULL,
  `q45` int(11) NOT NULL,
  `q45_remarks` int(11) NOT NULL,
  `q46` int(11) NOT NULL,
  `q46_remarks` int(11) NOT NULL,
  `q47` int(11) NOT NULL,
  `q47_remarks` int(11) NOT NULL,
  `q48` int(11) NOT NULL,
  `q48_remarks` int(11) NOT NULL,
  `q49` int(11) NOT NULL,
  `q49_remarks` int(11) NOT NULL,
  `q50` int(11) NOT NULL,
  `q50_remarks` int(11) NOT NULL,
  `q51` int(11) NOT NULL,
  `q51_remarks` int(11) NOT NULL,
  `q52` int(11) NOT NULL,
  `q52_remarks` int(11) NOT NULL,
  `q53` int(11) NOT NULL,
  `q53_remarks` int(11) NOT NULL,
  `q54` int(11) NOT NULL,
  `q54_remarks` int(11) NOT NULL,
  `q55` int(11) NOT NULL,
  `q55_remarks` int(11) NOT NULL,
  `q56` int(11) NOT NULL,
  `q56_remarks` int(11) NOT NULL,
  `q57` int(11) NOT NULL,
  `q57_remarks` int(11) NOT NULL,
  `q58` int(11) NOT NULL,
  `q58_remarks` int(11) NOT NULL,
  `q59` int(11) NOT NULL,
  `q59_remarks` int(11) NOT NULL,
  `q60` int(11) NOT NULL,
  `q60_remarks` int(11) NOT NULL,
  `q61` int(11) NOT NULL,
  `q61_remarks` int(11) NOT NULL,
  `q62` int(11) NOT NULL,
  `q62_remarks` int(11) NOT NULL,
  `q63` int(11) NOT NULL,
  `q63_remarks` int(11) NOT NULL,
  `q64` int(11) NOT NULL,
  `q64_remarks` int(11) NOT NULL,
  `q65` int(11) NOT NULL,
  `q65_remarks` int(11) NOT NULL,
  `q66` int(11) NOT NULL,
  `q66_remarks` int(11) NOT NULL,
  `q67` int(11) NOT NULL,
  `q67_remarks` int(11) NOT NULL,
  `q68` int(11) NOT NULL,
  `q68_remarks` int(11) NOT NULL,
  `q69` int(11) NOT NULL,
  `q69_remarks` int(11) NOT NULL,
  `q70` int(11) NOT NULL,
  `q70_remarks` int(11) NOT NULL,
  `q71` int(11) NOT NULL,
  `q71_remarks` int(11) NOT NULL,
  `q72` int(11) NOT NULL,
  `q72_remarks` int(11) NOT NULL,
  `q73` int(11) NOT NULL,
  `q73_remarks` int(11) NOT NULL,
  `q74` int(11) NOT NULL,
  `q74_remarks` int(11) NOT NULL,
  `q75` int(11) NOT NULL,
  `q75_remarks` int(11) NOT NULL,
  `q76` int(11) NOT NULL,
  `q76_remarks` int(11) NOT NULL,
  `q77` int(11) NOT NULL,
  `q77_remarks` int(11) NOT NULL,
  `q78` int(11) NOT NULL,
  `q78_remarks` int(11) NOT NULL,
  `q79` int(11) NOT NULL,
  `q79_remarks` int(11) NOT NULL,
  `q80` int(11) NOT NULL,
  `q80_remarks` int(11) NOT NULL,
  `q81` int(11) NOT NULL,
  `q81_remarks` int(11) NOT NULL,
  `q82` int(11) NOT NULL,
  `q82_remarks` int(11) NOT NULL,
  `q83` int(11) NOT NULL,
  `q83_remarks` int(11) NOT NULL,
  `q84` int(11) NOT NULL,
  `q84_remarks` int(11) NOT NULL,
  `q85` int(11) NOT NULL,
  `q85_remarks` int(11) NOT NULL,
  `q86` int(11) NOT NULL,
  `q86_remarks` int(11) NOT NULL,
  `q87` int(11) NOT NULL,
  `q87_remarks` int(11) NOT NULL,
  `q88` int(11) NOT NULL,
  `q88_remarks` int(11) NOT NULL,
  `q89` int(11) NOT NULL,
  `q89_remarks` int(11) NOT NULL,
  `q90` int(11) NOT NULL,
  `q90_remarks` int(11) NOT NULL,
  `q91` int(11) NOT NULL,
  `q91_remarks` int(11) NOT NULL,
  `q92` int(11) NOT NULL,
  `q92_remarks` int(11) NOT NULL,
  `q93` int(11) NOT NULL,
  `q93_remarks` int(11) NOT NULL,
  `q94` int(11) NOT NULL,
  `q94_remarks` int(11) NOT NULL,
  `q95` int(11) NOT NULL,
  `q95_remarks` int(11) NOT NULL,
  `q96` int(11) NOT NULL,
  `q96_remarks` int(11) NOT NULL,
  `q97` int(11) NOT NULL,
  `q97_remarks` int(11) NOT NULL,
  `q98` int(11) NOT NULL,
  `q98_remarks` int(11) NOT NULL,
  `q99` int(11) NOT NULL,
  `q99_remarks` int(11) NOT NULL,
  `q100` int(11) NOT NULL,
  `q100_remarks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `math` int(11) NOT NULL,
  `filipino` int(11) NOT NULL,
  `science` int(11) NOT NULL,
  `history` int(11) NOT NULL,
  `date_of_exam` varchar(255) NOT NULL,
  PRIMARY KEY (`exam_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;




DROP TABLE questions;

CREATE TABLE `questions` (
  `quest_Id` int(11) NOT NULL AUTO_INCREMENT,
  `quest_category_Id` int(11) NOT NULL,
  `question` text NOT NULL,
  `choice_one` varchar(255) NOT NULL,
  `choice_two` varchar(255) NOT NULL,
  `choice_three` varchar(255) NOT NULL,
  `choice_four` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  PRIMARY KEY (`quest_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;

INSERT INTO questions VALUES("29","6","I wish I _____ those words. But now it\'s too late.","not having said","never said","have never said","had never said","never said");
INSERT INTO questions VALUES("30","6","The woman, who has been missing for 10 days, is believed _____.","to be abducted","to have been abducted","to be abducting","to have been abducting","to be abducted");
INSERT INTO questions VALUES("31","6","They didn\'t reach an agreement ______ their differences.","on account of","because","due","owing","because");
INSERT INTO questions VALUES("32","6","I\'m very happy _____ in India. I really miss being there.","to live","to have lived","to be lived","to be living","to live");
INSERT INTO questions VALUES("33","6","She was working on her computer with her baby next to _____.","herself","her","her own","hers","hers");
INSERT INTO questions VALUES("34","6","_____ to offend anyone, she said both cakes were equally good.","Not wanting","As not wanting","She didn\'t want","Because not wanting","Not wanting");
INSERT INTO questions VALUES("35","6","_____ in trying to solve this problem. It\'s clearly unsolvable.","There\'s no point","There isn\'t point","It\'s no point","It\'s no need","It\'s no point");
INSERT INTO questions VALUES("36","6","Last year, when I last met her, she told me she _____ a letter every day for the last two months.","had written","had been writing","has written","wrote","had been writing");
INSERT INTO questions VALUES("37","6","He _____ robbed as he was walking out of the bank.","had","did","got","were","did");
INSERT INTO questions VALUES("38","6","_____ forced to do anything. He acted of his own free will.","In no way was he","No way he was","In any way he was","In any way was he","In any way he was");
INSERT INTO questions VALUES("39","6","It _____ the best idea to pay for those tickets by credit card. It was too risky.","may not have been","might not be","may not be","must not have been","must not have been");
INSERT INTO questions VALUES("40","6","They _____ in the basement for three months.","were made sleeping","were made sleep","were made to sleep","made to sleep","were made sleeping");
INSERT INTO questions VALUES("41","6","We\'ll never know what might have happened _____ the email earlier.","if he sent","had he sent","if he has sent","did he sent","if he has sent");
INSERT INTO questions VALUES("42","6","If success _____, we need to prepare ourselves for every possible scenario.","is to be achieved","is achieved","will be achieved","is due to achieve","is due to achieve");
INSERT INTO questions VALUES("43","6","______ gifts to the judges.","It\'s not allowed offering","It\'s not permitted offering","It\'s not permitted to offer","It\'s not allowed to offer","It\'s not permitted offering");
INSERT INTO questions VALUES("44","6","I ______ bus on Mondays.","\'m going to work with","\'m going to work by","go to work with","go to work by","\'m going to work with");
INSERT INTO questions VALUES("45","6","Sorry, but this chair is ______.","me","my","mine","our","mine");
INSERT INTO questions VALUES("46","6","A: \'How old ______?\'   B: \'I ______ .\'","are you / am 20 years old.","are you / am 20 years.","have you / have 20 years old","do you have / have 20 years.","are you / am 20 years old.");
INSERT INTO questions VALUES("47","6","I ______ to the cinema.","not usually go","don\'t go usually","don\'t usually go","do not go usually","do not go usually");
INSERT INTO questions VALUES("48","6","Where ______ ?","your sister works","does your sister work","your sister work","do your sister work","does your sister work");
INSERT INTO questions VALUES("50","7","Which is greater than 4?","5","-5","-1/2","-25","5");
INSERT INTO questions VALUES("51","7","Which is the smallest?","-1","-1/2","0","3","-1");
INSERT INTO questions VALUES("52","7","Combine terms: 12a + 26b -4b – 16a.","4a + 22b","-28a + 30b","-4a + 22b","28a + 30b","-4a + 22b");
INSERT INTO questions VALUES("53","7","Simplify: (4 – 5) – (13 – 18 + 2)","-1","–2","1","2","2");
INSERT INTO questions VALUES("54","7","What is |-26|?","-26","26","0","1","26");
INSERT INTO questions VALUES("55","7","Multiply: (x – 4)(x + 5)","x2 + 5x - 20","x2 - 4x - 20","x2 - x - 20","x2 + x - 20","x2 + x - 20");
INSERT INTO questions VALUES("56","7","Factor: 5x2 – 15x – 20.","5(x-4)(x+1)","-2(x-4)(x+5)","-5(x+4)(x-1)","5(x+4)(x+1)","5(x-4)(x+1)");
INSERT INTO questions VALUES("57","7","Factor: 3y(x – 3) -2(x – 3)","(x – 3)(x – 3)","(x – 3)2","(x – 3)(3y – 2)","3y(x – 3)","(x – 3)(3y – 2)");
INSERT INTO questions VALUES("58","7","Solve for x: 2x – y = (3/4)x + 6.","(y + 6)/5","4(y + 6)/5","(y + 6)","4(y - 6)/5","4(y + 6)/5");
INSERT INTO questions VALUES("59","7","Find the value of 3 + 2 • (8 – 3)","25","13","17","24","24");
INSERT INTO questions VALUES("60","7","121 Divided by 11 is ","11","10","18","18","11");
INSERT INTO questions VALUES("61","7","60 Times of 8 Equals to","480","300","250","400","480");
INSERT INTO questions VALUES("62","7","Find the Missing Term in Multiples of 6 : 6, 12, 18, 24, _, 36, 42, _ 54, 60.","32, 45","30, 48","24, 40","25, 49","30, 48");
INSERT INTO questions VALUES("63","7","What is the Next Prime Number after 7 ?","13","12","14","11","11");
INSERT INTO questions VALUES("64","7","The Product of 131 × 0 × 300 × 4","11","0","46","45","0");
INSERT INTO questions VALUES("65","7","Solve 3 + 6 × ( 5 + 4) ÷ 3 - 7","11","16","14","15","14");
INSERT INTO questions VALUES("66","7","Solve 23 + 3 ÷ 3","24","25","26","27","24");
INSERT INTO questions VALUES("67","7","What is 6% Equals to","0.06","0.6","0.006","0.0006","0.06");
INSERT INTO questions VALUES("68","7","How Many Years are there in a Decade?","5 years ","10 years","15 years","20 years","10 years");
INSERT INTO questions VALUES("69","7","How Many Months Make a Century?","12","120","1200","12000","1200");
INSERT INTO questions VALUES("71","10","Which animal lays eggs?","Dog","Cat","Duck","Sheep","Duck");
INSERT INTO questions VALUES("72","10","A male cow is called?","Ox","Dog","Sheep","Monkey","Ox");
INSERT INTO questions VALUES("73","10","All animals need food, air, and ____ to survive.","House","Water","Chocolate","Fruits","Water");
INSERT INTO questions VALUES("74","10","Which one is a fur-bearing animal?","Hen","Crocodile","Tortoise","Cat","Cat");
INSERT INTO questions VALUES("75","10","What is Earth’s only natural satellite?","Sun","Mars","Venus","Moon","Moon");
INSERT INTO questions VALUES("76","10","The tree has a branch filled with green _____.","Hair","Root","Leaves","Trunk","Leaves");
INSERT INTO questions VALUES("77","10","What part of the body helps you move?","Eyes","Lungs","Pancreas","Muscles","Muscles");
INSERT INTO questions VALUES("78","10","The two holes of the nose are called?","Eyelids","Nostrils","Nails","Hair","Nostrils");
INSERT INTO questions VALUES("79","10","What star shines in the day and provides light?","Moon","Venus","Mars","Sun","Sun");
INSERT INTO questions VALUES("80","10","Legs have feet and arms have ___.","Ankles","Pelvis","Hands","Skull","Hands");
INSERT INTO questions VALUES("81","10","Which organ covers the entire body and protects it?","Liver","Heart","Skin","Brain","Skin");
INSERT INTO questions VALUES("82","10","Which shape is a round?","Rectangle","Circle","Square","Triangle","Circle");
INSERT INTO questions VALUES("83","10","Who invented the first functional telephone?","Albert Einstein","Nikola Tesla","Thomas Alva Edison","Alexander Graham Bell","Alexander Graham Bell");
INSERT INTO questions VALUES("84","10","What is the young one of a cow called?","Puppy","Kitten","Calf","Baby","Calf");
INSERT INTO questions VALUES("85","10","Dark rain clouds can give out lightning and ____.","Thunder","Snow","Sunlight","Wind","Thunder");
INSERT INTO questions VALUES("86","10","Your hands have four fingers and a ____.","Knee","Ankle","Elbow","Thumb","Thumb");
INSERT INTO questions VALUES("87","10","Which part of the bird lets it fly high in the sky?","Beak","Feet","Wings","Claws","Wings");
INSERT INTO questions VALUES("88","10","Animals that suckle their young one are called ____.","Reptiles","Birds","Amphibians","Mammals","Mammals");
INSERT INTO questions VALUES("89","10","What part of the plant conducts photosynthesis?","Branch","Leaf","Root","Trunk","Leaf");
INSERT INTO questions VALUES("90","10","What is the boiling point of water?","25°C","50°C","75°C","100°C","100°C");
INSERT INTO questions VALUES("91","8","Whose death sparked World War I?","Kaiser Wilhelm","Archbishop Ussher","Queen Victoria","Archduke Franz Ferdinand","Archduke Franz Ferdinand");
INSERT INTO questions VALUES("92","8","Which of these nations was neutral in World War I?","Germany","Norway","Italy","England","Norway");
INSERT INTO questions VALUES("93","8","Which of these ships was sunk by a German submarine?","Arizona","Lusitania","Titanic","Andrea Doria","Lusitania");
INSERT INTO questions VALUES("94","8","Which weapon was first used at the Battle of the Somme in World War I?","Submarine","Tank","Jet fighter","Chariot","Tank");
INSERT INTO questions VALUES("95","8","World War I ended in:","1925","1918","1920","1915","1918");
INSERT INTO questions VALUES("96","8","Which of these people was a spy in World War I?","James Bond","Mata Hari","Benedict Arnold","Serge Plekhanov","Mata Hari");
INSERT INTO questions VALUES("97","8","How many republics made up the former Soviet Union?","15","12","20","10","15");
INSERT INTO questions VALUES("98","8","When was the first Nobel Prize in economics awarded?","1969","1949","1909","1929","1969");
INSERT INTO questions VALUES("99","8","Which book was written by Niccolò Machiavelli?","The Once and Future King","The Prince","The Good Earth","War and Peace","The Prince");
INSERT INTO questions VALUES("100","8","Of what country was Simón Bolívar president?","Bolivia","Peru","Argentina","Chile","Peru");
INSERT INTO questions VALUES("101","8","Which Indian president was involved in the struggle for Irish independence?","V.V. Giri","Neelam Sanjiva Reddy","Gulzarilal Nanda","S. Radhakrishnan","V.V. Giri");
INSERT INTO questions VALUES("102","8","Who was Karl Marx’s associate and fellow political theoretician?","Friedrich Nietzsche","Friedrich II","Friedrich Engels","Friedrich Reich","Friedrich Engels");
INSERT INTO questions VALUES("103","8","Where were the Aegean Bronze Age civilizations located?","Algeria","India","Greece","Spain","Greece");
INSERT INTO questions VALUES("104","8","Which of these battles did not involve Roman soldiers?","Arretium","Chalons","Cannae","Thermopylae","Thermopylae");
INSERT INTO questions VALUES("105","8","Through which national park does the Continental Divide not pass?","Yellowstone","Rocky Mountain","Glacier","Yosemite","Yosemite");
INSERT INTO questions VALUES("106","8","On what peninsula in Washington would you find the Olympic Mountains?","Seattle Peninsula"," Puget Peninsula","Washington Peninsula","Olympic Peninsula","Olympic Peninsula");
INSERT INTO questions VALUES("107","8","Who was the first U.S. president to appear on television?","Richard Nixon","Ronald Reagan","Abraham Lincoln","Franklin Delano Roosevelt","Franklin Delano Roosevelt");
INSERT INTO questions VALUES("108","8","What automobile was named after Henry Ford’s only son?","Buick","Oldsmobile","Isuzu","Edsel","Edsel");
INSERT INTO questions VALUES("109","8","In what American state would you find Denali?","Alabama","Arkansas","Alaska","Arizona","Alaska");
INSERT INTO questions VALUES("110","8","Which state seceded from Virginia in 1863?","the District of Columbia","North Carolina","West Virginia","Maryland","West Virginia");
INSERT INTO questions VALUES("111","9","Ang kambal katinig ay...?  ","Pares Minimal","Klaster","Diptonggo","Salawikain","Pares Minimal");
INSERT INTO questions VALUES("112","9","Kilala bilang \"Huseng Batute\" ","Gregorio H. del Pilar","Melchora Aquino","Apolinario Mabini","Jose Corazon de Hesus","Melchora Aquino");
INSERT INTO questions VALUES("113","9","Tumatanggap ng kilos sa isang pangungusap ","Di - tuwirang layon"," Tuwirang layon","Simuno","Panaguri","Simuno");
INSERT INTO questions VALUES("114","9","Pahapyaw na pagbasa ","Sintaksis","Skimming","Sesura","Sukat","Sukat");
INSERT INTO questions VALUES("115","9","Awit na panghehele ","Lullaby","Sesura","Bugtong","Oyayi","Lullaby");
INSERT INTO questions VALUES("116","9","Ito ang mga salitang tumutukoy sa tao, bagay, hayop, lugar at pangyayari.","PANGAHALIP","PANGALAN","PANGNGALAN","KLASTER","PANGNGALAN");
INSERT INTO questions VALUES("117","9","Aling pangngalan ang naiiba sa pangkat?","KALABAW","MANOK","PUNO","KABAYO","MANOK");
INSERT INTO questions VALUES("118","9","Nagpunta kami sa parke at namasyal. Alin ang PANGNGALAN sa pangungusap?","KAMI","PARKE","NAMASYAL","NAGPUNTA","NAGPUNTA");
INSERT INTO questions VALUES("119","9","Lapis, Pantasa, Papel at Aklat. Ano ang kategorya ng Pangngalan?","TAO","LUGAR","BAGAY","PANGYAYARI","LUGAR");
INSERT INTO questions VALUES("120","9","Ito ay mga pangngalang tiyak at sigurado.","PAMBALANA","PANTANGI","KONGKRETO","PANGALAN","PANGALAN");
INSERT INTO questions VALUES("121","9","Aling titik ang gamit ng mga pangngalang pambalana?","MALIIT","MALIIT AT MALAKI","MALAKI","ALPABETO","MALIIT");
INSERT INTO questions VALUES("122","9","Ito ang mga pangngalang hindi tiyak o sigurado.","PANTANGI","PAMBALANA","PANGALAN","DIPTONGGO","DIPTONGGO");
INSERT INTO questions VALUES("123","9","Alin ang pangngalang pambalana ng salitang NIKE?","LAPIS","SAPATOS","KOMPYUTER","PAGKAIN","PAGKAIN");
INSERT INTO questions VALUES("124","9","Ipinagmamalaki ko ang aking mga KAIBIGAN.","BAGAY","PANGYAYARI","LUGAR","TAO","TAO");
INSERT INTO questions VALUES("125","9","Ibibili ko ng sapatos si kuya sa PALENGKE.","BAGAY","LUGAR","PANGYAYARI ","TAO","PANGYAYARI ");
INSERT INTO questions VALUES("126","9","Sabay sabay kaming nagdarasal sa simbahan tuwing KAARAWAN ni Lolo.","BAGAY","LUGAR","PANGYAYARI","TAO","TAO");
INSERT INTO questions VALUES("127","9","Nagluto si ATE ng spagetti noong pasko.","BAGAY","LUGAR","PANGYAYARI","TAO","BAGAY");
INSERT INTO questions VALUES("128","9","Ang mga anyong tubig at lupa ay biyaya ng Diyos sa atin.","pantangi","tahas","basal","lansakan","tahas");
INSERT INTO questions VALUES("129","9","Maipagmamalaki nang husto ng mga Pilipino ang kagandahan ng ating bansa. ","pantangi","tahas","basal","lansakan","lansakan");
INSERT INTO questions VALUES("130","9","Sa Pamantasan ng De La Salle nag-aaral ang mga nanalo sa volleball. ","pantangi","tahas","basal","lansakan","lansakan");



DROP TABLE user_answers;

CREATE TABLE `user_answers` (
  `ans_Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_Id` int(11) NOT NULL,
  `q1_answer` text NOT NULL,
  `q2_answer` text NOT NULL,
  `q3_answer` text NOT NULL,
  `q4_answer` text NOT NULL,
  `q5_answer` text NOT NULL,
  `q6_answer` text NOT NULL,
  `q7_answer` text NOT NULL,
  `q8_answer` text NOT NULL,
  `q9_answer` text NOT NULL,
  `q10_answer` text NOT NULL,
  `q11_answer` text NOT NULL,
  `q12_answer` text NOT NULL,
  `q13_answer` text NOT NULL,
  `q14_answer` text NOT NULL,
  `q15_answer` text NOT NULL,
  `q16_answer` text NOT NULL,
  `q17_answer` text NOT NULL,
  `q18_answer` text NOT NULL,
  `q19_answer` text NOT NULL,
  `q20_answer` text NOT NULL,
  `q21_answer` text NOT NULL,
  `q22_answer` text NOT NULL,
  `q23_answer` text NOT NULL,
  `q24_answer` text NOT NULL,
  `q25_answer` text NOT NULL,
  `q26_answer` text NOT NULL,
  `q27_answer` text NOT NULL,
  `q28_answer` text NOT NULL,
  `q29_answer` text NOT NULL,
  `q30_answer` text NOT NULL,
  `q31_answer` text NOT NULL,
  `q32_answer` text NOT NULL,
  `q33_answer` text NOT NULL,
  `q34_answer` text NOT NULL,
  `q35_answer` text NOT NULL,
  `q36_answer` text NOT NULL,
  `q37_answer` text NOT NULL,
  `q38_answer` text NOT NULL,
  `q39_answer` text NOT NULL,
  `q40_answer` text NOT NULL,
  `q41_answer` text NOT NULL,
  `q42_answer` text NOT NULL,
  `q43_answer` text NOT NULL,
  `q44_answer` text NOT NULL,
  `q45_answer` text NOT NULL,
  `q46_answer` text NOT NULL,
  `q47_answer` text NOT NULL,
  `q48_answer` text NOT NULL,
  `q49_answer` text NOT NULL,
  `q50_answer` text NOT NULL,
  `q51_answer` text NOT NULL,
  `q52_answer` text NOT NULL,
  `q53_answer` text NOT NULL,
  `q54_answer` text NOT NULL,
  `q55_answer` text NOT NULL,
  `q56_answer` text NOT NULL,
  `q57_answer` text NOT NULL,
  `q58_answer` text NOT NULL,
  `q59_answer` text NOT NULL,
  `q60_answer` text NOT NULL,
  `q61_answer` text NOT NULL,
  `q62_answer` text NOT NULL,
  `q63_answer` text NOT NULL,
  `q64_answer` text NOT NULL,
  `q65_answer` text NOT NULL,
  `q66_answer` text NOT NULL,
  `q67_answer` text NOT NULL,
  `q68_answer` text NOT NULL,
  `q69_answer` text NOT NULL,
  `q70_answer` text NOT NULL,
  `q71_answer` text NOT NULL,
  `q72_answer` text NOT NULL,
  `q73_answer` text NOT NULL,
  `q74_answer` text NOT NULL,
  `q75_answer` text NOT NULL,
  `q76_answer` text NOT NULL,
  `q77_answer` text NOT NULL,
  `q78_answer` text NOT NULL,
  `q79_answer` text NOT NULL,
  `q80_answer` text NOT NULL,
  `q81_answer` text NOT NULL,
  `q82_answer` text NOT NULL,
  `q83_answer` text NOT NULL,
  `q84_answer` text NOT NULL,
  `q85_answer` text NOT NULL,
  `q86_answer` text NOT NULL,
  `q87_answer` text NOT NULL,
  `q88_answer` text NOT NULL,
  `q89_answer` text NOT NULL,
  `q90_answer` text NOT NULL,
  `q91_answer` text NOT NULL,
  `q92_answer` text NOT NULL,
  `q93_answer` text NOT NULL,
  `q94_answer` text NOT NULL,
  `q95_answer` text NOT NULL,
  `q96_answer` text NOT NULL,
  `q97_answer` text NOT NULL,
  `q98_answer` text NOT NULL,
  `q99_answer` text NOT NULL,
  `q100_answer` text NOT NULL,
  `date_of_exam` varchar(255) NOT NULL,
  PRIMARY KEY (`ans_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;




DROP TABLE users;

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civilstatus` varchar(20) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `parentsAddress` varchar(255) NOT NULL,
  `parentsContact` varchar(50) NOT NULL,
  `parentsEmail` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `examineeCategory` varchar(255) NOT NULL,
  `interestedStrand` varchar(255) NOT NULL,
  `interestedCourse` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'user.jpg',
  `user_status` varchar(20) NOT NULL DEFAULT 'Pending',
  `user_type` varchar(20) NOT NULL DEFAULT 'Examinee',
  `verification_code` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("40","Erwin","Cabag","Son","","Male","Single","Bible Baptist","Filipino","1997-09-22","25","Sitio Upper Landing, Daanlungsod, Medellin, Cebu","","","","admin@gmail.com","9359428963","Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu","","","","0192023a7bbd73250516f069df18b500","user.png","Confirmed","Admin","374025","2022-09-10");
INSERT INTO users VALUES("59","Norlyn","Son","Gelig","","Female","Married","fsdgdf","gdf","2021-03-18","1","Sitio Upper Landing, Daanlungsod, Medellin, Cebu","","","","Norlyngelig16@gmail.com","9359428963","","","","","a1b0d5228df73c24196f32b30acc5285","12.jpg","Pending","Staff","","2022-12-12");



