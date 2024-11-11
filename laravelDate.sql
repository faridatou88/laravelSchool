CREATE DATABASE laravelSchool;

USE laravelSchool;

CREATE TABLE IF NOT EXISTS salle (
    idsalle INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(20) NOT NULL,
    numSalle VARCHAR(20) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS student (
    idStudent INT PRIMARY KEY AUTO_INCREMENT,
    studentMat VARCHAR(20) NOT NULL UNIQUE,
    nom VARCHAR(40) NOT NULL,
    prenom VARCHAR(40) NOT NULL,
    datenaiss DATE NOT NULL,
    lieunaiss VARCHAR(30) NOT NULL,
    nationality VARCHAR(35) NOT NULL DEFAULT 'nigerienne',
    adresse VARCHAR(30) NOT NULL,
    numTel VARCHAR(30) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    idsalle INT,
    CONSTRAINT fk_idsalle_students FOREIGN KEY (idsalle) REFERENCES salle(idsalle)
);

CREATE TABLE IF NOT EXISTS teachers (
    idTeacher INT PRIMARY KEY AUTO_INCREMENT,
    teacherMat VARCHAR(20) NOT NULL UNIQUE,
    nom VARCHAR(40) NOT NULL,
    prenom VARCHAR(40) NOT NULL,
    datenaiss DATE NOT NULL,
    genre CHAR(1) NOT NULL DEFAULT '0',
    adresse VARCHAR(30) NOT NULL,
    numTel VARCHAR(30) NOT NULL UNIQUE,
    idsalle INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_idsalle_teacher FOREIGN KEY (idsalle) REFERENCES salle(idsalle)
);

CREATE TABLE IF NOT EXISTS cours (
    idCours INT PRIMARY KEY AUTO_INCREMENT,
    nomCours VARCHAR(50) NOT NULL,
    nbreHeure INT NOT NULL DEFAULT 3,
    idsalle INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_idsalle_cours FOREIGN KEY (idsalle) REFERENCES salle(idsalle)
);
