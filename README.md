Duwa
====

PHP bibliotek för att skicka brevutskick. 
DUWA.io är ett simpelt REST API som möjliggör skapandet av brevutskick i HTML.

Tillgänglig dokumentation finns på [DUWA.io](https://duwa.io/doc/)

### Installera med Composer 
Om du använder [Composer](https://github.com/composer/composer) för att installera PHP bibliotek, så kan du använda
det för att installera DUWA.io.

```javascript
{
  "require" : {
    "captaindoe/duwa" : "dev-master"
  },
  "autoload": {
    "psr-0": {"Captaindoe": "src/"}
  }
}
```

### Installera från GitHub
DUWA.io kräver PHP `v5.3+` och CURL. Installera biblioteket från Github:

```bash
$ git clone https://github.com/captaindoe/Duwa.git
```

Och inkludera det i dina filer:

```bash
require_once '/katalogstruktur/till/Duwa/src/Captaindoe/Duwa.php';
```
