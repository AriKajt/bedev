https://github.com/AriKajt/bedev/blob/master/Ispit_Bozidar.md#instalacija-wsl-i-ubuntu-na-virtualnim-windowsima

**Instalacija wsl i ubuntu na virtualnim Windowsima**
upute za instalaciju wsl i Ubuntu iz command prompta (Windows+R, pa upišite cmd, te potom ctrl+shift+enter da bi ga otvorili sa administratorskim ovlastima)
https://learn.microsoft.com/en-us/windows/wsl/install
nakon toga trebate spojiti wsl sa VS Code prema sljedećim uputama (koristite "from VS Code" dio)
https://code.visualstudio.com/docs/remote/wsl
sljedeće pristupite Ubuntu putem terminala na VS Code te napravite naredbu za update i upgrade
sudo apt-get update && sudo apt-get upgrade -y
zatim kopirajte .setup.sh sa gita (imate link dolje) i pohranite u setup.sh na Ubuntu (sa sudo nano), dajte mu 777 ovlasti (sudo chmod 777), te ga pokrenite kako bi instalirali LAMP stack (php, mysql, apache, composer)
https://github.com/adobrini-algebra/radno_okruzenje/blob/master/setup.sh

sudo nano setup.sh
sudo chmod 777 setup.sh
setup.sh
----
 **Koraci za uklanjanje i ponovno instaliranje Ubuntu distribucije u WSL (Windows Subsystem for Linux). ukratko:
**
Provjerite popis instaliranih distribucija:
wsl -l
Uklonite Ubuntu:
wsl --unregister Ubuntu
Provjerite je li uklonjen:
wsl -l
Ponovno instalirajte Ubuntu prema potrebnim uputama. Na primjer, koristite Microsoft Store ili druge metode.

-----

**Da biste omogućili ili instalirali Git naredbe na Windowsu u Visual Studio Codeu, slijedite ove korake:
**
**Instalirajte Git:**

Preuzmite instalacijski program za Git s službene web stranice git-scm.com
Pokrenite instalacijski program i slijedite upute. Tijekom instalacije, omogućite opciju za dodavanje Git-a u PATH okruženje.
Provjerite instalaciju Git-a:

Otvorite terminal (Command Prompt, PowerShell ili VS Code terminal).
Upotrijebite naredbu:
git --version
Ako dobijete verziju Git-a, instalacija je uspješna.
Konfigurirajte Git u Visual Studio Codeu:

Otvorite Visual Studio Code.
Idite na View > Terminal ili pritisnite `Ctrl + ```.
Provjerite je li Git dostupan pomoću:
git --version
Postavite korisničke podatke (za Git spremišta):

U terminalu unesite:
git config --global user.name "Your Name"
git config --global user.email "your.email@example.com"
Omogućite Git u Visual Studio Codeu:

Otvorite Source Control s ikone na bočnoj traci ili pritiskom na Ctrl+Shift+G.
Ako je Git ispravno instaliran, ovdje ćete vidjeti opcije za upravljanje Git spremištima.
Sada je Git spreman za korištenje u Visual Studio Codeu.

----
**what's the purpose of the function spl_autoload_register(), does it register a function that is called when a script is ucitana? or when an object is destroyed? or automatically when a class is undefined? or when there is an error?**
Funkcija spl_autoload_register() registrira funkciju koja se automatski poziva kada je klasa nepoznata (undefined) tijekom izvršavanja skripte. Njen glavni cilj je omogućiti automatsko učitavanje klasa bez ručnog uključivanja datoteka.

**getting an entry in a database table by the primary key, using DB class in laravel uses the find() function, right? and not first, get, or all functions?**

Da, u Laravelu, funkcija find() se koristi za dohvaćanje unosa u bazi prema primarnom ključu. Funkcije first, get i all koriste se u različite svrhe:

first(): Vraća prvi rezultat iz skupa upita.
get(): Dohvaća sve rezultate upita.
all(): Dohvaća sve zapise iz modela.
Dakle, za dohvaćanje unosa prema primarnom ključu koristi se find().


**
purpose of {{ }} syntax in blade?**
Sintaksa {{ }} u Bladeu koristi se za ispis vrijednosti unutar pogleda, dok se automatski obavlja escapiranje HTML znakova radi zaštite od XSS napada.

Primjer:

