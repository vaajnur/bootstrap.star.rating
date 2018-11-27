Комопнент на основе bootstrap-star-rating для вывода звездочек к элементу (оценка). Свойство STAR_RATE. 

Для заполненного свойства выводит статичные звезды, 

```php
$APPLICATION->IncludeComponent("bx:bootstrap.star.rating","temp1",
  Array('ELEMENT_ID' => $arItem['ID']),
  $component
);
```

для незаполненного - динамический.

```php
$APPLICATION->IncludeComponent("bx:bootstrap.star.rating","temp1",
  Array('ELEMENT_ID' => ''),
  $component
);
```