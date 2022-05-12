# PPLogParsing
## Tool目的 
將profiling後dump出來的log pasing出來後，計算平均時間以及最大最小值時間並印出

## Server端
查詢server端IP
#ipconfig
![image](https://user-images.githubusercontent.com/10304041/168102044-70965060-f629-4d5e-b86a-063a054d0931.png)

開啟MAMP並把code放在相應路徑
![image](https://user-images.githubusercontent.com/10304041/168102194-8163c311-fe89-48dd-b357-f5c1fe3c2196.png)

注意設置的port number
![image](https://user-images.githubusercontent.com/10304041/168102385-a6f0aeb8-5fcb-4d99-bc07-a73339b35ecf.png)

## Client端
* 根據ip key入網址，例如 http://192.168.37.59:8888/PPLogParsing/profiling.php
* 注意不能https
看到頁面如下
![image](https://user-images.githubusercontent.com/10304041/168102525-4fc8183c-6ae4-4e46-92e9-3703f19280d4.png)

選擇alPP library dump下來的log後按提交
![image](https://user-images.githubusercontent.com/10304041/168102632-8afbee8f-4666-44aa-8e93-b8820dbeeabe.png)

會將資料庫裡有存在的資料，到log裡的parsing並印出平均時間，最大時間，最小時間
![image](https://user-images.githubusercontent.com/10304041/168102725-02de3a0f-19d2-48d9-a2b5-0e47583a0680.png)

## 後台
點選後台編輯要parsing的function關鍵字
![image](https://user-images.githubusercontent.com/10304041/168102860-568cd928-d912-4d6f-bf1d-eed93398a722.png)

*新增*
輸入函式名稱以及step，後續的顯示會依照step升序排序
![image](https://user-images.githubusercontent.com/10304041/168102951-b20c3443-4a70-419d-b33a-74f99113c8a9.png)

*修改*
點擊修改修改名稱跟step
![image](https://user-images.githubusercontent.com/10304041/168103106-b7a47165-9cee-400b-9f64-b266ab209783.png)

*刪除*
將資料刪掉
![image](https://user-images.githubusercontent.com/10304041/168103214-3ff237fc-9969-409a-bf99-488c9c828a88.png)


