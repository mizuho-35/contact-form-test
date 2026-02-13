# contact-form

## 環境構築
1.dockerのビルド  
    git clone リンク  
    docker compose up -d --build  
※MySQLは、OSによって起動しない場合があるため、それぞれのPCに合わせてdocker-compose.ymlファイルを編集してください  
2.PHPコンテナに移動して、Laravelをインストールする  
    docker compose exec php bash  
    composer -v  
    composer create-project "laravel/laravel=8.*" . --prefer-dist  
    ls 
3..env.exampleファイルから.envを作成し、県境変数を変更  
4.キーを作成  
    php artisan key:generate  
5.マイグレーションの実行  
    php artisan migrate  
6.シーダの実行する  
    php artisan db:seed  


## 使用技術（実行環境）
・nginx:1.21. 80:80  
・php 8.1.34  
・mysql:8.0.35  
• Laravel Framework: 8.83.29  

## ER図
<img width="480" height="410" alt="index drawio" src="https://github.com/user-attachments/assets/65413de3-4b10-482b-ac4b-648c3588c3fb" />

## URL
・開発環境: http://localhost/  
・phpmyadmin: http://localhost:8080/