{{ $variable }}
Ovo će ispisati sadržaj varijable $variable kao siguran HTML.


**we can't proslijediti podatke to the view in laravel using the request() function, right? but we could use with, an array, or compact()?
**Točno, podatke ne možete proslijediti u pogled koristeći request() funkciju. Međutim, možete ih proslijediti koristeći:

with():

return view('view-name')->with('key', $value);
Array:

return view('view-name', ['key' => $value]);
compact():

return view('view-name', compact('key'));

**to connect to mysql database using mysqli, is this the correct syntax: $conn = mysqli_connect("localhost", "user", "password", "database");? these other 2 options without the $conn variable are incorrect, right? option 2: mysqli_connect("localhost", "password", "user", "database");, option 3: mysqli_connect("user@localhost", "password", "database");. well option 4 is none of the above, but i think it's not that either?
**Točno, prva opcija:

$conn = mysqli_connect("localhost", "user", "password", "database");
je ispravna. Druge opcije su pogrešne jer:

Opcija 2: Ima zamijenjen redoslijed parametara (password dolazi iza korisničkog imena).
Opcija 3: Pokušava koristiti netočan oblik za hostname (user@localhost).
Opcija 4 ("none of the above") također nije točna jer je prva opcija ispravna.


**to access svojstvo objekta u php, koristimo operator "->" before the svojstvo, correct? and not ".", ",", or ";"?
**Točno, za pristup svojstvu objekta u PHP-u koristimo operator -> prije svojstva.
Primjer:

$object->property;
Ostali operatori ., , i ; nisu ispravni za ovu svrhu.


**what is laravel migrations used for - upravljanje konfiguracijskim datotekama aplikacije; upravljanje pohranom datoteka; upravljanje promjenama sheme baze podataka; ili upravljanje postavljanjem posluzitelja?
**Laravel migrations koriste se za upravljanje promjenama sheme baze podataka. Omogućuju verzioniranje i jednostavno praćenje promjena u strukturi baze podataka kroz PHP datoteke.


**can all of these naredbe be used to check the php version installed on the system? if not, which one? php -v; php -i; php --version
**Sve ove naredbe mogu se koristiti za provjeru verzije PHP-a instalirane na sustavu:

php -v: Prikazuje verziju PHP-a.
php -i: Prikazuje detaljne informacije o konfiguraciji, uključujući verziju PHP-a.
php --version: Također prikazuje verziju PHP-a.
Dakle, sve su ispravne.


**Koji su obavezni koraci that you would include in CI - continous integration pipeline?
**Preuzimanje koda iz repozitorija
Provjera sintakse i formatiranja koda
Pokretanje testova (jediničnih, integracijskih)
Izrada artefakata (build)
Analiza koda (linting, statička analiza)
Deployment na testno okruženje (po potrebi)
Obavijesti o statusu


**koje su dvije najčeće web forme koje se koriste za slanje podataka iz web forme na server, navedite ih i objasnite razliku
**GET

Podaci se šalju kao dio URL-a u query stringu.
Koristi se za dohvaćanje podataka bez utjecaja na stanje servera.
Vidljivi podaci, ograničeni duljinom URL-a.
POST

Podaci se šalju u tijelu HTTP zahtjeva.
Koristi se za slanje velikih ili osjetljivih podataka.
Podaci nisu vidljivi u URL-u i nemaju ograničenja duljine.

**koja je svrha $fillable svojstva u Laravel modelu?
**Svrha $fillable svojstva u Laravel modelu je definiranje polja koja su dopuštena za masovno popunjavanje (mass assignment). Time se štite ostala polja modela od neovlaštenog mijenjanja prilikom korištenja metoda poput create() ili update().

Primjer:

protected $fillable = ['name', 'email', 'password'];
Ovo znači da će samo navedena polja biti popunjena kada se koriste masovni unos podataka.

**može li se u istoj php datoteci definirati više imenskih prostora?
**Da, u istoj PHP datoteci mogu se definirati više imenskih prostora (namespaces), ali je preporučljivo koristiti samo jedan po datoteci radi čitljivosti i održavanja koda.

Ako definirate više imenskih prostora, koristite blok sintaksu:

namespace App\Controllers {
    class UserController {
        public function index() {
            echo "User Controller";
        }
    }
}

namespace App\Models {
    class User {
        public function getName() {
            return "User Name";
        }
    }
}
Za svaku grupu kodova definira se poseban blok s pripadajućim namespaceom.

