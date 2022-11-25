-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 02:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publishe_creativedata`
--

-- --------------------------------------------------------

--
-- Table structure for table `anim`
--

CREATE TABLE `anim` (
  `id` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `anim` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anim`
--

INSERT INTO `anim` (`id`, `name`, `anim`) VALUES
(1, 'top', 'function iddtop() {\n        var gsap = new TimelineMax({\n          repeat: erepeat,\n          repeatDelay: erdelay,\n          delay: edelay\n        });\n        gsap.from(\"#idd\", durn, {\n          y: -50,\n          opacity: 0,\n          ease: Power1.easeOut\n          });\n      } iddtop();'),
(2, 'bottom', 'function iddbottom() {\r\n        var gsap = new TimelineMax({\r\n          repeat: erepeat,\r\n          repeatDelay: erdelay,\r\n          delay: edelay\r\n        });\r\n        gsap.from(\"#idd\", durn, {\r\n          y: 50,\r\n          opacity: 0,\r\n          ease: Power1.easeOut\r\n          });\r\n      }iddbottom();'),
(3, 'left', 'function iddleft() {\n        var gsap = new TimelineMax({\n          repeat: erepeat,\n          repeatDelay: erdelay,\n          delay: edelay\n        });\n        gsap.from(\"#idd\", durn, {\n        x: -300,\n        opacity: 0,\n        ease: Power1.easeOut\n          });\n      }iddleft();'),
(4, 'right', 'function iddright() {\r\n        var gsap = new TimelineMax({\r\n          repeat: erepeat,\r\n          repeatDelay: erdelay,\r\n          delay: edelay\r\n        });\r\n        gsap.from(\"#idd\", durn, {\r\n        x:300,\r\n        opacity: 0,\r\n        ease: Power1.easeOut\r\n          });\r\n      }iddright();'),
(5, 'Top-Right', 'function iddtopright() {         var gsap = new TimelineMax({           repeat: erepeat,           repeatDelay: erdelay,           delay: edelay         });         gsap.from(\"#idd\", durn, {           y: -100,           x:100 ,          opacity: 0,           ease: Power1.easeOut           });       } iddtopright();'),
(6, 'Top-Left', 'function iddtopleft() {         var gsap = new TimelineMax({           repeat: erepeat,           repeatDelay: erdelay,           delay: edelay         });         gsap.from(\"#idd\", durn, {           y: -100,           x:-100 ,          opacity: 0,           ease: Power1.easeOut           });       } iddtopleft();'),
(7, 'Bottom-Right', 'function iddbottomright() {         var gsap = new TimelineMax({           repeat: erepeat,           repeatDelay: erdelay,           delay: edelay         });         gsap.from(\"#idd\", durn, {           y: 100,           x:100 ,          opacity: 0,           ease: Power1.easeOut           });       } iddbottomright();'),
(8, 'Bottom-Left', 'function iddbottomleft() {         var gsap = new TimelineMax({           repeat: erepeat,           repeatDelay: erdelay,           delay: edelay         });         gsap.from(\"#idd\", durn, {           y: 100,           x:-100 ,          opacity: 0,           ease: Power1.easeOut           });       } iddbottomleft();');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anim`
--
ALTER TABLE `anim`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anim`
--
ALTER TABLE `anim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
