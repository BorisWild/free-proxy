This app is used to collect real-estate commercials from one of the biggest adv board.
The main purpose is to track total number of offers in different segments of the real-estate market.
And make archive of commercials.

**Development environment**

In the terminal, we'll first have to check if environment variables exist by running:

`echo $UID` and `echo $GID`

If you see values for both, great!
If you don't, you'll need to export them by running the following command:

`export UID=$(id -u) && export GID=$(id -g)`

Then, all you have to do is build and bring up your containers like usual!

`docker-compose up -d --build`

Enter the app container `sudo docker exec -it app bash`.

Then run in app container `composer install` to install PhpUnit and PhpEnv.
These are the only dependencies we need.
Make config `.env`.

Run tests in folder with docker-compose.yml:

`docker-compose exec app ./vendor/bin/phpunit --testdox tests`

for test string parsers, please save html page from target site in `\tests\src\adv.html`

**Deploying**

For production run `composer install --no-dev` and `composer dump-autoload -o`

Upload all files from `parser` folder to your shared hosting and make `.env`.

**Using**

1. First run migrations `app_migrations_run.php`
2. Get user agent from open api `parser_user_agents.php`
3. Then you will need proxies, to collect free proxies use `parser_proxy.php` and `scraper_proxy_html.php`. It will
   save for you a lot of different proxies,
   but you need only anonymous. Run `scraper_proxy_checker.php` to check them. You have to do it regularly (every 30
   minutes) so use CRON.
4. Seed price ranges to collect from `app_seed_price_ranges.php`
5. Then parse price ranges from foreign api to collect total number of commercials and generate links for parsing.
   You will have to do it several times use CRON or try to run script with `noproxy` GET param from
   browser `/scraper_price_ranges.php?noproxy=true` if target site hasn't blocked you yet.
6. Finally, you can run `scraper_pages.php` try not to load it more than once in 3 minutes.
   It will make 150 async requests, parse html and save data to database.
7. To collect json data from foreign api use `scraper_json.php`
