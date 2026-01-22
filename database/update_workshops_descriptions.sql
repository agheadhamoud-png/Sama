USE sama_db;
SET NAMES 'utf8mb4';

-- ACT : Activ’Toit (Déja fait mais on peut réaligner si besoin, le texte user est similaire mais plus concis dans le prompt, je garde la version détaillée précédente ou j'update ? Le user a donné une nouvelle description courte dans ce prompt : "Atelier de français centré sur le logement...")
-- Je vais MAJ avec le texte du prompt pour être cohérent avec la demande "Cartes de formation (contenu à afficher)".
UPDATE workshops SET 
description = 'Atelier de français centré sur le logement : comprendre les démarches pour trouver, obtenir et garder un logement (recherche d’annonce, visite, bail, charges, droits et devoirs, relations avec bailleur, voisinage) tout en travaillant l’oral et l’écrit.'
WHERE title LIKE 'ACT%';

-- ALSP
UPDATE workshops SET 
description = 'Formation de français pour l’insertion socio‑professionnelle : alphabétisation et français langue professionnelle, découverte des codes sociaux français, situations de la vie sociale et de l’emploi, préalable à toute démarche de formation ou de travail.'
WHERE title LIKE 'ALSP%';

-- ASL
UPDATE workshops SET 
description = 'Ateliers de français ancrés dans la vie quotidienne : démarches administratives, santé, éducation, travail, logement, égalité femmes‑hommes, droit de vote, avec des séances spécifiques sur le numérique ou la recherche de formation/emploi pour renforcer l’autonomie dans le quartier.'
WHERE title LIKE 'ASL%';

-- BAN
UPDATE workshops SET 
description = 'Parcours combinant bases du numérique et français : prise en main de l’ordinateur et du smartphone, navigation internet, courriels, démarches en ligne et outils du quotidien pour permettre aux apprenants d’utiliser le numérique de façon autonome dans leur vie sociale, administrative et professionnelle.'
WHERE title LIKE 'BAN%';

-- JEF
UPDATE workshops SET 
description = 'Dispositif destiné aux jeunes migrants : apprentissage du français (général et sur objectifs), activités numériques et sorties pédagogiques, découverte de la société française et accompagnement individuel à la construction d’un projet de formation ou d’emploi.'
WHERE title LIKE 'JEF%';

-- PAM
UPDATE workshops SET 
description = 'Formation autour de la mobilité géographique : comprendre l’offre de transport, lire plans et horaires, se repérer sur le territoire, organiser ses déplacements pour l’emploi, la formation et les démarches, lever les freins liés à la mobilité et sécuriser les trajets.'
WHERE title LIKE 'PAM%';

-- PDT
UPDATE workshops SET 
description = 'Atelier thématique sur le logement, centré sur la prise de parole : décrire sa situation de logement, raconter ses difficultés, comprendre les documents (avis d’échéance, régularisation de charges, courriers) et préparer des rendez‑vous avec bailleurs ou travailleurs sociaux, en renforçant le vocabulaire spécifique.'
WHERE title LIKE 'PDT%';

-- PEM
UPDATE workshops SET 
description = 'Parcours d’accès à l’emploi pour des personnes ayant au moins un niveau A2 : validation du projet professionnel, découverte des métiers et des secteurs, usage des TIC, rédaction de CV et lettres, préparation d’entretiens et travail sur la mobilité (déplacements, parfois permis de conduire) avec une pédagogie actionnelle.'
WHERE title LIKE 'PEM%';

-- PPSI
UPDATE workshops SET 
description = 'Dispositif intensif de français à visée emploi : 12 h de cours collectifs par semaine (6 h de français à objectif spécifique emploi + 6 h de FLE), entretiens individuels, renforcement, préparation aux DELF A2/B1/B2, développement des compétences numériques et stages en entreprise pour faire progresser le niveau de français et faciliter l’accès aux parcours de droit commun.'
WHERE title LIKE 'PPSI%';
