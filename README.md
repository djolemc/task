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

U klasi User koristim dependency injection. Ona zavisi od konekcije sa bazom, pa joj preko konstruktora ubacujemo objekat klase 
Database. Na ovaj nacin klasa User nije ogranicena da koristi samo objekat klase Database, vec joj se moze ubaciti bilo
koji objekat koji omogucava konekciju sa bazom.
Ovim razdvajanjem smo dobili jos dve prednosti : kod koji je vise "reusable", posto nije cvrsto vezan za odredjenu konekciju,
i kod koji je lakse testirati.


Klasa DotEnv je zaduzena za parsiranje .env fajla i kreiranje konfiguracionih promenjivih u globalnom environment okruzenju.
Moze se koristiti na dva nacina:
- instanciramo novi objekat: new DotEnv($path);
- varijablama pristupamo sa getenv($imeVarijable);

Drugi nacin:
-instanciramo novi objekat npr. $env =  new DotEnv($path);
Koristimo metodu getVar($name, $default). Na ovaj nacin mozemo da dodelimo default vrednost varijabli ukoliko nije uneta u .env
fajl npr. $database = $env->getVar("database", "defaultDatabase");


