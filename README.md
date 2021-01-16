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

 Daha sonra ```php migrate/up``` komutunu çalıştırın. Bu komut ile extension içerisinde tanımlanan ve gerekli olan tablolar kullandığınız database içerisinde oluşturulacaktır.
 
 Extension kullanıma hazır. ```.../backend/web/index.php?r=crud/clubs``` uzantısına girerek kulüp bilgilerini, ```.../backend/web/index.php?r=crud/branch``` uzantısına girerek de şube bilgilerini oluşturabilirsiniz.
