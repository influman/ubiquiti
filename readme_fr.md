# Installation
Monitoring du r�seau UniFi d'Ubiquiti  
  
### Les principes
  
Monitorer la sant� et le statut des sites UniFi et leurs devices.  
Activer/D�sactiver 1 ou tous les points d'acc�s Wifi (AP).  
Activer/D�sactiver 1 ou tous les WLAN.  
Bloquer/D�bloquer une adresse MAC.  
  
### Ajout des p�riph�riques
Cliquez sur "Configuration" / "Ajouter ou supprimer un p�riph�rique" / "Store eedomus" / "Ubiquiti" / "Cr�er"  

  
*Voici les diff�rents champs � renseigner:*

* [Obligatoire] - L'IP du controleur UniFi  
* [Obligatoire] - Login  
* [Obligatoire] - Mot de passe 
* [Obligatoire] - Le site Unifi monitor� (default)  
* [Obligatoire] - Langue FR/EN  
* [Obligatoire] - Installer les capteurs Version CloudKey Oui/Non ?  
* [Obligatoire] - Installer les capteurs Gateway Oui/Non ? 
* [Obligatoire] - Installer les capteurs Switches Oui/Non ?  
* [Obligatoire] - Installer les capteurs Access Points Oui/Non ?  
  
  
Le capteur principal "Global Status" interroge votre r�seau UniFi. Il restitue les "devices" activ�s du site pr�cis� en VAR3 (default).  
Les donn�es de connexion sont en VAR1 : par d�faut HTTPS, et port 8443. Les modifier si besoin.  
  
L'actionneur "AP Control" permet d'activer ou d�sactiver tous les points d'acc�s Wifi, ou 1 AP en particulier.  
Dans ce dernier cas, il faut pr�ciser la valeur de APID dans l'URL appel�e (dans la configuration des valeurs du p�riph�rique).  
Cette valeur APID est le code ID_ sur 24 caract�res qui peut �tre retrouv� dans le XML complet retourn� par "Global Status" (lien "tester" dans la configuration du p�riph�rique), au niveau DEVICE de type UAP.  
  
L'actionneur "WLAN Control" permet d'activer ou d�sactiver tous les WLAN, ou 1 Wlan en particulier.  
Dans ce dernier cas, il faut pr�ciser la valeur de WLANID dans l'URL appel�e.  
Cette valeur WLANID est le code ID_ sur 24 caract�res qui peut �tre r�cup�r� dans le XML complet retourn� par "Global Status" (lien "tester" dans la configuration du p�riph�rique), au niveau WLANCONF.  
  
L'actionneur "Block/Unblock Client device" permet de bloquer ou d�bloquer un dispostif connect� repr�sent� par son adresse MAC.  
Les adresses MAC des clients sont � pr�ciser dans les URL d'appels : &action=block&value=aa:bb:cc:dd:ee:ff  ou &action=unblock&value=aa:bb:cc:dd:ee:ff  
  
  
Les capteurs unitaires disponibles � l'installation  :  
(v0.7 du plugin)  
* + Nombre de nouvelles alarmes  
* + Latence, d�bit up et d�bit down Internet (Gateway)  
* + %CPU et %MEM de la Gateway (Gateway)  
  
(v0.6 du plugin)  
* + Version du Controller Cloudkey et firmware Cloudkey (Version CloudKey)  
* + Statut des syst�mes (WWW, WAN, LAN, WIFI) (Switches et Access Points)  
   
(v0.5 du plugin)  
* Nb Clients total sur la Gateway (Gateway)  
* Nb de Switch activ�s (Switches)  
* Nb de Clients connect�s filaires (Switches)  
* Nb de Points d'acc�s activ�s (Access Points)  
* Nb de Clients Wifi (Access Points)  
* Nb de Guest Wifi (Access Points)  
  
   
Influman 2019
therealinfluman@gmail.com  
[Paypal Me](https://www.paypal.me/influman "paypal.me")  


  



 

 

  


