Комопнент на основе bootstrap-star-rating для вывода звездочек к элементу (оценка). Свойство STAR_RATE.  В форме должен быть hidden инпут с атрибутом name="PROPERTY[ид св-ва][0]. В параметрах компонента указываем ид св-ва STAR_RATE. 

Для заполненного свойства выводит статичные звезды, 

```php
$APPLICATION->IncludeComponent("bx:bootstrap.star.rating","temp1",
  Array('ELEMENT_ID' => $arItem['ID'], 'STAR_RATE' => '477'),
  $component
);
```

для незаполненного - динамический. 

```php
$APPLICATION->IncludeComponent("bx:bootstrap.star.rating","temp1",
  Array('ELEMENT_ID' => '', 'STAR_RATE' => '503'),
  $component
);
```


