-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2016 at 11:36 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quizzing`
--

-- --------------------------------------------------------

--
-- Table structure for table `addquestion`
--

CREATE TABLE IF NOT EXISTS `addquestion` (
  `catName` varchar(50) NOT NULL,
  `question` varchar(200) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) NOT NULL,
  `option4` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  PRIMARY KEY (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addquestion`
--

INSERT INTO `addquestion` (`catName`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
('Biology', ' n nn', 'bjbjb', 'v', 'vhhvvv', 'vhvh', 'v');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('nishantrevur', 'e2fc714c4727ee9395f324cd2e7f331f');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `name` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `imgURL` varchar(100) NOT NULL,
  `highscore` varchar(10) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`name`, `type`, `imgURL`, `highscore`) VALUES
('Astronomy', 'factbased', 'astronomy.jpg', '0'),
('Biology', 'factbased', 'biology.jpg', '0'),
('Chemistry', 'factbased', 'chemistry.jpg', '0'),
('Coding', 'factbased', 'coding.jpg', '0'),
('Constitution', 'factbased', 'politics.jpg', '0'),
('Fashion', 'factbased', 'fashion.jpg', '0'),
('Food', 'factbased', 'food.jpg', '0'),
('Gaming', 'factbased', 'gaming.jpg', '0'),
('Geography', 'factbased', 'geography.jpg', '0'),
('History', 'factbased', 'history.jpg', '0'),
('Literature', 'factbased', 'literature.jpg', '0'),
('Math', 'problem', 'math.jpg', '0'),
('Music', 'factbased', 'music.jpg', '0'),
('Mythology', 'factbased', 'mythology.jpg', '0'),
('Physics', 'factbased', 'physics.jpg', '0'),
('Sports', 'factbased', 'sports.jpg', '0'),
('Technology', 'factbased', 'technology.jpg', '0'),
('Theatre', 'factbased', 'theatre.jpg', '0'),
('TV Shows', 'factbased', 'tvshows.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `factbased`
--

CREATE TABLE IF NOT EXISTS `factbased` (
  `question` varchar(500) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factbased`
--

INSERT INTO `factbased` (`question`, `option1`, `option2`, `option3`, `option4`, `answer`, `name`) VALUES
(' An Impeachment Motion against the President, in order to be passed in a House, should be supported by \r\n', ' Not less than 2/3 members present and voting in the House\r\n', ' Not less than 2/3 members of the total membership of the House\r\n', ' The simple majority of the total membership of the House\r\n', ' The special majority of the House \r\n', 'Not less than 2/3 members of the total membership of the House\r\n', 'Constitution'),
(' Chalk powder in water is an example of ', ' Saturated solution\r\n', ' Unsaturated solution\r\n', ' suspension\r\n', ' Colloidal solution\r\n', ' suspension\r\n', 'Chemistry'),
(' How does the Milky Way look like in the sky in a dark location?\n', ' Like a bright cloud, it looks twice as large as t', ' It is not visible without a telescope at all.\r\n', ' It is a faint band of hazy light in a strip all a', ' It is a 1ny, faint patch of barely visible light.', ' It is a faint band of hazy light in a strip all a', 'Astronomy'),
(' How many hours does it take for the sea to go from low Vde to high Vde?\n', ' 3\r\n', ' 6\r\n', ' 12\r\n', ' 24\r\n', ' 6\r\n', 'Astronomy'),
(' In case the offices of both the Speaker and the Dy. Speaker of the Lok Sabha become vacant who will preside over the meetings of the House?', ' Senior most member of the Lok Sabha \r\n', ' The first member of the panel of Chairpersons apprived by the House\r\n', ' A member designated by the President \r\n', ' A member nominated by the House \r\n', ' A member designated by the President \r\n', 'Constitution'),
(' People of which among the following countries are also known as Magyars?\r\n', 'Hungary\r\n', 'Malaysia\r\n', 'Hong Kong\r\n', 'Spain\r\n', 'Hungary\r\n', 'Geography'),
(' The backward classes commission (Mandal Commission ) was appointed under\r\n', ' An Act of Parliament\r\n', ' Article 16(4)\r\n', ' Article 340\r\n', ' Constitution does not provide for the appointment of such a commission\r\n', ' Article 340\r\n', 'Constitution'),
(' The Bayyaram mines area, which was recently in news, is located in __?\r\n', 'Andhra Pradesh\r\n', 'Karnataka\r\n', 'Tamil Nadu\r\n', 'Madhya Pradesh\r\n', 'Andhra Pradesh\r\n', 'Geography'),
(' The Chairman of which of the following members of Parliamentary Committees is appointed from the members of the opposition party?\r\n', ' Rules Committee\r\n', ' Committee on Parliamentary Privileges\r\n', ' Public Accounts Committee\r\n', ' Estimates Committee\r\n', 'Public Accounts Committee\r\n', 'Constitution'),
(' The Fundamental Rights are called Fundamental because\r\n', ' They are given by the Constitution\r\n', ' They are protected by the Supreme Court\r\n', ' They cannot be taken away by any law or order of the Government\r\n', ' They are essential and natural to the development of human beings\r\n', 'They are essential and natural to the development of human beings\r\n', 'Constitution'),
(' The ratio of the partial pressure of water vapor in an air-water mixture to the saturated vapor pressure of water at a given temperature is termed as:\n', 'Relative Humidity\r\n', 'Absolute humidity\r\n', 'specific Humidity\r\n', 'None of the above\r\n', 'Relaive Humidity\r\n', 'Geography'),
(' The solvent used to prepare aqueous solutions is\n', ' Water\r\n', ' benzene\r\n', ' kerosene\r\n', ' petrol\r\n', ' Water\r\n', 'Chemistry'),
(' Tyndall effect is exhibited by', ' True solutions\r\n', ' Suspensions\r\n', ' Colloidal solutions\r\n', ' Crystals\r\n', ' Colloidal solutions\r\n', 'Chemistry'),
(' Tyndall effect is producted by', ' True solutions of light\r\n', ' Scattering of light\r\n', ' Refraction of light\r\n', ' Movement of particles\r\n', ' Scattering of light\r\n', 'Chemistry'),
(' What among the following is a partially enclosed body of water along the coast where freshwater from rivers and streams meets and mixes with salt water from the ocean ?\n', 'Estuary\r\n', 'Ria\r\n', 'Tidal bore\r\n', 'Lagoon\r\n', 'Estuary\r\n', 'Geography'),
(' What are the not best sources of vitamin E?', ' eggs \r\n', ' wheat germ \r\n', ' safflower oil\r\n', ' nuts.\r\n', 'eggs\r\n', 'Food'),
(' What is a shooVng star?\r\n', ' Interstellar gas hiZng Earth.\r\n', ' A star hiZng Earth.\r\n', ' An foot-size rock or piece of ice hiZng Earth.\r\n', ' A comet hiZng Earth.\r\n', ' A dust par1cle hiZng Earth.\r\n', 'Astronomy'),
(' What is the maximum limit of time to which the National Emergency is extended under Art. 356?\r\n', ' Six months\r\n', ' One year\r\n', ' Three years\r\n', ' No time limit has been fixed\r\n', 'No time limit has been fixed\r\n', 'Constitution'),
(' What is/are the ground or grounds mentioned in the Constitution to initiate impeachment proceedings against the President of India?\r\n', ' Proved misbehavior or incapacity \r\n', 'Corruption\r\n', ' Violation of the Constitution\r\n', ' All the above\r\n', 'Violation of the Constitution\r\n', 'Constitution'),
(' Which among the following a line or surface drawn on a map or chart indicates connected points of equal salinity in the ocean?\r\n', 'Isohel\r\n', 'Isohaline\r\n', 'Isogyre\r\n', 'Isodiaphere\r\n', 'Isohaline\r\n', 'Geography'),
(' Which among the following can best define the Neolithic Revolution ?\r\n', 'Green Revolution\r\n', 'Technology Revolution\r\n', 'milk Revolution\r\n', 'Agricultural Revolution\r\n', 'Agricultural Revolution\r\n', 'Geography'),
(' Which among the following mineral is a carbonate of calcium and magnesium?\r\n', 'Huntite\r\n', 'Barytocite\r\n', 'Dolomite\r\n', 'Ankerite\r\n', 'Dolomite\r\n', 'Geography'),
(' Which of the following is NOT correct about the joint sitting of the two Houses of Parliament?\r\n', ' A joint sitting is called by the President and presided over by the Speaker of the Lok Sabha\r\n', ' A Constitution Amendment Bill cannot be considered in a joint sitting\r\n', ' A proposed joint meeting is held even if the Lok Sabha is dissolved before the proposed date \r\n', ' Any member may initiate a new Bill in the joint meeting , if permitted by the presiding officer\r\n', ' Any member may initiate a new Bill in the joint meeting , if permitted by the presiding officer\r\n', 'Constitution'),
(' Which of the following is not related with the subject of Centre-State relations?\n', ' Administrative Reforms Commission\r\n', ' Shah Commission\r\n', ' Sarkaria Commission\r\n', ' Rajamanna Committee\r\n', ' Shah Commission\r\n', 'Constitution'),
(' Which of the following states is the only diamond producing state in India?\r\n', 'Gujarat\r\n', 'Rajasthan\r\n', 'Madhya Pradesh\r\n', 'Uttar Pradesh\r\n', 'Madhya Pradesh\r\n', 'Geography'),
(' Which one of the following islands is called as ‘rust belt’ of Japan ?\r\n', 'Northern Honshu\r\n', 'Shikoku Islands\r\n', 'Kyushu Islands\r\n', 'Southern Honshu\r\n', 'Shikoku Islands\r\n', 'Geography'),
(' Who among the following was the first person to determine the Circumference of the Earth?\r\n', 'Plato\r\n', 'Aristotle\r\n', 'Eratosthenes\r\n', 'Ptolemy III Euergetes\r\n', 'Eratosthenes\r\n', 'Geography'),
(' Who presides over the joint sittings of the two Houses of Parliament in case the Speaker of the Lok Sabha is absent?\r\n', ' The President\r\n', ' The Chairman of the Rajya Sabha\r\n', ' The Dy. Speaker of the Lok Sabha\r\n', ' A member of Parliament jointly nominated by two Houses\r\n', 'The Dy. Speaker of the Lok Sabha\r\n', 'Constitution'),
(' Who was the first person to win the Grand Slam in tennis?', 'Leander Paes', 'Jack Kramer', 'Don Budge', 'Bill Tilden', 'Don Budge', 'Sports'),
('.When water is heated from 0o Celsius to 100o Celsius, the volume of water\r\n', ' Increase gradually\r\n', ' Degrease gradually\r\n', ' First increase, then decrease\r\n', ' First decrease , then increase\r\n', ' First decrease , then increase\r\n', 'Physics'),
('A double subscripted array declared as int a[ 3 ][ 5 ]; has how many elements?\r\n', ' 15\r\n', ' 13\r\n', ' 10\r\n', ' 8\r\n', '15\r\n', 'Coding'),
('A random access file is organized most like a(n):\r\n', ' Array.\r\n', 'Object.\r\n', 'Class.\r\n', 'Pointer.\r\n', 'Array\r\n', 'Coding'),
('About how many stars are in our Milky Way galaxy?\r\n', '200 billion\r\n', '200 thousand\r\n', '2 million\r\n', '2000\r\n', '200 billion\r\n', 'Astronomy'),
('Ampere-hour is the unit of which among the following?\r\n', ' Power\r\n', ' Energy\r\n', ' Intensity of current\r\n', ' Amount of charge\r\n', 'Amount of charge\r\n', 'Physics'),
('Archery is the national sport of which country?', 'Paraguay', 'Brazil', 'Bhutan', 'India', 'Bhutan', 'Sports'),
('Arya Samaj was started by ?', 'Swami Dayanand Saraswati', '  Swami Vivekananda', 'Raja Ram Mohan Roy', 'Gopal Krishna Gokhale', 'Swami Dayanand Saraswati', 'History'),
('Assam\r\n', ' Mahanadi river originates in which among the foll', 'Chhattisgarh\r\n', 'Odisha\r\n', 'Manipur\r\n', 'Assam\r\n', 'Geography'),
('At most, how many comparisons are required to search a sorted vector of 1023 elements using the binary search algorithm?\r\n', ' 10\r\n', ' 15\r\n', ' 20\r\n', ' 30\r\n', '10\r\n', 'Coding'),
('Based on their average distance from the Sun, what is the order of the planets?\r\n', 'Venus, Earth, Mars Mercury, Saturn, Jupiter, Neptu', 'Mercury, Venus, Earth, Mars, Jupiter, Saturn, Uran', 'Mercury, Venus, Mars, Earth, Jupiter, Saturn, Uran', 'Mercury, Venus Earth, Mars, Jupiter, Saturn, Uranu', 'Mercury, Venus, Earth, Mars, Jupiter, Saturn, Uran', 'Astronomy'),
('Bio-technologically synthesized vitamin B12 is used to cure________.\r\n', ' Anaemia\r\n', ' Tuberculosis\r\n', ' Pernicious anaemia\r\n', ' Cancer\r\n', ' Tuberculosis\r\n', 'Biology'),
('Biological computers will be developed using_______.\r\n', ' Bio sensor\r\n', ' Gene\r\n', ' Bio-Chips\r\n', ' Enzymes\r\n', ' Bio-Chips\r\n', 'Biology'),
('Blood is an example of ________.\r\n', ' True solution\r\n', ' Colloidal solution\r\n', ' Saturated solution\r\n', ' Suspension\r\n', ' Colloidal solution\r\n', 'Chemistry'),
('Caddie is related to ?', 'Golf', 'Bridge', 'Rally', 'Cricket', 'Golf', 'Sports'),
('Chhattisgarh\r\n', ' Which of the following mountain ranges in India i', 'Aravali\r\n', 'Satpura\r\n', 'Vindhyan\r\n', 'Himalayas\r\n', 'Geography'),
('Chiffon ,marble and bundt are of what types\r\n', 'Cakes\r\n', 'Breads\r\n', 'Salads\r\n', 'Soups\r\n', 'Cakes\r\n', 'Food'),
('Continental regions with wet-dry climatic regimes\r\n', '21. Which among the following country is not bigge', 'total geographical area?\r\n', 'Brazil\r\n', 'Canada\r\n', 'Australia\r\n', 'Geography'),
('Cool & Humid\r\n', ' Which among the following areas are marked by the', 'Hot, humid areas near Sea\r\n', 'Cool temperate areas in continents\r\n', 'Continental regions with wet-dry climatic regimes\r', 'Desert Areas\r\n', 'Geography'),
('Do the laws of nature exclude interstellar travel?\r\n', 'No. In fact manned spaceships have already visited', 'No. In fact unmanned (robo1c) spaceships have alre', 'No, but we would need much a more effec1ve energy ', 'Yes, because cosmic radia1on in space would kill a', 'No, but we would need much a more effec1ve energy ', 'Astronomy'),
('Fire in the diesel engine is produces by which of the following?.\r\n', ' Compression\r\n', ' Spark plug\r\n', ' Friction\r\n', ' Self starter\r\n', ' Compression\r\n', 'Physics'),
('Fog is a solution of ________.\r\n', ' Liquid in gas\r\n', ' Gas in liquid\r\n', 'Solid in gas\r\n', ' Gas in gas\r\n', ' Liquid in gas\r\n', 'Chemistry'),
('Food cup should be handled by the', 'rim\r\n', ' handle\r\n', 'inside\r\n', 'top\r\n', 'handle\r\n', 'Food'),
('For which team did Michael Jordan win six NBA Championships ?', 'San Antonio Spurs', 'Los Angeles Lakers', 'Miami Heat', 'Chicago Bulls', 'Chicago Bulls', 'Sports'),
('From which country does Manchego Chesee originate?\r\n', 'Russia\r\n', 'USA\r\n', 'New Zealand\r\n', 'Spain\r\n', 'Spain\r\n', 'Food'),
('Galvanometer can be converted into a voltmeter by using\r\n', ' Low resistance in series\r\n', ' High resistance in series\r\n', ' Low resistance in parallel\r\n', ' High resistance in parallel\r\n', ' High resistance in series\r\n', 'Physics'),
('Gas law was given by\r\n', ' Boyle\r\n', ' Ostwald\r\n', ' Arrhenius\r\n', ' Faraday\r\n', ' Boyle\r\n', 'Physics'),
('Gene therapy is the means to treat or even cure genetic and acquired diseases like_____.\r\n', ' Cancer\r\n', ' Smallpox\r\n', ' Swine - flu\r\n', ' Common cold\r\n', ' Cancer\r\n', 'Biology'),
('Himalayas\r\n', ' Soloman Islands are located in__:\r\n', 'North Atlantic Ocean\r\n', 'South Atlantic Ocean\r\n', 'North Pacific Ocean\r\n', 'South Pacific Ocean\r\n', 'Geography'),
('How does the Sun produce its energy?\r\n', 'by reflecting light from other stars\r\n', 'by chemically burning its fuels\r\n', 'by fusing hydrogen into helium\r\n', 'by explosive chemical reactions near its surface\r\n', 'by fusing hydrogen into helium\r\n', 'Astronomy'),
('How many medals did Michael Phelps win in the 2008 Olymics?', '8', '2', '1', '0', '8', 'Sports'),
('How many pointers are contained as data members in the nodes of a circular, doubly linked list of integers with five nodes?\r\n', ' 5\r\n', ' 8\r\n', ' 10\r\n', ' 15\r\n', '10\r\n', 'Coding'),
('How many spaceships have arrived at the closest star, Proxima Centauri?\r\n', 'One, without humans.\r\n', 'A few unmanned but none with humans.\r\n', 'One with humans and a few unmanned.\r\n', 'None\r\n', 'None.\r\n', 'Astronomy'),
('How many stars are there in the Solar System?\r\n', ' A few thousand.\r\n', ' 10\r\n', ' Billions.\r\n', ' 1\r\n', '1\r\n', 'Astronomy'),
('How many years was the 100 year war fought for?', '88', '92', '117', '97', '117', 'History'),
('Ice should handled using\r\n', 'a scoop\r\n', 'a glass\r\n', 'your hands\r\n', 'a pitcher\r\n', 'a scoop\r\n', 'Food'),
('If the Sun were the size of a quarter, and the rest of space sized accordingly, where would the nearest star be?\r\n', 'about 3 feet away\r\n', 'about 33 feet away\r\n', 'about 3300 feet away\r\n', 'more than 60 miles away\r\n', 'more than 60 miles away \r\n', 'Astronomy'),
('If youre looking for the most fiber in a loaf of bread, the operative words are\r\n', ' unbleached\r\n', ' enriched wheat flour\r\n', ' whole-wheat flour \r\n', ' twelve-grain\r\n', ' whole-wheat flour \r\n', 'Food'),
('In Gavin and Stacey what is Gavins surname?', 'Highman', 'Caveman', 'Loneman', 'Shipman', 'Shipman', 'TV Shows'),
('In general, linked lists allow:\r\n', ' Insertions and removals anywhere.\r\n', ' Insertions and removals only at one end.\r\n', ' Insertions at the back and removals from the front.\r\n', ' None of the above\r\n', ' Insertions and removals anywhere\r\n', 'Coding'),
('In which city was the American legal comedy-drama television series Ally McBeal set?', 'Boston', 'Buffalo', 'Los Angeles', 'New York', 'Boston', 'TV Shows'),
('Indian Constitution was amended for the first time in ?', '1949', '1960', '1952', '1951', '1951', 'History'),
('Jayadev?', 'Rishi', 'Valmiki', 'Kalidas', 'Jayadev', 'Jayadev', 'History'),
('Jon Snow is a fictional character in which television series?', 'Game of Thrones', 'Scrubs', 'Keeping up with the Kardashians', 'HIMYM', 'Game of Thrones', 'TV Shows'),
('Kuchipudi dance originated in?', 'Karnataka', 'Kerala', 'Andra Pradesh', 'Orissa', 'Karnataka', 'History'),
('Light from the laser is________.\r\n', ' Monochromatic\r\n', ' Composite\r\n', ' Dispersed light\r\n', ' Incoherent\r\n', 'Monochromatic', 'Physics'),
('Linear search is highly inefficient compared to binary search when dealing with:\r\n', ' Small, unsorted arrays.\r\n', ' Small, sorted arrays.\r\n', ' Large, unsorted arrays.\r\n', ' Large, sorted arrays.\r\n', ' Small, unsorted arrays.\r\n', 'Coding'),
('Lower Subansiri Hydro Power project is under development in which state?\r\n', 'Nagaland\r\n', 'Manipur\r\n', 'Assam\r\n', 'Sikkim\r\n', 'Assam\r\n', 'Geography'),
('Mendel observed 7 pairs of contrasting characters in Pisum sativum, One of the Following is not a part of that, Find out.\r\n', ' Tall and Dwart\r\n', ' Yellow and Green seed colour\r\n', ' Terminal and Axial flower\r\n', 'Smooth and Rough stem\r\n', 'Smooth and Rough stem\r\n', 'Biology'),
('Milk is a _______.\r\n', ' True solution\r\n', ' Colloidal solution\r\n', ' suspension\r\n', ' saturated solution\r\n', ' Colloidal solution\r\n', 'Chemistry'),
('n Sherlock, Benedict Cumberbatch is Sherlock Holmes but who plays Doctor Watson?', 'Benedict Cumberbatch', 'Martin Freeman', 'David James', 'Jason Segel', 'Martin Freeman', 'TV Shows'),
('On which day(s) of the year does the Sun rise due east?\r\n', 'March 21 and September 23\r\n', 'June 21\r\n', 'every day\r\n', 'never\r\n', 'March 21 and September 23\r\n', 'Astronomy'),
('Peaky Blinders is a 1919 saga set in which UK city?', 'Birmingham', 'London', 'Liverpool', 'Manchester', 'Birmingham', 'TV Shows'),
('Persistence of vision is the principle behind?\r\n', ' Camera\r\n', 'spectroscope\r\n', ' Cinema\r\n', ' Periscope\r\n', ' Cinema\r\n', 'Physics'),
('Recursion is memory-intensive because:\r\n', ' Recursive functions tend to declare many local variables.\r\n', '  records of these previous calls still occupy space on the call stack.\r\n', ' Many copies of the function code are created.\r\n', ' It requires large data values\r\n', ' records of these previous calls still occupy space on the call stack.\r\n', 'Coding'),
('River Luni (Lavanavari river) originates from which among the following ranges?\r\n', 'Himalaya Ranges\r\n', 'Aravalli Ranges\r\n', 'Vindhya Ranges\r\n', 'Saputara Ranges\r\n', 'Aravalli Ranges\r\n', 'Geography'),
('Select the incorrect statement. Binary search trees (regardless of the order in which the values are inserted into the tree):\r\n', ' Always have multiple links per node.\r\n', 'Can be sorted efficiently.\r\n', ' Always have the same shape for a particular set of data.\r\n', ' Are nonlinear data structures.\r\n', ' Always have multiple links per node.\r\n', 'Coding'),
('Somatic gene therapy_______.\r\n', ' affects sperm\r\n', ' affects egg\r\n', ' affects progeny\r\n', ' affects body cell\r\n', ' affects body cell\r\n', 'Biology'),
('South Africa\r\n', 'South Africa\r\n', ' What fraction of total geographic area of the wor', '1.4%\r\n', '2.4%\r\n', '3.4%\r\n', 'Geography'),
('South Pacific Ocean\r\n', ' The pedogenic regime of podzolisation associated ', 'Hot & dry\r\n', 'Hot & Humid\r\n', 'Wet and Dry\r\n', 'Cool & Humid\r\n', 'Geography'),
('Sugar and Salt solutions are________.\r\n', ' Heterogeneous mixtures\r\n', ' True solutions\r\n', ' Colloidal solutions\r\n', ' Suspensions\r\n', ' Colloidal solutions\r\n', 'Chemistry'),
('The affairs of East India Company came into the hands of the British Crown under?', 'Royal Act', 'Transfer Act', 'Controlling Act', 'Regulating Act', 'Regulating Act', 'History'),
('The Delhi general who successfully advanced up to Madurai was?', 'Khizr Khan', 'Muhammad-bin-Tughlaq', 'Muhammad Ghori', 'Malik Kafur', 'Malik Kafur', 'History'),
('The dispersed phase in a colloidal solution is_________.', ' Solute\r\n', ' Solution\r\n', ' Suspension\r\n', ' Mixture\r\n', ' Solute\r\n', 'Chemistry'),
('The Element of an electric heater is made of____\r\n', ' Nichrome\r\n', ' Copper\r\n', ' Aluminum\r\n', ' None of these\r\n', ' Nichrome\r\n', 'Physics'),
('The first ever scientific experimental study on heredity was worked out between the years ________.\r\n', ' 1801 - 1807\r\n', ' 1812 - 1842\r\n', ' 1838 - 1871\r\n', ' 1822 - 1884\r\n', ' 1822 - 1884\r\n', 'Biology'),
('The first to start a joint stock company to trade with India were the?', 'Japanese', 'Portuguese', 'French', 'Dutch', 'Portuguese', 'History'),
('The meat eaters who existed 1.5 million years ago were called ______.\r\n', ' Homo habilis\r\n', ' Hominids\r\n', ' Homo erectus\r\n', ' Homo sapiens\r\n', ' Homo erectus\r\n', 'Biology'),
('The movie "Moneyball" was based on which sports personality?', 'Billy Beane', 'David Warner', 'Micheal Fleming', 'Rahul Dravid', 'Billy Beane', 'Sports'),
('The Nagara, the Dravida, and the Vesara are?', ' the three main styles of Indian temple literature', ' the three main styles of paintings', ' the three main styles of Indian music', ' the three main styles of Indian temple architectu', ' the three main styles of Indian temple architectu', 'History'),
('The nucleus of udder cell which was used to develop Dolly was taken from_______.\r\n', ' Six year old Finn Dorset white sheep\r\n', ' Seven year old white sheep\r\n', ' Six year old goat\r\n', ' Five year old cow\r\n', ' Six year old Finn Dorset white sheep\r\n', 'Biology'),
('The ozone layer protects us from\r\n', ' Ultra violet rays\r\n', ' Radio waves\r\n', ' Visual radiation\r\n', ' Infrared radiation\r\n', ' Ultra violet rays\r\n', 'Physics'),
('The paternal and maternal genetic material which influences the traits is_____.\r\n', ' RNA\r\n', ' m-RNA\r\n', ' DNA\r\n', ' t-RNA\r\n', ' DNA\r\n', 'Biology'),
('The Period of revolution round the sun is maximum by which among the following planets?\r\n', ' Mercury\r\n', ' Venus\r\n', ' Earth\r\n', ' Mars\r\n', ' Mars\r\n', 'Physics'),
('The pizza hut begin in which country?\r\n', 'USA \r\n', 'Australia\r\n', 'England\r\n', 'South africa\r\n', 'USA\r\n', 'Food'),
('The rice dish paella comes from what country?\r\n', 'India\r\n', 'Austrialia\r\n', 'Spain \r\n', 'Netherlands\r\n', 'Spain\r\n', 'Food'),
('The solution in which saturation is not achieved is called _______.\n', ' Super saturated\r\n', ' Unsaturated\r\n', ' Saturated\r\n', ' Suspended\r\n', ' Unsaturated\r\n', 'Chemistry'),
('The statments like printf and scanf in c are part of wih header file\r\n', 'stdio.h\r\n', 'conio.h\r\n', 'math.h\r\n', 'string.h\r\n', 'stdio.h\r\n', 'Coding'),
('The temples of Khajuraho were built by?', 'Chelas', 'Pandavas', 'Cholas', 'Hoysalas', 'Cholas', 'History'),
('The term vaccine was coined by______.\r\n', ' Dr. Ian Wilmut\r\n', ' Edward Jenner\r\n', ' Charles Darwin\r\n', ' Alexander Flemming\r\n', ' Edward Jenner\r\n', 'Biology'),
('The total number of elements that can be stored in a string without increasing its current amount of allocated memory is called its:\r\n', ' Size.\r\n', ' Length.\r\n', ' Capacity.\r\n', ' Maximum size\r\n', 'Size.\r\n', 'Coding'),
('Theory of natural selection was proposed by_______.\r\n', ' Charles Darwin\r\n', ' Hugo de Vries\r\n', ' Gregor Johann Mendel\r\n', ' Jean Baptiste Lamarck\r\n', ' Charles Darwin\r\n', 'Biology'),
('To which dynasty did Ashoka belong?', 'Maurya', 'Hoysala', 'Chola', 'Gupta', 'Maurya', 'History'),
('To write fixed-length records, use file open mode:\r\n', ' ios::app\r\n', ' ios::ate\r\n', 'ios::trunc\r\n', ' ios::binary\r\n', ' ios::trunc\r\n', 'Coding'),
('Vaccines are substances that confer immunity against________.\r\n', ' All kind of diseases\r\n', ' Communicable diseases\r\n', ' Specific diseases\r\n', ' Non communicable diseases\r\n', ' Specific diseases\r\n', 'Biology'),
('Vande Mataram was first sung at the session of the Indian National Congress in?', '1896', '1948', '1892', '1996', '1896', 'History'),
('What did M*A*S*H stand for?', 'Maniac Asthmatic Syndro Hola', 'Mobile Assymetric Army Scenes', 'Nothing', 'Mobile Army Surgical Hospital', 'Mobile Army Surgical Hospital', 'TV Shows'),
('What flavour does the liqour kailua have\r\n', 'Coffee\r\n', 'Chocolate\r\n', 'Peach\r\n', 'Apple\r\n', 'Coffee\r\n', 'Food'),
('What is chanterelle?\r\n', 'A tpye of beer meat\r\n', 'A tpye of tamotoe\r\n', 'A tpye of mushroom\r\n', 'A tpye of chesee\r\n', 'A tpye of mushroom\r\n', 'Food'),
('What is Copernicus famous for?\r\n', 'He discovered the mathema1cally precise laws of th', 'He discovered the universal law of gravity.\r\n', 'He discovered that the Moon is revolving around Ea', 'He suggested that the planets, including Earth, re', 'He suggested that the planets, including Earth, re', 'Astronomy'),
('What is efficency of slection sort?\r\n', 'O(n)\r\n', 'O(n2)\r\n', 'O(logn)\r\n', 'O(nlogn)\r\n', 'O(n2)\r\n', 'Coding'),
('What is the brightest star in the night sky at any time?\r\n', 'Venus\r\n', 'Sirius\r\n', 'Orion\r\n', 'the North Star\r\n', 'Sirius\r\n', 'Astronomy'),
('What is the Earths period of revolution around the Sun?\r\n', '1 day\r\n', '1 week\r\n', '1 month\r\n', '1 year\r\n', '1 year\r\n', 'Astronomy'),
('What is the largest magnificaVon you would reasonably use with the largest telescope in the world, located in Mauna Kea, Hawaii?\r\n', ' around 4,000\r\n', ' around 400\r\n', ' around 400,000\r\n', ' around 40\r\n', ' around 400\r\n', 'Astronomy'),
('What is the Moons period of revolution around the Earth?\r\n', '1 day\r\n', '1 week\r\n', '1 month\r\n', '1 year\r\n', '1 month\r\n', 'Astronomy'),
('What is the name of Peppa Pigs little brother?', 'George', 'James', 'Peter', 'David', 'George', 'TV Shows'),
('What is the other name for maize ?\r\n', 'Barley\r\n', 'Wheat \r\n', 'Corn\r\n', 'Jawar\r\n', 'Corn\r\n', 'Food'),
('What keeps people on the other side of Earth from falling down, away from Earth?\r\n', 'People live only on one side of Earth. The other s', ' The magne1c force between them and Earth.\r\n', ' The electric forces due to the iron core of Earth', 'The gravita1onal force between them and Earth.\r\n', ' The gravita1onal force between them and Earth.\r\n', 'Astronomy'),
('What kind of linked list begins with a pointer to the first node, and each node contains a pointer to the next node, and the pointer in the last node points back to the first node?\r\n', ' Circular, singly-linked list.\r\n', ' Circular, doubly-linked list.\r\n', ' Singly-linked list.\r\n', 'Doubly-linked list.\r\n', 'Circular, singly-linked list.\r\n', 'Coding'),
('What will be the temperature of the maximum if 100 gm ice at 0oC is put in 100 gm water at 80oC? (Latent heat of ice = 80 cal / gm)\r\n', ' 35oC\r\n', ' 45oC\r\n', ' 60oC\r\n', '0oC\r\n', '0oC\r\n', 'Physics'),
('Where is the Indus Civilization city Lothal ?', 'Gujrat', 'Rajasthan', 'Punjab', 'Kerala', 'Gujrat', 'History'),
('Which American multiple Emmy-winning drama stars Hugh Laurie?', 'Castle', 'House', 'Mentalist', 'Game of Thrones', 'House', 'TV Shows'),
('Which American sitcom features a petty criminal that makes a list of every bad thing and every person he has wronged, then begins efforts to fix them all?', 'Killer', 'Hannibal', 'Bones', 'Criminal Minds', 'My Name is Earl', 'TV Shows'),
('Which American television personality divorced lawyer Robert Kardashian in 1991?', 'Kris Jenner', 'Kylie Jenner', 'Kendall Jenner', 'Kourtney Kardashian', 'Kris Jenner', 'TV Shows'),
('Which among the following are primary colors?\r\n', ' Red, Green, Blue\r\n', ' Blue, Yellow, Green\r\n', ' Red, Magenta, Yellow\r\n', ' Yellow, Violet, Blue\r\n', 'Red, Green, Blue\r\n', 'Physics'),
('Which among the following is a martial dance ?', 'Kathaki', 'Thirometham', 'Chhau of Mayurbhanj', 'Mancho Kangala', 'Chhau of Mayurbhanj', 'History'),
('Which among the following is the best conductor of electricity?\r\n', ' Silver\r\n', ' Copper\r\n', ' Gold\r\n', ' LeadSilver\r\n', 'Silver\r\n', 'Physics'),
('Which best describes a comet?\r\n', 'a rock burning up in the atmosphere\r\n', 'a flaming ball of gas\r\n', 'a large dirty snowball surrounded by a thin veil o', 'a star streaking across the sky\r\n', 'a large dirty snowball surrounded by a thin veil o', 'Astronomy'),
('Which city has hosted Asian Games in 2006?', 'Doha', 'Delhi', 'Tokya', 'Bangkok', 'Doha', 'Sports'),
('Which data structure represents a waiting line and limits insertions to be made at the back of the data structure and limits removals to be made from the front?\r\n', ' Stack.\r\n', ' Queue.\r\n', ' Binary tree.\r\n', ' Linked list.\r\n', 'Queue\r\n', 'Coding'),
('Which file open mode would be used to write data only to the end of an existing file?\r\n', 'ios::app\r\n', ' ios::in\r\n', ' ios::out\r\n', ' ios::trunc\r\n', ' ios::app\r\n', 'Coding'),
('Which food crop is attacked by th colorado beetle?\r\n', 'Tamotoes\r\n', 'Potatoes\r\n', 'Brinjals\r\n', 'Ladyfingers\r\n', 'Potatoes\r\n', 'Food'),
('which header file has fprintf fscanf funcion?\r\n', 'files.h\r\n', 'string.h\r\n', 'stdio.h\r\n', 'conio.h\r\n', 'stdio.h', 'Coding'),
('Which of the following is inheritable?\r\n', ' An altered gene in sperm\r\n', ' An altered gene in testes\r\n', ' An altered gene in Zygote\r\n', ' An altered gene in udder cell\r\n', ' An altered gene in Zygote\r\n', 'Biology'),
('Which of the following is not a dynamic data structure?\r\n', ' Linked list.\r\n', ' Stack.\r\n', ' Array.\r\n', 'Binary tree.\r\n', 'Array\r\n', 'Coding'),
('Which of the following pairs are correctly matched?', '1 and 3', '1, 2 & 4', '1, 2 & 3', '2 and 3', '2 and 3', 'History'),
('Which of the following represents the efficiency of the insertion sort?\r\n', ' O(1)\r\n', 'O(log n)\r\n', ' O(n)\r\n', ' O(n2)\r\n', 'o(n2)\r\n', 'Coding'),
('Which of the following statements about stacks is incorrect?\r\n', ' Stacks can be implemented using linked lists.\r\n', ' Stacks are first-in, first-out (FIFO) data structures.\r\n', ' New nodes can only be added to the top of the stack.\r\n', ' The last node (at the bottom) of a stack has a null (0) link.\r\n', ' Stacks are first-in, first-out (FIFO) data structures.\r\n', 'Coding'),
('Which of the following was a recommendation of Hunter Commission?', ' Introduction of civic education at college and un', ' New regulation for the organized senates system', 'Womens education', 'Gradual withdrawal of state support from higher ed', 'Womens education', 'History'),
('Which of the following was not founded by Dr.B. R. Ambedkar?', ' Deccan Education Society', 'Samaj Samata Sangh', 'Samaj Samata Sangh', 'Depressed Classes Institute', ' Deccan Education Society', 'History'),
('Which of these provides enough vitamin C to meet the daily RDA? \r\n', ' anounce of Cheddar cheese \r\n', ' a cup of orange juice \r\n', ' a cup of broccoli\r\n', ' a medium-size baked potato with its skin\r\n', 'a cup of broccoli \r\n', 'Food'),
('Which one of the following upheavals took place in Bengal immediately after the Revolt of 1857?', 'Indigo Disturbances', 'Sanyasi Rebellion', 'Santal Rebellion', 'Pabna Disturbances', 'Indigo Disturbances', 'History'),
('Which planet has a surface and atmosphere most like the Earth?\r\n', 'Venus\r\n', 'Jupiter\r\n', 'Mercury\r\n', 'Mars\r\n', 'Mars \r\n', 'Astronomy'),
('Which player among the following got banned from baseball on charges of betting ?', 'Derek Jeter', 'Bo Jackson', 'Pete Rose', 'Babe Ruth', 'Pete Rose', 'Sports'),
('Which series is a fictional story about a ruthless president?', 'Kill Bill', 'House of Cards', 'House', 'The President', 'House of Cards', 'TV Shows'),
('Which sitcom features Sheldon Cooper?', 'F.R.I.E.N.D.S', 'Entourage', 'Firefly', 'The Big Bang Theory', 'The Big Bang Theory', 'TV Shows'),
('Which spice is used to cure sea sickness\r\n', 'Coriander\r\n', 'Ginger\r\n', 'Pepper\r\n', 'Mustard  seed\r\n', 'Ginger\r\n', 'Food'),
('Which television series is set in Lima, Ohio?', 'Office', 'Suits', 'Glee', 'Dexter', 'Glee', 'TV Shows'),
('Which term is commonly used in Badminton and Volleyball?', 'Double', 'Deuce', 'Dribble', 'Dummy', 'Deuce', 'Sports'),
('Which vegitable is used in the preparation of BECHAMEL sauce?\r\n', 'Tomatoes\r\n', 'Onions\r\n', 'Carrot\r\n', 'Potatoes\r\n', 'Onions\r\n', 'Food'),
('Which was the 1st non Test playing country to beat India in an international match?', 'Canada', 'Sri Lanka', 'Zimbabwe', 'New Zealand', 'Sri Lanka', 'Sports'),
('Which year did According to Jim first air in?', '2001', '2005', '2013', '2011', '2001', 'TV Shows'),
('Which year did David Beckham Retire?', '2014', '2015', '1998', '2013', '2013', 'Sports'),
('Which year did FRIENDS first air in?', '1994', '1993', '1996', '1995', '1994', 'TV Shows'),
('Which year did Marvels Daredevil first air in?', '2012', '2016', '2015', '2014', '2015', 'TV Shows'),
('Who amongst the following was involved in the Alipore Bomb case?', 'James Dustin', 'Jatin Das', 'Bindo Gho', 'Aurobindo Ghosh', 'Jatin Das', 'History'),
('Who discovered X-Rays?\r\n', ' Madam Curie\r\n', ' Einstein\r\n', 'Roentgen\r\n', ' J. J. Thomson\r\n', 'Roentgen\r\n', 'Physics'),
('Who invented c language\r\n', 'Denis m ritchie\r\n', 'Carol pandle\r\n', 'Chalres moore\r\n', 'Jhon nash\r\n', 'Denis m ritche\r\n', 'Coding'),
('Who is known as the Grand Old Man of India?', 'Khan Abdul Ghaffar Khan', ' C. Rajagopalachari', 'Lala rai', ' Dadabhai Naoroji', ' Dadabhai Naoroji', 'History'),
('Who is the current staring quaterback of the Chicago Bears?', 'Peyton Manning', 'Jay Cutler', 'Tom Brady', 'Eli Manning', 'Jay Cutler', 'Sports'),
('Who is the highest goal scorer in the history of Real Madrid?', 'Alfredo Stefano', 'Raul', 'Cristiano Ronaldo', 'Zidane', 'Cristiano Ronaldo', 'Sports'),
('Who is the winner of the 2010 FIFA World Cup held in South Africa?', 'Argentina', 'Germany', 'Brazil', 'Spain', 'Spain', 'Sports'),
('Who plays Barry Allen in THE FLASH?', 'Grant Gustin', 'Stephen Amell', 'Wally Rick', 'David Gates', 'Grant Gustin', 'TV Shows'),
('Who plays Harvey Specter in Suits?', 'Gabriel Macht', 'Patrick Adams', 'James Milner', 'Rick Hoffman', 'Gabriel Macht', 'TV Shows'),
('Who revived the Olympic Games?', 'Jacques Rogge', 'Demetrius Vikelas', ' Juan Antonio Samaranch', 'Pierre de Coubertin', 'Pierre de Coubertin', 'Sports'),
('Who was the first Indian to win the World Amateur Billiards title?', 'Manoj Kothari', 'Geet Sethi', 'Michael Ferreira', 'Wilson Jones', 'Wilson Jones', 'Sports'),
('Who was the first man to win the Emmy Award for best actor two years in a row?', 'Clark Gable ', 'James Stewart ', 'David  Guetta', 'Charles Laughton ', 'Charles Laughton ', 'TV Shows'),
('Who was the winner of the first edition of the India Premier League?', 'Rajasthan Royals', 'Chennai Super Kings', 'Royal Challengers Bangalore', 'Kings XI Punjab', 'Rajasthan Royals', 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `problembased`
--

CREATE TABLE IF NOT EXISTS `problembased` (
  `question` varchar(200) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) NOT NULL,
  `option4` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scorecard`
--

CREATE TABLE IF NOT EXISTS `scorecard` (
  `username` varchar(30) NOT NULL,
  `catName` varchar(50) NOT NULL,
  `totalquestions` int(11) NOT NULL DEFAULT '0',
  `correct` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`,`catName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scorecard`
--

INSERT INTO `scorecard` (`username`, `catName`, `totalquestions`, `correct`, `points`) VALUES
('nishant.revur18', 'Chemistry', 30, 7, 35),
('nishantrevur', 'Astronomy', 40, 1, 5),
('nishantrevur', 'Biology', 40, 4, 20),
('nishantrevur', 'Chemistry', 30, 4, 20),
('nishantrevur', 'Coding', 190, 18, 90),
('nishantrevur', 'Constitution', 50, 0, 0),
('nishantrevur', 'Food', 430, 39, 195),
('nishantrevur', 'Geography', 30, 0, 0),
('nishantrevur', 'History', 60, 0, 0),
('nishantrevur', 'Physics', 20, 0, 0),
('nishantrevur', 'Sports', 20, 0, 0),
('nishantrevur', 'Technology', 50, 4, 20),
('nishantrevur', 'TV Shows', 40, 0, 0),
('sajjanl', 'Food', 100, 50, 250);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`username`, `email`, `password`, `name`, `gender`, `img`) VALUES
('bharath', 'bharath@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'bharath', 'male', 'db1.JPG'),
('mouryabs', 'mouryabs@gmail.com', 'e2fc714c4727ee9395f324cd2e7f331f', 'Mourya BS', 'male', 'mourya.jpg'),
('nikhilvp', 'nikpat2u4u@gmail.com', 'f2dc3c05829aae42490a8e6b1d481c32', 'Nikhil P', 'male', 'nik.jpg'),
('nishant.revur18', 'nishant.revur@yahoo.in', '81dc9bdb52d04dc20036dbd8313ed055', 'Nishant RB', 'male', 'nishant.jpg'),
('nishantrb', 'nishant.revur@yahoo.in', '81dc9bdb52d04dc20036dbd8313ed055', 'nishant', 'male', '12.jpg'),
('nishantrevu', 'nishant.revur@yahoo.in', 'ab56b4d92b40713acc5af89985d4b786', 'Nishant', 'male', 'nishant.jpg'),
('ushaka', 'ushaka@gmail.com', 'e2fc714c4727ee9395f324cd2e7f331f', 'Usha', 'female', 'usha.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
