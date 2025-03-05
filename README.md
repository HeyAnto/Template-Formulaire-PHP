# Template Formulaire PHP

J'ai pu travailler sur ce projet avec [**@fannysaez**](https://github.com/fannysaez) et été aider par le formateur [**@GuillaumePons63**](https://github.com/GuillaumePons63) :shipit:

## Description du Projet

Ce projet est un template de formulaire de contact simple et sécurisé, développé en PHP. Il permet aux utilisateurs de saisir leurs informations (prénom, nom, email, objet et message) et d'envoyer ces données via email en utilisant la bibliothèque [**PHPMailer**](https://github.com/PHPMailer/PHPMailer). Le projet utilise également la bibliothèque [**PHP dotenv**](https://github.com/vlucas/phpdotenv) pour charger les variables d'environnement depuis un fichier `.env`. Ce projet a été réalisé dans le cadre d'un brief [**SIMPLON**](https://www.simplon.co/).

## Prérequis

- **PHP 8.3.14** ou supérieur
- [**Composer 2.8.5**](https://getcomposer.org/) ou supérieur
- Un serveur SMTP pour l'envoi d'emails (ex: Gmail, Outlook, etc.)

## Installation

**1. Cloner le dépôt GitHub**
<br>
Commencez par cloner le dépôt sur votre machine locale :

```bash
git clone https://github.com/HeyAnto/Template-Formulaire-PHP.git
cd Template-Formulaire-PHP
```

<br>

**2. Installer les dépendances**
<br>
Utilisez Composer pour installer les dépendances du projet :

```bash
composer install
```

<br>

**3. Configurer les variables d'environnement**
<br>
Vous trouverez `.env.exemple` dans le dossier includes.
<br>
Renommez le en `.env`, puis modifiez les valeurs suivantes avec vos informations SMTP :

```env
mail_Host = "votre_smtp_host"

# Nom d'utilisateur pour l'authentification SMTP
# Peut être une adresse email ou un identifiant selon votre fournisseur SMTP
mail_Username = "votre_email"
mail_Password = "votre_mot_de_passe"

# Type de chiffrement SMTP (tls ou ssl selon votre fournisseur)
mail_SMTPSecure = "PHPMailer::ENCRYPTION_STARTTLS"
mail_Port = 587

# Email de l'administrateur qui recevra les messages
admin_Email = "votre_email_admin"
```

Exemple pour Gmail :

```env
mail_Host = "smtp.gmail.com"
mail_Username = "votre@gmail.com"
mail_Password = "votre_mot_de_passe"
mail_SMTPSecure = "tls"
mail_Port = 587
admin_Email = "votre@gmail.com"
```

<br>

**4. Type de chiffrement SMTP**
<br>
Le paramètre mail_SMTPSecure définit la méthode de chiffrement utilisée pour sécuriser la connexion avec le serveur SMTP. Voici les options disponibles :

`tls` (Transport Layer Security) → Recommandé

**Utilisé sur le port 587**
<br>
Offre un bon niveau de sécurité tout en restant compatible avec la plupart des fournisseurs SMTP.
<br>
Exemples : Gmail, Outlook, Yahoo
<br>
`ssl` (Secure Sockets Layer)

**Utilisé sur le port 465**
<br>
Peut être nécessaire pour certains anciens serveurs SMTP.
<br>
Si vous n’êtes pas sûr du chiffrement à utiliser, essayez `tls` en premier.

<br>

**5. Configurer le destinataire**
<br>
Dans le fichier `mail.php`, modifiez l'adresse email du destinataire :

```php
$mail->addAddress("destinataire@example.com");
```

<br>

## Utilisation

**1. Accéder au formulaire**

- Ouvrez le fichier `index.php` dans votre navigateur pour accéder au formulaire.

- Le formulaire est prêt à être utilisé après avoir configuré les variables d'environnement (voir la section [Installation](#installation)).

<br>

**2. Soumettre le formulaire**

- Remplissez les champs requis (prénom, nom, email, objet et message).

- Cliquez sur "Envoyer". Si tout est correct, un message de succès s'affichera. Sinon, un message d'erreur indiquera les problèmes rencontrés.

<br>

**3. Vérifier l'email**

- Le destinataire configuré dans `mail.php` recevra un email avec les informations du formulaire.

## Ressources Utiles

- [**Documentation PHPMailer**](https://github.com/PHPMailer/PHPMailer)
- [**Documentation PHP dotenv**](https://github.com/vlucas/phpdotenv)
- [**Guide Composer**](https://getcomposer.org/doc/)

## Licence

### The Unlicense

This is free and unencumbered software released into the public domain.

Anyone is free to copy, modify, publish, use, compile, sell, or
distribute this software, either in source code form or as a compiled
binary, for any purpose, commercial or non-commercial, and by any
means.

In jurisdictions that recognize copyright laws, the author or authors
of this software dedicate any and all copyright interest in the
software to the public domain. We make this dedication for the benefit
of the public at large and to the detriment of our heirs and
successors. We intend this dedication to be an overt act of
relinquishment in perpetuity of all present and future rights to this
software under copyright law.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR
OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.

For more information, please refer to <https://unlicense.org>
