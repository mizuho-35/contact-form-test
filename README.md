# アプリケーション名
contact-form

## 環境構築
- Dockerのビルドからマイグレーション、シーディングまでを記述する
1.dockerのビルド
  docker compose up -d --build
2.Laravelインストール
  docker-compose exec php bash
　composer -v
　composer create-project "laravel/laravel=8.*" . --prefer-dist
　ls
3.時間設定の編集
4.マイグレーションファイルの作成
  php artisan make:migration create_contacts_table
  php artisan make:migration categories_table
  php artisan make:migration users_contacts_table
5.マイグレーションの実行
　マイグレーションファイル記入後、実行する
  php artisan migrate
6.シーダファイルの作成
  php artisan make:seeder CategoriesTableSeeder
7.シーディングの実行
  シーダファイル記入後、実行する
  php artisan db:seed


## 使用技術（実行環境）


## ER図


## URL
