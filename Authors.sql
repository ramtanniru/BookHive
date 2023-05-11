-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 11, 2023 at 06:00 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookhive`
--

-- --------------------------------------------------------

--
-- Table structure for table `Authors`
--

CREATE TABLE `Authors` (
  `AuthorID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Biography` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Authors`
--

INSERT INTO `Authors` (`AuthorID`, `Name`, `Biography`) VALUES
(1, 'T.J.Klune', 'TJ KLUNE is a Lambda Literary Award-winning author (Into This River I Drown) and an ex-claims examiner for an insurance company. His novels include The House in the Cerulean Sea and The Extraordinaries.'),
(2, 'Jennifer Saint', 'Jennifer Saint is a Sunday Times bestselling author. Her debut novel, ARIADNE, was shortlisted for Waterstones Book of the Year 2021 and was a finalist in the Goodreads Choice Awards Fantasy category in 2021. Her second novel, ELEKTRA, comes out in 2022 and is another retelling of Greek mythology told in the voices of the women at the heart of the ancient legends.'),
(3, 'Rachel Beanland', 'Rachel Beanland is the author of the forthcoming novel, THE HOUSE IS ON FIRE, which will be published by Simon & Schuster in April 2023. Her debut novel, FLORENCE ADLER SWIMS FOREVER, received the 2020 National Jewish Book Award for Debut Fiction (Greenberg Prize) and has been published or is forthcoming in nine countries. She is a graduate of the University of South Carolina and received her MFA in creative writing from Virginia Commonwealth University. She lives in Richmond, Virginia with her family.'),
(4, 'Charles Frazier', 'Charles Frazier is an award-winning author of American historical fiction. His literary corpus, to date, is comprised of three New York Times best selling novels: Nightwoods (2011), Thirteen Moons (2006), and Cold Mountain (1997) - winner of the National Book Award for Fiction.\r\n'),
(5, 'Anne Frank', 'Annelies Marie \"Anne\" Frank was a Jewish girl born in the city of Frankfurt, Germany. Her father moved to the Netherlands in 1933 and the rest of the family followed later. Anne was the last of the family to come to the Netherlands, in February 1934. She wrote a diary while in hiding with her family and four friends in Amsterdam during the German occupation of the Netherlands in World War II.\r\nShe lived in Amsterdam with her parents and sister. During the Holocaust, Anne and her family hid in the attic of her father\'s office to escape the Nazis. It was during that time period that she had recorded her life in her diary.\r\nAnne died in Bergen-Belsen, in February 1945, at the age of 15.'),
(6, 'Yuval Noah Harari', 'Professor Harari was born in Haifa, Israel, to Lebanese parents in 1976. He received his Ph.D. from the University of Oxford in 2002, and is now a lecturer at the Department of History, the Hebrew University of Jerusalem.\r\n\r\nHe specialized in World History, medieval history and military history. His current research focuses on macro-historical questions: What is the relation between history and biology? What is the essential difference between Homo sapiens and other animals? Is there justice in history? Does history have a direction? Did people become happier as history unfolded?\r\n\r\nProf. Harari also teaches a MOOC (Massive Open Online Course) titled A Brief History of Humankind.\r\n\r\nProf. Harari twice won the Polonsky Prize for Creativity and Originality, in 2009 and 2012. In 2011 he won the Society for Military History’s Moncado Award for outstanding articles in military history.'),
(7, 'Tara Westover', 'Tara Westover is an American author living in the UK. Born in Idaho to a father opposed to public education, she never attended school. She spent her days working in her father\'s junkyard or stewing herbs for her mother, a self-taught herbalist and midwife. She was seventeen the first time she set foot in a classroom, and after that first taste, she pursued learning for the next decade. She received a BA from Brigham Young University in 2008 and was subsequently awarded a Gates Cambridge Scholarship. She earned an MPhil from Trinity College, Cambridge in 2009, and in 2010 was a visiting fellow at Harvard University. She returned to Cambridge, where she was awarded a PhD in history in 2014.'),
(8, 'Susan Cain', 'SUSAN CAIN is the author of the bestsellers Quiet Journal, Quiet Power: The Secret Strengths of Introverts, and Quiet: The Power of Introverts in A World That Can’t Stop Talking, which has been translated into 40 languages, is in its seventh year on the New York Times best seller list, and was named the #1 best book of the year by Fast Company magazine, which also named Cain one of its Most Creative People in Business. Her latest masterpiece, BITTERSWEET: How Sorrow and Longing Make Us Whole, was released in the US on April 5, 2022 (international editions are forthcoming).\r\n\r\nLinkedIn named her the 6th Top Influencer in the world. Susan has partnered with Malcolm Gladwell, Adam Grant and Dan Pink to launch the Next Big Idea Book Club and they donate all their proceeds to children’s literacy programs.\r\n\r\nHer writing has appeared in The New York Times, The Atlantic, The Wall Street Journal, and many other publications. Her record-smashing TED talk has been viewed over 40 million times on TED.com and YouTube combined, and was named by Bill Gates one of his all-time favorite talks.\r\n\r\nCain has also spoken at Microsoft, Google, the U.S. Treasury, the S.E.C., Harvard, Yale, West Point and the US Naval Academy. She received Harvard Law School’s Celebration Award for Thought Leadership, the Toastmasters International Golden Gavel Award for Communication and Leadership, and was named one of the world’s top 50 Leadership and Management Experts by Inc. Magazine. She is an honors graduate of Princeton and Harvard Law School. She lives in the Hudson River Valley with her husband and two sons. '),
(9, 'Nicole Chung', 'Nicole Chung is the author of A Living Remedy (April 4, 2023) and the national bestseller All You Can Ever Know (2018). Named a Best Book of the Year by over twenty outlets, including NPR, The Washington Post, Time, and Library Journal, All You Can Ever Know was a finalist for the National Book Critics Circle Award and NAIBA Book of the Year, a semifinalist for the PEN Open Book Award, a Barnes & Noble Discover Great New Writers selection, and an Indies Choice Honor Book. Nicole is currently a contributing writer at The Atlantic, and her writing has also appeared in The New York Times, The New York Times Magazine, GQ, Time, The Guardian, Slate, and Vulture. Find her on Twitter, Mastodon, and Post at @nicolesjchung.'),
(10, 'Daniel Wallace', 'Daniel Wallace is author of five novels, including Big Fish (1998), Ray in Reverse (2000), The Watermelon King (2003), Mr. Sebastian and the Negro Magician (2007), and most recently The Kings and Queens of Roam (2013).\r\n\r\nHe has written one book for children, Elynora, and in 2008 it was published in Italy, with illustrations by Daniela Tordi. O Great Rosenfeld!, the only book both written and illustrated by the author, has been released in France and Korea and is forthcoming in Italy, but there are not, at this writing, any plans for an American edition.\r\n\r\nHis work has been published in over two dozen languages, and his stories, novels and non-fiction essays are taught in high schools and colleges throughout this country. His illustrations have appeared in the Los Angeles Times, Italian Vanity Fair, and many other magazines and books, including Pep Talks, Warnings, and Screeds: Indispensible Wisdom and Cautionary Advice for Writers, by George Singleton, and Adventures in Pen Land: One Writer\'s Journey from Inklings to Ink, by Marianne Gingher. Big Fish was made into a motion picture of the same name by Tim Burton in 2003, a film in which the author plays the part of a professor at Auburn University.\r\n\r\nHe is in fact the J. Ross MacDonald Distinguished Professor of English, and director of the Creative Writing Program, at the University of North Carolina at Chapel Hill, his alma mater (Class of \'08). He lives with his wife, Laura Kellison Wallace, in Chapel Hill. More information about him, his writing, and his illustrations can be found at www.danielwallace.org and www.ogreatrosenfeld.org.'),
(11, 'Alexander Larman', 'Alexander Larman is an author, historian and journalist. After reading English at Oxford, from where he graduated with a First, he ghost-wrote and edited various memoirs and biographies, including the late artist and flâneur Sebastian Horsley’s Dandy In The Underworld. His involvement with the book led Horsley to say ‘there is no man in London more capable of genius – or a flop – than Alexander Larman’.\r\n\r\nHe began his own writing career with Blazing Star (Head of Zeus, 2014), a biography of the 17th century poet and libertine Lord Rochester, and followed this with Restoration (Head of Zeus, 2016) a social history of the year 1666, and Byron’s Women (Head of Zeus, 2016), an ‘anti-biography’ of the poet Lord Byron and the significant women in his life. His next book, The Crown in Crisis (Weidenfeld & Nicolson, 2020) was a revisionist history of the abdication saga. It was selected by the Times, Daily Mail and Daily Express as one of their best books of the year and led to significant international media coverage of the new revelations about the event.\r\n\r\nAs a journalist, Larman regularly contributes to titles including The Observer, The Critic, the Daily Telegraph, The Spectator and The Chap, for which he serves as literary editor. He lives in Oxford with his wife and daughter. '),
(12, 'Stephan Talty', 'Stephan Talty is the New York Times bestselling author of six acclaimed books of narrative nonfiction, as well as the Abbie Kearney crime novels. Originally from Buffalo, he now lives outside New York City.\r\n\r\nTalty began as a widely-published journalist who has contributed to the New York Times Magazine, GQ, Men’s Journal, Time Out New York, Details, and many other publications. He is the author of the forthcoming thriller Hangman (the sequel to Black Irish), as well as Agent Garbo: The Brilliant, Eccentric Double Agent who Tricked Hitler and Saved D-Day (2012) and Empire of Blue Water: Captain Morgan\'s Great Pirate Army, the Epic Battle for the Americas, and the Catastrophe that Ended the Outlaws Bloody Reign (2008).'),
(13, 'Angie Thomas', 'Angie Thomas was born, raised, and still resides in Jackson, Mississippi as indicated by her accent. She is a former teen rapper whose greatest accomplishment was an article about her in Right-On Magazine with a picture included. She holds a BFA in Creative Writing from Belhaven University and an unofficial degree in Hip Hop. She can also still rap if needed. She is an inaugural winner of the Walter Dean Meyers Grant 2015, awarded by We Need Diverse Books. Her debut novel, The Hate U Give, was acquired by Balzer + Bray/HarperCollins in a 13-house auction and will be published in spring 2017. Film rights have been optioned by Fox 2000 with George Tillman attached to direct and Hunger Games actress Amandla Stenberg set to star.'),
(14, 'Chris Hallbeck', 'Chris Hallbeck is a roughly human shaped collection of anxieties held together by caffeine and curiosity. He’s been publishing comics on the internet since 2006 with his single panel comic The Book of Biff, followed by his multi-panel strip Maximumble. He was the co-writer and artist for Unshelved at the end of it’s run which led to co-creating the similarly themed Library Comic. With the addition of his voice and animation, his comics have found an audience of over two million followers across TikTok, YouTube, and Instagram. He lives in Michigan with his wife, two children, and a small worm in the back of his skull that whispers comic ideas to him.'),
(15, 'Jerry Craft', 'JERRY CRAFT is the New York Times bestselling author and illustrator of the graphic novels New Kid and Class Act. New Kid is the only book in history to win the John Newbery Medal for the most outstanding contribution to children’s literature (2020); the Kirkus Prize for Young Readers’ Literature (2019), and the Coretta Scott King Author Award for the most outstanding work by an African American writer (2020). Jerry was born in Harlem and grew up in the Washington Heights section of New York City.'),
(16, 'Cindy Lin', 'A former journalist with degrees from the University of Pennsylvania and Columbia University, Cindy Lin has worked for Sony Pictures Entertainment and has written and produced many multimedia news features for children, one of which received a Peabody Award. The Twelve is her debut novel.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Authors`
--
ALTER TABLE `Authors`
  ADD PRIMARY KEY (`AuthorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
