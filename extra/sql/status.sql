
--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`status_id`);



--
-- Table structure for table `status_comments`
--

CREATE TABLE IF NOT EXISTS `status_comments` (
`comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `time` varchar(100) NOT NULL,
  `cmt_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status_comments`
--
ALTER TABLE `status_comments`
 ADD PRIMARY KEY (`comment_id`), ADD KEY `cmt_article_id` (`cmt_status_id`);
