<?php
class Qalib {
    public static function render($view_template_file,$vars = array()) {
        if(array_key_exists('view_template_file', $vars)) {
            throw new Exception("Cannot bind variable called 'view_template_file'");
        }
        $content = file_get_contents($view_template_file);
        if (preg_match('/#@extends\s[\'"](\w+)[\'"]/',$content,$m)) {
            $layout = file_get_contents($m[1].'.php');
            preg_match_all('/#@section\s[\'"](\w+)[\'"](.*?)#@end/s',$content,$sections);
            for ($i=0; $i < count($sections[1]) ; $i++) {
                $layout = preg_replace_callback('/#@section\s[\'"]'.$sections[1][$i].'[\'"]/',function($m) use($sections,$i){
                    return $sections[2][$i];
                },$layout);
            }
            $content = $layout;
        }
        $content = preg_replace('/\{\(/','<?php ',$content);
        $content = preg_replace('/\)\}/','?> ',$content);
        $content = preg_replace_callback('/#\$(\w+)/',function($m) use($vars){
            return $vars[$m[1]];
        },$content);
        extract($vars);
        ob_start();
        $content = eval('?> '.$content);
        return ob_get_clean();
    }
}
?>
