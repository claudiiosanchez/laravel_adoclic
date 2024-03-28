1.Clonar el repo con -> git clone

2.Instalar las dependencias con -> composer install

3.Generar las migraciones con -> php artisan migrate
(Si le sale esta pregunta "Would you like to create it?" escriba la "Y" en la consola precione enter)


Para visualizar la api (el comando "php artisan db:seed" corre los seeder correspondientes):

    1.Luego de generar las migraciones debemos poblar las bbdd de entidades y categorias, llamando al seeder con los siguientes comando -> 

    Primero ejecutar:  php artisan migrate:fresh
    Segunda ejecucion: php artisan db:seed
    
    2.Luego debe levantar el server de forma local con el comando "php artisan serve"
    3.Luego en su navegador abra el siguiente link http://localhost:8000/api/Security

Para correr los test :
    
    Primero ejecutar:  php artisan migrate:fresh
    Segunda ejecucion: php artisan db:seed
    Tercera ejecucion: php artisan test    

Resultado ejemplo de los test 

 PASS  Tests\Unit\ApiTest
  ✓ create new model instance --> valida que el servicio que se conceta a la api existe

  ✓ fetch data returns correct structure --> valida que el servicio que se conceta a la api obtenga los datos de la api https://api.publicapis.org/entries
  
  ✓ fetch data returns correct structure and save database --> valida que el servicio que se conceta a la api obtenga los datos de la api https://api.publicapis.org/entries y los guarde correctamente en la bbdd "entities" con el formato que corresponde.
  
  ✓ getrest api by category fetch data returns correct structure --> valida que el servicio que se conceta a la api publica {SITE_URL}/api/{category} tenga el formato correcto de repuesta

  PASS  Tests\Unit\CategoryTest
  
  ✓ create new model instance --> el modelo "Category" existe y se puede instanciar
  
  ✓ save model to database --> el modelo "Category" puede guardar si los datos son correctos
  
  ✓ not save model to database --> el modelo "Category" no guarda si los datos son incorrectos

   PASS  Tests\Unit\EntityTest
  
  ✓ create new model instance --> el modelo "Entity" existe y se puede instanciar
  
  ✓ save model to database --> el modelo "Entity" puede guardar si los datos son correctos
  
  ✓ not save model to database --> el modelo "Entity" no guarda si los datos son incorrectos
  
  Tests:    10 passed (188 assertions)
  Duration: 3.50s