# contact-form

## 環境構築
1.dockerのビルド
  docker compose up -d --build
2.PHPコンテナに移動して、Laravelをインストールする
  docker compose exec php bash
　composer -v
　composer create-project "laravel/laravel=8.*" . --prefer-dist
　ls
3.時間設定の編集
4.マイグレーションファイルの作成
  php artisan make:migration create_contacts_table
  php artisan make:migration categories_contacts_table
  php artisan make:migration users_contacts_table
5.マイグレーションの実行
　※マイグレーションファイル記入後、実行する
  php artisan migrate
6.シーダファイルの作成
  php artisan make:seeder CategoriesTableSeeder
7.シーディングの実行
  ※シーダファイル記入後、実行する
  php artisan db:seed


## 使用技術（実行環境）
・nginx:1.21. 80:80
・php 8.1.34
・mysql:8.0.35
• Laravel Framework: 8.83.29

## ER図
<img width="461" height="391" alt="index drawio" src="https://github.com/user-attachments/assets/d7ac3ea1-2231-49bd-abb5-ad878fbc4bc5" />


## URL
・開発環境: http://localhost/
・phpmyadmin: http://localhost:8080/
