Комопнент на основе **bootstrap-star-rating** для вывода рейтинга к элементу (оценка).

Запись происходит в стандартные свойства *rating*, *vote_count*, *vote_sum*.

Альтернатива компоненту **iblock.vote**, не использует формулу Экслера для расчета.

Для вывода в *template.php* нужно добавить контейнер с классом **star-rating-container1**
Сам компонент подключается в **element.php** после *catalog.element*.

```php
$APPLICATION->IncludeComponent("bitrix:bootstrap.star.rating", "", array(
        "IBLOCK_ID"  => "12",
        "ELEMENT_ID" => $elementId,
        "SIZE"       => "md",
), $component);
```
