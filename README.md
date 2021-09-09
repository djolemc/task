Podesavanja za konekciju su u fajlu config/config.php <br>
Dump baze je u fajlu database.sql <br>
.htaccess fajl se nalazi u rootu projekta


Projekat koristi MVC patern. Glavna prednost ovog patterna je razdvajanje prezentacije i biznis logike. Na ovaj nacin 
lako mozemo da odrzavamo i prosirujemo aplikaciju.

Komponente aplikacije su smestene u foldere:
 * assets  - css/js
 * classes  
 * config - konfiguracioni fajlovi
 * Controllers - kontroleri
 * Models - modeli za komunikaciju sa bazom
 * Views - html prezentacije


Ulazna tacka aplikacije je index.php. 

U njemu se kreira singleton instanca Database klase. Na taj nacin aplikacija koristi jednu konekciju sa 
bazom, umesto da svaki put instanciramo novi objekat. 

U folderu classes se nalazi klasa Validation, koja sluzi za validaciju unetih podataka (username i password). Ova klasa postuje
single responsibility princip


