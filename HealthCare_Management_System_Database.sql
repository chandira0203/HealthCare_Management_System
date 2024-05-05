
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `admin` (
  `adminid` int(10) NOT NULL,
  `adminname` varchar(25) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `usertype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `admin` (`adminid`, `adminname`, `loginid`, `password`, `status`, `usertype`) VALUES
(1, 'Ram', 'admin', 'admin123', 'Active', 'Admin'),
(2, 'Kishore', 'admin1', '123456789', 'Active', 'Admin'),
(3, 'Sooraj', 'admin2', '123456789', 'Active', 'Admin'),
(4, 'Anuj', 'admin', '123456789', 'Active', 'Admin'),
(5, 'Raj kiran', 'rajkiran', 'q1w2e3r4/', 'Active', 'Admin');


CREATE TABLE `appointment` (
  `appointmentid` int(10) NOT NULL,
  `appointmenttype` varchar(25) NOT NULL,
  `patientid` int(10) NOT NULL,
  `departmentid` int(10) NOT NULL,
  `appointmentdate` date NOT NULL,
  `appointmenttime` time NOT NULL,
  `doctorid` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `app_reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `appointment` (`appointmentid`, `appointmenttype`, `patientid`,  `departmentid`, `appointmentdate`, `appointmenttime`, `doctorid`, `status`, `app_reason`) VALUES

(48, 'Online', 22, 11,  '2024-02-04', '17:46:00', 37, 'Approved', ''),
(50, 'Offline', 7, 15,  '2024-03-05', '16:05:00', 38, 'Approved', '');



CREATE TABLE `department` (
  `departmentid` int(10) NOT NULL,
  `departmentname` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `department` (`departmentid`, `departmentname`, `description`, `status`) VALUES
(11, 'Physician', 'All type of disease', 'Active'),
(12, 'Children doctor', 'All kinds of disease', 'Active'),
(13, 'General Medicne1', 'General doctor', 'Active'),
(14, 'ENT Specialist', 'Ear, Nose and Tongue Doctor', 'Active'),
(15, 'Neurologist', 'Related neurons, bones', 'Active'),
(16, 'Surgery', 'Includes plastic surgery, brain and neurology surgery', 'Active'),
(17, 'Pediatrics', 'Pediatrics doctor', 'Active');



CREATE TABLE `doctor` (
  `doctorid` int(10) NOT NULL,
  `doctorname` varchar(50) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `departmentid` int(10) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `education` varchar(25) NOT NULL,
  `experience` float(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorid`, `doctorname`, `mobileno`, `departmentid`, `loginid`, `password`, `status`, `education`, `experience`) VALUES
(35, 'Lokesh', '9812453678', 11, 'doctor', 'doctor123', 'Active', 'MBBS', 7.0),
(36, 'Sandeep', '8966643980', 12, 'doctor1', '123456789', 'Active', 'MBBS', 5.0),
(37, 'Shivshankar', '7894561230', 13, 'doctor2', '123456789', 'Active', 'ORTHO', 9.0),
(38, 'Ranjankumar', '9874561230', 14, 'doctor3', '123456789', 'Active', 'DNB', 4.0),
(39, 'Divya', '8756332456', 15, 'doctor4', '123456789', 'Active', 'DNB', 5.0),
(40, 'Rashmi', '9876543210', 16, 'doctor5', '123456789', 'Active', 'MD', 7.0),
(41, 'chaitra', '8785674654', 17, 'doctor6', '123456789', 'Active', 'DA', 5.0);


CREATE TABLE `doctor_timings` (
  `doctor_timings_id` int(10) NOT NULL,
  `doctorid` int(10) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `available_day` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `doctor_timings` (`doctor_timings_id`, `doctorid`, `start_time`, `end_time`, `available_day`, `status`) VALUES
(17, 35, '09:30:00', '13:00:00', '', 'Active'),
(18, 36, '13:30:00', '17:00:00', '', 'Active'),
(19, 37, '14:00:00', '18:00:00', '', 'Active'),
(20, 38, '17:00:00', '21:00:00', '', 'Active'),
(21, 39, '13:00:00', '19:00:00', '', 'Active'),
(22, 40, '07:00:00', '11:00:00', '', 'Active'),
(23, 41, '13:30:00', '16:30:00', '', 'Active');

CREATE TABLE `patient` (
  `patientid` int(10) NOT NULL,
  `patientname` varchar(50) NOT NULL,
  `admissiondate` date NOT NULL,
  `admissiontime` time NOT NULL,
  `address` varchar(250) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `city` varchar(25) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `loginid` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `bloodgroup` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `patient` (`patientid`, `patientname`, `admissiondate`, `admissiontime`, `address`, `mobileno`, `city`, `pincode`, `loginid`, `password`, `bloodgroup`, `gender`, `dob`, `status`) VALUES
(7, 'mangala', '2024-01-02', '12:00:00', ' manjunath nilaya\r\nperla road\r\nujire', '98732230', 'belthangady', '542752', 'patient', 'patient123', 'B+', 'FEMALE', '1990-02-08', 'Active'),
(9, 'manoj', '2024-03-04', '12:30:00', ' mahadevi temple bc road', '8785674625', 'Banglore', '564892', '15', '123456789', 'O+', 'MALE', '1994-05-11', 'Active'),
(22, 'kavitha', '2024-05-05', '01:21:00', '  kuvempu nagar', '8756332456', 'Banglore', '577234', 'shricharanalva971', 'shricharanalva97', 'B+', 'FEMALE', '2016-03-10', 'Active'),
(23, 'paramesh', '2024-03-02', '05:07:00', ' Janakal', '9449443117', 'Hosadurga', '577527', '13', '123456789', 'B+', 'MALE', '1963-06-01', 'Active'),
(36, 'thanuja K B', '2024-03-04', '01:30:00', ' chitradurga', '9449678831', 'hosdurga', '577527', '12', '123456789', 'AB+', 'FEMALE', '1995-12-19', 'Active');


CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `loginname` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `patientname` varchar(50) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `createddateandtime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `user` (`userid`, `loginname`, `password`, `patientname`, `mobileno`, `email`, `createddateandtime`) VALUES
(1, 'admin', 'admin', 'admin', '', '', '2024-02-03 11:21:45');

ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `adminname` (`adminname`);
--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentid`);
--
--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentid`);
--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorid`);
--
-- Indexes for table `doctor_timings`
--
ALTER TABLE `doctor_timings`
  ADD PRIMARY KEY (`doctor_timings_id`);
--
--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientid`),
  ADD KEY `loginid` (`loginid`);
--
--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `doctor_timings`
--
ALTER TABLE `doctor_timings`
  MODIFY `doctor_timings_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;


