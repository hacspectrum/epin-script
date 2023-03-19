<?php 
    require view("static/header");
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="shadow-sm bg-white my-3 p-3">
                <h1 class="h3"> <i class="ion ion-person-stalker"></i> Kayıt Ol</h1>
                <hr>
                <form action="javascript:;" method="post" id="registerForm">
                    <input type="hidden" value="true" name="register">
                    <div id="registerResponseArea"></div>
                    <div class="form-group">
                        <label class="font-weight-bold mb-0"><small>Adı Soyadı</small></label>
                        <input class="form-control" placeholder="Adı Soyadı" name="adsoyad" required type="text" minlength="5">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold mb-0"><small>E-Posta Adresi</small></label>
                        <input class="form-control" placeholder="E-Posta Adresi" name="email" required type="email" minlength="5">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold mb-0"><small>Şifre</small></label>
                        <input class="form-control" name="password" placeholder="Şifre" required type="password" minlength="6" maxlength="10">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold mb-0"><small>Şifre Tekrar</small></label>
                        <input class="form-control" name="password_r" placeholder="Şifre Tekrar" required type="password" minlength="6" maxlength="10">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold mb-0"><small>TC Kimlik Numarası</small></label>
                        <input class="form-control" name="tc" placeholder="TC Kimlik Numarası" required type="text" minlength="11" maxlength="11">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold mb-0"><small>Telefon Numarası</small></label>
                        <input class="form-control phone-mask" name="phone_number" placeholder="Telefon Numarası" required type="text" minlength="10">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="sozlesme" value="1"> <a href="javascript:void(0)" class="text-secondary text-underline" data-toggle="modal" data-target="#uyelikSozlesmesi">Üyelik Sözleşmesi</a>'ni okudum, onaylıyorum.
                        <div class="fade modal" id="uyelikSozlesmesi" aria-hidden="true" aria-labelledby="uyelikSozlesmesi" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="primary-gradient modal-header">
                                        <h5 class="modal-title">Üyelik Sözleşmesi</h5>
                                        <button class="close" type="button" aria-label="Kapat" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <p><small>Firma Adı bünyesindeki kişisel veriler, Firma Adı'in güvencesi altındadır. Firma Adı olarak, 6698 sayılı Kişisel Verilerin Korunması Kanunu (“Kanun”) ve ilgili mevzuat uyarınca, kişisel verilerin güvenli şekilde saklanmasını, hukuka uygun olarak işlenmesini sağlamak için gerekli teknik ve idari önlemleri almaktayız.
                                        <br><br>