**metoda za pripremu sql upita u pdo? $_COOKIE
**Metoda za pripremu SQL upita u PDO je prepare(). Koristi se za zaštitu od SQL injekcija jer omogućuje vezivanje parametara prije izvršavanja upita.

Primjer:

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
Napomena: $_COOKIE je globalna varijabla koja služi za pristup kolačićima, ali nije povezana s pripremom SQL upita. Kolačiće je potrebno validirati prije korištenja u upitima kako bi se izbjegla sigurnosna ranjivost.



**što je objekt u php-u? skup podataka i metoda, ili tip podataka
**Objekt u PHP-u je instanca klase, koja sadrži:

Skup podataka (svojstva/properties)
Vrijednosti koje objekt posjeduje.
Metode
Funkcije koje objekt može izvršavati.
Dakle, objekt je više od samog tipa podataka jer kombinira podatke i funkcionalnost u jednu cjelinu.

Primjer:

class Car {
    public $color;
    public function drive() {
        echo "Driving...";
    }
}

$car = new Car(); // Objekt klase Car
$car->color = "red"; // Postavljanje svojstva
$car->drive(); // Pozivanje metode

**opišite na koji biste način proveli završno testiranje projekta
**Planiranje testiranja

Izrada popisa funkcionalnosti i očekivanih ishoda.
Odabir testnih slučajeva i alata za testiranje.
Funkcionalno testiranje

Provjera svake funkcionalnosti prema zahtjevima.
Testiranje performansi

Provjera brzine, skalabilnosti i stabilnosti pod opterećenjem.
Sigurnosno testiranje

Traženje ranjivosti, poput SQL injekcija ili XSS napada.
Korisničko testiranje (UAT)

Angažiranje stvarnih korisnika za evaluaciju projekta.
Testiranje kompatibilnosti

Provjera ispravnog rada na različitim uređajima, preglednicima i platformama.
Ispravljanje pogrešaka

Analiza pronađenih grešaka i njihovo otklanjanje.
Dokumentacija

Bilježenje rezultata testiranja i finalna potvrda spremnosti za produkciju.

**ograničenje foreign key osigurava referentni integritet između dvije tablice? točno; netočno;
**Točno.

Ograničenje foreign key osigurava referentni integritet između dvije tablice tako što provjerava da vrijednost u stupcu koji je foreign key odgovara vrijednosti primarnog ključa u povezanoj tablici. Ovo sprječava umetanje, ažuriranje ili brisanje podataka koji bi narušili tu povezanost.


**koji zapis kardinalnosti znači jedan i samo jedan? 1:1
**Točno.
Zapis kardinalnosti 1:1 znači "jedan i samo jedan".

To označava da svaki zapis u jednoj tablici odgovara točno jednom zapisu u drugoj tablici i obrnuto.


**to go back a little bit, isn't an object a "tip podataka"? isnt it a skup svojstava i metoda, not skup podataka i metoda? if we think of "tip podataka" there, svojstvo is not a "podatak" in that context, right?
**You're absolutely right to point out the nuances. Let me clarify:

Object as a "tip podataka":
In PHP, objects are indeed a data type. When you instantiate a class, the resulting object is treated as a complex data type that encompasses both data (in the form of properties) and behaviors (in the form of methods).

"Skup svojstava i metoda":
Saying an object is a "skup svojstava i metoda" is more precise because svojstva (properties) are the defined attributes of the object, and methods are the actions it can perform.

Svojstva themselves don't hold data directly but serve as containers for the data values that an object holds.
Context of "svojstva" and "podatak":
If you are differentiating between the definitions, it's better to say that the object is a "skup svojstava i metoda." The svojstva are not podatak in themselves but define where and how the data is stored in the object.

So, an object is both:

A tip podataka in PHP, representing a complex, structured type.
A skup svojstava i metoda when describing its internal structure and behavior.
The context determines the phrasing!








## Vlastiti host

- otvorite terminal (bilo u VSCode, bilo zasebno) i sa naredbom "cd /etc/apache2/sites-available" se pozicionirajte u apache direktorij dostupnih hostova

- sa naredbom "sudo nano laravel-videoteka.conf" (umjesto laravel-videoteka fileu možete dati i neko drugo ime po vlastitom izboru) stvorite i otvorite konfiguracijsku host datoteku

