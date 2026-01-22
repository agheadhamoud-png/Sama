USE sama_db;

-- Nettoyage de la table pour éviter les doublons (Optionnel, mais plus propre ici)
DELETE FROM workshops;

-- Réinitialisation de l'auto-increment
ALTER TABLE workshops AUTO_INCREMENT = 1;

-- Insertion des ateliers
-- Categories: 1=Français, 2=Sociale, 3=Professionnelle, 4=Médiation (Assumed based on frontend)

-- ASL : Français vie quotidienne -> Cat 1
INSERT INTO workshops (title, description, objectives, target_audience, schedule, location, contact_info, category_id, created_at)
VALUES (
    'ASL : Atelier Sociolinguistique', 
    'Ateliers de français pour la vie quotidienne, les services publics, la citoyenneté et l’autonomie dans les démarches.', 
    'Acquérir l\'autonomie dans la vie quotidienne.', 
    'Tout public migrant', 
    'Mardi et Jeudi 9h-11h', 
    'Siège SAMA', 
    'contact@sama-auvergne.org', 
    1, 
    NOW()
);

-- PPSI : Français visée emploi -> Cat 1 (ou 3?) -> Mettons 1 (Français)
INSERT INTO workshops (title, description, objectives, target_audience, schedule, location, contact_info, category_id, created_at)
VALUES (
    'PPSI : Parler Pour S’Insérer', 
    'Parcours intensif de français à visée emploi avec modules spécifiques, préparation aux DELF et développement numérique.', 
    'Préparer le niveau A2/B1 et l\'insertion pro.', 
    'Demandeurs d\'emploi allophones', 
    'Tous les jours 9h-12h', 
    'Siège SAMA', 
    'contact@sama-auvergne.org', 
    1, 
    NOW()
);

-- BAN : Numérique -> Cat 2 (Sociale) ou 3? Disons 2 pour l'autonomie.
INSERT INTO workshops (title, description, objectives, target_audience, schedule, location, contact_info, category_id, created_at)
VALUES (
    'BAN : Base d\'Apprentissage du Numérique', 
    'Découvrir les bases du numérique (ordinateur, smartphone, internet) en apprenant le français lié aux usages du quotidien.', 
    'Réduire la fracture numérique.', 
    'Débutants en informatique', 
    'Lundi après-midi', 
    'Salle Informatique SAMA', 
    'numerique@sama-auvergne.org', 
    2, 
    NOW()
);

-- ACT : Logement -> Cat 2
INSERT INTO workshops (title, description, objectives, target_audience, schedule, location, contact_info, category_id, created_at)
VALUES (
    'ACT : Activ\'Toit', 
    'Atelier de français centré sur le logement et les démarches pour trouver, comprendre et gérer son logement.', 
    'Maîtriser le vocabulaire du logement.', 
    'Public en recherche de logement', 
    'Vendredi matin', 
    'Siège SAMA', 
    'logement@sama-auvergne.org', 
    2, 
    NOW()
);

-- PDT : Parlons De Toit -> Cat 2
INSERT INTO workshops (title, description, objectives, target_audience, schedule, location, contact_info, category_id, created_at)
VALUES (
    'PDT : Parlons De Toit', 
    'Atelier logement pour apprendre à parler de sa situation, comprendre les documents et relations autour du “toit”.', 
    'Savoir communiquer avec un bailleur.', 
    'Locataires ou futurs locataires', 
    'Mercredi après-midi', 
    'Siège SAMA', 
    'logement@sama-auvergne.org', 
    2, 
    NOW()
);

-- JEF : Jeunes -> Cat 2
INSERT INTO workshops (title, description, objectives, target_audience, schedule, location, contact_info, category_id, created_at)
VALUES (
    'JEF : Jeunes En France', 
    'Parcours pour jeunes migrants mêlant français, numérique, sorties pédagogiques et accompagnement de projet.', 
    'Favoriser l\'intégration des jeunes.', 
    '16-25 ans', 
    'Mercredi et Samedi', 
    'SAMA et Extérieur', 
    'jeunesse@sama-auvergne.org', 
    2, 
    NOW()
);

-- PAM : Mobilité -> Cat 2
INSERT INTO workshops (title, description, objectives, target_audience, schedule, location, contact_info, category_id, created_at)
VALUES (
    'PAM : Projet Améliorer sa Mobilité', 
    'Comprendre et utiliser les transports, se repérer et organiser ses déplacements pour l’emploi, la formation et la vie quotidienne.', 
    'Autonomie dans les déplacements.', 
    'Tout public', 
    'Ponctuel', 
    'Sur le terrain', 
    'mobilite@sama-auvergne.org', 
    2, 
    NOW()
);

-- ALSP : Français/Pro -> Cat 3 (Professionnelle)
INSERT INTO workshops (title, description, objectives, target_audience, schedule, location, contact_info, category_id, created_at)
VALUES (
    'ALSP : Atelier Linguistique Socio Professionnel', 
    'Français et codes sociaux pour préparer un projet professionnel et accéder à l’emploi ou à la formation.', 
    'Construire son projet professionnel.', 
    'Visant l\'emploi', 
    'Mardi et Jeudi après-midi', 
    'Siège SAMA', 
    'emploi@sama-auvergne.org', 
    3, 
    NOW()
);

-- PEM : Emploi Mobilité -> Cat 3
INSERT INTO workshops (title, description, objectives, target_audience, schedule, location, contact_info, category_id, created_at)
VALUES (
    'PEM : Projet Emploi Mobilité', 
    'Formation vers l’emploi avec projet pro, compétences numériques, CV, lettre, entretiens et mobilité (permis, déplacements).', 
    'Accéder à un emploi durable.', 
    'Inscrits Pôle Emploi', 
    'Intensif 3 semaines', 
    'Siège SAMA', 
    'emploi@sama-auvergne.org', 
    3, 
    NOW()
);
