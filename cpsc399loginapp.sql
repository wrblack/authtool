--
-- Database: `cpsc399loginapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `idAnswers` int(11) NOT NULL,
  `idCourse` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `dateAsked` date NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `idAttendance` int(11) NOT NULL,
  `idCourse` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `classDate` date NOT NULL,
  `present` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`idAttendance`, `idCourse`, `idStudent`, `classDate`, `present`) VALUES
(2, 301, 1111, '2016-04-29', 0),
(3, 2020, 1111, '2016-04-29', 1),
(4, 2020, 1111, '2016-04-28', 0),
(1111, 1010, 1111, '2016-04-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `beacon`
--

CREATE TABLE `beacon` (
  `idBeacon` int(11) NOT NULL,
  `UUID` varchar(45) NOT NULL,
  `major` int(11) NOT NULL,
  `minor` int(11) NOT NULL,
  `macAddr` varchar(45) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beacon`
--

INSERT INTO `beacon` (`idBeacon`, `UUID`, `major`, `minor`, `macAddr`, `name`) VALUES
(999, '1234567890', 123, 321, '123123123', 'beacon1');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `idCourse` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `idBeacon` int(11) NOT NULL,
  `className` varchar(45) NOT NULL,
  `dayOfWeek` int(11) NOT NULL,
  `timeSlot` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`idCourse`, `idStudent`, `idProfessor`, `idBeacon`, `className`, `dayOfWeek`, `timeSlot`) VALUES
(6, 1111, 9999, 999, 'iOS Sensors', 1, '00:45:00'),
(301, 1111, 9999, 999, 'Advanced Database 301', 5, '01:45:00'),
(1010, 1111, 9999, 999, 'mysql 101', 3, '00:45:00'),
(1212, 1111, 9999, 999, 'Test Adding a Class', 0, '00:00:30'),
(2020, 1111, 9999, 999, 'PHP 101', 4, '01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `coursequestion`
--

CREATE TABLE `coursequestion` (
  `idCourseQuestion` int(11) NOT NULL,
  `idCourse` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `idProfessor` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `emailAddress` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`idProfessor`, `idStudent`, `emailAddress`) VALUES
(9999, 1111, 'professor1@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `idQuestion` int(11) NOT NULL,
  `questionText` int(255) NOT NULL,
  `optionA` int(45) NOT NULL,
  `optionB` int(45) NOT NULL,
  `optionC` int(45) NOT NULL,
  `optionD` int(45) NOT NULL,
  `optionE` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `idStudent` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`idStudent`, `name`, `email`, `username`, `password`) VALUES
(1111, 'test', 'test@test.com', 'test', 'test'),
(2222, 'test2', 't', 'test2', 't');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`idAnswers`),
  ADD KEY `idCourse` (`idCourse`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`idAttendance`),
  ADD KEY `idCourse` (`idCourse`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Indexes for table `beacon`
--
ALTER TABLE `beacon`
  ADD PRIMARY KEY (`idBeacon`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`idCourse`),
  ADD KEY `idStudent` (`idStudent`),
  ADD KEY `idProfessor` (`idProfessor`),
  ADD KEY `idBeacon` (`idBeacon`);

--
-- Indexes for table `coursequestion`
--
ALTER TABLE `coursequestion`
  ADD PRIMARY KEY (`idCourseQuestion`),
  ADD KEY `idCourse` (`idCourse`),
  ADD KEY `idQuestion` (`idQuestion`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idProfessor`),
  ADD KEY `idStudent` (`idStudent`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`idQuestion`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`idStudent`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `student` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`idCourse`) REFERENCES `course` (`idCourse`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `student` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`idCourse`) REFERENCES `course` (`idCourse`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `student` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`idProfessor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_ibfk_3` FOREIGN KEY (`idBeacon`) REFERENCES `beacon` (`idBeacon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coursequestion`
--
ALTER TABLE `coursequestion`
  ADD CONSTRAINT `coursequestion_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`idQuestion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coursequestion_ibfk_2` FOREIGN KEY (`idCourse`) REFERENCES `course` (`idCourse`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `student` (`idStudent`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