- u nju iskopirajte (klikom desnom tipkom miša u otvorenom fileu u nano editoru) ovaj kod:

```
 <VirtualHost *:80>
    ServerName laravel.videoteka
    DocumentRoot /var/www/backend_developer/laravel-videoteka/public

    <Directory /var/www/backend_developer/laravel-videoteka/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    Alias /phpmyadmin /usr/share/phpmyadmin
    <Directory /usr/share/phpmyadmin>
        Options FollowSymLinks
        DirectoryIndex index.php
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/laravel.error.log
    CustomLog ${APACHE_LOG_DIR}/laravel.access.log combined
</VirtualHost>
```

- napomena da ServerName (ovdje laravel.videoteka) možete dati po vlastitom izboru, no DocumentRoot i Directory moraju biti putanje do public direktorija u kojem ste spremili Laravel (većina vas će tu imati laravel-videoteka, no ako ste dali neko drugo ime, onda tu treba upisati njega)

- datoteku spremite sa 'ctrl+o', te izađete sa 'ctrl+x'

- zatim u terminalu izvedete naredbu "sudo a2ensite laravel-videoteka"

- i posljednja stvar u terminalu, naredba "sudo systemctl reload apache2", no morate ostaviti otvoren VSCode (ili zasebni terminal ako ste u njemu radili) da bi mogli otvoriti stranicu u web pretraživaču, odnosno da bi vaš host radio

- u Windowsima otvorite Notepad (ili neki drugi tekst editor) u administrator modu (desni klik na shortcut ikonu pa opcija "more" i zatim "run as administrator")

- kliknite u gornjem lijevom kutu na "file" i "open" te pronađite putanju "Windows\System32\drivers\etc" te dolje u desnom kutu umjesto "Text documents" odaberite opciju "All files" nakon čega će vam se prikazati "hosts" file kojeg trebate otvoriti

- u "hosts" fileu na kraju kopirajte ove dvije linije, te spremite datoteku

```
127.0.0.1       laravel.videoteka
::1             laravel.videoteka
```

- nakon ovoga bi trebali u web pregledniku moći u pretraživač ukucati laravel.videoteka (uz upaljen VSCode) i tamo bi vam se trebala prikazati Laravel welcome stranica



## Keyboard shortcuts (-> i =>) u VSCode

- otvorite VSCode i u donjem lijevom kutu kliknite na ikonu "Manage" (zupčanik), te odaberite opciju "Keyboard shortcuts"

- u prozoru koji će vam se otvoriti na gornjoj lijevoj strani kliknite na ikonu "Open Keyboard Shortcuts (JSON)" (izgleda kao list papira) nakon čega će vam se otvoriti datoteka "keybindings.json"

- u toj datoteci "keybindings.json" unutar! uglatih zagrada [ ] dodajte ovaj kod i spremite datoteku:

```
{
    "key": "ctrl+oem_102",
    "command": "editor.action.insertSnippet",
    "when": "editorTextFocus",
    "args": {
      "snippet": "->"
    }
  },
  {
    "key": "alt+oem_102",
    "command": "editor.action.insertSnippet",
    "when": "editorTextFocus",
    "args": {
      "snippet": "=>"
    }
  }
```

- nakon ovoga ćete sa kombinacijom "ctrl + <" moći automatski dodati "->" (koristimo je kod korištenja svojstava i metoda objekata, odnosno instanci klasa), a sa "alt + <" oznaku "=>" (koristimo je kod definiranja asocijativnih polja)



## (Moguće) rješenje problema sa prikazom Debug bara

- ako već ne postoji, u direktoriju 'storage' stvorite novi direktorij 'debugbar', u terminal ukucajte ove naredbe:
 
 ```
cd storage/
mkdir debugbar
 ```
 
- dajte sve ovlasti 'www-data' sa:
 
 ```
sudo chown -R www-data:www-data debugbar/
 ```
 
- i zatim očistite 'config' i 'routes':
 
 ```
sudo php artisan config:clear
sudo php artisan route:clear
```

- nakon ovoga bi vam se na dnu stranice vašeg Laravel projekta trebao prikazati Debug bar



## Instalacija Gravatar i Picsum images faker paketa

