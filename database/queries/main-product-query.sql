SELECT
  prod_id,
  prod_name,
  thumb_url,
  COUNT(inventory.sku) AS qty
FROM products
LEFT JOIN stock USING(prod_id)
LEFT JOIN inventory USING(sku)
GROUP BY prod_id
ORDER BY prod_id ASC;