<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/11 下午9:56
 * Description:
 */
namespace app\common\tool;

class MyData {

    //json中的Key增加上引号.
    public static function json_replace_key($str)
    {
        /*  //该版本没有办法解决value中带时分秒之间的冒号问题
        if(preg_match('/\w:/', $str))
            $str = preg_replace('/(\w+):/is', '"$1":', $str);

        return $str;
        */
        $str = trim($str);
        $str = ltrim($str, '(');
        $str = rtrim($str, ')');
        $a = preg_split('#(?<!\\\\)\"#', $str);
        for ($i = 0; $i < count($a); $i += 2) {
            $s = $a[$i];
            $s = preg_replace('#([^\s\{\}\:\,]+):#', '"\1":', $s);
            $a[$i] = $s;
        }
        return implode('"', $a);
    }

}