--
-- SQL file required for PHPmonkey's RO CP.
-- Import this file in your database.
--



--
-- Table structure for table `pm_acc_level`
--

CREATE TABLE IF NOT EXISTS `pm_acc_level` (
  `acc_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `acc_type_name` varchar(500) NOT NULL,
  PRIMARY KEY (`acc_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pm_acc_level`
--

INSERT INTO `pm_acc_level` (`acc_type_id`, `level`, `acc_type_name`) VALUES
(1, 0, 'Normal User'),
(2, 99, 'Super Admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
