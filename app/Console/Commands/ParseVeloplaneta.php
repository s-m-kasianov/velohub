<?php

namespace App\Console\Commands;

use SimpleXMLElement;
use Illuminate\Console\Command;
use App\Models\Category;
use App\Models\Product;
use App\Services\ImagesUploadService;

class ParseVeloplaneta extends Command
{
    private const XML_URL = 'http://exchange-file.com/data/Price3_(-L)_full.xml';
    private const MAX_RUNS = 250;
    private const DEFAULT_ACTIVE = false;
    private const IGNORED_PARAMS = [
        'Не отображать на сайте',
    ];
    private const CATEGORY_MAP = [
//        "что-02-0311688" => null,   // Pride
//        "акс" => null,              // Аксессуары
//        "что-02-0348160" => 7,   // Звонки
//        "что-02-0348180" => 6,   // Защита пера
//        "что-02-0348181" => 13,   // Подножки
//        "что-02-0348182" => 8,   // Зеркала
//        "что-02-0348183" => 15,   // Сувениры
//        "что-02-0348185" => 17,   // Тренировочные колеса
//        "что-02-0348192" => 9,   // Крепления для телефонов
//        "что-02-0349635" => 3,   // Детские аксессуары
//        "что-02-0359437" => 21,   // Велокомпьютеры и пульсометры
//        "что-02-0348191" => 21,   // Велокомпьютеры
//        "что-02-0348193" => 21,   // Пульсометры
//        "что-02-0348172" => 12,   // Освещение
//        "что-02-0348186" => 12,   // Комплект переднего и заднего света
//        "что-02-0348187" => 12,   // Мигалка передняя
//        "что-02-0348188" => 12,   // Мигалка задняя
//        "что-02-0348189" => 12,   // Велосипедные фары
//        "что-02-0348190" => 12,   // Фонари
//        "что-02-0348174" => 10,   // Крылья
//        "что-02-0359424" => 10,   // Крылья на детский велосипед
//        "что-02-0359425" => 10,   // Крылья на взрослый велосипед
//        "что-02-0348175" => 2,   // Багажники
//        "что-02-0359433" => 2,   // Передний багажник
//        "что-02-0359434" => 2,   // Задний багажник
//        "что-02-0348176" => 9,   // Корзины
//        "что-02-0359435" => 9,   // Корзины на детский велосипед
//        "что-02-0359436" => 9,   // Корзины на взрослый велосипед
//        "что-02-0348177" => 5,   // Замки
//        "что-02-0359426" => 5,   // U-Lock замки
//        "что-02-0359427" => 5,   // Цепные замки
//        "что-02-0359428" => 5,   // Замок-трос
//        "что-02-0359429" => 5,   // Сегментные замки
//        "что-02-0348178" => null,   // Питьевые системы
//        "что-02-0348194" => null,   // Гидраторы
//        "что-02-0348195" => 19,   // Фляги
//        "что-02-0348196" => 20,   // Флягодержатели
//        "что-02-0348179" => 16,   // Сумки
//        "что-02-0348155" => 14,   // Рюкзаки
//        "что-02-0359499" => 16,   // Сумки на велосипед
//        "что-02-0359501" => 16,   // Кейсы для перевозки велосипеда
//        "что-02-0348184" => 4,   // Велокресла
//        "что-02-0348197" => 4,   // Аксессуары к велокреслам
//        "что-02-0348199" => 4,   // Тележки
//        "что-02-0359430" => 4,   // Передние кресла
//        "что-02-0359431" => 4,   // Задние кресла на подседельную трубу
//        "что-02-0359432" => 4,   // Задние кресла на багажник
//        "что-02-0348534" => null,   // Спортивное питание
//        "что-02-0359438" => null,   // Гели
//        "что-02-0359439" => null,   // Батончики
//        "что-02-0359440" => null,   // Изотонические напитки
//        "что-02-0359441" => null,   // Таблетки
//        "что-02-0311625" => null,   // Акция
//        "что-02-0340289" => null,   // Запчасти супер акция
//        "с213" => null,             // Велосипеды
        "что-02-0347825" => 1,   // Горные
        "что-02-0347826" => 1,   // Городские / Гибриды
        "что-02-0347827" => 1,   // Шоссейные
        "что-02-0347828" => 1,   // Детские
        "что-02-0347829" => 1,   // Беговелы
        "что-02-0347830" => null,   // Самокаты
        "что-02-0350451" => 1,   // BMX / Dirt Jump
        "что-02-0354892" => 1,   // Гравийные
//        "что-02-0311607" => null,   // Зимние товары
//        "WhSKID-49387" => null,     // Ледоступы
//        "что-02-0349169" => null,   // Зимняя защита
//        "что-02-0349171" => null,   // Перчатки
//        "что-02-0311330" => null,   // Одежда и защита
//        "что-02-0347233" => null,   // Куртки
//        "что-02-0347243" => null,   // Защита наколенники, налокотники
//        "что-02-0349151" => null,   // Бахилы
//        "что-02-0347236" => null,   // Штаны
//        "что-02-0359465" => null,   // Штаны с лямками
//        "что-02-0359466" => null,   // Штаны без лямок
//        "что-02-0347237" => null,   // Шорты
//        "что-02-0359449" => null,   // Шорты с лямками
//        "что-02-0359450" => null,   // Шорты без лямок
//        "что-02-0359451" => null,   // Велосипедный памперс
//        "что-02-0347238" => null,   // Термобельё
//        "что-02-0359492" => null,   // Термокофты
//        "что-02-0359493" => null,   // Термоноски
//        "что-02-0347239" => null,   // Перчатки
//        "что-02-0359480" => null,   // Перчатки с пальцами
//        "что-02-0359481" => null,   // Перчатки без пальцев
//        "что-02-0347240" => null,   // Головные уборы
//        "что-02-0359484" => null,   // Шапки, балаклавы, подшлемники
//        "что-02-0359485" => null,   // Банданы, утеплители шеи
//        "что-02-0347241" => null,   // Очки
//        "что-02-0359489" => null,   // Очки с комплектом сменных линз
//        "что-02-0359490" => null,   // Очки с одной линзой
//        "что-02-0347242" => null,   // Обувь
//        "что-02-0359491" => null,   // Обувь МТБ
//        "что-02-0359559" => null,   // Обувь шоссе
//        "что-02-0359418" => null,   // Джерси
//        "что-02-0347234" => null,   // Джерси длинный рукав
//        "что-02-0347235" => null,   // Джерси короткий рукав
//        "что-02-0359474" => null,   // Повседневная одежда
//        "что-02-0359475" => null,   // Футболки
//        "что-02-0359476" => null,   // Кофты
//        "что-02-0359477" => null,   // Утеплители
//        "что-02-0359478" => null,   // Утеплители для рук
//        "что-02-0359479" => null,   // Утеплители для ног
//        "что-02-0347256" => 3,   // Шлемы
//        "что-02-0359486" => 3,   // Детские шлемы
//        "что-02-0359487" => 3,   // Взрослые шлемы
//        "что-02-0359576" => 3,   // Аксессуары для шлемов
//        "что-02-0339526" => null,   // Cannondale
//        "что-02-0348530" => null,   // Компоненты Cannondale Lefty
//        "что-02-0348531" => null,   // Специфические ключи и запчасти Cannondale
//        "что-02-0311547" => null,   // Компоненты
//        "с222" => null,             // Рамы и запчасти для рам
//        "что-02-0348283" => 1,   // Рамы
//        "что-02-0348284" => 3,   // Запчасти для рам
//        "что-02-0311603" => 5,   // Колесные части
//        "что-02-0337031" => 8,   // Покрышки
//        "что-02-0337032" => 5,   // Втулки передние
//        "что-02-0337033" => 5,   // Спицы
//        "что-02-0311579" => 5,   // Колеса
//        "что-02-0337035" => 5,   // Обода
//        "что-02-0348289" => 5,   // Втулки задние
//        "что-02-0348290" => 5,   // Ниппели
//        "что-02-0348291" => 8,   // Ободные ленты
//        "что-02-0348292" => 8,   // Камеры
//        "что-02-0348293" => 5,   // Колпачки для камер, накладки на спицы
//        "что-02-0348294" => 5,   // Эксцентрики, оси
//        "что-02-0311328" => 10,   // Седла, подседелы
//        "что-02-0348324" => 10,   // Седла
//        "что-02-0348325" => 10,   // Подседельные трубы
//        "что-02-0348326" => 10,   // Хомуты
//        "что-02-0348285" => 2,   // Вилки, амортизаторы
//        "что-02-0348286" => 2,   // Вилки
//        "что-02-0348295" => 13,   // Трансмиссия
//        "что-02-0348296" => 7,   // Переключатели передние
//        "что-02-0348297" => 7,   // Переключатели задние
//        "что-02-0348298" => 7,   // Ручки переключения
//        "что-02-0348299" => 7,   // Успокоители, натяжители цепи
//        "что-02-0348300" => 7,   // Ролики
//        "что-02-0348301" => 14,   // Тросики, рубашки и колпачки
//        "что-02-0348302" => 14,   // Тросики
//        "что-02-0348303" => 14,   // Рубашки
//        "что-02-0348304" => 14,   // Колпачки
//        "что-02-0348305" => 7,   // Привод
//        "что-02-0348306" => 13,   // Шатуны
//        "что-02-0348307" => 13,   // Звезды к шатунам
//        "что-02-0348308" => 13,   // Каретки
//        "что-02-0348309" => 6,   // Педали
//        "что-02-0348311" => 6,   // Компоненты к педалям
//        "что-02-0348314" => 13,   // Задние звезды
//        "что-02-0348316" => 13,   // Цепи
//        "что-02-0348317" => 13,   // Болты шатунов, бонки
//        "что-02-0348318" => 11,   // Тормозные системы
//        "что-02-0348319" => 12,   // Тормозные колодки
//        "что-02-0348320" => 11,   // Дисковые тормоза
//        "что-02-0348321" => 11,   // Ободные тормоза
//        "что-02-0348322" => 11,   // Тормозные ручки
//        "что-02-0348323" => 11,   // Компоненты к тормозам
//        "что-02-0348327" => 9,   // Рулевое управление
//        "что-02-0348328" => 9,   // Рули
//        "что-02-0348329" => 9,   // Рулевые колонки
//        "что-02-0348330" => 9,   // Выносы руля
//        "что-02-0348331" => 9,   // Рога
//        "что-02-0348332" => 9,   // Баренды, замки
//        "что-02-0348333" => 9,   // Грипсы
//        "что-02-0348334" => 9,   // Обмотка руля
//        "что-02-0311329" => null,   // Инструменты и обслуживание
//        "что-02-0348073" => null,   // Инструменты
//        "что-02-0348090" => null,   // Одиночные ключи
//        "что-02-0348091" => null,   // Мультитулы
//        "что-02-0348092" => null,   // Для цепи
//        "что-02-0348093" => null,   // Для кассеты и трещотки
//        "что-02-0348094" => null,   // Для каретки, шатунов и педалей
//        "что-02-0348095" => null,   // Спицные ключи и станки
//        "что-02-0348096" => null,   // Ремкомплекты для шин
//        "что-02-0348097" => null,   // Насосы
//        "что-02-0348100" => null,   // Кусачки, плоскогубцы, ножницы
//        "что-02-0348103" => null,   // Прессы и слесарное оборудование
//        "что-02-0348137" => null,   // Для тормозов
//        "что-02-0348102" => null,   // Оборудование для мастерской
//        "что-02-0348101" => null,   // Наборы инструмента для механика
//        "что-02-0348074" => 13,   // Смазки
//        "что-02-0348083" => 13,   // Для цепи
//        "что-02-0348084" => 13,   // Для подшипников
//        "что-02-0348085" => null,   // Пасты для сборки велосипеда
//        "что-02-0348171" => 13,   // Для вилок
//        "что-02-0348075" => null,   // Мойки, очистители
//        "что-02-0348077" => null,   // Цепемойки
//        "что-02-0348078" => 13,   // Очистители
//        "что-02-0348079" => 13,   // Щетки
//        "что-02-0348076" => 18,   // Хранение велосипеда
//        "что-02-0348081" => 18,   // Подвесные системы
//        "что-02-0348082" => 18,   // Напольные стойки
//        "что-02-0311659" => null,   // Рекламные материалы
//        "что-02-0311706" => null,   // Рекламные материалы Cannondale
//        "что-02-0346039" => null,   // Промо-материалы
//        "1985701" => null,          // На замену
//        "что-02-0339657" => null,   // Cannondale
//        "что-02-0347340" => null,   // Pride образцы
//        "что-02-0353286" => null,   // Образцы Pride 2020
//        "что-02-0360306" => null,   // Mavic
    ];
    protected $signature = 'parse:veloplaneta {xmlPath?}';
    protected $description = 'Parse Veloplaneta XML';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): string
    {
        $counter = 0;
        $xml = simplexml_load_file($this->argument('xmlPath') ?? self::XML_URL);

        if (empty($xml->shop->categories->category) || empty($xml->shop->offers->offer)) {
            return "Xml file is empty";
        }

        foreach ($xml->shop->offers->offer as $offer) {
            if ($counter >= self::MAX_RUNS) {
                break;
            }
            $productSku = (string)$offer->vp_sku;
            $categoryKey = (string)$offer->categoryId;
            $categoryId = array_key_exists($categoryKey, self::CATEGORY_MAP) ? self::CATEGORY_MAP[$categoryKey] : null;
            $category = Category::where('id', $categoryId)->where('is_parent', false)->first();

            if ($category && !$this->productExists($productSku) && $this->hasPicture($offer)) {
                $offerData = $this->parseOfferData($offer);
                $product = $category->products()->firstOrCreate($offerData);
                $product->features = $this->mapFeatures($offer->param, $category);
                $product->save();
                $product->images = ImagesUploadService::upload(
                    [(string)$offer->picture],
                    $product->imagesStorage(),
                    $product->thumbsStorage()
                );
                $product->save();
                $counter++;
            }
        }

        return "Parsed $counter new items";
    }

    private function hasPicture(SimpleXMLElement $offer): bool
    {
        return !empty((string)$offer->picture) && $this->imageExists((string)$offer->picture);
    }

    private function productExists(string $productCode): bool
    {
        return Product::where('code', $productCode)->exists();
    }

    private function parseOfferData(SimpleXMLElement $offer): array
    {
        $category_id = self::CATEGORY_MAP[(string)$offer->categoryId];
        $is_active = self::DEFAULT_ACTIVE;
        $name = trim((string)$offer->name);
        $code = trim((string)$offer->vp_sku);
        $barcode = trim((string)$offer->barcode);
        $brand = trim(ucwords(strtolower((string)$offer->brand)));
        $description = trim((string)$offer->description);
        [$title, $model] = $brand && strpos($name, $brand) ? preg_split("/" . preg_quote($brand) . "/i", $name) : [null, $name];
        $title = trim($title);
        $model = trim($model);

        return compact([
            'category_id',
            'is_active',
            'code',
            'barcode',
            'title',
            'brand',
            'model',
            'description',
        ]);
    }

    private function mapFeatures(object $offerParams, Category $category): array
    {
        foreach ($offerParams as $param) {
            $title = (string)$param->attributes()->name;

            if (!in_array($title, self::IGNORED_PARAMS)) {
                $feature = $category->features()->firstOrCreate([
                    'parent_id' => 0,
                    'title' => $title,
                    'type' => 'string',
                ]);
                $featuresMap['f' . $feature->id] = (string)$param;
            }
        }

        return $featuresMap ?? [];
    }

    private function imageExists($url): bool
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result !== false;
    }
}
