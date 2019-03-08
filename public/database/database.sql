SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_log` (IN `user` VARCHAR(100), IN `role` VARCHAR(20), IN `activity` TEXT)  NO SQL
INSERT INTO logs VALUES (user, role, NOW(), activity);

CREATE TABLE `logs` (
  `user` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `role` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `date` datetime NOT NULL,
  `activity` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `addressee_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `curriculum` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '<h2><tt><strong>DATOS PERSONALES</strong></tt></h2>  <hr /> <p><tt>&nbsp; &nbsp; Nombre/Apellidos:</tt></p>  <h1><tt>Nombre Apellido1 Apellido2</tt>&nbsp; &nbsp; &nbsp;&nbsp;</h1>  <p><tt>&nbsp;-<strong>&nbsp;Direccion:</strong> C\\eruiut, n&ordm;3, 4&ordm;A</tt></p>  <p><tt><strong>&nbsp;-&nbsp;Poblaci&oacute;n:</strong> Huelva (CP:21004)</tt></p>  <p><tt>&nbsp;-<strong>&nbsp;Tel&eacute;fono:</strong> 695123456</tt></p>  <p>&nbsp; -<tt><strong>&nbsp;Correo electr&oacute;nico:</strong> miemail@gmail.com</tt></p>  <p><tt>&nbsp;-<strong>&nbsp;Fecha de nacimiento:</strong> 1 de Mayo de 1998</tt></p>  <p>&nbsp;</p>  <p>&nbsp;</p>  <p>&nbsp;</p>  <h2><strong>FORMACI&Oacute;N ACAD&Eacute;MICA</strong></h2>  <hr /> <p>- Grado en Desarrollo de Aplicaciones Web - I.E.S. San Sebasti&aacute;n (2013-2015)</p>  <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;-&nbsp;F.C.T. : Mi Empresa S.A.(Abril de 2017- Junio de 2019)</p>  <p>&nbsp;</p>  <h2>COMPETENCIAS PROFESIONALES</h2>  <hr /> <pre> LENGUAJES DE PROGRAMACI&Oacute;N / SCRIPTING </pre>  <ul> 	<li>Java&nbsp;</li> 	<li>C#</li> 	<li>JavaScript</li> 	<li>PHP</li> </ul>  <p>&nbsp;</p>  <pre> SISTEMAS OPERATIVOS                                                                                    </pre>  <ul> 	<li>&nbsp;Microsoft Windows Desktop</li> 	<li>&nbsp;Microsoft Windows Server</li> 	<li>&nbsp;Ubuntu Desktop</li> 	<li>&nbsp;Ubuntu Server</li> 	<li>&nbsp;CentOS</li> 	<li>&nbsp;OS X</li> 	<li>Android</li> </ul>  <p>&nbsp;</p>  <pre> BASES DE DATOS</pre>  <ul> 	<li>Microsoft Access</li> 	<li>MySQL</li> 	<li>Definici&oacute;n de consultas SQL y programaci&oacute;n de scripts almacenados PL/SQL</li> 	<li>Dise&ntilde;o e implementaci&oacute;n de bases de datos</li> </ul>  <p>&nbsp;</p>  <pre> PROGRAMACI&Oacute;N/DISE&Ntilde;O WEB</pre>  <ul> 	<li>HTML5</li> 	<li>JQuery</li> 	<li>Ajax</li> 	<li>JSON</li> 	<li>CSS3</li> 	<li>Angular 5</li> 	<li>XML</li> 	<li>Desarrollo PHP con Framework Laravel</li> 	<li>&nbsp;</li> </ul>  <h2>H Desarrollador de Aplicaciones Web</h2>  <pre> MI EMPRESA DE CURRO S.L.</pre>  <hr /> <p>R Desarrollo y mantenimiento del sitio web miWEB.com</p>  <p>&nbsp;</p>  <h2>COMPETENCIAS COMUNICATIVAS</h2>  <hr /> <p>&nbsp;</p>  <h2>COMPETENCIAS ORGANIZATIVAS</h2>  <hr /> <p>&nbsp;</p>  <h2>COMPETENCIAS PERSONALES</h2>  <hr /> <p>&nbsp;</p>'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `users` (`id`, `name`, `surname`, `nick`, `phonenumber`, `role`, `active`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `curriculum`) VALUES
