# WTECH24 Semestrálny projekt
- [WTECH24 Semestrálny projekt](#wtech24-semestrálny-projekt)
  - [Zadanie](#zadanie)
  - [Fyzický dátový model (upravený)](#fyzický-dátový-model-upravený)
  - [Návrhové rozhodnutia](#návrhové-rozhodnutia)
    - [Pridané knižnice a rozšírenia](#pridané-knižnice-a-rozšírenia)
    - [Používatelia](#používatelia)
    - [Objednávky a košík](#objednávky-a-košík)
  - [Programové prostredie](#programové-prostredie)
  - [Implementácia](#implementácia)
    - [Zmena množstva prodkutov](#zmena-množstva-prodkutov)
    - [Prihlásenie](#prihlásenie)
    - [Vyhľadávanie](#vyhľadávanie)
    - [Pridanie produktu do košíka](#pridanie-produktu-do-košíka)
    - [Stránkovanie](#stránkovanie)
    - [Filtrovanie](#filtrovanie)

## Zadanie
Cieľom nášho projekt je vytvoriť funkčnú simuláciu e-shopu s ľubovoľnou selekciou produktov, ktorý daný e-shop poskytuje. V našej implementácií sme si zvolili predaj mobilných telefón a iných produktov v oblasti mobilných technológií. Našou úlohou je napísať aplikovateľné princípy frontend a backend funkcií, ktoré budú nosnou časťou nášho projektu. 

## Fyzický dátový model (upravený)
![fyzicky_model](/fyzicky_modelpng.png)
- **Orders (table)** : v rámci danej tabuľky sme pridali dva stĺpce, `payment_method` a `delivery_method`. Prvý novo-pridaný stĺpec udržiava v sebe informáciu o spôsobe platby - teda či ide o platbu v hotovosti pri dobierke alebo pri platbe kartou. Druhý novo-pridaný údaj slúži na identifikáciu metódy, ktorá bola zvolená pri spôsobe dopravy danej objednávky zákazníkovi.
- **Users (table)** : v rámci danej tabuľky sme pridali nový stĺpec `temporary`, ktorý značí, že daný user je dočasný a teda v implementácií používame tento stĺpec ako identifikátor dočasného (nezaregistrovaného) používateľa.
- **Products (table) & Images (table)** : v prvotnom riešení fyzického modelu našej databázy sme rátali s tým, že daný údaj o obrázku produktu bude priamo zapísaný v rámci záznamu produktu, avšak počas prípravy praktickej implementácie sme prišli k záveru, že pri vkladaní viacerých obrázkov by dochádzalo často k duplicite údajov. Teda sme odstránili stĺpec `image` a vytvorili ďalšiu tabuľku, ktorá nesie pomenovanie `images`, kde vytvárame dvojice produktu a odkazu na prislúchajúce obrázky daného produktu.
## Návrhové rozhodnutia
Pri navrhovaní systém sme sa rozhodli orientovať sa plne na server-side riešenie, teda chceli sme sa vyhnúť odkladania údajov do úložísk koncových používateľov - rovnako, tak na úkor dátovej záťaže sme nadobudli jednoduchšiu implementáciu. Toto naše rozhodnutie najviac ovplyvnilo manažovanie používateľských účtov a ich ukladanie produktov do virtuálneho nákupného košu.
### Pridané knižnice a rozšírenia
Pre všetky funkcionality sme nepridávali žiadne špecifické knižnice, ktoré by neboli súčasťou základnej stavby Laravelu, avšak v rámci naše databázy sme pridali rozšírenie s názvom - **PG_TRGM**. Toto rozšírenie za nás rieši problematiku vyhľadávania najpríbuznejšieho výstupnému reťazcu znakov na základe špecifického vstupu. Čo patrične zjednodušuje implementáciu vyhľadávania, kde túto funkciu využívame.
### Používatelia
Náš systém rozpoznáva 3 typy používateľov: **registrovaného, neregistrovaného a adamina**. Z tabuľky nižšie vidíme aké základné funkcie aká rola nadobúda. Ako je vyššie avizované všetky dáta, ktoré udržujeme podľa fyzického modelu sú uložené iba v databáze a nie lokálne u jednotlivých používateľoch.

| |Objednávať|Prezerať objednávky|Svojvoľné odhlásenie|Editovať produkty|
|---|---|---|---|---|
| **Neregistrovaný** | ✅ | ❌ | ❌ | ❌ |
| **Registrovaný** | ✅ | ✅ | ✅ | ❌ |
| **Admin** |✅ | ✅ | ✅ | ✅ |

- **Admin** - ide o registrovaného usera, ktorý sa zapíše do systému pomocou nášho registračného formuláru a následne je jeho záznam modifikovaný v stĺpci `admin` na hodnotu true. Túto špecifickú zmenu nevieme vykonať priamo z nášho e-shopu, teda je potrebné, aby správca systému vykonal túto zmenu priamo nad databázou. 
- **Registrovaný** - Registrovaný používateľ vzniká v našom systéme po registrácií cez náš registračný formulár. Tento používateľ má prístup k svojim objednávkam cez profil a všetky jeho údaje sú uchované na dobu neurčitú.
- **Neregistrovaný** - Neregistrovaný používateľ vzniká pri prvom vložení produktu do virtuálneho košu. Vzniká v databáze bez vyplnených údajov a má pridelený jediný údaj `temporary`, ktorí ho špecifikuje. Životnosť nášho dočasného používateľa je ukončená vypršaním časového limitu, kedy sa skontrolujú v databáze všetci používatelia, ktorý majú temporary hodnotu ako true a ak čas od vytvorenia prekročí daný limit, tak sú vymazaný z databázy, avšak ich objednávky sú zachované. Tento úkon by sa dal vykonávať chron-jobom, avšak pre jednoduchosť implementácie mi vykonávame túto kontrolu pri každom štandardnom odhlásení/vypršaní laravel session. 

### Objednávky a košík
Náš systém dovoľuje používateľom mať evidovaných viacero objednávok, avšak v rámci jedného používateľa v jednom čase dovoľuje iba jeden košík. Vytvárame vždy novú inštanciu košíka pri ukončenej predošlej objednávke alebo pri prvotnej interakcií s nákupnými funkciami nášho e-shopu. Pri zhotovení objednávky zaregistrovaným či nezaregistrovaným používateľom vytvárame novú inštanciu celkovej objednávky - zaregistrovaný používatelia nadobúdajú možnosť otvorenia svojho profilu, kde môžu vidieť detail svojich objednávok. Toto zabezpečujeme pomocou funkcií Gates v Laraveli a určujeme rolu pomocou hodnoty zápisu v stĺpci `temporary`, ktorý označuje dočasných (neregistrovaných) používateľov. Ako je aj vyššie písané všetky dáta sú ukladané zo strany systému a používateľ neukladá žiadne dodatočné dáta.

## Programové prostredie


## Implementácia

### Zmena množstva prodkutov

### Prihlásenie

### Vyhľadávanie

### Pridanie produktu do košíka
 
### Stránkovanie

### Filtrovanie