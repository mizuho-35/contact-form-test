# contact-form
## 環境構築
### DOckerビルド
1. `git clone git@github.com:mizuho-35/contact-form-test.git`
2. `cd contact-form-test` ←クローンしたフォルダに移動
3. `docker-compose up -d --build`
- MacのM1・M2チップのPCの場合、`no matching manifest for linux/arm64/v8 in the manifest list entries`のメッセージが表示されビルドができない場合があります。 エラーが発生する場合は、docker-compose.ymlファイルの「mysql」内に「platform」の項目を追加して記載してください

```
mysql:
    platform: linux/x86_64
    image: mysql:8.0.26
    environment:
```
4. .env以下の環境変数を追加
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="test@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```
5. アプリケーションキーの作成
```
php artisan key:generate
```
6. マイグレーションファイルの実行
```
php artisan migrate
```
7. シーディングの実行
```
php artisan db:seed
```
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
