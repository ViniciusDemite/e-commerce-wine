<?php

namespace App\Services;

class ShippingService
{
  /**
   * Calculate shipping.
   *
   * @param  array  $items
   * @param  int  $distance
   * @return float
   */
  public static function calculate_shipping(array $items, int $distance): float
  {
    $weights = array_map(
      fn ($item): float => $item["product"]["weight"],
      $items
    );

    $total_weight = array_sum($weights);
    $weight_value = $total_weight * 5;

    if ($distance <= 1000) {
      return $weight_value;
    }

    return ($weight_value * $distance) / 100;
  }
}
