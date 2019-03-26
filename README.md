# back-end-mentor

# PHP&SQL


## day10 2019-3-26

### Web Security

- XSS(Cross-Site Scripting)
  
    在別人的網頁上執行 JavaScript
    最簡單的：alert(1),` <h1>test</h1>`
    `<img src="123" onerror="alert(1);">`
    `<script>window.location="https://google.com/"</script>`
    只要能執行 JavaScript，就能做任何事(甚至是竊取資料庫)
    1. 竄改頁面
    2. 竄改連結
    3. 偷 Cookie
    解決方法：escape，跳脫
    echo htmlspecialchars($str, ENT_QUOTES, ‘utf-8’)


## day9 2019-3-25

### 實作出可以登入的留言系統

- 切板
- 設計資料庫
- 資料庫操作
- 後端處理
  - 留言
  - 登入&注冊
  - 維持登入狀態（cookie）

## day 8 2019-3-24 
-  to localhost-> phpmyadmin->new database as 'mentor' (encode: utf8_unicode_ci)
- create table as 'users'
- added 'id' and 'username' 

### SQL basic Syntax

- **SELECT** column **FROM** table **WHERE** column=''
	- ex: SELECT * FROM `users` WHERE username='timothy'

- INSERT INTO `users`(`id`, `username`) VALUES ([value-1],[value-2])
	- ex: INSERT INTO `users`(`username`) VALUES ('timothy');

- more -> [https://www.w3schools.com/Php/php_mysql_connect.asp](https://www.w3schools.com/Php/php_mysql_connect.asp)
### LogIn&register system

- learn how to use the basci php syntax to connect with the database (MySQL) 
- 