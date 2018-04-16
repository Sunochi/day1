<?php

Const　CIRCLE_ORDER = 1;
Const　SQUARE_ORDER = 2;
$circleList = array();
$squareList = array();
Class Shape{
  public $drawOrder = -1;
  public function draw(){
   //とりあえず空。継承先で要記述
   return true;
 };
}

class Circle extends Shape
{
  public $itsRadius;
  public $itsCenter = array();
  $drawOrder = CIRCLE_ORDER;
  public function draw(){
    //TODO 円を書く
    return true;
  }
};

class Square extends Shape
{
  public $itsSide;
  public $itsTopLeft;
  $drawOrder = SQUARE_ORDER;
  public function draw(){
    //TODO 四角を書く
    return true;
  }
};

class DrawingTool{
  public function drawAllShapes($list)
  {
    //TODO こんな使い方できないかも。要修正
    uasort($list, function($a, $b){
      if ($a->drawOrder == $b->drawOrder) {
        return 0;
      }
      return ($a->drawOrder < $b->drawOrder) ? -1 : 1;
    });
    //描画
    foreach($list => $shape){
      $shape->draw();
    }

    もしくは

    $circleList[]の描画
    $squareList[]の描画
  }

}
class BigCircle extends Circle{
  public function make($radius, $point){
    $this->itsRadius = $radius;
    //@TODO $pointの値をチェックすべき
    $this->itsCenter = array("x"=> $point[0], "y"=>$point[1]);
    $circleList[] = $this;
    retrun $this;
  }
}

class BigSquare extends Square{
  public function make($side, $point){
    $this->itsSide = $side;
    //@TODO $pointの値をチェックすべき
    $this->itsTopLeft = array("x"=> $point[0], "y"=>$point[1]);
    $squareList[] = $this;
    retrun $this;
  }
}

public function Point($x, $y){
  return array($x,$y);
  //これ必要？配列にして返すだけ
}

public void testDrawAllShapes() {
  $squareList = array();
  $circleList = array();
  $circle = new BigCircle::make(10, new Point(20,20));
  $square = new BigSquare::make(/*side*/ 50, /*topLeft*/ new Point(10,10));
  $drawingTool = new DrawingTool;
  $shapeList = array();
  $shapeList[] = $circle;
  $shapeList[] = $square;
  $drawingTool.DrawAllShapes(shapeList);
}

//ポインタに毎回追加して、それごとに描画する？冗長になるけど変数が増えなくて便利
