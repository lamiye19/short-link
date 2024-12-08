# ShortLink 
ShortLink est une application Laravel qui permet de créer des liens raccourcis avec un suffixe personnalisable. Elle fournit également des statistiques sur les clics par pays sous forme d'histogramme.

## Fonctionnalités
- Créez un lien raccourci en définissant un suffixe de votre choix
- Suivez le nombre total de clics sur chaque lien, avec une visualisation par pays sous forme d'histogramme
- Modifiez le suffixe ou l'URL de destination d'un lien déjà créé


- Fonctionnalité à venir :
  - Génération de codes QR pour les liens courts

---

## Installation et déploiement

### 1. Prérequis
Assurez-vous d'avoir installé :
- PHP 8.3 ou une version compatible
- Composer
- MySQL ou une autre base de données prise en charge par Laravel
- Un serveur web (Apache, Nginx, etc.)

### 2. Installation locale

1. Clonez le dépôt
  
   ```bash
   git clone https://github.com/lamiye19/short-link.git
   cd short-link

2. Installez les dépendances
   ```bash
   composer install
  
3. Configuration de l'environnement

Créez un fichier .env à partir de l'exemple fourni :
    ```bash
    cp .env.example .env

* Configurez les informations de connexion à la base de données dans .env:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=shortlink
    DB_USERNAME=your_username
    DB_PASSWORD=

4. Générez la clé de l'application :

    ```bash
    php artisan key:generate

5. Migrations:

    ```bash
    php artisan migrate

6. Démarrez le serveur :
    ```bash
    php artisan serve

Accédez à l'application via ```http://127.0.0.1:8000 .

## Contributions
Les contributions sont les bienvenues ! Veuillez soumettre une pull request pour discuter des modifications que vous souhaitez apporter.

## Licence
Ce projet est sous licence [MIT](https://opensource.org/licenses/MIT)