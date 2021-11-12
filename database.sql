-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Nov-2021 às 21:35
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `myfilmes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `message`) VALUES
(5, '3', 'Raissa'),
(6, '3,4,1', 'Hello!'),
(7, '3,4', 'Hello!'),
(8, '3,4', 'Hay');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `type`) VALUES
(1, 'RaissaDev', 'raissa.fullstack@gmail.com', '123456', 'myImg.png', 'admin'),
(3, 'Amanda Doe', 'amanda@doe.com', '123456', 'profile.png', 'user'),
(4, 'Jhon Doe', 'jhon@doe.com', '123456', 'userSeven.jpg', 'user');

-- --------------------------------------------------------

--
-- Estrutura da tabela `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `movie_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `movie_id`, `name`, `image`) VALUES
(164, '1', '580489', 'Venom: Let There Be Carnage', '/lNyLSOKMMeUPr1RsL4KcRuIXwHt.jpg'),
(165, '1', '438631', 'Dune', '/eeijXm3553xvuFbkPFkDG6CLCbQ.jpg'),
(166, '1', '574060', 'Gunpowder Milkshake', '/hugKriLPeBm3lErSCQiFOgQzpkC.jpg'),
(167, '1', '566525', 'Shang-Chi and the Legend of the Ten Rings', '/cinER0ESG0eJ49kXlExM0MEWGxW.jpg'),
(169, '1', '568124', 'Encanto', '/g2djzUqA6mFplzC03gDk0WSyg99.jpg'),
(170, '1', '585245', 'Clifford the Big Red Dog', '/zBkHCpLmHjW2uVURs5uZkaVmgKR.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
