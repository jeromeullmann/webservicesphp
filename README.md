# Status

Opérationnel

# webservices php

test du webservice : https://webservicesphp.herokuapp.com/hello.php

Un exemple de mise en oeuvre de webservice en php pour la gestion d'une table de produit
Utilisation : 
    
    En local : http://localhost/tp2/get_all_products.php
    sur heroku : https://webservicesphp.herokuapp.com/get_all_products.php

## récupération github

$ git clone https://github.com/jeromeullmann/webservicesphp.git

## Deploying

Install the [Heroku Toolbelt](https://toolbelt.heroku.com/).

```sh
$ git clone git@github.com:heroku/webservicesphp # or clone your own fork
$ cd webservicesphp
$ heroku create
$ git push heroku master
$ heroku open
```

## Documentation

For more information about using PHP on Heroku, see these Dev Center articles:

- [PHP on Heroku](https://devcenter.heroku.com/categories/php)

## Création de la base de donnée

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `products` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`pid`, `name`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 'trax', '500.00', 'trax carbone', '2015-12-28 13:54:40', NULL),
(2, 'Bandit 8', '1000.00', 'F-One bandit 10m 2016', '2015-12-28 13:54:40', NULL),
(3, 'Combinaison ion', '300.00', 'Amp Strike 4.5DL', '2015-12-28 13:54:40', NULL),
(8, 'Royaume', '600.00', 'RSC Royaume 13942', '2016-02-16 20:46:45', NULL);


--- END ---
