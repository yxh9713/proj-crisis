<?php

namespace Core;

class Helper
{
  public function redirectTo($url)
  {
    header("Location:$url");
  }
 
}
