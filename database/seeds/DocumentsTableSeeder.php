<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentsTableSeeder extends Seeder
{
    private array $dataRows = [
        ['id' => '1','is_active' => true,'slug' => 'root','title' => 'Velohub - велосипеды, запчасти и аксессуары','text' => null],
        ['id' => '2','is_active' => true,'slug' => 'dostavka','title' => 'Доставка велосипедов','text' => '
<p><strong>Самовывоз из наших <a href="/text/kontakti/">Магазинов</a></strong></p>
По предварительному заказу через сайт, велосипед можно забрать в одном из наших магазинов собранным, полусобранным  или в заводской упаковке.
<br><br>
<p><strong>Доставка по Киеву и области</strong></p>
Доставка всех велосипедов осуществляется <b>бесплатно</b> по Киеву и в пределах 25 км по области.<br>
Велосипеды доставляются в собранном и проверенном виде. Доставка осуществляется до подъезда.
<br><br>
<p><strong>Доставка в регионы</strong></p>
<p>Доставка осуществляется <span style="font-weight: bold;">бесплатно</span> транспортной компанией Новая Почта или Интайм.<br>
Велосипеды доставляются в заводской упаковке.
<br>
<h2>Доставка запчастей и аксессуаров</h2>
<p><strong>Самовывоз</strong></p>
Бесплатный самовывоз из наших <a href="/text/kontakti/">Магазинов</a> в Киеве.<br>
Предварительно оформите заказ через сайт, <b>наличие и цены в магазинах отличаются</b>.
<br><br>
<p><strong>Доставка курьером по Киеву</strong></p>
Запчасти и аксессуары доставляются бесплатно при сумме заказа свыше <span style="font-weight: bold;"> 1000 грн</span>.<br />Если сумма заказа меньше 1000 грн., то стоимость доставки - <strong>50 грн</strong>.</p>
<br>
<p><strong>Доставка Новой Почтой по всей Украине</strong></p>
<p>Доставка осуществляется <span style="font-weight: bold;">бесплатно</span> для всех заказов на сумму <span style="font-weight: bold;">свыше 500 грн</span>.<br />Если сумма заказа меньше 500 грн., то стоимость доставки - по тарифам Перевозчика.</p>
<br>
<h2>Как оплатить</h2>
<li>Наличными при получении;</li>
<li>Через ПриватБанк или Монобанк;</li>
<li>Банковской картой Visa или MasterCard;</li>
<li>В рассрочку 0,01% до 6 мес. через сервис <a href="https://chast.privatbank.ua/" target="_blank">"Оплата Частями"</a>;</li>
<li>В кредит до 24 мес. через сервис <a href="https://chast.privatbank.ua/#section6" target="_blank">"Мгновенная Рассрочка"</a>. Плата за сервис составляет 2,9% от суммы покупки в месяц;</li>
<li>Безналичным расчетом (на ФОП без НДС).</li>
<h2>Обмен и возврат товара</h2>
Согласно ст. 9 Закона Украины «О защите прав потребителей» потребитель имеет право на протяжении 14 дней, вернуть или заменить товар надлежащего качества на аналогичный, если товар не подошел по форме, габаритам, фасону, цвету или не может быть использован по назначению, но при условии, если товар не использовался и сохранен его товарный вид, потребительские качества, пломбы, заводская упаковка, документы.
<br><br>
В обмене или возврате товара может быть отказано в случае:
<li>с момента приобретения товара прошло более 14 дней;
<li>комплектация товара не полная;
<li>товар был в эксплуатации и имеет следы использования;
<li>при проверке качества товара обнаружены признаки постороннего вмешательства или нарушены другие условия гарантийного обслуживания;
<li>отсутствует один из элементов заводская упаковки товара;
<li>отсутствует документ, подтверждающий факт покупки товара.'],

        ['id' => '3','is_active' => true,'slug' => 'kontakti','title' => 'Контакты','text' => '
<p><strong>График работы</strong></p>
ПН-СБ: 9:00 - 19:00<br>
ВС: выходной
<hr>
<p><strong>Контакты Интернет-магазина</strong></p>
+38 (098) 100-10-67<br>
+38 (050) 332-30-02<br>
<br><br>
<a href="mailto:shop@velohub.com.ua">shop@velohub.com.ua</a>
<hr>
<p><strong>Сервис и Прокат</strong></p>
+38 (050) 332-30-02<br>
<hr>
<p><strong>Наши Магазины в Киеве</strong></p>
<br>
<b>Оболонь</b>:<br>
Оболонский р-н., Оболонский проспект, 52А<br>
ПН-СБ: 9:00 - 19:00
<br><br>
<b>Теремки</b>:<br>
Голосеевский р-н., ул. Академика Вильямса, 6-Г, офис 57<br>
ПН-СБ: 9:00 - 19:00
<br><br>
<b>Святопетровское</b>:<br>
с.Святопетровское, ул. Святомихайловская, 13<br>
ПН-СБ: 9:00 - 19:00<br>'],

        ['id' => '4','is_active' => true,'slug' => 'servis-velosipedov','title' => 'Сервис','text' => '
<img src="upload/img/servis.jpg" width="1200" height="200">
<br>
<ul>
<li>Большой опыт работы наших мастеров гарантирует качественное обслуживание велосипеда;</li>
<li>Оборудованные мастерские, позволяющие выполнять работы любой сложности;</li>
<li>На все производимые работы предоставляется гарантия в течение 14 дней;</li>
<li>Бесплатная диагностика велосипеда.</li>
<li>Услуги Сервиса можно полностью оплатить бонусами, полученными при покупке в нашем магазине.</li>
</ul>
<br>
<h3>Наши Мастерские</h3>'],

        ['id' => '5','is_active' => true,'slug' => 'prokat-velosipedov','title' => 'Прокат','text' => '
<ul>
<li>В нашем прокате только качественные велосипеды в хорошем техническом состоянии.<br></li>
<li>При оформлении заказа на Прокат через сайт гарантируем наличие велосипеда и дополнительную <b>скидку в 5%</b>.</li>
<li>Заказ можно оформить за день до дня начала проката в разделе "<a href="/prokat-velosipedov/s56/">Прокат велосипедов</a>".</li>
</ul>
<br>
<center>
<b>Залог</b>: <b>5 000 грн</b> или <b>права + 1 000 грн</b><br><br>
<table>
    <tr bgcolor="F8E93E">
        <td align="center"><b>Оборудование/Длительность</b></td>
        <td width="100" align="center"><b>час</b></td>
        <td width="100" align="center"><b>полдня</b></td>
        <td width="100" align="center"><b>день</b></td>
    </tr>
    <tr>
        <td>Горный велосипед MTB (базовое оснащение)</td>
        <td align="center">70 грн</td>
        <td align="center">200 грн</td>
        <td align="center">250 грн</td>
    </tr>
    <tr>
        <td>Горный велосипед MTB (продвинутое оснащение)</td>
        <td align="center">100 грн</td>
        <td align="center">250 грн</td>
        <td align="center">300 грн</td>
    </tr>
    <tr>
        <td>Детский (подростковый) горный велосипед MTB</td>
        <td align="center">60 грн</td>
        <td align="center">100 грн</td>
        <td align="center">150 грн</td>
    </tr>
    <tr>
        <td>Детское велокресло Belelli</td>
        <td align="center">80 грн</td>
        <td colspan="2" align="center">100 грн</td>
    </tr>
</table>
<br>
<b>Велошлем и замок входят в стоимость проката!</b>
<img src="upload/img/shlem.jpg" width="500" height="230">
</center>
<br>
<h2>Правила проката</h2>
1. При аренде велосипеда на срок более суток - дополнительная скидка.<br>
2. Залоговая стоимость вносится при получении велосипеда в прокат.<br>
3. Арендная плата вносится по возвращении велосипеда (вычитается из залога).<br>
4. Велосипед выдается и принимается чистый, исправный, с обязательным осмотром.<br>
5. Ремонт велосипеда при поломке арендатор оплачивает по ценам нашего Сервиса (исключение составляют заводские дефекты и естественный износ).<br>
6. При возврате грязного велосипеда арендатор оплачивает мойку велосипеда в размере 75 грн.']
        ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->dataRows as $row) {
            $row['created_at'] = NOW();
            $row['updated_at'] = NOW();
            DB::table('documents')->insert($row);
        }
    }
}
