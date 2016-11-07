# Rapport d'itération  
*Ce rapport est à fournir pour chaque équipe au moment du changement d'itération.*

## Composition de l'équipe 
*Remplir ce tableau avec la composition de l'équipe pour l'itération précédente et suivante. Le Product Owner de l'itération suivante doit être le même que le Product Owner N+1 de l'itération précédente.*

|  &nbsp;                 | Itération précédente     | Itération suivante    |
| -------------           |-------------             |---------              |
| **Product Owner**       | *Julien*                 | *Anouar*              |
| **Product Owner N+1**   | *Anouar*                 | *Thibault*            |
| **Scrum Master**        | *Julie*                  | *Mehdi*               |

## Bilan de l'itération précédente  
### Évènements 
*Quels sont les évènements qui ont marqué l'itération précédente? Répertoriez ici les évènements qui ont eu un impact sur ce qui était prévu à l'itération précédente.*

> L'itération précédente était la première itération de développement. Nous avons utilisé les outils choisis lors du sprint 0 (Slack, Trello, Gitlab). Cette itération nous a permis de mieux connaître la façon de travailler de chacun et de se synchroniser. De plus, nous avons une idée plus claire de la vélocité de l'équipe.

### Taux de complétion de l'itération  
*Quel est le nombre d'éléments terminés par rapport au nombre total d'éléments prévu pour l'itération?*
>  7 terminés / 7 prévues = 100 %

Nous avons profité de la sprint review pour que chacun puisse s'exprimer sur toutes les fonctionnalités du site. Cela a permis d'avoir de nouvelles idées (améliorations, corrections) sur l'implémentation.\
Nous avons donc choisi de créer une story (dans le sprint 2) dédiée à l'amélioration de certaines fonctionnalités du sprint 1. Cela permettra de ne plus avoir à améliorer les implémentations plus tard (retour sur du code plus familier).

## Rétrospective de l'itération précédente
  
### Bilans des retours et des précédentes actions 
*Quels sont les retours faits par l'équipe pendant la rétrospective? Quelles sont les actions qui ont apporté quelque chose ou non?*

> La communication dans l'équipe est très bonne grâce aux 4 dailies (3 physiques et 1 en ligne) et l'utilisation de Slack et de Hangout. L'utilisation du "ok" pour indiquer la lecture du message sur Slack proposée à l'itération précédente a été fructueuse. Cependant, il peut être difficile de repérer les informations importantes dans l'ensemble des messages envoyés sur Slack. Nous avons donc décidé de créer une channel dédiée au résumé des idées, choix, discussions. Ceux qui se connectent n'auront plus à lire tous les messages précédemment envoyés, uniquement le résumé.\
L'équipe a aprécié la clarté du backlog réalisé sur Trello avec l'extension "Scrum pour Trello" mais aimerait plus de précisions sur les relations inter-stories : les personnes avec qui l'ont doit parler en priorité pour une tâche donnée.\
Nous avons remarqué qu'une complexité horaire pour les stories ne permettait pas de mettre en valeur la difficulté et les risques liés à certaines. L'utilisation de Planning Poker est appréciée pour décider de la complexité des tâches.\

### Actions prises pour la prochaine itération
 
### Axes d'améliorations 
*Quels sont les axes d'améliorations pour les personnes qui ont tenu les rôles de PO, SM et Dev sur la précédente itération?*
> Nous avons décidé de changer d'échelle d'estimation de complexité pour les stories : nous allons utiliser une complexité en points et non en heures. Pour déterminer l'échelle de notation, nous nous sommes basés sur 3 stories de l'itération précédente.\
Au niveau des stories, nous allons clarifier les affectations et les personnes à contacter pour chaque tâche.\
Au niveau du code, il faudra respecter l'architecture MVC et les conventions de nommage pour les fichiers et les branches sur git pour plus de clarté.\
Enfin, chaque membre va essayer de mieux répartir son travail sur l'intégralité de la semaine pour éviter de trop nombreux merge le dimanche soir.\


## Prévisions de l'itération suivante  
### Évènements prévus  
*Quels sont les évènements qui vont peut être impacter l'itération? Répertoriez ici les évènements que vous anticipez comme ayant un impact potentiel pour l'itération (absences, changement de cap, difficultés, etc.).*

> Nous avons choisi une nouvelle échelle d'estimation pour les stories (complexité en points), il est donc probable que nous ayons sur-estimé la vélocité de l'équipe. Il nous faudra au moins deux itérations pour obtenir une vélocité cohérente et une échelle d'estimation claire et partagée par toute l'équipe.\
Il est possible que le temps consacré au projet soit impacté par le fait que l'itération se déroule juste avant les soutenances de stages.\

### Titre des éléments reportés  
*Lister ici les éléments des itérations précédentes qui ont été reportés à l'itération suivante. Ces éléments ont dû être revus et corrigés par le PO N+1.*
> Répondre ici 

### Titre des nouveaux éléments  
*Lister ici les nouveaux éléments pour l'itération suivante. Ces éléments ont dû être revus et corrigés par le PO N+1.*

> Nous allons travailler sur 2 epics divisés en 6 stories.
- En tant qu'utilisateur, je veux avoir accès à une page dédiée à l'ajout d'un objet avec un formulaire complet.
- En tant qu'utilisateur, je veux pouvoir accéder à un espace listant tous mes objets proposés à l'emprunt.
- En tant qu'utilisateur, je veux pouvoir obtenir plus d'informations sur un objet listé dans l'espace "mes objets". Je veux pouvoir modifier ces informations et faire défiler le profil de mes objets.
- En tant que gérant, je veux une vérification directe de la validité des informations entrées dans le formulaire d'ajout par un utilisateur (vérifications côté client).
- En tant que gérant, je veux que les données envoyées par le formulaire d'ajout soient vérifiées avant d'être insérées dans la base de données (vérifications côté serveur).
- En tant que gérant, je veux avoir une base visuelle commune sur toutes les pages du site et pouvoir naviguer facilement entre celles-ci.


## Confiance 
### Taux de confiance de l'équipe dans l'itération  
*Remplir le tableau sachant que :D est une confiance totale dans le fait de livrer les éléments de l'itération. Mettre le nombre de votes dans chacune des cases. Expliquer en cas de besoin.*

|          	| :( 	| :&#124; 	| :) 	| :D 	|
|:--------:	|:----:	|:----:	    |:----:	|:----:	|
| Equipe 1 	|  *0* 	|  *0* 	    |  *0* 	|  *0* 	|

### Taux de confiance de l'équipe pour la réalisation du projet 
*Remplir le tableau sachant que :D est une confiance totale dans le fait de réaliser le projet. Mettre le nombre de votes dans chacune des cases. Expliquer en cas de besoin.*

|          	| :( 	| :&#124; 	| :) 	| :D 	|
|:--------:	|:----:	|:----:	    |:----:	|:----:	|
| Equipe 1 	|  *0* 	|  *0* 	    |  *0* 	|  *0* 	|

 
 