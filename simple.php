<?$str = 'Привет {{Виктор|{Антон|Антонио|Антошка}|Сергей}|{Господин|Сэр|Товарищ}} как {твои|ваши} дела';
$str = preg_replace_callback('#(\{[\s\S]+?\})([^\|\{\}]+)#', function($mathces)
{
    $mathces[1] = str_replace(array('}','{'), '', $mathces[1]);
    $arr = explode('|', $mathces[1]);
    return $arr[array_rand($arr)].$mathces[2];
}, $str);
echo "$str\n";