(1, 'Pedro José', 'León', 'pjleonmartin', '', 'admin', 1, '1550777193learning.png', 'pedrojoseleonmartin@yahoo.es', NULL, '$2y$10$pcYekFaZCP0WTfSkm0qmy.MuvpAc3XjxI2.d/VErRnZo4VdXR2edm', 'HGqpuh0ABYzfwXncR4ZqCxZsOArl6w4kY8wM6BA24VDcPMn4ufLDeMaLQQEt', '2019-02-21 17:26:42', '2019-03-05 16:17:55', '<h2><tt><strong>DATOS PERSONALES</strong></tt></h2>\r\n\r\n<hr />\r\n<p><tt>&nbsp; &nbsp; Nombre/Apellidos:</tt></p>\r\n\r\n<h1><tt>Nombre Apellido1 Apellido2</tt>&nbsp; &nbsp; &nbsp;&nbsp;</h1>\r\n\r\n<p><tt>&nbsp;-<strong>&nbsp;Direccion:</strong> C\\eruiut, n&ordm;3, 4&ordm;A</tt></p>\r\n\r\n<p><tt><strong>&nbsp;-&nbsp;Poblaci&oacute;n:</strong> Huelva (CP:21004)</tt></p>\r\n\r\n<p><tt>&nbsp;-<strong>&nbsp;Tel&eacute;fono:</strong> 695123456</tt></p>\r\n\r\n<p>&nbsp; -<tt><strong>&nbsp;Correo electr&oacute;nico:</strong> miemail@gmail.com</tt></p>\r\n\r\n<p><tt>&nbsp;-<strong>&nbsp;Fecha de nacimiento:</strong> 1 de Mayo de 1998</tt></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>FORMACI&Oacute;N ACAD&Eacute;MICA</strong></h2>\r\n\r\n<hr />\r\n<p>- Grado en Desarrollo de Aplicaciones Web - I.E.S. San Sebasti&aacute;n (2013-2015)</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;-&nbsp;F.C.T. : Mi Empresa S.A.(Abril de 2017- Junio de 2019)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>COMPETENCIAS PROFESIONALES</h2>\r\n\r\n<hr />\r\n<pre>\r\nLENGUAJES DE PROGRAMACI&Oacute;N / SCRIPTING </pre>\r\n\r\n<ul>\r\n	<li>Java&nbsp;</li>\r\n	<li>C#</li>\r\n	<li>JavaScript</li>\r\n	<li>PHP</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\nSISTEMAS OPERATIVOS                                                                                    </pre>\r\n\r\n<ul>\r\n	<li>&nbsp;Microsoft Windows Desktop</li>\r\n	<li>&nbsp;Microsoft Windows Server</li>\r\n	<li>&nbsp;Ubuntu Desktop</li>\r\n	<li>&nbsp;Ubuntu Server</li>\r\n	<li>&nbsp;CentOS</li>\r\n	<li>&nbsp;OS X</li>\r\n	<li>Android</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\nBASES DE DATOS</pre>\r\n\r\n<ul>\r\n	<li>Microsoft Access</li>\r\n	<li>MySQL</li>\r\n	<li>Definici&oacute;n de consultas SQL y programaci&oacute;n de scripts almacenados PL/SQL</li>\r\n	<li>Dise&ntilde;o e implementaci&oacute;n de bases de datos</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\nPROGRAMACI&Oacute;N/DISE&Ntilde;O WEB</pre>\r\n\r\n<ul>\r\n	<li>HTML5</li>\r\n	<li>JQuery</li>\r\n	<li>Ajax</li>\r\n	<li>JSON</li>\r\n	<li>CSS3</li>\r\n	<li>Angular 5</li>\r\n	<li>XML</li>\r\n	<li>Desarrollo PHP con Framework Laravel</li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n\r\n<h2>H Desarrollador de Aplicaciones Web</h2>\r\n\r\n<pre>\r\nMI EMPRESA DE CURRO S.L.</pre>\r\n\r\n<hr />\r\n<p>R Desarrollo y mantenimiento del sitio web miWEB.com</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>COMPETENCIAS COMUNICATIVAS</h2>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<h2>COMPETENCIAS ORGANIZATIVAS</h2>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<h2>COMPETENCIAS PERSONALES</h2>\r\n\r\n<hr />\r\n<p>&nbsp;</p>');

ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addressee_id` (`addressee_id`);

ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`addressee_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