Bu doğrultuda, Kanun uyarınca kişisel verilerinizin işlenmesi, muhafaza edilmesi ve aktarılması kapsamında sizleri bilgilendirmek amacıyla iş bu Kanun ve ilgili mevzuat kapsamında Aydınlatma Metni düzenlenmiştir.
<br><br>
1. Kişisel Verilerin Hangi Amaçla İşlenebileceği
<br><br>
Kişisel verileriniz, Kanun’a uygun olarak, Firma Adı tarafından sağlanan hizmet ve Firma Adı'in ticari faaliyetlerine bağlı olarak değişkenlik gösterebilmekle birlikte; otomatik ya da otomatik olmayan yollarla, Firma Adı birimleri ve ofisleri, internet sitesi, sosyal medya mecraları, mobil uygulamalar ve benzeri vasıtalarla sözlü, yazılı ya da elektronik olarak toplanabilecektir. Çağrı merkezlerimizi veya internet sayfamızı kullandığınızda veya internet sitemizi, sosyal medya mecralarını ziyaret ettiğinizde, kişisel verileriniz oluşturularak ve güncellenerek işlenebilecektir.
<br><br>
Kişisel veriler, Kanun’un 5. ve 6. Maddelerinde belirtilen şartlara ve ilgili tüm mevzuata uygun olarak, Firma Adı tarafından;
<br><br>
Yasal düzenlemelerin gerektirdiği veya zorunlu kıldığı şekilde hukuki yükümlülüklerimizin yerine getirilmesini sağlamak,<br>
Operasyonel faaliyetlerinin yerine getirilmesi için yazılım hizmetleri ve diğer dış kaynak hizmetlerinin sağlanması,<br>
Firma Adı ana sözleşmelerinde belirtilen ticari faaliyetlerin mevzuata ve ilgili şirket politikalarına uygun olarak yerine getirilmesi için ilgili birimler tarafından gerekli çalışmaların yapılması ve bu doğrultuda faaliyetlerin yürütülmesi,<br>
Firma Adı'in kısa, orta, uzun vadeli ticari politikalarının tespiti, planlanması ve uygulanması,<br>
Etkin bir müşteri hizmetinin sunulabilmesi,<br>
Hizmet ve tekliflerin sunulması,<br>
Her türlü promosyon, kampanya, çekilişler hakkında bilgi verilmesi,<br>
Her türlü pazarlama ve reklam faaliyetlerinin yürütülebilmesi,<br>
Ziyaretçi profillerinin belirlenebilmesi,<br>
Firma Adı'in ticari güvenilirliğinin sağlanabilmesi,<br>
İstek, talep ve şikayetlerin cevaplanarak çözümlenmesinin sağlanması,<br>
Sözleşme kapsamında ve hizmet standartları çerçevesinde Müşteri’lere ve Ziyaretçiler’e destek hizmetinin sağlanması,<br>
Pazar araştırmaları ve istatistiksel çalışmalar yapılabilmesi,<br>
Firma Adı ile iş ilişkisi içinde bulunan kişiler ile irtibat sağlanması,<br>
Pazarlama, uyum yönetimi, satıcı/tedarikçi yönetimi,<br>
Bilgi güvenliği süreçlerinin planlanması, denetimi ve icrası,<br>
Bilgi teknolojileri alt yapısının oluşturulması ve yönetilmesi,<br>
Çalışanların Veri Sahibi bilgilerine erişim yetkilerinin planlanması ve icrası,<br>
Faturalandırma da dahil, finans ve/veya muhasebe işlemlerinin takibi,<br>
Hukuk işlerinin takibi,<br>
Kurumsal iletişim faaliyetlerinin planlanması ve icrası,<br>
Verilerin doğru ve güncel olmasının sağlanması amacıyla işlenebilecektir.
<br><br>
2. Kişisel Verilerin Aktarılması ve Aktarım Amaçları
<br><br>
Kişisel verileriniz; Kanun tarafından öngörülen temel ilkelere uygun olarak ve Kanun’un 8. ve 9. maddelerinde belirtilen kişisel veri işleme şartları ve amaçlarına uygun olarak, Firma Adı'in meşru ve hukuka uygun kişisel veri işleme amaçları doğrultusunda, Firma Adı tarafından aşağıda yer alan amaçlarla;
<br><br>
Kısa, orta ve uzun vadede ticari ve iş stratejilerini belirlenmesi, planlanması ve uygulanması
İş ilişkisi içerisinde olunan kişilerin hukuki ve ticari güvenliğinin temini Firma Adı tarafından yürütülen iletişime yönelik idari operasyonlar, Firma Adı’ne ait lokasyonların fiziksel güvenliğini ve denetimini sağlamak, iş ortağı/müşteri/tedarikçi (yetkili veya çalışanları) değerlendirme süreçleri, itibar araştırma süreçleri, hukuki uyum süreci, denetim, mali işler vb.),
İnsan kaynakları politikalarının yürütülmesi temini amaçlarıyla Firma Adı yetkililerine, iş ortaklarımıza, tedarikçilerimize, hissedarlarımıza, kanunen yetkili kurum ve kuruluşlara aktarılabilecektir.
Kişisel verilerinizin Firma Adı tarafından aktarılması konusunda detaylı bilgilere, http://Uyegram.com/ internet adresinden ulaşabileceğiniz “Firma Adı Kişisel Verilerin Korunması ve İşlenmesi Prosedürü'nde yer verilmiştir.
<br><br>
3. Yurtdışına Aktarım
<br><br>
Kanun’un 9. Maddesi uyarınca, Firma Adı'in meşru ve hukuka uygun kişisel veri işleme amaçları doğrultusunda kişisel verileriniz, Firma Adı tarafından sunulan ürün ve hizmetlerden sizleri faydalandırmak için gerekli çalışmaların iş birimlerimiz tarafından yapılması, Firma Adı'in, Firma Adı ile iş ilişkisi içerisinde olan kişilerin hukuki ve ticari güvenliğinin temini (Şirketimiz tarafından yürütülen iletişime yönelik idari operasyonlar, Firma Adı’ne ait lokasyonların fiziksel güvenliğini ve denetimini sağlamak, iş ortağı/müşteri/tedarikçi (yetkili veya çalışanları) değerlendirme süreçleri, itibar araştırma süreçleri, hukuki uyum süreci, denetim, mali işler v.b.), Firma Adı'in ticari ve iş stratejilerinin belirlenmesi ve uygulanması ile Firma Adı'in insan kaynakları politikalarının yürütülmesinin temini amaçlarıyla, açık rızanız var ise veya, açık rızanız olmamasına rağmen, Kanun’da düzenlenen hükümler çerçevesinde, Yeterli korumaya sahip veya yeterli korumayı taahhüt eden veri sorumlusunun bulunduğu yabancı ülkelere aktarabilecektir:
<br><br>
4. Kişisel Verilerin Toplanma Yöntemi Ve Hukuki Sebebi
<br><br>
Kişisel verileriniz, hukuki yükümlülüklerin gerektirdiği süreyle ya da ilgili mevzuatta izin verilen süreyle mevzuata uygun koşullarda saklanmaktadır. Kişisel verileriniz Kanun’un 5. ve 6. maddelerinde belirtilen kişisel veri işlenme şartları ve amaçları kapsamında bu metnin 1. ve 2. maddelerinde belirtilen amaçlarla toplanabilecek, işlenebilecek, aktarılabilecek ve saklanabilecektir.
<br><br>
Kişisel verileriniz, Firma Adı tarafından farklı yollardan (Firma Adı merkezi, şubeleri, acenteleri, satış ofisleri veya diğer alt yüklenicileri veya iş ortakları ile iletişime geçebileceğiniz ofis ve diğer fiziki ortamlar, çağrı merkezleri, internet siteleri, mobil uygulamalar ve benzeri elektronik işlem platformları, sosyal medya veya diğer kamuya açık mecralar aracılığıyla, düzenleyecekleri eğitim, seminer ve benzeri ortamlara katılmanızla, tahkikat yöntemiyle veya diğer grup şirketleri veya anlaşmalı oldukları diğer kişi ve kuruluşlar kanalıyla sözlü, yazılı, ses veya görüntü kaydı veya diğer fiziksel veya elektronik ortamda vb. ) elde edilebilir.
<br><br>
Firma Adı bünyesindeki şirketlerin faaliyetlerinin, Firma Adı ilke, hedef ve stratejilerine uygun olarak yürütülmesi, Firma Adı'in hak ve menfaatleri ile itibarının korunması amacıyla, Firma Adı bünyesindeki şirketlerden biri tarafından toplanan ve işlenmekte olan kişisel veriler, yine Firma Adı bünyesindeki diğer şirketlere aktarılabilir ve bu şirketler tarafından da işlenebilir.
<br><br>
5. Kişisel Veri Sahibi Olarak Kanun’un 11. Maddesinde Sayılan Haklarınız
<br><br>
Kişisel veri sahipleri olarak, haklarınıza ilişkin taleplerinizi, aşağıda düzenlenen yöntemlerle Firma Adı’ne iletmeniz durumunda, Firma Adı talebinizi niteliğine göre en kısa sürede ve en geç 30 (otuz) gün içinde ücretsiz olarak sonuçlandıracaktır. Ancak, Kişisel Verileri Koruma Kurulunca bir ücret öngörülmesi halinde, belirlenen tarifedeki ücret alınabilir.
<br><br>
Bu kapsamda kişisel veri sahipleri, Firma Adı’ne başvurarak aşağıdaki haklarını kullanabilir:
<br><br>
Firma Adı'in veri sahibinin kişisel verilerini işleyip işlemediğini öğrenme,<br>
Eğer Firma Adı nezdinde kişisel veriler işleniyorsa, bu veri işleme faaliyeti hakkında bilgi talep etme,<br>
Eğer Firma Adı nezdinde kişisel veriler işleniyorsa, kişisel veri işleme faaliyetinin amacını ve işlenme amacına uygun kullanılıp kullanmadığını öğrenme,<br>
Eğer kişisel veriler yurtiçinde veya yurtdışında üçüncü kişilere aktarılıyorsa, bu üçüncü kişiler hakkında bilgi talep etme,<br>
Kişisel verilerin eksik veya yanlış işlenmiş olması halinde, bunların düzeltilmesini talep etme,<br>
Kişisel verilerin Firma Adı nezdinde eksik veya yanlış işlenmiş olması halinde, kişisel verilerin aktarıldığı üçüncü kişilere bu durumun bildirilmesini talep etme,<br>
Kişisel verilerin Kanun ve ilgili diğer kanun hükümlerine uygun olarak işlenmiş olmasına rağmen, işlenmesini gerektiren sebeplerin ortadan kalkması hâlinde kişisel verilerin silinmesini, yok edilmesini veya anonim hale getirilmesini isteme,<br>
Kişisel verilerin işlenmesini gerektiren sebepler ortadan kalktıysa, bu durumun kişisel verilerin aktarıldığı üçüncü kişilere bildirilmesini talep etme,<br>
Firma Adı tarafından işlenen kişisel verilerin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi ve bu analiz neticesinde ilgili kişinin aleyhine bir sonuç doğduğunu düşündüğü sonuçların ortaya çıkması halinde, bu sonuca itiraz etme,<br>
Kişisel verilerin kanuna aykırı olarak işlenmesi sebebiyle zarara uğranması halinde zararın giderilmesini talep etme.<br>
Kanun’un 13(f.1) maddesi gereğince, yukarıda belirtilen haklarınızı kullanmak ile ilgili talebinizi, yazılı olarak veya Kişisel Verileri Koruma Kurulu’nun belirlediği diğer yöntemlerle Firma Adı’ne iletebilirsiniz. Bu çerçevede Firma Adı’ne Kanun’un 11. Maddesi kapsamında yapacağınız başvurularda yazılı olarak başvurunuzu ileteceğiniz kanallar ve usuller aşağıda açıklanmaktadır.<br>
<br><br>
Kanun’un 11. maddesinde belirtilen haklardan kullanmayı talep ettiğiniz hakkınıza yönelik açıklamalarınızı içeren talebinizi, kimliğinizi tespit edici belgeler ile birlikte, http://Uyegram.com/ adresindeki 6698 Sayılı Kişisel Verilerin Korunması Kanunu Kapsamında Kişisel Veri Sahibi Başvuru Formu’nu eksiksiz olarak doldurarak;<br>
<br><br>
Islak imzalı bir nüshasını “Kuruçeşme Mah. Fidan Çıkmazı Sk.N.14 Beşiktaş, İstanbul” adresine şahsen elden teslim edebilir,<br>
noter vasıtasıyla veya iadeli taahhütlü posta yoluyla yukarıdaki adresimize gönderebilir,<br>
Güvenli Elektronik imza ile imzalayarak veya müşteriye ait Uyegram'da kayıtlı e-posta ile info@Uyegram.com adresine iletebilir, ya da Kayıtlı Elektronik Posta (KEP) hesabınızdan, KEP adresine Uyegram.elektronik@hs02.kep.tr güvenli elektronik imzalı olarak iletebilirsiniz.
<br><br>
6. Değişiklikler <br><br>

