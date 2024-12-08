<?php
function classAutoLoader($class)
{
    $class=Strtolower($class);
    $the_path="includes/{$class}.php";
    if(is_file($the_path) && !class_exists($class))
    //is_file to check if the file already exisit Or not  
    //class_exists to check if the class already defined Or not  
    { 
        include $the_path;
    }
}
spl_autoload_register('classAutoLoader');
// تستخدم دالة spl_autoload_register
//لتسجيل دالة التحميل التلقائي classAutoLoader.
// هذا يعني أنه في أي وقت يتم فيه محاولة إنشاء كائن من فئة غير معرّفة (لم يتم تضمين ملفها بعد)،
// ستقوم PHP تلقائيًا باستدعاء دالة classAutoLoader لمحاولة تحميل ملف الفئة المطلوبة.

function redirect($location)
{
    header("Location:$location"); 
}

?>