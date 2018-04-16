<?php

Const　CIRCLE_ORDER = 1;
Const　SQUARE_ORDER = 2;

Class Shape{
 public function draw(){
   //とりあえず空。継承先で要記述
   return true;
 };
 public $drawOrder = -1;
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
  //TODO 描画順で関数を分けるべきでは？仕様を要確認
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
  }

}

public function BigCircle($radius, $point){
  $circle = new Circle;
  $circle->$itsRadius = $radius;
  //@TODO $pointの値をチェックすべき
  $itsCenter = array("x"=> $point[0], "y"=>$point[1]);
  retrun $circle;
}

public function BigSquare($side, $point){
  $square = new Square;
  $square->$itsSide = $side;
  //@TODO $pointの値をチェックすべき
  $itsTopLeft = array("x"=> $point[0], "y"=>$point[1]);
  retrun $square;
}

public function Point($x, $y){
  return array($x,$y);
  //これ必要？配列にして返すだけ
}

public void testDrawAllShapes() {
  $circle = new BigCircle(10, new Point(20,20));
  $square = new BigSquare(/*side*/ 50, /*topLeft*/ new Point(10,10));
  $drawingTool = new DrawingTool;
  $shapeList = array();
  $shapeList[] = $circle;
  $shapeList[] = $square;
  $drawingTool.DrawAllShapes(shapeList);
}
