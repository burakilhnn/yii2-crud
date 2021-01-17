# Yii2 Crud extension

Bu extension, spor kulüplerini ve bu kulüplere ait şubeleri(basketbol,hentbol,futbol vb.) tutabilmenize olanak sağlar.

Kurulum
------------

Bu uzantıyı yüklerken tercih edilen yol composer ile yüklemektir. [composer](http://getcomposer.org/download/).

 Sonrasında proje dosyanızın içerisinde konsolda

```
composer require burakilhnn/yii2-crud "dev-develop"

veya

composer require burakilhnn/yii2-crud "dev-main"
```

komutunu çalıştırarak extensionu indirin. Extension, proje dosyanızın altındaki vendor dosyası içerisinde burakilhnn adıyla bulunacaktır.


Kullanım
----

Advanced projenizin ```backend/config/main.php``` veya ```frontend/config/main.php``` kısmına gelerek aşağıdaki gibi extensionu projenize ekleyin.
```
'modules' => [
        'crud' => [
            'class' => 'burakilhnn\crud\Sports',
        ],
    ],
 ```

 Daha sonra ```php yii migrate/up``` komutunu çalıştırın. Bu komut ile extension içerisinde tanımlanan ve gerekli olan tablolar kullandığınız database içerisinde oluşturulacaktır.
 
 Extension kullanıma hazır. ```.../backend/web/index.php?r=crud/clubs``` sayfasına girerek create clubs butonuna tıklayıp kulüp bilgilerini, ```.../backend/web/index.php?r=crud/branch``` sayfasına girerek create branch butonuna tıklayıp şube bilgilerini oluşturabilirsiniz.
 
 NOT : Clubs ve Branches arasında ilişki vardır. Dolayısıyla bir kulüp oluşturmadan o kulübün herhangi bir şubesini oluşturamazsınız.
 
 ```.../backend/web/index.php?r=crud/clubs``` örneği: ![clubs](https://user-images.githubusercontent.com/58756954/104828203-b7076600-5877-11eb-8567-a3890d09f609.png)
 ```.../backend/web/index.php?r=crud/branch``` örneği: ![branch](https://user-images.githubusercontent.com/58756954/104828217-dacaac00-5877-11eb-906c-0625b82ec812.png)

