<?$str = 'В языке {{C++|C}|{JavaScript|PHP}|C#|Java} блоки кода можно объединять в фигурные скобки, например \{{ВАШ КОД|КАКОЙ-ТО КОД};\}<br>Условия записываются так {if(1)|if(1\|\|0)}{\{do_something();\}|\{do_some_work();\}}';
$str = preg_replace_callback('#(?<!\\\)(\{[\s\S]+?(?<!\\\)\})(?![\|\}])#', function($mathces)
{
    $mathces[1] = preg_replace('#(?<!\\\)\{|(?<!\\\)\}#', '', $mathces[1]);
    $arr = preg_split('#(?<!\\\)\|#', $mathces[1]);
    return $arr[array_rand($arr)];
}, $str);
$str = str_replace(array('\{', '\}', '\|'), array('{', '}', '|'), $str)."\n";
echo $str;