SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE `db_php_exam_alumni`;
USE `db_php_exam_alumni`;
-- Database: `db_php_web_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `idalumni` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `campus` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`idalumni`, `name`, `email`, `profile`, `course`, `campus`) VALUES
('041037087', 'Andreza de Sousa Vieira', 'andreza_sv@yahoo.com.br', 'https://www.linkedin.com/in/andrezavieira/', 'cstsi', 'ifpb-jp'),
('041037103', 'Emerson Diego', 'diegowebby@gmail.com.br', 'https://www.linkedin.com/in/emerson-diego/', 'cstsi', 'ifpb-jp'),
('09571013', 'Flaviano Flauber de Lira Marinho', 'flauberjp@gmail.com', 'https://www.linkedin.com/in/flauber/', 'cstsi', 'ifpb-jp'),
('20011013081', 'Rimenes Ribeiro', 'rima@rimenesribeiro.com', 'https://www.linkedin.com/in/rimenes/', 'cstt', 'ifpb-jp'),
('20051370144', 'Moisés Guimarães', 'guimaraes@pm.me', 'https://www.linkedin.com/in/moisesguimaraes/', 'cstsi', 'ifpb-jp'),
('20051370322', 'Diénert Vieira', 'dienertalencar@gmail.com', 'https://www.linkedin.com/in/di%C3%A9nert-vieira-6961b616/', 'cstsi', 'ifpb-jp'),
('20051370420', 'Luiz Carlos Rodrigues Chaves', 'lucachaves@gmail.com', 'https://www.linkedin.com/in/luizcrchaves/', 'cstsi', 'ifpb-jp'),
('20051380328', 'Leandro Almeida', 'lcavalcanti.almeida@gmail.com', 'https://www.linkedin.com/in/leandro-almeida-2601a611', 'cstrc', 'ifpb-jp'),
('20051380417', 'Pedro Filho', 'pedro.filho.jp@gmail.com', 'https://www.linkedin.com/in/pedro-batista-de-carvalho-filho-92b95768/', 'cstrc', 'ifpb-jp'),
('20052370210', 'Nielson Rolim', 'nielson.rolim@gmail.com', 'https://www.linkedin.com/in/nielsonrolim/', 'cstsi', 'ifpb-jp'),
('20061370112', 'Diego Pessoa', 'diegopessoa12@gmail.com', 'http://linkedin.com/in/diego-pessoa-6a137b28/', 'cstsi', 'ifpb-jp'),
('20061370325', 'Marcus Antonius', 'contato@marcusantonius.com.br', 'https://www.linkedin.com/in/marcusantonius/', 'cstsi', 'ifpb-jp'),
('20062370035', 'Zan Jie Lee', 'jiezinho@gmail', 'https://www.linkedin.com/in/zanjielee/', 'cstsi', 'ifpb-jp'),
('20081370312', 'Diógenes Fernandes', 'diofeher@gmail.com', 'https://www.linkedin.com/in/diofeher/', 'cstsi', 'ifpb-jp'),
('20082370340', 'Ramon Pereira', 'ramonpfsousa@gmail.com', 'https://www.linkedin.com/in/ramonpfsousa/', 'cstsi', 'ifpb-jp'),
('20091370153', 'Rogério Nóbrega', 'rogeriocnobrega@gmail.com', 'https://www.linkedin.com/in/rogeriocnobrega/', 'cstsi', 'ifpb-jp'),
('20111370307', 'Bruno Paulino', 'brunojppb@gmail.com', 'https://www.linkedin.com/in/brunojppb', 'cstsi', 'ifpb-jp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `name`, `email`, `password`) VALUES
(6, 'admin', 'admin@admin.com', '$2y$13$f6NI930DujDre.YcP4YfQ.WB3s9K3wR6HaX6blelwtaPJgYTP7O4.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`idalumni`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
