# exerciceGAC

##Installtion
```SHELL
    git clone git@github.com:PsyLogic/exerciceGAC.git
    cd exerciceGac
    composer install
```

### Change DB info
bootstrap.php
```PHP
    $db = new MysqliDb('localhost', 'username', 'password', 'gac');
```

import database
> gac.sql
