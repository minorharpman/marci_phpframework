-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Máj 02. 20:57
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `blog`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `articleText` text DEFAULT NULL,
  `category` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `article`
--

INSERT INTO `article` (`id`, `title`, `author_id`, `summary`, `articleText`, `category`, `created_at`, `updated_at`) VALUES
(12, 'Utazás a föld középpontja felé', '2', '„Szállj le a Sneffels Yocul [a Snæfell gleccsere] kráterébe\r\namit a Scartaris árnyéka cirógat Calendae Julii [július] előtt,\r\nmerész utazó, és akkor eljutsz\r\na Föld középpontjába.\r\nÉn megtettem. Arne Saknussemm”', 'A történet Hamburgban kezdődik 1863 májusában. Lidenbrock professzor éppen siet haza, hogy ott elolvashassa legújabb szerzeményét, egy izlandi saga eredeti rúnákkal írt kéziratát, amelyet Snorri Sturluson krónikaíró jegyzett le a középkorban. Miközben a professzor otthon Axel nevű unokaöccsével együtt nézi át a kéziratot, talál egy szintén rúnaírásos kódolt jegyzetet benne. (Ez itt az első jele Verne kriptográfiai rajongásának: későbbi műveiben is sokszor bukkannak fel rejtjeles, kódolt vagy hiányos üzenetek, amelyeket a szereplők sokáig nem tudnak megfejteni.) Lidenbrock és Axel lefordítják a rúnákat latin betűkre, ezzel azonban egy hasonlóan zavarba ejtő kódot kapnak. A professzor először feltételezi, hogy transzpozíciós módszerrel készült, de ez zsákutcának bizonyul.\r\n\r\nLidenbrock ezután úgy dönt, hogy bezárkózik a házba, és a bent tartózkodókkal (unokaöccse, Alex, valamint a házvezetőnő Martha) nem eszik, amíg meg nem fejtik a szöveget. Alex végül felfedezi, hogy a nagybátyja első meglátása helyes volt, csak visszafele kell olvasni az betűket, hogy megkapják az üzenet latin nyelvű mondatait. Először megpróbálja eltitkolni a nagybátyja elől, mivel tart attól, amit az tenne a szöveg ismeretében, de két nap után nem bírja tovább, és felfedi a titkot. Lidenbrock lefordítja a jegyzetet, amely egy izlandi alkimista, Arne Saknussemm (ő Snorri Sturlusonnal ellentétben nem történelmi személy) művének bizonyul. A szövegben Saknussemm azt állítja, hogy felfedezett egy utat a Föld középpontja felé az izlandi Snæfell-len keresztül:', 'Utazás', '2024-04-27 13:44:22', '2024-04-27 15:44:09'),
(16, 'Próba 4', '3', 'Teszt Elek vajob tesztel-e?', 'És igen tesztel.', 'tesz', '2024-04-10 18:45:45', '2024-04-27 15:44:32'),
(17, 'Hajózás élményei', '2', '', 'wfaeuhifvcbiuabj ksy', '', '2024-04-27 15:59:08', NULL),
(18, 'Wonder of the seas', '1', 'Wonder of the seas összefoglaló', 'Wonder of the seas tartalom', 'Hajózás', '2024-04-28 09:32:51', '2024-04-28 11:32:51'),
(23, 'Icon', '1', 'Icon of the Seas summary', 'Icopn of the Seas teljes cikk', 'Hajózás', '2024-04-29 09:35:32', '2024-04-29 11:35:32'),
(24, 'Cikk próba', '1', 'Cikk', 'vreagaergea', 'L', '2024-04-29 11:04:27', '2024-04-29 13:04:27'),
(32, 'Icon of the Seas', '4', 'Utazz a világ legnagyobb hajóján.', 'Tudtad hogy a Wonder of the Sea-t megelőzve, az Icon of the Sea jelenleg a világ legnagyobb hajója?', 'Hajózás', '2024-04-30 17:10:41', '2024-04-30 19:10:41'),
(33, 'új teszt', '2', 'Új teszt', 'újabb teszt', 'teszt', '2024-05-01 20:26:31', '2024-05-01 22:26:31'),
(34, 'új teszt', '2', 'Új teszt', 'újabb teszt', 'teszt', '2024-05-01 20:26:49', '2024-05-01 22:26:49'),
(35, 'új teszt', '2', 'Új teszt', 'újabb teszt', 'teszt', '2024-05-01 20:27:04', '2024-05-01 22:27:04'),
(36, 'Egy új cikk a refresh után', '4', 'daes', 'afsedwasf', 'Teszt', '2024-05-02 05:07:28', '2024-05-02 07:07:28');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `status`, `created_at`) VALUES
(1, 'Marci', 'csab@gmail.com', 'active', '2024-04-29 18:04:51'),
(3, 'Willy Fog', '', 'active', '2024-04-27 13:42:16'),
(4, 'Teszt Elek', 'tesztelek@yahoo.com', 'inactive', '2024-04-29 18:10:40'),
(9, 'Tintás János', 'tintajani@tinta.de', 'active', '2024-04-28 12:32:27'),
(10, 'Tóth Márton', 'tothm@gmail.com', 'active', '2024-04-29 09:34:37');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Author_id` (`id`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
