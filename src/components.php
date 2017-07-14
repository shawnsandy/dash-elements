<?php
/**
 * Created by PhpStorm.
 * User: shawnsandy
 * Date: 7/14/17
 * Time: 10:13 AM
 */


Html::macro('tdElement', function ($data) {
    return collect($data["attributes"])->flatMap(function ($name) {
      return $name ;
    });
});
