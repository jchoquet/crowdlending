# Rapport d'itération  
*Ce rapport est à fournir pour chaque équipe au moment du changement d'itération.*

## Composition de l'équipe 
*Remplir ce tableau avec la composition de l'équipe pour l'itération précédente et suivante. Le Product Owner de l'itération suivante doit être le même que le Product Owner N+1 de l'itération précédente.*

|  &nbsp;                 | Itération précédente     | Itération suivante    |
| -------------           |-------------             |---------              |
| **Product Owner**       | *Qiuhao*               |               |
| **Product Owner N+1**   |                   |                       |
| **Scrum Master**        | *Thibault*                 | *Anouar*            |

> Il n'y a pas de Product Owner à l'itération suivante étant donné que le projet se termine le 12 décembre.

## Bilan de l'itération précédente  

### Évènements 
*Quels sont les évènements qui ont marqué l'itération précédente? Répertoriez ici les évènements qui ont eu un impact sur ce qui était prévu à l'itération précédente.*

> Nous nous sommes retrouvés avec 5 branches non mergées en fin de sprint, et beaucoup de merge conflicts en partie puisque des bugs avaient été résolus sur develop mais pas sur lesdites branches. Nous avons pris une heure environ en groupe afin de gérer tous ces conflits. Après avoir géré les merge conficts de la première branche et mergé cette branche sur develop, nous avons décidé de merger la branche develop sur master, afin de pouvoir repartir d'une base saine en cas de problème ou de difficulté à résoudre les merge conflicts des autres branches.


### Taux de complétion de l'itération  
*Quel est le nombre d'éléments terminés par rapport au nombre total d'éléments prévu pour l'itération?*
> 9 terminés / 9 prévus = 100 %

## Rétrospective de l'itération précédente
  
### Bilans des retours et des précédentes actions 
*Quels sont les retours faits par l'équipe pendant la rétrospective? Quelles sont les actions qui ont apporté quelque chose ou non?*

> On s'est rendus compte que le daily du mercredi est beaucoup trop tôt, les développeurs n'ayant pas eu le temps d'avancer sur le projet en seulement un soir, le mardi (car le lundi soir est souvent utilisé pour terminer le sprint planning). Le vendredi sert déjà plus, et le dimanche est un vrai jour de rush. 

> Les problèmes étant aussi très souvent résolus sur Slack et non en daily, on préfère que les membres soient plus disponibles sur Slack quitte à réduire le nombre de réunions. En effet ce nombre de dailies trop élevé entraîne par moments l'absence de certains membres.

> Sur Slack, le temps de réponse peut parfois être long cependant, ce qui bloque le développeur par moments, d'où la nécessité d'une présence accrue sur Slack.

> Enfin, nous avons remarqué qu'il serait bien de préciser la catégorie du bug / la page concernée pour qu'un autre développeur sache où chercher dans les descriptions des cartes Trello des bugs.


### Actions prises pour la prochaine itération
 
### Axes d'améliorations 
*Quels sont les axes d'améliorations pour les personnes qui ont tenu les rôles de PO, SM et Dev sur la précédente itération?*

> Les raisons évoquées précédemment nous ont poussé à opter pour un seul daily par semaine (excepté celui du lundi). Il se fera désormais le vendredi soir à 17h45. Cela permet aux développeurs d'avancer un peu plus et d'avoir de réelles questions et plus de fonctionnalités implémentées à discuter.

> Il faut aussi que les membres ayant lu un message sur Slack essayent d'y répondre au plus vite, même par un simple "ok". Cela permet à tout le monde de mieux savoir où en est chacun.

> A part ces réflexions, l'équipe est satisfaite du système adopté de manière générale.


## Prévisions de l'itération suivante  
### Évènements prévus  
*Quels sont les évènements qui vont peut être impacter l'itération? Répertoriez ici les évènements que vous anticipez comme ayant un impact potentiel pour l'itération (absences, changement de cap, difficultés, etc.).*
> Thibault a des partiels la semaine prochaine, puisqu'il part à l'étranger au S2. Cela va évidemment impacter son temps disponible sur le projet. Nous avons donc décidé de mieux répartir les tâches du sprint, tout en gardant approximativement la même vélocité. 

