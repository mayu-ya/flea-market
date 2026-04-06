# flea market

## Dockerビルド

・git clone git@github.com:mayu-ya/flea-market.git

・docker-compose up -d --build

## Laravel環境構築

・docker-compose exec php bash

・composer install

・cp .env.example .env

・.env
DB_CONNECTION=mysql

DB_HOST=mysql

DB_PORT=3306

DB_DATABASE=laravel_db

DB_USERNAME=laravel_user

DB_PASSWORD=laravel_pass

この箇所を変更

・php artisan key:generate

・php artisan migrate

・php artisan db:seed

## 開発環境

・商品一覧:http://localhost/

・ユーザー登録:http://localhost/register

・phpMyadmin:http://localhost:8080

## 使用技術(実行環境)

・PHP:8.1-fpm

・Laravel:8.83.8

・MYSQL:8.0.26

・nginx:1.21.1

## ER図

<img width="703" height="672" alt="2026-03-15 (1)" src="https://github.com/user-attachments/assets/4534138e-d081-403e-a2e5-46eab891d8e5" />