- u VS Code otvorite terminal i odradite ove dvije naredbe jednu za drugom:

 ```
composer require ottaviano/faker-gravatar --dev
composer require --dev smknstd/fakerphp-picsum-images
 ```

 - nakon toga u terminalu napravite novi Service Provider sa naredbom:

 ```
php artisan make:provider FakerServiceProvider
 ```

 - nakon čega će vam se u direktoriju app/Providers stvoriti novi file 'FakerServiceProvider.php' u kojeg trebate iskopirati ovaj kod:

 ```
    <?php

    namespace App\Providers;

    use Faker\Factory;
    use Faker\Generator;
    use Illuminate\Support\ServiceProvider;

    class FakerServiceProvider extends ServiceProvider
    {
        /**
        * Register services.
        */
        public function register(): void
        {
            $locale = app('config')->get('app.faker_locale') ?? 'en_US';

            $abstract = Generator::class . ':' . $locale;

            $this->app->singleton($abstract, function () use ($locale) {
                $faker = Factory::create($locale);

                $faker->addProvider(new \Ottaviano\Faker\Gravatar($faker));
                $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));

                return $faker;
            });
            
        }

        /**
        * Bootstrap services.
        */
        public function boot(): void
        {
            //
        }
    }
 ```

 - također, u fileu 'AppServiceProvider.php' koji se nalazi unutar istoga direktorija, trebate registrirati taj novovostvoreni service provider na način da unutar vitičastih zagrada {} metode register() dodate ovaj kod:

 ```
 if (!$this->app->environment('production')) {
            $faker = fake();
            $faker->addProvider(new \Ottaviano\Faker\Gravatar($faker));
            $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
 }
 ```

- objašnjenje if bloka - ovo će vrijediti samo ako niste u produkcijskom okruženju (naš environment je namješten na 'local'), zatim umjesto $faker za pozivanje funkcija ovih servisa možete koristiti fake(), te zatim dodajemo ta dva nova faker providera sa funkcijom addProvider()

- nakon ovoga prilikom kreiranja factoriesa za pojedine tablice (recimo avatar atribut u tablici users ili image atribut u tablici articles) za kreiranje nešto smislenijih slika možete koristiti naredbe:

 ```
 avatar => fake()->gravatarUrl()
 image => fake()->imageUrl()
 ```

- linkovi na ta dva paketa:

 ```
  https://github.com/ottaviano/faker-gravatar
  https://github.com/smknstd/fakerphp-picsum-images
 ```



## Stvaranje custom layouta za Blade x-components u /layouts folderu:

- ako želite stvoriti custom layout, primjerice za naš home page, koji ne mora biti spremljen u /components folderu (nego recimo /layouts poput app.blade.php i guest.blade.php layouta) slijedite ove upute

- u VS Code otvorite terminal i napravite novi component (u našem slučaju MasterLayout) sa ovom naredbom:

```
sudo php artisan make:component MasterLayout
```

- nakon čega će vam se kreirati MasterLayout.php file sa istoimenom klasom koja nasljeđuje klasu Component, unutar tog filea upišite ovaj kod:

```
  <?php

  namespace App\View\Components;

  use Illuminate\Database\Eloquent\Collection;
  use Illuminate\View\Component;
  use Illuminate\View\View;

  class MasterLayout extends Component
  {
      /**
      * Get the view / contents that represents the component.
      */
      public function render(): View
      {
          return view('layouts.master');
      }
  }
```

- ovdje u render() metodi navodimo gdje se nalazi master.blade.php file, odnosno gdje ga poziv na metodu može pronaći (layouts folder)

- zatim u resources/views/layouts folderu kreirajte novi file master.blade.php i u njemu izdvojite okvir vašeg home pagea (kojeg će pozivati home.blade.php, i koji će uključivati - include(), header, footer i slične dijelove html stranice)



## Simulacija udaljenog Linux servera pomoću Virtualboxa:

- download najnovijih verzija Virtualbox i Ubuntu server LTS

- nakon instalacije, u Virtualboxu treba odabrati opciju 'New' za dodavanje nove virtualke, te kliknuti na "Skip unattended installation" kako bi mogli ručno namjestiti pojedine opcije, pritom je ključno odabrati dovoljnu veličinu virtualnog hard diska (barem 30GB) ako na virtualki želite instalirati i docker

- u settings (može i prije, i poslije instalacije) treba za Network namjestiti opciju 'bridged connection'

