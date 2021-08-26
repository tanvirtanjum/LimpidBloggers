-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 04:18 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `limpidbloggers_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloggers`
--

CREATE TABLE `bloggers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloggers`
--

INSERT INTO `bloggers` (`id`, `name`, `contact`, `blood_group`, `gender`, `birth_date`, `login_id`) VALUES
(1, 'Tanvir Tanjum Shourav', '+8801515217821', 'O+', 'Female', '1998-04-13', 3),
(3, 'Tanvir Ahmed', '+8801515784521', 'AB+', 'Male', '1994-08-03', 5),
(4, 'Kishore Morol', '+8801720014785', 'B+', 'Male', '1993-08-14', 6),
(5, 'Kritanjali Dhar', '+8801515484521', 'O-', 'Female', '1998-01-15', 7);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `post_time` datetime NOT NULL DEFAULT current_timestamp(),
  `comment_count` int(11) DEFAULT 0,
  `bookmark_count` int(11) DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `blogstatus_id` int(11) NOT NULL,
  `blogged_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `post_time`, `comment_count`, `bookmark_count`, `category_id`, `blogstatus_id`, `blogged_by`) VALUES
(1, 'Importance of big data', 'Companies use big data in their systems to improve operations, provide better customer service, create personalized marketing campaigns and take other actions that, ultimately, can increase revenue and profits. Businesses that use it effectively hold a potential competitive advantage over those that don\'t because they\'re able to make faster and more informed business decisions.\r\n\r\nFor example, big data provides valuable insights into customers that companies can use to refine their marketing, advertising and promotions in order to increase customer engagement and conversion rates. Both historical and real-time data can be analyzed to assess the evolving preferences of consumers or corporate buyers, enabling businesses to become more responsive to customer wants and needs.\r\n\r\nBig data is also used by medical researchers to identify disease signs and risk factors and by doctors to help diagnose illnesses and medical conditions in patients. In addition, a combination of data from electronic health records, social media sites, the web and other sources gives healthcare organizations and government agencies up-to-date information on infectious disease threats or outbreaks.\r\n\r\nHere are some more examples of how big data is used by organizations:\r\n\r\nIn the energy industry, big data helps oil and gas companies identify potential drilling locations and monitor pipeline operations; likewise, utilities use it to track electrical grids.\r\nFinancial services firms use big data systems for risk management and real-time analysis of market data.\r\nManufacturers and transportation companies rely on big data to manage their supply chains and optimize delivery routes.\r\nOther government uses include emergency response, crime prevention and smart city initiatives.', '2021-08-02 22:38:17', 7, 1, 3, 3, 1),
(8, 'The Huffington Post', 'The history of political blogging might usefully be divided into the periods pre- and post-Huffington. Before the millionaire socialite Arianna Huffington decided to get in on the act, bloggers operated in a spirit of underdog solidarity. They hated the mainstream media - and the feeling was mutual.\n\nBloggers saw themselves as gadflies, pricking the arrogance of established elites from their home computers, in their pyjamas, late into the night. So when, in 2005, Huffington decided to mobilise her fortune and media connections to create, from scratch, a flagship liberal blog she was roundly derided. Who, spluttered the original bloggerati, did she think she was?\n\nBut the pyjama purists were confounded. Arianna\'s money talked just as loudly online as off, and the Huffington Post quickly became one of the most influential and popular journals on the web. It recruited professional columnists and celebrity bloggers. It hoovered up traffic. Its launch was a landmark moment in the evolution of the web because it showed that many of the old rules still applied to the new medium: a bit of marketing savvy and deep pockets could go just as far as geek credibility, and get there faster.\n\nTo borrow the gold-rush simile beloved of web pioneers, Huffington\'s success made the first generation of bloggers look like two-bit prospectors panning for nuggets in shallow creeks before the big mining operations moved in. In the era pre-Huffington, big media companies ignored the web, or feared it; post-Huffington they started to treat it as just another marketplace, open to exploitation. Three years on, Rupert Murdoch owns MySpace, while newbie amateur bloggers have to gather traffic crumbs from under the table of the big-time publishers.\n\nLeast likely to post \'I\'m so over this story - check out the New York Times\'', '2021-08-10 21:24:10', 4, 1, 5, 3, 3),
(13, 'Boing Boing', 'Lego reconstructions of pop videos and cakes baked in the shape of iPods are not generally considered relevant to serious political debate. But even the most earnest bloggers will often take time out of their busy schedule to pass on some titbit of mildly entertaining geek ephemera. No one has done more to promote pointless, yet strangely cool, time-wasting stuff on the net than the editors of Boing Boing (subtitle: A Directory of Wonderful Things). It launched in January 2000 and has had an immeasurable influence on the style and idiom of blogging. But hidden among the pictures of steam-powered CD players and Darth Vader tea towels there is a steely, ultra-liberal political agenda: championing the web as a global medium free of state and corporate control.\n\nBoing Boing chronicles cases where despotic regimes have silenced or imprisoned bloggers. It helped channel blogger scorn on to Yahoo and Google when they kowtowed to China\'s censors in order to win investment opportunities. It was instrumental in exposing the creeping erosion of civil liberties in the US under post-9/11 \'Homeland Security\' legislation. And it routinely ridicules attempts by the music and film industries to persecute small-time file sharers and bedroom pirates instead of getting their own web strategies in order. It does it all with gentle, irreverent charm, polluted only occasionally with gratuitous smut.\n\nTheir dominance of the terrain where technology meets politics makes the Boing Boing crew geek aristocracy.', '2021-08-12 22:37:25', 0, 0, 6, 3, 1),
(15, 'Kottke', 'One of the early wave of blogging pioneers, web designer Jason Kottke started keeping track of interesting things on the internet as far back as 1998. The site took off, boosted partly through close links to popular blog-building website Blogger (he later married one of the founders). And as the phenomenon grew quickly, Kottke became a well-known filter for surfers on the lookout for interesting reading.\r\n\r\nKottke remains one of the purest old-skool bloggers on the block - it\'s a selection of links to websites and articles rather than a repository for detailed personal opinion - and although it remains fairly esoteric, his favourite topics include film, science, graphic design and sport. He often picks up trends and happenings before friends start forwarding them to your inbox. Kottke\'s decision to consciously avoid politics could be part of his appeal (he declares himself \'not a fan\'), particularly since the blog\'s voice is literate, sober and inquiring, unlike much of the red-faced ranting found elsewhere online.\r\n\r\nA couple of key moments boosted Kottke\'s fame: first, being threatened with legal action by Sony for breaking news about a TV show, but most notably quitting his web-design job and going solo three years ago. A host of \'micropatrons\' and readers donated cash to cover his salary, but these days he gets enough advertising to pay the bills. He continues to plug away at the site as it enters its 10th year.', '2021-08-16 16:28:32', 0, 1, 3, 3, 4),
(16, 'Dooce', 'One of the best-known personal bloggers (those who provide more of a diary than a soapbox or reporting service), Heather Armstrong has been writing online since 2001. Though there were personal websites that came before hers, certain elements conspired to make Dooce one of the biggest public diaries since Samuel Pepys\'s (whose diary is itself available, transcribed in blog form, at Pepysdiary.com). Primarily, Armstrong became one of the first high-profile cases of somebody being fired for writing about her job. After describing events that her employer - a dotcom start-up - thought reflected badly on them, Armstrong was sacked. The incident caused such fierce debate that Dooce found itself turned into a verb that is used in popular parlance (often without users realising its evolution): \'dooced - to be fired from one\'s job as a direct result of one\'s personal website\'.\r\n\r\nBehind Dooce stands an army of personal bloggers perhaps not directly influenced by, or even aware of, her work - she represents the hundreds of thousands who decide to share part of their life with strangers.\r\n\r\nArmstrong\'s honesty has added to her popularity, and she has written about work, family life, postnatal depression, motherhood, puppies and her Mormon upbringing with the same candid and engaging voice. Readers feel that they have been brought into her life, and reward her with their loyalty. Since 2005 the advertising revenue on her blog alone has been enough to support her family.', '2021-08-16 16:28:32', 0, 1, 1, 3, 5),
(17, 'Perezhilton', 'Once dubbed \'Hollywood\'s most hated website\', Perezhilton (authored by Mario Lavandeira since 2005) is the gossip site celebrities fear most. Mario, 29, is famous for scrawling rude things (typically doodles about drug use) over pap photos and outing closeted stars. On the day of Lindsay Lohan\'s arrest for drink-driving, he posted 60 updates, and 8m readers logged on.\r\n\r\nHe\'s a shameless publicity whore, too. His reality show premiered on VH1 last year, and his blogsite is peppered with snaps of him cuddling Paris Hilton at premieres. Fergie from Black Eyed Peas alluded to him in a song, and Avril Lavigne phoned, asking him to stop writing about her after he repeatedly blogged about her lack of talent and her \'freakishly long arm\'.', '2021-08-16 16:29:48', 0, 1, 4, 3, 1),
(18, 'Talking points memo', 'At some point during the disputed US election of 2000 - when Al Gore was famously defeated by a few hanging chads - Joshua Micah Marshall lost patience. Despite working as a magazine editor, Marshall chose to vent on the web. Eight years later Talking Points Memo and its three siblings draw in more than 400,000 viewers a day from their base in New York.\r\n\r\nMarshall has forged a reputation, and now makes enough money to run a small team of reporters who have made an impact by sniffing out political scandal and conspiracy. \'I think in many cases the reporting we do is more honest, more straight than a lot of things you see even on the front pages of great papers like the New York Times and the Washington Post,\' he said in an interview last year. \'But I think both kinds of journalism should exist, should co-exist.\'\r\n\r\nAlthough his unabashed partisan approach is admonished by many old-fashioned American reporters, Marshall\'s skills at pulling together the threads of a story have paid dividends. Last year he helped set the agenda after George Bush covertly fired a string of US attorneys deemed disloyal to the White House. While respected mainstream media figures accused Marshall of seeing conspiracy, he kept digging: the result was the resignation of attorney general Alberto Gonzales, and a prestigious George Polk journalism award for Marshall, the first ever for a blogger.', '2021-08-16 16:29:48', 0, 0, 1, 3, 3),
(19, 'Icanhascheezburger', 'Amused by a photo of a smiling cat, idiosyncratically captioned with the query \'I Can Has A Cheezburger?\', which he found on the internet while between jobs in early 2007, Eric Nakagawa of Hawaii emailed a copy of it to a friend (known now only as Tofuburger). Then, on a whim, they began a website, first comprising only that one captioned photo but which has since grown into one of the most popular blogs in the world.\r\n\r\nMillions of visitors visit Icanhascheezburger.com to see, create, submit and vote on Lolcats (captioned photos of characterful cats in different settings). The \'language\' used in the captions, which this blog has helped to spread globally, is known as Lolspeak, aka Kitty Pidgin. In Lolspeak, human becomes \'hooman\', Sunday \'bunday\', exactly \'xackly\' and asthma \'azma\'. There is now an effort to develop a LOLCode computer-programming language and another to translate the Bible into Lolspeak.', '2021-08-16 20:05:15', 0, 0, 5, 1, 5),
(20, 'Beppe Grillo', 'Among the most visited blogs in the world is that of Beppe Grillo, a popular Italian comedian and political commentator, long persona non grata on state TV, who is infuriated daily - especially by corruption and financial scandal in his country.\r\n\r\nA typical blog by Grillo calls, satirically or otherwise, for the people of Naples and Campania to declare independence, requests that Germany declare war on Italy to help its people (\'We will throw violets and mimosa to your Franz and Gunther as they march through\') or reports on Grillo\'s ongoing campaign to introduce a Bill of Popular Initiative to remove from office all members of the Italian parliament who\'ve ever had a criminal conviction. Grillo\'s name for Mario Mastella, leader of the Popular-UDEUR centre-right party, is Psychodwarf. \'In another country, he would have been the dishwasher in a pizzeria,\' says Grillo. Through his blog, he rallied many marchers in 280 Italian towns and cities for his \'Fuck You\' Day last September.', '2021-08-16 20:05:15', 0, 0, 6, 1, 1),
(21, 'Gawker', 'A New York blog of \'snarky\' gossip and commentary about the media industry, Gawker was founded in 2002 by journalist Nick Denton, who had previously helped set up a networking site called First Tuesday for web and media entrepreneurs. Gawker\'s earliest fascination was gossip about Vogue editor Anna Wintour, garnered from underlings at Conde Nast. This set the tone for amassing a readership of movers and shakers on the Upper East Side, as well as \'the angry creative underclass\' wishing either to be, or not be, like them, or both (\'the charmingly incompetent X... the wildly successful blowhard\'). Within a year Gawker\'s readers were making 500,000 page views per month. Nowadays the figure is 11m, recovering from a recent dip to 8m thanks to the showing of a Tom Cruise \'Indoctrination Video\' which Scientologists had legally persuaded YouTube to take down. Gawker remains the flagship of Gawker Media, which now comprises 14 blogs, although gossiping by ex-Gawker insiders, a fixation on clicks (which its bloggers are now paid on the basis of) and fresh anxiety over defining itself have led some to claim Gawker has become more \'tabloidy\' and celeb- and It-girl-orientated, and less New York-centric. But its core value - \'media criticism\' - appears to be intact.', '2021-08-16 20:05:15', 0, 0, 3, 1, 1),
(22, 'The Drudge Report', 'The Report started life as an email gossip sheet, and then became a trashy webzine with negligible traffic. But thanks to the decision in 1998 to run a scurrilous rumour – untouched by mainstream media – about Bill Clinton and a White House intern named Monica Lewinsky, it became a national phenomenon. Recent scoops include Barack Obama dressed in tribal garb and the fact Prince Harry was serving in Afghanistan. Drudge is scorned by journalists and serious bloggers for his tabloid sensibilities, but his place in the media history books is guaranteed. And much though they hate him, the hacks all still check his front page – just in case he gets another president-nobbling scoop.', '2021-08-16 20:05:15', 0, 1, 3, 3, 1),
(23, 'Xu Jinglei', 'Jinglei is a popular actress (and director of Letter From An Unknown Woman) in China, who in 2005 began a blog (\'I got the joy of expressing myself\') which within a few months had garnered 11.5m visits and spurred thousands of other Chinese to blog. In 2006 statisticians at Technorati, having previously not factored China into their calculations, realised Jinglei\'s blog was the most popular in the world. In it she reports on her day-to-day moods, reflections, travels, social life and cats (\'Finally the first kitten\'s been born!!! Just waiting for the second, in the middle of the third one now!!!!!!!! It\'s midnight, she gave birth to another one!!!!!!\'). She blogs in an uncontroversial but quite reflective manner, aiming to show a \'real person\' behind the celebrity. Each posting, usually ending with \'I have to be up early\' or a promise to report tomorrow on a DVD she is watching, is followed by many hundreds of comments from readers – affirming their love, offering advice, insisting she take care. Last year her blog passed the 1bn clicks mark.', '2021-08-16 20:05:15', 4, 1, 5, 3, 4),
(24, 'Mashable', 'Founded by Peter Cashmore in 2005, Mashable is a social-networking news blog, reporting on and reviewing the latest developments, applications and features available in or for MySpace, Facebook, Bebo and countless lesser-known social-networking sites and services, with a special emphasis on functionality. The blog\'s name Mashable is derived from Mashup, a term for the fusing of multiple web services. Readers range from top web 2.0 developers to savvy 13-year-olds wishing for the latest plug-ins to pimp up their MySpace pages.', '2021-08-16 20:07:01', 0, 0, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogstatus`
--

