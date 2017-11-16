<?php

    namespace Config\Database;

    class DBConfig{
        // nazwa bazy danych
        public static $databaseName = 'bazaogloszen';
        // dane dostępowe do bazy danych
        public static $hostname = 'localhost';
        public static $databaseType = 'mysql';
        public static $port = '3306';
        public static $user = 'root';
        public static $password = '';
        //nazwy tabel
        public static $tableCategory = 'category';
        public static $tableUser = 'user';
        public static $tableClassified = 'classified';

        // CREATE DATABASE mydb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


    }