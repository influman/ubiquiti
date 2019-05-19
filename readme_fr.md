# Installation
Monitoring du réseau UniFi d'Ubiquiti  
  
### Les principes
  
Monitorer la santé et le statut des sites UniFi et leurs devices.  
Activer/Désactiver 1 ou tous les points d'accès Wifi (AP).  
Activer/Désactiver 1 ou tous les WLAN.  
Bloquer/Débloquer une adresse MAC.  
  
### Ajout des périphériques
Cliquez sur "Configuration" / "Ajouter ou supprimer un périphérique" / "Store eedomus" / "Ubiquiti" / "Créer"  

  
*Voici les différents champs à renseigner:*

* [Obligatoire] - L'IP du controleur UniFi  
* [Obligatoire] - Login  
* [Obligatoire] - Mot de passe 
* [Obligatoire] - Le site Unifi monitoré (default)  
* [Obligatoire] - Langue FR/EN  
* [Obligatoire] - Installer les capteurs Version CloudKey Oui/Non ?  
* [Obligatoire] - Installer les capteurs Gateway Oui/Non ? 
* [Obligatoire] - Installer les capteurs Switches Oui/Non ?  
* [Obligatoire] - Installer les capteurs Access Points Oui/Non ?  
  
  
Le capteur principal "Global Status" interroge votre réseau UniFi. Il restitue les "devices" activés du site précisé en VAR3 (default).  
Les données de connexion sont en VAR1 : par défaut HTTPS, et port 8443. Les modifier si besoin.  
  
L'actionneur "AP Control" permet d'activer ou désactiver tous les points d'accès Wifi, ou 1 AP en particulier.  
Dans ce dernier cas, il faut préciser la valeur de APID dans l'URL appelée (dans la configuration des valeurs du périphérique).  
Cette valeur APID est le code ID_ sur 24 caractères qui peut être retrouvé dans le XML complet retourné par "Global Status" (lien "tester" dans la configuration du périphérique), au niveau DEVICE de type UAP.  
  
L'actionneur "WLAN Control" permet d'activer ou désactiver tous les WLAN, ou 1 Wlan en particulier.  
Dans ce dernier cas, il faut préciser la valeur de WLANID dans l'URL appelée.  
Cette valeur WLANID est le code ID_ sur 24 caractères qui peut être récupéré dans le XML complet retourné par "Global Status" (lien "tester" dans la configuration du périphérique), au niveau WLANCONF.  
  
L'actionneur "Block/Unblock Client device" permet de bloquer ou débloquer un dispostif connecté représenté par son adresse MAC.  
Les adresses MAC des clients sont à préciser dans les URL d'appels : &action=block&value=aa:bb:cc:dd:ee:ff  ou &action=unblock&value=aa:bb:cc:dd:ee:ff  
  
  
Les capteurs unitaires disponibles à l'installation  :  
(v0.7 du plugin)  
* + Nombre de nouvelles alarmes  
* + Latence, débit up et débit down Internet (Gateway)  
* + %CPU et %MEM de la Gateway (Gateway)  
  
(v0.6 du plugin)  
* + Version du Controller Cloudkey et firmware Cloudkey (Version CloudKey)  
* + Statut des systèmes (WWW, WAN, LAN, WIFI) (Switches et Access Points)  
   
(v0.5 du plugin)  
* Nb Clients total sur la Gateway (Gateway)  
* Nb de Switch activés (Switches)  
* Nb de Clients connectés filaires (Switches)  
* Nb de Points d'accès activés (Access Points)  
* Nb de Clients Wifi (Access Points)  
* Nb de Guest Wifi (Access Points)  
  
   
Influman 2019
therealinfluman@gmail.com  
[Paypal Me](https://www.paypal.me/influman "paypal.me")  


  



 

 

  


