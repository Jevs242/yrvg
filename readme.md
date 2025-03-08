# Docker Setup for PHP-Apache Web Application

This README provides instructions on how to build and manage a Docker container for a PHP and Apache web application using the Docker image `yrvg`.

## Prerequisites

Before you begin, ensure you have Docker installed on your machine. If Docker is not installed, follow the installation guide for your specific operating system on the [Docker official website](https://docs.docker.com/get-docker/).

## Build the Docker Image

To build the Docker image for the PHP-Apache web application, navigate to the directory containing the Dockerfile and execute the following command:

```bash
docker build -t yrvg .
```

Run the Container
After building the image, you can run the container using the following command:

```bash
docker run -p 8090:80 --name yrvg yrvg
```
This command starts a container named yrvg using the yrvg image. It maps port 8090 on the host to port 80 in the container, allowing you to access the application via http://localhost:8090.

Stop the Container
To stop the running container, use the following command:

```bash
docker stop yrvg
```
This command will stop the container named yrvg.

Remove the Container
Once the container is stopped, you may want to remove it from your system to clean up. To do this, use the following command:

```bash
docker rm yrvg
```
This command removes the stopped container named yrvg.
