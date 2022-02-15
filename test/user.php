<?php

/**
 *
 */
class User
{
  // プロパティ
  private mixed $height;
  private mixed $weight;

  // コンストラクタ
  public function __construct(mixed $height, mixed $weight)
  {
    if (!is_numeric($height) && !is_numeric($weight)) {
      $height = 0;
      $weight = 0;
    }
    $this->height = $height;
    $this->weight = $weight;
  }
  // メソッド
  // set
  public function set_value(mixed $height, mixed $weight): void
  {
    if (!is_numeric($height) && !is_numeric($weight)) {
      $height = 0;
      $weight = 0;
    }
    $this->height = $height;
    $this->weight = $weight;
  }
  public function set_height(mixed $height): void
  {
    if (!is_numeric($height)) {
      $height = 0;
    }
    $this->height = $height;
  }
  public function set_weight(mixed $weight): void
  {
    if (!is_numeric($weight)) {
      $weight = 0;
    }
    $this->weight = $weight;
  }
  public function get_height(): int
  {
    return $this->height;
  }
  public function get_weight(): int
  {
    return $this->weight;
  }
  // get_bmi
  public function get_bmi(): float
  {
    return $this->weight / pow($this->height / 100, 2);
  }
  // get_appropriate_weight
  public function get_appropriate_weight(): float
  {
    return pow($this->height / 100, 2) * 22;
  }
  // get_result
  public function get_result(): string
  {
    $bmi = $this->get_bmi();
    if ($bmi < 18.5) {
      return '低体重(痩せ型)';
    }
    if ($bmi < 25) {
      return '普通体重';
    }
    if ($bmi < 30) {
      return '肥満(1度)';
    }
    if ($bmi < 35) {
      return '肥満(2度)';
    }
    if ($bmi < 40) {
      return '肥満(3度)';
    }
    if (40 <= $bmi) {
      return '肥満(4度)';
    }
  }
  // get_result_color
  public function get_result_color(): string
  {
    $bmi = $this->get_bmi();
    if ($bmi < 18.5) {
      return 'blue';
    } elseif ($bmi < 25) {
      return 'white';
    } elseif ($bmi >= 25) {
      return 'red';
    }
  }
}

// $niimi = new User(184, 64);
// twenty years later...
// $niimi->set_value(170, 60);
// var_dump($niimi->get_bmi());
// var_dump($niimi->get_appropriate_weight());
// var_dump($niimi->get_result());
// var_dump($niimi->get_result_color());
