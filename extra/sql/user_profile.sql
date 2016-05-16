CREATE TABLE IF NOT EXISTS `aauth_user_profile` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_picture` varchar(100) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `age` int(255) DEFAULT NULL,
  `contact_number` int(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