- tokom instalacije bitno je namjestiti vlastiti ipV4 network connection, te naposljetku odabrati opciju da se instalira OpenSSH (u videu možete vidjeti primjer toga)

```
https://www.youtube.com/watch?v=zx3bICfe5PY
```

- nakon instalacije virtualke treba omogućiti OpenSSH, te dodati vlastiti SSH ključ prilikom spajanja sa desktop (u našem slučaju wsl) Linuxa na simulirani udaljeni Virtualbox Linux server (primjer za to, uključujući i kako stvoriti SSH ključ, te onemogućiti običan password login, možete vidjeti na linkovima dolje)

```
https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu

https://www.youtube.com/watch?v=3FKsdbjzBcc
```

- nakon što ste se spojili sa vlastitog linuxa na "udaljeni server", trebate još iskopirati i pokrenuti .setup.sh datoteku sa gita (pritom treba naglastiti da je iz nje na "server" jedino bitno instalirati PHP i Composer), nakon čega ćete imati potpuno spreman "udaljeni" Linux server za pokretanje vaših aplikacija

```
sudo apt install -y php libapache2-mod-php php-mysql php-pdo php-intl php-gd php-xml php-json php-mbstring php-tokenizer php-fileinfo php-opcache

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"
```



## Prebacivanje aplikacije na udaljeni server naredbom rsync -a

- prije prebacivanja trebate naredbom chown dobiti ovlast nad odredišnim direktorijem na serveru u kojeg želite spremiti aplikaciju (primjer slučaja ako aplikaciju želite prebaciti u odredišni direktorij /var/www/)

```
sudo chown -R algebra:algebra /var/www/
```

- nakon toga koristimo naredbu 'rsync -a' kako bi aplikaciju prebacili na udaljeni server (uz napomenu da nam trebaju sudo ovlasti ako na server želimo prebaciti i datoteke kojima vlasnik nije korisnik 'algebra')

```
sudo rsync -a /var/www/backend_developer/laravel-videoteka algebra@192.168.1.225:/var/www/
```



## Prebacivanje aplikacije na udaljeni server pomoću git clone

- prvo trebate kopirati link projekta sa githuba koji želite klonirati, te na serveru napraviti git clone

- nakon toga, treba prekopirati .env.example file u .env te dodati APP_KEY

```
echo $UID
cp .env.example .env
php artisan key:generate
```

- zatim sa composer install treba dodati vendor folder koji nedostaje (eventualno instalirati i zip, te unzip ako fale)

```
sudo apt-get install zip && sudo apt-get install unzip
composer install
```



## Pokretanje aplikacije na udaljenom serveru

- kako bi spriječili greške sa file permissionima, trebate odraditi ove naredbe:

```
sudo chown -R algebra:www-data storage/ bootstrap/cache/
sudo chmod -R 775 storage/ bootstrap/cache/
```

- ako u projektu koristite custom javaScrip (Tailwind i slično) onda trebate odraditi npm naredbe

```
npm install
npm run build
```

- zatim napraviti provjeru i po potrebi izmjene .env filea (user_id, ime baze, username, password i slično) 

```
echo $UID
sudo nano .env
```

- naposlijetku trebate napraviti symlink, te napuniti bazu sa podacima

```
php artisan storage:link
php artisan migrate --seed
```



## Pokretanje aplikacije pomoću dockera na udaljenom serveru

- najprije trebate instalirati docker na Linux udaljenog servera (upute na linku, opcionalno možete i dodati docker u sudo grupu)

```
https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-22-04
```

- zatim trebate provjeriti portove u .env fileu (app_port, forward_db port i slično) i eventualno ih zamijeniti (najjednostavnije +1) ako želite upogoniti više docker aplikacija (jer svaka treba raditi na vlastitom portu)

- sljedeće trebate pokrenuti docker, te instalirati potrebne containerse (sa docker ps naredbom možete provjeriti koji containeri trenutno rade na serveru)

```
docker compose up -d
docker ps
```

- naposlijetku trebate ući u app docker container te napraviti symlink i pokrenuti migraciju

```
docker compose exec -it app bash
php artisan storage:link
php artisan migrate --seed
```

- nakon ovoga bi primjerice aplikaciji sa ip adresom 'udaljenog servera' 192.168.1.225 na portu 8000 trebali moći pristupiti u web browseru sa:

```
192.168.1.225:8000
```
