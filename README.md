
# Laravel User Management Application

This is a Laravel-based application with a simple UI for managing users. The app integrates backend APIs to list users, enable/disable user accounts, and maintain persistent data. The frontend uses Bootstrap and Axios for an appealing and functional interface.

## Features

* List users with their statuses (enabled/disabled).
* Enable or disable user accounts via buttons.
* RESTful API endpoints for user management.
* Fully containerized setup using Docker and Docker Compose.

---

## Prerequisites

Ensure the following are installed on your system:

* [Docker](https://www.docker.com/)
* [Docker Compose](https://docs.docker.com/compose/)
* [Composer](https://getcomposer.org/)

---

## Installation and Setup

### 1. Clone the Repository

```bash
git clone <repository-url>
cd <repository-folder>
```

### 2. Environment Configuration

Copy the example environment file and adjust it as needed:

```bash
cp .env.example .env
```

Ensure the following database configurations in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=mode
DB_USERNAME=appuser
DB_PASSWORD=password
```

### 3. Build and Start the Application

Use Docker Compose to build and run the containers:

```bash
docker-compose up --build
```

### 4. Run Database Migrations and Seeders

After the containers are running, execute the following commands to set up the database:

```bash
docker-compose exec app php artisan migrate

docker-compose exec app php artisan db:seed
```

---

## API Endpoints

### List Users

**GET** `/users`

* **Description** : Retrieves a list of all users.
* **Response** : JSON array of users with their `id`, `name`, `email`, and `enabled` status.

### Enable User

**POST** `/users/enable/{id}`

* **Description** : Enables a user account.
* **Parameters** :
* `id` (path): ID of the user to enable.
* **Response** : Updated user object in JSON format.

### Disable User

**POST** `/users/disable/{id}`

* **Description** : Disables a user account.
* **Parameters** :
* `id` (path): ID of the user to disable.
* **Response** : Updated user object in JSON format.

---

## Frontend User Interface

### Accessing the UI

The UI is served at: `http://localhost:59000/user-management`

### Features

* Displays a list of users with their statuses.
* Buttons to enable or disable users.
* Alerts for success or error messages during actions.

---

## Development Workflow

### Accessing Containers

* **App Container** :

```bash
  docker exec -it laravel_app bash
```

* **MySQL Container** :

```bash
  docker exec -it laravel_db mysql -u root -p
```

### Running Tests

Run the Laravel tests using:

```bash
docker-compose exec app php artisan test
```

---

## Additional Commands

### Clear and Cache Configurations

If you make changes to `.env`, clear and cache the configurations:

```bash
docker-compose exec app php artisan config:clear

docker-compose exec app php artisan config:cache
```

### Rebuild the Application

To rebuild containers:

```bash
docker-compose down -v
docker-compose up --build
```

---

## Technologies Used

* **Laravel Framework** : Backend API and application logic.
* **Docker** : Containerized application environment.
* **MySQL** : Relational database for persistent storage.
* **Bootstrap** : Frontend styling and responsive design.
* **Axios** : AJAX requests for interacting with APIs.

---

## Future Improvements

* Add user authentication for enhanced security.
* Implement pagination for the user list.
* Enhance UI with animations and better error handling.

---

## License

This project is licensed under the MIT License. See the LICENSE file for details.

# Laravel User Management Application

This is a Laravel-based application with a simple UI for managing users. The app integrates backend APIs to list users, enable/disable user accounts, and maintain persistent data. The frontend uses Bootstrap and Axios for an appealing and functional interface.

## Features

* List users with their statuses (enabled/disabled).
* Enable or disable user accounts via buttons.
* RESTful API endpoints for user management.
* Fully containerized setup using Docker and Docker Compose.

---

## Prerequisites

Ensure the following are installed on your system:

* [Docker](https://www.docker.com/)
* [Docker Compose](https://docs.docker.com/compose/)
* [Composer](https://getcomposer.org/)

---

## Installation and Setup

### 1. Clone the Repository

```bash
git clone <repository-url>
cd <repository-folder>
```

### 2. Environment Configuration

Copy the example environment file and adjust it as needed:

```bash
cp .env.example .env
```

Ensure the following database configurations in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=app
DB_USERNAME=appuser
DB_PASSWORD=apppass
```

### 3. Build and Start the Application

Use Docker Compose to build and run the containers:

```bash
docker-compose up --build
```

### 4. Run Database Migrations and Seeders

After the containers are running, execute the following commands to set up the database:

```bash
docker-compose exec app php artisan migrate

docker-compose exec app php artisan db:seed
```

---

## API Endpoints

### List Users

**GET** `/users`

* **Description** : Retrieves a list of all users.
* **Response** : JSON array of users with their `id`, `name`, `email`, and `enabled` status.

### Enable User

**POST** `/users/enable/{id}`

* **Description** : Enables a user account.
* **Parameters** :
* `id` (path): ID of the user to enable.
* **Response** : Updated user object in JSON format.

### Disable User

**POST** `/users/disable/{id}`

* **Description** : Disables a user account.
* **Parameters** :
* `id` (path): ID of the user to disable.
* **Response** : Updated user object in JSON format.

---

## Frontend User Interface

### Accessing the UI

The UI is served at: `http://localhost:59000/user-management`

### Features

* Displays a list of users with their statuses.
* Buttons to enable or disable users.
* Alerts for success or error messages during actions.

---

## Development Workflow

### Accessing Containers

* **App Container** :

```bash
  docker exec -it laravel_app bash
```

* **MySQL Container** :

```bash
  docker exec -it laravel_db mysql -u root -p
```

### Running Tests

Run the Laravel tests using:

```bash
docker-compose exec app php artisan test
```

---

## Additional Commands

### Clear and Cache Configurations

If you make changes to `.env`, clear and cache the configurations:

```bash
docker-compose exec app php artisan config:clear

docker-compose exec app php artisan config:cache
```

### Rebuild the Application

To rebuild containers:

```bash
docker-compose down -v
docker-compose up --build
```

---

## Technologies Used

* **Laravel Framework** : Backend API and application logic.
* **Docker** : Containerized application environment.
* **MySQL** : Relational database for persistent storage.
* **Bootstrap** : Frontend styling and responsive design.
* **Axios** : AJAX requests for interacting with APIs.

---

## Future Improvements

* Add user authentication for enhanced security.
* Implement pagination for the user list.
* Enhance UI with animations and better error handling.

---

## License

This project is licensed under the MIT License. See the LICENSE file for details.
