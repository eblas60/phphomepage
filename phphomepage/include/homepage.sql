--
-- Structure de la table `homepage`
--

CREATE TABLE `homepage` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mise_en_page_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `rubriques_id` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour la table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- AUTO_INCREMENT pour la table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Structure de la table `liens`
--

CREATE TABLE `liens` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `actif` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rubrique_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `url` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour la table `liens`
--
ALTER TABLE `liens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titre` (`titre`);

--
-- AUTO_INCREMENT pour la table `liens`
--
ALTER TABLE `liens`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Structure de la table `mise_en_page`
--
CREATE TABLE `mise_en_page` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `fond` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couleur_titre` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taille_titre` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couleur_lien` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taille_lien` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `police` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` char(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour la table `mise_en_page`
--
ALTER TABLE `mise_en_page`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour la table `mise_en_page`
--
ALTER TABLE `mise_en_page`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Structure de la table `rubriques`
--

CREATE TABLE `rubriques` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `actif` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour la table `rubriques`
--
ALTER TABLE `rubriques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titre` (`titre`);

--
-- AUTO_INCREMENT pour la table `rubriques`
--
ALTER TABLE `rubriques`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;