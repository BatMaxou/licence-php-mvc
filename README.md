# Faire une application MVC

## Objectif

Dev une app web basé sur l'archi MVC avec système d'authentification.

## Authentification

- Mettre en place un système d'inscription et de connexion pour les utilisateurs
- Utiliser des mots de passe hashés et des sessions pour gérer l'authentification
- Le mot de passe doit être soumis à un regex:
    - 8 caractères minimum, majuscule, minuscule, chiffre, caractère spécial
    - le mdp ne doit pas contenir le nom de l'utilisateur

## Tableau de bord

- Après le connexion, afficher un tableau de bord avec la liste des films de l'utilisateur
- Afficher le nom de l'utilisateur et un lien pour se déconnecter dans la nav

## Gestion des films

- Ajout d'un film à la liste d'un utilisateur (
    - titre
    - réalisateur
    - synopsis
    - genre
    - scénariste
    - société de production
    - année de sortie
)
- Modification d'un film par son l'utilisateur
- Accéder au détail d'un film
- Supprimer un film de sa liste
- [Bonus] le film à une affiche (blob en BDD)
- [Bonus] l'utilisateur peut rechercher un film
