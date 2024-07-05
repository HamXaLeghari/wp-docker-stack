# WordPress Docker Project Setup Guide

This README provides step-by-step instructions for setting up a WordPress project using Docker CLI and Compose. This project contains multiple Docker containers including WordPress, MariaDB, Apache2, Nginx, and PHP-FPM. Follow these instructions to build and run each container.

## Project Structure

Here's the structure of the project:

```sh
project-root
├── apache2
│ ├── 000-default.conf
│ ├── Dockerfile
│ └── apache2.conf
├── docker-compose.yml
├── mariadb
├── nginx
│ ├── Dockerfile
│ ├── default
│ └── nginx.conf
├── php-fpm
│ ├── Dockerfile
│ ├── php.ini
│ └── www.conf
├── shared.env
└── wordpress
├── Dockerfile
├── latest.tar.gz
└── wp-config.php

```

## Prerequisites

- **Docker**: Ensure Docker is installed and running on your machine. [Install Docker](https://docs.docker.com/engine/install/)
- **Docker CLI**: Familiarity with Docker commands and concepts.

## Step-by-Step Setup (CLI)

### 1. Create Docker Networks

Create Docker networks to facilitate communication between containers:

```sh
docker network create wordpress-net
docker network create public-net
```

### 2. Create Docker Volumes

Create Docker volumes for persistent data storage and configuration sharing:

```sh
docker volume create wordpress_data
docker volume create mariadb_data
docker volume create php_conf
docker volume create nginx_cache
docker volume create apache2_conf
docker volume create nginx_conf
```

### 3. Build Docker Images

From the root of the project directory, run the following commands to build the Docker images:

#### 3.1 Build the WordPress Image

```sh
docker build -t wordpress-image -f wordpress/Dockerfile .
```

#### 3.2 Build the Nginx Image

```sh
docker build -t nginx-image -f nginx/Dockerfile .
```

#### 3.3 Build the Apache2 Image

```sh
docker build -t apache2-image -f apache2/Dockerfile .
```

#### 3.4 Build the PHP-FPM Image

```sh
docker build -t php-fpm-image -f php-fpm/Dockerfile .
```

### 4. Run Docker Containers

Run the following commands from the root of the project directory to start the containers:

#### 4.1 Run the MariaDB Container

```sh
docker run -d --name mariadb \
  --network wordpress-net \
  --env-file ./shared.env \
  -v mariadb_data:/var/lib/mysql \
   mariadb:latest
```
#### 4.2 Run the WordPress Container

```sh
docker run -d --name wordpress \
  --network wordpress-net \
  --env-file ./shared.env \
  -v wordpress_data:/var/www/html \
  wordpress-image
```

#### 4.3 Run the Apache2 Container

```sh
docker run -d --name apache2 \
  --network wordpress-net \
  -v wordpress_data:/var/www/html \
  -v apache2_conf:/etc/apache2 \
  apache2-image
```

#### 4.4 Run the PHP-FPM Container

```sh
docker run -d --name phpfpm \
  --network wordpress-net \
  --network public-net \
  --env-file ./shared.env \
  -v php_conf:/usr/local/etc \
  -v wordpress_data:/var/www/html \
  php-fpm-image
```

#### 4.5 Run the Nginx Container

```sh
docker run -d --name nginx \
  --network public-net \
  --network wordpress-net \
  -p 80:80 \
  -v wordpress_data:/var/www/html \
  -v nginx_conf:/etc/nginx \
  -v nginx_cache:/var/cache/nginx \
  nginx-image
```
## 5. Verify Setup

Ensure all containers are running:

```sh
docker ps
```
Access your WordPress site by navigating to http://localhost in your browser.

## 6. Clean Up
To stop and remove all running containers, use:

```sh
docker stop wordpress mariadb nginx apache2 phpfpm
```
```sh
docker rm wordpress mariadb nginx apache2 phpfpm
```

## Addtional Information

- **Networks:**: Containers are connected via Docker networks to ensure they can communicate. wordpress-net is used for internal communication between WordPress, MariaDB, Apache2, and PHP-FPM, while public-net is used for Nginx to expose ports.

- **Volumes:** Volumes are used to persist data for MariaDB and WordPress and for sharing configuration files between containers.

- **Environment Variables:** Configuration is managed through environment variables loaded from shared.env.


## Docker Compose Setup

In addition to the manual Docker CLI setup, you can use Docker Compose to manage the WordPress project. Docker Compose simplifies the process of defining and running multi-container Docker applications using a single `docker-compose.yml` file. This section provides instructions for setting up and running the project with Docker Compose.

## 1. Installing Docker Compose

#### 1.1 Download the Docker Compose binary:

```sh

sudo curl -L "https://github.com/docker/compose/releases/download/v2.18.1/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
```
#### 1.2 Apply executable permissions to the binary:
```sh
sudo chmod +x /usr/local/bin/docker-compose
```

#### 1.3. Verify the installation:

```sh
docker-compose --version
```

### 2. Start the Application

To start the application using Docker Compose, run the following command from the root of the project directory which has `docker-compose.yml`:

```sh
docker-compose up -d
```
This command starts all the defined services in detached mode. The containers will be named according to the configuration specified in the docker-compose.yml file.

### 3. Verify Setup 

Ensure all containers are running:

```sh
docker-compose ps
```
Access your WordPress site by navigating to http://localhost in your browser

### 4. View Logs

To view logs for a specific service, use:

```sh
docker-compose logs <service_name>
```
Replace `<service_name>` with the name of the service (e.g., `wordpress`, `mariadb`, `nginx`). 

To view logs for all services, use:

```sh
docker-compose logs
```

If you want to follow the logs in real-time, you can add the `-f` flag:

```sh
docker-compose logs -f <service_name>
```

### 5. Clean Up

To stop and remove all containers, networks, and volumes defined in the docker-compose.yml file, use:

```sh
docker-compose down -v
```

This command stops and removes all containers and associated networks and volumes. 

The `-v` flag ensures that volumes are also removed.


## Conclusion
This guide provides instructions for setting up the WordPress project using both Docker CLI and Docker Compose. Docker Compose simplifies the management of multi-container applications and ensures that all services are configured and run together seamlessly.
