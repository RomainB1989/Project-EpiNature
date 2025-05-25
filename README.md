# L'ÉpiNature - Projet de Titre Professionnel Développeur Web et Web Mobile

## Présentation

**L'ÉpiNature** est un site web vitrine avec une fonctionnalité e-commerce (Click & Collect) développé pour une boulangerie fictive spécialisée dans les produits bio artisanaux. Ce projet a été réalisé dans le cadre de ma formation de Développeur Web et Web Mobile à l'ADRAR et constitue ma soutenance pour le Titre Professionnel.

L'objectif principal était de créer une application web complète, allant de l'analyse des besoins à la conception, au développement frontend et backend, et à la mise en place d'une boutique en ligne fonctionnelle avec une interface d'administration. Bien que le client soit fictif, les besoins sont inspirés d'un cas réel, visant à moderniser la présence en ligne d'une boulangerie artisanale et à atteindre une nouvelle clientèle urbaine.

## Technologies et Outils Utilisés

*   **Frontend :** HTML5, CSS3, JavaScript (Vanilla JS)
*   **Backend :** PHP (procédural, inspiré de l'architecture MVC)
*   **Base de données :** MySQL, SQL
*   **Environnement de développement :** XAMPP (Apache, MySQL, PHP)
*   **Éditeur de code :** Visual Studio Code
*   **Gestion de version :** Git, GitHub
*   **Maquettage & Design :** Figma, Gloomaps, Canvas, GIMP, Adobe Colors
*   **Modélisation BDD :** Looping, StarUML, Workbench
*   **Test API :** Postman
*   **Accessibilité & Performance :** Lighthouse, GreenIT, aXe Dev Tools

## Structure du Projet

Le projet suit une architecture inspirée du modèle MVC (Modèle-Vue-Contrôleur) pour une meilleure organisation et séparation des préoccupations :

*   `index.php` : Point d'entrée unique (Front Controller) gérant le routage.
*   `controller/` : Contient les scripts PHP gérant la logique des requêtes, y compris un sous-dossier `api/` pour les points d'entrée de l'API personnalisée.
*   `model/` : Regroupe les fonctions PHP interagissant avec la base de données (logique métier et accès aux données).
*   `view/` : Contient les fichiers PHP pour la présentation (HTML), ainsi que les sous-dossiers `script/` (JavaScript) et `style/` (CSS).
*   `src/` : Héberge les ressources statiques comme les images (`src/Images/`).
*   `utils/` : Comprend des scripts PHP utilitaires (connexion BDD, fonctions SEO, etc.).

## Fonctionnalités Principales

### Partie Utilisateur (Frontend)

*   Création et gestion de compte utilisateur (inscription, connexion, modification des informations).
*   Consultation de l'historique des commandes.
*   Boutique en ligne avec affichage dynamique des produits et filtrage par catégorie.
*   Ajout de produits au panier (gestion via `$_SESSION` et appels API).
*   Processus de commande complet (sélection du point de collecte, choix de la récurrence, validation).
*   Formulaire de contact.
*   Blog "Gazette du Boulanger".
*   Site responsive adapté à tous les supports.

### Partie Administrateur (Backend)

*   Interface d'administration pour la gestion :
    *   des comptes utilisateurs.
    *   des produits de la boutique (CRUD).
    *   des commandes.
    *   des articles du blog.

### API Personnalisée

Une API RESTful a été développée pour gérer les interactions dynamiques côté client, notamment pour :

*   La gestion du panier (ajout, récupération, suppression d'articles).
*   La vérification de l'état de connexion de l'utilisateur.
*   La récupération des points de collecte.
*   La soumission des commandes.

*(La documentation détaillée des points d'entrée de l'API se trouve dans le mémoire du projet.)*

## Objectifs Pédagogiques et Compétences Couvertes

Ce projet a permis de mettre en pratique et de valider l'ensemble des compétences requises pour le Titre Professionnel Développeur Web et Web Mobile, incluant :

*   Installation et configuration de l'environnement de travail.
*   Maquettage d'interfaces utilisateur.
*   Réalisation d'interfaces statiques et dynamiques.
*   Mise en place d'une base de données relationnelle.
*   Développement de composants d'accès aux données et de composants métier côté serveur.
*   Prise en compte du SEO et de l'accessibilité.

## Pour commencer (Instructions d'installation et d'utilisation - si applicable)

1.  Clonez le dépôt : `git clone [URL_DU_REPO]`
2.  Importez le script SQL `epinature_db.sql` (disponible dans les annexes du mémoire ou à ajouter ici) dans votre SGBD MySQL.
3.  Configurez la connexion à la base de données :
    *   Créez un fichier `.env` à la racine du projet.
    *   Ajoutez-y vos identifiants de base de données, sur le modèle du fichier `.env.example` (à créer si besoin) :
        ```
        DB_HOST=localhost
        DB_NAME=epinature_db
        DB_USER=votre_utilisateur
        DB_PASS=votre_mot_de_passe
        ```
4.  Assurez-vous que votre serveur web (Apache via XAMPP/WAMP/MAMP ou autre) pointe vers la racine du projet.
5.  Accédez au site via votre navigateur (généralement `http://localhost/nom_du_dossier_projet/`).

## Auteur

*   **Romain BERGOUT**

---

Ce projet représente une étape significative dans mon parcours de reconversion professionnelle et démontre ma capacité à mener un projet web de A à Z. N'hésitez pas à explorer le code et la documentation pour plus de détails.

    