CREATE TABLE `blogstatus` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogstatus`
--

INSERT INTO `blogstatus` (`id`, `status`) VALUES
(3, 'Approved'),
(1, 'Pending'),
(2, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `bookmarked_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `blog_id`, `bookmarked_by`) VALUES
(4, 1, 3),
(7, 8, 1),
(8, 15, 1),
(9, 16, 1),
(10, 22, 4),
(11, 17, 4),
(12, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(4, 'Business'),
(2, 'Food'),
(6, 'Freelance'),
(5, 'Media'),
(3, 'Scientific'),
(1, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp(),
  `blog_id` int(11) NOT NULL,
  `commenter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `comment_time`, `blog_id`, `commenter_id`) VALUES
(5, 'Wonderful ', '2021-08-11 15:12:59', 1, 3),
(6, 'Good job', '2021-08-11 15:13:24', 1, 4),
(7, 'Nice work', '2021-08-11 15:14:16', 1, 5),
(8, 'Like it', '2021-08-11 15:19:30', 1, 3),
(9, 'Nice :)', '2021-08-11 15:20:17', 1, 3),
(12, 'Wonderful', '2021-08-12 23:15:14', 8, 1),
(13, 'Very nice', '2021-08-12 23:15:22', 8, 5),
(14, 'See you not for mind', '2021-08-12 23:15:31', 8, 4),
(15, 'Have a relax', '2021-08-12 23:15:47', 8, 1),
(16, 'Very Nice', '2021-08-16 20:07:44', 23, 5),
(17, 'Have a relax', '2021-08-16 20:07:51', 23, 3),
(18, 'See you not for mind', '2021-08-16 20:08:20', 23, 4),
(19, 'Nice Work', '2021-08-16 20:15:55', 23, 1),
(20, 'Thanks every one', '2021-08-16 20:16:15', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `salary` double(10,2) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `contact`, `blood_group`, `gender`, `birth_date`, `salary`, `login_id`) VALUES
(1, 'Shihab Ahmed', '+8801515050154', 'AB+', 'Male', '1998-08-20', 100000.00, 1),
(2, 'Sharaban Tahura Ethen', '+8801515111111', 'B+', 'Female', '1996-10-30', 80000.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `regstatus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `email`, `password`, `usertype_id`, `regstatus_id`) VALUES
(1, 'shihab@gmail.com', '12345', 1, 3),
(2, 'ethen@gmail.com', '12345', 2, 3),
(3, 'tanvir@gmail.com', '12345', 3, 3),
(5, 'tanvir2@gmail.com', '12345', 3, 3),
(6, 'kishore@gmail.com', '12345', 3, 3),
(7, 'kriti@gmail.com', '12345', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `registrationstatus`
--

CREATE TABLE `registrationstatus` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrationstatus`
--

INSERT INTO `registrationstatus` (`id`, `status`) VALUES
(3, 'Approved'),
(1, 'Pending'),
(2, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `type`) VALUES
(1, 'Admin'),
(3, 'Blogger'),
(2, 'Moderator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloggers`
--
ALTER TABLE `bloggers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `blogstatus_id` (`blogstatus_id`),
  ADD KEY `blogged_by` (`blogged_by`);

--
-- Indexes for table `blogstatus`
--
ALTER TABLE `blogstatus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status` (`status`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `bookmarked_by` (`bookmarked_by`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `commenter_id` (`commenter_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `usertype_id` (`usertype_id`),
  ADD KEY `regstatus_id` (`regstatus_id`);

--
-- Indexes for table `registrationstatus`
--
ALTER TABLE `registrationstatus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status` (`status`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloggers`
--
ALTER TABLE `bloggers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `blogstatus`
--
ALTER TABLE `blogstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registrationstatus`
--
ALTER TABLE `registrationstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bloggers`
--
ALTER TABLE `bloggers`
  ADD CONSTRAINT `bloggers_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `logins` (`id`);

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `blogs_ibfk_2` FOREIGN KEY (`blogstatus_id`) REFERENCES `blogstatus` (`id`),
  ADD CONSTRAINT `blogs_ibfk_3` FOREIGN KEY (`blogged_by`) REFERENCES `bloggers` (`id`);

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `bookmarks_ibfk_2` FOREIGN KEY (`bookmarked_by`) REFERENCES `bloggers` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`commenter_id`) REFERENCES `bloggers` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `logins` (`id`);

--
-- Constraints for table `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`usertype_id`) REFERENCES `usertypes` (`id`),
  ADD CONSTRAINT `logins_ibfk_2` FOREIGN KEY (`regstatus_id`) REFERENCES `registrationstatus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
