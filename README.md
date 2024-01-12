# Projet Laravel - Développement d'une Application

## Introduction
Ce projet Laravel vise à développer une application web permettant aux utilisateurs de créer, partager et commenter des scènes. Les scènes peuvent être associées à des images résultant du calcul, notées par les utilisateurs et ajoutées à des listes de favoris.


## Fonctionnalités principales
- **Authentification**
  - Les utilisateurs peuvent créer un compte et s'authentifier.
  - Différenciation entre utilisateurs classiques et administrateurs.

- **Gestion des Scènes**
  - Ajout de scènes avec des informations détaillées.
  - Affichage de la liste des scènes avec filtres (par équipe, les plus récentes, les mieux notées).
  - Affichage des détails d'une scène avec possibilité de modification (si connecté).
  - Recalcul de l'image associée à une scène (bonus).

- **Gestion des Utilisateurs**
  - Affichage et modification des informations de l'utilisateur connecté.
  - Modification de l'avatar de l'utilisateur par téléversement d'une image.
  - Affichage des scènes favorites et des commentaires de l'utilisateur.

- **Commentaires et Notations**
  - Ajout, modification et suppression de commentaires sur une scène (si connecté).
  - Attribution de notes (de 0 à 5) à une scène par les utilisateurs.

- **Statistiques**
  - Affichage des statistiques d'une scène (note moyenne, note la plus haute/basse, nombre de notes, nombre d'utilisateurs favoris).

## Installation
1. Clonez le projet : `git clone https://gitlab.univ-artois.fr/sae-3.01-groupe-4/dev-web.git`
2. Configurez le fichier `.env` avec vos paramètres de base de données.
3. Installez les dépendances : `composer install`
4. Installez les dépendances npm : `npm install`
5. Exécutez les migrations : `php artisan migrate:refresh`
6. Exécutez les seeders pour générer des données de test : `php artisan db:seed`
7. Exécutez la commande pour faire le lien avec le storage : `php artisan storage:link`

## Utilisation
1. Lancez le serveur local : `php artisan serve`
2. Lancez le serveur local : `npm run dev`
3. Accédez à l'application dans votre navigateur à l'adresse : `http://localhost:8000`

## Technologies Utilisées
- Laravel
- PHP
- SQLite (SGBDR)
- Fortify (pour l'authentification)
- Tailwind CSS (pour le style)

## Auteurs
- Thomas Royer
- Alban Lagragui
- Aude Halipré
- Valentin Damlencourt
