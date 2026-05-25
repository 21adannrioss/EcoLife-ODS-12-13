# EcoLife

**Aplicació web de sostenibilitat** per registrar hàbits ecològics, intercanviar objectes i calcular el teu impacte en CO₂ - ODS 12 i 13 de l'ONU.

---

## Índex

1. [Descripció del projecte](#descripció-del-projecte)
2. [Tecnologies utilitzades](#tecnologies-utilitzades)
3. [Estructura del projecte](#estructura-del-projecte)
4. [Base de dades](#base-de-dades)
5. [API REST - Node.js](#api-rest-nodejs)
6. [API REST - PHP](#api-rest-php)
7. [Autenticació JWT](#autenticació-jwt)
8. [Control d'accés per rol](#control-daccés-per-rol)
9. [Funcionalitats](#funcionalitats)
10. [Com iniciar el projecte](#com-iniciar-el-projecte)
11. [ODS treballats](#ods-treballats)

---

## Descripció del projecte

EcoLife és una aplicació web que permet als usuaris:

- Registrar i gestionar **hàbits sostenibles** amb el seu impacte en CO₂
- Publicar i consultar articles al **Mercat d'Intercanvi** (economia circular)
- Calcular la seva **petjada de carboni** anual
- Consultar **estadístiques** de la comunitat
- Accedir amb un sistema de **login/registre** amb autenticació JWT
- Gestionar contingut des d'un **panel d'administració** (rol admin)

---

## Tecnologies utilitzades

| Capa | Tecnologia |
|---|---|
| Servidor PHP | PHP built-in server |
| Servidor JS | Node.js + Express.js |
| Base de dades | SQLite3 |
| Autenticació | JWT amb cookies |
| Frontend | HTML, CSS, JavaScript VANILLA |
| Accés BD (PHP) | SQLite3 natiu |
| Accés BD (Node.js) | better-sqlite3 |

---

## Estructura del projecte

```
EcoLife/
│
├── index.js                        # Servidor Node.js
├── package.json                    # Dependències Node.js
│
├── dataBase/
│   ├── ecoLifeDB.db                # Base de dades SQLite
│   └── dataBaseInit.php            # Crea les taules i insereix dades inicials
│
└── public/
    ├── index.php                   # Pàgina d'inici
    │
    ├── api/
    │   └── mercatApi.php           # API REST del Mercat
    │
    ├── controller/
    │   ├── login.proc.php          # Processa el login i genera el JWT
    │   ├── registre.proc.php       # Processa el registre d'usuari
    │   └── logout.proc.php         # Esborra la cookie del token
    │
    ├── dao/
    │   └── mercatDao.php           # Accés a la BD per als articles
    │
    ├── includes/
    │   ├── db_connect.php          # Connexió a SQLite
    │   ├── auth.php                # Validació del token JWT
    │   ├── nav.php                 # Nav compartida (amb control de rol)
    │   └── footer.html             # Footer compartit
    │
    ├── view/                       # Pàgines de l'aplicació
    │   ├── habits.php              # Protegida: cal login
    │   ├── mercat.php              # Pública (formulari visible amb login)
    │   ├── admin.php               # Protegida: cal rol admin
    │   ├── calculadora.php
    │   ├── estadistiques.php
    │   ├── ods.php
    │   ├── sostenibilitat.php
    │   ├── empresa.php
    │   ├── reptes.php
    │   ├── sobre.php
    │   ├── login.php
    │   └── registre.php
    │
    ├── js/
    │   ├── habits.js               # CRUD hàbits (fetch -> Node.js :3000)
    │   ├── mercat.js               # CRUD articles (fetch -> PHP :8000)
    │   ├── calculadora.js          # Calculadora CO₂
    │   ├── estadistiques.js        # Gràfiques i resum
    │   ├── indexPage.js            # Resum de la comunitat
    │   └── modeFosc.js             # Dark Mode (localStorage)
    │
    └── css/
        └── styles.css              # Estils globals + dark mode
```

---

## Base de dades

Un sol fitxer SQLite (`ecoLifeDB.db`) compartit entre PHP i Node.js. Conté 4 taules:

**`usuaris`** - Usuaris registrats
| Camp | Tipus | Descripció |
|---|---|---|
| usu_nom | TEXT (PK) | Nom d'usuari únic |
| usu_pass | TEXT | Contrasenya en MD5 |
| rol | TEXT | `admin` o `user` |

---

**`habits`** - Hàbits sostenibles
| Camp | Tipus | Descripció |
|---|---|---|
| id | INTEGER (PK) | Identificador |
| nom | TEXT | Nom de l'hàbit |
| categoria | TEXT | transport, residus, energia... |
| co2 | REAL | kg de CO₂ estalviats |
| data | DATE | Data de registre |

---

**`articles`** - Mercat d'intercanvi
| Camp | Tipus | Descripció |
|---|---|---|
| id | INTEGER (PK) | Identificador |
| titol | TEXT | Títol de l'article |
| tipus | TEXT | `intercanvi`, `regal` o `préstec` |
| descripcio | TEXT | Descripció de l'article |
| contacte | TEXT | Informació de contacte |
| data | TEXT | Data de publicació |

---

**`registres`** - Relació usuaris <--> hàbits
| Camp | Tipus | Descripció |
|---|---|---|
| id | INTEGER (PK) | Identificador |
| usu_nom | TEXT (FK) | Referència a usuaris |
| habit_id | INTEGER (FK) | Referència a habits |
| data_registre | TIMESTAMP | Data i hora del registre |

> Les taules es creen automàticament executant `dataBaseInit.php`. Inclou dades inicials de 2 usuaris, 30 hàbits i 10 articles al mercat.

---

## API REST - Node.js

Servidor Express a `http://localhost:3000`. Gestiona el CRUD dels **hàbits**.

| Mètode | Endpoint | Descripció |
|---|---|---|
| GET | `/api/habits` | Retorna tots els hàbits |
| POST | `/api/habits` | Crea un hàbit nou |
| PUT | `/api/habits/:id` | Edita un hàbit existent |
| DELETE | `/api/habits/:id` | Elimina un hàbit |

**Exemple de resposta GET `/api/habits`:**
```json
[
  { "id": 1, "nom": "Anar a l'escola a peu", "categoria": "transport", "co2": 0.9, "data": "2026-03-10" },
  { "id": 2, "nom": "Portar ampolla reutilitzable", "categoria": "residus", "co2": 0.3, "data": "2026-03-12" }
]
```

---

## API REST - PHP

Servida per PHP a `http://localhost:8000`. Gestiona el CRUD dels **articles del Mercat**.

Arquitectura en 3 capes: **API -> DAO -> BD**

| Mètode | Endpoint | Auth | Descripció |
|---|---|---|---|
| GET | `/api/mercatApi.php` | No | Retorna tots els articles |
| POST | `/api/mercatApi.php` | No | Crea un article nou |
| DELETE | `/api/mercatApi.php?id=N` | JWT | Elimina un article |

**Exemple de resposta GET `/api/mercatApi.php`:**
```json
[
  { "id": 1, "titol": "Bicicleta de muntanya", "tipus": "intercanvi", "descripcio": "Bon estat", "contacte": "Pere - 612 345 678", "data": "2026-03-10" }
]
```

---

## Autenticació JWT

El login genera un token JWT que es guarda en una cookie del navegador. El token conté el nom d'usuari, el rol i la data de caducitat (1 hora).

**Flux complet:**

```
Usuari omple el formulari de login
        ↓
login.proc.php comprova usuari i contrasenya a la BD
        ↓
Si és correcte --> genera el token JWT i el guarda en una cookie
        ↓
auth.php valida la cookie en cada pàgina o endpoint protegit
        ↓
Si el token ha caducat --> esborra la cookie i retorna false
```

Els endpoints i pàgines protegides retornen `HTTP 401` o redirigeixen al login si no hi ha token vàlid.

---

## Control d'accés per rol

| Pàgina / Acció | Sense login | Usuari | Admin |
|---|---|---|---|
| Veure hàbits | ❌ Redirigeix al login | ✅ | ✅ |
| Afegir / editar / eliminar hàbits | ❌ | ✅ | ✅ |
| Veure mercat | ✅ | ✅ | ✅ |
| Publicar article al mercat | ❌ Veu avís | ✅ | ✅ |
| Eliminar article del mercat | ❌ | ✅ | ✅ |
| Panel d'administració | ❌ Redirigeix a inici | ❌ Redirigeix a inici | ✅ |
| Gestionar usuaris i articles (admin) | ❌ | ❌ | ✅ |

---

## Funcionalitats

### Hàbits - `habits.php` + `habits.js`
CRUD complet connectat a l'API de Node.js. Permet afegir, editar i eliminar hàbits sostenibles amb categoria i CO₂. Requereix login. Comunicació asíncrona amb `fetch` + `async/await`.

### Mercat d'Intercanvi - `mercat.php` + `mercat.js`
Llista pública d'articles. El formulari de publicar només apareix als usuaris autenticats. Connectat a l'API PHP amb `fetch` + `async/await`.

### Calculadora CO₂ - `calculadora.php` + `calculadora.js`
Calcula l'impacte ambiental anual de l'usuari en funció dels seus hàbits de transport, alimentació i consum.

### Estadístiques - `estadistiques.php` + `estadistiques.js`
Resum visual dels hàbits de la comunitat: total d'hàbits, CO₂ estalviat i gràfica de barres per categories.

### Panel Admin - `admin.php`
Accessible només amb rol `admin`. Mostra i permet gestionar els usuaris registrats, els articles del mercat i els hàbits de la comunitat.

### Mode Fosc - `modeFosc.js`
Toggle de dark mode que aplica la classe `dark` al `body` i guarda la preferència a `localStorage`. En pantalles OLED estalvia fins al 60% d'energia.

### Login i Registre
Sistema complet d'autenticació. El registre xifra la contrasenya en MD5. El login verifica les credencials i emet un JWT vàlid durant 1 hora.

---

## Com iniciar el projecte

### 1. Instal·lar dependències (primera vegada)
```bash
npm install
```

### 2. Iniciar els dos servidors (cada vegada)

**Terminal 1 - Node.js** (API hàbits):
```bash
npm run dev
```

**Terminal 2 - PHP** (pàgines i API mercat):
```bash
php -S localhost:8000 -t public
```

### 3. Obrir el navegador
```
http://localhost:8000
```

### Usuaris de prova
| Usuari | Contrasenya | Rol |
|---|---|---|
| Adan | asd123 | admin |
| Carlos | qwe123 | user |

---

## ODS treballats

### ODS 12 - Consum i producció responsables
El Mercat d'Intercanvi promou l'economia circular: intercanviar, regalar i deixar objectes en lloc de llençar-los o comprar-ne de nous.

### ODS 13 - Acció pel clima
El registre d'hàbits i la calculadora de CO₂ consciencien l'usuari sobre el seu impacte ambiental i el motiven a adoptar comportaments més sostenibles.

---

Projecte desenvolupat per 21adannrioss