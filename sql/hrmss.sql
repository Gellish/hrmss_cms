-- --------------------------------------------------------

--
-- Table structure for table 
--

CREATE TABLE IF NOT EXISTS `xin_advance_salaries` (
  `advance_salary_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `month_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advance_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `one_time_deduct` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `monthly_installment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_paid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `is_deducted_from_salary` int(11) NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`advance_salary_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_announcements`
--

CREATE TABLE IF NOT EXISTS `xin_announcements` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `company_id` int(111) NOT NULL,
  `location_id` int(111) NOT NULL,
  `department_id` int(111) NOT NULL,
  `published_by` int(111) NOT NULL,
  `summary` text NOT NULL,
  `description` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_attendance_time`
--

CREATE TABLE IF NOT EXISTS `xin_attendance_time` (
  `time_attendance_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `attendance_date` varchar(255) NOT NULL,
  `clock_in` varchar(255) NOT NULL,
  `clock_out` varchar(255) NOT NULL,
  `clock_in_out` varchar(255) NOT NULL,
  `time_late` varchar(255) NOT NULL,
  `early_leaving` varchar(255) NOT NULL,
  `overtime` varchar(255) NOT NULL,
  `total_work` varchar(255) NOT NULL,
  `total_rest` varchar(255) NOT NULL,
  `attendance_status` varchar(100) NOT NULL,
  PRIMARY KEY (`time_attendance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_awards`
--

CREATE TABLE IF NOT EXISTS `xin_awards` (
  `award_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(200) NOT NULL,
  `award_type_id` int(200) NOT NULL,
  `gift_item` varchar(200) NOT NULL,
  `cash_price` varchar(200) NOT NULL,
  `award_photo` varchar(255) NOT NULL,
  `award_month_year` varchar(200) NOT NULL,
  `award_information` text NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`award_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_award_type`
--

CREATE TABLE IF NOT EXISTS `xin_award_type` (
  `award_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `award_type` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`award_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `xin_award_type`
--

INSERT INTO `xin_award_type` (`award_type_id`, `award_type`, `created_at`) VALUES
(1, 'Performer of the Year', '28-04-2017'),
(2, 'Most Consistent Employee', '28-04-2017'),
(3, 'Employee of the Month', '28-04-2017'),
(4, 'Employee of the Year', '28-04-2017'),
(5, 'Hard Worker Award', '28-04-2017'),
(6, 'Certificate of Excellence', '28-04-2017'),
(7, 'Certificate of Project Completion', '28-04-2017'),
(8, 'Outstanding Leadership', '28-04-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_companies`
--

CREATE TABLE IF NOT EXISTS `xin_companies` (
  `company_id` int(111) NOT NULL AUTO_INCREMENT,
  `type_id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `trading_name` varchar(255) NOT NULL,
  `registration_no` varchar(255) NOT NULL,
  `government_tax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` int(111) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `xin_companies`
--

INSERT INTO `xin_companies` (`company_id`, `type_id`, `name`, `trading_name`, `registration_no`, `government_tax`, `email`, `logo`, `contact_number`, `website_url`, `address_1`, `address_2`, `city`, `state`, `zipcode`, `country`, `added_by`, `created_at`) VALUES
(4, 2, 'abcd', 'Sample Trading Name', '123213', '34555', 'admin@demo.com', 'logo_1499896374.png', '123454', 'hrm.com', 'Address Line 1', 'Address Line 2', 'Islamabad2', 'fasdf', '123', 172, 1, '27-04-2017'),
(5, 3, 'Jk Techd', 'test Trading', '123456', '', 'jktest@demoexample.com', 'logo_1502276212.jpg', '123456789', 'engineerjk.com', 'G11 Markaz', 'dsfasdfsadf', 'Islamabad', 'Federal', '44000', 173, 1, '28-04-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_company_info`
--

CREATE TABLE IF NOT EXISTS `xin_company_info` (
  `company_info_id` int(111) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) NOT NULL,
  `logo_second` varchar(255) NOT NULL,
  `sign_in_logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `website_url` text NOT NULL,
  `starting_year` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_contact` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` int(111) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  PRIMARY KEY (`company_info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `xin_company_info`
--

INSERT INTO `xin_company_info` (`company_info_id`, `logo`, `logo_second`, `sign_in_logo`, `favicon`, `website_url`, `starting_year`, `company_name`, `company_email`, `company_contact`, `contact_person`, `email`, `phone`, `address_1`, `address_2`, `city`, `state`, `zipcode`, `country`, `updated_at`) VALUES
(1, 'logo_1500528552.png', 'logo2_1500528552.png', 'signin_logo_1499893790.png', 'favicon_1500528552.png', '', '', 'hrm', '', '', 'Ravi Ramsen', 'info@hrm.com', '123456789', 'Address Line 1', 'Address Line 2', 'Test', 'Federal', '44000', 61, '2017-05-20 12:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `xin_company_policy`
--

CREATE TABLE IF NOT EXISTS `xin_company_policy` (
  `policy_id` int(111) NOT NULL AUTO_INCREMENT,
  `company_id` int(111) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`policy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `xin_company_policy`
--

INSERT INTO `xin_company_policy` (`policy_id`, `company_id`, `title`, `description`, `added_by`, `created_at`) VALUES
(1, 4, 'Smoke-free work environment', '&lt;p&gt;&lt;span style=\\&quot;\\\\\\\\\\\\\\&quot;font-weight:\\&quot; bold;\\\\\\\\\\\\\\&quot;=\\&quot;\\&quot;&gt;Wz Smoke-Free Work Environment Policy&lt;/span&gt;&lt;/p&gt;', 1, '28-04-2017'),
(2, 5, 'Dress Code Policy', 'Please wear only the defined clothes&lt;p&gt;&lt;/p&gt;', 1, '28-04-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_company_type`
--

CREATE TABLE IF NOT EXISTS `xin_company_type` (
  `type_id` int(111) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `xin_company_type`
--

INSERT INTO `xin_company_type` (`type_id`, `name`, `created_at`) VALUES
(1, 'Corporation', ''),
(2, 'Exempt Organization', ''),
(3, 'Partnership', ''),
(4, 'Private Foundation', ''),
(5, 'Limited Liability Company', '');

-- --------------------------------------------------------

--
-- Table structure for table `xin_contract_type`
--

CREATE TABLE IF NOT EXISTS `xin_contract_type` (
  `contract_type_id` int(111) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`contract_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `xin_contract_type`
--

INSERT INTO `xin_contract_type` (`contract_type_id`, `name`, `created_at`) VALUES
(1, 'Permanent', '28-04-2017'),
(2, 'Internship', '28-04-2017'),
(3, 'Regular', '28-04-2017'),
(4, 'Probation', '28-04-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_countries`
--

CREATE TABLE IF NOT EXISTS `xin_countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(255) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_flag` varchar(255) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=246 ;

--
-- Dumping data for table `xin_countries`
--

INSERT INTO `xin_countries` (`country_id`, `country_code`, `country_name`, `country_flag`) VALUES
(1, '+93', 'Afghanistan', 'flag_1500831780.gif'),
(2, '+355', 'Albania', 'flag_1500831815.gif'),
(3, 'DZ', 'Algeria', ''),
(4, 'DS', 'American Samoa', ''),
(5, 'AD', 'Andorra', ''),
(6, 'AO', 'Angola', ''),
(7, 'AI', 'Anguilla', ''),
(8, 'AQ', 'Antarctica', ''),
(9, 'AG', 'Antigua and Barbuda', ''),
(10, 'AR', 'Argentina', ''),
(11, 'AM', 'Armenia', ''),
(12, 'AW', 'Aruba', ''),
(13, 'AU', 'Australia', ''),
(14, 'AT', 'Austria', ''),
(15, 'AZ', 'Azerbaijan', ''),
(16, 'BS', 'Bahamas', ''),
(17, 'BH', 'Bahrain', ''),
(18, 'BD', 'Bangladesh', ''),
(19, 'BB', 'Barbados', ''),
(20, 'BY', 'Belarus', ''),
(21, 'BE', 'Belgium', ''),
(22, 'BZ', 'Belize', ''),
(23, 'BJ', 'Benin', ''),
(24, 'BM', 'Bermuda', ''),
(25, 'BT', 'Bhutan', ''),
(26, 'BO', 'Bolivia', ''),
(27, 'BA', 'Bosnia and Herzegovina', ''),
(28, 'BW', 'Botswana', ''),
(29, 'BV', 'Bouvet Island', ''),
(30, 'BR', 'Brazil', ''),
(31, 'IO', 'British Indian Ocean Territory', ''),
(32, 'BN', 'Brunei Darussalam', ''),
(33, 'BG', 'Bulgaria', ''),
(34, 'BF', 'Burkina Faso', ''),
(35, 'BI', 'Burundi', ''),
(36, 'KH', 'Cambodia', ''),
(37, 'CM', 'Cameroon', ''),
(38, 'CA', 'Canada', ''),
(39, 'CV', 'Cape Verde', ''),
(40, 'KY', 'Cayman Islands', ''),
(41, 'CF', 'Central African Republic', ''),
(42, 'TD', 'Chad', ''),
(43, 'CL', 'Chile', ''),
(44, 'CN', 'China', ''),
(45, 'CX', 'Christmas Island', ''),
(46, 'CC', 'Cocos (Keeling) Islands', ''),
(47, 'CO', 'Colombia', ''),
(48, 'KM', 'Comoros', ''),
(49, 'CG', 'Congo', ''),
(50, 'CK', 'Cook Islands', ''),
(51, 'CR', 'Costa Rica', ''),
(52, 'HR', 'Croatia (Hrvatska)', ''),
(53, 'CU', 'Cuba', ''),
(54, 'CY', 'Cyprus', ''),
(55, 'CZ', 'Czech Republic', ''),
(56, 'DK', 'Denmark', ''),
(57, 'DJ', 'Djibouti', ''),
(58, 'DM', 'Dominica', ''),
(59, 'DO', 'Dominican Republic', ''),
(60, 'TP', 'East Timor', ''),
(61, 'EC', 'Ecuador', ''),
(62, 'EG', 'Egypt', ''),
(63, 'SV', 'El Salvador', ''),
(64, 'GQ', 'Equatorial Guinea', ''),
(65, 'ER', 'Eritrea', ''),
(66, 'EE', 'Estonia', ''),
(67, 'ET', 'Ethiopia', ''),
(68, 'FK', 'Falkland Islands (Malvinas)', ''),
(69, 'FO', 'Faroe Islands', ''),
(70, 'FJ', 'Fiji', ''),
(71, 'FI', 'Finland', ''),
(72, 'FR', 'France', ''),
(73, 'FX', 'France, Metropolitan', ''),
(74, 'GF', 'French Guiana', ''),
(75, 'PF', 'French Polynesia', ''),
(76, 'TF', 'French Southern Territories', ''),
(77, 'GA', 'Gabon', ''),
(78, 'GM', 'Gambia', ''),
(79, 'GE', 'Georgia', ''),
(80, 'DE', 'Germany', ''),
(81, 'GH', 'Ghana', ''),
(82, 'GI', 'Gibraltar', ''),
(83, 'GK', 'Guernsey', ''),
(84, 'GR', 'Greece', ''),
(85, 'GL', 'Greenland', ''),
(86, 'GD', 'Grenada', ''),
(87, 'GP', 'Guadeloupe', ''),
(88, 'GU', 'Guam', ''),
(89, 'GT', 'Guatemala', ''),
(90, 'GN', 'Guinea', ''),
(91, 'GW', 'Guinea-Bissau', ''),
(92, 'GY', 'Guyana', ''),
(93, 'HT', 'Haiti', ''),
(94, 'HM', 'Heard and Mc Donald Islands', ''),
(95, 'HN', 'Honduras', ''),
(96, 'HK', 'Hong Kong', ''),
(97, 'HU', 'Hungary', ''),
(98, 'IS', 'Iceland', ''),
(99, 'IN', 'India', ''),
(100, 'IM', 'Isle of Man', ''),
(101, 'ID', 'Indonesia', ''),
(102, 'IR', 'Iran (Islamic Republic of)', ''),
(103, 'IQ', 'Iraq', ''),
(104, 'IE', 'Ireland', ''),
(105, 'IL', 'Israel', ''),
(106, 'IT', 'Italy', ''),
(107, 'CI', 'Ivory Coast', ''),
(108, 'JE', 'Jersey', ''),
(109, 'JM', 'Jamaica', ''),
(110, 'JP', 'Japan', ''),
(111, 'JO', 'Jordan', ''),
(112, 'KZ', 'Kazakhstan', ''),
(113, 'KE', 'Kenya', ''),
(114, 'KI', 'Kiribati', ''),
(115, 'KP', 'Korea, Democratic People''s Republic of', ''),
(116, 'KR', 'Korea, Republic of', ''),
(117, 'XK', 'Kosovo', ''),
(118, 'KW', 'Kuwait', ''),
(119, 'KG', 'Kyrgyzstan', ''),
(120, 'LA', 'Lao People''s Democratic Republic', ''),
(121, 'LV', 'Latvia', ''),
(122, 'LB', 'Lebanon', ''),
(123, 'LS', 'Lesotho', ''),
(124, 'LR', 'Liberia', ''),
(125, 'LY', 'Libyan Arab Jamahiriya', ''),
(126, 'LI', 'Liechtenstein', ''),
(127, 'LT', 'Lithuania', ''),
(128, 'LU', 'Luxembourg', ''),
(129, 'MO', 'Macau', ''),
(130, 'MK', 'Macedonia', ''),
(131, 'MG', 'Madagascar', ''),
(132, 'MW', 'Malawi', ''),
(133, 'MY', 'Malaysia', ''),
(134, 'MV', 'Maldives', ''),
(135, 'ML', 'Mali', ''),
(136, 'MT', 'Malta', ''),
(137, 'MH', 'Marshall Islands', ''),
(138, 'MQ', 'Martinique', ''),
(139, 'MR', 'Mauritania', ''),
(140, 'MU', 'Mauritius', ''),
(141, 'TY', 'Mayotte', ''),
(142, 'MX', 'Mexico', ''),
(143, 'FM', 'Micronesia, Federated States of', ''),
(144, 'MD', 'Moldova, Republic of', ''),
(145, 'MC', 'Monaco', ''),
(146, 'MN', 'Mongolia', ''),
(147, 'ME', 'Montenegro', ''),
(148, 'MS', 'Montserrat', ''),
(149, 'MA', 'Morocco', ''),
(150, 'MZ', 'Mozambique', ''),
(151, 'MM', 'Myanmar', ''),
(152, 'NA', 'Namibia', ''),
(153, 'NR', 'Nauru', ''),
(154, 'NP', 'Nepal', ''),
(155, 'NL', 'Netherlands', ''),
(156, 'AN', 'Netherlands Antilles', ''),
(157, 'NC', 'New Caledonia', ''),
(158, 'NZ', 'New Zealand', ''),
(159, 'NI', 'Nicaragua', ''),
(160, 'NE', 'Niger', ''),
(161, 'NG', 'Nigeria', ''),
(162, 'NU', 'Niue', ''),
(163, 'NF', 'Norfolk Island', ''),
(164, 'MP', 'Northern Mariana Islands', ''),
(165, 'NO', 'Norway', ''),
(166, 'OM', 'Oman', ''),
(167, 'PK', 'Pakistan', ''),
(168, 'PW', 'Palau', ''),
(169, 'PS', 'Palestine', ''),
(170, 'PA', 'Panama', ''),
(171, 'PG', 'Papua New Guinea', ''),
(172, 'PY', 'Paraguay', ''),
(173, 'PE', 'Peru', ''),
(174, 'PH', 'Philippines', ''),
(175, 'PN', 'Pitcairn', ''),
(176, 'PL', 'Poland', ''),
(177, 'PT', 'Portugal', ''),
(178, 'PR', 'Puerto Rico', ''),
(179, 'QA', 'Qatar', ''),
(180, 'RE', 'Reunion', ''),
(181, 'RO', 'Romania', ''),
(182, 'RU', 'Russian Federation', ''),
(183, 'RW', 'Rwanda', ''),
(184, 'KN', 'Saint Kitts and Nevis', ''),
(185, 'LC', 'Saint Lucia', ''),
(186, 'VC', 'Saint Vincent and the Grenadines', ''),
(187, 'WS', 'Samoa', ''),
(188, 'SM', 'San Marino', ''),
(189, 'ST', 'Sao Tome and Principe', ''),
(190, 'SA', 'Saudi Arabia', ''),
(191, 'SN', 'Senegal', ''),
(192, 'RS', 'Serbia', ''),
(193, 'SC', 'Seychelles', ''),
(194, 'SL', 'Sierra Leone', ''),
(195, 'SG', 'Singapore', ''),
(196, 'SK', 'Slovakia', ''),
(197, 'SI', 'Slovenia', ''),
(198, 'SB', 'Solomon Islands', ''),
(199, 'SO', 'Somalia', ''),
(200, 'ZA', 'South Africa', ''),
(201, 'GS', 'South Georgia South Sandwich Islands', ''),
(202, 'ES', 'Spain', ''),
(203, 'LK', 'Sri Lanka', ''),
(204, 'SH', 'St. Helena', ''),
(205, 'PM', 'St. Pierre and Miquelon', ''),
(206, 'SD', 'Sudan', ''),
(207, 'SR', 'Suriname', ''),
(208, 'SJ', 'Svalbard and Jan Mayen Islands', ''),
(209, 'SZ', 'Swaziland', ''),
(210, 'SE', 'Sweden', ''),
(211, 'CH', 'Switzerland', ''),
(212, 'SY', 'Syrian Arab Republic', ''),
(213, 'TW', 'Taiwan', ''),
(214, 'TJ', 'Tajikistan', ''),
(215, 'TZ', 'Tanzania, United Republic of', ''),
(216, 'TH', 'Thailand', ''),
(217, 'TG', 'Togo', ''),
(218, 'TK', 'Tokelau', ''),
(219, 'TO', 'Tonga', ''),
(220, 'TT', 'Trinidad and Tobago', ''),
(221, 'TN', 'Tunisia', ''),
(222, 'TR', 'Turkey', ''),
(223, 'TM', 'Turkmenistan', ''),
(224, 'TC', 'Turks and Caicos Islands', ''),
(225, 'TV', 'Tuvalu', ''),
(226, 'UG', 'Uganda', ''),
(227, 'UA', 'Ukraine', ''),
(228, 'AE', 'United Arab Emirates', ''),
(229, 'GB', 'United Kingdom', ''),
(230, 'US', 'United States', ''),
(231, 'UM', 'United States minor outlying islands', ''),
(232, 'UY', 'Uruguay', ''),
(233, 'UZ', 'Uzbekistan', ''),
(234, 'VU', 'Vanuatu', ''),
(235, 'VA', 'Vatican City State', ''),
(236, 'VE', 'Venezuela', ''),
(237, 'VN', 'Vietnam', ''),
(238, 'VG', 'Virgin Islands (British)', ''),
(239, 'VI', 'Virgin Islands (U.S.)', ''),
(240, 'WF', 'Wallis and Futuna Islands', ''),
(241, 'EH', 'Western Sahara', ''),
(242, 'YE', 'Yemen', ''),
(243, 'ZR', 'Zaire', ''),
(244, 'ZM', 'Zambia', ''),
(245, 'ZW', 'Zimbabwe', '');

-- --------------------------------------------------------

--
-- Table structure for table `xin_currencies`
--

CREATE TABLE IF NOT EXISTS `xin_currencies` (
  `currency_id` int(111) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `symbol` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `xin_currencies`
--

INSERT INTO `xin_currencies` (`currency_id`, `name`, `code`, `symbol`) VALUES
(2, 'Dollars', 'USD', '$'),
(6, 'Dollars', 'AUD', '$'),
(11, 'Euro', 'EUR', '€'),
(19, 'Pounds', 'GBP', '£‎'),
(22, 'Dollars', 'CAD', '$'),
(25, 'Yuan Renminbi', 'CNY', '¥'),
(44, 'Dollars', 'HKD', '$'),
(47, 'Rupees', 'INR', 'Rp'),
(53, 'Yen', 'JPY', '¥'),
(63, 'Switzerland Francs', 'CHF', 'CHF'),
(66, 'Ringgits', 'MYR', 'RM'),
(73, 'Guilders', 'ANG', 'ƒ'),
(74, 'Dollars', 'NZD', '$'),
(92, 'Dollars', 'SGD', '$'),
(94, 'Shillings', 'SOS', 'S'),
(112, 'Zimbabwe Dollars', 'ZWD', 'Z$');

-- --------------------------------------------------------

--
-- Table structure for table `xin_database_backup`
--

CREATE TABLE IF NOT EXISTS `xin_database_backup` (
  `backup_id` int(111) NOT NULL AUTO_INCREMENT,
  `backup_file` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`backup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_departments`
--

CREATE TABLE IF NOT EXISTS `xin_departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(200) NOT NULL,
  `company_id` int(11) NOT NULL,
  `location_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `xin_departments`
--

INSERT INTO `xin_departments` (`department_id`, `department_name`, `company_id`, `location_id`, `employee_id`, `added_by`, `created_at`, `status`) VALUES
(1, 'Accounts & Finance', 5, 2, 1, 1, '27-04-2017', 1),
(2, 'Administrator', 4, 1, 1, 1, '28-04-2017', 1),
(3, 'Graphics &amp; Multimedia', 4, 1, 1, 1, '28-04-2017', 1),
(4, 'Human Resource', 4, 1, 1, 1, '28-04-2017', 1),
(5, 'Information Technology', 4, 1, 1, 1, '28-04-2017', 1),
(6, 'Data Collection', 4, 1, 1, 1, '28-04-2017', 1),
(7, 'Quality Assurance', 4, 1, 1, 1, '28-04-2017', 1);

-- --------------------------------------------------------

--
-- Table structure for table `xin_designations`
--

CREATE TABLE IF NOT EXISTS `xin_designations` (
  `designation_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(200) NOT NULL,
  `designation_name` varchar(200) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`designation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `xin_designations`
--

INSERT INTO `xin_designations` (`designation_id`, `department_id`, `designation_name`, `added_by`, `created_at`, `status`) VALUES
(1, 1, 'Finance Manager', 1, '27-04-2017', 1),
(2, 2, 'System Administrator', 1, '28-04-2017', 1),
(3, 4, 'Assistant Manager', 1, '28-04-2017', 1),
(4, 4, 'Manager', 1, '28-04-2017', 1),
(5, 6, 'Assistant Surveyor', 1, '28-04-2017', 1),
(6, 6, 'Surveyor', 1, '28-04-2017', 1),
(7, 5, 'Fresher PHP Developer', 1, '28-04-2017', 1),
(8, 5, 'Senior PHP Developer', 1, '28-04-2017', 1),
(9, 3, 'Graphics Designer', 1, '28-04-2017', 1),
(10, 4, 'Senior Testers', 1, '28-04-2017', 1),
(12, 5, 'Intern', 1, '28-04-2017', 1),
(13, 1, 'Finance Executive', 1, '28-04-2017', 1),
(14, 4, 'Learning Manager', 1, '28-04-2017', 1),
(15, 4, 'Learning Executive', 1, '28-04-2017', 1),
(16, 5, 'Software Engineer', 1, '28-04-2017', 1),
(17, 5, 'Project Manager', 1, '28-04-2017', 1),
(18, 5, 'Chief Technology Officer', 1, '28-04-2017', 1),
(19, 5, 'Chief Executive Officer', 1, '28-04-2017', 1),
(20, 3, 'President', 1, '28-04-2017', 1);

-- --------------------------------------------------------

--
-- Table structure for table `xin_document_type`
--

CREATE TABLE IF NOT EXISTS `xin_document_type` (
  `document_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_type` varchar(255) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`document_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `xin_document_type`
--

INSERT INTO `xin_document_type` (`document_type_id`, `document_type`, `created_at`) VALUES
(1, 'Driving License', '28-04-2017'),
(2, 'Passport', '28-04-2017'),
(3, 'Visa', '28-04-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_email_template`
--

CREATE TABLE IF NOT EXISTS `xin_email_template` (
  `template_id` int(111) NOT NULL AUTO_INCREMENT,
  `template_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `xin_email_template`
--

INSERT INTO `xin_email_template` (`template_id`, `template_code`, `name`, `subject`, `message`, `status`) VALUES
(1, 'test', 'Payslip generated', 'Payslip generated', '&lt;p&gt;Hello&amp;nbsp;{var employee_name},&lt;/p&gt;&lt;p&gt;Your payslip generated for the month of {var payslip_date}.&lt;/p&gt;&lt;p&gt;Regards&lt;/p&gt;&lt;p&gt;The&amp;nbsp;{var site_name}&amp;nbsp;Team&lt;/p&gt;', 1),
(2, 'test2', 'Forgot Password', 'Forgot Password', '&lt;p&gt;There was recently a request for password for your &amp;nbsp;{var site_name}&amp;nbsp;account.&lt;/p&gt;&lt;p&gt;Please, keep it in your records so you don\\&#039;t forget it.&lt;/p&gt;&lt;p&gt;Your username: {var username}&lt;br&gt;Your email address: {var email}&lt;br&gt;Your password: {var password}&lt;/p&gt;&lt;p&gt;Thank you,&lt;br&gt;The {var site_name} Team&lt;/p&gt;', 1),
(3, '', 'New Project', 'New Project', '&lt;p&gt;Dear {var name},&lt;/p&gt;&lt;p&gt;New project has been assigned to you.&lt;/p&gt;&lt;p&gt;Project Name: {var project_name}&lt;/p&gt;&lt;p&gt;Project Start Date:&amp;nbsp;&lt;span 1rem;\\\\\\&quot;=\\&quot;\\&quot;&gt;{var project_start_date}&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span 1rem;\\\\\\&quot;=\\&quot;\\&quot;&gt;Thank you,&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;The {var site_name} Team&lt;/p&gt;', 1),
(4, '', 'Announcement', 'New Announcement', '&lt;p&gt;Dear &amp;nbsp;User,&lt;/p&gt;&lt;p&gt;New&amp;nbsp;Announcement has been published by admin,&amp;nbsp;please click on below link:&lt;/p&gt;&lt;p&gt;&lt;a href=\\&quot;http://demo.hrm.com/%7Bvar%20site_url%7D\\&quot;&gt;New&amp;nbsp;Announcement...&lt;/a&gt;&lt;/p&gt;&lt;p&gt;Link doesn\\&#039;t work? Copy the following link to your browser address bar:&lt;/p&gt;&lt;p&gt;{var site_url}&lt;/p&gt;&lt;p&gt;Have fun!&lt;br&gt;The {var site_name} Team&lt;/p&gt;', 1),
(5, '', 'Leave Request ', 'A Leave Request from you', '&lt;p&gt;Dear Admin,&lt;/p&gt;&lt;p&gt;{var employee_name}&amp;nbsp;wants a leave from you.&lt;/p&gt;&lt;p&gt;You can view this leave request by logging in to the portal using the link below.&lt;br&gt;&lt;a href=&quot;{var site_url}&quot;&gt;View Application&lt;/a&gt;&lt;br&gt;&lt;br&gt;Regards&lt;/p&gt;&lt;p&gt;The {var site_name} Team&lt;/p&gt;', 1),
(6, '', 'Leave Approve', 'Your leave request has been approved', '&lt;p&gt;Your leave request has been approved&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#333333&quot; face=&quot;sans-serif, Arial, Verdana, Trebuchet MS&quot;&gt;Congratulations!&amp;nbsp;Your leave request from&amp;nbsp;&lt;/font&gt;{var leave_start_date}&amp;nbsp;to&amp;nbsp;{var leave_end_date}&amp;nbsp;has been approved by your company management.&lt;/p&gt;&lt;p&gt;Regards&lt;br&gt;The {var site_name} Team&lt;/p&gt;', 1),
(7, '', 'Leave Reject', 'Your leave request has been Rejected', '&lt;p&gt;Your leave request has been Rejected&lt;/p&gt;&lt;p&gt;Unfortunately !&amp;nbsp;Your leave request from&amp;nbsp;{var leave_start_date}&amp;nbsp;to&amp;nbsp;{var leave_end_date}&amp;nbsp;has been Rejected by your company management.&lt;/p&gt;&lt;p&gt;Regards&lt;/p&gt;&lt;p&gt;The {var site_name} Team&lt;/p&gt;', 1),
(8, '', 'Welcome Email ', 'Welcome Email ', '&lt;p&gt;Hello&amp;nbsp;{var employee_name},&lt;/p&gt;&lt;p&gt;Welcome to&amp;nbsp;{var site_name}&amp;nbsp;.Thanks for joining&amp;nbsp;{var site_name}. We listed your sign in details below, make sure you keep them safe.&lt;/p&gt;&lt;p&gt;Your Username: {var username}&lt;/p&gt;&lt;p&gt;Your Employee ID: {var employee_id}&lt;br&gt;Your Email Address: {var email}&lt;br&gt;Your Password: {var password}&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;{var site_url}&quot;&gt;Login Panel&lt;/a&gt;&lt;/p&gt;&lt;p&gt;Link doesn&#039;t work? Copy the following link to your browser address bar:&lt;/p&gt;&lt;p&gt;{var site_url}&lt;/p&gt;&lt;p&gt;Have fun!&lt;/p&gt;&lt;p&gt;The&amp;nbsp;{var site_name}&amp;nbsp;Team.&lt;/p&gt;', 1),
(9, '', 'Transfer', 'New Transfer', '&lt;p&gt;Hello&amp;nbsp;{var employee_name},&lt;/p&gt;&lt;p&gt;You have been&amp;nbsp;transfered to another department and location.&lt;/p&gt;&lt;p&gt;You can view the transfer details by logging in to the portal using the link below.&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;http://demo.hrm.com/%7Bvar%20site_url%7D&quot;&gt;Login Panel&lt;/a&gt;&lt;/p&gt;&lt;p&gt;Link doesn&#039;t work? Copy the following link to your browser address bar:&lt;/p&gt;&lt;p&gt;{var site_url}&lt;/p&gt;&lt;p&gt;Regards&lt;/p&gt;&lt;p&gt;The {var site_name} Team&lt;/p&gt;', 1),
(10, '', 'Award', 'Award Received', '&lt;p&gt;Hello&amp;nbsp;{var employee_name},&lt;/p&gt;&lt;p&gt;You have been&amp;nbsp;awarded&amp;nbsp;{var award_name}.&lt;/p&gt;&lt;p&gt;You can view this award by logging in to the portal using the link below.&lt;/p&gt;&lt;p&gt;&lt;a href=\\&quot;http://demo.hrm.com/settings/email_template/%7Bvar%20site_url%7D\\&quot;&gt;Login Panel&lt;/a&gt;&lt;/p&gt;&lt;p&gt;Link doesn\\&#039;t work? Copy the following link to your browser address bar:&lt;/p&gt;&lt;p&gt;{var site_url}&lt;/p&gt;&lt;p&gt;Regards&lt;/p&gt;&lt;p&gt;The {var site_name} Team&lt;/p&gt;', 1),
(11, '', 'New job application', 'New job application submitted', '&lt;p style=\\&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;\\&quot;&gt;Hi,&lt;/p&gt;&lt;p style=\\&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;\\&quot;&gt;&lt;strong&gt;{var employee_name}&amp;nbsp;&lt;/strong&gt;has submitted the job application for&amp;nbsp;&lt;span style=\\&quot;font-weight: bolder; font-size: 1rem;\\&quot;&gt;{var job_title}&lt;/span&gt;&lt;/p&gt;&lt;p style=\\&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;\\&quot;&gt;&lt;span style=\\&quot;font-size: 1rem;\\&quot;&gt;You can view the Job Application online at:&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=\\&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;\\&quot;&gt;&lt;span style=\\&quot;font-weight: bolder; font-size: 1rem;\\&quot;&gt;&lt;a href=\\&quot;http://localhost/mm/ultimate_hrm/job_candidates\\&quot;&gt;&lt;a href=\\&quot;{var site_url}\\&quot;&gt;View Job Application&lt;/a&gt;&lt;/a&gt;&lt;/span&gt;&lt;span style=\\&quot;font-size: 1rem;\\&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=\\&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;\\&quot;&gt;Best Regards,&lt;/p&gt;&lt;p style=\\&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;\\&quot;&gt;The {var site_name} Team&lt;/p&gt;', 1),
(12, '', 'Resignation', 'Resignation Notice', '&lt;p&gt;Hello&amp;nbsp;{var employee_name},&lt;/p&gt;&lt;p&gt;Resignation Notice has been sent to you.&lt;/p&gt;&lt;p&gt;You can view the notice details by logging in to the portal using the link below.&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;{var site_url}&quot;&gt;Login Panel&lt;/a&gt;&lt;/p&gt;&lt;p&gt;Link doesn&#039;t work? Copy the following link to your browser address bar:&lt;/p&gt;&lt;p&gt;{var site_url}&lt;/p&gt;&lt;p&gt;Regards&lt;/p&gt;&lt;p&gt;The {var site_name} Team&lt;/p&gt;', 1),
(13, '', 'New Training', 'Training  Assigned ', '&lt;p style=&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;&quot;&gt;Dear Employee,&lt;/p&gt;&lt;p style=&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;&quot;&gt;A new Training &amp;nbsp;&lt;strong&gt;{var training_name}&lt;/strong&gt;&amp;nbsp;&amp;nbsp;has been assigned to you.&lt;/p&gt;&lt;p style=&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;&quot;&gt;You can view this Training by logging in to the portal using the link below.&lt;/p&gt;&lt;p style=&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;&quot;&gt;&lt;strong style=&quot;font-size: 1rem;&quot;&gt;&lt;a href=&quot;http://localhost/mm/ultimate_hrm/training_details.php?training_id=5&amp;amp;mode=view&quot;&gt;View Training&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Link doesn&#039;t work? Copy the following link to your browser address bar:&lt;/p&gt;&lt;p&gt;{var site_url}&lt;/p&gt;&lt;p style=&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;&quot;&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;Regards&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;&quot;&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;The {var site_name} Team&lt;/span&gt;&lt;/p&gt;', 1),
(14, '', 'New Task', 'Task assigned', '&lt;p&gt;Dear Employee,&lt;/p&gt;&lt;p&gt;A new task&amp;nbsp;&lt;span style=&quot;font-weight: bolder;&quot;&gt;{var task_name}&lt;/span&gt;&amp;nbsp;has been assigned to you by&amp;nbsp;&lt;span style=&quot;font-weight: bolder;&quot;&gt;{var task_assigned_by}&lt;/span&gt;.&lt;/p&gt;&lt;p&gt;You can view this task by logging in to the portal using the link below.&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;http://demo.hrm.com/%7Bvar%20site_url%7D&quot;&gt;View Task&lt;/a&gt;&lt;/p&gt;&lt;p&gt;Link doesn&#039;t work? Copy the following link to your browser address bar:&lt;/p&gt;&lt;p&gt;{var site_url}&lt;/p&gt;&lt;p&gt;Regards,&lt;/p&gt;&lt;p&gt;The {var site_name} Team&lt;/p&gt;', 1),
(15, '', 'New Ticket', 'New Ticket [#{var ticket_code}]', '&lt;p style=\\&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;\\&quot;&gt;&lt;span style=\\&quot;font-size: 1rem;\\&quot;&gt;Dear Admin,&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=\\&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;\\&quot;&gt;&lt;span style=\\&quot;font-size: 1rem;\\&quot;&gt;Your received a new ticket.&lt;/span&gt;&lt;/p&gt;&lt;p style=\\&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;\\&quot;&gt;&lt;span style=\\&quot;font-size: 1rem;\\&quot;&gt;Ticket Code: #{var ticket_code}&lt;/span&gt;&lt;/p&gt;&lt;p style=\\&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;\\&quot;&gt;Status : Open&lt;br&gt;&lt;br&gt;Click on the below link to see the ticket details and post additional comments.&lt;/p&gt;&lt;p style=\\&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;\\&quot;&gt;&lt;big&gt;&lt;span style=\\&quot;font-weight: bolder;\\&quot;&gt;&lt;a href=\\&quot;http://demo.hrm.com/settings/email_template/%7Bvar%20site_url%7D\\&quot;&gt;View Ticket&lt;/a&gt;&lt;/span&gt;&lt;/big&gt;&lt;br&gt;&lt;br&gt;Regards&lt;/p&gt;&lt;p style=\\&quot;color: rgb(51, 51, 51); font-family: sans-serif, Arial, Verdana, &amp;quot;Trebuchet MS&amp;quot;;\\&quot;&gt;The {var site_name} Team&lt;/p&gt;', 1);

-- --------------------------------------------------------

--
-- Table structure for table `xin_employees`
--

CREATE TABLE IF NOT EXISTS `xin_employees` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(200) NOT NULL,
  `office_shift_id` int(111) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_of_birth` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `user_role_id` int(100) NOT NULL,
  `department_id` int(100) NOT NULL,
  `designation_id` int(100) NOT NULL,
  `company_id` int(111) NOT NULL,
  `salary_template` varchar(255) NOT NULL,
  `hourly_grade_id` int(111) NOT NULL,
  `monthly_grade_id` int(111) NOT NULL,
  `date_of_joining` varchar(200) NOT NULL,
  `date_of_leaving` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `profile_picture` text NOT NULL,
  `profile_background` text NOT NULL,
  `resume` text NOT NULL,
  `skype_id` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `facebook_link` text NOT NULL,
  `twitter_link` text NOT NULL,
  `blogger_link` text NOT NULL,
  `linkdedin_link` text NOT NULL,
  `google_plus_link` text NOT NULL,
  `instagram_link` varchar(255) NOT NULL,
  `pinterest_link` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `last_login_date` varchar(255) NOT NULL,
  `last_logout_date` varchar(255) NOT NULL,
  `last_login_ip` varchar(255) NOT NULL,
  `is_logged_in` int(111) NOT NULL,
  `online` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `xin_employees`
--

INSERT INTO `xin_employees` (`user_id`, `employee_id`, `office_shift_id`, `first_name`, `last_name`, `username`, `email`, `password`, `date_of_birth`, `gender`, `user_role_id`, `department_id`, `designation_id`, `company_id`, `salary_template`, `hourly_grade_id`, `monthly_grade_id`, `date_of_joining`, `date_of_leaving`, `marital_status`, `salary`, `address`, `profile_picture`, `profile_background`, `resume`, `skype_id`, `contact_no`, `facebook_link`, `twitter_link`, `blogger_link`, `linkdedin_link`, `google_plus_link`, `instagram_link`, `pinterest_link`, `youtube_link`, `is_active`, `last_login_date`, `last_logout_date`, `last_login_ip`, `is_logged_in`, `online`, `created_at`) VALUES
(1, 'ramsen02', 1, 'Ravis', 'Ramsen', 'raviramsen', 'admin@testemail.com', 'testpassword', '10/04/2016', 'Male', 1, 5, 19, 5, 'monthly', 0, 1, '2016-10-16', '2017-08-24', 'Married', '', '1355 Market Street, Suite 900', '', 'profile_background_1499896596.jpg', '', '', '12344', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.blogger.com/', 'https://www.linkedin.com/', 'https://plus.google.com/', '', '', '', 1, '10-09-2017 22:25:35', '01-09-2017 03:21:44', '::1', 1, 0, '15-06-2017'),
(23, '001WA', 1, 'William', 'Anderson', 'williamanderson', 'williamanderson@testemail.com', 'testpassword', '2017-04-01', 'Female', 9, 5, 16, 5, 'monthly', 0, 3, '2017-04-01', '', 'Single', '', '1355 Market Street, Suite 900', '', 'profile_background_1499896611.jpg', '', '', '123456789', '', '', '', '', '', '', '', '', 1, '25-08-2017 00:07:06', '25-08-2017 00:08:40', '::1', 0, 0, '2017-04-28 01:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_bankaccount`
--

CREATE TABLE IF NOT EXISTS `xin_employee_bankaccount` (
  `bankaccount_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `is_primary` int(11) NOT NULL,
  `account_title` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_code` varchar(255) NOT NULL,
  `bank_branch` text NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`bankaccount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_complaints`
--

CREATE TABLE IF NOT EXISTS `xin_employee_complaints` (
  `complaint_id` int(111) NOT NULL AUTO_INCREMENT,
  `complaint_from` int(111) NOT NULL,
  `title` varchar(255) NOT NULL,
  `complaint_date` varchar(255) NOT NULL,
  `complaint_against` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_contacts`
--

CREATE TABLE IF NOT EXISTS `xin_employee_contacts` (
  `contact_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `is_primary` int(111) NOT NULL,
  `is_dependent` int(111) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `work_phone` varchar(255) NOT NULL,
  `work_phone_extension` varchar(255) NOT NULL,
  `mobile_phone` varchar(255) NOT NULL,
  `home_phone` varchar(255) NOT NULL,
  `work_email` varchar(255) NOT NULL,
  `personal_email` varchar(255) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_contract`
--

CREATE TABLE IF NOT EXISTS `xin_employee_contract` (
  `contract_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `contract_type_id` int(111) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `designation_id` int(111) NOT NULL,
  `title` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`contract_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `xin_employee_contract`
--

INSERT INTO `xin_employee_contract` (`contract_id`, `employee_id`, `contract_type_id`, `from_date`, `designation_id`, `title`, `to_date`, `description`, `created_at`) VALUES
(3, 1, 2, '2017-06-01', 4, 'dfdfd', '2017-06-30', 'asdfadsfsdafd', '07-06-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_documents`
--

CREATE TABLE IF NOT EXISTS `xin_employee_documents` (
  `document_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `document_type_id` int(111) NOT NULL,
  `date_of_expiry` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `notification_email` varchar(255) NOT NULL,
  `is_alert` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `document_file` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `xin_employee_documents`
--

INSERT INTO `xin_employee_documents` (`document_id`, `employee_id`, `document_type_id`, `date_of_expiry`, `title`, `notification_email`, `is_alert`, `description`, `document_file`, `created_at`) VALUES
(1, 1, 1, '2017-08-02', 'asd', 'admin@demo.com', 1, 'asdasds', 'document_1503612748.jpg', '25-08-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_exit`
--

CREATE TABLE IF NOT EXISTS `xin_employee_exit` (
  `exit_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `exit_date` varchar(255) NOT NULL,
  `exit_type_id` int(111) NOT NULL,
  `exit_interview` int(111) NOT NULL,
  `is_inactivate_account` int(111) NOT NULL,
  `reason` text NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`exit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_exit_type`
--

CREATE TABLE IF NOT EXISTS `xin_employee_exit_type` (
  `exit_type_id` int(111) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`exit_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `xin_employee_exit_type`
--

INSERT INTO `xin_employee_exit_type` (`exit_type_id`, `type`, `created_at`) VALUES
(1, 'Resignation', ''),
(2, 'Retirement', ''),
(3, 'End of Contract', ''),
(4, 'End of Project', ''),
(5, 'Dismissal', ''),
(6, 'Layoff', ''),
(7, 'Termination by Mutual Agreement', ''),
(8, 'Forced Resignation', ''),
(9, 'End of Temporary Appointment', ''),
(10, 'Death', ''),
(11, 'Abadonment', ''),
(12, 'Transfer', '');

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_immigration`
--

CREATE TABLE IF NOT EXISTS `xin_employee_immigration` (
  `immigration_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `document_type_id` int(111) NOT NULL,
  `document_number` varchar(255) NOT NULL,
  `document_file` varchar(255) NOT NULL,
  `issue_date` varchar(255) NOT NULL,
  `expiry_date` varchar(255) NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `eligible_review_date` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`immigration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_leave`
--

CREATE TABLE IF NOT EXISTS `xin_employee_leave` (
  `leave_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `contract_id` int(111) NOT NULL,
  `casual_leave` varchar(255) NOT NULL,
  `medical_leave` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `xin_employee_leave`
--

INSERT INTO `xin_employee_leave` (`leave_id`, `employee_id`, `contract_id`, `casual_leave`, `medical_leave`, `created_at`) VALUES
(7, 23, 2, '3', '2', '02-06-2017'),
(8, 23, 2, '12', '23', '07-06-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_location`
--

CREATE TABLE IF NOT EXISTS `xin_employee_location` (
  `office_location_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `location_id` int(111) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`office_location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `xin_employee_location`
--

INSERT INTO `xin_employee_location` (`office_location_id`, `employee_id`, `location_id`, `from_date`, `to_date`, `created_at`) VALUES
(1, 23, 1, '2017-01-02', '2017-11-02', '2017-04-28 06:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_promotions`
--

CREATE TABLE IF NOT EXISTS `xin_employee_promotions` (
  `promotion_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `title` varchar(255) NOT NULL,
  `promotion_date` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`promotion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_qualification`
--

CREATE TABLE IF NOT EXISTS `xin_employee_qualification` (
  `qualification_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `education_level_id` int(111) NOT NULL,
  `from_year` varchar(255) NOT NULL,
  `language_id` int(111) NOT NULL,
  `to_year` varchar(255) NOT NULL,
  `skill_id` text NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`qualification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `xin_employee_qualification`
--

INSERT INTO `xin_employee_qualification` (`qualification_id`, `employee_id`, `name`, `education_level_id`, `from_year`, `language_id`, `to_year`, `skill_id`, `description`, `created_at`) VALUES
(1, 1, 'Announcement', 1, '2017-08-02', 2, '2017-08-15', '2', 'adfdfadfd', '16-08-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_resignations`
--

CREATE TABLE IF NOT EXISTS `xin_employee_resignations` (
  `resignation_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `notice_date` varchar(255) NOT NULL,
  `resignation_date` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`resignation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_shift`
--

CREATE TABLE IF NOT EXISTS `xin_employee_shift` (
  `emp_shift_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `shift_id` int(111) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`emp_shift_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `xin_employee_shift`
--

INSERT INTO `xin_employee_shift` (`emp_shift_id`, `employee_id`, `shift_id`, `from_date`, `to_date`, `created_at`) VALUES
(6, 1, 1, '2017-02-01', '2017-11-30', '2017-02-25 02:53:48'),
(9, 23, 1, '2017-01-02', '2017-12-29', '2017-04-28 03:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_terminations`
--

CREATE TABLE IF NOT EXISTS `xin_employee_terminations` (
  `termination_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `terminated_by` int(111) NOT NULL,
  `termination_type_id` int(111) NOT NULL,
  `termination_date` varchar(255) NOT NULL,
  `notice_date` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`termination_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_transfer`
--

CREATE TABLE IF NOT EXISTS `xin_employee_transfer` (
  `transfer_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `transfer_date` varchar(255) NOT NULL,
  `transfer_department` int(111) NOT NULL,
  `transfer_location` int(111) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`transfer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_travels`
--

CREATE TABLE IF NOT EXISTS `xin_employee_travels` (
  `travel_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `visit_purpose` varchar(255) NOT NULL,
  `visit_place` varchar(255) NOT NULL,
  `travel_mode` int(111) NOT NULL,
  `arrangement_type` int(111) NOT NULL,
  `expected_budget` varchar(255) NOT NULL,
  `actual_budget` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`travel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_warnings`
--

CREATE TABLE IF NOT EXISTS `xin_employee_warnings` (
  `warning_id` int(111) NOT NULL AUTO_INCREMENT,
  `warning_to` int(111) NOT NULL,
  `warning_by` int(111) NOT NULL,
  `warning_date` varchar(255) NOT NULL,
  `warning_type_id` int(111) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`warning_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `xin_employee_warnings`
--

INSERT INTO `xin_employee_warnings` (`warning_id`, `warning_to`, `warning_by`, `warning_date`, `warning_type_id`, `subject`, `description`, `status`, `created_at`) VALUES
(2, 23, 24, '2017-08-15', 2, 'Test Ticket', '&lt;p&gt;asdasdsds&lt;/p&gt;', 0, '16-08-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_employee_work_experience`
--

CREATE TABLE IF NOT EXISTS `xin_employee_work_experience` (
  `work_experience_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`work_experience_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `xin_employee_work_experience`
--

INSERT INTO `xin_employee_work_experience` (`work_experience_id`, `employee_id`, `company_name`, `from_date`, `to_date`, `post`, `description`, `created_at`) VALUES
(1, 23, 'abcd', '2017-06-02', '2017-06-08', 'software engineer', 'test description goes here..w', '02-06-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_expenses`
--

CREATE TABLE IF NOT EXISTS `xin_expenses` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(200) NOT NULL,
  `expense_type_id` int(200) NOT NULL,
  `billcopy_file` text NOT NULL,
  `amount` varchar(200) NOT NULL,
  `purchase_date` varchar(200) NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `status_remarks` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `xin_expenses`
--

INSERT INTO `xin_expenses` (`expense_id`, `employee_id`, `expense_type_id`, `billcopy_file`, `amount`, `purchase_date`, `remarks`, `status`, `status_remarks`, `created_at`) VALUES
(1, 23, 1, 'bill_copy_1503617200.jpg', '1500', '2017-08-10', '&lt;p&gt;testtttt&lt;/p&gt;', 0, '', '19-08-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_expense_type`
--

CREATE TABLE IF NOT EXISTS `xin_expense_type` (
  `expense_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`expense_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `xin_expense_type`
--

INSERT INTO `xin_expense_type` (`expense_type_id`, `name`, `status`, `created_at`) VALUES
(1, 'Utilities', 1, '2017-04-27 08:52:10'),
(2, 'Rent', 1, '2017-04-28 07:46:18'),
(3, 'Insurance', 1, '2017-04-28 07:46:23'),
(5, 'Supplies', 1, '2017-04-28 07:46:34'),
(7, 'Wages', 1, '2017-04-28 07:47:09'),
(8, 'Taxes', 1, '2017-04-28 08:03:29'),
(9, 'Interest', 1, '2017-04-28 08:03:35'),
(10, 'Maintenance', 1, '2017-04-28 08:03:46'),
(11, 'Meals and Entertainment', 1, '2017-04-28 08:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `xin_file_manager`
--

CREATE TABLE IF NOT EXISTS `xin_file_manager` (
  `file_id` int(111) NOT NULL AUTO_INCREMENT,
  `user_id` int(111) NOT NULL,
  `department_id` int(111) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL,
  `file_extension` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_file_manager_settings`
--

CREATE TABLE IF NOT EXISTS `xin_file_manager_settings` (
  `setting_id` int(111) NOT NULL AUTO_INCREMENT,
  `allowed_extensions` text NOT NULL,
  `maximum_file_size` varchar(255) NOT NULL,
  `is_enable_all_files` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `xin_file_manager_settings`
--

INSERT INTO `xin_file_manager_settings` (`setting_id`, `allowed_extensions`, `maximum_file_size`, `is_enable_all_files`, `updated_at`) VALUES
(1, 'gif,png,pdf,txt,mp3,mp4,flv,doc,docx,xls,jpg,jpeg', '10', '', '2017-09-11 05:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `xin_finance_bankcash`
--

CREATE TABLE IF NOT EXISTS `xin_finance_bankcash` (
  `bankcash_id` int(111) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_balance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_branch` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`bankcash_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_finance_deposit`
--

CREATE TABLE IF NOT EXISTS `xin_finance_deposit` (
  `deposit_id` int(111) NOT NULL AUTO_INCREMENT,
  `account_type_id` int(111) NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deposit_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(111) NOT NULL,
  `payer_id` int(111) NOT NULL,
  `payment_method` int(111) NOT NULL,
  `deposit_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deposit_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`deposit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_finance_expense`
--

CREATE TABLE IF NOT EXISTS `xin_finance_expense` (
  `expense_id` int(111) NOT NULL AUTO_INCREMENT,
  `account_type_id` int(111) NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expense_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(111) NOT NULL,
  `payee_id` int(111) NOT NULL,
  `payment_method` int(111) NOT NULL,
  `expense_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expense_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_finance_payees`
--

CREATE TABLE IF NOT EXISTS `xin_finance_payees` (
  `payee_id` int(11) NOT NULL AUTO_INCREMENT,
  `payee_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`payee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_finance_payers`
--

CREATE TABLE IF NOT EXISTS `xin_finance_payers` (
  `payer_id` int(11) NOT NULL AUTO_INCREMENT,
  `payer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`payer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_finance_transactions`
--

CREATE TABLE IF NOT EXISTS `xin_finance_transactions` (
  `transaction_id` int(111) NOT NULL AUTO_INCREMENT,
  `account_type_id` int(111) NOT NULL,
  `deposit_id` int(111) NOT NULL,
  `expense_id` int(111) NOT NULL,
  `transfer_id` int(111) NOT NULL,
  `transaction_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_debit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_credit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_finance_transfer`
--

CREATE TABLE IF NOT EXISTS `xin_finance_transfer` (
  `transfer_id` int(111) NOT NULL AUTO_INCREMENT,
  `from_account_id` int(111) NOT NULL,
  `to_account_id` int(111) NOT NULL,
  `transfer_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transfer_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `transfer_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`transfer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_holidays`
--

CREATE TABLE IF NOT EXISTS `xin_holidays` (
  `holiday_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `is_publish` tinyint(1) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`holiday_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `xin_holidays`
--

INSERT INTO `xin_holidays` (`holiday_id`, `event_name`, `description`, `start_date`, `end_date`, `is_publish`, `created_at`) VALUES
(1, 'National Holidays', '&lt;p&gt;National Holidays&lt;br&gt;&lt;/p&gt;', '2017-06-08', '2017-06-09', 1, '28-04-2017'),
(2, 'Festival', '&lt;span style=\\&quot;color: rgb(79, 81, 84); font-family: \\&quot; open=\\&quot;\\&quot; sans\\&quot;,=\\&quot;\\&quot; arial;\\&quot;=\\&quot;\\&quot;&gt;Festival&lt;/span&gt;', '2017-04-13', '2017-04-14', 1, '28-04-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_hourly_templates`
--

CREATE TABLE IF NOT EXISTS `xin_hourly_templates` (
  `hourly_rate_id` int(111) NOT NULL AUTO_INCREMENT,
  `hourly_grade` varchar(255) NOT NULL,
  `hourly_rate` varchar(255) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`hourly_rate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_income_categories`
--

CREATE TABLE IF NOT EXISTS `xin_income_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `xin_income_categories`
--

INSERT INTO `xin_income_categories` (`category_id`, `name`, `status`, `created_at`) VALUES
(1, 'Envato', 1, '25-07-2017 09:36:20'),
(2, 'Salary', 1, '25-07-2017 09:36:28'),
(3, 'Other Income', 1, '25-07-2017 09:36:32'),
(4, 'Interest Income', 1, '25-07-2017 09:36:53'),
(5, 'Part Time Work', 1, '25-07-2017 09:37:13'),
(6, 'Regular Income', 1, '25-07-2017 09:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `xin_jobs`
--

CREATE TABLE IF NOT EXISTS `xin_jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(255) NOT NULL,
  `designation_id` int(111) NOT NULL,
  `job_type` int(225) NOT NULL,
  `job_vacancy` int(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `minimum_experience` varchar(255) NOT NULL,
  `date_of_closing` varchar(200) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `xin_jobs`
--

INSERT INTO `xin_jobs` (`job_id`, `job_title`, `designation_id`, `job_type`, `job_vacancy`, `gender`, `minimum_experience`, `date_of_closing`, `short_description`, `long_description`, `status`, `created_at`) VALUES
(1, 'Software Engineer', 16, 2, 2, '1', '4', '2017-06-01', 'At least 3 years of work experience as Software Engineer in a reputable company / organization', 'At least 3 years of work experience as Software Engineer in a reputable company / organization.&lt;p&gt;&lt;/p&gt;', 1, '2017-04-28 04:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `xin_job_applications`
--

CREATE TABLE IF NOT EXISTS `xin_job_applications` (
  `application_id` int(111) NOT NULL AUTO_INCREMENT,
  `job_id` int(111) NOT NULL,
  `user_id` int(111) NOT NULL,
  `message` text NOT NULL,
  `job_resume` text NOT NULL,
  `application_status` varchar(200) NOT NULL,
  `application_remarks` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_job_interviews`
--

CREATE TABLE IF NOT EXISTS `xin_job_interviews` (
  `job_interview_id` int(111) NOT NULL AUTO_INCREMENT,
  `job_id` int(111) NOT NULL,
  `interviewers_id` varchar(255) NOT NULL,
  `interview_place` varchar(255) NOT NULL,
  `interview_date` varchar(255) NOT NULL,
  `interview_time` varchar(255) NOT NULL,
  `interviewees_id` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`job_interview_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_job_type`
--

CREATE TABLE IF NOT EXISTS `xin_job_type` (
  `job_type_id` int(111) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`job_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `xin_job_type`
--

INSERT INTO `xin_job_type` (`job_type_id`, `type`, `created_at`) VALUES
(1, 'Intern', '2017-03-22 07:07:55'),
(2, 'Freelancer', '2017-03-22 07:07:55'),
(5, 'Full-Time', '2017-03-22 07:07:55'),
(6, 'Part-Time', '2017-03-22 07:08:00'),
(7, 'Contract', '2017-03-22 07:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `xin_leave_applications`
--

CREATE TABLE IF NOT EXISTS `xin_leave_applications` (
  `leave_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(222) NOT NULL,
  `leave_type_id` int(222) NOT NULL,
  `from_date` varchar(200) NOT NULL,
  `to_date` varchar(200) NOT NULL,
  `applied_on` varchar(200) NOT NULL,
  `reason` text NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `xin_leave_applications`
--

INSERT INTO `xin_leave_applications` (`leave_id`, `employee_id`, `leave_type_id`, `from_date`, `to_date`, `applied_on`, `reason`, `remarks`, `status`, `created_at`) VALUES
(4, 23, 1, '2017-06-01', '2017-06-13', '2017-06-06 08:35:10', 'asdfasd', '&lt;p&gt;fasdfadsfad&lt;/p&gt;', 3, '2017-06-06 08:35:10'),
(6, 1, 2, '2017-06-01', '2017-06-06', '2017-06-08 07:29:42', 'sdasdsa', '&lt;p&gt;asdsadsds&lt;/p&gt;', 1, '2017-06-08 07:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `xin_leave_type`
--

CREATE TABLE IF NOT EXISTS `xin_leave_type` (
  `leave_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(200) NOT NULL,
  `days_per_year` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`leave_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `xin_leave_type`
--

INSERT INTO `xin_leave_type` (`leave_type_id`, `type_name`, `days_per_year`, `status`, `created_at`) VALUES
(1, 'Casual Leave', '15', 1, '2017-04-28 07:42:15'),
(2, 'Medical Leave', '20', 1, '2017-04-28 07:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `xin_make_payment`
--

CREATE TABLE IF NOT EXISTS `xin_make_payment` (
  `make_payment_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `department_id` int(111) NOT NULL,
  `company_id` int(111) NOT NULL,
  `location_id` int(111) NOT NULL,
  `designation_id` int(111) NOT NULL,
  `payment_date` varchar(200) NOT NULL,
  `basic_salary` varchar(255) NOT NULL,
  `payment_amount` varchar(255) NOT NULL,
  `gross_salary` varchar(255) NOT NULL,
  `total_allowances` varchar(255) NOT NULL,
  `total_deductions` varchar(255) NOT NULL,
  `net_salary` varchar(255) NOT NULL,
  `house_rent_allowance` varchar(255) NOT NULL,
  `medical_allowance` varchar(255) NOT NULL,
  `travelling_allowance` varchar(255) NOT NULL,
  `dearness_allowance` varchar(255) NOT NULL,
  `provident_fund` varchar(255) NOT NULL,
  `tax_deduction` varchar(255) NOT NULL,
  `security_deposit` varchar(255) NOT NULL,
  `overtime_rate` varchar(255) NOT NULL,
  `is_advance_salary_deduct` int(11) NOT NULL,
  `advance_salary_amount` varchar(255) NOT NULL,
  `is_payment` tinyint(1) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `hourly_rate` varchar(255) NOT NULL,
  `total_hours_work` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`make_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_office_location`
--

CREATE TABLE IF NOT EXISTS `xin_office_location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(111) NOT NULL,
  `location_head` int(111) NOT NULL,
  `location_manager` int(111) NOT NULL,
  `location_name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` int(111) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `xin_office_location`
--

INSERT INTO `xin_office_location` (`location_id`, `company_id`, `location_head`, `location_manager`, `location_name`, `email`, `phone`, `fax`, `address_1`, `address_2`, `city`, `state`, `zipcode`, `country`, `added_by`, `created_at`, `status`) VALUES
(1, 4, 1, 1, 'Wz Head Office', 'admin@demo.com', '123654', '', 'Address Line 1', 'Address Line 2', 'Islamabad', 'Federal', '44000', 167, 1, '27-04-2017', 1),
(2, 5, 1, 1, 'Jk Branch Office', 'testbranch@demo.com', '12345678', '', 'G11 Markaz', '', 'Islamabad', '', '46000', 166, 1, '28-04-2017', 1);

-- --------------------------------------------------------

--
-- Table structure for table `xin_office_shift`
--

CREATE TABLE IF NOT EXISTS `xin_office_shift` (
  `office_shift_id` int(111) NOT NULL AUTO_INCREMENT,
  `shift_name` varchar(255) NOT NULL,
  `default_shift` int(111) NOT NULL,
  `monday_in_time` varchar(222) NOT NULL,
  `monday_out_time` varchar(222) NOT NULL,
  `tuesday_in_time` varchar(222) NOT NULL,
  `tuesday_out_time` varchar(222) NOT NULL,
  `wednesday_in_time` varchar(222) NOT NULL,
  `wednesday_out_time` varchar(222) NOT NULL,
  `thursday_in_time` varchar(222) NOT NULL,
  `thursday_out_time` varchar(222) NOT NULL,
  `friday_in_time` varchar(222) NOT NULL,
  `friday_out_time` varchar(222) NOT NULL,
  `saturday_in_time` varchar(222) NOT NULL,
  `saturday_out_time` varchar(222) NOT NULL,
  `sunday_in_time` varchar(222) NOT NULL,
  `sunday_out_time` varchar(222) NOT NULL,
  `created_at` varchar(222) NOT NULL,
  PRIMARY KEY (`office_shift_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `xin_office_shift`
--

INSERT INTO `xin_office_shift` (`office_shift_id`, `shift_name`, `default_shift`, `monday_in_time`, `monday_out_time`, `tuesday_in_time`, `tuesday_out_time`, `wednesday_in_time`, `wednesday_out_time`, `thursday_in_time`, `thursday_out_time`, `friday_in_time`, `friday_out_time`, `saturday_in_time`, `saturday_out_time`, `sunday_in_time`, `sunday_out_time`, `created_at`) VALUES
(1, 'Morning Shift', 1, '09:00', '17:00', '09:00', '17:00', '09:00', '17:00', '09:00', '17:00', '09:00', '16:00', '10:00', '15:00', '', '', '2017-04-28'),
(2, 'Afternoon Shift', 0, '15:00', '23:00', '15:00', '23:00', '15:00', '23:00', '15:00', '23:00', '15:00', '23:00', '15:00', '21:00', '', '', '2017-04-28'),
(4, 'Night Shift', 0, '18:00', '02:00', '18:00', '02:00', '18:00', '02:00', '18:58', '02:00', '18:00', '02:00', '18:00', '00:00', '', '', '2017-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `xin_payment_method`
--

CREATE TABLE IF NOT EXISTS `xin_payment_method` (
  `payment_method_id` int(111) NOT NULL AUTO_INCREMENT,
  `method_name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `xin_payment_method`
--

INSERT INTO `xin_payment_method` (`payment_method_id`, `method_name`, `created_at`) VALUES
(10, 'Cash', '24-02-2017'),
(11, 'Credit Card', '24-02-2017'),
(12, 'Bank', '24-02-2017'),
(13, 'Visa Debit Cart', '24-02-2017'),
(14, 'Online', '24-02-2017'),
(15, 'By Hand', '24-02-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_performance_appraisal`
--

CREATE TABLE IF NOT EXISTS `xin_performance_appraisal` (
  `performance_appraisal_id` int(111) NOT NULL AUTO_INCREMENT,
  `employee_id` int(111) NOT NULL,
  `appraisal_year_month` varchar(255) NOT NULL,
  `customer_experience` int(111) NOT NULL,
  `marketing` int(111) NOT NULL,
  `management` int(111) NOT NULL,
  `administration` int(111) NOT NULL,
  `presentation_skill` int(111) NOT NULL,
  `quality_of_work` int(111) NOT NULL,
  `efficiency` int(111) NOT NULL,
  `integrity` int(111) NOT NULL,
  `professionalism` int(111) NOT NULL,
  `team_work` int(111) NOT NULL,
  `critical_thinking` int(111) NOT NULL,
  `conflict_management` int(111) NOT NULL,
  `attendance` int(111) NOT NULL,
  `ability_to_meet_deadline` int(111) NOT NULL,
  `remarks` text NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`performance_appraisal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `xin_performance_appraisal`
--

INSERT INTO `xin_performance_appraisal` (`performance_appraisal_id`, `employee_id`, `appraisal_year_month`, `customer_experience`, `marketing`, `management`, `administration`, `presentation_skill`, `quality_of_work`, `efficiency`, `integrity`, `professionalism`, `team_work`, `critical_thinking`, `conflict_management`, `attendance`, `ability_to_meet_deadline`, `remarks`, `added_by`, `created_at`) VALUES
(1, 23, '2017-03', 2, 3, 2, 3, 3, 2, 2, 2, 3, 2, 3, 1, 3, 2, '&lt;p&gt;Test Remarksss&lt;/p&gt;', 0, '28-04-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_performance_indicator`
--

CREATE TABLE IF NOT EXISTS `xin_performance_indicator` (
  `performance_indicator_id` int(111) NOT NULL AUTO_INCREMENT,
  `designation_id` int(111) NOT NULL,
  `customer_experience` int(111) NOT NULL,
  `marketing` int(111) NOT NULL,
  `management` int(111) NOT NULL,
  `administration` int(111) NOT NULL,
  `presentation_skill` int(111) NOT NULL,
  `quality_of_work` int(111) NOT NULL,
  `efficiency` int(111) NOT NULL,
  `integrity` int(111) NOT NULL,
  `professionalism` int(111) NOT NULL,
  `team_work` int(111) NOT NULL,
  `critical_thinking` int(111) NOT NULL,
  `conflict_management` int(111) NOT NULL,
  `attendance` int(111) NOT NULL,
  `ability_to_meet_deadline` int(111) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`performance_indicator_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `xin_performance_indicator`
--

INSERT INTO `xin_performance_indicator` (`performance_indicator_id`, `designation_id`, `customer_experience`, `marketing`, `management`, `administration`, `presentation_skill`, `quality_of_work`, `efficiency`, `integrity`, `professionalism`, `team_work`, `critical_thinking`, `conflict_management`, `attendance`, `ability_to_meet_deadline`, `added_by`, `created_at`) VALUES
(1, 14, 0, 3, 2, 3, 3, 3, 2, 2, 3, 2, 2, 3, 3, 3, 1, '28-04-2017'),
(3, 2, 2, 1, 0, 0, 0, 0, 0, 1, 2, 0, 0, 0, 0, 0, 1, '01-06-2017'),
(5, 2, 1, 3, 0, 0, 0, 0, 0, 0, 1, 2, 0, 0, 0, 0, 1, '03-07-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_projects`
--

CREATE TABLE IF NOT EXISTS `xin_projects` (
  `project_id` int(111) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `company_id` int(111) NOT NULL,
  `assigned_to` text NOT NULL,
  `priority` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `description` text NOT NULL,
  `added_by` int(111) NOT NULL,
  `project_progress` varchar(255) NOT NULL,
  `project_note` longtext NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_projects_attachment`
--

CREATE TABLE IF NOT EXISTS `xin_projects_attachment` (
  `project_attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(200) NOT NULL,
  `upload_by` int(255) NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_description` text NOT NULL,
  `attachment_file` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`project_attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_projects_bugs`
--

CREATE TABLE IF NOT EXISTS `xin_projects_bugs` (
  `bug_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(111) NOT NULL,
  `user_id` int(200) NOT NULL,
  `attachment_file` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`bug_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_projects_discussion`
--

CREATE TABLE IF NOT EXISTS `xin_projects_discussion` (
  `discussion_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(111) NOT NULL,
  `user_id` int(200) NOT NULL,
  `attachment_file` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`discussion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_qualification_education_level`
--

CREATE TABLE IF NOT EXISTS `xin_qualification_education_level` (
  `education_level_id` int(111) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`education_level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `xin_qualification_education_level`
--

INSERT INTO `xin_qualification_education_level` (`education_level_id`, `name`, `created_at`) VALUES
(1, 'High School Diploma / GED', '28-04-2017'),
(2, 'Associate Degree', '28-04-2017'),
(3, 'Graduate', '28-04-2017'),
(4, 'Post Graduate', '28-04-2017'),
(5, 'Doctorate', '28-04-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_qualification_language`
--

CREATE TABLE IF NOT EXISTS `xin_qualification_language` (
  `language_id` int(111) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `xin_qualification_language`
--

INSERT INTO `xin_qualification_language` (`language_id`, `name`, `created_at`) VALUES
(1, 'English', '28-04-2017'),
(2, 'French', '28-04-2017'),
(3, 'Arabic', '28-04-2017'),
(4, 'Russian', '28-04-2017'),
(5, 'Spanish', '28-04-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_qualification_skill`
--

CREATE TABLE IF NOT EXISTS `xin_qualification_skill` (
  `skill_id` int(111) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `xin_qualification_skill`
--

INSERT INTO `xin_qualification_skill` (`skill_id`, `name`, `created_at`) VALUES
(1, 'PHP 4/5/6/7', '28-04-2017'),
(2, 'jQuery', '28-04-2017'),
(3, 'Ajax', '28-04-2017'),
(4, 'Magento', '28-04-2017'),
(5, 'CodeIgniter', '28-04-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_salary_templates`
--

CREATE TABLE IF NOT EXISTS `xin_salary_templates` (
  `salary_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `salary_grades` varchar(255) NOT NULL,
  `basic_salary` varchar(255) NOT NULL,
  `overtime_rate` varchar(255) NOT NULL,
  `house_rent_allowance` varchar(255) NOT NULL,
  `medical_allowance` varchar(255) NOT NULL,
  `travelling_allowance` varchar(255) NOT NULL,
  `dearness_allowance` varchar(255) NOT NULL,
  `security_deposit` varchar(255) NOT NULL,
  `provident_fund` varchar(255) NOT NULL,
  `tax_deduction` varchar(255) NOT NULL,
  `gross_salary` varchar(255) NOT NULL,
  `total_allowance` varchar(255) NOT NULL,
  `total_deduction` varchar(255) NOT NULL,
  `net_salary` varchar(255) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`salary_template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_support_tickets`
--

CREATE TABLE IF NOT EXISTS `xin_support_tickets` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_code` varchar(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `ticket_priority` varchar(255) NOT NULL,
  `department_id` int(111) NOT NULL,
  `assigned_to` text NOT NULL,
  `message` text NOT NULL,
  `description` text NOT NULL,
  `ticket_remarks` text NOT NULL,
  `ticket_status` varchar(200) NOT NULL,
  `ticket_note` text NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_support_ticket_files`
--

CREATE TABLE IF NOT EXISTS `xin_support_ticket_files` (
  `ticket_file_id` int(111) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `ticket_files` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`ticket_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_system_setting`
--

CREATE TABLE IF NOT EXISTS `xin_system_setting` (
  `setting_id` int(111) NOT NULL AUTO_INCREMENT,
  `application_name` varchar(255) NOT NULL,
  `default_currency` varchar(255) NOT NULL,
  `default_currency_symbol` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `show_currency` varchar(255) NOT NULL,
  `currency_position` varchar(255) NOT NULL,
  `notification_position` varchar(255) NOT NULL,
  `notification_close_btn` varchar(255) NOT NULL,
  `notification_bar` varchar(255) NOT NULL,
  `enable_registration` varchar(255) NOT NULL,
  `login_with` varchar(255) NOT NULL,
  `date_format_xi` varchar(255) NOT NULL,
  `employee_manage_own_contact` varchar(255) NOT NULL,
  `employee_manage_own_profile` varchar(255) NOT NULL,
  `employee_manage_own_qualification` varchar(255) NOT NULL,
  `employee_manage_own_work_experience` varchar(255) NOT NULL,
  `employee_manage_own_document` varchar(255) NOT NULL,
  `employee_manage_own_picture` varchar(255) NOT NULL,
  `employee_manage_own_social` varchar(255) NOT NULL,
  `employee_manage_own_bank_account` varchar(255) NOT NULL,
  `enable_attendance` varchar(255) NOT NULL,
  `enable_clock_in_btn` varchar(255) NOT NULL,
  `enable_email_notification` varchar(255) NOT NULL,
  `payroll_include_day_summary` varchar(255) NOT NULL,
  `payroll_include_hour_summary` varchar(255) NOT NULL,
  `payroll_include_leave_summary` varchar(255) NOT NULL,
  `enable_job_application_candidates` varchar(255) NOT NULL,
  `job_logo` varchar(255) NOT NULL,
  `payroll_logo` varchar(255) NOT NULL,
  `is_payslip_password_generate` int(11) NOT NULL,
  `payslip_password_format` varchar(255) NOT NULL,
  `enable_profile_background` varchar(255) NOT NULL,
  `enable_policy_link` varchar(255) NOT NULL,
  `enable_layout` varchar(255) NOT NULL,
  `job_application_format` text NOT NULL,
  `project_email` varchar(255) NOT NULL,
  `holiday_email` varchar(255) NOT NULL,
  `leave_email` varchar(255) NOT NULL,
  `payslip_email` varchar(255) NOT NULL,
  `award_email` varchar(255) NOT NULL,
  `recruitment_email` varchar(255) NOT NULL,
  `announcement_email` varchar(255) NOT NULL,
  `training_email` varchar(255) NOT NULL,
  `task_email` varchar(255) NOT NULL,
  `compact_sidebar` varchar(255) NOT NULL,
  `fixed_header` varchar(255) NOT NULL,
  `fixed_sidebar` varchar(255) NOT NULL,
  `boxed_wrapper` varchar(255) NOT NULL,
  `layout_static` varchar(255) NOT NULL,
  `system_skin` varchar(255) NOT NULL,
  `animation_effect` varchar(255) NOT NULL,
  `animation_effect_modal` varchar(255) NOT NULL,
  `animation_effect_topmenu` varchar(255) NOT NULL,
  `footer_text` varchar(255) NOT NULL,
  `enable_page_rendered` varchar(255) NOT NULL,
  `enable_current_year` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `xin_system_setting`
--

INSERT INTO `xin_system_setting` (`setting_id`, `application_name`, `default_currency`, `default_currency_symbol`, `show_currency`, `currency_position`, `notification_position`, `notification_close_btn`, `notification_bar`, `enable_registration`, `login_with`, `date_format_xi`, `employee_manage_own_contact`, `employee_manage_own_profile`, `employee_manage_own_qualification`, `employee_manage_own_work_experience`, `employee_manage_own_document`, `employee_manage_own_picture`, `employee_manage_own_social`, `employee_manage_own_bank_account`, `enable_attendance`, `enable_clock_in_btn`, `enable_email_notification`, `payroll_include_day_summary`, `payroll_include_hour_summary`, `payroll_include_leave_summary`, `enable_job_application_candidates`, `job_logo`, `payroll_logo`, `is_payslip_password_generate`, `payslip_password_format`, `enable_profile_background`, `enable_policy_link`, `enable_layout`, `job_application_format`, `project_email`, `holiday_email`, `leave_email`, `payslip_email`, `award_email`, `recruitment_email`, `announcement_email`, `training_email`, `task_email`, `compact_sidebar`, `fixed_header`, `fixed_sidebar`, `boxed_wrapper`, `layout_static`, `system_skin`, `animation_effect`, `animation_effect_modal`, `animation_effect_topmenu`, `footer_text`, `enable_page_rendered`, `enable_current_year`, `updated_at`) VALUES
(1, 'abcd', 'GBP - £?', 'GBP - £‎', 'symbol', 'Prefix', 'toast-top-center', 'false', 'true', 'no', 'username', 'd-M-Y', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '', 'yes', 'yes', 'yes', 'yes', 'job_logo_1499893826.png', 'payroll_logo_1503586691.png', 0, 'dateofbirth', 'yes', 'yes', 'yes', 'doc,docx,jpeg,jpg,pdf,txt,excel', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '', 'fixed-header', 'fixed-sidebar', '', '', 'skin-default', 'fadeInDown', 'pulse', 'pulse', 'abcd', 'yes', 'yes', '2017-05-09 04:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `xin_tasks`
--

CREATE TABLE IF NOT EXISTS `xin_tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(111) NOT NULL,
  `created_by` int(111) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `task_hour` varchar(200) NOT NULL,
  `task_progress` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `task_status` int(5) NOT NULL,
  `task_note` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_tasks_attachment`
--

CREATE TABLE IF NOT EXISTS `xin_tasks_attachment` (
  `task_attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(200) NOT NULL,
  `upload_by` int(255) NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_description` text NOT NULL,
  `attachment_file` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`task_attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_tasks_comments`
--

CREATE TABLE IF NOT EXISTS `xin_tasks_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `task_comments` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_termination_type`
--

CREATE TABLE IF NOT EXISTS `xin_termination_type` (
  `termination_type_id` int(111) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`termination_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `xin_termination_type`
--

INSERT INTO `xin_termination_type` (`termination_type_id`, `type`, `created_at`) VALUES
(1, 'Layoff', ''),
(2, 'Damaging Company Property', ''),
(3, 'Drug or Alcohol Possession at Work', ''),
(4, 'Falsifying Company Records', ''),
(5, 'Insubordination', ''),
(6, 'Misconduct', ''),
(7, 'Poor Performance', ''),
(8, 'Stealing', ''),
(9, 'Using Company Property for Personal Business', ''),
(10, 'Taking Too Much Time Off', ''),
(11, 'Violating Company Policy', ''),
(12, 'Voluntary Termination', ''),
(13, 'Involuntary Termination', ''),
(14, 'Discriminatory Conduct Towards others', ''),
(15, 'Harassment (Sexual and Otherwise)', '');

-- --------------------------------------------------------

--
-- Table structure for table `xin_tickets_attachment`
--

CREATE TABLE IF NOT EXISTS `xin_tickets_attachment` (
  `ticket_attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(200) NOT NULL,
  `upload_by` int(255) NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_description` text NOT NULL,
  `attachment_file` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`ticket_attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_tickets_comments`
--

CREATE TABLE IF NOT EXISTS `xin_tickets_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `ticket_comments` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_trainers`
--

CREATE TABLE IF NOT EXISTS `xin_trainers` (
  `trainer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `designation_id` int(111) NOT NULL,
  `expertise` text NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`trainer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_training`
--

CREATE TABLE IF NOT EXISTS `xin_training` (
  `training_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(200) NOT NULL,
  `training_type_id` int(200) NOT NULL,
  `trainer_id` int(200) NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `finish_date` varchar(200) NOT NULL,
  `training_cost` varchar(200) NOT NULL,
  `training_status` int(200) NOT NULL,
  `description` text NOT NULL,
  `performance` varchar(200) NOT NULL,
  `remarks` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`training_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `xin_training_types`
--

CREATE TABLE IF NOT EXISTS `xin_training_types` (
  `training_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`training_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `xin_training_types`
--

INSERT INTO `xin_training_types` (`training_type_id`, `type`, `created_at`, `status`) VALUES
(1, 'Job Training', '28-04-2017', 1),
(2, 'Promotional Training', '28-04-2017', 1),
(3, 'Workshop', '28-04-2017', 1),
(4, 'Webinar', '28-04-2017', 1),
(5, 'Seminar', '28-04-2017', 1),
(6, 'Online Training', '28-04-2017', 1);

-- --------------------------------------------------------

--
-- Table structure for table `xin_travel_arrangement_type`
--

CREATE TABLE IF NOT EXISTS `xin_travel_arrangement_type` (
  `arrangement_type_id` int(111) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`arrangement_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `xin_travel_arrangement_type`
--

INSERT INTO `xin_travel_arrangement_type` (`arrangement_type_id`, `type`, `status`, `created_at`) VALUES
(1, 'Personal Arrangment', 1, '2017-04-28 07:47:55'),
(2, 'Hotel', 1, '2017-04-28 07:48:00'),
(3, 'Guest House', 1, '2017-04-28 07:48:06'),
(4, 'Motel', 1, '2017-04-28 07:48:11'),
(5, 'AirBnB', 1, '2017-04-28 07:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `xin_user_roles`
--

CREATE TABLE IF NOT EXISTS `xin_user_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(200) NOT NULL,
  `role_access` varchar(200) NOT NULL,
  `role_resources` text NOT NULL,
  `created_at` varchar(200) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `xin_user_roles`
--

INSERT INTO `xin_user_roles` (`role_id`, `role_name`, `role_access`, `role_resources`, `created_at`) VALUES
(1, 'Super Admin', '1', '0,1,3,4,5,6,8,9,10,11,13,14,15,16,17,18,20,21,22,23,26,27,240,24,25,28,29,30,31,58,32,34,35,36,38,39,40,59,60,41,42,7,33,19,43,44,45,46,47,48,49,50,51,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,57,52,53,54,55,56', '20-11-2016'),
(9, 'Employee', '2', '0,57', '28-04-2017');

-- --------------------------------------------------------

--
-- Table structure for table `xin_warning_type`
--

CREATE TABLE IF NOT EXISTS `xin_warning_type` (
  `warning_type_id` int(111) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`warning_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `xin_warning_type`
--

INSERT INTO `xin_warning_type` (`warning_type_id`, `type`, `created_at`) VALUES
(1, 'Verbal Warning', '2017-04-28 07:43:33'),
(2, 'First Written Warning', '2017-04-28 07:43:38'),
(3, 'Second Written Warning', '2017-04-28 07:43:44'),
(4, 'Final Written Warning', '2017-04-28 07:43:49'),
(5, 'Incident Explanation Request', '2017-04-28 07:43:56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
