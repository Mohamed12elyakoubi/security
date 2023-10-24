DROP DATABASE IF EXISTS leaky_guest_book1;

CREATE DATABASE leaky_guest_book1;

USE leaky_guest_book1;

CREATE TABLE `entries`
(
    `email` VARCHAR(255) NOT NULL,
    `text`  TEXT         NOT NULL,
    `color` VARCHAR(10)  NOT NULL,
    `admin` int          NULL
);

CREATE TABLE `admin_cookies`
(
    `cookie` VARCHAR(255) NOT NULL
);

INSERT INTO  `admin_cookies`(`cookie`) VALUES ('1');