### Titre des éléments reportés  
*Lister ici les éléments des itérations précédentes qui ont été reportés à l'itération suivante. Ces éléments ont dû être revus et corrigés par le PO N+1.*
> Rien n'a été reporté pour l'itération suivante. Cependant beaucoup de bugs ont été découverts lors de la sprint review. Ces bugs, que nous savons corriger sans problème pour la plupart, ont été rajoutés dans le backlog avec un nombre de complexité. Ils font part entière du travail à réaliser durant le sprint puisqu'ils représentent la moitié de la vélocité. Nous devons corriger ces bugs en priorité avant de rendre le projet au client dimanche soir.
    
### Titre des nouveaux éléments  
*Lister ici les nouveaux éléments pour l'itération suivante. Ces éléments ont dû être revus et corrigés par le PO N+1.*

> Nous allons travailler sur les stories suivantes :
-  Fitrage de mes échanges :  En tant qu'utilisateur, je veux voir apparaître sur chaque onglet de "Mes échanges" une option de filtrage sur l'état de l'opération mise par défaut à tous
- Accueil : En tant qu'utilisateur, en arrivant sur la page d'accueil, je veux voir un quick tutoriel visuel m'indiquant sur quels boutons cliquer pour commencer
- Footer : En tant qu'utilisateur, je veux que les pages "Contact", "A propos" et "L'équipe" soient opérationnels
- Lien vers la page de profil depuis username : En tant qu'utilisateur, à chaque fois que je lis un username dans le site, je veux pouvoir cliquer dessus et être redirigé vers sa page de profil
- Header : En tant qu'utilisateur, je souhaite, lorsque je "hover" sur le lien "besoin" de la barre de nav, voir un dropdown avec "ajouter un besoin" et "répondre à un besoin".
- Supprimer un compte utilisateur : En tant qu'utilisateur, je veux pouvoir supprimer mon compte depuis la page "Mon compte"
- Poster une annonce : En tant qu'utilisateur, je veux pouvoir éditer et poster une annonce faisant part de mon besoin d'un objet. Les "objectifs" sont les utilisateurs dans la même commune. On y trouve un formulaire avec un nom et une description.
- Affichage des besoins : En tant qu'utilisateur, je veux pouvoir voir les annonces des autres utilisateurs présents dans ma commune sous forme de liste sur la page "Recherche d'un besoin". Il y un bouton à droite. Si l'utilisateur clique dessus, il y a une chaine de caractères qui apparaît "contacter + adresse email".
- Page personnelle "Mes besoins" : En tant qu'utilisateur, dans mon espace personnel je veux pouvoir accéder à une page "mes besoins" qui liste mes besoins.

> Comme indiqué précédemment, nous allons résoudre en grande partie des bugs durant ce sprint :
- Faire apparaitre dans le menu les différentes nouvelles pages
- Rechercher - design page le meme que pour ajouter un objet
- monCompte - design affichage de la barre de navigation sous device xs et sm
- Connexion - en cas d'erreur à la connexion, faire afficher un lien vers la page d'inscription ou le message directement sur la page de connexion
- rechercheObjet - probleme avec les categories vides
- Ne pas permettre à un utilisateur de changer son username
- view_profil - rediriger vers une page d'erreur si on essaye de voir le profil d'un username qui n'existe pas
- monCompte - probleme modification commune
- demande d'objet - vérifier si effectivement la demande d'objet ne marche pas et corriger ce problème
- Accepter pret - Titre mes objets demandés
- ajoutObjet - en cas d'erreur ou de réussite lors de l'ajout d'un objet, faire afficher un message et une redirection

## Confiance 
### Taux de confiance de l'équipe dans l'itération  
*Remplir le tableau sachant que :D est une confiance totale dans le fait de livrer les éléments de l'itération. Mettre le nombre de votes dans chacune des cases. Expliquer en cas de besoin.*

|          	| :( 	| :&#124; 	| :) 	| :D 	|
|:--------:	|:----:	|:----:	    |:----:	|:----:	|
| Equipe 1 	|  *0* 	|  *0* 	    |  *4* 	|  *2* 	|

### Taux de confiance de l'équipe pour la réalisation du projet 
*Remplir le tableau sachant que :D est une confiance totale dans le fait de réaliser le projet. Mettre le nombre de votes dans chacune des cases. Expliquer en cas de besoin.*

|          	| :( 	| :&#124; 	| :) 	| :D 	|
|:--------:	|:----:	|:----:	    |:----:	|:----:	|
| Equipe 1 	|  *0* 	|  *0* 	    |  *2* 	|  *4* 	|

 
 