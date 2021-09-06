-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql111.epizy.com
-- Generation Time: Feb 24, 2021 at 09:46 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_25411815_mysterium`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `title`, `icon`) VALUES
(1, 'Locked doors', 'icon1.png'),
(2, 'Deaths', 'icon2.png'),
(3, 'Disappearances', 'icon3.png'),
(4, 'Nature', 'icon4.png'),
(5, 'Murders', 'icon5.png'),
(17, 'Percia', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `timestamp` int(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `userID`, `timestamp`, `title`, `message`) VALUES
(84, 87, 1584550221, 'Perica', 'sadsad'),
(85, 87, 1584550276, 'Perica', 'ssaads'),
(86, 87, 1584550381, 'Perica', 'ddaas'),
(87, 87, 1584550430, 'Perica', 'saddsa'),
(88, 87, 1584550704, 'Percia', 'sj'),
(89, 87, 1584550706, 'Percia', 'sj'),
(90, 87, 1584550748, 'Perica', 'ssda'),
(91, 87, 1584550749, 'Perica', 'ssda'),
(92, 87, 1584550780, 'Perica', 'dasad'),
(93, 87, 1584550826, 'Perica', 'ssdads'),
(94, 87, 1584550828, 'Perica', 'ssdads'),
(95, 87, 1584550828, 'Perica', 'ssdads'),
(96, 87, 1584550829, 'Perica', 'ssdads'),
(97, 87, 1584550867, 'Perica', 'ssdads'),
(98, 87, 1584627289, 'Peirjj', 'disdjisj'),
(99, 87, 1584815499, 'Sajt', 'Ovo je mesto od koga me podilazi jeza i daje mi inspiraciju da ubijam ljude'),
(100, 87, 1585093397, 'Dobrodosli', 'Dnasnas sam tu da vam saoptim o svojim odlukama za predstojeci mesec u nadi da sece me saslusati i reci vase misljenje o iskustvu proslednjenom u nastakvu'),
(101, 87, 1585183092, 'Dboro Mi', 'dsadd'),
(102, 87, 1585183098, 'Dobro Dobro', 'sddfdfd'),
(103, 70, 1585319749, 'Dobrodosli moji divni prijatelji ovog dana', 'LALALAALLALA ALALA LAL LAL LAL ALALALALAL AL LAL AL AL AL AL ALA'),
(104, 87, 1585346650, 'Cao', 'CAO');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuID` int(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `menuTypeID` int(20) DEFAULT NULL,
  `social` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuID`, `href`, `name`, `icon`, `menuTypeID`, `social`) VALUES
(1, 'index.php?view=mysterium', 'Home', 'home', 1, NULL),
(2, 'index.php?view=mysterium&content=category', 'Category', 'storage', 1, NULL),
(3, '#modalAuthor', NULL, 'fas fa-user', 2, b'0'),
(4, '', NULL, 'fas fa-code', 2, b'0'),
(5, 'https://twitter.com/', NULL, 'fab fa-twitter-square', 2, b'1'),
(6, 'https://www.facebook.com/', NULL, 'fab fa-facebook-square', 2, b'1'),
(7, 'https://www.instagram.com/', NULL, 'fab fa-instagram', 2, b'1'),
(8, 'index.php?view=mysterium', 'Data', 'find_in_page', 3, NULL),
(9, 'index.php?view=mysterium&content=add', 'Add', 'add_box', 3, NULL),
(10, 'index.php?view=mysterium&content=edit', 'Edit', 'edit', 3, NULL),
(11, 'index.php?view=mysterium&content=delete', 'Delete', 'delete', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menutype`
--

CREATE TABLE `menutype` (
  `menuTypeID` int(20) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menutype`
--

INSERT INTO `menutype` (`menuTypeID`, `title`) VALUES
(1, 'user'),
(2, 'footer'),
(3, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `mystery`
--

CREATE TABLE `mystery` (
  `mysteryID` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `timestamp` int(255) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mystery`
--

INSERT INTO `mystery` (`mysteryID`, `title`, `content`, `image`, `timestamp`, `categoryID`) VALUES
(1, 'The Hidden Chamber of the Taj Mahal', 'The Taj Mahal is one of the most popular tourist attractions in India. In 1631, Shah Jahan began work on the temple, which was to be a monument to his late wife, Mumtaz Mahal, who had died giving birth to their 14th child. The temple, which took 22 years and 32 million rupees to complete, was truly a work of love. Although this breathtaking building attracts up to 8 million visitors every year, there are places in the temple that tourists never see.\r\n\r\nBelow the areas where tourists often visit, there is an entire story with entrances sealed behind marble arches. It is believed that there are 1,089 rooms in this hidden level. There is another floor, hiding approximately 22 rooms, hidden behind Hindu paintwork. Even on the open first floor, there are numerous mysterious locked doors that no one is able to unseal.\r\n\r\nWhat is hidden in these sealed areas? There are several theories. The prevailing belief is that these areas were built hastily and do not boast the same grandeur as the rest of the monument, so Shah Jahan wanted to keep anyone from seeing them. However, not everyone believes that this is the true secret of the mysterious locked doors.\r\n\r\nAccording to one theory, the sealed areas of the Taj Mahal are actually hiding the woman the monument immortalizes: Mumtaz Mahal. This theory purports that Shah Jahan secretly had his favorite wife mummified so that he could keep her close to him, even in death. This would have been a serious violation of the Islamic Commandments, and he would have been declared a heretic had the transgression been discovered.\r\n\r\nSome also believe that Mumtaz Mahal remains in the hidden rooms in more than just body; that her spirit haunts the rooms as well. Although the Shah built this epic monument in her honor, not everyone believes that this adored spouse was as happy in life as history would have us believe. Her husband, after all, had a harem numbering in the thousands, and he and his armies were known for their sexual violence.\r\n\r\nAre the sealed areas of the Taj Mahal home to the spirit of a scorned wife, or possibly even the spirits of the Shah’s many victims? The answers lie behind sealed doors that will likely never be opened.', 'lockedDoors1.jpg', 1583456510, 1),
(2, 'The Mystery of the Padmanabhaswamy Temple', 'Although the Taj Mahal is the most well-known temple in India, it is not the only one that tourists frequent, nor is it the only one that boasts mysterious locked doors.\r\n\r\nThe Padmanabhaswamy Temple is believed to have been built in the 6th century as a temple to the Hindu god, Vishnu. It is filled with precious treasures and since 1729, had been managed by the Travancore Royal Family. However, in 2011 their control was stripped away when accusations that they were mismanaging the temple’s treasures came to light. A committee took over the temple, and upon entering found six sealed vaults.\r\n\r\nThe vaults were not easy to open. They were sealed by iron doors with no locks, hatches, hinges, or any other indication of openings. Five of the doors were eventually opened, but one remains sealed: the mysterious Chamber B.\r\nChamber B is inexplicably absent from all records of the temple’s treasure, and there are many legends that have sprung up about it. Some believe that the chamber is somehow linked to the ocean floor, and opening it will cause a massive flood of Biblical proportions. Others claim that the Travancore Royal Family sealed the door with a spell cast by religious officials from numerous religions and that only a high priest can open it without bringing about disaster.\r\n\r\nSince the temple has been opened by the committee, there have been numerous attempts to open Chamber B. Many of the people who have been involved in these attempts have inexplicably fallen ill. Even Sunder Rajan, who was largely responsible for removing the Travancores from their stewardship of the temple, died not long after Chamber B was discovered.\r\n\r\nAre these illnesses and deaths just coincidences, or is there something dark and powerful lurking behind this locked door in the Padmanabhaswamy Temple? There are many who are still trying to open the chamber, but others believe it is better left alone.', 'lockedDoors2.jpg', 1583456290, 1),
(3, 'Beneath the Mausoleum of the First Qin Emperor', 'In 1974, five brothers digging a well in China made one of the greatest archeological discoveries in history. Little did they know that their discovery would be the first step to finding one of the world’s most mysterious locked doors.\r\n\r\nThe brothers found terracotta fragments that led to the discovery of a massive underground necropolis: the mausoleum of Qin Shi Huang, the First Qin Emperor. The necropolis was massive, and excavating just a small portion took years. One of the first and most famous discoveries was a group of over 7,000 terracotta statues of warriors and horses erected to protect the emperor’s tomb.\r\nThe brothers who were responsible for the initial discovery and excavation of the necropolis later came to regret their find. All five began to suffer immensely after the excavations began. They and their families began to face extreme financial hardships, soon sinking into poverty. They came down with mysterious diseases and were too poor to afford medicine. One of the five hanged himself to end his suffering, and the others eventually died, penniless. Many believe that the tomb they helped unearth is cursed and that the curse is the cause of their misfortune.\r\n\r\nThe actual tomb containing the remains of Qin Shi Huang has yet to be opened. The necropolis surrounding it is massive, so excavations will take decades. Many believe that the tomb itself should remain sealed. After the suffering that was visited on the brothers who first discovered the mausoleum, who knows what horrors could be waiting behind the mysterious locked doors of the tomb itself?', 'lockedDoors3.jpg', 1583456180, 1),
(4, 'The Hall of Records Below the Great Sphinx of Giza', 'The Great Sphinx of Giza is one of Egypt’s most iconic sites. Carved from a solid piece of limestone, it is an impressive feat of architecture and art. However, is this massive statue hiding one of history’s mysterious locked doors?\r\n\r\nIt isn’t an uncommon belief that the people of ancient Egypt had knowledge that modern societies can only dream of. How else could they have created impressive monuments such as the pyramids? Many who theorize about the ancient knowledge of Egypt believe that somewhere under the sands of Egypt lies a library holding its ancient secrets, known as the Hall of Records.\r\n\r\nCould this library be waiting beneath the Great Sphinx? Archeologists have long known that there are in fact caverns beneath the Sphinx, but the Egyptian government has so far not allowed any additional excavation or research into the caverns. What are these caves hiding? Could it be the lost knowledge of ancient Egypt?\r\n\r\nSome believe that there is good reason to leave the caverns unexplored. In addition to the Hall of Records, some theorize that the caverns were home to an ancient race of intelligent beings that are distinctly different from humanity. Some believe they were aliens. Some believe they were Atlantians. Some believe they were something else entirely.\r\n\r\nWhatever these beings were, many think that their home should remain undisturbed. Who knows what evils they left behind? Who knows if they ever left at all?', 'lockedDoors4.jpg', 1583456350, 1),
(5, 'The Terrors of Banff Springs Hotel Room 873', 'Ancient temples and monuments aren’t the only places where you can find mysterious locked doors. Sometimes, a simple hotel room can be the site of enough horrors to prompt its owners to seal it off for good.\r\nOne example of such a riddle can be found at the Banff Springs Hotel in Alberta, Canada. On the 8th floor of this picturesque hotel, you may notice that room 873 is mysteriously absent. Where the door to this room should be, you’ll find only a large expanse of empty wall. Although room 873 seems to have vanished, its door still exists behind this sealed-up section of wall. If you knock on this section of wall, you can clearly hear that it is hollow inside.\r\n\r\nAccording to the legends surrounding the room, many years ago a married couple checked into room 873 with their young daughter. They were a typical, happy family on holiday. That is, until they entered room 873. In the middle of the night, something in the room caused the husband to go insane, and he violently killed his wife and child before taking his own life.\r\n\r\nAfter the violent deaths, the hotel renovated the room and started renting it again, hoping to move past the tragedy. However, guests would regularly be awoken by blood-curdling screams, only to find bloody handprints marking the walls. Some were thrown from their beds or even found the bloody hands marking their own bodies.\r\n\r\nAre these incidents the result of the massacred family remaining in room 873? Or were these guests getting a taste of what drove the murderer mad? Either way, the hotel opted to lock the door to the room forever and seal it off behind a brick wall. Considering its bloody history, room 873 is another of the world’s mysterious locked doors that should probably remain closed.', 'lockedDoors5.jpg', 1583456700, 1),
(6, 'The Mary Celeste - mystery floating at sea.', 'On December 4, 1872, the “ghost ship” Mary Celeste was discovered sailing near the Azores Islands, unharmed and with her cargo intact—but without any crew. The abandonment of the Mary Celeste and the fate of her crew remains one of history’s greatest maritime mysteries.\r\n \r\nThe Mary Celeste had left New York City, New York, about a month earlier. The ship carried a cargo of industrial alcohol and was headed to Genoa, Italy. A crew of eight, plus the captain’s wife and son, were on board.  \r\n \r\nA British vessel spotted the Mary Celeste sailing erratically and investigated. They found the cargo mostly intact, instruments working, and all the crew and passengers’ valuable items still secure. The weather was good. The only unusual elements were one missing lifeboat, several broken barrels of alcohol, and a frayed rope trailing behind the ship.\r\n \r\nThere are many theories surrounding the mystery of the Mary Celeste, ranging from pirates to mutiny. One of the strongest theories is that insecure barrels of alcohol broke, and the fumes helped create sparks that startled the crew. Thinking the ship may explode, the crew and passengers of the Mary Celeste boarded the lifeboat, tied to the larger ship while the cargo hold “aired out” the fumes. With the lifeboat safely tied to the Mary Celeste, a storm may have hit. While the large, sturdy Mary Celeste survived the storm, the tiny lifeboat and single rope were much more vulnerable. No trace of the lifeboat or any survivor of the Mary Celeste has ever been found. ', 'disappearance1.jpeg', 1583456120, 3),
(8, 'Mallory and Irvine on Everest', 'In 1959, a group of 9 friends were going on a ski trip in Russia. All of them had a lot of experience skiing on the mountain in the past, and they were confident enough to camp out for the night in a tent. For some reason, they became so scared of something, they ripped open the tent from the inside with a knife. Two of the bodies were found frozen, stripped down to their underwear. Later, the bodies of their friends were found bundled up in their dead friend’s clothes to keep warm, buy they died as well. At first, it’s easy to pass this off as a case of hypothermia, but the strangest part about these deaths was that they were crushed by an “inhuman force”. All of their bodies were also riddled with radiation. The theories about what really happened to the hikers of Dyatlov Pass vary widely from avalanche, to getting caught up in a government experiment. People who believe in the supernatural also believe there is reason to believe that this was caused by aliens, or a yeti.\r\n', 'death1.jpeg', 1583456170, 2),
(9, 'The last flight of Amelia Earhart', 'When American aviator Amelia Earhart set out to become the first woman to fly around the world, she was already one of the most famous women in the world. Five years earlier, in May 1932, she had made a name for herself as the first woman to fly solo non-stop across the Atlantic. And in 1935, Earhart made the first solo flight from Honolulu, Hawaii, to Oakland, California. As such, the world was watching in July 1937, when the plane carrying Earhart and her navigator Fred Noonan on their round-the-world attempt went missing over the Pacific Ocean.\r\n\r\nEarhart and Noonan took off on July 2, from Lae in Papua New Guinea, bound for Howland Island, their next refueling stop, around 2,550 miles (4,110 km) away, across the ocean. As they approached what they thought was Howland Island, Earhart was able to make radio contact with a U.S. Coast Guard ship stationed to guide them in. But, Earhart\'s last radio messages indicated she was unable to locate either the ship or the island. [In Photos: Searching for Amelia Earhart]\r\n\r\nThe U.S. Coast Guard ship began a search immediately, joined by U.S. Navy ships in the days that followed. No remains of the aircraft were found, and the official search effort — at that time, the largest and most expensive in U.S. history — was called off after two weeks. \r\n\r\nStill, historical researchers have never given up on trying to find Earhart. Among recent efforts to find out just what happened to America’s pioneering aviator, researchers equipped with underwater robots have been exploring the waters around Nikimaroro Atoll, an island in the Kiribati region, for clues that they hope may lead them to the wreckage of her aircraft.', 'disappearance2.jpg', 1583456240, 3),
(10, 'The Baroness of the Galapagos', 'Eloise Wehrborn de Wagner-Bosquet, known as the \"Baroness of the Galapagos,\" was a young Austrian woman who disappeared in 1935 on the remote island of Floreana in the Galapagos Archipelago, in the eastern Pacific Ocean.\r\n\r\nFloreana had become famous in Germany after it was \"colonized\" in 1929 by a German couple, Friedrich Ritter and Dore Strauch, who eked out a primitive living in a house made from rocks and driftwood. Their celebrity attracted other German families to Floreana, seeking what they saw as a utopian lifestyle.\r\n\r\nIn 1933, the “Baroness” arrived, along with her two young German lovers, Robert Philippson and Rudolf Lorenz, and an Ecuadorian servant. After setting up house on the island, she announced plans to build a luxury hotel — and in the meantime, built a reputation for flamboyant living among the simple colonists of Floreana.\r\n\r\nOn March 27, 1934, the Baroness and her lover Philippson disappeared. Another German colonist claimed they had embarked on a passing yacht bound for Tahiti, but there were no records of such a yacht visiting the Galapagos at that time. A few days later, the Baroness’s other lover, Rudolph Lorenz, hurriedly left Floreana in a boat with a Norwegian fisherman, bound for the South American mainland. Their mummified bodies were found months later, stranded on a waterless island where their boat had foundered.\r\n\r\nResearchers speculate that Lorenz killed the Baroness and Philipson, and that other colonists helped him cover up the murders, but the disappearance of the Baroness of the Galapagos has never been solved.', 'murder1.jpg', 1583456340, 5),
(11, 'The Mysterious Disappearance of Flight 19', 'Flight 19 refers to a group of five U.S. Navy Grumman TBF Avenger warplanes that disappeared during a daytime training flight off the coast of Florida in December 1945. The strange event was one of the incidents that gave rise to the legend of the Bermuda Triangle.\r\n\r\nAll 14 airmen aboard the five Avengers were lost, as well as 13 crewmembers on a Navy flying boat that was sent up to search for them. No wreckage or bodies from either the Avengers or the flying boat have ever been found.\r\n\r\nThe disappearance of Flight 19 helped fuel the idea of a Bermuda Triangle between Florida, Puerto Rico and Bermuda, where there was supposedly a high number of aircraft and ship disappearances — although the U.S. Coast Guard reports that the number is nothing out of the ordinary.\r\n\r\nNonetheless, Flight 19 has become a staple of the Bermuda Triangle mythology, and is often linked to stories of the supernatural or UFOs. For instance, in the opening scenes of Steven Spielberg\'s 1977 science fiction film \"Close Encounters of the Third Kind,\" the aircraft of Flight 19 are discovered in a desert in Mexico, and the Flight 19 airmen return to Earth in the alien mothership in the final scenes of the film.', 'disappearance3.jpeg', 1583456130, 3),
(12, 'The Taman Shud case', 'Australia\'s most mysterious death is known as the Taman Shud case, from the Persian words printed on a scrap of paper in the pocket of a man found dead on a beach south of the city of Adelaide in December 1948.\r\n\r\nNo identification was found on the body — just a rail ticket, a comb, some cigarettes and the piece of paper with \"Taman Shud\" printed on it, which means \"The End\" in Persian. The paper had been torn from a rare edition of a poetry book, the \"Rubaiyat of Omar Khayyam,\" and \"Taman Shud\" are the last two words from that book.\r\n\r\nThe mystery deepened when a pathologist who carried out an autopsy suspected the man had been poisoned. The police also found a copy of the poetry book with the words \"Taman Shud\" torn out, and other pages filled with what appeared to be coded handwritten letters. The book also contained a phone number, which led the police to an Australian woman. She claimed not to know the dead man, and said she had once owned the book but lent it to someone else.\r\n\r\nIn 2009, Derek Abbott, a professor in the School of Electrical and Electronic Engineering at the University Of Adelaide, proposed that the coded letters in the book were traces of a manual encryption or decryption of a message using a one-time pad — an espionage technique that can be based on text from a book (in this case, probably the \"Rubaiyat of Omar Khayyam\").\r\n\r\nThe finding may give weight to the idea that the death in the Taman Shud case was linked to a foreign spy ring operating in Australia. But, the identity of the dead man remains unknown.', 'death2.jpeg\r\n', 1583456200, 2),
(13, 'The Dyatov Pass incident', 'In February 1959, searchers in the northern Ural Mountains in Russia found the abandoned campsite of a ski-trekking party of nine people who had been missing for several weeks. The tent had been torn in half, apparently from the inside, and filled with shoes and other belongings, while several sets of footprints, in socks or barefoot, led away into the snow.\r\n\r\nThe bodies of all nine hikers were eventually recovered, in May of that year, after the snow thawed. Most had died from hypothermia, but two had fractured skulls, two had broken ribs, and one was missing her tongue.\r\n\r\nThe case has become known as the Dyatov Pass Incident, after the name of the group leader, Igor Dyatov. The party was mostly made up of students or graduates from a university at Yekaterinburg in Russia’s Sverdlovsk region.\r\n\r\nAlthough the official Soviet investigation found the cause of the deaths was a \"compelling natural force\" — probably an avalanche — there is still no clear explanation of the events that occurred at Dyatov Pass. Some theories speculate that the party was attacked by wild animals, or that a mass panic caused by low-frequency sounds dispersed the group. There are even highly speculative links to alleged reports that UFOs had been seen in the area near that time.', 'death4.jpeg', 1583456090, 2),
(110, 'Ball Lightning', 'Normally lightning comes in zigzag bolts that strike down from the sky, but ball lightning is different. And rare. It surfaces during thunderstorms, resembling a circle of light that hovers close to the ground, drifting across the sky at just a few miles per hour. It lasts only for about a minute and its infrequent and random nature has made it almost impossible to study, with the first actual footage of it only being published in 2014. This means that the nature of this rare type of lightning remains unclear.', 'nature1.jpg', 1583456100, 4),
(111, 'Whistling Sand', 'Many sand dunes throughout the world, from the USA to Africa, to China to Qatar, produce noises, each making different sounds. Some produce a hum like the sound of bees, or music like a Gregorian chant with more than one note—a puzzle to scientists for years. The noises are probably due to wind passing over the dunes, another possibility being that they are made when sand grains move down the slopes of the dunes. The notes produced by sand depends on the size of the grains and the speed at which they flow, but why they make a sound like music is still unknown.', 'nature2.jpeg', 1583456500, 4),
(112, 'Bermuda Triangle', 'Missing Ships and Planes? Does the Bermuda Triangle really have strange powers ?\r\n\r\nThe Bermuda Triangle is a region in the western part of the North Atlantic Ocean in which ships, planes, and people are alleged to have mysteriously vanished\r\n\r\nFor decades, the Atlantic Ocean’s fabled Bermuda Triangle has captured the human imagination with unexplained disappearances of ships, planes, and people.\r\n\r\nSome speculate that unknown and mysterious forces account for the unexplained disappearances, such as extraterrestrials capturing humans for study; the influence of the lost continent of Atlantis; vortices that suck objects into other dimensions; and other whimsical ideas. Some explanations are more grounded in science, if not in evidence. These include oceanic flatulence (methane gas erupting from ocean sediments) and disruptions in geomagnetic lines of flux.\r\n\r\nEnvironmental considerations could explain many, if not most, of the disappearances. The majority of Atlantic tropical storms and hurricanes pass through the Bermuda Triangle, and in the days prior to improved weather forecasting, these dangerous storms claimed many ships. Also, the Gulf Stream can cause rapid, sometimes violent, changes in weather. Additionally, the large number of islands in the Caribbean Sea creates many areas of shallow water that can be treacherous to ship navigation. And there is some evidence to suggest that the Bermuda Triangle is a place where a “magnetic” compass sometimes points towards “true” north, as opposed to “magnetic” north.\r\n\r\nThe U.S. Navy and U.S. Coast Guard contend that there are no supernatural explanations for disasters at sea. Their experience suggests that the combined forces of nature and human fallibility outdo even the most incredulous science fiction. They add that no official maps exist that delineate the boundaries of the Bermuda Triangle. The U. S. Board of Geographic Names does not recognize the Bermuda Triangle as an official name and does not maintain an official file on the area.\r\n\r\nThe ocean has always been a mysterious place to humans, and when foul weather or poor navigation is involved, it can be a very deadly place. This is true all over the world. There is no evidence that mysterious disappearances occur with any greater frequency in the Bermuda Triangle than in any other large, well-traveled area of the ocean\r\n\r\nLost Planes & Ships in Bermuda Triangle\r\n\r\nHere are some of the most amazing stories of planes and ships that disappeared while crossing the triangle area. As you visit the links, you will also see my findings behind such great mysteries of all times.\r\n\r\nFlight 19: The Avenger planes of Flight-19 took off from the U.S Naval Base of Florida for a routine training session, but never returned.\r\n\r\nPBM Martin Mariner: When the hopes for Flight-19 was quickly fading, two Martin Mariner planes were sent by US Navy to search them out. One came back, but strangely the other didn’t. Read the full story.\r\n\r\nTudor Star Tiger: Star Tiger, a Tudor Mark-IV aircraft disappeared in Bermuda Triangle shortly before it was about to land at the Bermuda airport.\r\n\r\nFight DC-3: The flight DC-3 NC16002 disappeared when it was only 50 miles south of Florida and about to land in Miami.\r\n\r\nFlight 441: The flight 441, a Super Constellation Naval Airliner disappeared in October 1954.\r\n\r\nC-54 Skymaster: Apparently it seemed to be a sudden thunderstorm that had disintegrated the plane. But there was much more to the story.\r\n\r\nMary Celeste – The Ghost Ship: Known as one of the ghost ships of Bermuda Triangle, Mary Celeste had many misadventures even before her mystery voyage in 1872.', 'nature3.jpeg', 1583456220, 4),
(113, 'Devil’s Kettle Falls', 'The Brule River in Minnesota, USA drops 800ft in elevation over its course, forming waterfalls along the way. At one point, the river splits into two to flow around a huge rock. One side continues downstream, but the other falls into a hole known as the Devil’s Kettle. Here, it disappears underground, but no one has yet discovered where it emerges. Researchers have tried everything to find out where the water goes, including putting dye in the river and using ping-pong balls to track its course, but without success. There remains no geological explanation for the water’s disappearance.', 'nature4.jpg', 1583456370, 4),
(114, 'Hessdalen Lights', 'Above the Hessdalen valley in central Norway, strange balls of light float in the air. They appear in a variety of colours, such as blue, red and yellow, and in a variety of formations—sometimes flashing, sometimes moving about with great speed, and sometimes staying still in mid-air for up to an hour. They were particularly active during the 1980s, with up to 20 eyewitness reports made every week. The lights are of unknown origin, and there has been no explanation as to what they are, why they are there or where they come from. Project Hessdalen, a research effort launched in 1983, identified six different types of energy. But the source of the energy remains a mystery.', 'nature5.jpg', 1583456150, 4),
(115, 'Fairy Circles', 'These circular patterns of bare land, surrounded by a ring of stimulated plant growth, range in size from around 2 to 15 metres in diameter. They are found in southern Africa, particularly Namibia, but have also been discovered in Western Australia. They have long been a puzzle to scientists, with many explanations given for their cause. These include the actions of sand termites engineering the circles to create water troughs, radioactive soil, plant toxins, fungi, ostrich dust baths and sleeping spots of oryx. They may be caused by competition between the plants themselves, with the circles of stronger, more vibrant grasses around the edge sucking nutrients and moisture from the poor soil in the centre, but no one has yet to settle on a satisfactory explanation.', 'nature6.jpg', 1583456270, 4),
(116, 'Crooked Forest', 'Around 400 strange-looking pines grow in a forest in West Pomerania, Poland. They grow with an up to 90 degree bend right at their base. The reason why is not known and, what makes this phenomenon even stranger, is that the crooked trees are found within a bigger forest of normal, unbending pines. It is believed that they were planted in the 1930s and whatever it was that made them bend occurred when they were seven to ten years old. But to this day, no one has figured out what that was.', 'nature7.jpg', 1583456390, 4),
(117, 'Patomskiy Crater', 'Located deep in the Siberia forests, the Patomskiy Crater is a giant—the size of a 25 storey building. It looks like the mouth of a volcano, but there has been no volcanic activity in the area for millions of years. In fact, studies of nearby tree growth confirm that it is relatively recent. Theories as to what it is includes the possibility that it is the site of a meteorite hit, but it doesn’t resemble any other known meteorite site. Local people believe it to be an evil place, confirmed, at least in their minds, when the leader of a 2005 expedition to find out more about the crater died of a heart attack just kilometres from it.', 'nature8.jpg', 1583456110, 4),
(118, 'Jack the Ripper terrorized London', 'London’s most notorious serial killer prowled the East End over a century ago, preying on prostitutes and terrorizing the area. He made his mark as Jack the Ripper by killing and mutilating at least five women. Dread grew as the dead bodies began to pile up near each other within a three-month period in 1888. The neighborhood was “horrified to a degree bordering on panic,” when news broke of a second female victim, The Morning Post reported at the time. The local newspaper called the killing “barbarous,” and said the manner of the murder was “too horrible for description.”\r\n\r\nLocal authorities at first wondered whether the suspect was a butcher or a doctor due to his signature and gory method of murder — and his skill with a knife. The victims of the so-called “Whitechapel Murders” — Mary Ann Nichols, Annie Chapman, Elizabeth Stride, Catherine Eddowes and Mary Jane Kelly — all had their throats slashed, and most of them had their stomachs slit and organs ripped out before being dumped on the streets, according to author Dave Yost, who explores the five deaths in his book Elizabeth Stride and Jack the Ripper.\r\n\r\nThe FBI, which analyzed the case in 1988 at the behest of a movie production company, said each victim was known to be a heavy drinker and a prostitute. They were all targeted “because they were readily accessible” and were killed swiftly in the early morning hours.\r\n\r\nEven with all eyes on the case, police were never able to put a face to the killer. The FBI said local investigations were stymied because forensic technology and other advanced means of thoroughly investigating homicides were “nonexistent” at the time. The National Archives obtained letters exchanged between different law enforcement bosses in 1888 that depict overwhelmed police departments. Charles Warren, who was the chief commissioner of the Metropolitan Police at the time, asked for help from the City of London Police. “We are inundated with suggestions and names of suspects,” Warren wrote. Countless historians and criminologists — both amateur and professional — have speculated on the killer’s identity, but it appears Jack the Ripper took his secret to the grave.', 'murder2.jpg', 1583456300, 5),
(119, 'The Black Dahlia’s grisly death captured headlines', 'The sight stopped a mother and her child in their tracks. A naked woman was lying feet from the sidewalk. She was sliced cleanly in half at the waist, with not one drop of blood on her. The now-infamous slaying of 22-year-old Elizabeth Short instantly captured headlines in 1947, with newspapers later dubbing her the “Black Dahlia” in part because she had dark hair and an apparent preference for black clothing.\r\n\r\nShort, a Massachusetts native who had come to California in pursuit of fame, was bled dry before being dumped in an empty lot in a residential area of Los Angeles, authorities said. Her body appeared professionally dissected, and one breast was cut off, according to FBI records.\r\n\r\nIt’s unclear how the aspiring actor met such a grisly fate. Several dozens of people have claimed credit for the high-profile crime. The FBI, which helped local authorities investigate at the time, said it ran record checks on potential suspects and conducted interviews across the nation. However, none of the confessors appeared to be telling the truth, and the case has gone unsolved.\r\n\r\nThe murder became the subject of a 1987 novel, followed by a 2006 movie starring Josh Hartnett, Hilary Swank, Aaron Eckhart and Mia Kirshner.\r\n\r\nThe Los Angeles Police Department told TIME recently that it is still investigating the cold case, although it did not provide any details. “It’s an unsolved case,” LAPD Officer Norma Eisenman said. “There is no additional information per the detectives.”', 'murder3.jpeg', 1583456080, 5),
(120, 'The Zodiac Killer taunted police with clues', 'The “Zodiac Killer” was no ordinary murderer. Rather than avoiding the spotlight, he craved media attention and seemed to enjoy taunting police with cryptic notes and clues as he left a trail of death behind him.\r\n\r\nThe Zodiac Killer murdered five people — seemingly at random — in northern California in 1968 and 1969. He claimed in letters to police that there were dozens more victims, although that was never confirmed. His deadly rampage began in December 1968, when two teenagers were shot to death in a parking lot. About seven months later, another two people were shot in a parked car, although one survived. That’s when local newspapers started getting letters from someone anonymously claiming to be responsible for the slayings, according to the San Francisco Examiner, which had received the cryptic notes. The newspaper said the letters contained coded messages explaining the killer’s motive, as well as a key to help readers decipher his identity. “This is the Zodiac speaking,” he wrote in an August letter.\r\n\r\n“I like killing people because it is so much fun,” he added, according to FBI records. “It is more fun than killing wild game in the forest because man is the most dangerous animal of all.”\r\n\r\nAuthorities did not crack the code revealing his name, and the Zodiac Killer went on to stab two more people in late September. One of the victims survived, and the other died. About two weeks later, the killer struck again, fatally shooting a 29-year-old taxi driver, according to the Examiner. Days later, the Zodiac mailed a piece of his latest victim’s bloody shirt to the Chronicle newspaper.\r\n\r\nTo this day, no suspects have been confirmed in the case. The San Francisco Police Department said the investigation is ongoing.', 'murder4.jpg', 1583456230, 5),
(121, 'Death In Room 1046', 'On January 2nd of 1935, a man named Roland T. Owen checked into the Hotel President room number 1046 in Kansas City. The maid, Mary Soptic, came in to clean, and Owen said it was fine, but to leave the door unlocked, because he was expecting a friend. The maid thought this was strange and uncomfortable, because the room was very dark, except for one lamp dimly lighting the room. Owen remained sitting in the shadows. On the bedside table, there was a note that said, “Don, I will be back in 15 minutes.” The next morning, the maid knocked on the door and gathered the dirty towels. She witnessed Owen talking to “Don” on the phone. Later, she heard two voices from inside the room, who told her to go away.  A “Do not disturb” sign was then hung on the door, and no one heard anything from the guest for two days. When the hotel management tried to call the room, they discovered that the phone was off the hook, so they sent a bellboy to knock on the door and check. A voice from inside said, “Come in. Turn on the lights.” But the door was locked. One of the employees had to find a master key. He saw that Roland Owen was unconscious. The bellboy assumed he was drunk, laying on a “dark stain” on the bed, which was probably blood. He hung up the phone, and left.\r\n\r\nA few minutes later, the phone was off the hook again. When employees came back up a second time to hang up the phone, they saw splatters of blood all over the hotel room, and Owen had been beaten over the head. He had markings on his neck, indicating strangulation, and he was stabbed in the chest several times. He was on his hands and knees, holding his head. By no small miracle, Owen was still alive. When a detective arrived to ask who else was in the room, he replied, “nobody,” and claims that he fell on and hit his head on the bathtub. Of course, that doesn’t explain the strangulation, or the stabbing. Even though a lot of people heard Ronald Owen communicating with a man named “Don”, no one ever witnessed what he actually looked like.\r\n\r\nAfter he died, detectives realized that “Ronald Owen” didn’t actually exist, and he had used a false name. Before his funeral, an anonymous letter filled with money for a proper burial, flowers, and a note that said “Love forever, Louise.” were sent to his burial. His portrait was published in a newspaper, and the mother of Artemus Ogletree came forward to identify that Ronald Owen was actually her son. He was only 17 at the time of his death. No one knows who killed him, why, or what he was even doing so far from home under a false alias.', 'death3.jpeg', 1583456190, 2),
(122, 'The Atlas Vampire', 'In 1932 in Stockholm, Sweden, the body of a 32-year old sex worker named Lilly Lindstrom was found in her apartment. She would invite strange men into her apartment so they could pay her for sex, but she unknowingly brought in a man who was a real vampire.\r\n\r\nLindstrom’s body was found lying face-down on her bed. Her killer was having sex with her at the time of her death, because she was naked, and they left behind the condom. They beat her over the head, and then drained her body of almost all of its blood. The police found traces of saliva on her neck, and a blood-stained gravy ladle in the apartment. This lead the police to believe that the killer was drinking her blood. Lilly Londstrom’s regular clients were interviewed, as well as her friend who lived in the apartment below her, and yet no one had seen the man who killed her. The evidence is still on display in a museum in Stockholm. The detectives noted that a gravy ladle was found at the scene and on further inspection of the body, they realised her body had been drained of some, if not all, of her blood. Police suspected the implement was used by the perpetrator to drink Lilly’s blood. Various clients fell under suspicion but after a lengthy investigation, none were charged with her murder.\r\n\r\nThe murder taking place years before DNA evidence, investigators were unable to do much despite all the bodily fluids at the scene. Lilly’s regular clients were questioned and the neighbourhood was searched, but no suspects arose and nobody was ever charged with the murder.\r\nHer death remains unsolved.', 'death5.jpg', 1583456090, 2),
(123, 'The Villisca Axe Murders Shook A Small Iowa Town', 'In the year 1912, The Moore Family was brutally murdered by an intruder with an ax in Villisca, Iowa. Both parents, Joe and Sarah Moore, their four children, and two friends who came to spend the night were killed one-by-one by the same murderer. The front door was left unlocked, which was not uncommon back then. So the murderer was able to quietly tiptoe through the dark house with an oil lamp and chop them to bits in the middle of the night.\r\n\r\nSome people believe that the murderer must have known the Moore Family, because it would have been incredibly difficult for a stranger to figure out the layout of a house at night, with only a handheld oil lamp for light. After he chopped up his victims, he covered the faces of every person with sheets and clothing. The also covered all of the windows and mirrors with blankets, and washed his hands before leaving the house.\r\n\r\nThis was years before police were putting up yellow caution tape around crime scenes, so over 100 townspeople showed up to take a look at the Moore house, which we now know would have completely defiled any possible evidence that may have been there. The killer was never found. Today, the Moore House has been kept as a museum. Some visitors believe that the house is haunted.', 'murder5.jpg', 1583456320, 5),
(124, 'The Mysterious Suicide Forest of Japan', 'There are some places on this Earth that just seem to be cursed. For whatever reason, these insidious locations are infused with an almost palpable evil that pervades the landscape and creeps into the mind. Among these forsaken habitats of menace, we can find some that hide amongst some of the world’s most gorgeous landscapes; places of coiled evil waiting to pounce whilst shrouded in natural beauty.\r\n\r\nAt the foot of Japan’s iconic Mt. Fuji, lying sprawled amongst some of the most majestic scenery in Japan, is one such place. At the base of this picturesque mountain lies the haunted destination of broken souls known as Aokigahara, often referred to as the “Sea of Trees” and more infamously as the demon infested “Suicide Forest.” Aokigahara Forest lies at the northwest base of Mt. Fuji, which looms overhead with its majestic peak.  It is a starkly beautiful landscape renowned for its breathtaking scenery and vistas. The forest itself is approximately 35 square km (14 square miles) in area and from a distance seems like an idyllic, pristine wilderness area. However, looks can be deceiving.\r\n\r\nThe moment one steps into Aokigahara, it quickly becomes apparent that something is slightly off about the place. The first thing one may notice is the disconcerting silence here. The density of of the closely packed trees blocks the sun and wind, producing a dark, eerie blanket of quiet, which is further compounded by the curious lack of wildlife in the area.  The sounds of birds and other wildlife that one might expect to hear chirping and chattering in abundance are oddly absent or subdued, as if they have shunned this place or are hiding from something. Some have described the quality of sounds here as somewhat muted, as if being heard through a thick veil or from another room. One may also notice that compasses do not work properly here. The needle may jerk and jump about spasmodically, or conversely do slow, languid circuits around and around. It is said that this is caused by magnetic anomalies induced by the rich deposits of magnetic iron in the area’s volcanic soil, yet the disorienting effect of the forest goes beyond merely rendering compasses useless. Many hikers that venture into Aokigahara, even experienced ones, claim that it is oddly easy to get lost or confused in this dark and silent place. It is not uncommon to hear stories of hikers inexplicably traveling around in circles, or of being unable to navigate even short distances successfully. This bizarre effect has led to many visitors planting markers or plastic tape in order not to lose their way.\r\n\r\nOne may also become aware of the bizarre and creepy litter strewn about the forest floor. Pairs of shoes, both for children and adults, lined up upon moss covered, gnarled logs. A packet of entirely mundane photographs, song lyrics scrawled upon the envelope, lying forgotten and untouched amongst the underbrush. A child’s doll lying wide eyed atop the twisted roots of a tree, its vacant eyes staring up as if trying to peer through the crooked branches above that blot out the sky. One can find a plethora of such odd trinkets and abandoned items interspersed among the trees. These items seem jarring and out of place here on the forest floor of this otherwise pristine wilderness, and only serve to add to a growing sense of foreboding. Regardless of such eery occurrences, many tourists still visit the area to see the magnificent scenery and the numerous rocky caverns scattered throughout the forest. Many of these caverns are dangerous to the unwary, and warning signs are a common sight interspersed amongst the thick trees, yet large numbers of visitors still brave the trek to see them every year.\r\n\r\nAbove and beyond the unsettling elements of the forest, there is an even darker side to Aokigahara. In addition to those brought here for the scenic beauty, caverns, and hiking, there are also the droves of poor, lost souls who come here every year to die.\r\n\r\nOften referred to rather morbidly as “The perfect place to die,” Aokigahara is said to be the most popular place to go to commit suicide in Japan and the second in the world after The Golden Gate Bridge in San Fransisco. Since at least the 1950s, the forest has attracted ever growing numbers of people who come to the solitude here for their final breaths, with 2003 seeing a record number of 108 suicides. These are only the bodies that are found by monthly patrols and annual “body hunts,” in which police and volunteers scour the forest for victims. It is said that this number is likely even higher due to the remoteness of some of the areas within the forest, the numerous caves, crevasses, and caverns, and the forest’s ability to quickly and thoroughly decompose remains. Some of the bodies of these victims are stumbled across by visitors to the area, who while hiking through the otherwise beautiful wilderness may happen across the horrific sight of a corpse hung from a tree or a skeleton with its legs poking out of the dense foliage on the forest floor. It is difficult for police and volunteers to locate all of the dead hidden away within this dark wood, or to accurately estimate how many have died. The only thing that seems to be known for sure is that every year the number of those who come to Aokigahara to die seems to be increasing.\r\n\r\nThose looking to end their lives here have become so common that locals say they can easily spot the three types of visitors to the forest: hikers interested in seeing the stunning vistas of Mount Fuji, curious thrill seekers hoping for a glimpse of the macabre, and those who don’t plan on returning. In an effort to end the alarming trend of people coming to Aokigahara to end their lives, certain measures have been implemented such as putting up signs throughout the area urging those who have given up hope to reconsider their actions and turn back, as well as installing security cameras and sending out police patrols. Even with such measures, it is thought that at least a hundred people a year likely meet their doom here. According to some, these lonely souls who are contemplating suicide are mysteriously and inexorably drawn to Aokigahara by supernatural forces within the forest that beckon them to come. Some survivors of suicide attempts in Aokigahara have told of having had the vague feeling of being somehow called to or pulled towards the forest, and of having the inexplicable compulsion to make the journey there.\r\n\r\nAokigahara is certainly not without its paranormal happenings. Even before records were kept on suicides within Aokigahara forest, the area had long been steeped in spooky lore and mythology. The dim forest was long thought to be the haunt of demons and ghosts who prowled the landscape and terrified travelers. It is also believed that it was once a popular place for the gruesome practice of ubasute, a custom in which a sick or elderly relative was allegedly abandoned in a desolate location such as a remote mountain or forest and left to die. In the case of Aokigahara, it was said that the victims of ubasate here became vengeful ghosts relentlessly prowling the twisted trees. Many believe that the suicides committed in the forest have permeated the very trees in Aokigahara, generating paranormal activity, driving away wildlife, and preventing many who enter from ever escaping the forest’s grasp. These people say that the forlorn souls of those who committed suicide in Aokigahara are doomed to eternally inhabit its depths, trapped within the gnarled trees and forever beckoning others to join them.\r\n\r\nThe reasons for wanting to end one’s life are as varied as the people who come to Aokigahara to do so, yet one thing they all have in common is that something has brought them all from their far flung lives to this particular spot to do it. What quality is it that drives them to converge here in this shadowy, quiet wilderness to carry out their morbid business? Is it simply the tranquil beauty of the place, or the privacy afforded by the low probability of encountering anyone else in such a dense and vast forest? Or are they being beckoned by demons, ghosts, vengeful spirits, or some other inscrutable evil force?\r\n\r\nOnly those despairing, forgotten souls who spent their last moments in this dark quiet in the shadow of Mt. Fuji will ever know for sure.', 'nature9.jpeg', 1583456520, 4);
INSERT INTO `mystery` (`mysteryID`, `title`, `content`, `image`, `timestamp`, `categoryID`) VALUES
(125, 'Malaysia Airlines Flight 370', 'In what is perhaps the most baffling and tragic aviation mystery of all time, more than 200 people on board Malaysia Airlines Flight 370 appeared to vanish mid-air on March 8, 2014. Despite government officials setting out on what they called an “unprecedented” search by air and sea that involved multiple countries and spanned at least three years, the aircraft and the remains of the 239 passengers remain missing. It’s also still unclear what caused the commercial plane to suddenly veer off course.\r\n\r\nThe trip began as usual when the Beijing-bound Boeing 777 aircraft departed as scheduled from Kuala Lumpur, Malaysia, carrying 12 crew members and 227 passengers. But it went missing soon after a routine handover between air traffic control systems. Instead of heading to its planned destination, the aircraft flew back across the Malaysian Peninsula and made its way to the southern Indian Ocean, officials said.\r\n\r\nDuring a news conference last summer, after the release of the latest safety investigation report into the incident, lead investigator Kok Soo Chon said no cause could be confirmed or ruled out. “Due to the significant lack of evidence available to the team,” he said, “we are unable to determine with any certainty the reason that the aircraft diverted.” At some point, the aircraft systems were manually turned off. But Kok said signs did not appear to indicate that the flight’s pilots had maliciously cut off communication. (Some aviation experts had contradicted this conclusion in a 60 Minutes Australia special in May 2018.) There was also the possibility that a third party illegally interfered, investigators said. However, Kok pointed out the unusual fact that no one has since claimed responsibility for the act. “Who would do it just for nothing?” he said.', 'disappearance4.jpg', 1583456330, 3),
(126, 'The strange disappearance of Kenny Veach', 'On Monday, November 10, 2014, Kenneth Lee Veach, known by friends and family as Kenny, told his family that he was going on “a short, overnight trip” into the Sheep Mountains in Nevada. The 47-year-old hiker then headed out and never returned home.\r\n\r\nKenny’s disappearance was as unceremonious as his exit, and few concrete clues were ever found. However, the truly bizarre aspects of the story begin not with Kenny’s November 10th hike, but a little over a month earlier. Oddly, it all seems to have began with an off-handed comment on a Youtube video. Kenny Veach was an experienced solo hiker in the unforgiving Nevada desert who became famous when he disappeared. The video of his last post went viral on You Tube in 2014. He called the treks “soul hikes”, in which he meandered all over the area by Nellis Air Force Base and the place we call Area 51. In this instance, he was hiking just North of Las Vegas, in the Sheep mountains, and discovered this cave whose entrance was shaped like a capital ‘M’. As Kenny got closer to the entrance of the cave, his body began to vibrate. The closer he walked, the more it vibrated. It was at that time he pulled out his only line of defense a knife. As he walked forward, he vibrated, finally becoming so frightened that he ran away from the cave… Taking his footage, he went home and put the whole thing up on You Tube. Kenny was 47-years-old, and by all accounts was a likeable, decent man, with a passion for hiking. In his video, he is affable and enthusiastic. He was described by a relative as a bit of an “adrenalin junkie”.\r\n\r\nFrom what I read about him it was true. He once picked up a rattlesnake and had to be hospitalized for a week. He did not take much in the way of supplies. He would be gone for days with a chocolate bar and water. He even admitted he put his body through a lot. Once he hiked so long his toenails turned black and fell off.\r\n\r\nThe area Kenny was hiking around was full of old mine shafts that the military had dumped barrels of chemicals into…..It was about 7 miles from the testing range so it was very isolated. It was a place well known for having drug addicts take up residence in, and a popular dumping ground for murder victims bodies. So, one of his biggest mistakes is that he went alone.\r\n\r\nThe first You Tube video was received with mixed reviews. Immediately people commented that he was lying about the experience. Others dared him to go back and get more footage. So, he did with a little water, and a rutger 9mm gun. He overlooked the cave in the second video…which got bad comments on his You Tube page, one that suggested that he kill himself. So, Kenny went back again, inviting all who wanted to come with him. No one did. Kenny was last seen November 10, 2014. He has not been seen since. His phone was found in Sheep mountains on a rock, near a mine shaft. The shaft was searched, but no Kenny. He has not been seen since. So, was Kenny murdered because he stumbled on some secret government project? Did he commit suicide? Or was he just a high-risk hiker than ran out of luck? A few days after Kenny disappeared his girlfriend posted a note on You Tube in the comment section, in which she states she reported him missing and he had not been found. She finished by encouraging all hikers to take GPS with them.\r\n\r\nShe went on to tell people later that though Kenny seemed in good spirits and up beat that he suffered from depression and refused medication. An interesting side note, is that Kenny’s father committed suicide when he was 20 years old. He said if he ever decided to do that, no one would find his body.', 'disappearance5.jpg', 1583456560, 3),
(127, 'The strange and paranormal murder of Charles Walton', 'Charles Walton was a native of the small village of Lower Quinton in Warwickshire, England. He was found murdered on the valentines night, 14 February 1945 in somewhat mysterious circumstances at a small farm known as The Firs, situated on the slopes of Meon Hill. The local Chief Inspector, Robert Fabian was asked to lead the investigation into Walton’s death. Very quickly the inspector came to a dead end with his investigation and failed to gather sufficient evidence to charge anyone with the murder.\r\n\r\nThe case has earned considerable notoriety because some believe Walton was killed as a blood sacrifice or as part of a witchcraft ceremony or, indeed, because he was suspected of being a witch himself.\r\nHowever, it is known that the chief suspect was the manager of The Firs, a man named Alfred John Potter, for whom Walton was working on the day he died. It is the oldest unsolved murder on the Warwickshire Constabulary records. On 14 February 1945 Walton left his home with a pitchfork and a slash hook – a double-edged pruning implement with a sharpened straight edge on one side and concave cutting edge on the other. He was seen by two witnesses to have passed through the churchyard between 9 am and 9.30 am. This was the last recorded sighting of Walton alive.\r\n\r\nCharles was expected to be home by 4 pm. His wife, Edith returned home at about 6 pm and was worried to find that Charles was not there. His solitary nature and regular habits gave her no solace that he might be in the local pub or visiting a friend.\r\n\r\nEdith went to see her neighbour, an agricultural worker by the name of Harry Beasley who lived at 16 Lower Quinton. Together they made their way to The Firs to alert Alfred Potter. Potter claimed to have last seen Charles earlier in the day, slashing hedges in Hillground. The three of them set out in the direction of the spot where Charles had last been seen and eventually found his body near a hedgerow. The scene was a shocking one because the murderer had beaten Walton over the head with his own stick, had cut his neck open with the slash hook, and driven the prongs of the pitchfork either side of his neck, pinning him to the ground. The handle of the pitchfork had then been wedged under a cross member of the hedge and the slash hook had been buried in his neck. The first strange fact the investigation uncovered related to the murder of eighty-year-old Ann Tennant, a resident of Long Compton, some fifteen miles from Lower Quinton. Seventy years previously, in 1875, Ann had been killed with a pitchfork by one James Heywood, on the grounds that she was a witch who posses paranormal abilities. In many accounts it has been said that Ann was pinned to the ground with a pitchfork and slashed with a bill-hook.\r\n\r\nThe second bizarre fact, Detective Superintendent Alex Spooner, Head of Warwickshire C.I.D., is said to have drawn the investigators attention to a 1929 book entitled Folklore, Old Customs and Superstitions in Shakespeare Land, written by the Rev. James Harvey Bloom, Rector of Whitchurch.\r\n\r\nThe book included an alleged paranormal true story about how, in 1885, a young plough boy also named Charles Walton had met a phantom black dog on his way home from work on several nights in succession. On the last occasion the dog had been accompanied by a headless woman. That night Walton had heard that his sister had died.\r\n\r\nThe third strange fact was another villager, Ann Tennant was murdered in exactly the same way as Charles Walton, in 1875.\r\n\r\nOn 15 September 1875, at about 8 o’clock in the evening, Ann Tennant left her house in Long Compton to buy a loaf of bread. On her way back, she met some farm workers returning home from harvesting in the fields. One of the group was a local man, James Heywood, who had known Ann’s family for many years. Heywood was simple-minded and was seen as something akin to a village idiot. It is known that he had also been drinking cider. Without warning he attacked Ann Tennant with a pitchfork, pinned her to the ground, stabbing her in the legs and head.\r\n\r\nA local farmer named Taylor heard the commotion and ran to Ann’s aid. He restrained Heywood until a constable arrived. Ann was taken to her daughter’s house but died of her injuries at around 11.15 that night. Heywood claimed that Ann was a witch and that there were other witches in the village whom he intended to deal with in the same way. Although committed to trial for murder, he was found not guilty on the grounds of insanity and spent the rest of his life in Broadmoor Criminal Lunatic Asylum. He is recorded as dying there, at the age of 59, in the first half of 1890.Even today, the inhabitants of the Quintons claim that phantom black dogs roam the area and are a harbinger of death.\r\n\r\nIt is claimed that, soon after Walton’s murder, a black dog was found hanging from a tree close to the murder scene, while the chief police investigator himself wrote that he encountered a black dog while walking at dusk on Meon Hill. The dog ran past him and shortly afterwards he met a local boy walking in the same direction.\r\n\r\nHe asked the boy if he was looking for his dog, but when Fabian mentioned the animal’s colour, the boy turned a deathly pale and fled in the opposite direction.', 'murder6.jpg', 1583456310, 5);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleID` int(5) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `title`) VALUES
(1, 'user'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `survay`
--

CREATE TABLE `survay` (
  `surveyID` int(50) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survay`
--

INSERT INTO `survay` (`surveyID`, `title`) VALUES
(1, 'Based upon your overall experience');

-- --------------------------------------------------------

--
-- Table structure for table `survayanswer`
--

CREATE TABLE `survayanswer` (
  `answerID` int(100) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `surveyID` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survayanswer`
--

INSERT INTO `survayanswer` (`answerID`, `answer`, `surveyID`) VALUES
(1, '1', 1),
(2, '2', 1),
(3, '3', 1),
(4, '4', 1),
(5, '5', 1),
(6, '6', 1),
(7, '7', 1),
(8, '8', 1),
(9, '9', 1),
(10, '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `timestamp` int(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `roleID` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `timestamp`, `email`, `roleID`) VALUES
(70, 'hocudaselogujem', '964c002bc370f50ae99ad22de0e24711', 1583403265, 'nesto@gmail.com', 1),
(72, 'smrdica', '48fe0a8034a4633727809d2cbc07c1c9', 1583582625, 'smrdica@gmail.com', 1),
(87, 'novija', 'ea05e22f0f3fbe8233c9252393abe5b3', 1583856373, 'novija@gmail.com', 1),
(90, 'admin', 'f1dc735ee3581693489eaf286088b916', 1584391507, 'admin@gmail.com', 2),
(102, 'perica7', '5c782957ab8824276f25c0c0dc9173e0', 1584922936, 'perica7@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usermystery`
--

CREATE TABLE `usermystery` (
  `usermysteryID` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `mysteryID` int(255) NOT NULL,
  `isChoosen` bit(1) NOT NULL DEFAULT b'0',
  `interesting` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usermystery`
--

INSERT INTO `usermystery` (`usermysteryID`, `userID`, `mysteryID`, `isChoosen`, `interesting`) VALUES
(20, 102, 10, b'1', 0),
(21, 102, 4, b'1', 0),
(22, 102, 113, b'1', 1),
(23, 102, 116, b'1', 0),
(24, 102, 121, b'1', 1),
(25, 102, 12, b'1', 0),
(26, 102, 112, b'1', 1),
(27, 102, 120, b'1', 0),
(28, 102, 13, b'1', 0),
(29, 102, 110, b'1', 1),
(30, 102, 119, b'1', 0),
(31, 102, 117, b'1', 0),
(32, 102, 115, b'1', 1),
(33, 102, 2, b'1', 1),
(34, 102, 118, b'1', 0),
(35, 102, 6, b'1', 1),
(36, 102, 11, b'1', 0),
(37, 87, 119, b'1', 0),
(38, 102, 3, b'1', 0),
(39, 102, 8, b'1', 0),
(40, 87, 11, b'1', 1),
(41, 87, 114, b'1', 0),
(42, 87, 6, b'1', 1),
(43, 87, 121, b'1', 1),
(44, 87, 12, b'1', 0),
(45, 87, 122, b'1', 1),
(46, 87, 110, b'1', 0),
(47, 87, 117, b'1', 0),
(48, 87, 127, b'1', 1),
(49, 87, 123, b'1', 1),
(50, 87, 126, b'1', 1),
(51, 87, 5, b'1', 1),
(52, 70, 123, b'1', 0),
(53, 70, 127, b'1', 0),
(54, 70, 118, b'1', 1),
(55, 70, 2, b'1', 1),
(56, 87, 13, b'1', 0),
(57, 70, 115, b'1', 1),
(58, 87, 8, b'1', 1),
(59, 87, 112, b'1', 1),
(60, 87, 120, b'1', 0),
(61, 87, 9, b'1', 0),
(62, 87, 115, b'1', 1),
(63, 87, 2, b'1', 1),
(64, 87, 118, b'1', 1),
(65, 87, 125, b'1', 1),
(66, 87, 10, b'1', 1),
(67, 87, 4, b'1', 1),
(68, 87, 113, b'1', 1),
(69, 87, 116, b'1', 1),
(70, 87, 111, b'1', 1),
(71, 87, 1, b'1', 1),
(72, 87, 124, b'1', 1),
(73, 70, 13, b'1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usersurvayanswer`
--

CREATE TABLE `usersurvayanswer` (
  `userID` int(50) NOT NULL,
  `surveyID` int(50) NOT NULL,
  `answerID` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersurvayanswer`
--

INSERT INTO `usersurvayanswer` (`userID`, `surveyID`, `answerID`) VALUES
(87, 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuID`),
  ADD KEY `menuTypeID` (`menuTypeID`);

--
-- Indexes for table `menutype`
--
ALTER TABLE `menutype`
  ADD PRIMARY KEY (`menuTypeID`);

--
-- Indexes for table `mystery`
--
ALTER TABLE `mystery`
  ADD PRIMARY KEY (`mysteryID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `survay`
--
ALTER TABLE `survay`
  ADD PRIMARY KEY (`surveyID`);

--
-- Indexes for table `survayanswer`
--
ALTER TABLE `survayanswer`
  ADD PRIMARY KEY (`answerID`),
  ADD KEY `survayID` (`surveyID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `roleID` (`roleID`);

--
-- Indexes for table `usermystery`
--
ALTER TABLE `usermystery`
  ADD PRIMARY KEY (`usermysteryID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `mysteryID` (`mysteryID`);

--
-- Indexes for table `usersurvayanswer`
--
ALTER TABLE `usersurvayanswer`
  ADD PRIMARY KEY (`userID`,`answerID`,`surveyID`),
  ADD KEY `survayID` (`surveyID`),
  ADD KEY `answerID` (`answerID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menutype`
--
ALTER TABLE `menutype`
  MODIFY `menuTypeID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mystery`
--
ALTER TABLE `mystery`
  MODIFY `mysteryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `survay`
--
ALTER TABLE `survay`
  MODIFY `surveyID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survayanswer`
--
ALTER TABLE `survayanswer`
  MODIFY `answerID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `usermystery`
--
ALTER TABLE `usermystery`
  MODIFY `usermysteryID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
