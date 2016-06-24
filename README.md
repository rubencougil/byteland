[![Build Status](https://travis-ci.org/rubencougil/byteland.svg?branch=master)](https://travis-ci.org/rubencougil/byteland)

![Scrutinizer](https://scrutinizer-ci.com/g/rubencougil/byteland/badges/build.png?b=master)

# README #

It is a simple Hexagonal Architecture example implementation of a REST API
It manages Restaurants, Clients and Reservations.


##Philosophy##

The main objective of the implementation is to separate the business logic from the implementation
itself (framework concerns). The application is separated in Domain (business rules), Infrastructure
(Repositories), Presentation (Silex), and DataSource (data files).

### Installation ###

1. Install Vagrant.
2. Install Ansible.
3. Download the project and run `vagrant up --provision`.
4. Add `192.168.33.99 byteland.dev` to your `hosts` system configuration file.
5. Use an HTTP client (like POSTMAN for Chrome) and start throwing petitions.

### Resources ###

* **Restaurant** (/restaurant/)
* * Allowed methods GET, DELETE, POST
   --> POST parameters `name` (restaurant name) and `max` (restaurant maximum capacity).

* **Client** (/client/)
* * Allowed methods GET, DELETE, POST
   --> POST parameters `name` (client name).

* **Reservation** (/reservation/)
* * Allowed methods GET, DELETE, POST
  --> POST parameters `restaurant` (restaurant name), `client` (client name) and `date` (date of the reservation).


