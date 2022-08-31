# importApp
Simple App to Import Data From Excel Files , Manubilate and Use it.

### Used Technology ###
* Laravel Framework 
* Mysql
* Redis

## Get started ##
* Clone the Project from the Repo
* After Successfull Cloning  :: Open your terminal to project directory and type folowwing commands to setup enviroment
``` sh
./server closeall
./server
./server bash
```
* Now you are inside PHP Container
## Import Data from Exel to DB ##

You can try importing through command line

``` sh
php artisan import-excel
```
After running Above command you will import Data from added file to project
 * you can import from specific file you want 
 * you need to upload it firstly at main file system driver
 * in my case its in storage/app
 * then you can run following command

``` sh
php artisan import-excel --file_name=YOUR_FILE_NAME
```

## Endpoints ##
* List all uploaded products
``` sh
[GET] localhost:{port}/api/products
```
* Show only one Product
``` sh
[POST] localhost:{port}/api/products
Required Parameters : product_id
```

* upload Excel file and store data in database
``` sh
[POST] localhost:{port}/api/products/import
Required Parameters : file  [type=>file]
```

> **_NOTE:_**  if using POSTMAN You should add accept => application/json at postman headers
> To Display validation errors.