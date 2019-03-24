-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-12-11 03:07:36
-- 伺服器版本: 10.1.28-MariaDB
-- PHP 版本： 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `gsgf`
--

-- --------------------------------------------------------

--
-- 資料表結構 `act`
--

CREATE TABLE `act` (
  `ACT_id` int(5) NOT NULL,
  `ACT_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ACT_date` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ACT_CDTdata` datetime NOT NULL,
  `ACT_regtime` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ACT_photo` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `ACT_place` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ACT_area` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ACT_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ACT_web` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ACT_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ACT_toll` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `act`
--

INSERT INTO `act` (`ACT_id`, `ACT_name`, `ACT_date`, `ACT_CDTdata`, `ACT_regtime`, `ACT_photo`, `ACT_place`, `ACT_area`, `ACT_content`, `ACT_web`, `ACT_type`, `ACT_toll`) VALUES
(2, '清境跨年晚會', '2017年12月31日 20:00~01:30', '2017-12-31 20:00:00', '2017年12月31日 20:00', '<img src=\'/good_season_good_food/act/photo/2.jpg\'', '南投縣仁愛鄉清境農場遊客休閒中心', '南投縣', '2017南投縣清境跨年晚會活動31日在清境旅遊服務中心廣場前熱鬧登場！已經邁入第11年的清境跨年，今年主打星空電音、迎雪派對，除了有星座運勢大公開、電音派對，還有觀星老師的星空導覽，以及18度c巧克力、螢光棒等公益義賣，並穿插當地原鄉歌舞，現場還有泡泡機不時噴出如雪花般的泡泡，讓這場全台最高的跨年晚會熱鬧又溫馨，遊客們開心倒數迎接2017年的到來', 'http://www.cingjing.gov.tw/mien/ins.php?index_id=41', '其他', '免費'),
(3, '2017南投花卉嘉年華-魅力森巴FUN埔里(踩街)', '2017年12月16日13:00', '2017-12-16 13:00:00', '2017年12月16日13:00', '<img src=\'/good_season_good_food/act/photo/3.jpg\'', '埔里鎮南光國小-埔里鎮仁愛公園', '南投縣', '「2017南投花卉嘉年華-魅力森巴FUN埔里」，於11月隆重登場展開一系列宣傳造勢活動，自11月11日到12月10日每週六晚上於仁愛公園廣場舉辦「漫遙森巴音樂會」，12月16號更有踏街的活動。邀請森巴鼓隊、藝術舞蹈團、專業歌手等為活動進行暖場，用埔里熱情、埔里元素打造屬於埔里的「森巴嘉年華」。', 'http://www.puli.gov.tw/activity/ins.php?index_id=583&index_m_id=0', '其他', '免費'),
(4, '2017埔里是我的家攝影比賽', '2017年12月5日 - 2018年01月05日 17:00', '2018-01-05 17:00:00', '2018年01月05日 17:00', '<img src=\'/good_season_good_food/act/photo/4.jpg\'', '南投縣埔里鎮公所', '南投縣', '為提倡正當休閒活動及促進影藝交流，端正社會風氣，由攝影作品之交流介紹本鎮之人文風情、自然景觀等，為將埔里的美景與人文留下片刻即永恒的印記，特辦理攝影活動，並期透過活動的宣傳，吸引民眾前來埔里地區真實體驗、感受這裡的魅力風情及豐富人文。\r\n', 'http://www.puli.gov.tw/activity/ins.php?index_id=499&index_m_id=0', '藝文活動', '免費'),
(5, '竹藝博物館常設展', '2017年1月1日 09:00 ~ 2017年12月31日 17:00', '2017-12-31 17:00:00', '2017年12月31日 17:00', '<img src=\'/good_season_good_food/act/photo/5.jpg\'', '南投縣政府文化局', '南投縣', '南投縣因擁有豐富的竹林資源，生活常用食衣住行育樂等竹材遍佈，日治時代本縣東南之林圯埔大坪頂地區，因孟宗竹林相幽美、翠綠連綿，乃定名為竹山；民國63 年於竹山延平地區設立竹材專業加工區，推動竹產業。', 'http://www.nthcc.gov.tw/bamboo/index.asp', '藝文活動', '免費'),
(6, '南投陶常設展', '2017年1月1日 09:00 ~ 2017年12月31日 17:00', '2017-12-31 17:00:00', '2017年12月31日 17:00', '<img src=\'/good_season_good_food/act/photo/6.jpg\'', '南投縣文化園區 南投陶展示館', '南投縣', '近年來文建會推動社區總體營造，激發地方人士對本身鄉土文化的重視，南投地區亦然。為保存南投地區傳統文化，「南投陶展示館」於民國83年開始進行規劃，並展開相關史料蒐集、文物評鑑等工作。在行政院文建會的補助指導與各界人士共襄盛舉之下 ，於86年12月14日揭幕啟用...', 'http://www.nthcc.gov.tw/pottery/', '藝文活動', '免費'),
(7, '伊達邵逐鹿市集歌舞展演', '2017年1月1 11:20 - 12月31日  18:00 每週三固定公休1日', '2017-12-31 18:00:00', '2017年12月31日  18:00', '<img src=\'/good_season_good_food/act/photo/7.jpg\'', '伊達邵「逐鹿市集」表演場', '南投縣', '日月潭氣候溫和湖光山水景色宜人，加上週邊擁有五個原住民族群（布農族、泰雅族、邵族、鄒族、塞德克族）與聚落文化，物產與人文資源豐富，配合在地文化表演藝術的資源，確實是競逐世界級的旅遊景觀區塊。', 'https://www.sunmoonlake.gov.tw/tribaltour/TribalCulture/ItaThaw.htm', '藝文活動', '免費'),
(8, '「陶裡陶趣—玉山柴燒」特展活動', '2017年7月7日-2017年12月31日', '2017-12-31 00:00:00', '2017年12月31日', '<img src=\'/good_season_good_food/act/photo/8.jpg\'', '內政部營建署玉山國家公園管理處水里遊客中心', '南投縣', '玉山國家公園管理處（以下簡稱玉管處）將於106年7月7日起，於水里遊客中心辦理「陶裡陶趣—玉山柴燒」特展活動。為因應此次活動，展出者特別精心創作如玉山圓柏、台灣黑熊及動植物等柴燒陶藝作品，計82件，竭誠歡迎社會大眾、學校團體等蒞臨參觀。', 'http://www.ysnp.gov.tw/funcation/news_messagesr.aspx?path=155&id=2584', '藝文活動', '免費'),
(9, '揭露‧存在：顧何忠個展', '2017年9月2日  -  2017年12月17日', '2017-12-17 00:00:00', '2017年12月17日', '<img src=\'/good_season_good_food/act/photo/9.jpg\'', '毓繡美術館', '南投縣', '顧何忠於1990年畢業於中國文化大學美術系西畫組，2003年國立臺北藝術大學創作研究所畢業。1997年獲第4屆巴黎大獎選拔優選；2010年獲中國文藝藝術創作獎章（油畫類）。他的作品常見對生活靜物細膩的描繪，透過直接對物寫實的過程，傳遞作者所欲訴說的人生體悟與哲理。作品中的物件，除了被藝術家用油畫顏料樸實的勾勒出來外...', 'http://yu-hsiu收.org/home/exhibition_content/312', '藝文活動', '收費'),
(10, '花｜非花：須田悅弘個展', '2017年9月2日 ~ 2017年12月17日', '2017-12-17 00:00:00', '2017年12月17日', '<img src=\'/good_season_good_food/act/photo/10.jpg\'', '毓繡美術館', '南投縣', '「花 | 非花」作為須田悅弘在台灣的第一次個展，展出六件2017年的新作，靈感來自梵文文法中否定詞綴「अ」，梵語只要在詞頭加上否定詞綴「अ」，便會變成否定之意。「花/非花」以肯定與否定的辯證關係，說明須田的木雕物件既是花的形象，卻又不是生物體的花；作品既是花的木雕物件，同時又是須田營造出來的空間。', 'http://yu-hsiu.org/home/exhibition_content/311', '藝文活動', '收費'),
(11, '森林幻夢-攻玉山房寶玉石創作展', '2017年9月20日 09:00 - 2017年12月24日 17:00', '2017-12-24 17:00:00', ' 2017年12月24日 17:00', '<img src=\'/good_season_good_food/act/photo/11.jpg\'', '攻玉山房', '南投縣', '森林廣大且豐富，森林是大地之母，溫柔且堅定的保護著我們！隨時觀察大自然。大自然裡滿是雕刻作品!\r\n因此此次展覽的主題訂為【森林幻夢-攻玉山房寶玉石創作展】讓此次參展的寶玉石創作者將森林的虛實幻夢、\r\n豐富的動植物、廣闊的林相、田野傳奇、保育題材帶進創作中，運用寶玉石雕刻之切、磨、鋸、刻的技法，希望每件作品都有很精采的呈現，請您一起體會寶玉石雕刻之美！', 'https://event.culture.tw/NTCRI/portal/Registration/C0103MAction?useLanguage=tw&actId=70137', '藝文活動', '免費'),
(12, '劉木林水彩個展─旅人行腳', '2017年9月30日 - 2017年12月28日', '2017-12-28 00:00:00', '2017年12月28日', '<img src=\'/good_season_good_food/act/photo/12.jpg\'', '日月潭國家風景區', '南投縣', '水彩畫家─劉木林老師，原本從事板金黑手，但因為喜歡繪畫，靠著自學畫出一片天，畫作曾榮獲南美展西畫部曙光獎、日本國際美術功勞賞等殊榮，更被國內外美術館及收藏家收藏。', 'https://www.sunmoonlake.gov.tw/TravelActivityDetail.aspx?Cond=9c97f520-49fc-4d85-8c8f-e12fbed1f9ad', '藝文活動', '免費'),
(13, '「美麗日子」主題書展', '2017年11月1日 - 2017年12月31日', '2017-12-31 00:00:00', '2017年12月31日', '<img src=\'/good_season_good_food/act/photo/13.jpg\'', '南投縣政府文化局圖書館', '南投縣', '每到秋冬之際，皮膚總是狀況頻頻。肌膚質乾燥緊繃，好像隨時會裂開，泛紅等，各種問題防不勝防。為了讓肌膚在天氣與體質的內憂外患中，維持健康美麗，保濕絕對是我們的第一要務。想在秋冬繼續當個水嫩美人，把秘訣告訴你，這些書籍能讓大家輕鬆了解適合自己的肌膚。', 'http://www.nthcc.gov.tw/chinese/02NEWs/01news_view.asp?sn=11272', '藝文活動', '免費'),
(14, '竹影陶心茶具之舞展', '2017年11月4日 - 2017年12月31日  ', '2017-12-31 00:00:00', '2017年12月31日 ', '<img src=\'/good_season_good_food/act/photo/14.jpg\'', '溪頭自然教育園區 溪頭自然教育園區\r\n', '南投縣', '國立台灣工藝研究發展中心（NTCRI）與臺大實驗林共同策畫【竹影陶心茶具之舞展】，集結19位台灣竹工藝家、15位陶工藝家，展出29組245件茶席用具新作，作品涵蓋茶壺與杯、茶罐、茶盤、壺承、茶箱、茶則與茶匙、花器等器具，呈現台灣茶席的豐富型態；並邀請法籍竹藝創作者-羅仁特．馬丁(Laurent Martin Lo)的作品「漂浮茶屋」參與展出，期望藉由茶席蘊含的人文意象，建構出新形態的生活時尚。 ', 'http://ed.arte.gov.tw/ch/News/content_5.aspx?AE_SNID=15030', '藝文活動', '收費'),
(15, '2018 毛起來跑 寵物嘉年華', '2018年01月06日', '2018-01-06 00:00:00', '2017年11月16日 12:00 - 2017年12月10日 23:59', '<img src=\'/good_season_good_food/act/photo/15.jpg\'', '曬穀場前（台中市新社區協興街38號）', '台中市', '發揮扶輪社之「超我服務」及「服務最多，獲利最豐」的精神，啟動企業對社會的責任，舉行一場熱血、熱愛的快樂又健康的路跑活動，發揮關懷毛小孩的命運的力量，讓撲殺有盡頭，達成活動舉辦之目標。', 'http://run4mao.taiwan-hong.com/', '運動競賽', '收費');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `act`
--
ALTER TABLE `act`
  ADD PRIMARY KEY (`ACT_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
