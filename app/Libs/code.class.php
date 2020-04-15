<?php
header('Content-type:text/html;charset=utf8');
class Code{
  // 验证码个数$number
  protected $number;
  // 验证码类型$codeType
  protected $codeType;
  // 验证码图像宽度$width
  protected $width;
  // 验证码$height
  protected $height;
  // 验证码字符串$code
  protected $code;
  // 图像资源$image
  protected $image;
   
  public function __construct($number=4,$codeType=0,$height=50,$width=100){
    //初始化自己的成员属性
    $this->number=$number;
    $this->codeType=$codeType;
    $this->width = $width;
    $this->height= $height;
     
    //生成验证码函数
    $this->code = $this ->createCode();
     
  }
  public function __get($name){
    if ($name == 'code'){
      return $this->code;
    }
    return false;
  }
  /*获取验证码*/
  public function getCode() {
    return $this->code;
  }
  /*图像资源销毁*/
  public function __destruct(){
    imagedestroy($this->image);
  }
  protected function createCode(){
    //通过你的验证码类型生成验证码
    switch ($this->codeType){
      case 0: //纯数字
        $code = $this->getNumberCode();
        break;
      case 1: //纯字母的
        $code = $this->getCharCode();
        break;
      case 2: //数字和字母混合
        $code = $this->getNumCharCode();
        break;
      default:
        die('不支持此类验证码类型');
    }
    return $code;
  }
  protected function getNumberCode(){
    $str = join('', range(0, 9));
    return substr(str_shuffle($str),0, $this->number);
  }
  protected function getCharCode(){
    $str = join('', range('a', 'z'));
    $str = $str.strtoupper($str);
    return substr(str_shuffle($str),0,$this->number);
  }
  protected function getNumCharCode(){
    $numstr = join('',range(0, 9));
    $str =join('', range('a', 'z'));
    $str =$numstr.$str.strtoupper($str);
    return substr(str_shuffle($str), 0,$this->number);
  }
  protected function createImage(){
    $this->image = imagecreatetruecolor($this->width, 
        $this->height);
  }
  protected function fillBack(){
    imagefill($this->image, 0, 0, $this->lightColor());
  }
  /*浅色*/
  protected function lightColor(){
    return imagecolorallocate($this->image, mt_rand(133,255), mt_rand(133,255), mt_rand(133,255));
  }
  /*深色*/
  protected function darkColor(){
    return imagecolorallocate($this->image, mt_rand(0,120), mt_rand(0,120), mt_rand(0,120));
  }
  protected function drawChar(){
    $width = ceil($this->width / $this->number);
    for ($i=0; $i< $this->number;$i++){
      $x = mt_rand($i*$width+5, ($i+1)*$width-10);
      $y = mt_rand(0, $this->height -15);
      imagechar($this->image, 5, $x, $y, $this->code[$i], $this->darkColor());
    }
  }
  protected function drawLine(){
    for ($i=0;$i<5;$i++) {
      imageline($this->image,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$this->darkColor());
    }
  }
  protected function drawDisturb(){
    for ($i=0;$i<150;$i++){
      $x=mt_rand(0, $this->width);
      $y=mt_rand(0, $this->height);
      imagesetpixel($this->image, $x, $y, $this->lightColor());
    }
  }
  protected function show(){
    header('Content-Type:image/png');
    imagepng($this->image);
  }
  public function outImage(){
//     创建画布
    $this->createImage();
//     填充背景色
    $this->fillBack();
//     将验证码字符串花到画布上
    $this->drawChar();
//     添加干扰元素
     // $this->drawDisturb();
//     添加线条
     // $this->drawLine();
//     输出并显示
    $this->show();
  }
}