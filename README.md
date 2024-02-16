 

## About vividly

Vividly is a web application which integrates Clipdrop api as a service provider and uses its cleanup and the background remover apis currently but i am planing to impliment all of the apis provided by clipdrop soon:


## Installation and Use

First you need to clone the project oviously .. then run

```bash
  cd vividly
  composer install
  npm install
  php artisan migrate
  cp .env.example .env
  
```

and you would need to add your clipdrop api key there 

```
CLIPDROP_API_KEY = 'your clipdrop api key '
```