drawing straws
===
這是一個用於小團康的程式。

Rule
---
1. 活動場地有 n 個用餐區（ n 張桌面）。
2. 前項用餐區數量可依現場人數調整。
3. 參加人員入場後抽籤，依照抽籤結果前往指定桌號。桌長不在此限。
4. 當參加人員將手中的食物食用完畢後，應前往講台重新抽籤，並根據抽籤結果前往新的桌號。桌長不在此限。
5. 前往新的桌號後方可拿取食物。參加人員一次只能拿取一個食物。桌長不在此限。
6. 桌長應停留於指定桌號維持談話熱絡。

Usage
---
### Install
```
git clone 
cd drawing-straws
cp .env.example .env
composer update
php artisan key:generate
```

### Setting database
在`.env`檔案中加入資料庫設定
```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```
```
touch database/database.sqlite	#create sqlite database
php artisan migrate	#inital database
```

### Run server
```
cd public
php -S localhost:8080	#start a server
````

### Use
到 `localhost:8080/options` 設定桌數與桌長，
設定完成即可至 `localhost:8080` 依照團康遊戲規則開始使用。

Formula
---
$$
P_{ab} = \frac{A_b^{-3}}{\sum A_i^{-3} |i \ne a} 
$$

$P_{ab}$：於$a$桌抽到前往$b$桌的機率
$A_i$：$i$桌的人數