Firma Adı’nun, Kişisel Verilerin Korunması Kanunu’nda olabilecek değişiklikler ve Kişisel Verileri Koruma Kurulu tarafından belirlenecek yöntemler nedeni ile bu aydınlatma bildiriminde değişiklik yapma hakkı saklıdır.</small></p>
                                    
                                    </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-secondary btn-block" id="registerBtn" type="submit">Üyeliğimi Oluştur</button>
                    </div>
                    <p class="font-size-dot7rem">
                        <strong>Dikkat:</strong> TC Kimlik Girme Zorunluluğu 27 Haziran 2013’te yürürlüğe giren 6493 sayılı kanun kapsamında ödeme güvenliği sağlamak amacıyla alınmaktadır. Bu bilgiler hiçbir şekilde herhangi bir kurum/kuruluş ya da 3.şahıslar ile paylaşılmamaktadır.
                    </p>
                </form>
            </div>
        </div>
        <div class="col-lg-6 d-lg-block d-none">
            <div class="h-100 p-3">
            <div class="mt-4">
                <div class="text-center">
                    <div class="bg-white shadow">
                            <img class="d-inline-block" class="img-fluid" alt="Aramıza Katılın" src="<?=asset_url("img/team.png")?>" style="margin-top:-1.5rem;" width="156">
                    </div>
                    <h4 class="mt-4 gradient-text-1 h2 text-uppercase">Hemen şimdi aramıza katıl</h4>
                    <p>
                        <small>Şimdi aramıza katılmak için üyeliğini oluştur.</small>
                        <br>
                        <br>
                        Zaten üye misin? <a href="javascript:;" data-toggle="modal" data-target="#loginModal" class="btn-sm btn btn-outline-primary text-uppercase">Giriş Yap</a>
                    </p>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<?php
    require view("static/footer");
?>