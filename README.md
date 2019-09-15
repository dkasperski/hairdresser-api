**REST API for booking hairdresser**

Installation
------------

* clone project to empty directory
* execute command: "composer install" in project directory
* execute command: "bin/console doctrine:schema:create" in project directory
* execute command: "bin/console doctrine:fixtures:load --append" in project directory

Api testing
------------

* send POST request under url:

/createClient

with body:

{
   "redirect-uri": "hairdressers-api.pl",
   "grant-type": "password"
}

you will receive a similar response to:

{
    "client_id": "1_5dmkqhr73m884wow4g4ccscc8co04cogwogksswgokwoog0cw0",
    "client_secret": "2zo0bznjnco4owcok88040swcg0k8wggkwgkowwwc44sockgok"
}


* send POST request under url:

/oauth/v2/token

with body:

{
   "redirect-uri": "hairdressers-api.pl",
   "grant_type": "password",
   "client_id": "1_5dmkqhr73m884wow4g4ccscc8co04cogwogksswgokwoog0cw0",
   "client_secret": "2zo0bznjnco4owcok88040swcg0k8wggkwgkowwwc44sockgok",
   "username": "test",
   "password": "test"
}

and header:

Content-type: application/json

you will receive a similar response to:

{
  "access_token": "OWJmNjVlYzA5ODdhMzY1NjBkOTA0MGEyZTNmOWNhNWI5ODE4MGQ0M2ZhMTljN2Q5NzIzMjIyZmNmYWFjZGU1OA",
  "expires_in": 86400,
  "token_type": "bearer",
  "scope": null,
  "refresh_token": "ZDBiOTI5NjJmMGY4MDA3NjM5MGYxNGQwMzNkNjM4ZTE5NDM3ZmVhMGI4MWI5ZTZjMTU1ZjQzMGYwMDljNjhhMQ"
}

we should receive the access token that we should send to the API request in headers, as follows

Authorization: Bearer OWJmNjVlYzA5ODdhMzY1NjBkOTA0MGEyZTNmOWNhNWI5ODE4MGQ0M2ZhMTljN2Q5NzIzMjIyZmNmYWFjZGU1OA

Example post action body:

{
  "email": "test@test.pl",
  "phone": 694000000,
  "starts_at": "2019-09-16 8:00",
  "ends_at": "2019-09-16 8:30",
  "hairdresser_id": "3",
  "service_type_id": "3"
}

TO DO
------------

* user registration
* service duration validation
* create query handler
* add swagger
* add needed validations