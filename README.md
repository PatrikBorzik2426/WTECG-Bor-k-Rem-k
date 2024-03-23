# Projekt z predmetu WTECH 
- [Projekt z predmetu WTECH](#projekt-z-predmetu-wtech)
  - [Téma zadania - všoebecný zámer](#téma-zadania---všoebecný-zámer)
    - [Technologický predpoklad](#technologický-predpoklad)
  - [Dizajn - figma TODO tracker](#dizajn---figma-todo-tracker)
    - [Skice extra large](#skice-extra-large)
    - [Responzivné šablóny](#responzivné-šablóny)
    - [UML class diagram dátového modelu](#uml-class-diagram-dátového-modelu)
  - [Databázová štruktúra](#databázová-štruktúra)
    - [Datatypes](#datatypes)
  - [Implementácia](#implementácia)
    - [Autorizácia](#autorizácia)
- [Responzívne šablóny - frontend](#responzívne-šablóny---frontend)
  - [Rozdelenie](#rozdelenie)

## Téma zadania - všoebecný zámer
Vzájomnou dohodou sme došli k finálnej téme, budeme vytvárať stránku, ktorá bude simulovať e-shop v oblasti predaja elektroniky, presnejšie sa budeme venovať mobilným telefónom. 

Nižšie pod špecifikáciou témy sú technologické predpoklad vyobrazené v jednoduchom prehľade, detailnejšie sa venujem jednotlivým postupom, konfiguráciám a implementáciám v praktickej časti aplikovania softvérového riešenia.

### Technologický predpoklad
- Frontend styling - **Tailwind**
- Backend - **Laravel**
- Docker (Databáza) - **Docker Postgres**

## Dizajn - figma TODO tracker
- [x] Navigačné menu
  - [x] Search bar
- [x] Homepage
- [x] Obchodná časť
  - [x] Kategórie (katalóg)
  - [x] List (page)
  - [x] Single (page) 
- [x] Košík
  - [x] Produkty
  - [x] Doprava
  - [x] Platba
  - [x] Dokončenie
- [x] Regristračný form
- [x] Prihlasovací form
- [x] Použitaľské rozhranie
  - [x] Zákazník
  - [x] Admin

### Skice extra large
V tejto časti by sme si radi zadefinovali všeobecnú štruktúru dizajnu, teda jednotnotný postup, ktorý bude dodržovaný pri dizajnovaní stránky. Používame softvér Figma, kde sme si vytvorili zdieľaný projekt, následne si vytvoríme všeobecnú stránku s elementami a tie budeme používať pri tvorbe celého dizajnu.

- tlačidlá
- navbar
- searchbar

Farebná paleta: https://colors.muz.li/palette/e0f0ea/95adbe/574f7d/503a65/3c2a4d

![Figma šablóny](./Zadanie%201/img/figma/Admin%20screen.jpg)
![Figma šablóny](./Zadanie%201/img/figma/Admin%20screen2.jpg)
![Figma šablóny](./Zadanie%201/img/figma/Cataloge.jpg)
![Figma šablóny](./Zadanie%201/img/figma/FHD%20-%20homepage.jpg)
![Figma šablóny](./Zadanie%201/img/figma/Register.jpg)
![Figma šablóny](./Zadanie%201/img/figma/Shopping%20details.jpg)
![Figma šablóny](./Zadanie%201/img/figma/Shopping.jpg)
![Figma šablóny](./Zadanie%201/img/figma/Sign-in.jpg)
![Figma šablóny](./Zadanie%201/img/figma/Single%20page.jpg)
![Figma šablóny](./Zadanie%201/img/figma/User%20screen.jpg)


### Responzivné šablóny

### UML class diagram dátového modelu
Na vytváranie fyzického modelu používame stránku [dbdiagram](https://dbdiagram.io/d)

![UML Diagram](./Zadanie%201/img/fyzicky_model.svg)

## Databázová štruktúra
Technológia databázového systému použitá pri našom projekte je Postgresql. Na vytvorenie testovaích dát do databázy používame Faker library.
### Datatypes
- **email** - VARCHAR(254), [standard-PATH](https://www.rfc-editor.org/rfc/rfc5321.html#section-4.5.3.1)
- **login** - VARCHAR(64), [standard-LOCAL_PART](https://www.rfc-editor.org/rfc/rfc5321.html#section-4.5.3.1)
- **password** - BYTEA (hash)
- **postal_code** - VARCHAR(11), [standard-UPU](https://www.upu.int/UPU/media/upu/documents/PostCode/General-Addressing-Issues.pdf)
- **home_address** - VARCHAR(175), [standard-UK-catalog](https://webarchive.nationalarchives.gov.uk/ukgwa/+/http://www.cabinetoffice.gov.uk/media/254290/GDS%20Catalogue%20Vol%202.pdf)
- **phone_number** - VARCHAR(15), [standard-E.164](https://en.wikipedia.org/wiki/E.164)
- **name** - VARCHAR(35) [standard-UK-catalog](https://webarchive.nationalarchives.gov.uk/ukgwa/+/http://www.cabinetoffice.gov.uk/media/254290/GDS%20Catalogue%20Vol%202.pdf)
- **surename** - VARCHAR(35) [standard-UK-catalog](https://webarchive.nationalarchives.gov.uk/ukgwa/+/http://www.cabinetoffice.gov.uk/media/254290/GDS%20Catalogue%20Vol%202.pdf)
- **description** - VARCHAR(280) Dĺžka postu pre Twitter
- **product_name** - VARCHAR(70) Meno + Priezvisko štandard
- **parameter_name** - VARCHAR(30) Vychádzajúc z najdlhšieho parametru z Alza.sk
- **parameter_value** - VARCHAR(150) Najdlhší parameter v kategórií telefóny na Alza.sk


## Implementácia

### Autorizácia
Laravel Sanctum

# Responzívne šablóny - frontend
## Rozdelenie
- admin-prduct-detail -> Patrik
- admin -> Patrik
- profile -> Patrik
- create_order -> Filip
- index -> Filip
- login -> Patrik
- registration -> Patrik
- shop -> Patrik
- shopping-cart -> Filip
- single-page -> Filip
- footer -> Patrik
- header -> Patrik