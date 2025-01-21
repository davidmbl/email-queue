### Set up Redis Server

If using Docker, run the following command to start a Redis server:
```bash
docker run -d -p 7000:6379 --name redis redis
```
Update your `.env` file with the following settings:
```ini
REDIS_HOST=127.0.0.1  # or 'host.docker.internal' if using Docker
REDIS_PORT=7000
```
### Run Migrations

To create the necessary database tables, run the following command:
```bash
php artisan migrate
```
### Run the Queue Worker

Start the queue worker to process emails:
```bash
php artisan queue:work
```
### Run the Scheduler

To ensure the email sending job runs every 10 seconds, run the following command:
```bash
php artisan schedule:work
```
### Run the Development Server

Start the server to interact with the app:
```bash
php artisan serve
```
