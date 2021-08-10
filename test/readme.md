U klasi Validator.php sam koristio Single-Responsibility princip,
sto znaci da klasa ima samo jedan posao, u ovom slucaju validacija 
login podataka.

Razlike u odnosu na originalnu klasu:

* izbacena je 'wrapper' metoda koja poziva ostale private metode
* private metode su promenjene na public
* izbacen je DB objekat, posto klase vise nema potrebu da komunicira sa bazom
* izbacena je metoda koji proverava da li je korisnik vec registrovan u bazi

klasa je sad citljivija, laksa za odrzavanje i razumevanje


Pitanje:

da li ima smisla razdvojiti ovu klasu na 2 (ili cak 3) klase, 
jedna koja proverava samo email, druga koja proverava password,
eventualno treca koja provarava da li su obe sifre iste i mozda radi
jos nesto slicno?

Ili mozda treba napraviti jednu parent Validator klasu, pa onda child klase 
koje rade ovo sto sam naveo ?  Kako bi to izgledalo otprilike?


