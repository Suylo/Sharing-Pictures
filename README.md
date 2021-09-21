# **Sharing-Pictures**

![alt text](https://media.discordapp.net/attachments/804495777002291233/854698124295405588/unknown.png)

## **Introduction**
**Sharing-pictures** est mon premier gros projet web que j'ai dû développer lors de ma première année de BTS SIO.

#### L'énoncé de ce TP :
- Réaliser un site web MVC (Modèles Vues Contrôleurs) en utilisant la Programmation Orientée Objet en PHP
- Réaliser des opérations avec la base de données : Affichage, Ajout, Modification, Suppression

#### Ce que j'ai produit :
Un site web Instagram-like, ou les possibilités sont diverses et variées :  
-  Se connecter/S'inscrire sur le site
- Poster/Aimer/Commenter des photos
- Modifier ses informations personnelles
- Supprimer son compte
- Supprimer ses commentaires/photos postées, ...

et d'autres choses qui arriveront beaucoup plus tard !

⚠ Ce site n'est en aucun cas sécurisé, je m'explique : ⚠
- Les variables de session, get, post, ... ne sont pas protégées
- Les mots de passe ne sont pas chiffrés,
- Aucune protection contre les injections SQL, etc..  
  
## **Installation**

### Windows
1. Installer un serveur web : [WampServer](https://sourceforge.net/projects/wampserver/files/) (LATEST VERSION) OU [XAMPP](https://www.apachefriends.org/fr/index.html) OU [EasyPHP](https://www.easyphp.org/download.php), ...  
    *Pour la suite, j'utilise **WAMPSERVER***
2. Télécharger et installer [Git](https://git-scm.com/download/).
2. Télécharger et installer [Composer](https://getcomposer.org/download/).   
3. Allez dans le répertoire :  `C:\wamp64\www\`
4. Il faut tout supprimer (sauf `favicon.ico`)
5. Après avoir tout supprimé, Clic-Droit `Git Bash Here`, exécutez ces commandes : 
```
 git clone https://github.com/Suylo/Sharing-Pictures.git
 cd Sharing-Pictures/
```
6. Une fois que vous êtes dans le répertoire Sharing-Pictures,  :
```
 composer update
```
7. Configurer la **BDD** : 
Se rendre sur `localhost/phpmyadmin`
Serveur : *MySQL*, `id : root, mdp : aucun` 
8. Nouvelle base de données : il faut impérativement la nommer : `sharingpictures`
9. Importer le fichier `db.sql` dans la BDD `sharingpictures`
10. Et normalement en allant dans votre navigateur et en tappant dans l'URL : `localhost/Sharing-Pictures/` tout devrait fonctionner !

Amusez-vous bien !
