# Yii2 Crud extension

Bu extension, spor kulüplerini ve bu kulüplere ait şubeleri(basketbol,hentbol,futbol vb.) tutabilmenize olanak sağlar. 4 kısımdan oluşur: models,views,controllers,migrations. Controllers, gelen talepleri işlemek ve yanıtlar oluşturmaktan sorumludur olan kısımdır. Kullanıcının talebinden sonra, talep verilerini analiz eder, bunları modele aktarır, ardından model sonucunu bir view'a ekler ve bir yanıt oluşturur. Models verilerin yönetilmesinden sorumlu kısımdır, viewdan gelen taleplere yanıt verir. Views verilerin kullanıcıya sunulmasından sorumlu kısımdır, yalnızca HTML ve PHP kodu içeren PHP betik dosyalarıdır. Migrations ise veritabanı tablolarını oluşturduğumuz kısımdır.

Kurulum
------------

Bu uzantıyı yüklerken tercih edilen yol composer ile yüklemektir. [composer](http://getcomposer.org/download/).

 Sonrasında proje dosyanızın kök dizininde ("/var/www/domain" gibi) konsolda

```
composer require burakilhnn/yii2-crud "dev-develop"

veya

composer require burakilhnn/yii2-crud "dev-main"
```

komutunu çalıştırarak extensionu indirin. Extension, proje dosyanızın altındaki vendor dosyası içerisinde burakilhnn adıyla bulunacaktır.


Advanced projenizin ```backend/config/main.php``` veya ```frontend/config/main.php``` kısmına gelerek aşağıdaki şekilde extensionu projenize ekleyin.
```
'modules' => [
        'crud' => [
            'class' => 'burakilhnn\crud\Sports',
        ],
    ],
 ```
  Daha sonra yine proje dosyanızın kök dizininde ```php yii migrate/up --migrationPath=@vendor/burakilhnn/yii2-crud/src/migrations``` komutunu konsolda çalıştırın. Migrationu bulamama gibi bir durum oluşması durumunda 2. seçenek olarak ``` vendor/burakilhnn/yii2-crud/src/migrations ``` içerisindeki dosyayı advanced projenizin ``` console/migrations ``` kısmına taşıyabilir ve proje kök dizininde konsolda ```php yii migrate/up``` komutunu çalıştırabilirsiniz. Bu komut ile extension içerisinde tanımlanan ve gerekli olan tablolar, kullandığınız database içerisinde oluşturulacaktır. ``` projeadı/phpmyadmin ``` uzantısından databasenizi görebilirsiniz. Advanced projenizin ``` common/config/main-local.php ``` kısmında database bilgileriniz bulunmaktadır. Buradan ```'dsn' => 'mysql:host=localhost;dbname=yii2advanced' ``` satırındaki dbname kısmını değiştirerek kullanmak istediğiniz veritabanını değiştirebilirsiniz. Burada bulunan username ve password bilgileriyle phpmyadmin üzerinden veritabanlarınızı ve tablolarınızı görebilirsiniz. Extension ile gelecek migration dosyası ile oluşturulacak tabloların ilişkisi şu şekildedir :  
  ![data](https://user-images.githubusercontent.com/58756954/104859697-1e84ea80-5938-11eb-94af-5e43529a93bf.png)

  Bu adımlardan sonra extension kullanıma hazır olacaktır. ```.../backend/web/index.php?r=crud/clubs``` sayfasına girerek create clubs butonuna tıklayıp kulüp bilgilerini, ```.../backend/web/index.php?r=crud/branch``` sayfasına girerek create branch butonuna tıklayıp şube bilgilerini oluşturabilirsiniz.
 
 
 Kullanım
----
 Extension kurulumundan sonra kulüp ve şube eklemek için karşılaşacağınız sayfaların örnekleri aşağıdaki gibidir.
 
 ```.../backend/web/index.php?r=crud/clubs``` örneği: ![clubs](https://user-images.githubusercontent.com/58756954/104828203-b7076600-5877-11eb-8567-a3890d09f609.png)
 ```.../backend/web/index.php?r=crud/branch``` örneği: ![branch](https://user-images.githubusercontent.com/58756954/104828217-dacaac00-5877-11eb-906c-0625b82ec812.png)
 
 Yeni kulüp oluşturmak için ```.../backend/web/index.php?r=crud/clubs``` sayfasında Create Clubs butonuna tıklayın. Karşınıza aşağıdaki sayfa gelecektir.
 
 ![create_clubs](https://user-images.githubusercontent.com/58756954/104854643-f934b400-5918-11eb-8525-5ea5f92361f4.png)
 
 Burada kulübün adı,emaili,adresi ve ülkesinin girilmesi gereklidir. Created At kısmına ise bu kayıtı gerçekleştirdiğiniz zamanı YIL-AY-GÜN, SAAT:DAKİKA:SANİYE olarak girmeniz beklenmektedir. Kulüp oluşturabilmek için bu alanlar boş bırakılamaz. Bunu değiştirmek için vendor altındaki ``` burakilhnn/yii2-crud/src/models ``` altındaki Clubs.php dosyasını açın, aşağıdaki fotoğrafta görüldüğü gibi rules fonksiyonu altında required kısmı bulunmaktadır. Buradan kayıt esnasında girilmesinin zorunlu olmasını istemediğiniz özellikleri ayarlayabilirsiniz. 
 
 ![rules](https://user-images.githubusercontent.com/58756954/104854951-bffd4380-591a-11eb-8a0c-b4b9aacdddeb.png)
 
 Yeni bir şube/branş oluşturmak için ise ```.../backend/web/index.php?r=crud/branch``` sayfasında Create Branch butonuna tıklayın. Karşınıza aşağıdaki sayfa gelecektir.
  
 ![create_branch](https://user-images.githubusercontent.com/58756954/104854655-0baeed80-5919-11eb-945a-bdd81a1170cc.png)
 
 Burada şubesi oluşturulacak kulübün adı, şubenin adı,adresi ve statüsü(aktif veya inaktif) girilmesi gereklidir. Created At kısmına ise bu kayıtı gerçekleştirdiğiniz zamanı YIL-AY-GÜN, SAAT:DAKİKA:SANİYE olarak girmeniz beklenmektedir. Şube oluşturabilmek için bu alanlar boş bırakılamaz. Club ID kısmında daha önce oluşturduğunuz takımların isimleri bir dropdown list içerisinde gelecektir. Kulüp ve Şube arasında bir ilişki olduğu için oluşturmadığınız bir kulübün şubesini oluşturamazsınız. Diğer girilmesi zorunlu özellikleri değiştirmek için ``` burakilhnn/yii2-crud/src/models ``` altındaki Branch.php dosyasını açın, aşağıdaki fotoğrafta görüldüğü gibi rules fonksiyonu altında required kısmı bulunmaktadır. Buradan kayıt esnasında girilmesinin zorunlu olmasını istemediğiniz özellikleri ayarlayabilirsiniz. 
 
 ![branch_rules](https://user-images.githubusercontent.com/58756954/104855227-98a77600-591c-11eb-8743-2ea4d899bdbf.png)
 
 Son olarak clubs ve branch sayfalarında girilen verilerden gözükmesini istemediğiniz bir veri olması durumunda ``` burakilhnn/yii2-crud/src/views ``` altındaki clubs (veya branch, hangisi ile işlem yapmak istiyorsanız) içerisinde bulunan index.php dosyasını açın. GridView'in columns kısmında istediğiniz özelliği silerek veya yorum satırı haline getirerek bunu ayarlayabilirsiniz. ``` burakilhnn/yii2-crud/src/views ``` altındaki clubs kısmı ```.../backend/web/index.php?r=crud/clubs``` sayfasındaki görünümlerden, branch kısmı ise ```.../backend/web/index.php?r=crud/branch``` sayfasındaki görünümlerden sorumludur.

![view](https://user-images.githubusercontent.com/58756954/104859803-cbf7fe00-5938-11eb-967a-ad1780fb12c5.png)
