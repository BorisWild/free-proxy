**Development environment**

In the terminal, we'll first have to check if environment variables exist by running:

`echo $UID` and `echo $GID`

If you see values for both, great!
If you don't, you'll need to export them by running the following command:

`export UID=$(id -u) && export GID=$(id -g)`

Then, all you have to do is build and bring up your containers like usual!

`docker-compose up -d --build`

Enter the app container `sudo docker exec -it app bash`.

Then run in laravel container `composer install`.
Make `.env`.

[http://localhost:8000/](http://localhost:8000/)
