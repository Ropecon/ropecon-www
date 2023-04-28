# Ropeconin verkkosivuston käyttäjäopas

Tämä on pieni käyttäjäopas Ropeconin verkkosivuston sisällön ylläpitoon. Tässä oppaassa käsitellään pääsääntöisesti Ropeconin verkkosivuston teeman erityispiirteitä, joten perustuntemus WordPressiin ja lohkoeditoriin (Gutenberg) on tarpeen.

## Lohkot

Teema on rakennettu sillä ajatuksella, että sisällön ylläpitäminen yhdenmukaisena on mahdollisimman helppoa. Tästä syystä erilaisten lohkojen oletustyylejä on muokattu niin, että ne integroituvat visuaaliseen ulkoasuun. Mikäli samaa lohkotyyppiä käytetään kahdella eri tavalla, yleisempi käyttötarkoitus on oletustyyli.

### Sarakkeet

*Sisältö laatikoissa* -lohkotyyli esittää sarakkeet varjostetuissa laatikoissa. Laatikoiden oletusväri on valkoinen, mutta tämän voi muuttaa muuttamalla sarakkeen taustaväriä.

### Kansi

Antamalla kannelle CSS-luokan `is-style-full-height`, kannesta tulee koko ruudun/ikkunan korkuinen.

### Media ja kuva

*Oletustyyli* näyttää kuvan ja tekstin vierekkäin. Oletustyylin kanssa *Näytä media vasemmalla/oikealla* -valinnalla **ei ole vaikutusta ulkoasuun**. Sen sijaan kuva näytetään peräkkäisissä lohkoissa vuorotellen vasemmalla ja oikealla.

*Teksti kuvan päällä* -lohkotyyli tekee kuvasta lohkon taustakuvan ja asettaa tekstin valittuun sarakkeeseen kuvan päälle. *Näytä media vasemmalla/oikealla* -valinta määrittää, kummalle puolelle kuvalle jätetään ylimääräistä tilaa.

### Kappale

*Valuutta* -lohkotyyli lisää kappaleelle pienen eurosymbolin vasempaan yläreunaan.

### Mukautettu lohko: Kuvake

Sivustolla voidaan käyttää [Iconsmind](https://iconsmind.com/)-kuvaketeeman kuvakkeita käyttämällä *Kuvake*-lohkoa ja valitsemalla kuvakkeen nimen listasta. *Myöhemmin tarkoituksena on näyttää myös esikatselu kaikista kuvakkeista, toistaiseksi kuvakkeita voi selata helpoiten [tästä](https://iconsmind.com/view_icons/).*

Listalle on lisätty myös kuvake "Ropecon", jolloin kuvakkeeksi tulee Ropeconin logo.

## Lohkomallit

Teemassa on joitain lohkomalleja, joita voi käyttää uusien sivujen ulkoasun rakentamisen helpottamiseen. Lohkomalleilla voi lisätä sisältöön valmiiksi rakennettuja, yleistä visuaalista tyyliä noudattavia lohkoryhmiä.

*Otsikkokansi* luo kannen, jota voi käyttää sivun otsikkona.

*Kolme kuvakesaraketta* luo kolmen sarakkeen asettelun, joissa sarakkeille on asetettu taustavärit. Sarakkeilla on sisältönä kuvake, otsikko ja tekstilohkot.

*Lohkomalleja voidaan lisätä teemaan tarvittaessa; tee pyyntö [GitHubissa](https://github.com/Ropecon/ropecon-www/issues/new).*

## Lisätoiminnallisuudet

### Lohkon näyttöasetukset, mm. ajastus

Sivustolle on asennettu lisäosa [Block Visibility](https://fi.wordpress.org/plugins/block-visibility/), jolla lohkoja voidaan näyttää tiettyyn aikaan, vain tietyille kävijärooleille tai vain tietyille laitteille. Näkyvyysvalinnat löytyy lohkon sivupalkin *Visibility* -osiosta.

Lohkojen näkyminen voidaan esimerkiksi ajastaa alkamaan ja päättymään automaattisesti tiettyyn aikaan.

### Kuvien tekijänoikeustiedot

Kaikille kuville lisätään automaattisesti infokuvake, jonka päälle hiiren vieminen (mobiililla klikkaamalla) näyttää kuvalle liitetyt tekijänoikeustiedot.

Tekijänoikeustiedot tulee tallentaa kuvan *Kuvaus*-kenttään WordPressin mediakirjastossa tai kuvaa siirtäessä.

### Väripaletti

Teeman väripalettiin on lisätty värejä, joita käytetään laajasti sivustolla. Yksi näistä väreistä on korostusväri (*Ropecon korostusväri #1*), joka voidaan vaihtaa ohjelmallisesti esimerkiksi uuden tapahtumateeman julkaisun yhteydessä.

### Vuosiarkistokopiot

Verkkosivuston vuosiarkistokopion voi tehdä [Simply Static](https://fi.wordpress.org/plugins/simply-static/) -lisäosalla. Lisäosan asetuksista tulee valita käyttöön suhteelliset osoitteet (relative URLs), jolloin lisäosa luo minkä tahansa verkko-osoitteen juuressa toimivan staattisen kopion.
