USE sama_db;

UPDATE workshops 
SET 
    title = 'ACT : Activ\'Toit - Entrer dans la vie active et trouver un logement',
    description = 'Dans le cadre du Contrat Territorial d’Accueil et d’Intégration de la Ville de Clermont-fd, cette action linguistique tend à renforcer l’accompagnement initié par les référents du PLIE, par un meilleur développement de compétences avec pour objectif principal de favoriser l’accès ou le maintien des personnes dans un logement, et dans leur accès aux droits en France mais aussi d’établir, de conforter et/ou d’élargir les bases de leur insertion sociale et professionnelle.\n\nEn réponse à l\'appel d\'offre formulé par le PLIE dans le cadre de l\'accompagnement renforcé de ces publics, SAMA a proposé une offre de formation à destination de demandeurs d\'emplois suivis par le PLIE et ne maîtrisant pas ou peu le français. S’appuyant sur une dynamique collective, l\'objectif est de lever les freins à l’accès ou au maintien dans le logement et de redynamiser la recherche d’emploi des participants.',
    objectives = 'Apprendre le français oral et écrit en vue d’une pratique dans les différents champs de la vie quotidienne et plus particulièrement concernant le logement.\nDonner les clés linguistiques d’accès au marché de l\'emploi.\nFavoriser l’expression française et valider des compétences en situation professionnelle.',
    target_audience = 'Personnes BPI avec Contrat d’intégration Républicaine de + de 2 ans et – de 5 ans OU Primo-arrivant avec Contrat d’intégration Républicaine de – de 5 ans.\nDemandeurs d\'emploi habitants de la métropole Clermontoise bénéficiant d’un suivi PLIE (DELD, RSA, parents isolés, travailleurs handicapés, QPV).',
    schedule = 'Durée : 360H (12 semaines) + Stage 70H (2 semaines). Session du 24/04/24 au 31/07/24.',
    location = '3 rue Henri Simonnet, 63000 Clermont-Ferrand',
    contact_info = 'Accueil Sama: 04 73 24 03 91\nRéférents: Myriam Binois (mbinois.sama@gmail.com), Fabienne PELLE (samauvergne@gmail.com)',
    category_id = 2 -- Insertion Sociale (ou Professionnelle selon choix, mais restons cohérents avec l'existant)
WHERE title LIKE 'ACT : Activ\'Toit%';
