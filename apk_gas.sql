
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;


CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `jenis` text NOT NULL,
  `suplier` text NOT NULL,
  `modal` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;


INSERT INTO `barang` (`id`, `nama`, `jenis`, `suplier`, `modal`, `harga`, `jumlah`, `sisa`) VALUES
(14, 'roti unibis', 'makanan', 'pt.makamur jaya', 5000, 6500, 350, 20),
(17, 'tim tam', 'makanan ringan', 'pt surga', 2000, 6000, 792, 10),
(19, 'tic tac', 'makanan ringan', 'pt sido multp', 2000, 4000, 2, 24),
(20, 'aqua sedang', 'minuman ringan', 'pt jamaika', 1000, 3000, 990, 1000),
(21, 'makkkanan', 'makanan ringan', 'pt surya', 2000, 4000, 894, 900),
(22, 'makkkanan', 'makanan ringan', 'pt surya', 2000, 4000, 894, 900),
(23, 'magnum', 'rokok', 'pt surga', 12000, 13000, 997, 1000),
(24, 'santri mie', 'makanan ringan', 'pt sido mulyo', 2000, 4000, 784, 800),
(25, 'rambut palsu', 'accesories', 'pt ptan', 3000, 5000, 496, 500),
(26, 'rambut palsu', 'accesories', 'pt ptan', 3000, 5000, 496, 500),
(27, 'sea foog', 'makanan ringan', 'pt surga', 4000, 60000, 598, 600),
(28, 'mild', 'rokok', 'pt sampoerna', 15000, 17000, 192, 200),
(29, 'dji sam soe', 'rokok', 'pt ptan', 14000, 15000, 145, 150),
(30, 'nu mild', 'rokok', 'pt ptan', 14000, 15000, 144, 150),
(31, 'nu mild', 'rokok', 'pt ptan', 14000, 15000, 144, 150),
(32, 'roti', 'makanan', 'hdhnhnhh', 2000, 5000, 4, 6);

-- -------------------------------------------------------

CREATE TABLE IF NOT EXISTS `barang_laku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nama` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `laba` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;


INSERT INTO `barang_laku` (`id`, `tanggal`, `nama`, `jumlah`, `harga`, `total_harga`, `laba`) VALUES
(46, '2015-02-01', 'roti unibis', 2, 6000, 12000, 2000),
(47, '2015-02-02', 'makkkanan', 7, 12000, 84000, 70000),
(48, '2015-02-02', 'dji sam soe', 2, 15000, 30000, 2000),
(49, '2015-02-03', 'makkkanan', 1, 12000, 12000, 10000),
(50, '2015-02-01', 'tim tam', 2, 4000, 8000, 4000),
(51, '2015-02-02', 'mild', 2, 17000, 34000, 4000),
(52, '2015-02-03', 'magnum', 1, 18000, 18000, 6000),
(53, '2015-02-06', 'dji sam soe', 2, 19000, 38000, 10000),
(54, '2015-02-15', 'nu mild', 2, 19100, 38200, 10200),
(55, '2015-02-27', 'roti unibis', 2, 8000, 16000, 6000),
(56, '2015-02-19', 'roti unibis', 1, 7000, 7000, 2000),
(57, '2015-01-14', 'roti unibis', 1, 7000, 7000, 2000),
(58, '2015-02-01', 'pulpen', 1, 3000, 3000, 2000),
(59, '2015-02-02', 'roti', 2, 3000, 6000, 2000),
(63, '2016-01-22', 'tic tac', 8, 4000, 32000, 16000);

-- --------------------------------------------------------



CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `keperluan` text NOT NULL,
  `nama` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


INSERT INTO `pengeluaran` (`id`, `tanggal`, `keperluan`, `nama`, `jumlah`) VALUES
(1, '2015-02-06', 'de', 'diki', 1234);


